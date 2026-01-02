# Governance Incident Report – INCIDENT-XXX

[ES] Esta plantilla es obligatoria para reportar cualquier violación de gobernanza.
[ES] Incidentes fuera de este formato no son válidos ni procesables.

================================================================================
1. INCIDENT IDENTIFICATION
================================================================================

Incident ID:
- INCIDENT-XXX

Date Reported:
- YYYY-MM-DD

Reported By:
- Name / Role

Detection Method:
- ☐ QA Review
- ☐ Audit
- ☐ Code Review
- ☐ Regression Test
- ☐ Other (specify)

[ES] Sin identificación clara, no hay trazabilidad.

================================================================================
2. INCIDENT DESCRIPTION
================================================================================

Summary:
- Short, factual description of the incident.

Detailed Description:
- Describe exactly what happened.
- Describe what rule or boundary was crossed.
- Do NOT justify or explain intentions.

[ES] Aquí se describen hechos, no excusas.

================================================================================
3. GOVERNANCE RULE VIOLATED
================================================================================

Violated Document(s):
- ☐ backend_governance.md
- ☐ frontend_governance.md
- ☐ governance_boundary.md
- ☐ docs-v1.2.md
- ☐ Other (specify)

Violated Section(s):
- List exact section titles or numbers.

[ES] Si no puedes señalar la regla violada, el incidente está mal reportado.

================================================================================
4. ACTOR AND AUTHORITY ANALYSIS
================================================================================

Actor Involved:
- Backend
- Frontend
- QA
- Project Management
- Other

Authority Scope of Actor:
- Describe the actor’s allowed authority.

Actual Action Taken:
- Describe the action that exceeded authority.

[ES] Aquí se demuestra la violación de frontera.

================================================================================
5. SEVERITY CLASSIFICATION
================================================================================

Severity Level:
- ☐ Level 1 – Minor
- ☐ Level 2 – Major
- ☐ Level 3 – Critical

Justification:
- Explain why this severity level applies.

[ES] La severidad define la respuesta. No es opinable.

================================================================================
6. SYSTEM IMPACT ANALYSIS
================================================================================

Affected Areas:
- ☐ Security
- ☐ Data Integrity
- ☐ Architecture
- ☐ Documentation
- ☐ Workflow
- ☐ None

Impact Description:
- Describe real or potential impact.

[ES] Incluso “sin impacto” debe justificarse.

================================================================================
7. IMMEDIATE ACTIONS TAKEN
================================================================================

Actions Taken:
- ☐ None
- ☐ Task frozen
- ☐ Rollback applied
- ☐ Access restricted
- ☐ Other (specify)

Date of Action:
- YYYY-MM-DD

Responsible Authority:
- QA / Project Manager

[ES] La inacción también es una decisión y debe quedar registrada.

================================================================================
8. CORRECTIVE ACTION PLAN
================================================================================

Required Corrections:
- List concrete corrective actions.

Responsible Role:
- Backend / Frontend / QA / PM

Deadline:
- YYYY-MM-DD

Requires Documentation Update:
- ☐ YES
- ☐ NO

Requires New Snapshot:
- ☐ YES
- ☐ NO

[ES] Corregir sin documentar crea una nueva violación.

================================================================================
9. QA REVIEW
================================================================================

QA Assessment:
- ☐ VALID INCIDENT
- ☐ INVALID INCIDENT

QA Notes:
- Factual observations only.

QA Decision:
- ☐ ACCEPTED
- ☐ REJECTED

[ES] QA tiene poder de veto sobre el proceso.

================================================================================
10. PROJECT MANAGER DECISION
================================================================================

PM Review:
- ☐ ACCEPTED
- ☐ REJECTED

Risk Statement:
- Describe accepted or mitigated risk.

PM Signature:
- Name / Date

[ES] El PM asume responsabilidad explícita.

================================================================================
11. INCIDENT CLOSURE
================================================================================

Closure Status:
- ☐ OPEN
- ☐ IN PROGRESS
- ☐ CLOSED

Closure Date:
- YYYY-MM-DD

Closure Notes:
- Objective summary of resolution.

================================================================================
12. NON-NEGOTIABLE RULE
================================================================================

If this incident is not fully documented, classified, reviewed, and closed
using this template:

It is considered unresolved and the governance breach remains active.

[ES] Incidentes abiertos = gobernanza rota.
