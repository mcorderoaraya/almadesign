# Backend Specification
[ES] Especificación técnica del backend del sistema AlmaDesign.

---

## 1. Purpose
This document defines the backend architecture, execution flow, and security mechanisms.

[ES] Este documento describe cómo funciona realmente el backend, no cómo “debería” funcionar.

---

## 2. Entry Point

### public/index.php
The system uses a single entry point located at `/public/index.php`.

Responsibilities:
- Bootstrap Composer autoload
- Create Request from globals
- Execute global middlewares
- Register routes
- Dispatch request to Router
- Send Response

[ES] No existe lógica de negocio en este archivo. Solo orquestación.

---

## 3. Routing Layer

### Router
- Matches HTTP method + path
- Delegates execution to a controller handler
- Returns a Response object

[ES] El Router no conoce seguridad ni middlewares.

---

## 4. Controller Layer

Controllers are explicit and single-responsibility:
- HomeController
- HealthController
- ErrorController

[ES] No existen closures en rutas. Todo pasa por controllers.

---

## 5. Middleware Layer (TASK-090.5)

The backend includes an explicit middleware pipeline executed before routing.

### 5.1 Middleware Interface
All middlewares implement a common interface:
- Input: Request
- Output: Response or null

[ES] Si un middleware retorna Response, el flujo se detiene.

---

### 5.2 RateLimitMiddleware
- Executed first
- Limits requests per IP per time window
- Returns HTTP 429 on abuse

[ES] Protege el sistema a bajo costo computacional.

---

### 5.3 AuthMiddleware
- Verifies presence of Authorization header
- Returns HTTP 401 if missing or invalid

[ES] La validación real de tokens se implementará posteriormente.

---

### 5.4 CsrfMiddleware
- Applied only to POST, PUT, DELETE
- Requires X-CSRF-TOKEN header
- Returns HTTP 403 if missing

[ES] Previene ataques CSRF en operaciones mutables.

---

## 6. Error Handling

All uncaught exceptions are handled by ErrorController:
- notFound() → 404 JSON
- exception() → 500 JSON

[ES] Nunca se exponen errores PHP crudos.

---

## 7. Response Format

All responses are JSON-based:
- Content-Type: application/json
- HTTP status codes are semantically correct

[ES] No se “maquillan” errores con HTTP 200.

---

## Route-Scoped Middleware (TASK-090.6)
Routes may define their own middleware stack.
Execution order:
1. Global middlewares
2. Route-specific middlewares
3. Controller handler

[ES] Permite aplicar seguridad selectiva sin contaminar el Router.

End of document.