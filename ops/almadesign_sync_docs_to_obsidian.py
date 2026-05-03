#!/usr/bin/env python3
"""Sync AlmaDesign docs from git HEAD to the local Obsidian vault."""

from __future__ import annotations

import argparse
import datetime as dt
import fnmatch
import os
from pathlib import Path
import shutil
import subprocess
import sys
import tarfile
import tempfile


VAULT_ENV = "ALMADESIGN_OBSIDIAN_VAULT_ROOT"
FALLBACK_VAULT_ROOT = Path("/mnt/c/Vaults/agendaProfesional")
SITIOWEB_RELATIVE = Path("04_almadesign") / "productos" / "SitioWeb"
ROOT_DASHBOARD_RELATIVE = Path("04_almadesign") / "DASHBOARD.md"
MIRROR_RELATIVE = SITIOWEB_RELATIVE / "docs"
SITIOWEB_DASHBOARD_RELATIVE = SITIOWEB_RELATIVE / "DASHBOARD.md"
LEGACY_SITIOWEB_DASHBOARD_RELATIVE = SITIOWEB_RELATIVE / "DASHBOARD_ALMADESIGN_WEB_DOCS.md"
APOGEOLUX_DASHBOARD_RELATIVE = Path("04_almadesign") / "productos" / "ApogeoLux" / "DASHBOARD.md"
APOGEOLUX_DOCS_RELATIVE = Path("04_almadesign") / "productos" / "ApogeoLux" / "docs"
SOURCE_DISPLAY = "~/workspace/almadesign-web/docs"
ALLOWED_SUFFIXES = {".md", ".txt", ".json", ".yml", ".yaml"}
EXCLUDED_DIRS = {"logs", "storage", "node_modules", "vendor", ".git"}
TEMP_SUFFIXES = {".tmp", ".temp", ".swp", ".swo", ".bak", ".orig", ".rej"}
SENSITIVE_NAME_PATTERNS = (
    ".env",
    ".env.*",
    "*.log",
    "*.pem",
    "*.key",
    "*.p12",
    "*.pfx",
    "id_rsa",
    "id_dsa",
    "id_ecdsa",
    "id_ed25519",
    "*private*key*",
    "*secret*",
    "*secreto*",
    "*credential*",
    "*token*",
    "*password*",
    "*passwd*",
)
PRIVATE_KEY_MARKERS = (
    b"-----BEGIN OPENSSH PRIVATE KEY-----",
    b"-----BEGIN RSA PRIVATE KEY-----",
    b"-----BEGIN DSA PRIVATE KEY-----",
    b"-----BEGIN EC PRIVATE KEY-----",
    b"-----BEGIN PRIVATE KEY-----",
)
FOLDER_DESCRIPTIONS = {
    "docs/context": "contexto maestro, dashboard y traspaso seguro de chat.",
    "docs/memoria/core": "memoria canonica, arquitectura, decisiones, reglas y estado vigente.",
    "docs/prompts": "prompts canonicos para continuidad operativa.",
    "docs/gestion": "operacion, runbooks, backups, healthcheck y rollback.",
}


class SyncError(RuntimeError):
    """Expected sync failure with a clear message."""


def run_git(repo_root: Path, args: list[str], *, capture_bytes: bool = False) -> str | bytes:
    command = ["git", *args]
    completed = subprocess.run(
        command,
        cwd=repo_root,
        check=False,
        stdout=subprocess.PIPE,
        stderr=subprocess.PIPE,
    )
    if completed.returncode != 0:
        stderr = completed.stderr.decode("utf-8", errors="replace").strip()
        raise SyncError(f"git {' '.join(args)} fallo: {stderr}")
    if capture_bytes:
        return completed.stdout
    return completed.stdout.decode("utf-8", errors="replace").strip()


def find_repo_root() -> Path:
    completed = subprocess.run(
        ["git", "rev-parse", "--show-toplevel"],
        check=False,
        stdout=subprocess.PIPE,
        stderr=subprocess.PIPE,
    )
    if completed.returncode != 0:
        stderr = completed.stderr.decode("utf-8", errors="replace").strip()
        raise SyncError(f"no se pudo detectar la raiz del repo con git rev-parse: {stderr}")
    return Path(completed.stdout.decode("utf-8", errors="replace").strip()).resolve()


def find_vault_root() -> Path:
    env_root = os.environ.get(VAULT_ENV)
    if env_root:
        vault_root = Path(env_root).expanduser()
        if vault_root.is_dir():
            return vault_root.resolve()
        raise SyncError(f"{VAULT_ENV} apunta a una ruta inexistente: {vault_root}")

    if FALLBACK_VAULT_ROOT.is_dir():
        return FALLBACK_VAULT_ROOT.resolve()

    raise SyncError(
        "no se encontro el vault Obsidian. Define "
        f'{VAULT_ENV}="/mnt/c/Vaults/agendaProfesional" o crea el fallback {FALLBACK_VAULT_ROOT}.'
    )


def validate_docs_head(repo_root: Path) -> None:
    docs_path = repo_root / "docs"
    if not docs_path.is_dir():
        raise SyncError(f"no existe docs/ en el repo: {docs_path}")
    run_git(repo_root, ["rev-parse", "--verify", "HEAD"])
    listing = run_git(repo_root, ["ls-tree", "-d", "--name-only", "HEAD", "docs"])
    if listing.strip() != "docs":
        raise SyncError("docs/ no existe en el commit HEAD; no se puede sincronizar desde HEAD.")


def is_guarded_mirror_target(path: Path) -> bool:
    return tuple(path.parts[-len(MIRROR_RELATIVE.parts) :]) == MIRROR_RELATIVE.parts


def should_exclude_path(path: Path) -> tuple[bool, str | None]:
    parts = path.parts
    if not parts or parts[0] != "docs":
        return True, "fuera de docs/"

    for part in parts:
        if part in EXCLUDED_DIRS:
            return True, f"directorio excluido: {part}"

    name = path.name
    lowered = name.lower()
    for pattern in SENSITIVE_NAME_PATTERNS:
        if fnmatch.fnmatch(lowered, pattern.lower()):
            return True, f"nombre sensible excluido: {name}"

    if lowered in {".ds_store", "thumbs.db"} or lowered.endswith("~"):
        return True, f"archivo temporal excluido: {name}"

    if path.suffix.lower() in TEMP_SUFFIXES:
        return True, f"archivo temporal excluido: {name}"

    if path.suffix.lower() not in ALLOWED_SUFFIXES:
        return True, f"extension no permitida: {path.suffix or '(sin extension)'}"

    return False, None


def contains_private_key_marker(content: bytes) -> bool:
    return any(marker in content for marker in PRIVATE_KEY_MARKERS)


def materialize_head_docs(repo_root: Path, staging_root: Path) -> tuple[list[Path], list[tuple[Path, str]]]:
    archive = run_git(repo_root, ["archive", "--format=tar", "HEAD", "docs"], capture_bytes=True)
    copied: list[Path] = []
    skipped: list[tuple[Path, str]] = []

    with tempfile.TemporaryFile() as archive_file:
        archive_file.write(archive)
        archive_file.seek(0)
        with tarfile.open(fileobj=archive_file, mode="r:") as tar:
            for member in tar.getmembers():
                member_path = Path(member.name)
                excluded, reason = should_exclude_path(member_path)
                if member.isdir():
                    if excluded and reason != "extension no permitida: (sin extension)":
                        skipped.append((member_path, reason or "directorio excluido"))
                    continue
                if not member.isfile():
                    skipped.append((member_path, "entrada no regular excluida"))
                    continue
                if excluded:
                    skipped.append((member_path, reason or "archivo excluido"))
                    continue

                extracted = tar.extractfile(member)
                if extracted is None:
                    skipped.append((member_path, "no se pudo leer desde git archive"))
                    continue
                content = extracted.read()
                if contains_private_key_marker(content):
                    skipped.append((member_path, "contenido con marcador de llave privada"))
                    continue

                target = staging_root / member_path
                target.parent.mkdir(parents=True, exist_ok=True)
                target.write_bytes(content)
                copied.append(member_path)

    return copied, skipped


def read_text(path: Path) -> str:
    return path.read_text(encoding="utf-8", errors="replace")


def describe_markdown(path: Path) -> str:
    text = read_text(path)
    for line in text.splitlines():
        stripped = line.strip()
        if stripped.startswith("# Explicación técnica breve:"):
            description = stripped.split(":", 1)[1].strip()
            return normalize_description(description)

    for line in text.splitlines():
        stripped = line.strip()
        if not stripped.startswith("# ") or stripped.startswith("## "):
            continue
        heading = stripped[2:].strip()
        if heading.lower().startswith(("nombre del archivo:", "ruta del archivo:", "fecha de creacion:", "fecha de creación:", "explicacion tecnica breve:", "explicación técnica breve:")):
            continue
        return normalize_description(heading)

    return "Documento de soporte del proyecto"


def normalize_description(value: str) -> str:
    value = value.strip().rstrip(".")
    if not value:
        return "Documento de soporte del proyecto"
    return value[0].lower() + value[1:] if value else value


def link_for_markdown(vault_relative_path: Path) -> str:
    link_path = vault_relative_path.with_suffix("").as_posix()
    label = vault_relative_path.stem
    return f"[[{link_path}|{label}]]"


def folder_description(folder: str) -> str:
    if folder in FOLDER_DESCRIPTIONS:
        return FOLDER_DESCRIPTIONS[folder]
    if folder == "docs":
        return "documentos raiz del proyecto."
    return "documentos de soporte del proyecto."


def build_dashboard(staging_docs: Path, commit_hash: str, sync_time: str) -> str:
    files = sorted(path for path in staging_docs.rglob("*") if path.is_file())
    grouped: dict[str, list[Path]] = {}
    for path in files:
        rel_from_docs = path.relative_to(staging_docs)
        vault_relative = MIRROR_RELATIVE / rel_from_docs
        folder = (Path("docs") / rel_from_docs).parent.as_posix()
        grouped.setdefault(folder, []).append(vault_relative)

    lines = [
        "# Dashboard AlmaDesign Web Docs",
        "",
        "> Generado automaticamente. No editar manualmente.",
        f"> Fuente de verdad: {SOURCE_DISPLAY}",
        f"> Ultimo commit sincronizado: {commit_hash}",
        f"> Ultima sincronizacion: {sync_time}",
        "",
    ]

    for folder in sorted(grouped):
        lines.append(f"## {folder}")
        lines.append(f"Descripcion: {folder_description(folder)}")
        for vault_relative in sorted(grouped[folder], key=lambda item: item.as_posix()):
            source_file = staging_docs / vault_relative.relative_to(MIRROR_RELATIVE)
            if vault_relative.suffix.lower() == ".md":
                description = describe_markdown(source_file)
                lines.append(f"- {link_for_markdown(vault_relative)} - {description}.")
            else:
                lines.append(f"- `{vault_relative.as_posix()}` - Archivo de soporte del proyecto.")
        lines.append("")

    return "\n".join(lines).rstrip() + "\n"


def is_safe_support_file(rel_from_docs: Path) -> bool:
    excluded, _ = should_exclude_path(Path("docs") / rel_from_docs)
    return not excluded


def build_product_dashboard(
    docs_root: Path,
    docs_vault_relative: Path,
    title: str,
    fallback_description: str,
    sync_time: str,
) -> str:
    markdown_files = sorted(path for path in docs_root.rglob("*.md") if path.is_file())
    support_files = sorted(
        path
        for path in docs_root.rglob("*")
        if path.is_file()
        and path.suffix.lower() != ".md"
        and is_safe_support_file(path.relative_to(docs_root))
    )

    grouped: dict[str, list[Path]] = {}
    for path in markdown_files + support_files:
        rel_from_docs = path.relative_to(docs_root)
        folder = (Path("docs") / rel_from_docs.parent).as_posix()
        grouped.setdefault(folder, []).append(path)

    lines = [
        f"# {title}",
        "",
        "> Dashboard navegable en Obsidian. No reemplaza la fuente de verdad tecnica del proyecto.",
        f"> Fecha de actualizacion: {sync_time}",
        f"> Ruta documental: `{docs_vault_relative.as_posix()}`",
        "",
    ]

    for folder in sorted(grouped):
        lines.append(f"## {folder}")
        for path in sorted(grouped[folder], key=lambda item: item.relative_to(docs_root).as_posix()):
            rel_from_docs = path.relative_to(docs_root)
            vault_relative = docs_vault_relative / rel_from_docs
            if path.suffix.lower() == ".md":
                description = describe_markdown(path)
                if description == "Documento de soporte del proyecto":
                    description = fallback_description
                lines.append(f"- {link_for_markdown(vault_relative)} - {description}.")
            else:
                lines.append(f"- `{vault_relative.as_posix()}` - Archivo de soporte del producto.")
        lines.append("")

    return "\n".join(lines).rstrip() + "\n"


def build_root_dashboard(apogeo_dashboard_exists: bool, commit_hash: str, sync_time: str) -> str:
    apogeo_link = (
        "[[04_almadesign/productos/ApogeoLux/DASHBOARD|Abrir]]"
        if apogeo_dashboard_exists
        else "Dashboard interno pendiente."
    )

    lines = [
        "# Dashboard AlmaDesign",
        "",
        "> Generado automaticamente. No editar manualmente.",
        "> Obsidian es dashboard/mirror navegable; no es fuente de verdad tecnica.",
        f"> Ultimo commit SitioWeb sincronizado: {commit_hash}",
        f"> Ultima sincronizacion: {sync_time}",
        "",
        "## Productos en desarrollo",
        "",
        "| Producto | Estado | Dashboard | Ruta documental | Descripcion |",
        "|---|---|---|---|---|",
        (
            "| ApogeoLux | Activo documental | "
            f"{apogeo_link} | `productos/ApogeoLux/docs` | "
            "Documentacion del producto Apogeo Lux en el baul AlmaDesign. |"
        ),
        (
            "| SitioWeb | Activo | [[04_almadesign/productos/SitioWeb/DASHBOARD|Abrir]] | "
            "`productos/SitioWeb/docs` | "
            "Sitio web comercial de AlmaDesign y landing comercial de Apogeo Lux. |"
        ),
        "",
    ]
    return "\n".join(lines)


def sync(args: argparse.Namespace) -> int:
    if not args.from_head:
        raise SyncError("usa --from-head para confirmar que la fuente es el commit HEAD.")

    repo_root = find_repo_root()
    validate_docs_head(repo_root)
    vault_root = find_vault_root()

    mirror_target = vault_root / MIRROR_RELATIVE
    dashboard_target = vault_root / SITIOWEB_DASHBOARD_RELATIVE
    legacy_dashboard_target = vault_root / LEGACY_SITIOWEB_DASHBOARD_RELATIVE
    root_dashboard_target = vault_root / ROOT_DASHBOARD_RELATIVE
    apogeo_docs_root = vault_root / APOGEOLUX_DOCS_RELATIVE
    apogeo_dashboard_target = vault_root / APOGEOLUX_DASHBOARD_RELATIVE
    if not is_guarded_mirror_target(mirror_target):
        raise SyncError(f"guard rail fallo: target no termina exactamente en {MIRROR_RELATIVE.as_posix()}")

    commit_hash = run_git(repo_root, ["rev-parse", "--short=12", "HEAD"])
    sync_time = dt.datetime.now().astimezone().isoformat(timespec="seconds")

    with tempfile.TemporaryDirectory(prefix="almadesign_docs_head_") as temp_name:
        staging_root = Path(temp_name)
        copied, skipped = materialize_head_docs(repo_root, staging_root)
        staging_docs = staging_root / "docs"
        if not staging_docs.is_dir():
            raise SyncError("git archive no genero docs/ en staging.")

        dashboard = build_dashboard(staging_docs, commit_hash, sync_time)
        apogeo_dashboard = None
        if apogeo_docs_root.is_dir():
            apogeo_dashboard = build_product_dashboard(
                apogeo_docs_root,
                APOGEOLUX_DOCS_RELATIVE,
                "Dashboard ApogeoLux",
                "Documento de soporte del producto ApogeoLux",
                sync_time,
            )
        root_dashboard = build_root_dashboard(apogeo_dashboard is not None, commit_hash, sync_time)

        if args.dry_run:
            print("DRY_RUN_ALMADESIGN_OBSIDIAN_DOCS")
            print(f"Repo root: {repo_root}")
            print(f"Vault root: {vault_root}")
            print(f"Mirror target: {mirror_target}")
            print(f"Dashboard target: {dashboard_target}")
            print(f"Legacy dashboard target: {legacy_dashboard_target}")
            print(f"Root dashboard target: {root_dashboard_target}")
            print(f"ApogeoLux dashboard target: {apogeo_dashboard_target}")
            print(f"ApogeoLux docs detectados: {'SI' if apogeo_dashboard is not None else 'NO'}")
            print(f"Commit HEAD: {commit_hash}")
            print(f"Archivos a copiar: {len(copied)}")
            print(f"Entradas excluidas: {len(skipped)}")
            return 0

        dashboard_target.parent.mkdir(parents=True, exist_ok=True)
        mirror_target.parent.mkdir(parents=True, exist_ok=True)
        root_dashboard_target.parent.mkdir(parents=True, exist_ok=True)
        apogeo_dashboard_target.parent.mkdir(parents=True, exist_ok=True)

        if mirror_target.exists():
            shutil.rmtree(mirror_target)
        shutil.copytree(staging_docs, mirror_target)
        dashboard_target.write_text(dashboard, encoding="utf-8")
        legacy_dashboard_target.write_text(dashboard, encoding="utf-8")
        if apogeo_dashboard is not None:
            apogeo_dashboard_target.write_text(apogeo_dashboard, encoding="utf-8")
        root_dashboard_target.write_text(root_dashboard, encoding="utf-8")

    print("SYNC_ALMADESIGN_OBSIDIAN_DOCS_OK")
    print(f"Fuente HEAD: {repo_root / 'docs'}")
    print(f"Mirror: {mirror_target}")
    print(f"Dashboard: {dashboard_target}")
    print(f"Dashboard raiz: {root_dashboard_target}")
    if apogeo_docs_root.is_dir():
        print(f"Dashboard ApogeoLux: {apogeo_dashboard_target}")
    print(f"Commit: {commit_hash}")
    return 0


def parse_args(argv: list[str]) -> argparse.Namespace:
    parser = argparse.ArgumentParser(description="Sync repo docs/ from HEAD to Obsidian mirror.")
    parser.add_argument("--from-head", action="store_true", help="sincroniza exclusivamente desde git HEAD")
    parser.add_argument("--dry-run", action="store_true", help="muestra acciones sin escribir en Obsidian")
    return parser.parse_args(argv)


def main(argv: list[str]) -> int:
    try:
        return sync(parse_args(argv))
    except SyncError as exc:
        print(f"ERROR: {exc}", file=sys.stderr)
        return 1


if __name__ == "__main__":
    raise SystemExit(main(sys.argv[1:]))
