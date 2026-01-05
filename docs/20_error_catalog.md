# 20_error_catalog.md
Centralized Error Catalog and Response Contract

================================================================
[ES] Este documento define el contrato ÚNICO y OBLIGATORIO
     para todos los errores del backend.
     No es orientativo. Es normativo.
================================================================

## 1. Purpose

This document defines the single, centralized error catalog used by
the entire backend system.

[ES]
- Ninguna capa puede inventar errores.
- Ninguna capa puede definir su propio formato.
- Ninguna capa puede responder fuera de este contrato.

The goals are:
- Predictable API behavior
- Stable frontend integration
- Centralized governance
- Zero ambiguity during debugging

---

## 2. Standard Error Response Structure

Every error response MUST follow this structure exactly:

{
  "success": false,
  "error": "Not Found",
  "code": "NOT_FOUND",
  "meta": {
    "method": "GET",
    "path": "/users/abc",
    "timestamp": "2026-01-04T12:00:00Z"
  },
  "details": {}
}

[ES]
- `success` SIEMPRE es false en errores
- `error` es un mensaje público, estable y no dinámico
- `code` es el identificador interno del error
- `meta` entrega contexto mínimo de la request
- `details` es opcional y solo para información segura

---

## 3. Error Code Table

| Internal Code       | HTTP  | Description                    |
|---------------------|-------|--------------------------------|
| NOT_FOUND           | 404   | Route or resource not found    |
| METHOD_NOT_ALLOWED  | 405   | HTTP method not allowed        |
| VALIDATION_FAILED   | 422   | Request validation failed      |
| UNAUTHORIZED        | 401   | Authentication required        |
| FORBIDDEN           | 403   | Insufficient permissions       |
| CSRF_FAILED         | 419   | Invalid or missing CSRF token  |
| RATE_LIMITED        | 429   | Too many requests              |
| INTERNAL_ERROR      | 500   | Unhandled internal error       |

[ES]
- El frontend depende de estos códigos
- No se pueden renombrar arbitrariamente
- Agregar uno nuevo requiere actualizar este archivo

---

## 4. Layer Responsibilities

### Router

Responsibilities:
- Match routes
- Extract parameters
- Detect missing routes

Restrictions:
- MUST NOT send responses
- MUST NOT define HTTP codes
- MUST delegate errors to ErrorController

[ES]
El router solo enruta. No decide finales.

---

### Controllers

Responsibilities:
- Handle business logic
- Return Response objects

Restrictions:
- MUST NOT echo or print
- MUST NOT call http_response_code
- MUST NOT format error payloads

[ES]
Los controllers no controlan errores globales.

---

### Middleware

Responsibilities:
- Intercept request flow
- Enforce security or limits

Restrictions:
- MUST use the error catalog
- MUST return Response, never raw output

[ES]
Un middleware puede cortar el flujo, pero no romper el contrato.

---

### Kernel

Responsibilities:
- Central execution coordinator
- Exception capture
- Final response dispatch

Restrictions:
- MUST NOT expose stack traces
- MUST NOT leak internal messages

[ES]
El Kernel es el último guardián antes de responder.

---

## 5. ErrorController

The ErrorController is the ONLY component allowed to:

- Build error responses
- Map errors to HTTP status codes
- Use the Error Catalog directly

Mandatory methods:

- notFound(Request $request)
- exception(Throwable $e, Request $request)
- methodNotAllowed(Request $request)

[ES]
Si un error no pasa por ErrorController, es un bug.

---

## 6. Exception Handling Rules

Rules:
- No exception is ever printed
- No exception exposes internal details
- No exception bypasses the catalog

Flow:

Exception
  → Kernel
    → ErrorController
      → Error Catalog
        → JSON Response

[ES]
El stacktrace vive en logs, no en la API.

---

## 7. Governance Rules (NON-NEGOTIABLE)

1. ❌ No HTTP codes outside the catalog
2. ❌ No echo / die / var_dump
3. ❌ No dynamic error messages to clients
4. ✅ One stable internal error code per case
5. ✅ Single response exit point
6. ✅ All errors are JSON
7. ✅ Frontend can rely on structure

[ES]
Estas reglas no se discuten. Se cumplen.

---

## 8. Expected curl Examples

Request:
curl http://almadesign.local/no-existe

Response:
{
  "success": false,
  "error": "Not Found",
  "code": "NOT_FOUND",
  "meta": {
    "method": "GET",
    "path": "/no-existe"
  }
}

Request:
curl http://almadesign.local/users/abc

Response:
{
  "success": false,
  "error": "Not Found",
  "code": "NOT_FOUND",
  "meta": {
    "method": "GET",
    "path": "/users/abc"
  }
}

[ES]
El frontend no debe inferir nada.
Todo está explícito.

---

## 9. Document Status

Version: v1.0
Status: Active
Validated endpoints:
- /
- /health
- /users/{id}

[ES]
Este documento es contractual.
El código debe obedecerlo, no al revés.