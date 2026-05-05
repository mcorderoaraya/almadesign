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
- DEPLOY_FRONTEND_HOME: DESPLEGADO_Y_VALIDADO_HTTP.
- HOME_PRODUCTIVO: DESPLEGADO_Y_VALIDADO_HTTP.
- APOGEO_CONOCIMIENTO_AUMENTADO_RAGK: DESPLEGADO_Y_VALIDADO_HTTP.
- DEPLOY_CONTROLADO_FRONTEND_HOME_APOGEO_Y_CONSULTORIA_ALMADESIGN_WEB: EJECUTADO_OK.
- HASH_DEPLOY_FRONTEND: e33447ab3e2298a6b7ae0a1c7e80743d0c89372d.
- APOGEO_PRODUCTIVO: DESPLEGADO_Y_VALIDADO_HTTP.
- CONSULTORIA_BLOQUE_EL_PROBLEMA: REMOVIDO_EN_PRODUCCION.
- TEXTO_EL_PROBLEMA_CONSULTORIA: AUSENTE_EN_PRODUCCION.
- BACKUP_PRE_DEPLOY_FRONTEND: `/var/backups/almadesign/almadesign_backup_20260505_142352.tar.gz`.
- CHECKSUM_BACKUP_PRE_DEPLOY_FRONTEND: OK.
- HEALTHCHECK_POST_DEPLOY_FRONTEND: OK.
- RUTAS_PRODUCTIVAS_POST_DEPLOY_FRONTEND: HTTP_200.
- ASSETS_HOME_APOGEO_POST_DEPLOY: HTTP_200.
- HOME_VISUAL_LOCAL: VALIDADO_POR_MAURICIO.
- HOME_VISUAL_PRODUCTIVO: PENDIENTE_REVISION_MANUAL_MAURICIO.
- APOGEO_VISUAL_PRODUCTIVO: PENDIENTE_REVISION_MANUAL_MAURICIO.
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

- El Home frontend nuevo fue desplegado y validado por HTTP; revisión visual productiva pendiente de Mauricio.
- La nueva página `/apogeo` fue desplegada y validada por HTTP; revisión visual productiva pendiente de Mauricio.
- RAGK se comunica en público como arquitectura de conocimiento confiable, no como lista de tecnologías ni como promesa de decisión automatizada.
- Las cards del Home quedan como estándar visual validado.
- Mantener prohibición de Google Fonts y fuentes externas.
- El formulario productivo ya fue desplegado y validado; no declarar nuevos cambios productivos sin su propio deploy controlado.
- El envío end-to-end productivo fue validado por Mauricio; Reply-To productivo queda pendiente de confirmación secundaria.
- No imprimir `.env` ni contraseñas SMTP.
- Siguiente frente recomendado: VALIDACION_VISUAL_MANUAL_POST_DEPLOY_FRONTEND_HOME_APOGEO.
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
