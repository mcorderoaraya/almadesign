# Nombre del archivo: CHECKLIST_BACKEND_PENDIENTE_ALMADESIGN_WEB.md
# Ruta del archivo: ~/workspace/almadesign-web/docs/gestion/CHECKLIST_BACKEND_PENDIENTE_ALMADESIGN_WEB.md
# Fecha de creación: 2026-05-05
# Explicación técnica breve: checklist de pendientes futuros para backend de AlmaDesign Web, sin autorización de implementación.

# Checklist Backend Pendiente AlmaDesign Web

## Estado

- ESTADO_BACKEND_SITIO: CHECKLIST_FUTURO.
- IMPLEMENTACION_BACKEND: NO_AUTORIZADA.
- BASE_DE_DATOS: NO_ABIERTA.
- LOGIN: NO_EXISTE.
- UPLOADS: NO_EXISTEN.
- FORMULARIO_CONTACTO_PRODUCTIVO: VALIDADO.
- APOGEO_LUX_BACKEND: FUERA_DE_ALCANCE.
- PRODUCCION_FRONTEND_ACUMULADO: PENDIENTE_DEPLOY_PRODUCTIVO.

Este documento no abre desarrollo backend. Solo registra pendientes posibles para ordenar decisiones futuras.

## Principio de Gobernanza

El backend de AlmaDesign Web solo debe crecer si existe una necesidad real, validada y defendible.

No se debe crear backend por costumbre, moda o anticipación innecesaria.

Antes de abrir cualquier módulo backend se debe responder:

> ¿Qué problema operativo resuelve?
> ¿Qué dato necesita persistir?
> ¿Qué riesgo introduce?
> ¿Qué trazabilidad exige?
> ¿Qué alternativa más simple existe?

## 1. Capa de configuración

- [ ] Revisar configuración actual de `config/app.php`.
- [ ] Definir si se requiere configuración separada por ambiente.
- [ ] Mantener `.env` fuera de Git.
- [ ] Mantener `.env.example` sin secretos reales.
- [ ] Documentar variables obligatorias sin revelar valores.
- [ ] Validar que ningún secreto se imprima en errores o logs.

Estado recomendado:
PENDIENTE_SOLO_SI_CRECE_BACKEND.

## 2. Formulario de contacto

Estado actual:
FORMULARIO_CONTACTO_PRODUCTIVO: VALIDADO.

Pendientes futuros posibles:

- [ ] Confirmar Reply-To productivo secundario si Mauricio lo solicita.
- [ ] Evaluar si se requiere almacenamiento de leads.
- [ ] Evaluar integración futura con CRM.
- [ ] Evaluar confirmación automática por correo al usuario.
- [ ] Evaluar plantilla HTML transaccional.
- [ ] Evaluar rate limit persistente si aumenta tráfico.
- [ ] Evaluar captcha solo si hay abuso real.
- [ ] Mantener validación server-side como fuente de verdad.
- [ ] Mantener validación client-side solo como mejora UX.

No implementar ahora.

## 3. Persistencia de datos

Estado actual:
BASE_DE_DATOS: NO_ABIERTA.

Pendientes futuros posibles:

- [ ] Definir si el sitio realmente necesita base de datos.
- [ ] Separar contenido público de datos operativos.
- [ ] Diseñar modelo mínimo solo si existe caso de uso real.
- [ ] Evitar CMS completo si archivos PHP/Markdown bastan.
- [ ] Definir política de backup antes de crear datos persistentes.
- [ ] Definir política de retención.
- [ ] Definir política de privacidad.
- [ ] Definir migraciones antes de producción.
- [ ] Definir rollback de esquema.

No abrir base de datos sin frente explícito.

## 4. Administración de contenidos

Pendientes futuros posibles:

- [ ] Evaluar si se requiere panel de administración.
- [ ] Evaluar si basta contenido versionado en Git.
- [ ] Definir roles editoriales si existe panel.
- [ ] Definir flujo de aprobación de contenido.
- [ ] Definir historial de cambios.
- [ ] Evitar WordPress salvo decisión explícita.
- [ ] Evitar CMS pesado si no existe necesidad operacional.

Estado recomendado:
NO_PRIORIZAR_MIENTRAS_GIT_RESUELVA_CONTENIDO.

## 5. Autenticación y usuarios

Estado actual:
LOGIN: NO_EXISTE.

Pendientes futuros posibles:

- [ ] Definir si habrá usuarios internos.
- [ ] Definir si habrá clientes con acceso privado.
- [ ] Definir roles y permisos.
- [ ] Definir MFA si hay datos sensibles.
- [ ] Definir recuperación de cuenta.
- [ ] Definir auditoría de sesiones.
- [ ] Definir bloqueo por intentos fallidos.
- [ ] Definir expiración de sesión.
- [ ] Definir protección CSRF en rutas privadas.

No crear login sin necesidad real.

## 6. Seguridad backend

Pendientes futuros posibles:

- [ ] Revisar headers desde Nginx y app.
- [ ] Revisar errores visibles al usuario.
- [ ] Confirmar que `display_errors` no esté activo en producción.
- [ ] Validar que logs no contengan secretos.
- [ ] Validar que `public/` no exponga archivos sensibles.
- [ ] Mantener CSRF en formularios.
- [ ] Mantener honeypot.
- [ ] Mantener sanitización de inputs.
- [ ] Mantener escape HTML con `htmlspecialchars`.
- [ ] Evaluar Content Security Policy cuando el frontend se estabilice.

## 7. Logs y auditoría

Pendientes futuros posibles:

- [ ] Definir eventos mínimos a registrar.
- [ ] Evitar guardar cuerpo completo de mensajes.
- [ ] Definir rotación de logs.
- [ ] Definir retención de logs.
- [ ] Definir eventos de seguridad.
- [ ] Definir trazabilidad de errores sin exponer datos personales.
- [ ] Evaluar auditoría inmutable solo si hay datos críticos.

## 8. Backups y recuperación

Estado actual:
BACKUP_VPS_LOCAL: OPERATIVO.

Pendientes futuros posibles:

- [ ] Implementar backup externo cifrado.
- [ ] Implementar backup offline por hitos.
- [ ] Probar restauración no destructiva.
- [ ] Definir recuperación de `.env`.
- [ ] Definir política final de `vendor`.
- [ ] Documentar procedimiento de restore probado.
- [ ] Validar checksum después de cada backup relevante.

## 9. Dependencias

Estado actual:
PHPMailer desplegado como dependencia runtime.

Pendientes futuros posibles:

- [ ] Definir política Composer en VPS.
- [ ] Definir si `vendor` se preserva o se reconstruye.
- [ ] Revisar actualizaciones de PHPMailer bajo control.
- [ ] No ejecutar Composer productivo sin frente explícito.
- [ ] Mantener `composer.lock`.
- [ ] Evaluar escaneo básico de dependencias.

## 10. Rutas backend

Pendientes futuros posibles:

- [ ] Revisar rutas públicas actuales.
- [ ] Separar rutas POST de rutas GET.
- [ ] Mantener `/contacto/enviar` como endpoint controlado.
- [ ] Definir manejo de 404.
- [ ] Definir manejo de 405 si aplica.
- [ ] Evitar endpoints no documentados.
- [ ] Evitar APIs públicas sin autenticación si no son necesarias.

## 11. SEO técnico y generación dinámica

Pendientes futuros posibles:

- [ ] Evaluar sitemap dinámico si crecen páginas.
- [ ] Evaluar schema JSON-LD por tipo de página.
- [ ] Mantener robots.txt controlado.
- [ ] Evitar datos sensibles en metadata.
- [ ] Definir canonical URLs.
- [ ] Evaluar Open Graph por página.

## 12. Integraciones futuras

Pendientes futuros posibles:

- [ ] CRM o gestión de leads.
- [ ] Newsletter.
- [ ] Analítica privacy-friendly.
- [ ] Métricas de formularios sin PII innecesaria.
- [ ] Integración con agenda/calendario.
- [ ] Integración con automatización interna solo si existe caso real.

No integrar servicios externos sin política de datos.

## 13. AI for Humans y backend

El manifiesto AI for Humans no requiere backend propio.

Pendientes futuros posibles:

- [ ] Evaluar si se requiere registro de interés.
- [ ] Evaluar si se requiere descarga de manifiesto.
- [ ] Evaluar si se requiere newsletter.
- [ ] Evaluar si se requiere versión firmada.
- [ ] No construir funcionalidades hasta validar uso real.

## 14. Apogeo y backend

La página `/apogeo` es frontend público.

No confundir con Apogeo Lux backend.

Pendientes futuros posibles para AlmaDesign Web:

- [ ] Evaluar formulario específico de interés Apogeo.
- [ ] Evaluar lead tagging.
- [ ] Evaluar landing por vertical futura.
- [ ] No conectar con GraphRAG backend desde este sitio sin frente explícito.

## 15. Criterios para abrir backend

Un frente backend solo puede abrirse si cumple al menos una de estas condiciones:

- Existe dato que debe persistirse.
- Existe proceso manual repetido que requiere trazabilidad.
- Existe necesidad de autenticación.
- Existe integración externa validada.
- Existe requisito legal, comercial u operativo.
- Existe riesgo que el backend debe controlar.

Si no cumple, mantener frontend estático/MVC liviano.

## Checklist de autorización antes de implementar backend

Antes de cualquier implementación backend, Mauricio debe aprobar:

- [ ] Problema concreto.
- [ ] Alcance funcional.
- [ ] Datos a guardar.
- [ ] Datos que NO se guardarán.
- [ ] Política de privacidad.
- [ ] Seguridad mínima.
- [ ] Backup.
- [ ] Rollback.
- [ ] Pruebas.
- [ ] Deploy controlado.

## Dictamen vigente

BACKEND_ALMADESIGN_WEB: NO_ABRIR_TODAVIA.

El sitio puede seguir avanzando con frontend, contenido, documentación y deploy controlado sin abrir backend adicional.
