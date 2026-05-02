# Nombre del archivo: CORE_FRENTES_ACTIVOS_ALMADESIGN_WEB.md
# Ruta del archivo: ~/workspace/almadesign-web/docs/memoria/core/CORE_FRENTES_ACTIVOS_ALMADESIGN_WEB.md
# Fecha de creación: 2026-05-02
# Explicación técnica breve: frentes activos de continuidad para AlmaDesign Web.

# Frentes Activos AlmaDesign Web

## Pendientes vigentes

- VALIDAR_SMTP_ZOHO_FORMULARIO_CONTACTO_ALMADESIGN.
- PREPARAR_DEPLOY_CONTROLADO_FORMULARIO_CONTACTO_ALMADESIGN.

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
- Próximo frente recomendado: VALIDAR_SMTP_ZOHO_FORMULARIO_CONTACTO_ALMADESIGN y luego PREPARAR_DEPLOY_CONTROLADO_FORMULARIO_CONTACTO_ALMADESIGN.

## Estado formulario

- CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN: CONFIGURADO_LOCALMENTE_CON_OBSERVACIONES.
- CORREGIR_HONEYPOT_FORMULARIO_ALMADESIGN: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES.
- SMTP_ZOHO_AUTH_DIRECTA: VALIDADA.
- SMTP_CONNECT_AUTH_OK: CONFIRMADO.
- ENVIO_FORMULARIO_END_TO_END: NO_VALIDADO.
- BLOQUEO_ULTIMA_PRUEBA_FORMULARIO: `honeypot_blocked`.
- BLOQUEO_ACTUAL_FORMULARIO: `honeypot_blocked` como último bloqueo observado antes del ajuste local; requiere revalidación end-to-end.
- FORMULARIO_DEPLOY: NO_EJECUTADO.
- Estado resumido: formulario no desplegado.
- Rutas locales agregadas: `/contacto`, `/contacto/enviar` y `/contacto/gracias`.
- PHPMailer instalado vía Composer.
- `.env.example` creado sin secretos reales.
- Formulario de contacto configurado localmente; SMTP Zoho autentica correctamente en prueba directa, pero el envío end-to-end del formulario NO está validado porque la última prueba previa al ajuste del honeypot fue bloqueada por falso positivo del honeypot (`honeypot_blocked`). El formulario no está desplegado en VPS.
- El problema observado no fue red, puerto, permisos ni autenticación SMTP.
- Campo honeypot ajustado localmente para reducir falsos positivos por autofill accidental.
- SMTP Zoho real sigue pendiente de validación por envío de formulario.
- No hay base de datos.
- No hay deploy de este frente todavía.

## Estado frontend

- APLICAR_FRONTEND_DESIGN_ALMADESIGN_WEB: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES.
- CORREGIR_HALLAZGOS_WEB_DESIGN_GUIDELINES_ALMADESIGN: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES.
- Mejora visual aplicada localmente.
- Hallazgos de accesibilidad, foco visible, anclas sticky, motion safety y autocomplete corregidos localmente.
- No hay deploy de esta mejora todavía.
- El formulario sigue sin deploy.
- SMTP Zoho real sigue pendiente de validar.
- Siguiente frente recomendado: VALIDAR_SMTP_ZOHO_FORMULARIO_CONTACTO_ALMADESIGN.
- PREPARAR_DEPLOY_CONTROLADO_FORMULARIO_CONTACTO_ALMADESIGN: PENDIENTE_POST_SMTP_END_TO_END.

## Separación obligatoria

AlmaDesign Web vive en `~/workspace/almadesign-web`. Apogeo Lux Gobernanza vive en `~/workspace/apogeo-lux/backend`.

## Fuera de alcance

- Apogeo Lux backend.
- GraphRAG.
- Neo4j.
- PostgreSQL Apogeo Lux.
- evidencia técnica Apogeo Lux.
