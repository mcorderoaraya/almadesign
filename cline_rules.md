# Cline Rules
## Mandatory Workflow Rules

[ES] Este archivo define las reglas de comportamiento del sistema y de los roles cuando se utiliza Cline.  
[ES] Estas reglas son obligatorias y no negociables.

---

## Rule 1 – Role Authority

Each role operates strictly within its defined responsibilities.

- Project Manager: governance and approval
- PHP Developer: backend logic and plugins
- SQL Developer: database design and integrity
- UX/UI Developer: frontend implementation
- Testing QA: validation and blocking authority

[ES] Ningún rol puede invadir responsabilidades de otro.

---

## Rule 2 – Approval Gates

No task may:
- Start
- Continue
- Be integrated

without explicit approval from the Project Manager.

[ES] El JP actúa como gatekeeper absoluto.

---

## Rule 3 – QA Validation

- Every task must be validated by Testing QA.
- QA may reject tasks with documented evidence.
- Maximum of 3 correction iterations per task.
- Persistent failure escalates to the Project Manager.

[ES] QA no negocia, valida o rechaza.

---

## Rule 4 – Documentation First

- Every task must produce or update documentation.
- Documentation must be written in English.
- Spanish annotations are mandatory.

[ES] Código sin documentación se considera incompleto.

---

## Rule 5 – Version Control Discipline

- A Git commit is allowed only after QA approval.
- Each commit must reference the approved task.
- No “work in progress” commits are allowed.

[ES] Cada commit representa un estado válido del sistema.

---

## Rule 6 – Security as Baseline

Security is not optional and must be applied by default:

- SQL Injection protection
- XSS protection
- Authentication and authorization controls
- Session security
- Basic anti-scraping measures

[ES] Seguridad mínima obligatoria, no “nice to have”.

---

## Rule 7 – SEO Orientation

All frontend and backend decisions must consider SEO impact:

- URL structure
- Performance
- Metadata availability
- Content accessibility

[ES] SEO no es una fase, es un criterio constante.

---

## Rule 8 – No Silent Changes

Any change in:
- Scope
- Architecture
- Data model
- Workflow

must be documented and approved.

[ES] Cambios silenciosos están prohibidos.

---

## Rule 9 – Single Source of Truth

- This repository is the only valid source of truth.
- External decisions are invalid unless documented here.

[ES] Lo que no está en el repo, no existe.

---

## Rule 10 – Final Approval

The project is considered complete only when:

- QA validates the system at 100%
- Project Manager issues final written approval

[ES] Sin doble aprobación, no hay cierre de proyecto.

---

## Documentation Snapshot Enforcement

The active and authoritative documentation snapshot for this project is:

- docs-v1.2.md

Rules:
- All tasks MUST comply with docs-v1.2.md.
- Any task that conflicts with docs-v1.2.md must be rejected.
- No task may modify system behavior without updating documentation and issuing a new snapshot.
- QA must validate tasks against docs-v1.2.md explicitly.

This rule is non-negotiable and applies to all roles.

[ES] Con esto, Cline no puede “olvidarse” del snapshot.