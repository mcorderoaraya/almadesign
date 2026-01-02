# Governance Boundary Definition

[ES] Este documento define la frontera de gobernanza del sistema.  
[ES] Establece los límites de poder entre backend, frontend, QA y gestión del proyecto.

---

## 1. Purpose of the Governance Boundary

The purpose of the governance boundary is to prevent overlap of authority and uncontrolled decision-making.

[ES] La frontera de gobernanza existe para evitar:
- conflictos de poder
- decisiones duplicadas
- responsabilidades difusas

---

## 2. Governance Actors

The system recognizes the following governance actors:

- Backend
- Frontend
- Quality Assurance (QA)
- Project Management

[ES] No hay más actores.  
[ES] Si alguien no está aquí, no decide.

---

## 3. Authority Matrix

### Backend Authority

- Business logic
- Data integrity
- Security
- Data exposure
- System behavior

[ES] El backend es **la máxima autoridad técnica funcional**.

---

### Frontend Authority

- Presentation
- Layout
- Visual hierarchy
- Styling

[ES] El frontend gobierna apariencia, no reglas.

---

### QA Authority

- Validation
- Veto power
- Enforcement of rules
- Approval or rejection of tasks

[ES] QA **puede detener el proyecto**.  
[ES] No es decorativo.

---

### Project Management Authority

- Scope definition
- Priority setting
- Final approval
- Risk acceptance

[ES] El Jefe de Proyecto asume responsabilidad final, no decisiones técnicas arbitrarias.

---

## 4. Boundary Rules

The following boundary rules are enforced:

- No actor may operate outside its authority
- No task bypasses QA validation
- No undocumented decision is valid
- No implementation without governance

[ES] Si cruza la frontera, se rechaza.

---

## 5. Escalation Path

In case of conflict:

1. Documentation is consulted
2. QA evaluates compliance
3. Project Manager decides acceptance or rejection

[ES] No se vota.  
[ES] Se verifica y se decide.

---

## 6. Change Impact Rule

Any change that crosses governance boundaries requires:

- Documentation update
- New snapshot version
- Explicit approvals

[ES] La frontera se mueve solo con acta firmada.

---

## 7. Governance Enforcement Mechanisms

Governance is enforced through:

- Task-based workflow
- QA veto
- Documentation snapshots
- Final project approval

[ES] La gobernanza se ejecuta, no se pide por favor.

---

## 8. Non-Negotiable Rule

If a decision crosses the governance boundary without approval:

It is invalid, even if implemented.

[ES] Esta regla invalida “atajos” técnicos.

---

## Document Status

- Scope: Governance Boundary
- Authority Level: Supreme
- File: /docs/governance/governance_boundary.md
- Modification: Requires new snapshot and full approval

[ES] Este documento es la constitución del sistema.
