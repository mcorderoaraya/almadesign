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
- Composer incorporado localmente para PHPMailer.
- Formulario de contacto configurado localmente, no desplegado aún y con SMTP Zoho real pendiente de validar.
- APLICAR_FRONTEND_DESIGN_ALMADESIGN_WEB: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES.
- Mejora visual aplicada localmente a Home, `/apogeo-lux` y contacto.

## Pendientes

- VALIDAR_SMTP_ZOHO_FORMULARIO_CONTACTO_ALMADESIGN.
- PREPARAR_DEPLOY_CONTROLADO_FORMULARIO_CONTACTO_ALMADESIGN.

## Estado formulario

- CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN: CONFIGURADO_LOCALMENTE_CON_OBSERVACIONES.
- Rutas locales: `/contacto`, `/contacto/enviar` y `/contacto/gracias`.
- PHPMailer instalado vía Composer.
- SMTP Zoho parametrizado por `.env` no versionado.
- `.env.example` sin secretos reales.
- CSRF token, honeypot, validación server-side, sanitización, rate limit simple y log mínimo.
- No hay base de datos.
- No hay deploy de este frente todavía.

## Estado frontend

- APLICAR_FRONTEND_DESIGN_ALMADESIGN_WEB: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES.
- Dirección visual: humano, sobrio, premium, tecnológico e institucional.
- No hay deploy de esta mejora todavía.
- El formulario sigue sin deploy.
- SMTP Zoho real sigue pendiente de validar.

## Fuera de alcance

- Apogeo Lux backend.
- GraphRAG.
- Neo4j.
- PostgreSQL Apogeo Lux.
- evidencia técnica Apogeo Lux.
