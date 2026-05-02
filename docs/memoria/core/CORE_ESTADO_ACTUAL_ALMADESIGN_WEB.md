# Nombre del archivo: CORE_ESTADO_ACTUAL_ALMADESIGN_WEB.md
# Ruta del archivo: ~/workspace/almadesign-web/docs/memoria/core/CORE_ESTADO_ACTUAL_ALMADESIGN_WEB.md
# Fecha de creación: 2026-05-02
# Explicación técnica breve: estado actual mínimo del proyecto AlmaDesign Web.

# Estado Actual AlmaDesign Web

## Estado validado

AlmaDesign Web es proyecto separado del backend Apogeo Lux.

## Rutas

- AlmaDesign Web vive en: `~/workspace/almadesign-web`.
- Apogeo Lux Gobernanza vive en: `~/workspace/apogeo-lux/backend`.

## Dominio productivo

- `almadesign.cl`.

## VPS productivo validado

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

## Pendientes

- CONFIGURAR_BASE_SEGURIDAD_POST_SSL_ALMADESIGN.

## Frentes implementados localmente

- CREAR_ESTRUCTURA_PHP_MVC_ALMADESIGN: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- CORREGIR_LANDING_APOGEO_LUX_ALMADESIGN: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.

## Observaciones MVC local

- MVC local creado en `~/workspace/almadesign-web`.
- Front controller creado en `public/index.php`.
- Rutas locales creadas para `/` y `/apogeo-lux`.
- No hay base de datos conectada todavía.
- No hay formulario todavía.
- No hay deploy todavía.

## Observaciones landing Apogeo Lux

- Landing `/apogeo-lux` corregida localmente.
- Presenta Apogeo Lux como producto de AlmaDesign.
- Usa claims gobernados sobre MVP GraphRAG local funcional para demo, normas públicas BCN / LeyChile, respuestas extractivas citadas, `source_ref`, trazabilidad, auditoría y gobernanza.
- Declara explícitamente límites: no producción, no asesoría legal, no reemplazo de abogados, no LLM generativo usado en esta demo, no jurisprudencia integrada, no SaaS listo, no GraphRAG enterprise y no `ready_for_production_anchor=true`.
- No hay base de datos todavía.
- No hay formulario todavía.
- No hay deploy todavía.
- Siguiente frente recomendado: PREPARAR_DEPLOY_CONTROLADO_ALMADESIGN_WEB o CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN, según estado.

## Fuera de alcance

- Apogeo Lux backend.
- GraphRAG.
- Neo4j.
- PostgreSQL Apogeo Lux.
- evidencia técnica Apogeo Lux.
