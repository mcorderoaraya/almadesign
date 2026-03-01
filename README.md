# Corporate Website Platform
## Governed Modular Web System – Root README

[ES] Este archivo es la referencia técnica y de gobierno completa del proyecto.
[ES] No existe documentación fuera de este README que sea necesaria para entender el sistema.
[ES] Todo lo aquí descrito está aprobado y congelado.

---
### **1. PROJECT OVERVIEW**
---

This project is a corporate website platform designed and built under a strict
governance model. It prioritizes:

- Architectural clarity
- Security by default
- Modular extensibility
- Strict QA control
- Separation of concerns
- Predictable evolution

[ES] El proyecto evita deliberadamente la improvisación y la deuda técnica.
[ES] Cada decisión técnica está documentada, validada y aprobada.

---
### **2. TECHNOLOGY STACK**
---

Backend:
- PHP 8.x
- Custom lightweight architecture (no full-stack framework)
- ORM-based persistence layer
- Modular plugin system

Database:
- MySQL 8.x
- Enforced constraints and referential integrity

Frontend:
- HTML5
- Tailwind CSS
- Custom corporate identity layer (almadesign.css)
- No frontend frameworks

Tooling:
- Git + GitHub
- VS Code
- Cline workflow for governed execution

[ES] Ninguna tecnología puede ser cambiada sin aprobación formal del Jefe de Proyecto.

---
### **3. ARCHITECTURAL PRINCIPLES**
---

The system follows a strict layered architecture inspired by MVC.

Principles:
- Controllers never contain business logic
- Services coordinate behavior
- Repositories abstract persistence
- Entities are pure data objects
- Plugins are isolated and self-contained
- Frontend renders, backend decides

[ES] Las capas no se cruzan.
[ES] Las violaciones arquitectónicas son errores bloqueantes.

---
### **4. HIGH-LEVEL ARCHITECTURE**
---

Layers:

1) Presentation Layer
   - Public frontend views
   - Admin panel views
   - No database access

2) Application Layer
   - Controllers
   - Middleware
   - Request orchestration

3) Domain Layer
   - Services
   - Plugin logic
   - Business rules

4) Infrastructure Layer
   - ORM
   - Database configuration
   - Logging
   - Email abstraction

[ES] La arquitectura prioriza control sobre velocidad.

---
### **5. COMPLETE PROJECT STRUCTURE**
---

ROOT
│
├── .env
├── CLIENT_REQUIREMENTS_BRIEF.md
├── cline_rules.md
├── docs-v1.0.md
├── docs-v1.1.md
├── docs-v1.2.md
├── gobernanza.md
├── package-lock.json
├── package.json
├── postcss.config.js
├── README.md
├── tailwind.config.js
├── app
│   ├── Config
│   │   ├── app.php
│   │   ├── database.php
│   │   ├── logging.php
│   │   ├── orm.php
│   │   └── security.php
│   ├── Controllers
│   │   ├── AuthController.php
│   │   └── ContentController.php
│   ├── DTOs
│   │   ├── BlockDTO.php
│   │   └── PageDTO.php
│   ├── Entities
│   │   └── BaseEntity.php
│   ├── Logging
│   │   ├── Logger.php
│   │   └── LogLevel.php
│   ├── Middleware
│   │   ├── AuthMiddleware.php
│   │   ├── CsrfMiddleware.php
│   │   ├── RateLimitMiddleware.php
│   │   └── RoleMiddleware.php
│   ├── Plugins
│   │   ├── Backup
│   │   │   ├── BackupEntity.php
│   │   │   ├── BackupPluginService.php
│   │   │   ├── BackupRepository.php
│   │   │   ├── BackupSchedulerService.php
│   │   │   └── BackupService.php
│   │   ├── Heatmap
│   │   │   ├── HeatmapEventEntity.php
│   │   │   ├── HeatmapPluginService.php
│   │   │   ├── HeatmapRepository.php
│   │   │   └── HeatmapService.php
│   │   ├── Inbox
│   │   │   ├── InboxMessageEntity.php
│   │   │   ├── InboxPluginService.php
│   │   │   ├── InboxRepository.php
│   │   │   └── InboxService.php
│   │   ├── PageBuilder
│   │   │   ├── BlockEntity.php
│   │   │   ├── BlockRepository.php
│   │   │   ├── BlockService.php
│   │   │   ├── PageBuilderService.php
│   │   │   ├── PageEntity.php
│   │   │   ├── PageRepository.php
│   │   │   └── PageService.php
│   │   └── VisitTracking
│   │       ├── VisitEntity.php
│   │       ├── VisitRepository.php
│   │       ├── VisitService.php
│   │       └── VisitTrackingService.php
│   ├── Repositories
│   │   └── BaseRepository.php
│   └── Services
│       ├── AuthService.php
│       ├── ContentService.php
│       ├── CsrfService.php
│       ├── EmailService.php
│       └── SecurityService.php
├── cline
│   └── task_template.md
├── database
│   ├── migrations
│   └── seeds
├── docs
│   ├── 00_requirements.md
│   ├── 01_architecture.md
│   ├── 02_data_model.md
│   ├── 03_ux_ui.md
│   ├── 04_backend_spec.md
│   ├── 04_frontend_layout.md
│   ├── 05_validation.md
│   ├── 06_db_integrity_test.md
│   ├── 07_backend_security_logic_test.md
│   ├── 08_plugins_test.md
│   ├── 09_frontend_test.md
│   ├── 10_regression_test.md
│   ├── 11_final_qa_validation.md
│   ├── 12_final_pm_approval.md
│   ├── 13_post_delivery_maintenance_plan.md
│   ├── 14_client_handover_plan.md
│   ├── 15_support_sla.md
│   ├── 16_maintenance_contract.md
│   ├── 17_penalties_model.md
│   ├── 18_pricing_annex.md
│   ├── 19_prompt_execution_plan.md
│   ├── Diagrama-Flujo-Gobernanza-de-prompts.md
│   └── workflow-flowchart.md
├── governance
│   ├── GOVERNANCE_AUDIT_SIMULATION.md
│   ├── GOVERNANCE_CHANGELOG.md
│   ├── GOVERNANCE_ONBOARDING.md
│   ├── GOVERNANCE_VIOLATION_CHECKLIST.md
│   ├── GOVERNANCE_VIOLATION_PROTOCOL.md
│   ├── INCIDENT_TEMPLATE.md
│   ├── backend_governance.md
│   ├── frontend_governance.md
│   └── governance_boundary.md
├── public
│   ├── index.php
│   ├── assets
│   │   ├── css
│   │   │   ├── almadesign.css
│   │   │   ├── app.css
│   │   │   └── base.css
│   │   ├── fonts
│   │   │   ├── Constantia-Bold-Italic.woff2
│   │   │   ├── Inter-Bold.woff2
│   │   │   ├── Inter-Medium.woff2
│   │   │   ├── Inter_SemiBold.woff2
│   │   │   ├── Playfair-Display-Italic.woff2
│   │   │   └── SourceSans-Regular.woff2
│   │   ├── icons
│   │   │   ├── apple-touch-icon.png
│   │   │   ├── favicon-96x96.png
│   │   │   ├── favicon.ico
│   │   │   ├── favicon.svg
│   │   │   ├── web-app-manifest-192x192.png
│   │   │   └── web-app-manifest-512x512.png
│   │   ├── images
│   │   ├── js
│   │   │   └── app.js
│   │   └── videos
├── src
│   └── css
│       └── tailwind.css
├── storage
│   └── logs
├── translation
│   └── JP_TO_UXUI_TRANSLATION.md
├── views
│   ├── admin
│   │   ├── blocks.php
│   │   ├── dashboard.php
│   │   ├── media.php
│   │   ├── pages.php
│   │   └── settings.php
│   ├── blocks
│   │   ├── form.block.php
│   │   ├── image.block.php
│   │   ├── mixed.block.php
│   │   └── text.block.php
│   ├── components
│   │   └── block-renderer.php
│   ├── errors
│   │   ├── 404.php
│   │   └── 500.php
│   ├── layouts
│   │   ├── admin.layout.php
│   │   ├── base.layout.php
│   ├── pages
│   │   ├── about.php
│   │   ├── cases.php
│   │   ├── contact.php
│   │   ├── home.php
│   │   └── services.php
│   ├── partials
│   │   ├── admin-footer.php
│   │   ├── admin-head.php
│   │   ├── admin-header.php
│   │   ├── admin-sidebar.php
│   │   ├── alerts.php
│   │   ├── cta-primary.php
│   │   ├── footer.php
│   │   ├── head.php
│   │   ├── header.php
│   │   └── navigation.php

---
### **6. PLUGIN ARCHITECTURE**
---

Implemented backend plugins:

- Page Builder
- Visit Tracking
- Heatmap
- Backup
- Inbox

Rules:
- Plugins are isolated
- Plugins do not access each other
- Plugins do not bypass security
- Plugins expose functionality only via services

[ES] Los plugins amplían el sistema sin romper el núcleo.

---
### **7. SECURITY MODEL**
---

Security is enforced at multiple levels:

- Authentication and session management
- Role-based authorization
- CSRF protection
- XSS mitigation via output escaping
- Rate limiting (anti-scraping baseline)
- Centralized logging

[ES] La seguridad es transversal, no opcional.

---
### **8. FRONTEND ARCHITECTURE**
---

Public Frontend:
- Semantic HTML5
- SEO-ready structure
- Backend-driven content via DTOs
- No business logic

Admin UI:
- Functional layout
- Clear separation from public frontend
- No decorative logic

[ES] El frontend renderiza, el backend decide.

---
### **9. GOVERNANCE AND WORKFLOW**
---

The project follows a strict task-driven workflow.

Rules:
- Every action maps to a TASK-ID
- No task proceeds without QA validation
- Documentation snapshots freeze approved states
- Changes require new snapshots

[ES] Si una acción no está documentada, no existe.

---
### **10. DOCUMENTATION AND SNAPSHOTS**
---

Documentation:
- /docs/00_requirements.md
- /docs/01_architecture.md
- /docs/02_data_model.md
- /docs/03_ux_ui.md
- /docs/04_backend_spec.md

Snapshots:
- docs-v1.0.md
- docs-v1.1.md

[ES] Los snapshots son estados certificados, no borradores.

---
### **11. QA AND PROJECT STATUS**
---

QA Tasks:
- TASK-050: Documentation consistency
- TASK-051: Database integrity
- TASK-052: Backend security and logic
- TASK-053: Plugin functionality
- TASK-054: Frontend integration
- TASK-055: Full regression
- TASK-060: Final QA validation

Project Manager:
- TASK-061: Final approval

Final Status:
- Architecture: APPROVED
- Backend: APPROVED
- Frontend: APPROVED
- Plugins: APPROVED
- QA: APPROVED
- Project: CLOSED

---
### **12. FINAL STATEMENT**
---

This system was designed to be:

- Predictable
- Secure
- Governed
- Maintainable
- Auditable

[ES] Este proyecto no depende de personas, depende de reglas.
[ES] Por eso es escalable, defendible y profesional.

---
### **GOVERNANCE MATRIX**
---

[ES] Esta matriz define explícitamente quién tiene autoridad sobre cada dimensión
[ES] del sistema. No es orientativa. Es ejecutiva.

| Domain / Área              | Backend | Frontend | QA | Project Manager |
| Business Logic             |   YES   |    NO    | NO |       NO        |
| Data Model & Integrity     |   YES   |    NO    | NO |       NO        |
| Security Rules             |   YES   |    NO    | NO |       NO        |
| Data Exposure (DTOs)       |   YES   |    NO    | NO |       NO        |
| Rendering & Presentation   |   NO    |   YES    | NO |       NO        |
| Styling & Branding         |   NO    |   YES    | NO |       NO        |
| UX/UI Decisions            |   NO    |   YES    | NO |       NO        |
| Validation & Testing       |   NO    |    NO    | YES|       NO        |
| Task Approval              |   NO    |    NO    | YES|       NO        |
| Scope Definition           |   NO    |    NO    | NO |       YES       |
| Priority & Planning        |   NO    |    NO    | NO |       YES       |
| Final Acceptance           |   NO    |    NO    | NO |       YES       |


[ES] Reglas de interpretación:
- YES = autoridad exclusiva
- NO = sin autoridad
- No existen autoridades compartidas

---
### **REGLA DE ORO PARA ChatGPT v5.2 Cómo ayudante técnico**
---

#### **OBJETIVO**

Tener un asistente técnico válido y respaldado por la técnología de ChatGPT v.5.2 hasta la fecha 04/01/2026. Esto asegura validación conceptual, técnica y documental al desarrollo de cualquier sistema. Se usa ChatGPT v.5.2 en el sitio web de https://chatgpt.com/ con lo cual redunda en un ahorro de tokens y costo del proyecto.

#### **NOTA DE USO:**

Se mantiene una documentación completa del contexto interactuado con el asistente con el subojetivo de desarrollo y aprendisaje paso a paso, sin exepción. Se recomienda usar Google Drive.

#### **GOLDEN RULE — ALMADESIGN SYSTEM**
[ES] Regla operativa suprema del proyecto.
[ES] Cualquier acción que viole esta regla invalida el cambio completo.

---
#### **0. PRINCIPIO FUNDAMENTAL**
---

Before acting, ALWAYS understand the full context.
No execution without context analysis.
No exceptions.

[ES] Antes de escribir código, modificar archivos, generar documentación
o proponer una solución, es OBLIGATORIO analizar el contexto completo
del sistema y del estado actual del proyecto.

---
### **1. CONTEXT ANALYSIS RULE (NEW – MANDATORY)**
---

### 1.1 Context comes first
Before any change, the executor MUST explicitly analyze:

- Current project state (architecture, version, snapshot)
- Existing files and their responsibilities
- Previously executed TASKs
- Known issues, constraints, and decisions already taken
- Scope and boundaries of the requested change

[ES] No se permite “empezar a escribir” sin entender:
- qué existe
- qué funciona
- qué ya fue decidido
- qué NO debe tocarse

### 1.2 No assumptions allowed
- Never assume missing files, methods, or structures.
- If something is unclear, it MUST be inspected or confirmed first.

[ES] Asumir es introducir errores estructurales.
[ES] Si algo no está claro, se detiene el proceso.

### 1.3 Context acknowledgement
Every TASK execution implicitly states:
“I understand the current context and constraints of the system.”

[ES] Si el resultado demuestra que el contexto no fue entendido,
la tarea se considera fallida aunque “funcione”.

---
### **2. CHANGE COMPLETENESS RULE (NON-NEGOTIABLE)**
---

### 2.1 Full-impact inclusion
Every change MUST include ALL files involved, without exception:

- Primary files directly modified
- Dependent or consuming files
- Configuration files
- Documentation files
- Workflow or governance files
- Tests or validation artifacts (if applicable)

[ES] Un cambio no es un archivo.
[ES] Un cambio es el sistema coherente después del impacto.

### 2.2 Partial changes are forbidden
- Delivering snippets when a full file is required is forbidden.
- Updating logic without updating documentation is forbidden.
- Changing contracts without updating consumers is forbidden.

[ES] No existe “después lo vemos”.
[ES] Si el cambio toca 5 archivos, se entregan los 5.

---
### **3. LANGUAGE AND DOCUMENTATION RULE**
---

### 3.1 Documentation language
- All Markdown files MUST be written in English.
- All Markdown files MUST include Spanish explanations inline using `[ES]`.

[ES] Inglés = estándar técnico.
[ES] Español = ejecución y control operativo.

### 3.2 Documentation synchronization
If the system changes:
- Relevant docs MUST be updated
- Versioned snapshot (`docs-vX.X.md`) MUST be updated

[ES] Documentación desactualizada es documentación falsa.

---
### **4. FILE DELIVERY RULE**
---

When asked to write or create a file:

- The file MUST be delivered COMPLETE.
- With its correct path.
- Ready for copy/paste into the repository.

[ES] Fragmentos solo se permiten si se solicitan explícitamente.
[ES] El repositorio es real, no teórico.

---
### **5. ARCHITECTURAL BOUNDARIES RULE**
---

- `/public` → entry point and static assets only
- `/app` → backend logic (routing, middleware, services, controllers)
- `/views` → presentation only (no business logic)
- `/docs` → authoritative documentation

[ES] Romper fronteras es una violación de gobernanza.

---
### **6. TASK EXECUTION RULE**
---

Every TASK MUST:

1. Respect previously approved architecture
2. Follow the defined task order
3. Use the official TASK template
4. Pass QA validation
5. Be committed only after QA approval

[ES] Una tarea sin aprobación no existe.
[ES] Una tarea sin QA no se cierra.

---
### **7. ERROR AND GOVERNANCE RULE**
---

- All errors must be handled explicitly.
- No raw PHP errors exposed.
- No silent failures.

Violations trigger:
1. Task stop
2. Violation report
3. Corrective action including ALL impacted files

[ES] Gobernanza no es discurso, es control.

---
### **8. FINAL AUTHORITY**
---

- Project Manager approves progression.
- QA blocks execution on failure.
- Governance rules override speed or convenience.

[ES] Avanzar rápido en la dirección equivocada es retroceder.

---
### **END OF GOLDEN RULE**

---
---
## 📋 QA REPORT & SPRINT HISTORY
### Última actualización: 2026-02-28
---

### SPRINTS COMPLETADOS

| Sprint | Descripción | Commit | Fecha | Estado |
|--------|-------------|--------|-------|--------|
| Bootstrap | Apache VirtualHost, Composer, PSR-4 | `a4b0e2d` | anterior | ✅ |
| Routing base | Method + path + handler + middlewares[] | `ad98851` | anterior | ✅ |
| Middleware | Interfaz y pipeline | `b357760` | anterior | ✅ |
| ValidationMiddleware | Validación como middleware | `707efc2` | anterior | ✅ |
| Tarea 98 | Repository write methods | `869e7e1` | anterior | ✅ |
| TASK-QA-100 | QA Test Plan + Project Report | `1568dc3` | 2026-02-28 | ✅ |
| **DT-01/02/03** | Fix críticos: AuthMiddleware + Router + UserController DI | `936ee5e` | 2026-02-28 | ✅ |
| **Sprint MySQL** | PDOFactory + lazy DI + migrations + interface fix | `62096b4` | 2026-02-28 | ✅ |
| **HTTPS Local** | mkcert + Apache mod_ssl + Virtual Hosts | config local | 2026-02-28 | ✅ |

---

### EJECUCIONES QA — 2026-02-28

#### Sprint DT-01/02/03

| Test | Resultado |
|------|-----------|
| `GET /` → `{"success":true,"data":{"service":"almadesign-backend","status":"running"}}` | ✅ PASS |
| `GET /health` → `{"success":true,"data":{"status":"healthy"}}` | ✅ PASS |
| `GET /notfound` → `{"success":false}` (404) | ✅ PASS |
| `GET /users/5` → respuesta de controller | ✅ PASS |
| `GET /users/abc` → 404 (constraint `\d+`) | ✅ PASS |
| `GET /` con `RateLimitMiddleware` como instancia | ✅ PASS |
| `php -l` en archivos modificados | ✅ SIN ERRORES |
| `composer dump-autoload -o` | ✅ 0 warnings |

#### Sprint MySQL

| Test | Resultado |
|------|-----------|
| `GET /` sin DB → HTTP 200 (PDO lazy, no se ejecuta) | ✅ PASS |
| `GET /health` sin DB → HTTP 200 | ✅ PASS |
| `GET /notfound` → 404 JSON | ✅ PASS |
| `GET /users/abc` → 404 (constraint) | ✅ PASS |
| `php -l PDOFactory.php` | ✅ SIN ERRORES |
| `php -l UserRepositoryInterface.php` | ✅ SIN ERRORES |
| `php -l GetUserUseCase.php` | ✅ SIN ERRORES |
| `php -l SaveUserUseCase.php` | ✅ SIN ERRORES |
| `composer dump-autoload -o` | ✅ 132 clases, 0 warnings PSR-4 |

#### Sprint HTTPS

| Test | Resultado |
|------|-----------|
| Puerto 80 LISTENING | ✅ PASS |
| Puerto 443 LISTENING | ✅ PASS |
| `https://almadesign.local/` en Chrome | ✅ Candado verde |
| `https://almadesign.local/` en Edge | ✅ Candado verde |
| `https://almadesign.local/` en Comet | ✅ Candado verde |
| Certificado SAN: `DNS:almadesign.local` | ✅ PASS |
| CA raíz mkcert en Windows Trust Store | ✅ PASS |

---

### DEUDAS TÉCNICAS — ESTADO ACTUAL

| ID | Descripción | Estado |
|----|-------------|--------|
| DT-01 | AuthMiddleware firma incorrecta | ✅ RESUELTO |
| DT-02 | Router sin RouteCollection | ✅ RESUELTO |
| DT-03 | UserController sin DI | ✅ RESUELTO |
| DT-04 | Repositorios sin DB real | ✅ RESUELTO (PDOFactory) |
| DT-05 | database.php no cargado | ✅ RESUELTO (lazy load) |
| DT-06 | Logging no integrado en Kernel | ⚠️ Pendiente |
| DT-07 | Views sin render centralizado | ⚠️ Pendiente |
| DT-08 | ContentController sin render | ⚠️ Pendiente |
| DT-09 | Sin sistema de sesiones | ⚠️ Pendiente |

---

### ENTORNO LOCAL ACTIVO

```
http://almadesign.local/    → Apache puerto 80
https://almadesign.local/   → Apache puerto 443 (mkcert, válido hasta 2028-05-28)
```

**Para activar MySQL real:**
```bash
cp .env.example .env
# Editar .env con credenciales MySQL

mysql -u root -p almadesign < database/migrations/001_create_users_table.sql
```

---

### PRÓXIMOS SPRINTS

1. **Auth Flow** — login/logout con sesiones PHP
2. **View Renderer** — sistema de render de vistas explícito
3. **Page Builder** — CRUD pages/blocks en admin
4. **PHPUnit** — tests unitarios automatizados

---
#### *QA Engineer: Mauricio Cordero Araya — 2026-02-28*
---