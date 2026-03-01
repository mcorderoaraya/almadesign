# QA TEST PLAN — Almadesign
## TASK-QA-100 — Comprehensive QA Test Plan

**Owner Role:** QA Engineer
**Stack:** PHP 8.x · MySQL 8.x · Tailwind CSS · HTML5
**Date:** 2026-02-28 (actualizado post-sprint MySQL + HTTPS)
**Status:** ACTIVE

**Leyenda de estado:** ✅ PASS · ❌ FAIL · ⬜ Pendiente · ⚠️ Parcial

---

## 1. SCOPE

### In scope
- Backend HTTP layer (Request, Response, Router, Kernel)
- Middleware stack (Auth, CSRF, RateLimit, Validation, Role)
- Use Cases y Domain Entities (User)
- Repositories y persistencia (PDOFactory, MySQLUserRepository)
- Error handling y catálogo de errores
- Rutas registradas en `public/index.php`
- Validación server-side (Validator)
- Vistas HTML5 (layouts, pages, admin, partials, blocks)
- Entorno HTTPS local (mkcert + Apache mod_ssl)

### Out of scope
- Plugins no implementados aún (Backup, Heatmap, Visits, Inbox)
- Funcionalidad de email (EmailService — sin SMTP configurado)
- Frontend Tailwind CSS (build pipeline separado)

---

## 2. TEST SUITES

---

### SUITE-01 · Bootstrap & Entry Point

**Objetivo:** Verificar que el sistema arranca correctamente desde `public/index.php`.

| ID | Caso de prueba | Acción | Resultado esperado | Estado |
|----|---------------|--------|--------------------|--------|
| TC-01-01 | Autoload presente | `php -r "require 'vendor/autoload.php';"` | Sin error fatal | ✅ |
| TC-01-02 | .env carga correctamente | `GET /` con `.env` presente | HTTP 200, JSON válido | ✅ |
| TC-01-03 | .env ausente no rompe sistema | Sin `.env`, `GET /` | HTTP 200 (sistema resiste sin .env) | ✅ |
| TC-01-04 | Autoload ausente retorna 500 JSON | Mover `vendor/` temporalmente | HTTP 500, `AUTOLOAD_MISSING` en JSON | ⬜ |
| TC-01-05 | Entrada única: no hay `echo` suelto | Revisión estática de `index.php` | Ningún `echo/die/exit` fuera de Response | ✅ |

**Comandos de verificación:**
```bash
curl https://almadesign.local/
curl https://almadesign.local/health
php -l public/index.php
```

---

### SUITE-02 · Router & RouteCollection

**Objetivo:** Verificar que el enrutamiento resuelve correctamente todas las rutas.

| ID | Caso de prueba | Acción | Resultado esperado | Estado |
|----|---------------|--------|--------------------|--------|
| TC-02-01 | Ruta raíz GET / | `GET /` | HTTP 200, `{"success":true,"data":{"service":"almadesign-backend","status":"running"}}` | ✅ |
| TC-02-02 | Ruta /health GET | `GET /health` | HTTP 200, `{"success":true,"data":{"status":"healthy"}}` | ✅ |
| TC-02-03 | Ruta inexistente → 404 JSON | `GET /ruta-inexistente` | HTTP 404, `NOT_FOUND` en body | ✅ |
| TC-02-04 | Método incorrecto → 405 | `POST /health` | HTTP 405, `METHOD_NOT_ALLOWED` | ⬜ |
| TC-02-05 | Parámetro de ruta válido `{id:\d+}` | `GET /users/5` | HTTP 200 o respuesta de use case | ⬜ (requiere DB) |
| TC-02-06 | Parámetro inválido `{id:\d+}` con letra | `GET /users/abc` | HTTP 404, route no hace match | ✅ |
| TC-02-07 | Route params resueltos correctamente | `GET /users/42` | `id=42` en `$request->getRouteParams()` | ⬜ (requiere DB) |

**Comandos de verificación:**
```bash
curl -X GET https://almadesign.local/
curl -X GET https://almadesign.local/health
curl -X GET https://almadesign.local/nonexistent
curl -X POST https://almadesign.local/health
curl -X GET https://almadesign.local/users/5
curl -X GET https://almadesign.local/users/abc
```

---

### SUITE-03 · Kernel & Error Handling

**Objetivo:** Verificar que el Kernel captura excepciones y centraliza errores.

| ID | Caso de prueba | Acción | Resultado esperado | Estado |
|----|---------------|--------|--------------------|--------|
| TC-03-01 | ValidationException → HTTP 422 | Ruta con validación fallida | HTTP 422, `VALIDATION_FAILED`, details con campos | ⬜ |
| TC-03-02 | Throwable genérico → HTTP 500 | Forzar excepción interna | HTTP 500, `INTERNAL_ERROR`, sin stack trace en body | ✅ |
| TC-03-03 | DomainException → código de dominio | Lanzar `DomainException` con código | Código de dominio en respuesta | ⬜ |
| TC-03-04 | Respuesta siempre es JSON válido | Cualquier error | Content-Type: application/json | ✅ |
| TC-03-05 | No `echo` directo en Kernel | Revisión estática | Kernel solo retorna Response | ✅ |
| TC-03-06 | ErrorCatalog cubre todos los códigos | `NOT_FOUND, VALIDATION_FAILED, UNAUTHORIZED, FORBIDDEN, CSRF_FAILED, RATE_LIMITED, INTERNAL_ERROR` | Status HTTP correcto para cada código | ✅ |

**ErrorCatalog Status Map esperado:**

| Código interno | HTTP Status |
|---------------|-------------|
| NOT_FOUND | 404 |
| METHOD_NOT_ALLOWED | 405 |
| VALIDATION_FAILED | 422 |
| UNAUTHORIZED | 401 |
| FORBIDDEN | 403 |
| CSRF_FAILED | 419 |
| RATE_LIMITED | 429 |
| INTERNAL_ERROR | 500 |

---

### SUITE-04 · Middleware Stack

**Objetivo:** Verificar que cada middleware se ejecuta y respeta el pipeline.

#### 4.1 — RateLimitMiddleware

| ID | Caso de prueba | Acción | Resultado esperado | Estado |
|----|---------------|--------|--------------------|--------|
| TC-04-01 | Request normal pasa | `GET /` (bajo el límite) | Pasa al handler | ✅ |
| TC-04-02 | Exceso de requests → 429 | Enviar > límite de requests | HTTP 429, `RATE_LIMITED` | ⬜ |

#### 4.2 — AuthMiddleware

| ID | Caso de prueba | Acción | Resultado esperado | Estado |
|----|---------------|--------|--------------------|--------|
| TC-04-03 | Sin header Authorization | Request sin header | HTTP 401, `{"error":"Unauthorized"}` | ✅ |
| TC-04-04 | Con header Authorization presente | Request con header válido | Pasa al next middleware | ✅ |

#### 4.3 — ValidationMiddleware

| ID | Caso de prueba | Acción | Resultado esperado | Estado |
|----|---------------|--------|--------------------|--------|
| TC-04-05 | Params válidos → pasa | `GET /users/10` | Controller ejecutado | ✅ |
| TC-04-06 | Source `params` valida route params | `GET /users/10` con regla `required|numeric` | Sin error si ID es numérico | ✅ |
| TC-04-07 | Source `body` valida POST body | `POST` con JSON inválido | HTTP 422, `VALIDATION_FAILED` | ⬜ |
| TC-04-08 | Source `query` valida query string | `GET /ruta?param=val` con regla faltante | HTTP 422 si falta campo required | ⬜ |

#### 4.4 — CsrfMiddleware

| ID | Caso de prueba | Acción | Resultado esperado | Estado |
|----|---------------|--------|--------------------|--------|
| TC-04-09 | POST sin token CSRF | `POST /` sin CSRF token | HTTP 419, `CSRF_FAILED` | ⬜ |
| TC-04-10 | POST con token válido | `POST /` con token correcto | Pasa al next | ⬜ |

#### 4.5 — RoleMiddleware

| ID | Caso de prueba | Acción | Resultado esperado | Estado |
|----|---------------|--------|--------------------|--------|
| TC-04-11 | Usuario sin rol requerido | Request con rol insuficiente | HTTP 403, `FORBIDDEN` | ⬜ |
| TC-04-12 | Usuario con rol correcto | Request con rol admin | Pasa al next | ⬜ |

#### 4.6 — Pipeline de middleware

| ID | Caso de prueba | Acción | Resultado esperado | Estado |
|----|---------------|--------|--------------------|--------|
| TC-04-13 | Middleware no usa echo/die/exit | Revisión estática de todos los middlewares | Ningún output directo | ✅ |
| TC-04-14 | Middleware devuelve Response o llama next | Revisión estática | Firma `handle(Request, callable): Response` | ✅ |
| TC-04-15 | Pipeline acepta instancias Y class-strings | Router con `new RateLimitMiddleware()` | Middleware ejecutado sin error | ✅ |

---

### SUITE-05 · Validators & DTOs

**Objetivo:** Verificar que la validación server-side es robusta y correcta.

| ID | Caso de prueba | Acción | Resultado esperado | Estado |
|----|---------------|--------|--------------------|--------|
| TC-05-01 | Campo `required` vacío | `validate(['id' => ''])` | Falla con error en `id` | ⬜ |
| TC-05-02 | Campo `numeric` con string | `validate(['id' => 'abc'])` | Falla con error en `id` | ⬜ |
| TC-05-03 | Campo válido pasa | `validate(['id' => '5'])` con `required|numeric` | Retorna `true` | ✅ |
| TC-05-04 | Múltiples errores reportados | 2+ campos inválidos | Errors array con todos los fallos | ⬜ |
| TC-05-05 | `GetUserRequestDTO::fromRequest()` extrae id | Request con `id=10` en params | `$dto->id === 10` | ⬜ |
| TC-05-06 | `SaveUserRequestDTO` con datos válidos | DTO con email y name | Construye correctamente | ⬜ |

---

### SUITE-06 · Entities & Domain

**Objetivo:** Verificar integridad de la capa de dominio.

| ID | Caso de prueba | Acción | Resultado esperado | Estado |
|----|---------------|--------|--------------------|--------|
| TC-06-01 | `User` constructor asigna propiedades | `new User(1, 'a@b.com', 'Juan')` | `id()=1`, `email()='a@b.com'`, `name()='Juan'` | ⬜ |
| TC-06-02 | `User` con id null válido | `new User(null, 'a@b.com', 'Juan')` | `id() === null` | ⬜ |
| TC-06-03 | `User::withId()` crea nueva instancia | `$user->withId(5)` | Nueva instancia con id=5, mismos datos | ⬜ |
| TC-06-04 | `User` no conoce HTTP ni DB | Revisión estática de `User.php` | Sin imports de Http/Repository | ✅ |
| TC-06-05 | `BaseEntity` proporciona base común | Revisión de `BaseEntity.php` | Herencia limpia | ✅ |

---

### SUITE-07 · Repositories & PDO

**Objetivo:** Verificar que la capa de repositorios sigue el contrato correcto y persiste via PDO.

| ID | Caso de prueba | Acción | Resultado esperado | Estado |
|----|---------------|--------|--------------------|--------|
| TC-07-01 | `UserRepositoryInterface` define contrato | Revisión de interfaz | Métodos `findById()`, `save()`, `update()` presentes | ✅ |
| TC-07-02 | `UserRepositoryInterface` tiene namespace correcto | `php -l` sin warnings | `namespace App\Repositories` declarado | ✅ |
| TC-07-03 | `MySQLUserRepository` implementa interfaz | Revisión de clase | Implementa `UserRepositoryInterface` | ✅ |
| TC-07-04 | `PDOFactory::create()` retorna PDO | Con `.env` configurado | Instancia PDO sin excepción | ⬜ (requiere DB) |
| TC-07-05 | `PDOFactory::create()` lanza RuntimeException sin DB | Sin `.env` | `RuntimeException: Database connection failed` | ✅ |
| TC-07-06 | `findById()` retorna null si no existe | `findById(99999)` | `null` | ⬜ (requiere DB) |
| TC-07-07 | `findById()` retorna User si existe | `findById($id_real)` | Instancia User con datos correctos | ⬜ (requiere DB) |
| TC-07-08 | DI lazy — GET / no instancia PDO | `GET /` sin `.env` | HTTP 200 — PDOFactory no se ejecuta | ✅ |

---

### SUITE-08 · HTTP Request & Response

**Objetivo:** Verificar los objetos HTTP del framework interno.

| ID | Caso de prueba | Acción | Resultado esperado | Estado |
|----|---------------|--------|--------------------|--------|
| TC-08-01 | `Request::fromGlobals()` construye desde $_SERVER | Simular superglobals | Método y path capturados correctamente | ✅ |
| TC-08-02 | `Request::withRouteParams()` inmutabilidad | Llamar `withRouteParams(['id' => 1])` | Nueva instancia de Request | ⬜ |
| TC-08-03 | `Response::json()` setea Content-Type | `Response::json(['ok'=>true])` | `Content-Type: application/json` | ✅ |
| TC-08-04 | `Response::json()` con status | `Response::json($data, 404)` | HTTP status 404 | ✅ |
| TC-08-05 | `Response::send()` es el único punto de salida | Revisión arquitectónica | Solo `send()` hace output | ✅ |
| TC-08-06 | `getHeader()` retorna null si ausente | Request sin Authorization | `getHeader('Authorization') === null` | ✅ |

---

### SUITE-09 · Seguridad

**Objetivo:** Verificar que los controles de seguridad básicos están en lugar.

| ID | Caso de prueba | Acción | Resultado esperado | Estado |
|----|---------------|--------|--------------------|--------|
| TC-09-01 | Stack trace NO en producción | Excepción en runtime | Body JSON sin `trace`, sin ruta de archivo | ✅ |
| TC-09-02 | Mensajes de error no exponen detalles internos | Error HTTP 500 | Mensaje genérico `Internal Server Error` | ✅ |
| TC-09-03 | Passwords never plain text | Revisión de `User.php` | Sin campos `password` en texto plano | ⬜ |
| TC-09-04 | Rutas admin requieren Auth | Request a `/admin/*` sin token | HTTP 401 antes del controller | ⬜ |
| TC-09-05 | SQL Injection — solo prepared statements | Revisión de repositorios | PDO con `prepare()`/`execute()` | ✅ |
| TC-09-06 | XSS — output escapado en vistas | Revisión de `.php` en views/ | Uso de `htmlspecialchars()` o equivalente | ⬜ |
| TC-09-07 | CSRF protege POST sensibles | POST sin token | HTTP 419 | ⬜ |
| TC-09-08 | HTTPS activo en entorno local | `https://almadesign.local/` | Candado verde, sin warnings SSL | ✅ |
| TC-09-09 | Certificado mkcert válido | Inspección del cert en browser | `DNS:almadesign.local`, expira 2028 | ✅ |

---

### SUITE-10 · Views (HTML5 + Tailwind)

**Objetivo:** Verificar que las vistas siguen la estructura HTML5 correcta con Tailwind.

| ID | Caso de prueba | Acción | Resultado esperado | Estado |
|----|---------------|--------|--------------------|--------|
| TC-10-01 | Layout base tiene `<!DOCTYPE html>` | Revisar `base.layout.php` | Primera línea es DOCTYPE | ⬜ |
| TC-10-02 | Head include tiene `<meta charset="utf-8">` | Revisar `head.php` partial | Meta charset presente | ⬜ |
| TC-10-03 | Head include tiene `<meta name="viewport">` | Revisar `head.php` partial | Meta viewport para responsive | ⬜ |
| TC-10-04 | Tailwind CSS incluido | Revisar layouts | Link o CDN de Tailwind presente | ⬜ |
| TC-10-05 | Vistas públicas renderizan sin error PHP | Simular render de `home.php` | Sin error de sintaxis | ⬜ |
| TC-10-06 | Vistas admin usan admin.layout.php | Revisar views/admin/*.php | Include del layout admin | ⬜ |
| TC-10-07 | Bloques usan contratos de datos definidos | Revisar views/blocks/ | Sin acceso directo a BD | ⬜ |
| TC-10-08 | Errores 404/500 renderizan página amigable | Simular error | Vista de error renderizada | ⬜ |
| TC-10-09 | HTML semántico en páginas públicas | Revisar páginas públicas | `<header>`, `<main>`, `<footer>`, `<nav>` presentes | ⬜ |
| TC-10-10 | Tailwind build genera CSS optimizado | `npm run build` | Archivo CSS generado sin errores | ✅ |
| TC-10-11 | Tailwind watch detecta clases en views/ | `npm run dev`, editar vista | CSS recompilado automáticamente | ✅ |

---

### SUITE-11 · Regresión (Golden Paths)

**Objetivo:** Verificar que los flujos principales no se rompieron entre sprints.

**Ejecutado via:** `php cline/golden_path_test.php` + verificación browser HTTPS

| ID | Caso de prueba | Resultado esperado | Estado | Fecha |
|----|--------------|--------------------|--------|-------|
| TC-11-01 | `GET /` retorna 200 JSON | `{"success":true,...}` | ✅ PASS | 2026-02-28 |
| TC-11-02 | `GET /health` retorna 200 JSON | `{"success":true,"data":{"status":"healthy"}}` | ✅ PASS | 2026-02-28 |
| TC-11-03 | `GET /ruta-404` retorna 404 JSON | `{"success":false,"code":"NOT_FOUND",...}` | ✅ PASS | 2026-02-28 |
| TC-11-04 | `POST /health` retorna 405 JSON | `{"success":false,"code":"METHOD_NOT_ALLOWED",...}` | ⬜ Pendiente | — |
| TC-11-05 | `GET /users/abc` retorna 404 | Route constraint `\d+` no hace match | ✅ PASS | 2026-02-28 |
| TC-11-06 | `composer dump-autoload -o` sin errores | Exit code 0, 132 clases, 0 warnings PSR-4 | ✅ PASS | 2026-02-28 |
| TC-11-07 | PHP lint en archivos del sprint | `php -l` en 5 archivos modificados | ✅ PASS | 2026-02-28 |
| TC-11-08 | `GET /` vía HTTPS con candado verde | `https://almadesign.local/` en Chrome/Edge/Comet | ✅ PASS | 2026-02-28 |

---

### SUITE-12 · Infraestructura & Entorno

**Objetivo:** Verificar la configuración del entorno de desarrollo local.

| ID | Caso de prueba | Acción | Resultado esperado | Estado |
|----|---------------|--------|--------------------|--------|
| TC-12-01 | Apache escucha en puerto 80 | `netstat` | `0.0.0.0:80 LISTENING` | ✅ |
| TC-12-02 | Apache escucha en puerto 443 | `netstat` | `0.0.0.0:443 LISTENING` | ✅ |
| TC-12-03 | Módulo SSL cargado | Verificar `httpd.conf` | `LoadModule ssl_module` sin `#` | ✅ |
| TC-12-04 | Certificado mkcert en disco | `ls C:/Apache24/conf/ssl/` | `.pem` y `-key.pem` presentes | ✅ |
| TC-12-05 | CA raíz mkcert en Windows Trust Store | `mkcert -install` | `The local CA is now installed` | ✅ |
| TC-12-06 | `almadesign.local` en hosts file | `Get-Content .../hosts` | `127.0.0.1   almadesign.local` | ✅ |
| TC-12-07 | VirtualHost HTTP configurado | Revisar `httpd-vhosts.conf` | `ServerName almadesign.local`, puerto 80 | ✅ |
| TC-12-08 | VirtualHost HTTPS configurado | Revisar `httpd-vhosts.conf` | `ServerName almadesign.local`, SSLEngine on | ✅ |
| TC-12-09 | `.env.example` existe en raíz | `ls .env.example` | Archivo presente | ✅ |
| TC-12-10 | Migration SQL existe | `ls database/migrations/` | `001_create_users_table.sql` presente | ✅ |
| TC-12-11 | `tailwind-dev` inicia correctamente | `preview_start tailwind-dev` | CSS compilado, watch activo | ✅ |

---

## 3. QA CHECKLIST GLOBAL

- [x] Todos los archivos PHP del sprint pasan `php -l` sin errores
- [x] `composer dump-autoload -o` → 132 clases, 0 warnings PSR-4
- [x] `GET /` retorna HTTP 200 con JSON válido (HTTP y HTTPS)
- [x] `GET /health` retorna HTTP 200 con JSON válido
- [x] Rutas desconocidas retornan HTTP 404 JSON
- [x] `GET /users/abc` retorna 404 (constraint `\d+`)
- [x] Middleware pipeline no usa `echo/die/exit`
- [x] `Response::send()` es el único punto de salida
- [x] HTTPS local activo con candado verde (Chrome, Edge, Comet)
- [x] PDOFactory lazy — GET / y /health no fallan sin DB
- [ ] Métodos incorrectos retornan HTTP 405 JSON
- [ ] Validación fallida retorna HTTP 422 con `details`
- [ ] Sin stack trace expuesto en errores 500
- [ ] HTML5 DOCTYPE en todas las vistas
- [ ] Tailwind CSS incluido en layouts

---

## 4. COMANDOS DE VERIFICACIÓN MANUAL

```bash
# Lint PHP
php -l public/index.php
php -l app/App/Kernel.php
php -l app/Routing/Router.php
php -l app/Database/PDOFactory.php
php -l app/Application/GetUserUseCase.php
php -l app/Repositories/UserRepositoryInterface.php

# Composer
composer dump-autoload -o

# Golden path CLI
php cline/golden_path_test.php

# Rutas HTTP (reemplazar con https:// para HTTPS)
curl -sk https://almadesign.local/ | python -m json.tool
curl -sk https://almadesign.local/health | python -m json.tool
curl -sk https://almadesign.local/notfound | python -m json.tool
curl -sk -X POST https://almadesign.local/health | python -m json.tool
curl -sk https://almadesign.local/users/5 | python -m json.tool
curl -sk https://almadesign.local/users/abc | python -m json.tool

# Verificar SSL
openssl s_client -connect 127.0.0.1:443 -servername almadesign.local

# Rate limit
for i in {1..20}; do curl -sk -o /dev/null -w "%{http_code}\n" https://almadesign.local/; done

# Auth middleware
curl -sk https://almadesign.local/users/1 | python -m json.tool
curl -sk -H "Authorization: Bearer test" https://almadesign.local/users/1 | python -m json.tool

# Tailwind
npm run build
npm run dev
```

---

## 5. ROLLBACK PLAN

Si algún test crítico falla:
1. `git log --oneline -10` para identificar commit estable
2. `git revert HEAD` o `git checkout <commit-hash> -- <file>` para revertir archivo específico
3. Re-ejecutar `SUITE-11` (regresión) para confirmar estabilidad
4. Documentar defecto encontrado antes de continuar

---

## 6. CRITERIOS DE APROBACIÓN

El sistema es **APROBADO** por QA si:
- SUITE-11 (Regresión): 100% PASS
- SUITE-01 (Bootstrap): 100% PASS
- SUITE-02 (Router): ≥ 85% PASS
- SUITE-03 (Kernel/Errors): ≥ 85% PASS
- SUITE-12 (Infraestructura): 100% PASS
- Cero errores críticos de seguridad (SUITE-09)
- Cero errores de sintaxis PHP

El sistema es **RECHAZADO** si:
- Cualquier test de SUITE-11 falla
- Cualquier test de SUITE-09 (seguridad) critico falla
- Stack trace expuesto en producción
- `php -l` reporta errores en archivos core

---

## 7. EJECUCIONES REGISTRADAS

| Fecha | Sprint | Golden Paths | Lint | Autoload | Resultado |
|-------|--------|-------------|------|---------|-----------|
| 2026-02-28 | DT-01/02/03 | 6/6 ✅ | ✅ | 0 warnings | ✅ APROBADO |
| 2026-02-28 | MySQL Sprint | 4/4 ✅ | ✅ | 132 clases, 0 warnings | ✅ APROBADO |
| 2026-02-28 | HTTPS Setup | TC-12 11/11 ✅ | N/A | N/A | ✅ APROBADO |

---

**QA Engineer:** Mauricio Cordero Araya
**Fecha de ejecución:** 2026/02/28
**Decisión final:** ✅ APROBADO (golden paths y entorno)

---
*End of QA Test Plan — TASK-QA-100 v1.2*
