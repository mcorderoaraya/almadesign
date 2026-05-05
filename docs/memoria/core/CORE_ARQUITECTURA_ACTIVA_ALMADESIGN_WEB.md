# Nombre del archivo: CORE_ARQUITECTURA_ACTIVA_ALMADESIGN_WEB.md
# Ruta del archivo: ~/workspace/almadesign-web/docs/memoria/core/CORE_ARQUITECTURA_ACTIVA_ALMADESIGN_WEB.md
# Fecha de creación: 2026-05-02
# Explicación técnica breve: arquitectura activa vigente de AlmaDesign Web.

# Arquitectura Activa AlmaDesign Web

## Local WSL2

- Root local: `~/workspace/almadesign-web`.
- Front controller: `public/index.php`.
- MVC PHP liviano sin framework.
- Rutas principales locales: `/`, `/consultoria-ia-procesos`, `/apogeo`, `/ai-for-humans`, `/apogeo-lux`, `/contacto`, `/contacto/enviar` y `/contacto/gracias`.
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
- DEPLOY_FRONTEND_HOME: DESPLEGADO_Y_VALIDADO_HTTP.
- HOME_PRODUCTIVO: DESPLEGADO_Y_VALIDADO_HTTP.
- SIGUIENTE_FRENTE_RECOMENDADO: VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO.
- APOGEO_CONOCIMIENTO_AUMENTADO_RAGK: DESPLEGADO_Y_VALIDADO_HTTP.
- DEPLOY_CONTROLADO_FRONTEND_HOME_APOGEO_Y_CONSULTORIA_ALMADESIGN_WEB: EJECUTADO_OK.
- HASH_DEPLOY_FRONTEND: e33447ab3e2298a6b7ae0a1c7e80743d0c89372d.
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
- `/apogeo` usa `ContentController::apogeo()` y `app/Views/pages/vertical-detail.php`.
- `/apogeo` incluye hero extendido, arquitecturas Apogeo, cards ejecutivas, infografía RAGK, concepto gerencial RAGK, límites explícitos y CTA final.

## Producción validada

- ALMADESIGN_WEB_PUBLICO: OPERATIVO.
- HOME_PRODUCTIVO: DESPLEGADO_Y_VALIDADO_HTTP respecto del Home frontend nuevo validado localmente.
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
- Cards Home vigentes en WebP: `public/assets/img/cards/consultoria-ia-procesos.webp`, `public/assets/img/cards/apogeo.webp` y `public/assets/img/cards/ai-for-humans.webp`.
- Cards arquitectura Apogeo vigentes en WebP: `public/assets/img/apogeo/apogeo-rag-card.webp`, `public/assets/img/apogeo/apogeo-graphrag-card.webp` y `public/assets/img/apogeo/apogeo-ragk-card.webp`.
- Infografía RAGK vigente: `public/assets/img/apogeo/infografia-ragk.webp`.
