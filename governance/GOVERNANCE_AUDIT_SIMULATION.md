# Governance Audit Simulation

[ES] Este documento simula una auditoría de gobernanza aplicada al sistema.
[ES] Su objetivo es detectar violaciones antes de que lleguen a producción.

================================================================================
1. PURPOSE
================================================================================

The purpose of this audit simulation is to test governance rules against realistic
project scenarios.

[ES] No es una auditoría teórica. Son casos que **realmente pasan**.

================================================================================
2. AUDIT SCOPE
================================================================================

This audit evaluates:

- Authority boundaries
- Decision ownership
- QA enforcement
- Documentation compliance

[ES] Si algo no puede auditarse, no está gobernado.

================================================================================
3. SIMULATED SCENARIOS
================================================================================

--------------------------------------------------------------------------------
Scenario 1: Frontend adds validation logic
--------------------------------------------------------------------------------
Description:
Frontend developer adds client-side validation that changes backend rules.

Expected Result:
- Governance violation detected
- Severity Level: 2 (Major)
- Action: Remove logic, QA review, documentation check

[ES] El frontend no corrige al backend. Nunca.

--------------------------------------------------------------------------------
Scenario 2: Backend exposes undocumented field
--------------------------------------------------------------------------------
Description:
Backend exposes an internal entity field without updating DTO documentation.

Expected Result:
- Governance violation detected
- Severity Level: 2 (Major)
- Action: Rollback exposure, update docs, snapshot if needed

[ES] Exponer datos sin contrato es romper frontera.

--------------------------------------------------------------------------------
Scenario 3: QA approval skipped under pressure
--------------------------------------------------------------------------------
Description:
A task is merged without QA validation due to time constraints.

Expected Result:
- Governance violation detected
- Severity Level: 3 (Critical)
- Action: Immediate freeze, rollback, full audit

[ES] QA no es opcional, ni siquiera “por esta vez”.

================================================================================
4. AUDIT OUTPUT
================================================================================

Audit results must include:

- Detected violations
- Severity classification
- Required corrective actions
- Responsible authority

[ES] Sin responsables, no hay gobernanza.

================================================================================
5. NON-NEGOTIABLE RULE
================================================================================

If a simulated violation cannot be clearly classified:

Governance rules are insufficient and must be revised.

[ES] La ambigüedad es un fallo del sistema, no del auditor.
