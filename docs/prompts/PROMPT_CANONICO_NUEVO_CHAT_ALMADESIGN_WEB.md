# Nombre del archivo: PROMPT_CANONICO_NUEVO_CHAT_ALMADESIGN_WEB.md
# Ruta del archivo: ~/workspace/almadesign-web/docs/prompts/PROMPT_CANONICO_NUEVO_CHAT_ALMADESIGN_WEB.md
# Fecha de creación: 2026-05-02
# Explicación técnica breve: prompt base para retomar AlmaDesign Web en un nuevo chat.

# Prompt Canónico Nuevo Chat AlmaDesign Web

Trabajar sobre AlmaDesign Web, proyecto comercial separado del backend Apogeo Lux.

## Contexto fijo

- AlmaDesign Web vive en: `~/workspace/almadesign-web`.
- Apogeo Lux Gobernanza vive en: `~/workspace/apogeo-lux/backend`.
- Dominio productivo: `almadesign.cl`.
- GitHub repo: `https://github.com/mcorderoaraya/almadesign`.
- Branch deploy: `main`.

## VPS productivo validado

- ALMADESIGN_WEB_PUBLICO: OPERATIVO.
- Hostinger KVM 2.
- Ubuntu 24.04 LTS.
- Nginx: operativo.
- PHP: 8.3.
- Certbot SSL: operativo.
- Cloudflare proxy activo.
- Zoho Mail funcionando.
- SSH: usuario mauricio con clave.
- root SSH bloqueado.
- UFW activo.
- App root VPS: `/var/www/almadesign`.
- Backup root VPS: `/var/backups/almadesign`.
- Release temporal usado: `/tmp/almadesign_release_20260502_160657`.
- HTTPS `https://almadesign.cl`: HTTP/2 200.
- HTTPS `https://www.almadesign.cl`: HTTP/2 200.
- HTTPS `https://almadesign.cl/apogeo-lux`: HTTP/2 200.
- Cloudflare proxy activo.
- Headers de seguridad activos.
- Rollback disponible por backup en `/var/backups/almadesign`.

## Estado actual validado

- GitHub repo: `https://github.com/mcorderoaraya/almadesign`.
- Branch deploy: `main`.
- DEPLOY_CONTROLADO_ALMADESIGN_WEB_A_VPS: EJECUTADO_OK.
- BASE_SEGURIDAD_POST_SSL_ALMADESIGN: CONFIGURADA.
- HEADERS_SEGURIDAD: ACTIVOS.
- CLOUDFLARE_PROXY: ACTIVO.
- HTTPS_PUBLICO: OK.
- ROLLBACK_DISPONIBLE: TRUE.
- CREAR_ESTRUCTURA_PHP_MVC_ALMADESIGN: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- CORREGIR_LANDING_APOGEO_LUX_ALMADESIGN: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- PREPARAR_BACKUPS_Y_OPERACION_ALMADESIGN_WEB: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- EJECUTAR_BACKUP_Y_HEALTHCHECK_ALMADESIGN_EN_VPS: EJECUTADO_OK.
- Script de backup: `ops/almadesign_backup.sh`.
- Script de healthcheck: `ops/almadesign_healthcheck.sh`.
- Runbook de operación: `docs/gestion/RUNBOOK_OPERACION_ALMADESIGN_WEB.md`.
- Retención local de backups: 14 días.
- Healthcheck manual ejecutado correctamente en VPS.
- Backup manual ejecutado correctamente en VPS.
- No hay base de datos.
- CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN: CONFIGURADO_LOCALMENTE_CON_OBSERVACIONES.
- PHPMailer desplegado como dependencia runtime; formulario productivo validado con SMTP Zoho.
- Formulario de contacto desplegado y validado productivamente con SMTP Zoho.
- APLICAR_FRONTEND_DESIGN_ALMADESIGN_WEB: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES.
- Mejora visual aplicada localmente a Home, `/apogeo`, `/apogeo-lux`, `/contacto` y `/contacto/gracias`.
- APOGEO_CONOCIMIENTO_AUMENTADO_RAGK: DESPLEGADO_Y_VALIDADO_HTTP.
- `/apogeo` está desplegada y validada por HTTP con narrativa gerencial, arquitecturas RAG / GraphRAG / RAGK, cards finales WebP, infografía RAGK y concepto gerencial RAGK.
- DEPLOY_CONTROLADO_FRONTEND_HOME_APOGEO_Y_CONSULTORIA_ALMADESIGN_WEB: EJECUTADO_OK.
- FRONTEND_ACUMULADO_AI_FOR_HUMANS_MENU_FORMULARIO: VALIDADO_LOCALMENTE_POR_MAURICIO.
- FRONTEND_ACUMULADO_AI_FOR_HUMANS_MENU_FORMULARIO: PUSH_ORIGIN_MAIN_OK.
- PRODUCCION_FRONTEND_ACUMULADO: PENDIENTE_DEPLOY_PRODUCTIVO.

## Pendientes

- DEPLOY_CONTROLADO_FRONTEND_ACUMULADO_AI_FOR_HUMANS_MENU_FORMULARIO.
- VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO.
- HARDENING_INFRA_CLOUDFLARE_NGINX_VPS_ALMADESIGN.

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
- Rutas locales: `/contacto`, `/contacto/enviar` y `/contacto/gracias`.
- PHPMailer instalado vía Composer.
- SMTP Zoho parametrizado por `.env` no versionado.
- `.env.example` sin secretos reales.
- CSRF token, honeypot, validación server-side, sanitización, rate limit simple y log mínimo.
- Formulario de contacto productivo validado: SMTP Zoho operativo, POST productivo OK, redirección a `/contacto/gracias` OK y cuerpo visual por línea confirmado por Mauricio.
- El problema observado no fue red, puerto, permisos ni autenticación SMTP.
- Campo honeypot ajustado localmente para reducir falsos positivos por autofill accidental.
- SMTP_PRODUCTIVO_ZOHO: VALIDADO.
- No hay base de datos.
- DEPLOY_FORMULARIO_CONTACTO_ALMADESIGN: CERRADO_OK.
- CONTACTO_BOTON_DISABLED_HASTA_VALIDACION_CLIENTE: VALIDADO_LOCALMENTE_POR_MAURICIO.
- Nota: la mejora cliente del boton disabled no reemplaza la validacion server-side vigente y queda pendiente de deploy productivo dentro del frente acumulado.

## Estado frontend

- APLICAR_FRONTEND_DESIGN_ALMADESIGN_WEB: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES.
- CORREGIR_HALLAZGOS_WEB_DESIGN_GUIDELINES_ALMADESIGN: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES.
- Dirección visual: humano, sobrio, premium, tecnológico e institucional.
- Hallazgos de accesibilidad, foco visible, anclas sticky, motion safety y autocomplete corregidos localmente.
- Frontend base previo desplegado y validado productivamente.
- HOME_ALMADESIGN_FRONTEND_LOCAL: VALIDADO_POR_MAURICIO.
- HOME_VISUAL_GLOBAL: VALIDADO.
- CARDS_HOME_ALMADESIGN: VISUALMENTE_VALIDADAS.
- DEPLOY_FRONTEND_HOME: DESPLEGADO_Y_VALIDADO_HTTP.
- HOME_PRODUCTIVO: DESPLEGADO_Y_VALIDADO_HTTP.
- APOGEO_CONOCIMIENTO_AUMENTADO_RAGK: DESPLEGADO_Y_VALIDADO_HTTP.
- DEPLOY_CONTROLADO_FRONTEND_HOME_APOGEO_Y_CONSULTORIA_ALMADESIGN_WEB: EJECUTADO_OK.
- FORMULARIO_CONTACTO_ALMADESIGN_PRODUCTIVO: VALIDADO.
- SMTP_PRODUCTIVO_ZOHO: VALIDADO.
- AI_FOR_HUMANS_MANIFIESTO_PUBLICO: VALIDADO_LOCALMENTE_POR_MAURICIO.
- MENU_MOBILE_HAMBURGUESA: VALIDADO_LOCALMENTE_POR_MAURICIO.
- FOOTER_GLOBAL_SIN_LOGO_GRIS: VALIDADO_LOCALMENTE_POR_MAURICIO.
- Produccion del frente acumulado: PENDIENTE_DEPLOY_PRODUCTIVO.

## Estado Apogeo local vigente

- Ruta local: `/apogeo`.
- Implementación: `ContentController::apogeo()` y `app/Views/pages/vertical-detail.php`.
- Apogeo se presenta como línea de productos de conocimiento aumentado, documentación verificable, trazabilidad y apoyo a decisiones gerenciales.
- Componentes: hero extendido, arquitecturas Apogeo, cards ejecutivas, infografía RAGK, bloque "RAGK como concepto gerencial", límites explícitos y CTA final hacia `/contacto`.
- Assets vigentes: `public/assets/img/apogeo/apogeo-rag-card.webp`, `public/assets/img/apogeo/apogeo-graphrag-card.webp`, `public/assets/img/apogeo/apogeo-ragk-card.webp` y `public/assets/img/apogeo/infografia-ragk.webp`.
- RAGK debe explicarse como arquitectura de conocimiento confiable: recuperación contextual, conocimiento conectado, flujo gobernado y evidencia verificable para decisiones humanas.
- `/apogeo` está desplegada y validada por HTTP; la revisión visual productiva queda pendiente de Mauricio.

## Fuera de alcance

- Apogeo Lux backend.
- GraphRAG del backend técnico Apogeo Lux.
- Neo4j.
- PostgreSQL Apogeo Lux.
- evidencia técnica Apogeo Lux.

## Estado vigente post deploy formulario

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
- `asset()` usa `filemtime()` para versionar CSS/JS.
- Commit deploy formulario/hardening: `a3fef94`.
- Commit hotfix cache busting: `bb1dfa4`.
- Backup manual validado: `/var/backups/almadesign/almadesign_backup_20260502_220213.tar.gz`.
- Rollback disponible: SI.
- Reply-To configurado en app: SI.
- Reply-To validado localmente: SI.
- REPLY_TO_PRODUCTIVO: PENDIENTE_CONFIRMACION_SECUNDARIA.
- Siguiente frente recomendado: VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO.
