# Nombre del archivo: CORE_FRENTES_ACTIVOS_ALMADESIGN_WEB.md
# Ruta del archivo: ~/workspace/almadesign-web/docs/memoria/core/CORE_FRENTES_ACTIVOS_ALMADESIGN_WEB.md
# Fecha de creación: 2026-05-02
# Explicación técnica breve: frentes activos de continuidad para AlmaDesign Web.

# Frentes Activos AlmaDesign Web

## Pendientes vigentes

- PREPARAR_DEPLOY_CONTROLADO_FRONTEND_HOME_ALMADESIGN_WEB.
- HARDENING_INFRA_CLOUDFLARE_NGINX_VPS_ALMADESIGN.

## Frentes completados

- CREAR_ESTRUCTURA_PHP_MVC_ALMADESIGN: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- CORREGIR_LANDING_APOGEO_LUX_ALMADESIGN: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- DEPLOY_CONTROLADO_ALMADESIGN_WEB_A_VPS: EJECUTADO_OK.
- BASE_SEGURIDAD_POST_SSL_ALMADESIGN: CONFIGURADA.
- HEADERS_SEGURIDAD: ACTIVOS.
- CLOUDFLARE_PROXY: ACTIVO.
- HTTPS_PUBLICO: OK.
- ROLLBACK_DISPONIBLE: TRUE.
- PREPARAR_BACKUPS_Y_OPERACION_ALMADESIGN_WEB: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- EJECUTAR_BACKUP_Y_HEALTHCHECK_ALMADESIGN_EN_VPS: EJECUTADO_OK.
- CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN: CONFIGURADO_LOCALMENTE_CON_OBSERVACIONES.
- APLICAR_FRONTEND_DESIGN_ALMADESIGN_WEB: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES.

## Deploy validado

- GitHub repo: `https://github.com/mcorderoaraya/almadesign`.
- Branch deploy: `main`.
- App root VPS: `/var/www/almadesign`.
- Backup root VPS: `/var/backups/almadesign`.
- Release temporal usado: `/tmp/almadesign_release_20260502_160657`.
- HTTPS `https://almadesign.cl`: HTTP/2 200.
- HTTPS `https://www.almadesign.cl`: HTTP/2 200.
- HTTPS `https://almadesign.cl/apogeo-lux`: HTTP/2 200.
- Cloudflare proxy activo.
- Headers de seguridad activos.
- Rollback disponible por backup en `/var/backups/almadesign`.

## Operación y backups preparados

- Script de backup: `ops/almadesign_backup.sh`.
- Script de healthcheck: `ops/almadesign_healthcheck.sh`.
- Runbook: `docs/gestion/RUNBOOK_OPERACION_ALMADESIGN_WEB.md`.
- Retención local: 14 días.
- Healthcheck manual ejecutado correctamente en VPS.
- Backup manual ejecutado correctamente en VPS.
- Próximo frente recomendado: HARDENING_INFRA_CLOUDFLARE_NGINX_VPS_ALMADESIGN.

## Estado formulario

- CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN: CONFIGURADO_LOCALMENTE_CON_OBSERVACIONES.
- CORREGIR_HONEYPOT_FORMULARIO_ALMADESIGN: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES.
- SMTP_ZOHO_AUTH_DIRECTA: VALIDADA.
- SMTP_CONNECT_AUTH_OK: CONFIRMADO.
- ENVIO_FORMULARIO_END_TO_END: VALIDADO_PRODUCTIVAMENTE.
- INCIDENTE_HONEYPOT_AUTOFILL: CERRADO_OK.
- BLOQUEO_ACTUAL_FORMULARIO: NINGUNO.
- DEPLOY_FORMULARIO_CONTACTO_ALMADESIGN: CERRADO_OK.
- Estado resumido: formulario productivo validado.
- Rutas locales agregadas: `/contacto`, `/contacto/enviar` y `/contacto/gracias`.
- PHPMailer instalado vía Composer.
- `.env.example` creado sin secretos reales.
- Formulario de contacto productivo validado: SMTP Zoho operativo, POST productivo OK, redirección a `/contacto/gracias` OK y cuerpo visual por línea confirmado por Mauricio.
- El problema observado no fue red, puerto, permisos ni autenticación SMTP.
- Campo honeypot ajustado localmente para reducir falsos positivos por autofill accidental.
- SMTP_PRODUCTIVO_ZOHO: VALIDADO.
- No hay base de datos.
- DEPLOY_FORMULARIO_CONTACTO_ALMADESIGN: CERRADO_OK.

## Estado frontend

- APLICAR_FRONTEND_DESIGN_ALMADESIGN_WEB: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES.
- CORREGIR_HALLAZGOS_WEB_DESIGN_GUIDELINES_ALMADESIGN: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES.
- Mejora visual aplicada localmente.
- Hallazgos de accesibilidad, foco visible, anclas sticky, motion safety y autocomplete corregidos localmente.
- Frontend base previo desplegado y validado productivamente.
- HOME_ALMADESIGN_FRONTEND_LOCAL: VALIDADO_POR_MAURICIO.
- HOME_VISUAL_GLOBAL: VALIDADO.
- CARDS_HOME_ALMADESIGN: VISUALMENTE_VALIDADAS.
- DEPLOY_FRONTEND_HOME: NO_EJECUTADO.
- HOME_PRODUCTIVO: NO_ACTUALIZADO_TODAVIA.
- FORMULARIO_CONTACTO_ALMADESIGN_PRODUCTIVO: VALIDADO.
- SMTP_PRODUCTIVO_ZOHO: VALIDADO.
- Siguiente frente recomendado: PREPARAR_DEPLOY_CONTROLADO_FRONTEND_HOME_ALMADESIGN_WEB.

## Separación obligatoria

AlmaDesign Web vive en `~/workspace/almadesign-web`. Apogeo Lux Gobernanza vive en `~/workspace/apogeo-lux/backend`.

## Fuera de alcance

- Apogeo Lux backend.
- GraphRAG.
- Neo4j.
- PostgreSQL Apogeo Lux.
- evidencia técnica Apogeo Lux.

## Frentes cerrados post formulario productivo

- VALIDAR_SMTP_ZOHO_FORMULARIO_CONTACTO_ALMADESIGN: CERRADO_OK.
- CORREGIR_VALIDACION_CAMPOS_Y_ASUNTO_INTERNO_FORMULARIO_ALMADESIGN: CERRADO_OK.
- CORREGIR_FORMATO_CORREO_Y_VALIDACION_INPUTS_FORMULARIO_ALMADESIGN: CERRADO_OK.
- CORREGIR_RENDERIZADO_FORMATO_CORREO_ALMADESIGN: CERRADO_OK.
- CORREGIR_RATE_LIMIT_Y_VALIDACION_PREVIA_ENVIO_FORMULARIO_ALMADESIGN: CERRADO_OK.
- AJUSTAR_REPLY_TO_USUARIO_FORMULARIO_ALMADESIGN: CERRADO_OK.
- HARDENING_APLICATIVO_FORMULARIO_Y_SUPERFICIE_PUBLICA_ALMADESIGN: CERRADO_OK.
- REANUDAR_DEPLOY_CONTROLADO_FORMULARIO_CONTACTO_ALMADESIGN_DESDE_COMMIT_a3fef94: CERRADO_OK_CON_HOTFIX_POSTERIOR.
- CORREGIR_REGRESION_CSS_POST_DEPLOY_ALMADESIGN: CERRADO_OK.
- HOTFIX_CACHE_BUSTING_ASSETS_ALMADESIGN: CERRADO_OK.

## Estado vigente para próximos frentes

- FORMULARIO_CONTACTO_ALMADESIGN_PRODUCTIVO: VALIDADO.
- SMTP_PRODUCTIVO_ZOHO: VALIDADO.
- CUERPO_CORREO_PRODUCTIVO: VALIDADO.
- HOME_ALMADESIGN_PRODUCTIVO_PREVIO: VALIDADO.
- HOME_PRODUCTIVO: NO_ACTUALIZADO_TODAVIA.
- FORMULARIO_VISUAL_PRODUCTIVO: VALIDADO.
- CSS_PRODUCTIVO: CONFORME.
- CACHE_BUSTING_ASSETS: ACTIVO.
- REPLY_TO_PRODUCTIVO: PENDIENTE_CONFIRMACION_SECUNDARIA.
- ROLLBACK_DISPONIBLE: SI.
- Siguiente frente recomendado: PREPARAR_DEPLOY_CONTROLADO_FRONTEND_HOME_ALMADESIGN_WEB.
