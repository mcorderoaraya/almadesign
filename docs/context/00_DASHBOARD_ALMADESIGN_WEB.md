# Nombre del archivo: 00_DASHBOARD_ALMADESIGN_WEB.md
# Ruta del archivo: ~/workspace/almadesign-web/docs/context/00_DASHBOARD_ALMADESIGN_WEB.md
# Fecha de creación: 2026-05-02
# Explicación técnica breve: tablero de estado vigente para traspaso seguro de chat de AlmaDesign Web.

# Dashboard AlmaDesign Web

## Identidad del proyecto

AlmaDesign Web es el proyecto comercial del sitio web de AlmaDesign y la landing comercial de Apogeo Lux.

AlmaDesign Web está explícitamente separado del backend técnico Apogeo Lux.

## Rutas correctas

- AlmaDesign Web: `~/workspace/almadesign-web`.
- Apogeo Lux Gobernanza: `~/workspace/apogeo-lux/backend`.

## Estado vigente validado

- ALMADESIGN_WEB_PUBLICO: OPERATIVO.
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
- MVC PHP local: creado.
- Rutas locales activas: `/`, `/consultoria-ia-procesos`, `/apogeo`, `/ai-for-humans`, `/apogeo-lux`, `/contacto`, `/contacto/enviar` y `/contacto/gracias`.
- Landing `/apogeo-lux`: APOGEO_LUX_COMERCIAL: DESPLEGADO_Y_VALIDADO_VISUALMENTE_POR_MAURICIO.
- Página `/apogeo`: desplegada y validada productivamente por HTTP en repo con narrativa gerencial, arquitecturas RAG / GraphRAG / RAGK, cards finales WebP e infografía RAGK.
- APOGEO_CONOCIMIENTO_AUMENTADO_RAGK: DESPLEGADO_Y_VALIDADO_HTTP.
- DEPLOY_CONTROLADO_FRONTEND_HOME_APOGEO_Y_CONSULTORIA_ALMADESIGN_WEB: EJECUTADO_OK.
- No hay base de datos.
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

## Backups y operación

- PREPARAR_BACKUPS_Y_OPERACION_ALMADESIGN_WEB: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- EJECUTAR_BACKUP_Y_HEALTHCHECK_ALMADESIGN_EN_VPS: EJECUTADO_OK.
- Script de backup versionado: `ops/almadesign_backup.sh`.
- Script de healthcheck versionado: `ops/almadesign_healthcheck.sh`.
- Runbook: `docs/gestion/RUNBOOK_OPERACION_ALMADESIGN_WEB.md`.
- Retención local definida: 14 días.
- Healthcheck manual ejecutado correctamente en VPS.
- Backup manual ejecutado correctamente en VPS.

## Pendientes vigentes

- PRODUCCION_ANCHORS_Y_FAVICON_FIX: PENDIENTE_DEPLOY_CONTROLADO.
- REPARACION_COMERCIAL_APOGEO_LUX: CERRADO_OK.
- MENU_VERTICAL_PRODUCTOS_ALMADESIGN_WEB: NO_VALIDADO.
- SUBMENU_PRODUCTOS: REMOVER_SOLICITADO.
- VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO: CERRADO_OK.
- HARDENING_INFRA_CLOUDFLARE_NGINX_VPS_ALMADESIGN.

## Estado frontend acumulado cerrado

- DEPLOY_CONTROLADO_FRONTEND_ACUMULADO_AI_FOR_HUMANS_MENU_FORMULARIO: CERRADO_OK.
- DEPLOY_HEAD: 06b64fedcbc669fa570fbb7fe347da9c86e4f050.
- VALIDACION_VISUAL_PRODUCTIVA_FRONTEND_ACUMULADO_AI_FOR_HUMANS_MENU_FORMULARIO: CERRADO_OK.
- Cambios incluidos y validados productivamente por Mauricio: manifiesto publico `/ai-for-humans`, fondo claro `#F4EADC` / `var(--beige)`, header claro en AI for Humans, menu mobile hamburguesa, numeracion editorial responsive, firma fundacional con imagen de Mauricio, boton de contacto deshabilitado hasta validacion cliente, footer global sin logo gris y CTA final verticales homologada.

## Estado Home frontend nuevo validado localmente

- HOME_ALMADESIGN_FRONTEND_LOCAL: VALIDADO_POR_MAURICIO.
- HOME_VISUAL_GLOBAL: VALIDADO.
- CARDS_HOME_ALMADESIGN: VISUALMENTE_VALIDADAS.
- DEPLOY_FRONTEND_HOME: DESPLEGADO_Y_VALIDADO_HTTP.
- HOME_PRODUCTIVO: DESPLEGADO_Y_VALIDADO_HTTP.
- VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO: CERRADO_OK.
- Nota: Home está desplegado, validado por HTTP y validado visualmente por Mauricio.
- Nota: `/apogeo` está desplegada, validada por HTTP y validada visualmente por Mauricio.

## Estado Apogeo local vigente

- Ruta local: `/apogeo`.
- Implementación: `ContentController::apogeo()` + `app/Views/pages/vertical-detail.php`.
- Contenido: Apogeo como línea de productos de conocimiento aumentado, documentación verificable, trazabilidad y apoyo a decisiones gerenciales.
- Arquitecturas visibles: RAG, GraphRAG y RAGK.
- Assets vigentes: `public/assets/img/apogeo/apogeo-rag-card.webp`, `public/assets/img/apogeo/apogeo-graphrag-card.webp`, `public/assets/img/apogeo/apogeo-ragk-card.webp` y `public/assets/img/apogeo/infografia-ragk.webp`.
- RAGK se explica como arquitectura de conocimiento confiable: recuperación contextual, conocimiento conectado, flujo gobernado y evidencia verificable para decisiones humanas.

## Fuera de alcance

- Apogeo Lux backend.
- GraphRAG del backend técnico Apogeo Lux.
- Neo4j.
- PostgreSQL Apogeo Lux.
- evidencia técnica Apogeo Lux.
- REPARACION_COMERCIAL_APOGEO_LUX: CERRADO_OK.
- BACKEND_APOGEO_LUX: NO_TOCADO.
- workflow_marketing, producto documental nuevo planificado fuera del sitio productivo.
- VPS, Cloudflare, Zoho, DNS, SSL, Nginx, `.env`, llaves SSH, base de datos, formulario, Composer, WordPress, Docker y cPanel en este frente.

## Estado post deploy formulario validado

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
- `asset()` usa `filemtime()` para versionar CSS/JS bajo `public/assets`.
- Commits relevantes: `a3fef94` y `bb1dfa4`.
- Backup manual validado: `/var/backups/almadesign/almadesign_backup_20260502_220213.tar.gz`.
- Checksum backup: OK.
- Rollback disponible: SI.
- Reply-To configurado en app: SI.
- Reply-To validado localmente: SI.
- REPLY_TO_PRODUCTIVO: PENDIENTE_CONFIRMACION_SECUNDARIA.
