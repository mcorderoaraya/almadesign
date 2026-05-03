# Nombre del archivo: RUNBOOK_OPERACION_ALMADESIGN_WEB.md
# Ruta del archivo: ~/workspace/almadesign-web/docs/gestion/RUNBOOK_OPERACION_ALMADESIGN_WEB.md
# Fecha de creación: 2026-05-02
# Explicación técnica breve: runbook mínimo de operación, healthcheck, backups y rollback para AlmaDesign Web.

# Runbook Operación AlmaDesign Web

## Estado actual

- Sitio productivo: `https://almadesign.cl`.
- Landing Apogeo Lux: `https://almadesign.cl/apogeo-lux`.
- VPS: Hostinger KVM 2 con Ubuntu 24.04 LTS.
- Web server: Nginx.
- Runtime: PHP 8.3-FPM.
- SSL: Certbot.
- Cloudflare proxy: activo.
- Zoho Mail: funcionando.
- Deploy desde GitHub `main`: `https://github.com/mcorderoaraya/almadesign`.
- App root VPS: `/var/www/almadesign`.
- Backup root VPS: `/var/backups/almadesign`.
- Rollback disponible por backups locales.
- PREPARAR_BACKUPS_Y_OPERACION_ALMADESIGN_WEB: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- EJECUTAR_BACKUP_Y_HEALTHCHECK_ALMADESIGN_EN_VPS: EJECUTADO_OK.
- Backup manual ejecutado correctamente en VPS.
- Healthcheck manual ejecutado correctamente en VPS.
- CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN: CONFIGURADO_LOCALMENTE_CON_OBSERVACIONES.
- CORREGIR_HONEYPOT_FORMULARIO_ALMADESIGN: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES.
- SMTP_ZOHO_AUTH_DIRECTA: VALIDADA.
- SMTP_CONNECT_AUTH_OK: CONFIRMADO.
- ENVIO_FORMULARIO_END_TO_END: VALIDADO_PRODUCTIVAMENTE.
- INCIDENTE_HONEYPOT_AUTOFILL: CERRADO_OK.
- BLOQUEO_ACTUAL_FORMULARIO: NINGUNO.
- DEPLOY_FORMULARIO_CONTACTO_ALMADESIGN: CERRADO_OK.
- Estado resumido: formulario productivo validado.
- Formulario de contacto productivo validado: SMTP Zoho operativo, POST productivo OK, redirección a `/contacto/gracias` OK y cuerpo visual por línea confirmado por Mauricio.
- El problema observado no fue red, puerto, permisos ni autenticación SMTP.

## Acceso SSH

```bash
ssh almadesign-vps
```

## Rutas críticas

- App root: `/var/www/almadesign`.
- Backups: `/var/backups/almadesign`.
- Nginx site: `/etc/nginx/sites-available/almadesign`.
- Headers de seguridad: `/etc/nginx/snippets/almadesign-security-headers.conf`.
- Performance Nginx: `/etc/nginx/snippets/almadesign-performance.conf`.
- Fail2ban jail: `/etc/fail2ban/jail.d/almadesign.local`.

## Backup

Copiar o mantener el script versionado en el VPS y ejecutar:

```bash
sudo bash /var/www/almadesign/ops/almadesign_backup.sh
```

El script:

- Respalda `/var/www/almadesign`.
- Respalda configuración Nginx relevante.
- Respalda jail Fail2ban si existe.
- Excluye `.env`, `.env.*`, logs reales, storage runtime, `node_modules`, `vendor` y `*.log`.
- Genera `sha256`.
- Aplica retención local de 14 días.
- Termina con `BACKUP_ALMADESIGN_OK` si todo está correcto.

## Healthcheck

Ejecutar:

```bash
sudo bash /var/www/almadesign/ops/almadesign_healthcheck.sh
```

El script valida:

- `nginx` activo.
- `php8.3-fpm` activo.
- `fail2ban` activo.
- HTTP local con Host `almadesign.cl`.
- HTTPS público `almadesign.cl`, `www.almadesign.cl` y `/apogeo-lux`.
- Espacio en disco mínimo.
- Existencia de `/var/www/almadesign/public/index.php`.
- Existencia de backups en `/var/backups/almadesign`.
- Estado observable de `certbot certificates`.

No ejecuta `certbot renew --dry-run` en cada corrida.

## Sincronización docs hacia Obsidian

- Fuente: `~/workspace/almadesign-web/docs`.
- Destino: `<VAULT_ROOT>/04_almadesign/productos/SitioWeb/docs`.
- Dashboard SitioWeb: `<VAULT_ROOT>/04_almadesign/productos/SitioWeb/DASHBOARD.md`.
- Dashboard raíz AlmaDesign: `<VAULT_ROOT>/04_almadesign/DASHBOARD.md`.
- Dirección: repo `docs/` -> Obsidian.
- Regla: Obsidian es mirror de lectura. Editar la fuente real en repo `docs/`.
- El dashboard raíz AlmaDesign conecta las rutas documentales `<VAULT_ROOT>/04_almadesign/productos/ApogeoLux/docs` y `<VAULT_ROOT>/04_almadesign/productos/SitioWeb/docs`.

Instalación:

```bash
export ALMADESIGN_OBSIDIAN_VAULT_ROOT="/mnt/c/Vaults/agendaProfesional"
bash ops/almadesign_install_obsidian_docs_hook.sh
```

Ejecución manual:

```bash
python3 ops/almadesign_sync_docs_to_obsidian.py --from-head
```

## Rollback

1. Entrar al VPS:

```bash
ssh almadesign-vps
```

2. Listar backups:

```bash
sudo ls -lah /var/backups/almadesign
```

3. Verificar checksum del backup elegido:

```bash
cd /var/backups/almadesign
sudo sha256sum -c almadesign_backup_YYYYMMDD_HHMMSS.tar.gz.sha256
```

4. Crear resguardo rápido del estado actual antes de restaurar:

```bash
sudo bash /var/www/almadesign/ops/almadesign_backup.sh
```

5. Restaurar en un directorio temporal:

```bash
sudo mkdir -p /tmp/almadesign_restore
sudo tar -xzf /var/backups/almadesign/almadesign_backup_YYYYMMDD_HHMMSS.tar.gz -C /tmp/almadesign_restore
```

6. Restaurar sitio:

```bash
sudo rsync -a --delete /tmp/almadesign_restore/site/ /var/www/almadesign/
```

7. Validar y recargar servicios:

```bash
sudo nginx -t
sudo systemctl reload nginx
sudo systemctl restart php8.3-fpm
sudo bash /var/www/almadesign/ops/almadesign_healthcheck.sh
```

## Qué NO tocar

- Zoho MX/TXT.
- Cloudflare DNS sin razón.
- Apogeo Lux backend.
- `.env` / llaves SSH.
- Certbot SSL manualmente sin ventana de mantenimiento.
- Base de datos, formularios, Composer, WordPress, Docker o cPanel en este frente.

## Rutina semanal recomendada

- Ejecutar healthcheck.
- Confirmar que existe al menos un backup reciente.
- Ejecutar backup manual antes de cambios relevantes.
- Revisar espacio en disco.
- Revisar estado de certificados con `sudo certbot certificates`.
- Revisar logs de Nginx solo si hay incidente.
- Confirmar que GitHub `main` coincide con el código desplegado.

## Próximo frente recomendado

- HARDENING_INFRA_CLOUDFLARE_NGINX_VPS_ALMADESIGN.

## Estado post deploy formulario

- FORMULARIO_CONTACTO_ALMADESIGN_PRODUCTIVO: VALIDADO.
- DEPLOY_FORMULARIO_CONTACTO_ALMADESIGN: CERRADO_OK.
- SMTP_PRODUCTIVO_ZOHO: VALIDADO.
- CUERPO_CORREO_PRODUCTIVO: VALIDADO.
- HOME_ALMADESIGN_PRODUCTIVO: VALIDADO.
- FORMULARIO_VISUAL_PRODUCTIVO: VALIDADO.
- HOTFIX_CACHE_BUSTING_ASSETS_ALMADESIGN: CERRADO_OK.
- CORREGIR_REGRESION_CSS_POST_DEPLOY_ALMADESIGN: CERRADO_OK.
- CSS_PRODUCTIVO: CONFORME.
- CACHE_BUSTING_ASSETS: ACTIVO.
- Commit deploy formulario/hardening: `a3fef94`.
- Commit hotfix cache busting: `bb1dfa4`.
- Backup manual validado: `/var/backups/almadesign/almadesign_backup_20260502_220213.tar.gz`.
- Checksum backup: OK.
- Rollback disponible: SI.
- `vendor/PHPMailer` desplegado como dependencia runtime porque el VPS no tiene Composer.
- Healthcheck productivo ejecutado con observación operacional: `certbot certificates` requiere permisos elevados cuando se ejecuta sin `sudo`.
- Nginx, Cloudflare, Zoho DNS y SSL no fueron modificados durante el hotfix.
