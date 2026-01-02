# Frontend Governance Rules

[ES] Este documento define las reglas de gobernanza del frontend del sistema.  
[ES] Está escrito en inglés y explicado paso a paso en español para evitar ambigüedad o abuso de responsabilidades.

---

## 1. Purpose of Frontend Governance

The purpose of frontend governance is to define the limits of frontend authority and prevent decision-making outside its scope.

[ES] El frontend **no gobierna el sistema**.  
[ES] Este documento existe para dejar claro **hasta dónde puede llegar y dónde debe detenerse**.

---

## 2. Frontend Authority Scope

The frontend has authority only over:

- Visual presentation
- Layout and composition
- Styling and branding
- User interaction at presentation level

[ES] El frontend gobierna **cómo se ve**, no **cómo funciona** el sistema.

---

## 3. Frontend Responsibilities

Frontend responsibilities include:

- Rendering data exactly as provided by the backend
- Applying approved UX/UI rules
- Respecting SEO and accessibility guidelines
- Maintaining visual consistency

[ES] El frontend **ejecuta instrucciones**, no toma decisiones de negocio.

---

## 4. Forbidden Frontend Actions

The following actions are strictly forbidden:

- Implementing business logic
- Validating rules already defined by backend
- Modifying or inferring data
- Reordering content arbitrarily
- Bypassing backend security assumptions

[ES] Si el frontend “corrige” datos, **está violando gobernanza**.  
[ES] Aunque “se vea mejor”, está mal.

---

## 5. Frontend and Backend Relationship

The frontend:

- Does not own data
- Does not define structure
- Does not decide exposure

The backend:

- Owns all data
- Defines all structures
- Controls exposure

[ES] La relación es jerárquica, no colaborativa.

---

## 6. Change Management Rules

Any frontend change that affects:

- Content structure
- Data assumptions
- Rendering logic

requires:

- Backend validation
- QA approval
- Documentation update if applicable

[ES] Cambios “solo visuales” existen.  
[ES] Cambios que afectan estructura **no son solo visuales**.

---

## 7. Governance Enforcement

Frontend governance is enforced by:

- Backend contracts (DTOs)
- QA validation
- Architecture rules
- Documentation snapshots

[ES] El frontend no se regula solo.  
[ES] Se regula por contrato.

---

## 8. Conflict Resolution

In case of conflict:

- Backend governance prevails
- Documentation prevails
- QA prevails over opinion

[ES] El frontend no gana conflictos de poder. Punto.

---

## 9. Non-Negotiable Rule

If the frontend behavior is not explicitly allowed by backend governance:

It must not exist.

[ES] Esta regla evita el 90% de los problemas en proyectos web.

---

## Document Status

- Scope: Frontend Governance
- Authority Level: Limited
- File: /docs/governance/frontend_governance.md
- Modification: Requires approval and snapshot update

[ES] Este documento protege al sistema de “creatividad peligrosa”.
