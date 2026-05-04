# Nombre del archivo: CORE_ESTADO_ACTUAL_ALMADESIGN_WEB.md
# Ruta del archivo: ~/workspace/almadesign-web/docs/memoria/core/CORE_ESTADO_ACTUAL_ALMADESIGN_WEB.md
# Fecha de creación: 2026-05-02
# Explicación técnica breve: estado actual mínimo del proyecto AlmaDesign Web.

# Estado Actual AlmaDesign Web

## Estado validado

AlmaDesign Web es proyecto separado del backend Apogeo Lux.

- ALMADESIGN_WEB_PUBLICO: OPERATIVO.

## Rutas

- AlmaDesign Web vive en: `~/workspace/almadesign-web`.
- Apogeo Lux Gobernanza vive en: `~/workspace/apogeo-lux/backend`.

## Dominio productivo

- `almadesign.cl`.
- GitHub repo: `https://github.com/mcorderoaraya/almadesign`.
- Branch deploy: `main`.

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

- PREPARAR_DEPLOY_CONTROLADO_FRONTEND_HOME_ALMADESIGN_WEB.
- HARDENING_INFRA_CLOUDFLARE_NGINX_VPS_ALMADESIGN.

## Frentes implementados localmente

- CREAR_ESTRUCTURA_PHP_MVC_ALMADESIGN: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- CORREGIR_LANDING_APOGEO_LUX_ALMADESIGN: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- PREPARAR_BACKUPS_Y_OPERACION_ALMADESIGN_WEB: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN: CONFIGURADO_LOCALMENTE_CON_OBSERVACIONES.
- APLICAR_FRONTEND_DESIGN_ALMADESIGN_WEB: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES.

## Frentes ejecutados en VPS

- DEPLOY_CONTROLADO_ALMADESIGN_WEB_A_VPS: EJECUTADO_OK.
- EJECUTAR_BACKUP_Y_HEALTHCHECK_ALMADESIGN_EN_VPS: EJECUTADO_OK.
- BASE_SEGURIDAD_POST_SSL_ALMADESIGN: CONFIGURADA.
- HEADERS_SEGURIDAD: ACTIVOS.
- CLOUDFLARE_PROXY: ACTIVO.
- HTTPS_PUBLICO: OK.
- ROLLBACK_DISPONIBLE: TRUE.
- GitHub repo: `https://github.com/mcorderoaraya/almadesign`.
- Branch deploy: `main`.

## Observaciones MVC local

- MVC local creado en `~/workspace/almadesign-web`.
- Front controller creado en `public/index.php`.
- Rutas locales creadas para `/` y `/apogeo-lux`.
- No hay base de datos conectada todavía.
- Formulario de contacto desplegado y validado productivamente con SMTP Zoho.
- Deploy controlado a VPS ejecutado correctamente.

## Observaciones landing Apogeo Lux

- Landing `/apogeo-lux` corregida localmente.
- Presenta Apogeo Lux como producto de AlmaDesign.
- Usa claims gobernados sobre MVP GraphRAG local funcional para demo, normas públicas BCN / LeyChile, respuestas extractivas citadas, `source_ref`, trazabilidad, auditoría y gobernanza.
- Declara explícitamente límites: no producción, no asesoría legal, no reemplazo de abogados, no LLM generativo usado en esta demo, no jurisprudencia integrada, no SaaS listo, no GraphRAG enterprise y no `ready_for_production_anchor=true`.
- No hay base de datos todavía.
- Formulario de contacto desplegado y validado productivamente con SMTP Zoho.
- Deploy controlado a VPS ejecutado correctamente.
- Siguiente frente recomendado: PREPARAR_DEPLOY_CONTROLADO_FRONTEND_HOME_ALMADESIGN_WEB.

## Observaciones deploy VPS

- Deploy controlado ejecutado desde GitHub `main` hacia `/var/www/almadesign`.
- Release temporal usado: `/tmp/almadesign_release_20260502_160657`.
- HTTPS público validado en dominio raíz, `www` y `/apogeo-lux`.
- Cloudflare proxy activo.
- Headers de seguridad activos.
- Rollback disponible por backup en `/var/backups/almadesign`.

## Observaciones operación y backups

- Script de backup versionado en `ops/almadesign_backup.sh`.
- Script de healthcheck versionado en `ops/almadesign_healthcheck.sh`.
- Runbook de operación versionado en `docs/gestion/RUNBOOK_OPERACION_ALMADESIGN_WEB.md`.
- Backup root VPS definido: `/var/backups/almadesign`.
- App root VPS definido: `/var/www/almadesign`.
- Retención local definida: 14 días.
- Healthcheck manual ejecutado correctamente en VPS.
- Backup manual ejecutado correctamente en VPS.
- No se tocaron Cloudflare, Zoho, DNS, SSL, `.env`, llaves SSH, base de datos, formulario, Composer, WordPress, Docker ni cPanel.
- Siguiente frente recomendado: PREPARAR_DEPLOY_CONTROLADO_FRONTEND_HOME_ALMADESIGN_WEB.

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
- SMTP Zoho parametrizado por `.env` no versionado.
- `.env.example` creado sin secretos reales.
- Formulario de contacto productivo validado: SMTP Zoho operativo, POST productivo OK, redirección a `/contacto/gracias` OK y cuerpo visual por línea confirmado por Mauricio.
- El problema observado no fue red, puerto, permisos ni autenticación SMTP.
- Formulario con CSRF token, honeypot anti-bot, validación server-side, sanitización y rate limit simple por IP/sesión.
- Campo honeypot ajustado localmente para reducir falsos positivos por autofill accidental.
- SMTP_PRODUCTIVO_ZOHO: VALIDADO.
- Log mínimo en `logs/contact.log`, sin guardar cuerpo completo del mensaje.
- No hay base de datos.
- DEPLOY_FORMULARIO_CONTACTO_ALMADESIGN: CERRADO_OK.
- Siguiente frente recomendado: PREPARAR_DEPLOY_CONTROLADO_FRONTEND_HOME_ALMADESIGN_WEB.

## Estado frontend

- APLICAR_FRONTEND_DESIGN_ALMADESIGN_WEB: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES.
- CORREGIR_HALLAZGOS_WEB_DESIGN_GUIDELINES_ALMADESIGN: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES.
- Mejora visual aplicada localmente sobre Home, `/apogeo-lux`, `/contacto` y `/contacto/gracias`.
- Hallazgos de accesibilidad, foco visible, anclas sticky, motion safety y autocomplete corregidos localmente.
- Se reforzó dirección visual humana, sobria, premium, tecnológica e institucional.
- Frontend base previo desplegado y validado productivamente.
- HOME_ALMADESIGN_FRONTEND_LOCAL: VALIDADO_POR_MAURICIO.
- HOME_VISUAL_GLOBAL: VALIDADO.
- CARDS_HOME_ALMADESIGN: VISUALMENTE_VALIDADAS.
- DEPLOY_FRONTEND_HOME: NO_EJECUTADO.
- HOME_PRODUCTIVO: NO_ACTUALIZADO_TODAVIA.
- FORMULARIO_CONTACTO_ALMADESIGN_PRODUCTIVO: VALIDADO.
- SMTP_PRODUCTIVO_ZOHO: VALIDADO.
- Siguiente frente recomendado: PREPARAR_DEPLOY_CONTROLADO_FRONTEND_HOME_ALMADESIGN_WEB.

## Fuera de alcance

- Apogeo Lux backend.
- GraphRAG.
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
- `/contacto`, `/contacto/gracias`, `/robots.txt` y `/sitemap.xml` operativos.
- POST productivo OK.
- Redirección `/contacto/gracias`: OK.
- Subject real: `Desde web almadesign`.
- Subject definido en servidor y no manipulable por POST.
- From real controlado por servidor / `.env`.
- To controlado por `CONTACT_TO`.
- Reply-To configurado con email validado del usuario.
- REPLY_TO_PRODUCTIVO: PENDIENTE_CONFIRMACION_SECUNDARIA.
- Cuerpo visual por línea validado por Mauricio.
- Inputs inválidos no envían y no consumen rate limit de envío.
- CSRF activo, honeypot activo, header injection rechazado, arrays inesperados rechazados y campos no escalares rechazados.
- Log mínimo sin cuerpo completo.
- HOTFIX_CACHE_BUSTING_ASSETS_ALMADESIGN: CERRADO_OK.
- CORREGIR_REGRESION_CSS_POST_DEPLOY_ALMADESIGN: CERRADO_OK.
- CSS_PRODUCTIVO: CONFORME.
- CACHE_BUSTING_ASSETS: ACTIVO.
- `asset()` usa `filemtime()` para versionar `/assets/css/app.css` y `/assets/js/app.js`.
- Commit deploy formulario/hardening: `a3fef94`.
- Commit hotfix cache busting: `bb1dfa4`.
- Backup manual validado: `/var/backups/almadesign/almadesign_backup_20260502_220213.tar.gz`.
- Checksum backup: OK.
- Rollback disponible: SI.
- `.env` productivo existe, fue preservado y no debe imprimirse.
- `vendor/PHPMailer` fue desplegado como dependencia runtime porque el VPS no tiene Composer.
- No hay base de datos, login ni uploads.
- Nginx, Cloudflare, Zoho DNS y SSL no fueron modificados durante el hotfix.

## Hardening aplicativo vigente

- HARDENING_APLICATIVO_FORMULARIO_Y_SUPERFICIE_PUBLICA_ALMADESIGN: CERRADO_OK.
- SQL_SURFACE: NONE.
- SQLI_RISK: NOT_APPLICABLE.
- XSS mitigado con `e()` / `htmlspecialchars` `ENT_QUOTES` `UTF-8` y `JSON_HEX_*` en JSON-LD.
- `public/` no expone archivos sensibles.
- `.env` y `logs/contact.log` están excluidos por `.gitignore`.
- `robots.txt` creado y validado para SEO y desincentivo básico de scraping.
- `sitemap.xml` creado y validado con rutas públicas.
- Bloqueo total scraping garantizado: NO.

## Frente siguiente recomendado

- HARDENING_INFRA_CLOUDFLARE_NGINX_VPS_ALMADESIGN.
