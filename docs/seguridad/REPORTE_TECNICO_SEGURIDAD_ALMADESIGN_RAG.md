# Reporte técnico de seguridad AlmaDesign y RAG

Fecha: 2026-07-19  
Proyecto sitio: `almadesign`  
Proyecto RAG: `rack-core-rag-semantic`  
Servidor productivo: VPS Hostinger KVM 2, Ubuntu 24.04, Nginx, PHP 8.3-FPM

## 1. Objetivo

Documentar las mejoras de seguridad aplicadas al sitio público de AlmaDesign, a la capa de servidor y a la integración con el RAG de AlmaDesign.

El objetivo de estas medidas es reducir superficie de ataque, limitar abuso automatizado, proteger endpoints sensibles y preparar una base gradual para endurecimiento de headers HTTP sin romper la operación pública del sitio ni la interfaz ALMA/RAG.

## 2. Alcance

Este reporte cubre:

- Hardening HTTP del sitio AlmaDesign.
- Protección básica en Nginx para endpoints sensibles.
- Protección contra ráfagas y abuso sobre el RAG público.
- Fail2ban para eventos repetidos de `429`.
- Separación operativa entre sitio web y backend RAG.
- Medidas de seguridad incorporadas a la interfaz pública `/contacto`.

Este reporte no cubre:

- Auditoría profunda de código.
- Pentesting.
- Revisión de secretos.
- Hardening de Cloudflare.
- Hardening completo de PostgreSQL.
- CSP en modo enforcement.
- Seguridad interna del modelo LLM o embeddings.

## 3. Arquitectura relevante

El sistema está separado en dos proyectos:

```text
almadesign              -> sitio público PHP/MVC
rack-core-rag-semantic  -> backend RAG FastAPI / pgvector / LLM
```

El navegador no llama directamente al backend RAG. La ruta pública del sitio actúa como capa controlada:

```text
Navegador
  -> /contacto/rag/*
  -> PHP AlmaDesign
  -> RAG_BASE_URL interno
  -> rack-core-rag-semantic
```

Esta separación reduce exposición directa del backend RAG, evita CORS innecesario y permite aplicar controles en el sitio antes de llegar al servicio semántico.

## 4. Cambios de seguridad en servidor

### 4.1 Rate limit en Nginx

Se configuraron zonas de rate limit en Nginx para proteger rutas públicas, dashboard, formulario y RAG.

Zonas definidas:

```nginx
limit_req_zone $binary_remote_addr zone=alma_public:10m rate=60r/m;
limit_req_zone $binary_remote_addr zone=alma_dashboard:10m rate=5r/m;
limit_req_zone $binary_remote_addr zone=alma_rag:10m rate=6r/m;
limit_req_zone $binary_remote_addr zone=alma_form:10m rate=3r/m;

limit_req_status 429;
```

Rutas protegidas en el virtual host de AlmaDesign:

```nginx
location = /dashboard/login {
    limit_req zone=alma_dashboard burst=5 nodelay;
    try_files $uri /index.php?$query_string;
}

location = /contacto/rag/chat {
    limit_req zone=alma_rag burst=4 nodelay;
    client_max_body_size 16k;
    try_files $uri /index.php?$query_string;
}

location = /contacto/enviar {
    limit_req zone=alma_form burst=2 nodelay;
    client_max_body_size 16k;
    try_files $uri /index.php?$query_string;
}
```

Propósito:

- Reducir fuerza bruta contra login.
- Limitar ráfagas contra el chat RAG.
- Limitar abuso del formulario de contacto.
- Evitar payloads grandes innecesarios en endpoints sensibles.

### 4.2 Fail2ban para abuso por 429

Se instaló y configuró Fail2ban para observar respuestas `429` repetidas desde Nginx.

Objetivo:

- Detectar clientes que insisten contra endpoints rate-limited.
- Bloquear temporalmente IPs con comportamiento abusivo.
- Complementar el rate limit sin reemplazarlo.

Validación operativa observada:

```text
Status for the jail: almadesign-nginx-429
Currently failed: 0
Total failed: 0
Currently banned: 0
Total banned: 0
```

Esto indica que la jail quedó activa y sin bloqueos al momento de la revisión.

### 4.3 Headers existentes vía Nginx

El sitio ya incluía snippets de seguridad y performance:

```nginx
include snippets/almadesign-security-headers.conf;
include snippets/almadesign-performance.conf;
```

En el bloque QA 002 se decidió complementar desde la aplicación PHP con headers centralizados, sin depender exclusivamente de configuración Nginx versionada fuera del repositorio.

## 5. Cambios de seguridad en aplicación web

### 5.1 Headers HTTP centralizados

Se agregó una clase central:

```text
app/Core/SecurityHeaders.php
```

Y se invoca desde:

```text
app/Core/App.php
```

La emisión ocurre al inicio de `App::run()`, antes del despacho de rutas.

Headers implementados:

```text
X-Content-Type-Options: nosniff
X-Frame-Options: SAMEORIGIN
Referrer-Policy: strict-origin-when-cross-origin
Permissions-Policy: geolocation=(), microphone=(), camera=()
Content-Security-Policy-Report-Only: ...
Strict-Transport-Security: max-age=31536000; includeSubDomains
```

### 5.2 HSTS

Se implementó:

```text
Strict-Transport-Security: max-age=31536000; includeSubDomains
```

Condición:

- Solo se emite cuando la request es HTTPS.
- No se emite en desarrollo local HTTP.
- No se incluye `preload`.

Razón:

`preload` es difícil de revertir y exige control total de subdominios. Para esta etapa se aplicó una política segura y reversible.

### 5.3 CSP en Report-Only

Se implementó CSP en modo report-only:

```text
Content-Security-Policy-Report-Only:
default-src 'self';
base-uri 'self';
object-src 'none';
frame-ancestors 'self';
form-action 'self';
img-src 'self' data: https:;
font-src 'self' data: https:;
style-src 'self' 'unsafe-inline' https:;
script-src 'self' 'unsafe-inline' https:;
connect-src 'self' https:;
upgrade-insecure-requests
```

Razón para Report-Only:

- `/contacto` usa scripts externos desde CDN:
  - `marked`
  - `DOMPurify`
  - `mermaid`
- El sitio usa CSS y scripts inline heredados.
- El objetivo del bloque es observar impacto antes de pasar a enforcement.

La política no bloquea todavía; permite medir posibles violaciones sin romper producción.

### 5.4 Evitar duplicados

La clase `SecurityHeaders` verifica headers existentes antes de emitirlos.

Esto evita duplicar:

- HSTS.
- CSP Report-Only.
- X-Frame-Options.
- X-Content-Type-Options.
- Referrer-Policy.
- Permissions-Policy.

## 6. Cambios de seguridad en RAG e interfaz ALMA/RAG

### 6.1 Protección de sesión

Se implementaron límites de uso en la conversación pública:

```text
Duración máxima de sesión: 5 minutos
Máximo de mensajes de usuario: 4
```

Objetivo:

- Reducir consumo excesivo de tokens.
- Evitar conversaciones abiertas indefinidamente.
- Incentivar contacto humano cuando corresponda.

### 6.2 Degradación de modo High/Low

La interfaz muestra un contador de sesión:

```text
05:00 High
```

Al agotarse el tiempo, el flujo cambia a modo restringido o finaliza según estado de captura de datos.

Objetivo:

- Hacer visible al usuario el presupuesto de conversación.
- Evitar gasto silencioso de recursos.
- Mantener una experiencia transparente.

### 6.3 Cooldown global para RAG

Se agregó control de frecuencia a nivel aplicación para `/contacto/rag/chat`.

Constante relevante:

```php
RAG_CHAT_COOLDOWN_SECONDS = 20
```

Uso:

```php
RateLimiter::allowShared(
    'rag_chat_global',
    1,
    self::RAG_CHAT_COOLDOWN_SECONDS,
    BASE_PATH . '/logs/rate-limits'
);
```

Objetivo:

- Evitar ráfagas globales contra el RAG.
- Reducir consumo acelerado de tokens.
- Complementar Nginx con una regla de aplicación.

Resultado esperado:

- Una consulta permitida.
- Consultas dentro de la ventana devuelven `429`.
- Respuesta incluye `Retry-After`.

### 6.4 Validación de payload y tamaño

En Nginx se limitó el tamaño del body para el endpoint RAG:

```nginx
client_max_body_size 16k;
```

En frontend/backend ya existe límite de mensaje:

```text
Máximo 500 palabras
```

Objetivo:

- Evitar payloads excesivos.
- Reducir abuso del endpoint.
- Controlar costo del LLM.

### 6.5 Protección de datos y flujo de contacto

El RAG no debe pedir datos personales de inmediato.

Reglas implementadas en experiencia:

- El usuario puede conversar sin entregar datos.
- Si quiere contacto humano, se solicita consentimiento.
- Solo después se piden nombre, email y teléfono.
- El contexto completo de conversación se envía solo al correo interno.
- Al usuario no se le muestra el contexto interno.
- Si se completa el envío, se redirige al home tras una espera.

Objetivo:

- Reducir exposición de datos personales.
- Mantener consentimiento explícito.
- Separar experiencia pública de trazabilidad interna.

## 7. Validaciones realizadas

### 7.1 Validaciones del bloque de headers

Resultado:

```text
composer validate --no-check-publish: OK
php -l app/config/public/routes/scripts: OK
git diff --check: OK
```

Rutas locales validadas:

```text
/ 200
/consultoria-ia-procesos 200
/apogeo 200
/ai-for-humans 200
/apogeo-lux 200
/contacto 200
/contacto/rag/iniciar 200
```

Headers observados en local:

```text
X-Content-Type-Options: nosniff
X-Frame-Options: SAMEORIGIN
Referrer-Policy: strict-origin-when-cross-origin
Permissions-Policy: geolocation=(), microphone=(), camera=()
Content-Security-Policy-Report-Only: presente
Cache-Control: no-store en /contacto/rag/iniciar
```

HSTS en local:

```text
Ausente en HTTP local. Correcto.
```

Motivo:

El header HSTS solo debe emitirse bajo HTTPS.

### 7.2 Smoke test ALMA/RAG

Ruta:

```text
/contacto/rag/iniciar
```

Resultado:

```text
HTTP 200
JSON válido
conversation_state presente
mensaje inicial consent-first presente
Cache-Control: no-store presente
```

## 8. Riesgos pendientes

### 8.1 CSP aún no está en enforcement

Riesgo:

Todavía no bloquea recursos inseguros; solo reporta.

Recomendación:

Observar violaciones reales en producción antes de pasar a:

```text
Content-Security-Policy
```

### 8.2 Dependencia de CDN en `/contacto`

La interfaz ALMA/RAG carga librerías desde CDN:

```text
https://cdn.jsdelivr.net/npm/marked/marked.min.js
https://cdn.jsdelivr.net/npm/dompurify/dist/purify.min.js
https://cdn.jsdelivr.net/npm/mermaid/dist/mermaid.min.js
```

Riesgo:

- Dependencia externa.
- Menor control sobre disponibilidad.
- CSP enforcement requerirá permitir o reemplazar estos recursos.

Recomendación:

Evaluar versionar estas librerías localmente en `public/assets/vendor/` antes de CSP enforcement.

### 8.3 Rate limit global puede afectar usuarios legítimos

El cooldown global protege tokens, pero puede ser estricto si varias personas usan el RAG al mismo tiempo.

Recomendación:

Medir uso real antes de ajustar.

### 8.4 Falta monitoreo formal de CSP

La política Report-Only no define todavía un endpoint `report-uri` o `report-to`.

Recomendación:

Agregar recolección controlada de reportes CSP si se decide avanzar a enforcement.

## 9. Estado actual

Medidas aplicadas:

- Rate limit Nginx por zonas.
- Protección específica para login, RAG y formulario.
- Fail2ban para abuso por `429`.
- Cooldown global del chat RAG.
- Límite de sesión y mensajes en ALMA/RAG.
- Headers de seguridad centralizados en PHP.
- CSP Report-Only.
- HSTS condicionado a HTTPS.
- `no-store` en respuestas JSON del RAG proxy.

Estado:

```text
Hardening pasivo implementado.
CSP preparado para observación.
HSTS seguro sin preload.
ALMA/RAG operativo tras smoke test.
```

## 10. Próximos pasos recomendados

1. Desplegar cambios de headers en producción.
2. Verificar headers reales con `curl -I https://almadesign.cl/contacto`.
3. Confirmar que HSTS aparece solo en HTTPS.
4. Observar comportamiento de `/contacto` con Mermaid, Markdown y DOMPurify.
5. Evaluar mover librerías CDN a assets locales.
6. Definir endpoint de reportes CSP.
7. Solo después evaluar CSP enforcement.

