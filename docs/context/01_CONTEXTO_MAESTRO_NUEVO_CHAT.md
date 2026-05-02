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
- CORREGIR_LANDING_APOGEO_LUX_ALMADESIGN: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- DEPLOY_CONTROLADO_ALMADESIGN_WEB_A_VPS: EJECUTADO_OK.
- PREPARAR_BACKUPS_Y_OPERACION_ALMADESIGN_WEB: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- EJECUTAR_BACKUP_Y_HEALTHCHECK_ALMADESIGN_EN_VPS: EJECUTADO_OK.

## Operación

- Script de backup versionado: `ops/almadesign_backup.sh`.
- Script de healthcheck versionado: `ops/almadesign_healthcheck.sh`.
- Runbook: `docs/gestion/RUNBOOK_OPERACION_ALMADESIGN_WEB.md`.
- Retención local definida: 14 días.
- Healthcheck manual ejecutado correctamente en VPS.
- Backup manual ejecutado correctamente en VPS.

## Formulario

- CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN: NO_IMPLEMENTADO.
- El prompt inicial para formulario perdió estructura al copiarse desde chat.
- No implementar formulario hasta recrear y validar el prompt estructurado.
- Siguiente frente recomendado: RECREAR_PROMPT_FORMULARIO_CONTACTO_ALMADESIGN.
- Frente posterior: CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN.

## Restricciones de traspaso

- No tocar `~/workspace/apogeo-lux/backend`.
- No tocar VPS, Cloudflare, Zoho, DNS, SSL, Nginx, `.env`, llaves SSH, base de datos, formulario, Composer, WordPress, Docker ni cPanel.
- No tratar GraphRAG del backend Apogeo Lux como alcance de AlmaDesign Web.
