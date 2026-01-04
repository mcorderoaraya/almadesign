# cline/task_template.md

# TASK Template (Mandatory)
[ES] Plantilla obligatoria para cualquier tarea. Si falta una sección, la tarea está incompleta.

---

## TASK-ID
- TASK-XXX — <Title in English>
[ES] Ejemplo: TASK-090.5 — Explicit Middleware (Auth / CSRF / RateLimit)

---

## Owner Role
- <Project Manager | PHP Developer | SQL Developer | UX/UI Developer | QA>
[ES] Un dueño claro: una tarea sin dueño no se ejecuta.

---

## Objective
- <One paragraph, English>
[ES] Qué se busca lograr. Sin marketing. Sin ambigüedad.

---

## Scope
### In scope
- <Bullet list>
### Out of scope
- <Bullet list>
[ES] Esto previene creep. Si algo no está en scope, no se toca.

---

## Change Completeness (GOLDEN RULE CHECK)
**List ALL files involved (create/update/delete).**
[ES] Obligatorio: si el cambio toca 5 archivos, aquí deben aparecer los 5.

### Files to CREATE
- `<path>`
- `<path>`

### Files to UPDATE
- `<path>`
- `<path>`

### Files to DELETE (if any)
- `<path>`

[ES] Nota: si cambias contratos (Request/Response/Router), debes incluir también consumidores (controllers/index.php/docs/tests).

---

## Implementation Plan
1. <Step 1 in English>
2. <Step 2 in English>
3. <Step 3 in English>
[ES] Paso a paso ejecutable. No “implementar X” sin detallar.

---

## Acceptance Criteria
- [ ] Criterion 1 (English)
- [ ] Criterion 2 (English)
- [ ] Criterion 3 (English)
[ES] Criterios medibles. Si no se puede verificar, no sirve.

---

## Verification Commands (Manual)
- `php -l <file>`
- `composer dump-autoload -o`
- `curl http://almadesign.local/ -UseBasicParsing`
- `curl http://almadesign.local/health -UseBasicParsing`
[ES] Ajustar comandos según la tarea. Si no hay verificación, no hay cierre.

---

## QA Checklist
- [ ] All files listed in “Files to CREATE/UPDATE/DELETE” are actually included
- [ ] No partial changes; no missing dependencies
- [ ] No regression in `/` or `/health`
- [ ] Unknown routes return 404 JSON
[ES] QA no “confía”: valida.

---

## Rollback Plan
- <How to revert safely, English>
[ES] Debe ser ejecutable. Ejemplo: `git revert <commit>` y comandos de sanity check.

---

## Documentation Updates
- `docs/` files impacted: <list>
- `docs-vX.X.md` snapshot update required: yes/no
- README update required: yes/no
[ES] Si cambias arquitectura o flujo, docs se actualizan sí o sí.

---
End of template.