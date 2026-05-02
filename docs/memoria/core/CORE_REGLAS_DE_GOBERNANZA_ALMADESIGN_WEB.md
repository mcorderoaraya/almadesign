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
- CORREGIR_HONEYPOT_FORMULARIO_ALMADESIGN: IMPLEMENTADO_LOCALMENTE_CON_OBSERVACIONES.
- SMTP_ZOHO_AUTH_DIRECTA: VALIDADA.
- SMTP_CONNECT_AUTH_OK: CONFIRMADO.
- ENVIO_FORMULARIO_END_TO_END: NO_VALIDADO.
- BLOQUEO_ULTIMA_PRUEBA_FORMULARIO: `honeypot_blocked`.
- BLOQUEO_ACTUAL_FORMULARIO: `honeypot_blocked` como último bloqueo observado antes del ajuste local; requiere revalidación end-to-end.
- FORMULARIO_DEPLOY: NO_EJECUTADO.
- Estado resumido: formulario no desplegado.
- Formulario de contacto configurado localmente; SMTP Zoho autentica correctamente en prueba directa, pero el envío end-to-end del formulario NO está validado porque la última prueba previa al ajuste del honeypot fue bloqueada por falso positivo del honeypot (`honeypot_blocked`). El formulario no está desplegado en VPS.

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
- No afirmar envío end-to-end validado hasta probar el formulario después del ajuste del honeypot.
- No imprimir `.env` ni SMTP_PASSWORD.
- Siguiente frente recomendado: VALIDAR_SMTP_ZOHO_FORMULARIO_CONTACTO_ALMADESIGN.
- Frente posterior: PREPARAR_DEPLOY_CONTROLADO_FORMULARIO_CONTACTO_ALMADESIGN.
- No ejecutar deploy salvo frente explícito de deploy controlado.
- No imprimir secretos.
- No versionar `.env`.
