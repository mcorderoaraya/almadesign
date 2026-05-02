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
- DEPLOY_CONTROLADO_ALMADESIGN_WEB_A_VPS: EJECUTADO_OK.
- EJECUTAR_BACKUP_Y_HEALTHCHECK_ALMADESIGN_EN_VPS: EJECUTADO_OK.
- CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN: CONFIGURADO_LOCALMENTE_CON_OBSERVACIONES.
- Formulario de contacto configurado localmente, no desplegado todavía y con SMTP Zoho real pendiente de validar.

## Restricciones

No modificar desde este frente documental:

- Apogeo Lux backend.
- GraphRAG del backend Apogeo Lux.
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

- No afirmar publicación productiva del formulario hasta ejecutar un deploy controlado.
- No afirmar validación real de Zoho SMTP hasta probar con `.env` real no versionado.
- Siguiente frente recomendado: VALIDAR_SMTP_ZOHO_FORMULARIO_CONTACTO_ALMADESIGN.
- Frente posterior: PREPARAR_DEPLOY_CONTROLADO_FORMULARIO_CONTACTO_ALMADESIGN.
- No ejecutar deploy salvo frente explícito de deploy controlado.
- No imprimir secretos.
- No versionar `.env`.
