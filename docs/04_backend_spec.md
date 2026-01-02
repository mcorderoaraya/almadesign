# Backend Specification – Almadesign

---

## 1. Scope

This document specifies the **backend behavior and constraints**.
It defines what the backend is allowed to do at this stage.

[ES]
Este documento evita que el backend se convierta en un “todo vale”.

---

## 2. Backend Responsibilities

The backend is responsible for:
- Application lifecycle control
- HTTP request processing
- Response generation
- Security enforcement (future phases)

The backend is NOT responsible for:
- Frontend design
- Asset compilation
- Presentation logic decisions

[ES]
Backend y frontend no se mezclan.

---

## 3. Kernel Responsibilities (Phase 1)

Current Kernel responsibilities:
- Own execution flow
- Confirm bootstrap correctness
- Execute run()

Explicitly excluded:
- Routing
- Controllers
- Database access
- Plugins
- Middleware

[ES]
El Kernel todavía es mínimo a propósito.

---

## 4. Dependency Rules

- No service may be instantiated before Kernel execution
- No global state is allowed
- No static service locators

[ES]
Esto evita arquitecturas frágiles e imposibles de testear.

---

## 5. Configuration Handling

- Configuration is loaded via .env
- No config values are hardcoded
- Missing config must fail explicitly

[ES]
La configuración implícita es una fuente de errores.

---

## 6. Logging (Deferred)

Logging exists as a concept but is not active in Phase 1.

[ES]
No se logea antes de tener flujo estable.
Primero corre, después se observa.

---

## 7. Backend Evolution Rules

Any new backend feature must:
- Be introduced via the Kernel
- Respect existing validated layers
- Be documented before implementation

[ES]
No se escribe código sin contexto documental.

---
