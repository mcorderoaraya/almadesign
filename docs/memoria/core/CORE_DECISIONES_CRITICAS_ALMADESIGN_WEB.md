# Nombre del archivo: CORE_DECISIONES_CRITICAS_ALMADESIGN_WEB.md
# Ruta del archivo: ~/workspace/almadesign-web/docs/memoria/core/CORE_DECISIONES_CRITICAS_ALMADESIGN_WEB.md
# Fecha de creación: 2026-05-02
# Explicación técnica breve: decisiones críticas vigentes de AlmaDesign Web para traspaso seguro de chat.

# Decisiones Críticas AlmaDesign Web

## Decisión 1

AlmaDesign Web es el proyecto comercial del sitio web de AlmaDesign y la landing comercial de Apogeo Lux.

## Decisión 2

AlmaDesign Web es proyecto separado del backend técnico Apogeo Lux.

## Decisión 3

AlmaDesign Web vive en `~/workspace/almadesign-web`.

## Decisión 4

Apogeo Lux Gobernanza vive en `~/workspace/apogeo-lux/backend` y no forma parte modificable de este proyecto.

## Decisión 5

El dominio productivo es `almadesign.cl` y el sitio público está operativo.

## Decisión 6

El deploy controlado se realiza desde GitHub `main` del repo `https://github.com/mcorderoaraya/almadesign` hacia `/var/www/almadesign`.

## Decisión 7

La operación mínima se apoya en backups locales bajo `/var/backups/almadesign`, healthcheck versionado y runbook de operación.

## Decisión 8

CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN: CONFIGURADO_LOCALMENTE_CON_OBSERVACIONES.

## Decisión 9

SMTP_ZOHO_AUTH_DIRECTA: VALIDADA. SMTP_CONNECT_AUTH_OK: CONFIRMADO. SMTP_PRODUCTIVO_ZOHO: VALIDADO. ENVIO_FORMULARIO_END_TO_END: VALIDADO_PRODUCTIVAMENTE.

Formulario de contacto productivo validado: SMTP Zoho operativo, POST productivo OK, redirección a `/contacto/gracias` OK y cuerpo visual por línea confirmado por Mauricio.

## Decisión 10

CORREGIR_HONEYPOT_FORMULARIO_ALMADESIGN: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES. VALIDAR_SMTP_ZOHO_FORMULARIO_CONTACTO_ALMADESIGN y PREPARAR_DEPLOY_CONTROLADO_FORMULARIO_CONTACTO_ALMADESIGN quedaron cerrados OK.

## Decisión 11

FORMULARIO_CONTACTO_ALMADESIGN_PRODUCTIVO: VALIDADO. El formulario productivo usa PHPMailer, SMTP Zoho validado, subject real `Desde web almadesign`, From controlado por servidor / `.env`, To controlado por `CONTACT_TO`, Reply-To configurado con email validado del usuario y cuerpo visual por línea validado. REPLY_TO_PRODUCTIVO queda PENDIENTE_CONFIRMACION_SECUNDARIA.

## Decisión 12

HOTFIX_CACHE_BUSTING_ASSETS_ALMADESIGN: CERRADO_OK. El helper `asset()` versiona CSS/JS con `filemtime()` para evitar cache stale de Cloudflare. CSS_PRODUCTIVO: CONFORME. CACHE_BUSTING_ASSETS: ACTIVO.

## Decisión 13

No hay base de datos, login ni uploads. SQL_SURFACE: NONE. SQLI_RISK: NOT_APPLICABLE. `public/` no expone archivos sensibles. `.env` y `logs/contact.log` quedan fuera de Git.

## Límites

Fuera de alcance: Apogeo Lux backend, GraphRAG del backend Apogeo Lux, Neo4j, PostgreSQL Apogeo Lux, evidencia técnica Apogeo Lux, VPS, Cloudflare, Zoho, DNS, SSL, Nginx, `.env`, llaves SSH, base de datos, formulario, Composer, WordPress, Docker y cPanel en este frente.
