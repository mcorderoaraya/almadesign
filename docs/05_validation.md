# Backend Validation and Security Tests
[ES] Documento de validación funcional y de seguridad del backend.

---

## 1. Validation Scope
This document defines the validation steps required to approve backend tasks.

[ES] QA valida comportamiento real, no intenciones.

---

## 2. Entry Point Validation

- GET / → 200 OK
- GET /health → 200 OK
- Unknown route → 404 JSON

[ES] Si alguna de estas falla, el sistema no es estable.

---

## 3. Middleware Validation (TASK-090.5)

### 3.1 Rate Limiting
- Multiple rapid requests from same IP
- Expected result: HTTP 429

[ES] El sistema debe bloquear abuso sin caerse.

---

### 3.2 Authentication
- Request without Authorization header
- Expected result: HTTP 401

[ES] No se permite acceso no autenticado cuando aplique.

---

### 3.3 CSRF Protection
- POST/PUT/DELETE without X-CSRF-TOKEN
- Expected result: HTTP 403

[ES] CSRF solo se evalúa en métodos mutables.

---

## 4. Error Handling Validation

- Force exception in controller
- Expected result: HTTP 500 JSON

[ES] No deben aparecer trazas PHP ni HTML.

---

## 5. Tools for Validation

Recommended commands:
- curl
- PowerShell Invoke-WebRequest
- Browser (manual check)

[ES] Un 404 es un resultado válido, aunque PowerShell lo marque como excepción.

---

## 6. Acceptance Criteria

- All middleware responses are deterministic
- No side effects in Router or Controllers
- index.php remains orchestration-only

[ES] Si el backend “funciona” pero rompe arquitectura, se rechaza.

---

## Route-Scoped Middleware Validation
- Public routes remain accessible
- Protected routes enforce Auth and CSRF
- No side effects on unrelated routes

[ES] Se valida que el scoping no introduzca regresiones.

End of document.