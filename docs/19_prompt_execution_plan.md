Prompt Execution Plan
Operational Prompt Governance Framework

[ES] Este documento define el plan oficial para la ejecución de prompts
[ES] durante la operación del sistema.
[ES] Establece reglas, estructuras y límites claros para el uso de prompts
[ES] como mecanismo de trabajo, control y trazabilidad.
[ES] No define tareas nuevas: define cómo se ejecutan.

================================================================================
1. PURPOSE OF THIS DOCUMENT
================================================================================

This document defines the official framework for executing prompts
within the system after project delivery.

The purpose of this plan is to ensure that:
- Prompts are used as controlled operational tools.
- All actions are traceable, auditable, and role-based.
- Governance, architecture, and documentation are respected at all times.

Prompts are considered execution commands, not creative requests.

[ES] Un prompt no es una conversación.
[ES] Es una orden estructurada dentro de un sistema gobernado.

================================================================================
2. ROLE OF PROMPTS IN THE SYSTEM
================================================================================

Prompts are used to:
- Execute defined tasks
- Trigger validations
- Report incidents
- Request changes
- Operate maintenance workflows

Prompts must NOT be used to:
- Explore ideas
- Bypass roles or approvals
- Introduce undocumented changes
- Expand scope implicitly

[ES] Si el prompt no tiene rol, tarea y objetivo,
[ES] no es válido.

================================================================================
3. PROMPT CATEGORIES
================================================================================

The system defines five official prompt categories:

A. Initialization Prompts
B. Task Execution Prompts
C. Validation (QA) Prompts
D. Incident and Governance Prompts
E. Maintenance and Change Prompts

Each category has a defined purpose and usage boundary.

[ES] Usar el tipo de prompt incorrecto
[ES] es una violación de gobernanza.

================================================================================
4. INITIALIZATION PROMPTS
================================================================================

Initialization prompts are executed only once per operational cycle.

Purpose:
- Lock scope
- Confirm active documentation version
- Activate governance rules

Rules:
- Can only be executed by Project Manager
- Cannot create or modify tasks
- Output is informational and binding

[ES] Estos prompts bloquean la improvisación.

================================================================================
5. TASK EXECUTION PROMPTS
================================================================================

Task execution prompts are the primary operational mechanism.

Rules:
- One prompt executes one task
- Each task must have a unique identifier (TASK-XXX)
- Role must be explicitly stated
- Objective must be singular and clear

Mandatory structure:
- Role
- Task ID
- Objective
- Inputs
- Constraints
- Execution steps
- Expected output
- Validation authority

[ES] Un prompt ambiguo produce trabajo defectuoso.

================================================================================
6. VALIDATION (QA) PROMPTS
================================================================================

Validation prompts are used exclusively by QA roles.

Purpose:
- Validate task outputs
- Confirm compliance with documentation and governance
- Approve or reject task execution

Rules:
- QA does not fix issues
- QA issues PASS or FAIL only
- Validation output is final unless escalated

[ES] QA no negocia.
[ES] QA dictamina.

================================================================================
7. INCIDENT AND GOVERNANCE PROMPTS
================================================================================

Incident prompts are used to report:
- Governance violations
- Security risks
- Architectural breaches
- Process failures

Rules:
- Any role may report an incident
- Incidents must be documented
- Critical incidents may stop the workflow

[ES] Un incidente documentado
[ES] vale más que una discusión informal.

================================================================================
8. MAINTENANCE AND CHANGE PROMPTS
================================================================================

Maintenance and change prompts are used after delivery.

Purpose:
- Request changes
- Manage maintenance actions
- Control evolution of the system

Rules:
- No change is executed without a prompt
- Governance review is mandatory
- Changes outside scope require a new project

[ES] Cambios sin prompt
[ES] no existen oficialmente.

================================================================================
9. LANGUAGE RULES
================================================================================

Language requirements:
- Console outputs: Spanish
- Code and documentation: English
- Explanatory notes: Spanish allowed

[ES] Esta regla evita confusión operativa
[ES] y mantiene consistencia técnica.

================================================================================
10. TRACEABILITY AND AUDITABILITY
================================================================================

All prompts must:
- Be logged
- Reference task or incident IDs
- Produce verifiable outputs
- Be auditable at any time

[ES] Lo que no deja rastro
[ES] no es aceptable en este sistema.

================================================================================
11. PROHIBITED PROMPT PRACTICES
================================================================================

The following practices are forbidden:
- Multi-task prompts
- Role-less prompts
- Exploratory or speculative prompts
- Prompts that redefine scope implicitly
- Prompts that bypass QA or approvals

[ES] Estas prácticas degradan el sistema
[ES] y anulan la gobernanza.

================================================================================
12. ENFORCEMENT
================================================================================

Non-compliance with this plan:
- Invalidates prompt execution
- May trigger governance incidents
- May require rollback or corrective action

[ES] Este plan no es sugerencia.
[ES] Es norma operativa.

================================================================================
13. DOCUMENT STATUS
================================================================================

Document status:
- ACTIVE

Applies to:
- All operational phases post-delivery
- All roles interacting with the system

[ES] Mientras este documento esté activo,
[ES] rige el uso de prompts en el sistema.

================================================================================
END OF DOCUMENT
================================================================================
