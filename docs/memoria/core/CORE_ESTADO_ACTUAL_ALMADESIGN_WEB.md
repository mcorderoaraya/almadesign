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

- DEPLOY_CONTROLADO_FRONTEND_ACUMULADO_AI_FOR_HUMANS_MENU_FORMULARIO.
- VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO.
- HARDENING_INFRA_CLOUDFLARE_NGINX_VPS_ALMADESIGN.

## Frentes implementados localmente

- CREAR_ESTRUCTURA_PHP_MVC_ALMADESIGN: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- CORREGIR_LANDING_APOGEO_LUX_ALMADESIGN: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- PREPARAR_BACKUPS_Y_OPERACION_ALMADESIGN_WEB: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN: CONFIGURADO_LOCALMENTE_CON_OBSERVACIONES.
- APLICAR_FRONTEND_DESIGN_ALMADESIGN_WEB: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES.
- APOGEO_CONOCIMIENTO_AUMENTADO_RAGK: DESPLEGADO_Y_VALIDADO_HTTP.
- FRONTEND_ACUMULADO_AI_FOR_HUMANS_MENU_FORMULARIO: VALIDADO_LOCALMENTE_POR_MAURICIO.
- FRONTEND_ACUMULADO_AI_FOR_HUMANS_MENU_FORMULARIO: PUSH_ORIGIN_MAIN_OK.
- PRODUCCION_FRONTEND_ACUMULADO: PENDIENTE_DEPLOY_PRODUCTIVO.
- AI_FOR_HUMANS_MANIFIESTO_PUBLICO: VALIDADO_LOCALMENTE_POR_MAURICIO.
- CONTACTO_BOTON_DISABLED_HASTA_VALIDACION_CLIENTE: VALIDADO_LOCALMENTE_POR_MAURICIO.
- MENU_MOBILE_HAMBURGUESA: VALIDADO_LOCALMENTE_POR_MAURICIO.
- FOOTER_GLOBAL_SIN_LOGO_GRIS: VALIDADO_LOCALMENTE_POR_MAURICIO.

## Frentes ejecutados en VPS

- DEPLOY_CONTROLADO_ALMADESIGN_WEB_A_VPS: EJECUTADO_OK.
- EJECUTAR_BACKUP_Y_HEALTHCHECK_ALMADESIGN_EN_VPS: EJECUTADO_OK.
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
- GitHub repo: `https://github.com/mcorderoaraya/almadesign`.
- Branch deploy: `main`.

## Observaciones MVC local

- MVC local creado en `~/workspace/almadesign-web`.
- Front controller creado en `public/index.php`.
- Rutas locales activas: `/`, `/consultoria-ia-procesos`, `/apogeo`, `/ai-for-humans`, `/apogeo-lux`, `/contacto`, `/contacto/enviar` y `/contacto/gracias`.
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
- Siguiente frente recomendado: VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO.

## Observaciones página Apogeo

- APOGEO_CONOCIMIENTO_AUMENTADO_RAGK: DESPLEGADO_Y_VALIDADO_HTTP.
- Ruta local: `/apogeo`.
- La página presenta Apogeo como línea de productos de conocimiento aumentado, documentación verificable, trazabilidad y apoyo a decisiones gerenciales mejor informadas.
- Incluye hero extendido, sección de arquitecturas Apogeo, cards ejecutivas, infografía RAGK, bloque "RAGK como concepto gerencial", límites explícitos y CTA final hacia `/contacto`.
- La sección de arquitecturas Apogeo compara RAG, GraphRAG y RAGK como niveles de recuperación, relación y gobernanza del conocimiento.
- Las tarjetas de arquitectura usan imágenes finales WebP: `public/assets/img/apogeo/apogeo-rag-card.webp`, `public/assets/img/apogeo/apogeo-graphrag-card.webp` y `public/assets/img/apogeo/apogeo-ragk-card.webp`.
- La infografía vigente es `public/assets/img/apogeo/infografia-ragk.webp`.
- RAGK se comunica públicamente como arquitectura de conocimiento confiable: recuperación contextual, conocimiento conectado, flujo gobernado de información y evidencia verificable para decisiones humanas.
- `/apogeo` nuevo está publicado y validado por HTTP; revisión visual productiva pendiente de Mauricio.

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
- Siguiente frente recomendado: VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO.

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
- Siguiente frente recomendado: VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO.

## Estado frontend

- APLICAR_FRONTEND_DESIGN_ALMADESIGN_WEB: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES.
- CORREGIR_HALLAZGOS_WEB_DESIGN_GUIDELINES_ALMADESIGN: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES.
- Mejora visual aplicada localmente sobre Home, `/apogeo`, `/apogeo-lux`, `/contacto` y `/contacto/gracias`.
- Hallazgos de accesibilidad, foco visible, anclas sticky, motion safety y autocomplete corregidos localmente.
- Se reforzó dirección visual humana, sobria, premium, tecnológica e institucional.
- Frontend base previo desplegado y validado productivamente.
- HOME_ALMADESIGN_FRONTEND_LOCAL: VALIDADO_POR_MAURICIO.
- HOME_VISUAL_GLOBAL: VALIDADO.
- CARDS_HOME_ALMADESIGN: VISUALMENTE_VALIDADAS.
- DEPLOY_FRONTEND_HOME: DESPLEGADO_Y_VALIDADO_HTTP.
- HOME_PRODUCTIVO: DESPLEGADO_Y_VALIDADO_HTTP.
- FORMULARIO_CONTACTO_ALMADESIGN_PRODUCTIVO: VALIDADO.
- SMTP_PRODUCTIVO_ZOHO: VALIDADO.
- El frente acumulado AI for Humans / menu / formulario / footer fue validado localmente por Mauricio y pusheado a `origin/main`; produccion sigue pendiente de deploy controlado.
- Cambios acumulados: `/ai-for-humans` como manifiesto publico fundacional, fondo claro `#F4EADC` / `var(--beige)`, header claro local, menu mobile hamburguesa, numeracion editorial responsive, firma fundacional con imagen de Mauricio, boton de contacto deshabilitado hasta validacion cliente, footer global sin logo gris y CTA final verticales homologada.
- Siguiente frente recomendado: VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO.

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

- VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO.
- HARDENING_INFRA_CLOUDFLARE_NGINX_VPS_ALMADESIGN.
