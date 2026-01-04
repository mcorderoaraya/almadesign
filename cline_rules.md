# cline_rules.md

# Cline Rules — AlmaDesign Corporate Site
[ES] Este documento define reglas operativas obligatorias para ejecutar el proyecto con Cline (y también para humanos).
[ES] Si una regla se viola, el cambio se considera inválido y debe revertirse o rehacerse.

---

## 0. Project Context
- Stack: PHP 8.x + Apache 2.x + MySQL 8.x
- Frontend build: TailwindCSS + PostCSS + Autoprefixer
- Structure: `/public` is the web root; `/app` contains backend code; `/views` contains templates.
[ES] Este contexto no es decorativo: cualquier cambio debe respetar esta frontera.

---

## 1. GOLDEN RULE (Non-Negotiable)
### 1.1 Documentation language rule
- Every Markdown file MUST be written in English.
- Every Markdown file MUST include Spanish annotations inline using the prefix `[ES]`.
[ES] Esto evita documentación “a medias” y mantiene consistencia: inglés para estándar, español para ejecución.

### 1.2 Change completeness rule (NEW — STRICT)
**Every change MUST include ALL files involved. No exceptions.**
That means: whenever you implement, modify, or fix something, you MUST update and provide:
1) The primary code file(s) changed  
2) All dependent/related code file(s) impacted  
3) Any configuration file(s) impacted  
4) Any documentation file(s) impacted  
5) Any tests/checklists impacted (if present)  
6) Any scaffolding or templates impacted (if the change alters workflow expectations)

[ES] En palabras simples: “cambio” no significa editar un archivo. Significa entregar el sistema coherente.
[ES] Si cambias Router, también cambias Request/Response si el contrato cambió.
[ES] Si cambias rutas, también actualizas docs y pruebas.
[ES] Si cambias estructura, también actualizas README y docs-vX.X.

### 1.3 Output rule (deliverables)
- When asked to “create” or “write” a file, you MUST output the full file content.
- Partial snippets are forbidden unless explicitly requested.
[ES] Nada de fragmentos: el usuario está construyendo un repositorio real, no una conversación.

---

## 2. Roles and Authority
### 2.1 Project Manager (JP) is the gatekeeper
- JP approves requirements, architecture, task sequencing, and documentation snapshots.
- No task proceeds without JP approval.
[ES] Si no hay aprobación, no hay avance.

### 2.2 QA is the blocking validator
- QA validates each task output against acceptance criteria.
- On failure, iterate up to 3 times; then produce a report for JP.
[ES] QA corta el flujo si falla. No hay “más o menos”.

---

## 3. Governance of Boundaries
- `/public` contains only entry points and static assets.
- `/app` contains business logic, routing, middleware, services, repositories, entities.
- `/views` contains templates; it does not implement backend logic.
[ES] Si ves lógica de negocio en `/views`, es una violación.

---

## 4. Task Execution Protocol
### 4.1 Every TASK MUST include
- A unique ID: `TASK-XXX`
- Objective
- Scope (what is in / out)
- Files to create/update (explicit list with paths)
- Implementation steps
- Acceptance criteria
- Manual verification commands (curl/php/Apache checks)
- Rollback plan
[ES] Esto evita cambios incompletos y “parches” sin trazabilidad.

### 4.2 Commit rule
- After QA approval, commit with message: `TASK-XXX: <short description>`
- The commit MUST include all involved files (see Golden Rule 1.2).
[ES] No existe “hice commit solo del archivo X”. Si el cambio afectaba 4, van los 4.

---

## 5. Versioned Documentation Snapshots
- Maintain `docs-vX.X.md` snapshots reflecting the current frozen state.
- Each snapshot must list:
  - Architecture
  - Tree structure (high-level)
  - Completed tasks
  - Pending tasks
  - Governance updates
[ES] Si el sistema cambió, el snapshot cambia. Si no, estás mintiendo en el repositorio.

---

## 6. Quality Gates (Mandatory)
### 6.1 Backend boot gate
- `GET /` returns 200 JSON
- `GET /health` returns 200 JSON
- Unknown routes return 404 JSON
[ES] Si esto falla, no se continúa.

### 6.2 Middleware gate
- RateLimit blocks abusive patterns (429)
- Auth blocks missing/invalid auth (401) where applicable
- CSRF blocks missing token on mutable methods (403)
[ES] No se “simula” seguridad: se implementa y se prueba.

---

## 7. Required Conventions
### 7.1 Namespaces and Autoload
- Namespaces must match Composer autoload mapping.
- No duplicated class names in different files.
- After namespace changes: run `composer dump-autoload -o`.
[ES] Si el autoload no resuelve clases, el sistema se rompe. Punto.

### 7.2 Error handling
- All unhandled exceptions must map to a controlled JSON response (500) via ErrorController.
[ES] Nada de pantallazos PHP en producción.

---

## 8. Deliverable Format for Cline Outputs
When producing files in chat:
- Provide each file in full.
- Precede each file with its exact target path.
- Include Spanish annotations inside the file using `[ES]`.
[ES] Esto es para copy/paste directo al repo sin adivinar nada.

---

## 9. Violation Protocol
If any rule is violated:
1) Stop the task
2) Produce a violation report (what rule, where, impact)
3) Propose a corrective patch including ALL involved files
[ES] Esto es gobernanza real, no “buenas intenciones”.

---
End of rules.