# Nombre del archivo: CORE_REGLAS_DE_GOBERNANZA_ALMADESIGN_WEB.md
# Ruta del archivo: ~/workspace/almadesign-web/docs/memoria/core/CORE_REGLAS_DE_GOBERNANZA_ALMADESIGN_WEB.md
# Fecha de creación: 2026-05-02
# Explicación técnica breve: reglas de gobernanza operativa para AlmaDesign Web.

# Reglas de Gobernanza AlmaDesign Web

## Separación obligatoria

AlmaDesign Web vive en `~/workspace/almadesign-web`. Apogeo Lux Gobernanza vive en `~/workspace/apogeo-lux/backend`.

AlmaDesign Web no debe tratar el backend técnico Apogeo Lux como parte modificable del proyecto.

## Estado público

- ALMADESIGN_WEB_PUBLICO: OPERATIVO.
- HOME_ALMADESIGN_FRONTEND_LOCAL: VALIDADO_POR_MAURICIO.
- HOME_VISUAL_GLOBAL: VALIDADO.
- CARDS_HOME_ALMADESIGN: VISUALMENTE_VALIDADAS.
- DEPLOY_FRONTEND_HOME: NO_EJECUTADO.
- HOME_PRODUCTIVO: NO_ACTUALIZADO_TODAVIA.
- APOGEO_CONOCIMIENTO_AUMENTADO_RAGK: IMPLEMENTADO_LOCALMENTE_EN_REPO.
- DEPLOY_FRONTEND_HOME_Y_APOGEO: NO_EJECUTADO.
- DEPLOY_CONTROLADO_ALMADESIGN_WEB_A_VPS: EJECUTADO_OK.
- EJECUTAR_BACKUP_Y_HEALTHCHECK_ALMADESIGN_EN_VPS: EJECUTADO_OK.
- CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN: CONFIGURADO_LOCALMENTE_CON_OBSERVACIONES.
- CORREGIR_HONEYPOT_FORMULARIO_ALMADESIGN: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES.
- SMTP_ZOHO_AUTH_DIRECTA: VALIDADA.
- SMTP_CONNECT_AUTH_OK: CONFIRMADO.
- ENVIO_FORMULARIO_END_TO_END: VALIDADO_PRODUCTIVAMENTE.
- INCIDENTE_HONEYPOT_AUTOFILL: CERRADO_OK.
- BLOQUEO_ACTUAL_FORMULARIO: NINGUNO.
- DEPLOY_FORMULARIO_CONTACTO_ALMADESIGN: CERRADO_OK.
- Estado resumido: formulario productivo validado.
- Formulario de contacto productivo validado: SMTP Zoho operativo, POST productivo OK, redirección a `/contacto/gracias` OK y cuerpo visual por línea confirmado por Mauricio.

## Restricciones

No modificar desde este frente documental:

- Apogeo Lux backend.
- GraphRAG del backend técnico Apogeo Lux.
- Neo4j.
- PostgreSQL Apogeo Lux.
- evidencia técnica Apogeo Lux.
- configuración del VPS.
- Cloudflare.
- Zoho.
- DNS.
- SSL.
- Nginx.
- `.env`.
- `.ssh`.
- llaves privadas.
- base de datos.
- WordPress.
- Docker.
- cPanel.

## Reglas para próximos frentes

- El Home frontend nuevo fue validado localmente; no afirmar que está productivo hasta ejecutar PREPARAR_DEPLOY_CONTROLADO_FRONTEND_HOME_Y_APOGEO_ALMADESIGN_WEB.
- La nueva página `/apogeo` fue implementada localmente; no afirmar que está productiva hasta ejecutar y validar PREPARAR_DEPLOY_CONTROLADO_FRONTEND_HOME_Y_APOGEO_ALMADESIGN_WEB.
- RAGK se comunica en público como arquitectura de conocimiento confiable, no como lista de tecnologías ni como promesa de decisión automatizada.
- Las cards del Home quedan como estándar visual validado.
- Mantener prohibición de Google Fonts y fuentes externas.
- El formulario productivo ya fue desplegado y validado; no declarar nuevos cambios productivos sin su propio deploy controlado.
- El envío end-to-end productivo fue validado por Mauricio; Reply-To productivo queda pendiente de confirmación secundaria.
- No imprimir `.env` ni contraseñas SMTP.
- Siguiente frente recomendado: PREPARAR_DEPLOY_CONTROLADO_FRONTEND_HOME_Y_APOGEO_ALMADESIGN_WEB.
- Frente futuro recomendado: HARDENING_INFRA_CLOUDFLARE_NGINX_VPS_ALMADESIGN.
- No ejecutar deploy salvo frente explícito de deploy controlado.
- No imprimir secretos.
- No versionar `.env`.

## Estado vigente de seguridad aplicativa

- FORMULARIO_CONTACTO_ALMADESIGN_PRODUCTIVO: VALIDADO.
- SMTP_PRODUCTIVO_ZOHO: VALIDADO.
- CUERPO_CORREO_PRODUCTIVO: VALIDADO.
- CSS_PRODUCTIVO: CONFORME.
- CACHE_BUSTING_ASSETS: ACTIVO.
- SQL_SURFACE: NONE.
- SQLI_RISK: NOT_APPLICABLE.
- XSS mitigado con escape HTML y flags `JSON_HEX_*` en JSON-LD.
- CSRF activo, honeypot activo, header injection rechazado, arrays inesperados rechazados y campos no escalares rechazados.
- `public/` no expone archivos sensibles.
- Bloqueo total scraping garantizado: NO.
