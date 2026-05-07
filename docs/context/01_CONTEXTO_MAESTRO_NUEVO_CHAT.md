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
- CORREGIR_LANDING_APOGEO_LUX_ALMADESIGN: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES_HISTORICAS.
- DEPLOY_CONTROLADO_ALMADESIGN_WEB_A_VPS: EJECUTADO_OK.
- PREPARAR_BACKUPS_Y_OPERACION_ALMADESIGN_WEB: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- EJECUTAR_BACKUP_Y_HEALTHCHECK_ALMADESIGN_EN_VPS: EJECUTADO_OK.
- DEPLOY_CONTROLADO_FRONTEND_ACUMULADO_AI_FOR_HUMANS_MENU_FORMULARIO: CERRADO_OK.
- VALIDACION_VISUAL_PRODUCTIVA_FRONTEND_ACUMULADO_AI_FOR_HUMANS_MENU_FORMULARIO: CERRADO_OK.

## Operación

- Script de backup versionado: `ops/almadesign_backup.sh`.
- Script de healthcheck versionado: `ops/almadesign_healthcheck.sh`.
- Runbook: `docs/gestion/RUNBOOK_OPERACION_ALMADESIGN_WEB.md`.
- Retención local definida: 14 días.
- Healthcheck manual ejecutado correctamente en VPS.
- Backup manual ejecutado correctamente en VPS.

## Rutas locales vigentes

- `/`
- `/consultoria-ia-procesos`
- `/apogeo`
- `/ai-for-humans`
- `/apogeo-lux`
- `/contacto`
- `/contacto/enviar`
- `/contacto/gracias`

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
- Alcance: AI for Humans como manifiesto publico fundacional, fondo `#F4EADC` / `var(--beige)`, header claro, menu mobile hamburguesa, numeracion editorial responsive, firma fundacional con imagen de Mauricio, boton de contacto deshabilitado hasta validacion cliente, footer global sin logo gris y CTA final verticales homologada.

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
- Siguiente frente recomendado: VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO.
- Frente futuro recomendado: HARDENING_INFRA_CLOUDFLARE_NGINX_VPS_ALMADESIGN.

## Estado Home frontend nuevo validado localmente

- HOME_ALMADESIGN_FRONTEND_LOCAL: VALIDADO_POR_MAURICIO.
- HOME_VISUAL_GLOBAL: VALIDADO.
- CARDS_HOME_ALMADESIGN: VISUALMENTE_VALIDADAS.
- DEPLOY_FRONTEND_HOME: DESPLEGADO_Y_VALIDADO_HTTP.
- HOME_PRODUCTIVO: DESPLEGADO_Y_VALIDADO_HTTP.
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
- SIGUIENTE_FRENTE_RECOMENDADO: VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO.
- No afirmar validación visual productiva completa del Home nuevo hasta confirmación manual de Mauricio.
- `/apogeo` productivo validado por HTTP; revisión visual productiva pendiente de Mauricio.

## Estado Apogeo local vigente

- `/apogeo` presenta Apogeo como línea de productos de conocimiento aumentado, documentación verificable, trazabilidad y apoyo a decisiones gerenciales.
- Incluye hero extendido, arquitecturas Apogeo, capacidades gerenciales, infografía RAGK, concepto gerencial RAGK, límites explícitos y CTA final hacia `/contacto`.
- La sección de arquitecturas compara RAG, GraphRAG y RAGK con cards finales WebP.
- Assets vigentes: `public/assets/img/apogeo/apogeo-rag-card.webp`, `public/assets/img/apogeo/apogeo-graphrag-card.webp`, `public/assets/img/apogeo/apogeo-ragk-card.webp` y `public/assets/img/apogeo/infografia-ragk.webp`.
- RAGK se comunica como arquitectura de conocimiento confiable: recuperación contextual, conocimiento conectado, flujo gobernado y evidencia verificable para decisiones humanas.

## Restricciones de traspaso

- No tocar `~/workspace/apogeo-lux/backend`.
- No tocar VPS, Cloudflare, Zoho, DNS, SSL, Nginx, `.env`, llaves SSH, base de datos, Composer, WordPress, Docker ni cPanel.
- No tratar GraphRAG del backend técnico Apogeo Lux como alcance de AlmaDesign Web.
- BACKEND_ALMADESIGN_WEB: NO_ABRIR_TODAVIA.
- BASE_DE_DATOS: NO_ABIERTA.
- LOGIN: NO_EXISTE.
- UPLOADS: NO_EXISTEN.
- ANCHORS_FAVICON_HEAD: 33ed31c8638b6f0c3f13c36f31e02cf184cc70ed.
- FAVICON_PATH_FIX: EN_ORIGIN_MAIN.
- ANCHORS_SEMANTICOS_CAMPANAS_ALMADESIGN_WEB: EN_ORIGIN_MAIN.
- PRODUCCION_ANCHORS_Y_FAVICON_FIX: PENDIENTE_DEPLOY_CONTROLADO.
- REPARACION_COMERCIAL_APOGEO_LUX: EN_CURSO / PENDIENTE_VALIDACION_MAURICIO.
- No afirmar que `/apogeo-lux` ya quedó corregida comercialmente ni desplegada como nuevo frente.
- MENU_VERTICAL_PRODUCTOS_ALMADESIGN_WEB: NO_VALIDADO.
- SUBMENU_PRODUCTOS: REMOVER_SOLICITADO.
- workflow_marketing: PRODUCTO_DOCUMENTAL_NUEVO_PLANIFICADO / FUERA_DE_ALCANCE_ALMADESIGN_WEB_PRODUCTIVO.

## Estado post deploy formulario validado

- FORMULARIO_CONTACTO_ALMADESIGN_PRODUCTIVO: VALIDADO.
- DEPLOY_FORMULARIO_CONTACTO_ALMADESIGN: CERRADO_OK.
- SMTP_PRODUCTIVO_ZOHO: VALIDADO.
- CUERPO_CORREO_PRODUCTIVO: VALIDADO.
- HOME_ALMADESIGN_PRODUCTIVO_PREVIO: VALIDADO.
- HOME_PRODUCTIVO: DESPLEGADO_Y_VALIDADO_HTTP.
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
