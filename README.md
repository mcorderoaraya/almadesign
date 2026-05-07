# Nombre del archivo: README.md
# Ruta del archivo: ~/workspace/almadesign-web/README.md
# Fecha de creación: 2026-05-02
# Explicación técnica breve: documento base del proyecto comercial AlmaDesign Web.

# AlmaDesign Web

AlmaDesign Web es el proyecto comercial del sitio web de AlmaDesign, sus verticales públicas y la landing comercial de Apogeo Lux.

## Separación obligatoria

AlmaDesign Web es proyecto separado del backend Apogeo Lux.

- AlmaDesign Web vive en: `~/workspace/almadesign-web`.
- Apogeo Lux Gobernanza vive en: `~/workspace/apogeo-lux/backend`.

## Dominio productivo

- `almadesign.cl`.

## Estado público vigente

- ALMADESIGN_WEB_PUBLICO: OPERATIVO.
- GitHub repo: `https://github.com/mcorderoaraya/almadesign`.
- Branch deploy: `main`.
- No hay base de datos.
- CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN: CONFIGURADO_LOCALMENTE_CON_OBSERVACIONES.
- PHPMailer desplegado como dependencia runtime; formulario productivo validado con SMTP Zoho.
- APOGEO_CONOCIMIENTO_AUMENTADO_RAGK: DESPLEGADO_Y_VALIDADO_HTTP.
- La página pública `/apogeo` está desplegada y validada por HTTP con narrativa gerencial, arquitecturas RAG / GraphRAG / RAGK, cards finales WebP e infografía RAGK.
- DEPLOY_CONTROLADO_FRONTEND_HOME_APOGEO_Y_CONSULTORIA_ALMADESIGN_WEB: EJECUTADO_OK.
- DEPLOY_CONTROLADO_FRONTEND_ACUMULADO_AI_FOR_HUMANS_MENU_FORMULARIO: CERRADO_OK.
- DEPLOY_HEAD: 06b64fedcbc669fa570fbb7fe347da9c86e4f050.
- VALIDACION_VISUAL_PRODUCTIVA_FRONTEND_ACUMULADO_AI_FOR_HUMANS_MENU_FORMULARIO: CERRADO_OK.
- AI_FOR_HUMANS: VALIDADO_PRODUCTIVAMENTE_POR_MAURICIO.
- MENU_MOBILE: VALIDADO_PRODUCTIVAMENTE_POR_MAURICIO.
- FORMULARIO_CONTACTO_CLIENT_SIDE: VALIDADO_PRODUCTIVAMENTE_POR_MAURICIO.
- FOOTER_GLOBAL: VALIDADO_PRODUCTIVAMENTE_POR_MAURICIO.
- ANCHORS_FAVICON_HEAD: 33ed31c8638b6f0c3f13c36f31e02cf184cc70ed.
- FAVICON_PATH_FIX: EN_ORIGIN_MAIN.
- ANCHORS_SEMANTICOS_CAMPANAS_ALMADESIGN_WEB: EN_ORIGIN_MAIN.
- PRODUCCION_ANCHORS_Y_FAVICON_FIX: PENDIENTE_DEPLOY_CONTROLADO.
- BACKEND_ALMADESIGN_WEB: NO_ABRIR_TODAVIA.
- BASE_DE_DATOS: NO_ABIERTA.
- LOGIN: NO_EXISTE.
- UPLOADS: NO_EXISTEN.
- REPARACION_COMERCIAL_APOGEO_LUX: CERRADO_OK.
- APOGEO_LUX_COMERCIAL: DESPLEGADO_Y_VALIDADO_VISUALMENTE_POR_MAURICIO.
- VALIDACION_VISUAL_PRODUCTIVA_APOGEO_LUX: CERRADO_OK.
- DEPLOY_HEAD_APOGEO_LUX_COMERCIAL: 7ec67a151cbd37812a6d0565f79113f2db2fe5e8.
- FAVICON_PRODUCTIVO: OK.
- INFOGRAFIA_GRAPHRAG_APOGEO_LUX: VALIDADA.
- HEADER_SIN_PRODUCTOS: VALIDADO.
- BACKEND_APOGEO_LUX: NO_TOCADO.
- MENU_VERTICAL_PRODUCTOS_ALMADESIGN_WEB: NO_VALIDADO.
- SUBMENU_PRODUCTOS: REMOVER_SOLICITADO.
- workflow_marketing: PRODUCTO_DOCUMENTAL_NUEVO_PLANIFICADO / FUERA_DE_ALCANCE_ALMADESIGN_WEB_PRODUCTIVO.

## VPS productivo validado

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
- Headers de seguridad activos.
- Rollback disponible por backup en `/var/backups/almadesign`.

## Pendientes

- PRODUCCION_ANCHORS_Y_FAVICON_FIX: PENDIENTE_DEPLOY_CONTROLADO.
- MENU_VERTICAL_PRODUCTOS_ALMADESIGN_WEB: NO_VALIDADO.
- SUBMENU_PRODUCTOS: REMOVER_SOLICITADO.
- VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO: CERRADO_OK.
- HARDENING_INFRA_CLOUDFLARE_NGINX_VPS_ALMADESIGN.

## Estado deploy

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
- HOME_VISUAL_PRODUCTIVO: VALIDADO_POR_MAURICIO.
- APOGEO_VISUAL_PRODUCTIVO: VALIDADO_POR_MAURICIO.
- BASE_SEGURIDAD_POST_SSL_ALMADESIGN: CONFIGURADA.
- HEADERS_SEGURIDAD: ACTIVOS.
- CLOUDFLARE_PROXY: ACTIVO.
- HTTPS_PUBLICO: OK.
- ROLLBACK_DISPONIBLE: TRUE.
- GitHub repo: `https://github.com/mcorderoaraya/almadesign`.
- Branch deploy: `main`.

## Estado frontend acumulado cerrado

- DEPLOY_CONTROLADO_FRONTEND_ACUMULADO_AI_FOR_HUMANS_MENU_FORMULARIO: CERRADO_OK.
- DEPLOY_HEAD: 06b64fedcbc669fa570fbb7fe347da9c86e4f050.
- BACKUP_PRE_DEPLOY_FRONTEND_ACUMULADO: `/var/backups/almadesign/almadesign_backup_20260505_214506.tar.gz`.
- CHECKSUM_BACKUP_PRE_DEPLOY_FRONTEND_ACUMULADO: OK.
- HEALTHCHECK_POST_DEPLOY_FRONTEND_ACUMULADO: OK.
- RUTAS_PRODUCTIVAS_FRONTEND_ACUMULADO: HTTP_200.
- ASSETS_PRODUCTIVOS_FRONTEND_ACUMULADO: HTTP_200.
- VALIDACION_VISUAL_PRODUCTIVA_FRONTEND_ACUMULADO_AI_FOR_HUMANS_MENU_FORMULARIO: CERRADO_OK.
- AI_FOR_HUMANS: VALIDADO_PRODUCTIVAMENTE_POR_MAURICIO.
- MENU_MOBILE: VALIDADO_PRODUCTIVAMENTE_POR_MAURICIO.
- FORMULARIO_CONTACTO_CLIENT_SIDE: VALIDADO_PRODUCTIVAMENTE_POR_MAURICIO.
- FOOTER_GLOBAL: VALIDADO_PRODUCTIVAMENTE_POR_MAURICIO.
- Alcance registrado: `/ai-for-humans` como manifiesto publico fundacional con fondo `#F4EADC` / `var(--beige)`, header claro validado productivamente, menu mobile hamburguesa, numeracion editorial responsive, firma fundacional con imagen de Mauricio, formulario de contacto con boton deshabilitado hasta validacion cliente, footer global sin logo gris y CTA final de verticales homologada.

## Estado operación y backups

- PREPARAR_BACKUPS_Y_OPERACION_ALMADESIGN_WEB: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- EJECUTAR_BACKUP_Y_HEALTHCHECK_ALMADESIGN_EN_VPS: EJECUTADO_OK.
- Script de backup versionado: `ops/almadesign_backup.sh`.
- Script de healthcheck versionado: `ops/almadesign_healthcheck.sh`.
- Runbook de operación versionado: `docs/gestion/RUNBOOK_OPERACION_ALMADESIGN_WEB.md`.
- Retención local definida: 14 días.
- Backups destinados a `/var/backups/almadesign`.
- Healthcheck manual ejecutado correctamente en VPS.
- Backup manual ejecutado correctamente en VPS.
- VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO: CERRADO_OK.

## Estado local MVC

- CREAR_ESTRUCTURA_PHP_MVC_ALMADESIGN: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- PHP MVC liviano creado sin framework; Composer se usa para PHPMailer.
- Rutas disponibles localmente: `/`, `/consultoria-ia-procesos`, `/apogeo`, `/ai-for-humans`, `/apogeo-lux`, `/contacto`, `/contacto/enviar` y `/contacto/gracias`.
- Sin conexión de base de datos por ahora.
- Formulario de contacto desplegado y validado productivamente con SMTP Zoho.
- Deploy controlado a VPS ejecutado correctamente.

## Estado local pagina Apogeo

- APOGEO_CONOCIMIENTO_AUMENTADO_RAGK: DESPLEGADO_Y_VALIDADO_HTTP.
- Ruta local: `/apogeo`.
- Presenta Apogeo como línea de productos de conocimiento aumentado, documentación verificable y apoyo a decisiones gerenciales mejor informadas.
- Incluye hero extendido, sección de arquitecturas Apogeo, capacidades gerenciales, infografía RAGK, concepto gerencial RAGK, límites explícitos y CTA final hacia `/contacto`.
- La sección de arquitecturas muestra tres tarjetas de imagen: RAG, GraphRAG y RAGK.
- Assets vigentes: `public/assets/img/apogeo/apogeo-rag-card.webp`, `public/assets/img/apogeo/apogeo-graphrag-card.webp`, `public/assets/img/apogeo/apogeo-ragk-card.webp` e `public/assets/img/apogeo/infografia-ragk.webp`.
- RAGK se comunica públicamente como arquitectura de conocimiento confiable: recuperación contextual, conocimiento conectado, flujo gobernado y evidencia verificable para decisiones humanas.
- `/apogeo` nuevo está publicado, validado por HTTP y validado visualmente por Mauricio.

## Estado local landing Apogeo Lux

- CORREGIR_LANDING_APOGEO_LUX_ALMADESIGN: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES_HISTORICAS.
- REPARACION_COMERCIAL_APOGEO_LUX: CERRADO_OK.
- APOGEO_LUX_COMERCIAL: DESPLEGADO_Y_VALIDADO_VISUALMENTE_POR_MAURICIO.
- VALIDACION_VISUAL_PRODUCTIVA_APOGEO_LUX: CERRADO_OK.
- DEPLOY_HEAD_APOGEO_LUX_COMERCIAL: 7ec67a151cbd37812a6d0565f79113f2db2fe5e8.
- `/apogeo-lux` quedó como landing comercial madura para capturar interés sobre Apogeo Lux.
- Mensaje central: consulta jurídica confiable sobre normas, leyes chilenas y relaciones de conocimiento, con visión de producto GraphRAG jurídico, fuentes verificables, jurisprudencia, trazabilidad y criterio humano.
- INFOGRAFIA_GRAPHRAG_APOGEO_LUX: VALIDADA.
- FAVICON_PRODUCTIVO: OK.
- HEADER_SIN_PRODUCTOS: VALIDADO.
- BACKEND_APOGEO_LUX: NO_TOCADO.
- Incluye metadata específica, Open Graph básico y FAQ JSON-LD.
- Sin conexión de base de datos por ahora.
- Formulario de contacto desplegado y validado productivamente con SMTP Zoho.

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
- SMTP Zoho queda parametrizado por `.env` no versionado.
- `.env.example` contiene placeholders sin secretos reales.
- Formulario de contacto productivo validado: SMTP Zoho operativo, POST productivo OK, redirección a `/contacto/gracias` OK y cuerpo visual por línea confirmado por Mauricio.
- El problema observado no fue red, puerto, permisos ni autenticación SMTP.
- Formulario con CSRF token, honeypot, validación server-side, sanitización y rate limit por IP/sesión.
- Campo honeypot ajustado localmente para reducir falsos positivos por autofill accidental.
- SMTP_PRODUCTIVO_ZOHO: VALIDADO.
- Log mínimo en `logs/contact.log` sin guardar el contenido completo del mensaje.
- No hay base de datos.
- DEPLOY_FORMULARIO_CONTACTO_ALMADESIGN: CERRADO_OK.
- VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO: CERRADO_OK.

## Estado frontend

- APLICAR_FRONTEND_DESIGN_ALMADESIGN_WEB: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES.
- CORREGIR_HALLAZGOS_WEB_DESIGN_GUIDELINES_ALMADESIGN: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES.
- Mejora visual aplicada localmente a Home, `/apogeo`, `/apogeo-lux`, `/contacto` y `/contacto/gracias`.
- Hallazgos de accesibilidad, foco visible, anclas sticky, motion safety y autocomplete corregidos localmente.
- Dirección visual: grafito, azul oscuro, crema y acento naranjo AlmaDesign.
- Frontend base previo desplegado y validado productivamente.
- HOME_ALMADESIGN_FRONTEND_LOCAL: VALIDADO_POR_MAURICIO.
- HOME_VISUAL_GLOBAL: VALIDADO.
- CARDS_HOME_ALMADESIGN: VISUALMENTE_VALIDADAS.
- DEPLOY_FRONTEND_HOME: DESPLEGADO_Y_VALIDADO_HTTP.
- HOME_PRODUCTIVO: DESPLEGADO_Y_VALIDADO_HTTP.
- FORMULARIO_CONTACTO_ALMADESIGN_PRODUCTIVO: VALIDADO.
- SMTP_PRODUCTIVO_ZOHO: VALIDADO.
- VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO: CERRADO_OK.

## Fuera de alcance

- Apogeo Lux backend.
- GraphRAG del backend técnico Apogeo Lux.
- Neo4j.
- PostgreSQL Apogeo Lux.
- evidencia técnica Apogeo Lux.

## Estado post deploy formulario validado

- FORMULARIO_CONTACTO_ALMADESIGN_PRODUCTIVO: VALIDADO.
- DEPLOY_FORMULARIO_CONTACTO_ALMADESIGN: CERRADO_OK.
- SMTP_PRODUCTIVO_ZOHO: VALIDADO.
- CUERPO_CORREO_PRODUCTIVO: VALIDADO.
- HOME_ALMADESIGN_PRODUCTIVO_PREVIO: VALIDADO.
- HOME_PRODUCTIVO: DESPLEGADO_Y_VALIDADO_HTTP.
- FORMULARIO_VISUAL_PRODUCTIVO: VALIDADO.
- CORREGIR_REGRESION_CSS_POST_DEPLOY_ALMADESIGN: CERRADO_OK.
- HOTFIX_CACHE_BUSTING_ASSETS_ALMADESIGN: CERRADO_OK.
- CSS_PRODUCTIVO: CONFORME.
- CACHE_BUSTING_ASSETS: ACTIVO.
- Estrategia de assets: `asset()` agrega `?v=` con `filemtime()` de archivos bajo `public/assets`.
- CSS productivo usa `/assets/css/app.css?v=[filemtime]`.
- JS productivo usa `/assets/js/app.js?v=[filemtime]`.
- Commit deploy formulario/hardening: `a3fef94`.
- Commit hotfix cache busting: `bb1dfa4`.
- Backup manual validado: `/var/backups/almadesign/almadesign_backup_20260502_220213.tar.gz`.
- Checksum backup: OK.
- Rollback disponible: SI.
- `.env` productivo existe, fue preservado y no debe imprimirse.
- `vendor/PHPMailer` fue desplegado como dependencia runtime porque el VPS no tiene Composer.
- No hay base de datos, login ni uploads.
- Nginx, Cloudflare, Zoho DNS y SSL no fueron modificados durante el hotfix.
- Apogeo Lux backend no fue tocado.
- Reply-To configurado en app: SI.
- Reply-To validado localmente: SI.
- REPLY_TO_PRODUCTIVO: PENDIENTE_CONFIRMACION_SECUNDARIA.

## Hardening aplicativo vigente

- HARDENING_APLICATIVO_FORMULARIO_Y_SUPERFICIE_PUBLICA_ALMADESIGN: CERRADO_OK.
- SQL_SURFACE: NONE.
- SQLI_RISK: NOT_APPLICABLE.
- XSS mitigado con `e()` / `htmlspecialchars` `ENT_QUOTES` `UTF-8` y `JSON_HEX_*` en JSON-LD.
- CSRF activo, honeypot activo, header injection rechazado, arrays inesperados rechazados y campos no escalares rechazados.
- Inputs inválidos no envían y no consumen rate limit de envío.
- Rate limit se aplica después de validación completa.
- Log mínimo sin cuerpo completo del mensaje.
- `public/` no expone archivos sensibles.
- `.env` y `logs/contact.log` están excluidos por `.gitignore`.
- `robots.txt` y `sitemap.xml` están operativos; `robots.txt` no garantiza bloqueo total de scraping.

## Frente siguiente recomendado

- VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO: CERRADO_OK.
- HARDENING_INFRA_CLOUDFLARE_NGINX_VPS_ALMADESIGN.
