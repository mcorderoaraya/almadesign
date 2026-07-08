#!/usr/bin/env bash
set -euo pipefail

VAULT_ENV="ALMADESIGN_OBSIDIAN_VAULT_ROOT"
FALLBACK_VAULT_ROOT="/mnt/c/Vaults/agendaProfesional"

fail() {
    echo "ERROR: $*" >&2
    exit 1
}

repo_root="$(git rev-parse --show-toplevel 2>/dev/null)" || fail "este instalador debe ejecutarse dentro del repo AlmaDesign Web"
cd "$repo_root"

sync_script="ops/almadesign_sync_docs_to_obsidian.py"
[[ -f "$sync_script" ]] || fail "no existe $sync_script"

vault_root="${!VAULT_ENV:-}"
if [[ -z "$vault_root" ]]; then
    vault_root="$FALLBACK_VAULT_ROOT"
fi
[[ -d "$vault_root" ]] || fail "no se encontro vault Obsidian. Define ${VAULT_ENV} o crea ${FALLBACK_VAULT_ROOT}"

hook_path=".git/hooks/post-commit"
marker="ALMADESIGN_OBSIDIAN_DOCS_SYNC"

if [[ -f "$hook_path" ]] && ! grep -q "$marker" "$hook_path"; then
    backup_path="${hook_path}.bak.$(date +%Y%m%d_%H%M%S)"
    cp "$hook_path" "$backup_path"
    echo "Hook post-commit existente respaldado en $backup_path"
fi

cat > "$hook_path" <<'HOOK'
#!/usr/bin/env bash
set -u

# ALMADESIGN_OBSIDIAN_DOCS_SYNC
repo_root="$(git rev-parse --show-toplevel 2>/dev/null)"
if [[ -z "$repo_root" ]]; then
    echo "ERROR: no se pudo detectar la raiz del repo para sincronizar docs a Obsidian." >&2
    exit 1
fi

cd "$repo_root" || {
    echo "ERROR: no se pudo entrar al repo para sincronizar docs a Obsidian: $repo_root" >&2
    exit 1
}

if ! python3 ops/almadesign_sync_docs_to_obsidian.py --from-head; then
    echo "ERROR: post-commit creo el commit, pero fallo la sync docs -> Obsidian." >&2
    exit 1
fi
HOOK

chmod +x "$hook_path"

echo "HOOK_ALMADESIGN_OBSIDIAN_DOCS_INSTALADO"
echo "Repo: $repo_root"
echo "Vault: $vault_root"
echo "Hook: $hook_path"
