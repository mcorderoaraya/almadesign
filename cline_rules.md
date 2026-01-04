# CLINE RULES – GOVERNANCE AND EXECUTION CONTRACT

Version: 1.0  
Status: ACTIVE – MANDATORY  
Scope: All tasks executed with Cline role  

---

## 1. PURPOSE

This document defines the non-negotiable rules under which the Cline role
operates inside this project.

Cline is not an assistant.
Cline is an execution role with governance responsibility.

---

## 2. GOLDEN RULE (MANDATORY)

### BEFORE ANY ACTION:

1. Analyze the full technical and functional context.
2. Identify all files potentially affected by the change.
3. Validate existing contracts (Router, Kernel, Controllers, Middleware).
4. Detect contradictions, missing abstractions, or broken flows.
5. ONLY THEN proceed with implementation.

Skipping analysis is a violation.

---

## 3. CHANGE SCOPE RULE

Any change MUST:

- Identify ALL files involved.
- Update ALL impacted files.
- Never patch a single file in isolation.
- Never introduce partial fixes.

If a change affects Router logic, it MUST consider:
- Router
- RouteCollection
- Kernel
- Controllers
- ErrorController
- Middleware (if applicable)
- index.php

Partial updates are forbidden.

---

## 4. CENTRALIZED FINALIZATION RULE

ONLY the following components are allowed to terminate execution:

- Response::send()
- ErrorController (notFound / exception)

Controllers, Middleware, Router and Kernel MUST NOT:
- echo
- exit
- die
- header()
- print JSON directly

Violation = architectural fault.

---

## 5. ROUTING RULES

- All routing logic is centralized.
- Controllers receive already-resolved data.
- Route parameters are resolved by RouteCollection.
- Controllers NEVER parse URLs.

Valid controller signature:
(Request $request, array $params): Response

---

## 6. ERROR HANDLING RULE

Errors are NOT handled ad-hoc.

All errors must be routed to ErrorController:

- 404 → ErrorController::notFound()
- 500 → ErrorController::exception()

No inline try/catch in controllers unless explicitly justified.

---

## 7. MIDDLEWARE RULES

- Middleware is explicit.
- Middleware is deterministic.
- Middleware is registered per route or per group.
- Middleware NEVER decides final output.

Middleware MAY:
- Stop propagation by returning Response
Middleware MUST NOT:
- echo
- die
- exit

---

## 8. DOCUMENTATION RULE

Every completed task MUST result in documentation updates.

Minimum required updates:
- docs-vX.X.md
- Relevant docs/ files if architecture changes

If documentation is not updated, the task is NOT DONE.

---

## 9. VALIDATION RULE

No task is considered complete unless:

- curl tests pass
- PHP CLI execution passes
- Error paths are validated
- Negative cases are tested

---

## 10. VIOLATION CONSEQUENCES

Any violation triggers:

1. Immediate task halt
2. Architectural review
3. Forced refactor before continuation

---

END OF CLINE RULES