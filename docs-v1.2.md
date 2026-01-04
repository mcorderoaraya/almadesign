# PROJECT DOCUMENTATION – VERSION 1.2

Status: STABLE  
Scope: Backend Core – Routing, Kernel, Middleware  
Validated up to: TASK-090.9  

---

## 1. SYSTEM OVERVIEW

The project implements a minimal, explicit backend architecture focused on:

- Deterministic routing
- Explicit controllers
- Centralized error handling
- Middleware by route
- Zero magic / zero implicit DI

This system intentionally avoids frameworks.

---

## 2. REQUEST FLOW (HIGH LEVEL)

1. public/index.php bootstraps the system
2. Request object is created
3. Kernel orchestrates execution
4. Router resolves route + params
5. Middleware executes (if any)
6. Controller returns Response
7. Response is sent
8. Errors are centralized

---

## 3. CORE COMPONENTS

### 3.1 public/index.php

Responsibilities:
- Bootstrap
- Register routes
- Register middleware
- Delegate execution to Kernel

Must remain thin.
No business logic allowed.

---

### 3.2 Kernel

Responsibilities:
- Coordinate request lifecycle
- Call Router
- Catch unhandled exceptions
- Delegate errors to ErrorController

Kernel does NOT:
- Define routes
- Parse parameters
- Handle HTTP output

---

### 3.3 Router

Responsibilities:
- Match method + path
- Execute middleware stack
- Dispatch controller handler

Router does NOT:
- Terminate execution
- Handle errors directly

---

### 3.4 RouteCollection

Responsibilities:
- Register routes
- Compile dynamic paths
- Extract route parameters
- Apply route constraints

Supports:
- /users/{id}
- /users/{id:\d+}

---

### 3.5 Controllers

Responsibilities:
- Execute domain logic
- Use already-resolved parameters
- Return Response objects

Controllers NEVER:
- Read $_GET / $_POST
- Parse URLs
- Handle headers directly

---

### 3.6 ErrorController

Responsibilities:
- Centralize error responses
- Produce consistent JSON output

Defined methods:
- notFound(Request $request)
- exception(Request $request, Throwable $e)

---

### 3.7 Middleware

Responsibilities:
- Intercept request
- Apply cross-cutting rules

Examples:
- AuthMiddleware
- CsrfMiddleware
- RateLimitMiddleware

Middleware is explicit and route-bound.

---

## 4. ROUTING FEATURES STATUS

| Feature              | Status            |
|----------------------|-------------------|
| Static routes        | DONE              |
| Route parameters     | DONE (TASK-090.8) |
| Route constraints    | DONE (TASK-090.9) |
| Middleware per route | DONE (TASK-090.6) |
| Centralized errors   | DONE              |

---

## 5. ERROR HANDLING POLICY

All errors result in structured JSON.

No HTML error pages.
No PHP fatal leakage.

---

## 6. TESTING STATUS

Validated via:
- curl
- PHP CLI
- Browser

Endpoints validated:
- /
- /health
- /users/{id}
- invalid routes

---

## 7. OPEN ITEMS

None blocking core routing.
Next tasks may include:

- Controller grouping
- Request validation layer
- Response transformers

---

END OF DOCUMENTATION v1.2