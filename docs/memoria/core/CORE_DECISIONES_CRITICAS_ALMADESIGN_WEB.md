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

SMTP_ZOHO_AUTH_DIRECTA: VALIDADA. SMTP_CONNECT_AUTH_OK: CONFIRMADO. ENVIO_FORMULARIO_END_TO_END: NO_VALIDADO.

Formulario de contacto configurado localmente; SMTP Zoho autentica correctamente en prueba directa, pero el envío end-to-end del formulario NO está validado porque la última prueba previa al ajuste del honeypot fue bloqueada por falso positivo del honeypot (`honeypot_blocked`). El formulario no está desplegado en VPS.

## Decisión 10

CORREGIR_HONEYPOT_FORMULARIO_ALMADESIGN: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES. VALIDAR_SMTP_ZOHO_FORMULARIO_CONTACTO_ALMADESIGN queda como siguiente frente recomendado y PREPARAR_DEPLOY_CONTROLADO_FORMULARIO_CONTACTO_ALMADESIGN queda PENDIENTE_POST_SMTP_END_TO_END.

## Límites

Fuera de alcance: Apogeo Lux backend, GraphRAG del backend Apogeo Lux, Neo4j, PostgreSQL Apogeo Lux, evidencia técnica Apogeo Lux, VPS, Cloudflare, Zoho, DNS, SSL, Nginx, `.env`, llaves SSH, base de datos, formulario, Composer, WordPress, Docker y cPanel en este frente.
