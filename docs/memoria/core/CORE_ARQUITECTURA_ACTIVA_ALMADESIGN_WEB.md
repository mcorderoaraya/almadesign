# Nombre del archivo: CORE_ARQUITECTURA_ACTIVA_ALMADESIGN_WEB.md
# Ruta del archivo: ~/workspace/almadesign-web/docs/memoria/core/CORE_ARQUITECTURA_ACTIVA_ALMADESIGN_WEB.md
# Fecha de creación: 2026-05-02
# Explicación técnica breve: arquitectura activa vigente de AlmaDesign Web.

# Arquitectura Activa AlmaDesign Web

## Local WSL2

- Root local: `~/workspace/almadesign-web`.
- Front controller: `public/index.php`.
- MVC PHP liviano sin framework.
- Rutas principales: `/` y `/apogeo-lux`.
- Nginx local en puerto `8088`.
- PHP 8.3-FPM.
- No existe conexión de base de datos.
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
- PHPMailer instalado vía Composer.
- HOME_ALMADESIGN_FRONTEND_LOCAL: VALIDADO_POR_MAURICIO.
- HOME_VISUAL_GLOBAL: VALIDADO.
- CARDS_HOME_ALMADESIGN: VISUALMENTE_VALIDADAS.
- DEPLOY_FRONTEND_HOME: NO_EJECUTADO.
- HOME_PRODUCTIVO: NO_ACTUALIZADO_TODAVIA.
- SIGUIENTE_FRENTE_RECOMENDADO: PREPARAR_DEPLOY_CONTROLADO_FRONTEND_HOME_ALMADESIGN_WEB.

## Producción validada

- ALMADESIGN_WEB_PUBLICO: OPERATIVO.
- HOME_PRODUCTIVO: NO_ACTUALIZADO_TODAVIA respecto del Home frontend nuevo validado localmente.
- VPS: Hostinger KVM 2.
- OS: Ubuntu 24.04 LTS.
- Nginx: operativo.
- PHP: 8.3.
- Certbot SSL: operativo.
- Cloudflare proxy: activo.
- Zoho Mail: funcionando.
- SSH: usuario mauricio con clave.
- root SSH: bloqueado.
- UFW: activo.
- App root VPS: `/var/www/almadesign`.
- Backup root VPS: `/var/backups/almadesign`.
- GitHub repo: `https://github.com/mcorderoaraya/almadesign`.
- Branch deploy: `main`.
- HTTPS `https://almadesign.cl`: HTTP/2 200.
- HTTPS `https://www.almadesign.cl`: HTTP/2 200.
- HTTPS `https://almadesign.cl/apogeo-lux`: HTTP/2 200.
- Headers de seguridad: activos.
- Rollback: disponible.
- DEPLOY_CONTROLADO_ALMADESIGN_WEB_A_VPS: EJECUTADO_OK.

## Operación

- PREPARAR_BACKUPS_Y_OPERACION_ALMADESIGN_WEB: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- EJECUTAR_BACKUP_Y_HEALTHCHECK_ALMADESIGN_EN_VPS: EJECUTADO_OK.
- Script de backup versionado: `ops/almadesign_backup.sh`.
- Script de healthcheck versionado: `ops/almadesign_healthcheck.sh`.
- Runbook: `docs/gestion/RUNBOOK_OPERACION_ALMADESIGN_WEB.md`.
- Retención local definida: 14 días.
- Backup manual ejecutado correctamente en VPS.
- Healthcheck manual ejecutado correctamente en VPS.

## Separación

AlmaDesign Web es proyecto separado del backend técnico Apogeo Lux. No modifica `~/workspace/apogeo-lux/backend` ni evidencia técnica Apogeo Lux.

## Formulario productivo

- FORMULARIO_CONTACTO_ALMADESIGN_PRODUCTIVO: VALIDADO.
- DEPLOY_FORMULARIO_CONTACTO_ALMADESIGN: CERRADO_OK.
- SMTP_PRODUCTIVO_ZOHO: VALIDADO.
- CUERPO_CORREO_PRODUCTIVO: VALIDADO.
- Rutas: `/contacto`, `/contacto/enviar`, `/contacto/gracias`.
- Subject real: `Desde web almadesign`.
- From real controlado por servidor / `.env`.
- To controlado por `CONTACT_TO`.
- Reply-To configurado con email validado del usuario.
- REPLY_TO_PRODUCTIVO: PENDIENTE_CONFIRMACION_SECUNDARIA.
- Inputs inválidos no envían y no consumen rate limit.
- CSRF, honeypot, validación server-side, sanitización, rate limit y log mínimo activos.
- `vendor/PHPMailer` desplegado como dependencia runtime porque el VPS no tiene Composer.

## Assets públicos

- CACHE_BUSTING_ASSETS: ACTIVO.
- `asset()` usa `filemtime()` de archivos bajo `public/assets`.
- CSS productivo: `/assets/css/app.css?v=[filemtime]`.
- JS productivo: `/assets/js/app.js?v=[filemtime]`.
- HOTFIX_CACHE_BUSTING_ASSETS_ALMADESIGN: CERRADO_OK.
- CSS_PRODUCTIVO: CONFORME.
