#!/usr/bin/env bash
set -euo pipefail

APP_ROOT="/var/www/almadesign"
BACKUP_ROOT="/var/backups/almadesign"
STAMP="$(date +%Y%m%d_%H%M%S)"
WORK_DIR="${BACKUP_ROOT}/tmp_${STAMP}"
BACKUP_FILE="${BACKUP_ROOT}/almadesign_backup_${STAMP}.tar.gz"
CHECKSUM_FILE="${BACKUP_FILE}.sha256"
RETENTION_DAYS=14

require_path() {
    local path="$1"

    if [[ ! -e "$path" ]]; then
        echo "ERROR: ruta requerida no existe: $path" >&2
        exit 1
    fi
}

copy_if_exists() {
    local source="$1"
    local target_dir="$2"

    if [[ -e "$source" ]]; then
        mkdir -p "$target_dir"
        cp -a "$source" "$target_dir/"
    fi
}

require_path "$APP_ROOT"
mkdir -p "$BACKUP_ROOT" "$WORK_DIR/site" "$WORK_DIR/nginx" "$WORK_DIR/fail2ban"

rsync -a \
    --exclude ".git" \
    --exclude ".env" \
    --exclude ".env.*" \
    --exclude "logs/*" \
    --exclude "storage/*" \
    --exclude "*.log" \
    --exclude "node_modules" \
    --exclude "vendor" \
    "$APP_ROOT"/ "$WORK_DIR/site"/

copy_if_exists "/etc/nginx/nginx.conf" "$WORK_DIR/nginx"
copy_if_exists "/etc/nginx/sites-available/almadesign" "$WORK_DIR/nginx/sites-available"
copy_if_exists "/etc/nginx/snippets/almadesign-security-headers.conf" "$WORK_DIR/nginx/snippets"
copy_if_exists "/etc/nginx/snippets/almadesign-performance.conf" "$WORK_DIR/nginx/snippets"
copy_if_exists "/etc/fail2ban/jail.d/almadesign.local" "$WORK_DIR/fail2ban/jail.d"

tar -C "$WORK_DIR" -czf "$BACKUP_FILE" .
sha256sum "$BACKUP_FILE" > "$CHECKSUM_FILE"

rm -rf "$WORK_DIR"
find "$BACKUP_ROOT" -maxdepth 1 -type f \( -name "almadesign_backup_*.tar.gz" -o -name "almadesign_backup_*.tar.gz.sha256" \) -mtime +"$RETENTION_DAYS" -delete

echo "Backup generado: $BACKUP_FILE"
echo "Checksum generado: $CHECKSUM_FILE"
echo "BACKUP_ALMADESIGN_OK"
