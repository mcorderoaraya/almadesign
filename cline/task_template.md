# TASK-XXX – <Short descriptive title>

[ES] Esta plantilla es obligatoria para la creación y ejecución de cualquier TASK.
[ES] Una TASK que no siga esta estructura es inválida y debe ser rechazada.

================================================================================
1. TASK IDENTIFICATION
================================================================================

TASK ID:
- TASK-XXX

Task Title:
- <Clear and unambiguous title>

Task Type:
- ☐ Implementation
- ☐ Validation (QA)
- ☐ Documentation
- ☐ Governance
- ☐ Approval

[ES] El tipo define quién tiene autoridad primaria sobre la TASK.

================================================================================
2. ROLE AND AUTHORITY
================================================================================

Executing Role:
- Backend
- Frontend
- QA
- Project Manager

Approving Role:
- QA
- Project Manager

Authority Scope:
- Describe explicitly what this TASK is allowed to touch.

[ES] Si no se define el alcance, la TASK no puede ejecutarse.

================================================================================
3. DOCUMENTATION REFERENCE (MANDATORY)
================================================================================

Active Documentation Snapshot:
- docs-v1.2.md

Additional Referenced Documents:
- <List any additional .md files, or state NONE>

Snapshot Compliance Rule:
- If this TASK conflicts with docs-v1.2.md, it MUST be rejected.

[ES] Esta sección es bloqueante. Sin snapshot, no hay TASK.

================================================================================
4. OBJECTIVE
================================================================================

Objective:
- Describe in one paragraph what this TASK aims to achieve.

Non-Objectives:
- Explicitly list what this TASK will NOT do.

[ES] Esto evita creep de alcance y “ya que estamos”.

================================================================================
5. SCOPE AND BOUNDARIES
================================================================================

In Scope:
- <Explicit list>

Out of Scope:
- <Explicit list>

Governance Boundaries Affected:
- Backend Governance
- Frontend Governance
- Governance Boundary
- None

[ES] Si cruza frontera, debe declararse aquí.

================================================================================
6. EXECUTION RULES
================================================================================

Execution Constraints:
- Do NOT modify undocumented behavior.
- Do NOT bypass QA.
- Do NOT introduce new scope.
- Follow governance rules strictly.

Allowed Actions:
- <Explicit list>

Forbidden Actions:
- <Explicit list>

[ES] Aquí se define qué está permitido y qué no, sin interpretación.

================================================================================
7. DELIVERABLES
================================================================================

Expected Deliverables:
- <Code files>
- <Documentation files>
- <Reports>

File Locations:
- <Exact paths>

[ES] Si no se puede verificar un entregable, no cuenta.

================================================================================
8. QA VALIDATION REQUIREMENTS
================================================================================

QA Validation Type:
- ☐ Functional
- ☐ Security
- ☐ Documentation
- ☐ Governance
- ☐ Regression

Validation Criteria:
- List explicit pass/fail criteria.

Blocking Conditions:
- List conditions that automatically reject the TASK.

[ES] QA valida contra criterios, no contra intención.

================================================================================
9. SNAPSHOT IMPACT
================================================================================

Does this TASK require a new documentation snapshot?
- ☐ YES
- ☐ NO

If YES:
- New snapshot version: docs-vX.X.md
- GOVERNANCE_CHANGELOG.md entry required: YES

[ES] Cambios sin snapshot son inválidos.

================================================================================
10. APPROVAL AND STATUS
================================================================================

TASK Status:
- ☐ Draft
- ☐ In Progress
- ☐ Blocked
- ☐ Rejected
- ☐ Approved

QA Decision:
- ☐ APPROVED
- ☐ REJECTED

Project Manager Decision (if applicable):
- ☐ APPROVED
- ☐ REJECTED

Final Notes:
- <Only factual notes, no opinions>

================================================================================
11. NON-NEGOTIABLE RULE
================================================================================

If any section of this template is incomplete or ambiguous:

The TASK is invalid and must not be executed.

[ES] Esta regla protege al sistema de improvisación.
