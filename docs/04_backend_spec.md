# 04 – Backend Specification
## Corporate Website Platform

[ES] Este documento define en detalle el comportamiento del backend del sistema.
[ES] Todo desarrollo PHP debe alinearse estrictamente con esta especificación.

---

## 1. Backend Objectives

The backend is responsible for:

- Handling all business logic
- Enforcing security controls
- Managing data persistence through ORM
- Serving content to the frontend
- Supporting modular plugins

[ES] El backend es la única fuente de verdad del sistema.

---

## 2. Backend Architecture Overview

The backend follows the architecture defined in `/docs/01_architecture.md`.

Key characteristics:
- PHP 8.x
- ORM-based data access
- Layered separation (Controller, Service, Repository)
- Plugin-oriented extensibility

[ES] No se permite lógica directa en vistas ni acceso SQL fuera del ORM.

---

## 3. Request Lifecycle

1. HTTP request received
2. Middleware execution
   - Authentication
   - Authorization
   - CSRF validation
3. Controller handling
4. Service layer execution
5. ORM interaction
6. Response returned to frontend

[ES] Todo request sigue este ciclo sin excepciones.

---

## 4. Authentication and Authorization

The backend must implement:

- Secure login mechanism
- Session-based authentication
- Role-based authorization
- Session expiration and regeneration

[ES] Autenticación y autorización son obligatorias incluso para el admin interno.

---

## 5. Security Controls

Mandatory security measures:

- Input validation (server-side)
- Output escaping
- SQL Injection protection via ORM
- CSRF tokens on all forms
- Basic rate limiting
- Anti-scraping measures

[ES] La seguridad no se negocia ni se “agrega después”.

---

## 6. Logging System

The backend must include a centralized logging system that records:

- Authentication attempts
- Errors and exceptions
- Administrative actions
- Plugin execution events

[ES] Todo evento crítico debe quedar registrado.

---

## 7. Plugin System

The backend must support the following plugins:

### 7.1 Page Builder Plugin
- Page creation and management
- Block ordering
- Media associations

### 7.2 Visit Tracking Plugin
- Visit recording per page
- Date-based filtering
- Asynchronous dashboard support

### 7.3 Heatmap Plugin
- Mouse interaction tracking
- Coordinate storage
- Page-based visualization

### 7.4 Backup Plugin
- Manual backups
- Scheduled automatic backups

### 7.5 Inbox Plugin
- Message reception
- Automatic replies
- Manual response editor

[ES] Cada plugin es modular y no rompe el núcleo del sistema.

---

## 8. Content Delivery to Frontend

The backend must provide structured data for:

- Text content
- Images
- Audio files
- Video files

[ES] El frontend solo renderiza lo que el backend entrega.

---

## 9. Email Service

The backend must implement an email service with:

Mandatory fields:
- Sender email
- Subject
- Rich text body

Optional fields:
- Image attachment (≤ 5 MB, webp/png)
- External URLs

[ES] El envío de correo siempre se valida server-side.

---

## 10. Error Handling

- Controlled error responses
- No sensitive data exposure
- Error logging mandatory

[ES] Los errores se gestionan, no se silencian.

---

## 11. Backend Constraints

- No direct SQL queries outside ORM
- No business logic in controllers
- No undocumented endpoints
- No unapproved plugins

[ES] Las violaciones a estas reglas son bloqueantes.

---

## Document Status

- Version: 1.0
- Status: Approved Backend Specification
- File: /docs/04_backend_spec.md

[ES] Este documento habilita el inicio del desarrollo backend.
