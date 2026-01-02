# Governance Onboarding Guide

[ES] Este documento introduce la gobernanza del sistema a nuevos integrantes.
[ES] Debe leerse antes de tocar código o documentación.

================================================================================
1. PURPOSE
================================================================================

The purpose of this guide is to ensure that every team member understands
governance rules before contributing.

[ES] Aquí se evita el clásico: “yo pensé que podía”.

================================================================================
2. REQUIRED READING
================================================================================

New team members must read:

- README.md (root)
- docs-v1.2.md
- backend_governance.md OR frontend_governance.md (according to role)
- governance_boundary.md
- GOVERNANCE_VIOLATION_PROTOCOL.md

[ES] Sin lectura, no hay acceso.

================================================================================
3. ROLE ORIENTATION
================================================================================

Backend Developers:
- Own logic and data
- Must respect documentation contracts
- Cannot bypass QA

Frontend Developers:
- Own presentation only
- Cannot infer logic or data
- Must respect DTO contracts

QA:
- Own validation and veto
- Cannot approve ambiguity

Project Management:
- Own scope and risk
- Cannot override QA

[ES] Cada rol tiene poder y límites claros.

================================================================================
4. FIRST ACTION RULE
================================================================================

Before implementing anything:

- Identify your authority scope
- Identify affected documents
- Identify required approvals

[ES] Pensar antes de escribir código.

================================================================================
5. GOVERNANCE ACKNOWLEDGMENT
================================================================================

Every contributor must explicitly acknowledge:

"I understand the governance rules and accept their enforcement."

[ES] Esto elimina excusas posteriores.

================================================================================
6. NON-NEGOTIABLE RULE
================================================================================

Governance ignorance is not a valid justification.

[ES] Aquí nadie “no sabía”.
