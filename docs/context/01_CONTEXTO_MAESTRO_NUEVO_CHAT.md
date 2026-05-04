# Nombre del archivo: 01_CONTEXTO_MAESTRO_NUEVO_CHAT.md
# Ruta del archivo: ~/workspace/almadesign-web/docs/context/01_CONTEXTO_MAESTRO_NUEVO_CHAT.md
# Fecha de creación: 2026-05-02
# Explicación técnica breve: contexto maestro para continuar AlmaDesign Web en nuevos chats.

# Contexto Maestro Nuevo Chat AlmaDesign Web

Trabajar sobre AlmaDesign Web, proyecto comercial separado del backend técnico Apogeo Lux.

## Rutas correctas

- AlmaDesign Web: `~/workspace/almadesign-web`.
- Apogeo Lux Gobernanza: `~/workspace/apogeo-lux/backend`.

## Estado público

- ALMADESIGN_WEB_PUBLICO: OPERATIVO.
- Dominio productivo: `almadesign.cl`.
- GitHub repo: `https://github.com/mcorderoaraya/almadesign`.
- Branch deploy: `main`.
- App root VPS: `/var/www/almadesign`.
- Backup root VPS: `/var/backups/almadesign`.

## Infraestructura validada

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
- Headers de seguridad: activos.
- Rollback: disponible.

## HTTPS validado

- `https://almadesign.cl`: HTTP/2 200.
- `https://www.almadesign.cl`: HTTP/2 200.
- `https://almadesign.cl/apogeo-lux`: HTTP/2 200.

## Frentes completados

- CREAR_ESTRUCTURA_PHP_MVC_ALMADESIGN: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- CORREGIR_LANDING_APOGEO_LUX_ALMADESIGN: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- DEPLOY_CONTROLADO_ALMADESIGN_WEB_A_VPS: EJECUTADO_OK.
- PREPARAR_BACKUPS_Y_OPERACION_ALMADESIGN_WEB: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- EJECUTAR_BACKUP_Y_HEALTHCHECK_ALMADESIGN_EN_VPS: EJECUTADO_OK.

## Operación

- Script de backup versionado: `ops/almadesign_backup.sh`.
- Script de healthcheck versionado: `ops/almadesign_healthcheck.sh`.
- Runbook: `docs/gestion/RUNBOOK_OPERACION_ALMADESIGN_WEB.md`.
- Retención local definida: 14 días.
- Healthcheck manual ejecutado correctamente en VPS.
- Backup manual ejecutado correctamente en VPS.

## Formulario

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
- Rutas locales agregadas: `/contacto`, `/contacto/enviar` y `/contacto/gracias`.
- PHPMailer instalado vía Composer.
- `.env.example` creado sin secretos reales.
- `.env` real no versionado.
- No hay base de datos.
- Siguiente frente recomendado: PREPARAR_DEPLOY_CONTROLADO_FRONTEND_HOME_ALMADESIGN_WEB.
- Frente futuro recomendado: HARDENING_INFRA_CLOUDFLARE_NGINX_VPS_ALMADESIGN.

## Estado Home frontend nuevo validado localmente

- HOME_ALMADESIGN_FRONTEND_LOCAL: VALIDADO_POR_MAURICIO.
- HOME_VISUAL_GLOBAL: VALIDADO.
- CARDS_HOME_ALMADESIGN: VISUALMENTE_VALIDADAS.
- DEPLOY_FRONTEND_HOME: NO_EJECUTADO.
- HOME_PRODUCTIVO: NO_ACTUALIZADO_TODAVIA.
- SIGUIENTE_FRENTE_RECOMENDADO: PREPARAR_DEPLOY_CONTROLADO_FRONTEND_HOME_ALMADESIGN_WEB.
- No afirmar validación del Home nuevo en `almadesign.cl` hasta deploy controlado.

## Restricciones de traspaso

- No tocar `~/workspace/apogeo-lux/backend`.
- No tocar VPS, Cloudflare, Zoho, DNS, SSL, Nginx, `.env`, llaves SSH, base de datos, Composer, WordPress, Docker ni cPanel.
- No tratar GraphRAG del backend Apogeo Lux como alcance de AlmaDesign Web.

## Estado post deploy formulario validado

- FORMULARIO_CONTACTO_ALMADESIGN_PRODUCTIVO: VALIDADO.
- DEPLOY_FORMULARIO_CONTACTO_ALMADESIGN: CERRADO_OK.
- SMTP_PRODUCTIVO_ZOHO: VALIDADO.
- CUERPO_CORREO_PRODUCTIVO: VALIDADO.
- HOME_ALMADESIGN_PRODUCTIVO_PREVIO: VALIDADO.
- HOME_PRODUCTIVO: NO_ACTUALIZADO_TODAVIA.
- FORMULARIO_VISUAL_PRODUCTIVO: VALIDADO.
- POST productivo OK y redirección a `/contacto/gracias` OK.
- Subject real: `Desde web almadesign`, definido en servidor y no manipulable por POST.
- From real controlado por servidor / `.env`; To controlado por `CONTACT_TO`.
- Reply-To configurado con email validado del usuario.
- REPLY_TO_PRODUCTIVO: PENDIENTE_CONFIRMACION_SECUNDARIA.
- HOTFIX_CACHE_BUSTING_ASSETS_ALMADESIGN: CERRADO_OK.
- CSS_PRODUCTIVO: CONFORME.
- CACHE_BUSTING_ASSETS: ACTIVO mediante `asset()` con `filemtime()`.
- Commit deploy formulario/hardening: `a3fef94`.
- Commit hotfix cache busting: `bb1dfa4`.
- Backup manual validado: `/var/backups/almadesign/almadesign_backup_20260502_220213.tar.gz`.
- Rollback disponible: SI.
