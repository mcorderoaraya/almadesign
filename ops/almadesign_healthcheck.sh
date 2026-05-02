#!/usr/bin/env bash
set -euo pipefail

APP_INDEX="/var/www/almadesign/public/index.php"
BACKUP_ROOT="/var/backups/almadesign"
MIN_FREE_MB=1024

fail() {
    echo "ERROR: $*" >&2
    exit 1
}

check_service_active() {
    local service="$1"

    systemctl is-active --quiet "$service" || fail "servicio no activo: $service"
    echo "OK servicio activo: $service"
}

check_http_status() {
    local label="$1"
    local expected="$2"
    shift 2

    local status
    status="$(curl -sS -o /dev/null -w "%{http_code}" "$@")"

    [[ "$status" == "$expected" ]] || fail "$label devolvió HTTP $status, esperado $expected"
    echo "OK $label: HTTP $status"
}

check_http_status_any() {
    local label="$1"
    shift

    local status
    status="$(curl -sS -o /dev/null -w "%{http_code}" "$@")"

    case "$status" in
        200|301|302|308)
            echo "OK $label: HTTP $status"
            ;;
        *)
            fail "$label devolvió HTTP $status"
            ;;
    esac
}

check_service_active "nginx"
check_service_active "php8.3-fpm"
check_service_active "fail2ban"

[[ -f "$APP_INDEX" ]] || fail "no existe $APP_INDEX"
echo "OK existe $APP_INDEX"

check_http_status_any "local almadesign.cl" -H "Host: almadesign.cl" "http://127.0.0.1/"
check_http_status "https almadesign.cl" "200" "https://almadesign.cl/"
check_http_status "https www.almadesign.cl" "200" "https://www.almadesign.cl/"
check_http_status "https almadesign.cl/apogeo-lux" "200" "https://almadesign.cl/apogeo-lux"

free_mb="$(df -Pm /var/www /var/backups | awk 'NR > 1 { if (min == "" || $4 < min) min = $4 } END { print min }')"
[[ -n "$free_mb" ]] || fail "no se pudo calcular espacio libre"
[[ "$free_mb" -ge "$MIN_FREE_MB" ]] || fail "espacio libre bajo: ${free_mb} MB"
echo "OK espacio libre mínimo: ${free_mb} MB"

[[ -d "$BACKUP_ROOT" ]] || fail "no existe $BACKUP_ROOT"
find "$BACKUP_ROOT" -maxdepth 1 -type f -name "almadesign_backup_*.tar.gz" | grep -q . || fail "no hay backups en $BACKUP_ROOT"
echo "OK existen backups en $BACKUP_ROOT"

certbot certificates >/dev/null
echo "OK certbot certificates responde"

echo "HEALTHCHECK_ALMADESIGN_OK"
