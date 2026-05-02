# Nombre del archivo: README.md
# Ruta del archivo: ~/workspace/almadesign-web/README.md
# Fecha de creación: 2026-05-02
# Explicación técnica breve: documento base del proyecto comercial AlmaDesign Web.

# AlmaDesign Web

AlmaDesign Web es el proyecto comercial del sitio web de AlmaDesign y la landing comercial de Apogeo Lux.

## Separación obligatoria

AlmaDesign Web es proyecto separado del backend Apogeo Lux.

- AlmaDesign Web vive en: `~/workspace/almadesign-web`.
- Apogeo Lux Gobernanza vive en: `~/workspace/apogeo-lux/backend`.

## Dominio productivo

- `almadesign.cl`.

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
- Headers de seguridad activos.
- Rollback disponible por backup en `/var/backups/almadesign`.

## Pendientes

- CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN.
- PREPARAR_BACKUPS_Y_OPERACION_ALMADESIGN_WEB.

## Estado deploy

- DEPLOY_CONTROLADO_ALMADESIGN_WEB_A_VPS: EJECUTADO_OK.
- BASE_SEGURIDAD_POST_SSL_ALMADESIGN: CONFIGURADA.
- HEADERS_SEGURIDAD: ACTIVOS.
- CLOUDFLARE_PROXY: ACTIVO.
- HTTPS_PUBLICO: OK.
- ROLLBACK_DISPONIBLE: TRUE.
- GitHub repo: `https://github.com/mcorderoaraya/almadesign`.
- Branch deploy: `main`.

## Estado local MVC

- CREAR_ESTRUCTURA_PHP_MVC_ALMADESIGN: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- PHP MVC liviano creado sin framework y sin Composer.
- Rutas disponibles: `/` y `/apogeo-lux`.
- Sin conexión de base de datos por ahora.
- Sin formulario por ahora.
- Deploy controlado a VPS ejecutado correctamente.

## Estado local landing Apogeo Lux

- CORREGIR_LANDING_APOGEO_LUX_ALMADESIGN: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- Landing `/apogeo-lux` corregida localmente con claims gobernados.
- Incluye metadata específica, Open Graph básico y FAQ JSON-LD.
- Sin conexión de base de datos por ahora.
- Sin formulario por ahora.
- Deploy controlado a VPS ejecutado correctamente.

## Fuera de alcance

- Apogeo Lux backend.
- GraphRAG.
- Neo4j.
- PostgreSQL Apogeo Lux.
- evidencia técnica Apogeo Lux.
