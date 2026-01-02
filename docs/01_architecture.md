# 01 – System Architecture
## Corporate Website Platform

[ES] Este documento define la arquitectura técnica del sistema.  
[ES] Todas las decisiones de diseño, desarrollo y despliegue deben alinearse con esta arquitectura.

---

## 1. Architectural Goals

The architecture of this system is designed to achieve the following goals:

- High performance
- Clear separation of concerns
- Security by default
- Maintainability
- Scalability within reasonable limits

[ES] La arquitectura prioriza control y claridad por sobre complejidad innecesaria.

---

## 2. Architectural Style

The system follows a layered architecture inspired by the MVC pattern.

Main layers:
- Presentation Layer
- Application Layer
- Domain Layer
- Infrastructure Layer

[ES] No se utiliza un framework monolítico pesado.  
[ES] La arquitectura debe ser explícita y comprensible.

---

## 3. Technology Stack

- Backend Language: PHP 8.x
- Database: MySQL 8.x
- Frontend: HTML5, Tailwind CSS, JavaScript
- ORM: To be selected and approved by the Project Manager
- Version Control: Git + GitHub

[ES] Ningún componente del stack puede ser cambiado sin aprobación del Jefe de Proyecto.

---

## 4. System Layers

### 4.1 Presentation Layer

Responsibilities:
- Render HTML views
- Consume data provided by the backend
- No business logic

Components:
- Public website views
- Admin panel views

[ES] Esta capa nunca accede directamente a la base de datos.

---

### 4.2 Application Layer

Responsibilities:
- Handle user requests
- Coordinate application workflows
- Call domain services

Components:
- Controllers
- Request validators
- Middleware (authentication, authorization, CSRF)

[ES] Aquí se orquesta el flujo, no se define la lógica del negocio.

---

### 4.3 Domain Layer

Responsibilities:
- Business rules
- Core logic
- Domain services

Components:
- Entities
- Services
- Plugin logic

[ES] Esta capa es independiente de la base de datos.

---

### 4.4 Infrastructure Layer

Responsibilities:
- Database access
- ORM integration
- External services (email, storage, logging)

Components:
- ORM repositories
- Database migrations
- Mail service
- Logging system

[ES] Cambios en infraestructura no deben romper capas superiores.

---

## 5. Plugin Architecture

The system supports a modular plugin architecture.

Each plugin:
- Is isolated from others
- Has its own database schema (when required)
- Exposes services to the application layer
- Does not bypass security controls

Defined plugins:
- Page Builder
- Visit Tracker
- Heatmap
- Backup Manager
- Inbox

[ES] Los plugins no acceden directamente a la presentación.

---

## 6. Database Architecture

- Central MySQL 8.x database
- Strict use of foreign keys and constraints
- Indexes for performance-critical queries
- No direct SQL queries in the presentation layer

[ES] Toda interacción con la base de datos pasa por el ORM.

---

## 7. Security Architecture

Security is enforced at multiple levels:

- Authentication and authorization middleware
- Role-based access control
- CSRF protection
- Input validation and output escaping
- Prepared statements via ORM
- Basic anti-scraping mechanisms

[ES] La seguridad es transversal, no una capa aislada.

---

## 8. Performance Considerations

- Efficient database queries
- Lazy loading where appropriate
- Asynchronous dashboards for analytics
- Optimized asset delivery

[ES] El rendimiento se evalúa desde arquitectura, no al final.

---

## 9. SEO Considerations

- Clean URL routing
- Server-side rendering
- Metadata support at backend level
- Semantic HTML output

[ES] SEO es una responsabilidad compartida entre backend y frontend.

---

## 10. Error Handling and Logging

- Centralized logging system
- Error levels classification
- No sensitive information exposed to users

[ES] Los errores se registran, no se ocultan.

---

## 11. Deployment Assumptions

- Standard LAMP-compatible environment
- PHP 8.x enabled
- MySQL 8.x available
- Environment variables for sensitive configuration

[ES] El despliegue debe ser reproducible.

---

## 12. Architectural Constraints

- No direct database access from views
- No business logic in controllers
- No undocumented architectural changes
- All changes must be approved and documented

[ES] Las violaciones arquitectónicas son errores críticos.

---

## Document Status

- Version: 1.0
- Status: Approved Architecture Baseline
- File: /docs/01_architecture.md

[ES] Este documento habilita el inicio del desarrollo técnico.
