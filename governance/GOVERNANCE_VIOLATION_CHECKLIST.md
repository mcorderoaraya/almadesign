# Governance Violation Checklist

[ES] Este checklist permite detectar violaciones de gobernanza antes de que ocurran.
[ES] Debe usarse antes de aprobar tareas o cambios relevantes.

================================================================================
1. PURPOSE
================================================================================

The purpose of this checklist is to provide a fast, repeatable way to detect
common governance violations.

[ES] Es una lista de “no hagas esto”.

================================================================================
2. COMMON VIOLATIONS – BACKEND
================================================================================

- Business logic implemented in controllers
- SQL queries outside ORM
- Undocumented API or DTO changes
- Security logic duplicated or bypassed

[ES] Si ves alguno de estos puntos, detente.

================================================================================
3. COMMON VIOLATIONS – FRONTEND
================================================================================

- Frontend data validation altering backend rules
- Hardcoded content replacing backend data
- Reordering backend-defined content
- Inferring missing data

[ES] El frontend no “completa” el sistema.

================================================================================
4. COMMON VIOLATIONS – QA
================================================================================

- Approving tasks without full validation
- Ignoring undocumented behavior
- Allowing “temporary” exceptions

[ES] Las excepciones crean precedentes. Malos.

================================================================================
5. COMMON VIOLATIONS – MANAGEMENT
================================================================================

- Scope changes without documentation
- Forcing deadlines over QA
- Accepting undocumented risk

[ES] El Project Manager asume riesgos, no los oculta.

================================================================================
6. PRE-APPROVAL CHECK
================================================================================

Before approving any task:

- Is authority respected?
- Is documentation updated?
- Has QA validated?
- Does this cross a boundary?

[ES] Si alguna respuesta es “no”, no se aprueba.

================================================================================
7. NON-NEGOTIABLE RULE
================================================================================

If a checklist item is triggered:

Approval must be stopped.

[ES] No se “discute”, se corrige.