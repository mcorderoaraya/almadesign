# Nombre del archivo: RUNBOOK_OPERACION_ALMADESIGN_WEB.md
# Ruta del archivo: ~/workspace/almadesign-web/docs/gestion/RUNBOOK_OPERACION_ALMADESIGN_WEB.md
# Fecha de creación: 2026-05-02
# Explicación técnica breve: runbook mínimo de operación, healthcheck, backups y rollback para AlmaDesign Web.

# Runbook Operación AlmaDesign Web

## Estado actual

- Sitio productivo: `https://almadesign.cl`.
- Landing Apogeo Lux: `https://almadesign.cl/apogeo-lux`.
- HOME_ALMADESIGN_FRONTEND_LOCAL: VALIDADO_POR_MAURICIO.
- HOME_VISUAL_GLOBAL: VALIDADO.
- CARDS_HOME_ALMADESIGN: VISUALMENTE_VALIDADAS.
- DEPLOY_FRONTEND_HOME: DESPLEGADO_Y_VALIDADO_HTTP.
- HOME_PRODUCTIVO: DESPLEGADO_Y_VALIDADO_HTTP.
- APOGEO_CONOCIMIENTO_AUMENTADO_RAGK: DESPLEGADO_Y_VALIDADO_HTTP.
- APOGEO_PRODUCTIVO: DESPLEGADO_Y_VALIDADO_HTTP.
- DEPLOY_CONTROLADO_FRONTEND_HOME_APOGEO_Y_CONSULTORIA_ALMADESIGN_WEB: EJECUTADO_OK.
- HASH_DEPLOY_FRONTEND: e33447ab3e2298a6b7ae0a1c7e80743d0c89372d.
- HOME_PRODUCTIVO: DESPLEGADO_Y_VALIDADO_HTTP.
- APOGEO_PRODUCTIVO: DESPLEGADO_Y_VALIDADO_HTTP.
- CONSULTORIA_BLOQUE_EL_PROBLEMA: REMOVIDO_EN_PRODUCCION.
- TEXTO_EL_PROBLEMA_CONSULTORIA: AUSENTE_EN_PRODUCCION.
- BACKUP_PRE_DEPLOY_FRONTEND: `/var/backups/almadesign/almadesign_backup_20260505_142352.tar.gz`.
- CHECKSUM_BACKUP_PRE_DEPLOY_FRONTEND: OK.
- HEALTHCHECK_POST_DEPLOY_FRONTEND: OK.
- RUTAS_PRODUCTIVAS_POST_DEPLOY_FRONTEND: HTTP_200.
- ASSETS_HOME_APOGEO_POST_DEPLOY: HTTP_200.
- HOME_VISUAL_LOCAL: VALIDADO_POR_MAURICIO.
- HOME_VISUAL_PRODUCTIVO: PENDIENTE_REVISION_MANUAL_MAURICIO.
- APOGEO_VISUAL_PRODUCTIVO: PENDIENTE_REVISION_MANUAL_MAURICIO.
- SIGUIENTE_FRENTE_RECOMENDADO: VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO.
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

## Rutas locales vigentes en repo

- `/`
- `/consultoria-ia-procesos`
- `/apogeo`
- `/ai-for-humans`
- `/apogeo-lux`
- `/contacto`
- `/contacto/enviar`
- `/contacto/gracias`

La ruta `/apogeo` nueva está validada productivamente por HTTP. La revisión visual productiva queda pendiente de VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO.

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

## Backup externo/offline

### Estado actual

- Backup local: `/var/backups/almadesign`.
- Script actual: `ops/almadesign_backup.sh`.
- Retención local: 14 días.
- Checksum `.sha256`: SI.
- Rollback local documentado: SI.
- Backup externo: NO IMPLEMENTADO.
- Backup offline: NO IMPLEMENTADO.

### Principio

El backup local sirve para rollback rápido, pero no protege contra pérdida total del VPS, ransomware, borrado accidental del proveedor o compromiso completo del servidor.

Obsidian NO es backup productivo del servidor. Obsidian es navegación documental y mirror de lectura.

El repo Git NO debe contener secretos ni backups productivos.

### Estrategia de tres capas

Capa A — Local VPS:

- Mantener `/var/backups/almadesign`.
- Mantener generación de `sha256`.
- Mantener retención de 14 días.
- Usar para rollback rápido.

Capa B — Externo cifrado:

- Mantener una copia cifrada fuera del VPS.
- Proveedor pendiente de decisión.
- Opciones futuras: object storage, cloud compatible con `rclone`/`restic` o servidor externo controlado.
- No guardar secretos en texto plano.
- No subir backups externos hasta definir proveedor, herramienta, cifrado y retención.

Capa C — Offline:

- Mantener una copia mensual o por hito estable en disco externo cifrado.
- El disco debe permanecer desconectado cuando no se use.
- No reemplaza el backup externo automatizable.

### Política de secretos

- `.env` no debe entrar al backup normal en texto plano.
- `SMTP_PASSWORD` no debe guardarse en repo, Obsidian ni logs.
- La recuperación de secretos debe hacerse mediante password manager, archivo cifrado fuera del VPS o procedimiento manual seguro.
- No documentar valores reales.
- No guardar llaves privadas en repo ni en Obsidian.

### Política de retención propuesta

- Local VPS: 14 días.
- Externo cifrado: 4 copias semanales + 3 mensuales.
- Offline: 1 mensual o 1 por hito estable.

### Prueba de restauración no destructiva

1. Descargar o disponer del backup externo en un entorno temporal.
2. Verificar checksum:

```bash
sha256sum -c almadesign_backup_YYYYMMDD_HHMMSS.tar.gz.sha256
```

3. Extraer en `/tmp/almadesign_restore_test` o entorno local:

```bash
mkdir -p /tmp/almadesign_restore_test
tar -xzf almadesign_backup_YYYYMMDD_HHMMSS.tar.gz -C /tmp/almadesign_restore_test
```

4. Confirmar presencia de:

- `public/index.php`.
- `app/`.
- `ops/`.
- `docs/`.
- `composer.json`.
- `composer.lock`.

5. Confirmar política sobre `vendor`/PHPMailer:

- `vendor` actualmente puede reconstruirse desde repo/deploy o debe definirse como dependencia incluida según decisión futura.

6. No restaurar sobre producción durante la prueba.
7. No probar secretos reales.

### Brechas abiertas

- Backup externo cifrado pendiente.
- Backup offline pendiente.
- Procedimiento formal de recuperación de `.env` pendiente.
- Prueba de restore externo pendiente.
- Política final Composer/vendor pendiente.

### Próximo frente recomendado

`IMPLEMENTAR_BACKUP_EXTERNO_CIFRADO_ALMADESIGN`.

Ejecutar solo después de que Mauricio decida:

- Proveedor/destino externo.
- Herramienta: `restic`, `rclone` o manual.
- Política de cifrado.
- Política de secretos.
- Frecuencia y retención.

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
- Los wikilinks generados en dashboards Obsidian usan rutas vault-relative completas, sin extensión `.md`.

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
- HOME_ALMADESIGN_PRODUCTIVO_PREVIO: VALIDADO.
- HOME_PRODUCTIVO: DESPLEGADO_Y_VALIDADO_HTTP.
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
