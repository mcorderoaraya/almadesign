# Nombre del archivo: CORE_FRENTES_ACTIVOS_ALMADESIGN_WEB.md
# Ruta del archivo: ~/workspace/almadesign-web/docs/memoria/core/CORE_FRENTES_ACTIVOS_ALMADESIGN_WEB.md
# Fecha de creación: 2026-05-02
# Explicación técnica breve: frentes activos de continuidad para AlmaDesign Web.

# Frentes Activos AlmaDesign Web

## Pendientes vigentes

- VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO.
- HARDENING_INFRA_CLOUDFLARE_NGINX_VPS_ALMADESIGN.

## Frentes completados

- CREAR_ESTRUCTURA_PHP_MVC_ALMADESIGN: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- CORREGIR_LANDING_APOGEO_LUX_ALMADESIGN: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- DEPLOY_CONTROLADO_ALMADESIGN_WEB_A_VPS: EJECUTADO_OK.
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
- BASE_SEGURIDAD_POST_SSL_ALMADESIGN: CONFIGURADA.
- HEADERS_SEGURIDAD: ACTIVOS.
- CLOUDFLARE_PROXY: ACTIVO.
- HTTPS_PUBLICO: OK.
- ROLLBACK_DISPONIBLE: TRUE.
- PREPARAR_BACKUPS_Y_OPERACION_ALMADESIGN_WEB: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- EJECUTAR_BACKUP_Y_HEALTHCHECK_ALMADESIGN_EN_VPS: EJECUTADO_OK.
- CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN: CONFIGURADO_LOCALMENTE_CON_OBSERVACIONES.
- APLICAR_FRONTEND_DESIGN_ALMADESIGN_WEB: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES.
- APOGEO_CONOCIMIENTO_AUMENTADO_RAGK: DESPLEGADO_Y_VALIDADO_HTTP.

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

## Estado página Apogeo

- APOGEO_CONOCIMIENTO_AUMENTADO_RAGK: DESPLEGADO_Y_VALIDADO_HTTP.
- Ruta local: `/apogeo`.
- Implementación principal: `app/Controllers/ContentController.php` y `app/Views/pages/vertical-detail.php`.
- Contenido vigente: Apogeo como línea de productos de conocimiento aumentado, documentación verificable, trazabilidad y apoyo a decisiones gerenciales.
- Componentes vigentes: hero extendido, sección de arquitecturas RAG / GraphRAG / RAGK, cards ejecutivas, infografía RAGK, bloque gerencial RAGK, límites explícitos y CTA final.
- Assets vigentes: `public/assets/img/apogeo/apogeo-rag-card.webp`, `public/assets/img/apogeo/apogeo-graphrag-card.webp`, `public/assets/img/apogeo/apogeo-ragk-card.webp` y `public/assets/img/apogeo/infografia-ragk.webp`.
- `/apogeo` productivo validado por HTTP; revisión visual productiva pendiente de Mauricio.

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
- Mejora visual aplicada localmente a Home, `/apogeo`, `/apogeo-lux`, `/contacto` y `/contacto/gracias`.
- Hallazgos de accesibilidad, foco visible, anclas sticky, motion safety y autocomplete corregidos localmente.
- Frontend base previo desplegado y validado productivamente.
- HOME_ALMADESIGN_FRONTEND_LOCAL: VALIDADO_POR_MAURICIO.
- HOME_VISUAL_GLOBAL: VALIDADO.
- CARDS_HOME_ALMADESIGN: VISUALMENTE_VALIDADAS.
- DEPLOY_FRONTEND_HOME: DESPLEGADO_Y_VALIDADO_HTTP.
- HOME_PRODUCTIVO: DESPLEGADO_Y_VALIDADO_HTTP.
- FORMULARIO_CONTACTO_ALMADESIGN_PRODUCTIVO: VALIDADO.
- SMTP_PRODUCTIVO_ZOHO: VALIDADO.
- Siguiente frente recomendado: VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO.

## Separación obligatoria

AlmaDesign Web vive en `~/workspace/almadesign-web`. Apogeo Lux Gobernanza vive en `~/workspace/apogeo-lux/backend`.

## Fuera de alcance

- Apogeo Lux backend.
- GraphRAG del backend técnico Apogeo Lux.
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
- HOME_PRODUCTIVO: DESPLEGADO_Y_VALIDADO_HTTP.
- FORMULARIO_VISUAL_PRODUCTIVO: VALIDADO.
- CSS_PRODUCTIVO: CONFORME.
- CACHE_BUSTING_ASSETS: ACTIVO.
- REPLY_TO_PRODUCTIVO: PENDIENTE_CONFIRMACION_SECUNDARIA.
- ROLLBACK_DISPONIBLE: SI.
- Siguiente frente recomendado: VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO.
