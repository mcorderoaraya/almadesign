# Nombre del archivo: CORE_DECISIONES_CRITICAS_ALMADESIGN_WEB.md
# Ruta del archivo: ~/workspace/almadesign-web/docs/memoria/core/CORE_DECISIONES_CRITICAS_ALMADESIGN_WEB.md
# Fecha de creación: 2026-05-02
# Explicación técnica breve: decisiones críticas vigentes de AlmaDesign Web para traspaso seguro de chat.

# Decisiones Críticas AlmaDesign Web

## Decisión 1

AlmaDesign Web es el proyecto comercial del sitio web de AlmaDesign y la landing comercial de Apogeo Lux.

## Decisión 2

AlmaDesign Web es proyecto separado del backend técnico Apogeo Lux.

## Decisión 3

AlmaDesign Web vive en `~/workspace/almadesign-web`.

## Decisión 4

Apogeo Lux Gobernanza vive en `~/workspace/apogeo-lux/backend` y no forma parte modificable de este proyecto.

## Decisión 5

El dominio productivo es `almadesign.cl` y el sitio público está operativo.

## Decisión 6

El deploy controlado se realiza desde GitHub `main` del repo `https://github.com/mcorderoaraya/almadesign` hacia `/var/www/almadesign`.

## Decisión 7

La operación mínima se apoya en backups locales bajo `/var/backups/almadesign`, healthcheck versionado y runbook de operación.

## Decisión 8

CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN: CONFIGURADO_LOCALMENTE_CON_OBSERVACIONES.

## Decisión 9

SMTP_ZOHO_AUTH_DIRECTA: VALIDADA. SMTP_CONNECT_AUTH_OK: CONFIRMADO. SMTP_PRODUCTIVO_ZOHO: VALIDADO. ENVIO_FORMULARIO_END_TO_END: VALIDADO_PRODUCTIVAMENTE.

Formulario de contacto productivo validado: SMTP Zoho operativo, POST productivo OK, redirección a `/contacto/gracias` OK y cuerpo visual por línea confirmado por Mauricio.

## Decisión 10

CORREGIR_HONEYPOT_FORMULARIO_ALMADESIGN: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES. VALIDAR_SMTP_ZOHO_FORMULARIO_CONTACTO_ALMADESIGN y PREPARAR_DEPLOY_CONTROLADO_FORMULARIO_CONTACTO_ALMADESIGN quedaron cerrados OK.

## Decisión 11

FORMULARIO_CONTACTO_ALMADESIGN_PRODUCTIVO: VALIDADO. El formulario productivo usa PHPMailer, SMTP Zoho validado, subject real `Desde web almadesign`, From controlado por servidor / `.env`, To controlado por `CONTACT_TO`, Reply-To configurado con email validado del usuario y cuerpo visual por línea validado. REPLY_TO_PRODUCTIVO queda PENDIENTE_CONFIRMACION_SECUNDARIA.

## Decisión 12

HOTFIX_CACHE_BUSTING_ASSETS_ALMADESIGN: CERRADO_OK. El helper `asset()` versiona CSS/JS con `filemtime()` para evitar cache stale de Cloudflare. CSS_PRODUCTIVO: CONFORME. CACHE_BUSTING_ASSETS: ACTIVO.

## Decisión 13

No hay base de datos, login ni uploads. SQL_SURFACE: NONE. SQLI_RISK: NOT_APPLICABLE. `public/` no expone archivos sensibles. `.env` y `logs/contact.log` quedan fuera de Git.

## Decisión 14

HOME_ALMADESIGN_FRONTEND_LOCAL: VALIDADO_POR_MAURICIO. HOME_VISUAL_GLOBAL: VALIDADO. CARDS_HOME_ALMADESIGN: VISUALMENTE_VALIDADAS.

El Home frontend nuevo fue validado visualmente en entorno local. DEPLOY_FRONTEND_HOME: DESPLEGADO_Y_VALIDADO_HTTP. HOME_PRODUCTIVO: DESPLEGADO_Y_VALIDADO_HTTP. El siguiente frente recomendado es VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO.

## Decisión 15

APOGEO_CONOCIMIENTO_AUMENTADO_RAGK: DESPLEGADO_Y_VALIDADO_HTTP.

La ruta `/apogeo` presenta Apogeo como línea de productos de conocimiento aumentado, documentación verificable, trazabilidad y apoyo a decisiones gerenciales mejor informadas. Incluye arquitecturas Apogeo RAG / GraphRAG / RAGK, cards finales WebP, infografía RAGK, bloque "RAGK como concepto gerencial", límites explícitos y CTA final hacia `/contacto`.

RAGK debe comunicarse públicamente como arquitectura de conocimiento confiable: recuperación contextual, conocimiento conectado, flujo gobernado de información y evidencia verificable para decisiones humanas. No debe presentarse como una lista de tecnologías ni como promesa de automatización total.

DEPLOY_CONTROLADO_FRONTEND_HOME_APOGEO_Y_CONSULTORIA_ALMADESIGN_WEB: EJECUTADO_OK. `/apogeo` nuevo está publicado y validado por HTTP; revisión visual productiva pendiente de Mauricio.

## Decisión 16

DEPLOY_CONTROLADO_FRONTEND_HOME_APOGEO_Y_CONSULTORIA_ALMADESIGN_WEB: EJECUTADO_OK.

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

HTTP 200 y assets OK no equivalen a validación visual productiva completa. El siguiente frente recomendado es VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO.

## Decisión 17

DEPLOY_CONTROLADO_FRONTEND_ACUMULADO_AI_FOR_HUMANS_MENU_FORMULARIO: CERRADO_OK.

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

El frente acumulado incluye `/ai-for-humans` como manifiesto publico fundacional, fondo claro `#F4EADC` / `var(--beige)`, header claro, menu mobile hamburguesa, numeracion editorial responsive, firma fundacional con imagen de Mauricio, boton del formulario deshabilitado hasta validacion cliente, footer global sin logo gris y CTA final verticales homologada.

## Decisión 18

COMMIT_PUSH_ANCHORS_CAMPANAS_Y_FAVICON_FIX: CERRADO_OK.

- ANCHORS_FAVICON_HEAD: 33ed31c8638b6f0c3f13c36f31e02cf184cc70ed.
- FAVICON_PATH_FIX: EN_ORIGIN_MAIN.
- ANCHORS_SEMANTICOS_CAMPANAS_ALMADESIGN_WEB: EN_ORIGIN_MAIN.
- PRODUCCION_ANCHORS_Y_FAVICON_FIX: PENDIENTE_DEPLOY_CONTROLADO.

No declarar anchors/favicon como desplegados hasta deploy controlado.

## Decisión 19

- BACKEND_ALMADESIGN_WEB: NO_ABRIR_TODAVIA.
- BASE_DE_DATOS: NO_ABIERTA.
- LOGIN: NO_EXISTE.
- UPLOADS: NO_EXISTEN.
- REPARACION_COMERCIAL_APOGEO_LUX: EN_CURSO / PENDIENTE_VALIDACION_MAURICIO.
- MENU_VERTICAL_PRODUCTOS_ALMADESIGN_WEB: NO_VALIDADO.
- SUBMENU_PRODUCTOS: REMOVER_SOLICITADO.
- workflow_marketing: PRODUCTO_DOCUMENTAL_NUEVO_PLANIFICADO / FUERA_DE_ALCANCE_ALMADESIGN_WEB_PRODUCTIVO.

No afirmar Apogeo Lux comercial cerrado, deploy nuevo de `/apogeo-lux`, integración de nuevas infografías ni cierre del submenu productos sin reporte final.

## Límites

Fuera de alcance: Apogeo Lux backend, GraphRAG del backend técnico Apogeo Lux, Neo4j, PostgreSQL Apogeo Lux, evidencia técnica Apogeo Lux, VPS, Cloudflare, Zoho, DNS, SSL, Nginx, `.env`, llaves SSH, base de datos, formulario, Composer, WordPress, Docker y cPanel en este frente.
