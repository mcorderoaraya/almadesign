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

- VALIDAR_SMTP_ZOHO_FORMULARIO_CONTACTO_ALMADESIGN.
- PREPARAR_DEPLOY_CONTROLADO_FORMULARIO_CONTACTO_ALMADESIGN.

## Frentes implementados localmente

- CREAR_ESTRUCTURA_PHP_MVC_ALMADESIGN: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- CORREGIR_LANDING_APOGEO_LUX_ALMADESIGN: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- PREPARAR_BACKUPS_Y_OPERACION_ALMADESIGN_WEB: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN: CONFIGURADO_LOCALMENTE_CON_OBSERVACIONES.

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
- Formulario de contacto configurado localmente, no desplegado todavía y con SMTP Zoho real pendiente de validar.
- Deploy controlado a VPS ejecutado correctamente.

## Observaciones landing Apogeo Lux

- Landing `/apogeo-lux` corregida localmente.
- Presenta Apogeo Lux como producto de AlmaDesign.
- Usa claims gobernados sobre MVP GraphRAG local funcional para demo, normas públicas BCN / LeyChile, respuestas extractivas citadas, `source_ref`, trazabilidad, auditoría y gobernanza.
- Declara explícitamente límites: no producción, no asesoría legal, no reemplazo de abogados, no LLM generativo usado en esta demo, no jurisprudencia integrada, no SaaS listo, no GraphRAG enterprise y no `ready_for_production_anchor=true`.
- No hay base de datos todavía.
- Formulario de contacto configurado localmente, no desplegado todavía y con SMTP Zoho real pendiente de validar.
- Deploy controlado a VPS ejecutado correctamente.
- Siguiente frente recomendado: VALIDAR_SMTP_ZOHO_FORMULARIO_CONTACTO_ALMADESIGN y luego PREPARAR_DEPLOY_CONTROLADO_FORMULARIO_CONTACTO_ALMADESIGN.

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
- Siguiente frente recomendado: VALIDAR_SMTP_ZOHO_FORMULARIO_CONTACTO_ALMADESIGN y luego PREPARAR_DEPLOY_CONTROLADO_FORMULARIO_CONTACTO_ALMADESIGN.

## Estado formulario

- CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN: CONFIGURADO_LOCALMENTE_CON_OBSERVACIONES.
- Rutas locales agregadas: `/contacto`, `/contacto/enviar` y `/contacto/gracias`.
- PHPMailer instalado vía Composer.
- SMTP Zoho parametrizado por `.env` no versionado.
- `.env.example` creado sin secretos reales.
- Formulario con CSRF token, honeypot anti-bot, validación server-side, sanitización y rate limit simple por IP/sesión.
- Log mínimo en `logs/contact.log`, sin guardar cuerpo completo del mensaje.
- No hay base de datos.
- No hay deploy de este frente todavía.
- Siguiente frente recomendado: VALIDAR_SMTP_ZOHO_FORMULARIO_CONTACTO_ALMADESIGN y luego PREPARAR_DEPLOY_CONTROLADO_FORMULARIO_CONTACTO_ALMADESIGN.

## Fuera de alcance

- Apogeo Lux backend.
- GraphRAG.
- Neo4j.
- PostgreSQL Apogeo Lux.
- evidencia técnica Apogeo Lux.
