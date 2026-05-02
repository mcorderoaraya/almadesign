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

## VPS productivo validado

- Hostinger KVM 2.
- Ubuntu 24.04 LTS.
- Nginx.
- PHP 8.3.
- Certbot SSL.
- Cloudflare proxy activo.
- Zoho Mail funcionando.
- SSH con usuario mauricio.
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

## Pendientes

- CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN.
- PREPARAR_BACKUPS_Y_OPERACION_ALMADESIGN_WEB.

## Fuera de alcance

- Apogeo Lux backend.
- GraphRAG.
- Neo4j.
- PostgreSQL Apogeo Lux.
- evidencia técnica Apogeo Lux.
