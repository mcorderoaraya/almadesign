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
- HOME_VISUAL_PRODUCTIVO: PENDIENTE_REVISION_MANUAL_MAURICIO.
- APOGEO_VISUAL_PRODUCTIVO: PENDIENTE_REVISION_MANUAL_MAURICIO.
- MVC PHP local: creado.
- Rutas locales activas: `/`, `/consultoria-ia-procesos`, `/apogeo`, `/ai-for-humans`, `/apogeo-lux`, `/contacto`, `/contacto/enviar` y `/contacto/gracias`.
- Landing `/apogeo-lux`: corregida localmente y desplegada.
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

- DEPLOY_CONTROLADO_FRONTEND_ACUMULADO_AI_FOR_HUMANS_MENU_FORMULARIO.
- VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO.
- HARDENING_INFRA_CLOUDFLARE_NGINX_VPS_ALMADESIGN.

## Estado frontend acumulado local validado

- FRONTEND_ACUMULADO_AI_FOR_HUMANS_MENU_FORMULARIO: VALIDADO_LOCALMENTE_POR_MAURICIO.
- FRONTEND_ACUMULADO_AI_FOR_HUMANS_MENU_FORMULARIO: PUSH_ORIGIN_MAIN_OK.
- PRODUCCION_FRONTEND_ACUMULADO: PENDIENTE_DEPLOY_PRODUCTIVO.
- AI_FOR_HUMANS_MANIFIESTO_PUBLICO: VALIDADO_LOCALMENTE_POR_MAURICIO.
- CONTACTO_BOTON_DISABLED_HASTA_VALIDACION_CLIENTE: VALIDADO_LOCALMENTE_POR_MAURICIO.
- MENU_MOBILE_HAMBURGUESA: VALIDADO_LOCALMENTE_POR_MAURICIO.
- FOOTER_GLOBAL_SIN_LOGO_GRIS: VALIDADO_LOCALMENTE_POR_MAURICIO.
- Cambios incluidos: manifiesto publico `/ai-for-humans`, fondo claro `#F4EADC` / `var(--beige)`, header claro local en AI for Humans, menu mobile hamburguesa, numeracion editorial responsive, firma fundacional con imagen de Mauricio, boton de contacto deshabilitado hasta validacion cliente, footer global sin logo gris y CTA final verticales homologada.
- Produccion no debe declararse actualizada hasta ejecutar deploy controlado especifico.

## Estado Home frontend nuevo validado localmente

- HOME_ALMADESIGN_FRONTEND_LOCAL: VALIDADO_POR_MAURICIO.
- HOME_VISUAL_GLOBAL: VALIDADO.
- CARDS_HOME_ALMADESIGN: VISUALMENTE_VALIDADAS.
- DEPLOY_FRONTEND_HOME: DESPLEGADO_Y_VALIDADO_HTTP.
- HOME_PRODUCTIVO: DESPLEGADO_Y_VALIDADO_HTTP.
- SIGUIENTE_FRENTE_RECOMENDADO: VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO.
- Nota: Home está desplegado y validado por HTTP; la revisión visual productiva queda pendiente de Mauricio.
- Nota: `/apogeo` está desplegada y validada por HTTP; la revisión visual productiva queda pendiente de Mauricio.

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
