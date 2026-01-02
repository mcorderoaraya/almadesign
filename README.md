# Corporate Website Platform
## Governed Modular Web System – Root README

[ES] Este archivo es la referencia técnica y de gobierno completa del proyecto.
[ES] No existe documentación fuera de este README que sea necesaria para entender el sistema.
[ES] Todo lo aquí descrito está aprobado y congelado.

================================================================================
1. PROJECT OVERVIEW
================================================================================

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

================================================================================
2. TECHNOLOGY STACK
================================================================================

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

================================================================================
3. ARCHITECTURAL PRINCIPLES
================================================================================

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

================================================================================
4. HIGH-LEVEL ARCHITECTURE
================================================================================

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

================================================================================
5. COMPLETE PROJECT STRUCTURE
================================================================================

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

================================================================================
6. PLUGIN ARCHITECTURE
================================================================================

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

================================================================================
7. SECURITY MODEL
================================================================================

Security is enforced at multiple levels:

- Authentication and session management
- Role-based authorization
- CSRF protection
- XSS mitigation via output escaping
- Rate limiting (anti-scraping baseline)
- Centralized logging

[ES] La seguridad es transversal, no opcional.

================================================================================
8. FRONTEND ARCHITECTURE
================================================================================

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

================================================================================
9. GOVERNANCE AND WORKFLOW
================================================================================

The project follows a strict task-driven workflow.

Rules:
- Every action maps to a TASK-ID
- No task proceeds without QA validation
- Documentation snapshots freeze approved states
- Changes require new snapshots

[ES] Si una acción no está documentada, no existe.

================================================================================
10. DOCUMENTATION AND SNAPSHOTS
================================================================================

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

================================================================================
11. QA AND PROJECT STATUS
================================================================================

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

================================================================================
12. FINAL STATEMENT
================================================================================

This system was designed to be:

- Predictable
- Secure
- Governed
- Maintainable
- Auditable

[ES] Este proyecto no depende de personas, depende de reglas.
[ES] Por eso es escalable, defendible y profesional.

================================================================================
GOVERNANCE MATRIX
================================================================================

[ES] Esta matriz define explícitamente quién tiene autoridad sobre cada dimensión
[ES] del sistema. No es orientativa. Es ejecutiva.

--------------------------------------------------------------------------------
| Domain / Área              | Backend | Frontend | QA | Project Manager |
--------------------------------------------------------------------------------
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
--------------------------------------------------------------------------------

[ES] Reglas de interpretación:
- YES = autoridad exclusiva
- NO = sin autoridad
- No existen autoridades compartidas