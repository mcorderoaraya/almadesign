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
- APOGEO_CONOCIMIENTO_AUMENTADO_RAGK: IMPLEMENTADO_LOCALMENTE_EN_REPO.
- La página pública `/apogeo` existe localmente con narrativa gerencial, arquitecturas RAG / GraphRAG / RAGK, cards finales WebP e infografía RAGK.
- DEPLOY_FRONTEND_HOME_Y_APOGEO: NO_EJECUTADO.

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

- PREPARAR_DEPLOY_CONTROLADO_FRONTEND_HOME_Y_APOGEO_ALMADESIGN_WEB.
- HARDENING_INFRA_CLOUDFLARE_NGINX_VPS_ALMADESIGN.

## Estado deploy

- DEPLOY_CONTROLADO_ALMADESIGN_WEB_A_VPS: EJECUTADO_OK.
- BASE_SEGURIDAD_POST_SSL_ALMADESIGN: CONFIGURADA.
- HEADERS_SEGURIDAD: ACTIVOS.
- CLOUDFLARE_PROXY: ACTIVO.
- HTTPS_PUBLICO: OK.
- ROLLBACK_DISPONIBLE: TRUE.
- GitHub repo: `https://github.com/mcorderoaraya/almadesign`.
- Branch deploy: `main`.

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
- Siguiente frente recomendado: PREPARAR_DEPLOY_CONTROLADO_FRONTEND_HOME_Y_APOGEO_ALMADESIGN_WEB.

## Estado local MVC

- CREAR_ESTRUCTURA_PHP_MVC_ALMADESIGN: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- PHP MVC liviano creado sin framework; Composer se usa para PHPMailer.
- Rutas disponibles localmente: `/`, `/consultoria-ia-procesos`, `/apogeo`, `/ai-for-humans`, `/apogeo-lux`, `/contacto`, `/contacto/enviar` y `/contacto/gracias`.
- Sin conexión de base de datos por ahora.
- Formulario de contacto desplegado y validado productivamente con SMTP Zoho.
- Deploy controlado a VPS ejecutado correctamente.

## Estado local pagina Apogeo

- APOGEO_CONOCIMIENTO_AUMENTADO_RAGK: IMPLEMENTADO_LOCALMENTE_EN_REPO.
- Ruta local: `/apogeo`.
- Presenta Apogeo como línea de productos de conocimiento aumentado, documentación verificable y apoyo a decisiones gerenciales mejor informadas.
- Incluye hero extendido, sección de arquitecturas Apogeo, capacidades gerenciales, infografía RAGK, concepto gerencial RAGK, límites explícitos y CTA final hacia `/contacto`.
- La sección de arquitecturas muestra tres tarjetas de imagen: RAG, GraphRAG y RAGK.
- Assets vigentes: `public/assets/img/apogeo/apogeo-rag-card.webp`, `public/assets/img/apogeo/apogeo-graphrag-card.webp`, `public/assets/img/apogeo/apogeo-ragk-card.webp` e `public/assets/img/apogeo/infografia-ragk.webp`.
- RAGK se comunica públicamente como arquitectura de conocimiento confiable: recuperación contextual, conocimiento conectado, flujo gobernado y evidencia verificable para decisiones humanas.
- No afirmar que `/apogeo` nuevo está publicado en `almadesign.cl` hasta ejecutar y validar un deploy controlado.

## Estado local landing Apogeo Lux

- CORREGIR_LANDING_APOGEO_LUX_ALMADESIGN: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- Landing `/apogeo-lux` corregida localmente con claims gobernados.
- Incluye metadata específica, Open Graph básico y FAQ JSON-LD.
- Sin conexión de base de datos por ahora.
- Formulario de contacto desplegado y validado productivamente con SMTP Zoho.
- Deploy controlado a VPS ejecutado correctamente.

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
- Siguiente frente recomendado: PREPARAR_DEPLOY_CONTROLADO_FRONTEND_HOME_Y_APOGEO_ALMADESIGN_WEB.

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
- DEPLOY_FRONTEND_HOME: NO_EJECUTADO.
- HOME_PRODUCTIVO: NO_ACTUALIZADO_TODAVIA.
- FORMULARIO_CONTACTO_ALMADESIGN_PRODUCTIVO: VALIDADO.
- SMTP_PRODUCTIVO_ZOHO: VALIDADO.
- Siguiente frente recomendado: PREPARAR_DEPLOY_CONTROLADO_FRONTEND_HOME_Y_APOGEO_ALMADESIGN_WEB.

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
- HOME_PRODUCTIVO: NO_ACTUALIZADO_TODAVIA.
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

- PREPARAR_DEPLOY_CONTROLADO_FRONTEND_HOME_Y_APOGEO_ALMADESIGN_WEB.
- HARDENING_INFRA_CLOUDFLARE_NGINX_VPS_ALMADESIGN.
