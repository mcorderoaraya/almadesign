# Nombre del archivo: CORE_ARQUITECTURA_ACTIVA_ALMADESIGN_WEB.md
# Ruta del archivo: ~/workspace/almadesign-web/docs/memoria/core/CORE_ARQUITECTURA_ACTIVA_ALMADESIGN_WEB.md
# Fecha de creacion: 2026-05-02
# Explicacion tecnica breve: arquitectura activa inicial de AlmaDesign Web.

# Arquitectura Activa AlmaDesign Web

## Local WSL2

- Nginx local en puerto `8088`.
- PHP 8.3-FPM mediante `unix:/run/php/php8.3-fpm.sock`.
- MariaDB local disponible para fases posteriores.
- Root local: `~/workspace/almadesign-web/public`.

## Produccion validada

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

## Separacion

AlmaDesign Web es proyecto separado del backend Apogeo Lux. No modifica Apogeo Lux backend ni evidencia tecnica Apogeo Lux.
