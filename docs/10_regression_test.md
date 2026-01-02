Full System Regression Testing
TASK-055 – Execute Full System Regression Test

[ES] Este documento define el protocolo oficial de QA para ejecutar
[ES] pruebas de regresión completas sobre el sistema.
[ES] Su objetivo es asegurar que ningún cambio reciente
[ES] haya roto funcionalidades previamente validadas.
[ES] Si alguna prueba falla, el flujo de trabajo se detiene.

================================================================================
1. PURPOSE OF THIS DOCUMENT
================================================================================

This document defines the regression testing process to ensure:
- The system remains stable after all implemented tasks.
- Previously validated features still work correctly.
- Core flows and plugins operate without conflicts.
- Governance rules remain respected across the system.

Regression testing validates system stability, not new features.

[ES] Regresión significa:
[ES] “Nada de lo que ya funcionaba se rompió”.

================================================================================
2. SCOPE OF TESTING
================================================================================

Included in scope:
- Public pages core navigation and rendering
- Admin interface core navigation and access control
- Page Builder create/update/render flows
- Visit tracking collection and reporting
- Heatmap collection and visualization
- Backup manual and scheduled operations
- Inbox and email flows
- Error page handling (404/500)
- Governance compliance checks

Explicitly excluded from scope:
- Load testing
- Visual design review
- Performance optimization
- Infrastructure hardening

[ES] Si no está aquí, no entra en regresión.

================================================================================
3. PRECONDITIONS
================================================================================

Before executing regression tests:
- TASK-051 PASSED (DB integrity)
- TASK-052 PASSED (Backend security and logic)
- TASK-053 PASSED (Plugins functionality)
- TASK-054 PASSED (Frontend integration)
- Codebase is frozen
- Test environment is stable and isolated

[ES] Regresión sin congelar código no sirve.

================================================================================
4. TEST EXECUTION STRATEGY
================================================================================

Execution principles:
- Test critical paths first.
- Use consistent test data.
- Log all failures with reproducible steps.
- Stop on critical failures.

Severity levels:
- Critical: blocks workflow immediately
- Major: must be fixed before final approval
- Minor: documented for later, but must not break governance

[ES] Si algo es crítico, no se discute: se corrige.

================================================================================
5. REGRESSION TEST MATRIX (CORE FLOWS)
================================================================================

----------------------------------------------------------------------
5.1 Public Site Core Flows
----------------------------------------------------------------------

Test cases:
- Load Home page → must succeed
- Navigate to About → must succeed
- Navigate to Services → must succeed
- Navigate to Contact → must succeed
- Submit Contact form → must succeed (and store message)

Acceptance criteria:
- No runtime errors
- Correct content rendering
- Correct form submission handling
- No leakage of internal errors

[ES] El sitio público debe funcionar como unidad mínima.

----------------------------------------------------------------------
5.2 Admin Core Flows
----------------------------------------------------------------------

Test cases:
- Access admin login → must succeed
- Access admin dashboard (authorized) → must succeed
- Unauthorized admin access → must fail
- Navigate Pages/Blocks/Media/Settings → must succeed

Acceptance criteria:
- Correct access control
- Stable navigation
- Safe error handling

[ES] Si el admin está abierto, el sistema está comprometido.

----------------------------------------------------------------------
5.3 Page Builder Regression
----------------------------------------------------------------------

Test cases:
- Create page with multiple blocks → must succeed
- Update page metadata → must succeed
- Reorder blocks → must persist
- Publish and view page in public site → must render correctly
- Delete page → must remove related content safely

Acceptance criteria:
- Block order preserved
- Public rendering matches configuration
- No orphan records created

[ES] Page Builder es el corazón del contenido. No puede fallar.

----------------------------------------------------------------------
5.4 Visit Tracking Regression
----------------------------------------------------------------------

Test cases:
- Generate visits across pages → must record
- Query visits by date range → must return correct counts
- Disable tracking → must stop recording

Acceptance criteria:
- Tracking does not break pages
- Data is consistent and queryable

[ES] Tracking debe ser invisible y confiable.

----------------------------------------------------------------------
5.5 Heatmap Regression
----------------------------------------------------------------------

Test cases:
- Record cursor data on a page → must persist
- View heatmap in admin → must load and display
- Switch page selector → must update correctly

Acceptance criteria:
- Data maps to correct page
- No crashes on missing data

[ES] Heatmap con datos mal mapeados es desinformación.

----------------------------------------------------------------------
5.6 Backup Regression
----------------------------------------------------------------------

Test cases:
- Trigger manual backup → must succeed
- Verify backup artifact exists → must succeed
- Schedule backup (if supported) → must execute
- Validate backup completeness (schema + content) → must succeed

Acceptance criteria:
- Backups are restorable
- No silent failures

[ES] Backup no probado para restaurar no vale.

----------------------------------------------------------------------
5.7 Inbox / Email Regression
----------------------------------------------------------------------

Test cases:
- Contact submission creates inbox item → must succeed
- Auto-reply sent to user → must succeed
- Admin reply workflow → must succeed

Acceptance criteria:
- Messages stored correctly
- No mail header injection vulnerabilities exposed
- Errors logged safely

[ES] Email es superficie de ataque. Se valida con rigor.

----------------------------------------------------------------------
5.8 Error Handling Regression
----------------------------------------------------------------------

Test cases:
- Invalid route → must show 404 page
- Forced backend error scenario → must show 500 page (safe message)

Acceptance criteria:
- No stack traces exposed
- No sensitive data leaked

[ES] Un error visible con detalles es una fuga.

----------------------------------------------------------------------
5.9 Governance Compliance Regression
----------------------------------------------------------------------

Test cases:
- Verify Tailwind semantic tokens only (no hardcoded colors)
- Verify admin and public layout separation
- Verify all dynamic content renders through block renderer
- Verify no undocumented pages exist

Acceptance criteria:
- No governance violations detected

[ES] Si se viola gobernanza, el sistema se rechaza aunque “funcione”.

================================================================================
6. RESULTS AND FAILURE PROTOCOL
================================================================================

Test result:
- PASSED
- FAILED

If FAILED:
- Document each failure with:
  - Steps to reproduce
  - Expected vs actual behavior
  - Severity classification
  - Evidence (logs, screenshots)
- Stop workflow until resolved

[ES] Si falla, no se continúa con aprobación final.

================================================================================
7. APPROVAL AND NEXT STEP
================================================================================

Executed by:
- QA Engineer

Reviewed by:
- Project Manager

Approval status:
- Pending
- Approved

Next task dependency:
- TASK-060 – Final QA validation

[ES] Si regresión aprueba, QA puede certificar el sistema completo.

================================================================================
END OF DOCUMENT
================================================================================