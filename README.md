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

## Estado público vigente

- ALMADESIGN_WEB_PUBLICO: OPERATIVO.
- GitHub repo: `https://github.com/mcorderoaraya/almadesign`.
- Branch deploy: `main`.
- No hay base de datos.
- CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN: NO_IMPLEMENTADO.
- No hay Composer en uso productivo todavía.

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

- RECREAR_PROMPT_FORMULARIO_CONTACTO_ALMADESIGN.
- CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN.

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
- Siguiente frente recomendado: RECREAR_PROMPT_FORMULARIO_CONTACTO_ALMADESIGN y luego CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN.

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

## Estado formulario

- CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN: NO_IMPLEMENTADO.
- El prompt inicial para formulario perdió estructura al copiarse desde chat.
- No se debe implementar formulario hasta recrear/validar el prompt estructurado.
- Siguiente frente recomendado: RECREAR_PROMPT_FORMULARIO_CONTACTO_ALMADESIGN y luego CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN.

## Fuera de alcance

- Apogeo Lux backend.
- GraphRAG.
- Neo4j.
- PostgreSQL Apogeo Lux.
- evidencia técnica Apogeo Lux.
