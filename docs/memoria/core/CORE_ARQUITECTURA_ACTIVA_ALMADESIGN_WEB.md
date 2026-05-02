# Nombre del archivo: CORE_ARQUITECTURA_ACTIVA_ALMADESIGN_WEB.md
# Ruta del archivo: ~/workspace/almadesign-web/docs/memoria/core/CORE_ARQUITECTURA_ACTIVA_ALMADESIGN_WEB.md
# Fecha de creación: 2026-05-02
# Explicación técnica breve: arquitectura activa vigente de AlmaDesign Web.

# Arquitectura Activa AlmaDesign Web

## Local WSL2

- Root local: `~/workspace/almadesign-web`.
- Front controller: `public/index.php`.
- MVC PHP liviano sin framework.
- Rutas principales: `/` y `/apogeo-lux`.
- Nginx local en puerto `8088`.
- PHP 8.3-FPM.
- No existe conexión de base de datos.
- CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN: CONFIGURADO_LOCALMENTE_CON_OBSERVACIONES.
- Formulario de contacto configurado localmente, no desplegado todavía y con SMTP Zoho real pendiente de validar.
- PHPMailer instalado vía Composer.

## Producción validada

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

## Operación

- PREPARAR_BACKUPS_Y_OPERACION_ALMADESIGN_WEB: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- EJECUTAR_BACKUP_Y_HEALTHCHECK_ALMADESIGN_EN_VPS: EJECUTADO_OK.
- Script de backup versionado: `ops/almadesign_backup.sh`.
- Script de healthcheck versionado: `ops/almadesign_healthcheck.sh`.
- Runbook: `docs/gestion/RUNBOOK_OPERACION_ALMADESIGN_WEB.md`.
- Retención local definida: 14 días.
- Backup manual ejecutado correctamente en VPS.
- Healthcheck manual ejecutado correctamente en VPS.

## Separación

AlmaDesign Web es proyecto separado del backend técnico Apogeo Lux. No modifica `~/workspace/apogeo-lux/backend` ni evidencia técnica Apogeo Lux.
