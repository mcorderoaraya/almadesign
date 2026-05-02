# Nombre del archivo: 00_DASHBOARD_ALMADESIGN_WEB.md
# Ruta del archivo: ~/workspace/almadesign-web/docs/context/00_DASHBOARD_ALMADESIGN_WEB.md
# Fecha de creación: 2026-05-02
# Explicación técnica breve: tablero de estado vigente para traspaso seguro de chat de AlmaDesign Web.

# Dashboard AlmaDesign Web

## Identidad del proyecto

AlmaDesign Web es el proyecto comercial del sitio web de AlmaDesign y la landing comercial de Apogeo Lux.

AlmaDesign Web está explícitamente separado del backend técnico Apogeo Lux.

## Rutas correctas

- AlmaDesign Web: `~/workspace/almadesign-web`.
- Apogeo Lux Gobernanza: `~/workspace/apogeo-lux/backend`.

## Estado vigente validado

- ALMADESIGN_WEB_PUBLICO: OPERATIVO.
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
- App root VPS: `/var/www/almadesign`.
- Backup root VPS: `/var/backups/almadesign`.
- GitHub repo: `https://github.com/mcorderoaraya/almadesign`.
- Branch deploy: `main`.
- HTTPS `https://almadesign.cl`: HTTP/2 200.
- HTTPS `https://www.almadesign.cl`: HTTP/2 200.
- HTTPS `https://almadesign.cl/apogeo-lux`: HTTP/2 200.
- Headers de seguridad: activos.
- Rollback: disponible.
- DEPLOY_CONTROLADO_ALMADESIGN_WEB_A_VPS: EJECUTADO_OK.
- MVC PHP local: creado.
- Landing `/apogeo-lux`: corregida localmente y desplegada.
- No hay base de datos.
- CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN: NO_IMPLEMENTADO.
- No hay Composer en uso productivo todavía.

## Backups y operación

- PREPARAR_BACKUPS_Y_OPERACION_ALMADESIGN_WEB: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- EJECUTAR_BACKUP_Y_HEALTHCHECK_ALMADESIGN_EN_VPS: EJECUTADO_OK.
- Script de backup versionado: `ops/almadesign_backup.sh`.
- Script de healthcheck versionado: `ops/almadesign_healthcheck.sh`.
- Runbook: `docs/gestion/RUNBOOK_OPERACION_ALMADESIGN_WEB.md`.
- Retención local definida: 14 días.
- Healthcheck manual ejecutado correctamente en VPS.
- Backup manual ejecutado correctamente en VPS.

## Pendientes vigentes

- RECREAR_PROMPT_FORMULARIO_CONTACTO_ALMADESIGN.
- CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN, solo después de prompt estructurado recreado y validado.

## Fuera de alcance

- Apogeo Lux backend.
- GraphRAG del backend Apogeo Lux.
- Neo4j.
- PostgreSQL Apogeo Lux.
- evidencia técnica Apogeo Lux.
- VPS, Cloudflare, Zoho, DNS, SSL, Nginx, `.env`, llaves SSH, base de datos, formulario, Composer, WordPress, Docker y cPanel en este frente.
