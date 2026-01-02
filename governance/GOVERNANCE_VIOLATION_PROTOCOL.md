# Governance Violation Protocol

[ES] Este documento define el protocolo formal ante violaciones de gobernanza.
[ES] No es punitivo por defecto, es correctivo y preventivo.

================================================================================
1. PURPOSE
================================================================================

The purpose of this protocol is to define how governance violations are detected,
classified, escalated, and resolved.

[ES] Sin protocolo, las reglas no se aplican. Se discuten. Eso aquí no pasa.

================================================================================
2. WHAT CONSTITUTES A GOVERNANCE VIOLATION
================================================================================

A governance violation occurs when:

- An actor operates outside its authority
- A boundary is crossed without approval
- Undocumented behavior is implemented
- QA validation is bypassed
- A snapshot rule is ignored

[ES] No importa si “funciona”. Si viola gobernanza, es falta.

================================================================================
3. VIOLATION SEVERITY LEVELS
================================================================================

### Level 1 – Minor Violation

- Documentation inconsistency
- Non-authoritative suggestion implemented
- No system impact

[ES] Se corrige. No escala automáticamente.

---

### Level 2 – Major Violation

- Authority overreach
- Boundary crossing
- Backend/frontend responsibility violation

[ES] Requiere corrección inmediata y revisión QA.

---

### Level 3 – Critical Violation

- Security bypass
- Data integrity risk
- QA veto ignored
- Undocumented production behavior

[ES] El sistema se bloquea. No se negocia.

================================================================================
4. VIOLATION HANDLING PROCESS
================================================================================

1. Violation is detected (QA, audit, or review)
2. Violation is documented
3. Severity level is assigned
4. Corrective action is defined
5. QA validates correction
6. Snapshot is updated if required

[ES] No se “arregla rápido”. Se sigue el proceso.

================================================================================
5. ESCALATION PATH
================================================================================

- Level 1 → QA
- Level 2 → QA + Project Manager
- Level 3 → Immediate Project Manager intervention

[ES] La escalada es automática, no opcional.

================================================================================
6. TEMPORARY FREEZE RULE
================================================================================

For Level 2 and Level 3 violations:

- Related development is frozen
- No new tasks are approved
- Correction takes priority

[ES] Esto evita que el sistema se deteriore mientras “se conversa”.

================================================================================
7. RESOLUTION RULE
================================================================================

A violation is considered resolved only when:

- The corrective action is completed
- QA approves the fix
- Documentation is updated if required

[ES] Arreglar sin documentar = violación nueva.

================================================================================
8. NON-NEGOTIABLE RULE
================================================================================

Repeated governance violations may result in:

- Removal of decision authority
- Restriction of system access
- Mandatory governance review

[ES] La gobernanza protege al sistema, no egos.

================================================================================
9. DOCUMENT STATUS
================================================================================

- File: /docs/governance/GOVERNANCE_VIOLATION_PROTOCOL.md
- Authority Level: Supreme
- Modification: Requires snapshot and approvals

[ES] Este protocolo convierte reglas en consecuencias.
