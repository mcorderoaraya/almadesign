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
- App root VPS: `/var/www/almadesign`.
- Backup root VPS: `/var/backups/almadesign`.
- Release temporal usado: `/tmp/almadesign_release_20260502_160657`.
- HTTPS `https://almadesign.cl`: HTTP/2 200.
- HTTPS `https://www.almadesign.cl`: HTTP/2 200.
- HTTPS `https://almadesign.cl/apogeo-lux`: HTTP/2 200.
- Headers de seguridad activos.
- Rollback disponible por backup en `/var/backups/almadesign`.

## Pendientes

- CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN.
- PREPARAR_BACKUPS_Y_OPERACION_ALMADESIGN_WEB.

## Frentes implementados localmente

- CREAR_ESTRUCTURA_PHP_MVC_ALMADESIGN: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.
- CORREGIR_LANDING_APOGEO_LUX_ALMADESIGN: IMPLEMENTADA_LOCALMENTE_CON_OBSERVACIONES.

## Frentes ejecutados en VPS

- DEPLOY_CONTROLADO_ALMADESIGN_WEB_A_VPS: EJECUTADO_OK.
- BASE_SEGURIDAD_POST_SSL_ALMADESIGN: CONFIGURADA.
- HEADERS_SEGURIDAD: ACTIVOS.
- CLOUDFLARE_PROXY: ACTIVO.
- HTTPS_PUBLICO: OK.
- ROLLBACK_DISPONIBLE: TRUE.
- GitHub repo: `https://github.com/mcorderoaraya/almadesign`.
- Branch deploy: `main`.

## Observaciones MVC local

- MVC local creado en `~/workspace/almadesign-web`.
- Front controller creado en `public/index.php`.
- Rutas locales creadas para `/` y `/apogeo-lux`.
- No hay base de datos conectada todavía.
- No hay formulario todavía.
- Deploy controlado a VPS ejecutado correctamente.

## Observaciones landing Apogeo Lux

- Landing `/apogeo-lux` corregida localmente.
- Presenta Apogeo Lux como producto de AlmaDesign.
- Usa claims gobernados sobre MVP GraphRAG local funcional para demo, normas públicas BCN / LeyChile, respuestas extractivas citadas, `source_ref`, trazabilidad, auditoría y gobernanza.
- Declara explícitamente límites: no producción, no asesoría legal, no reemplazo de abogados, no LLM generativo usado en esta demo, no jurisprudencia integrada, no SaaS listo, no GraphRAG enterprise y no `ready_for_production_anchor=true`.
- No hay base de datos todavía.
- No hay formulario todavía.
- Deploy controlado a VPS ejecutado correctamente.
- Siguiente frente recomendado: CONFIGURAR_FORMULARIO_CONTACTO_ALMADESIGN o PREPARAR_BACKUPS_Y_OPERACION_ALMADESIGN_WEB, según estado.

## Observaciones deploy VPS

- Deploy controlado ejecutado desde GitHub `main` hacia `/var/www/almadesign`.
- Release temporal usado: `/tmp/almadesign_release_20260502_160657`.
- HTTPS público validado en dominio raíz, `www` y `/apogeo-lux`.
- Cloudflare proxy activo.
- Headers de seguridad activos.
- Rollback disponible por backup en `/var/backups/almadesign`.

## Fuera de alcance

- Apogeo Lux backend.
- GraphRAG.
- Neo4j.
- PostgreSQL Apogeo Lux.
- evidencia técnica Apogeo Lux.
