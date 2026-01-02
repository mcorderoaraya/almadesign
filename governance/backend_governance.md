# Backend Governance Rules

[ES] Este documento define las reglas de gobernanza del backend del sistema.  
[ES] Está escrito en inglés y explicado paso a paso en español para eliminar cualquier ambigüedad.

---

## 1. Purpose of Backend Governance

The purpose of backend governance is to define who has authority over backend decisions, what can be decided, and what is explicitly forbidden.

[ES] El propósito de la gobernanza del backend es dejar claro:
- quién manda
- sobre qué manda
- y qué está prohibido discutir o improvisar

---

## 2. Backend Authority Scope

The backend has full authority over:

- Business logic
- Data integrity
- Security rules
- Access control
- Data exposure
- System behavior

[ES] Todo lo que afecte al comportamiento del sistema **es territorio del backend**.  
[ES] No es opinable, no es negociable, no es “colaborativo”.

---

## 3. Backend Decision Domains

Backend decisions include, but are not limited to:

- Validation rules
- Authentication and authorization
- Role definitions
- Data schemas
- API and DTO contracts
- Error handling behavior
- Logging policies

[ES] Si una decisión puede romper el sistema, **es backend**.  
[ES] El frontend no decide aquí, solo consume.

---

## 4. Forbidden Backend Violations

The following actions are strictly forbidden:

- Implementing business logic in the frontend
- Accessing the database outside the ORM layer
- Exposing internal entities directly
- Bypassing middleware or security layers
- Adding undocumented backend behavior

[ES] Estas violaciones **no son bugs**, son **faltas de gobernanza**.  
[ES] Se rechazan aunque “funcionen”.

---

## 5. Backend vs Frontend Boundary

The backend defines:

- What data exists
- What data is exposed
- In what structure data is exposed
- In what order data is delivered

The frontend must:

- Render exactly what is provided
- Respect backend-defined order and structure
- Never infer or fabricate data

[ES] El backend decide **el qué** y **el cómo**.  
[ES] El frontend decide **el dónde se muestra**, nada más.

---

## 6. Change Management Rules

Any backend change requires:

- Documentation update
- QA validation
- New documentation snapshot (docs-vX.X.md)
- Explicit approval

[ES] Cambios sin snapshot **no existen oficialmente**.  
[ES] Cambios sin QA **no avanzan**.

---

## 7. Governance Enforcement

Backend governance is enforced through:

- Architecture rules
- QA veto power
- Task-based workflow
- Documentation snapshots

[ES] La gobernanza no se basa en confianza, se basa en **mecanismos**.

---

## 8. Conflict Resolution

In case of conflict:

- Backend governance overrides frontend decisions
- Documentation overrides assumptions
- QA overrides opinions

[ES] Aquí no gana el que habla más fuerte.  
[ES] Gana lo que está escrito y aprobado.

---

## 9. Non-Negotiable Rule

If a backend behavior is not documented, approved, and governed:

It must not exist.

[ES] Esta es la regla madre.  
[ES] Todo lo demás es ruido.

---

## Document Status

- Scope: Backend Governance
- Authority Level: Maximum
- File: /docs/governance/backend_governance.md
- Modification: Requires new snapshot

[ES] Este documento es una regla viva, pero **versionada y controlada**.
