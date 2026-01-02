# Prompt Execution Plan – Almadesign / Cline

---

## 1. Purpose

This document defines how prompts are executed, validated, and governed.

It ensures that automated execution (Cline) does not diverge from architecture.

[ES]
Cline no piensa.
Este documento le dice qué está permitido.

---

## 2. Prompt Categories

A. Initialization Prompts  
B. Task Execution Prompts  
C. Validation (QA) Prompts  
D. Incident Prompts  
E. Maintenance / Change Prompts

[ES]
Cada prompt pertenece a una categoría.
No se mezclan.

---

## 3. Initialization Prompts – Status

The following are COMPLETED:

✔ Infrastructure bootstrap  
✔ Composer autoload  
✔ Kernel minimal validation  

Reference document:
docs-v1.3.md

[ES]
Cline no puede volver a tocar estas capas.

---

## 4. Execution Rules

- No prompt may redefine the entry point
- No prompt may remove or bypass the Kernel
- No prompt may assume frameworks

[ES]
Las suposiciones rompen sistemas.

---

## 5. Validation Prompts

All execution prompts require:
- Explicit validation
- Observable runtime behavior
- Clear success criteria

[ES]
Si no se puede validar, no se ejecuta.

---

## 6. Incident Handling

Any deviation must:
- Stop execution
- Be documented
- Be escalated

[ES]
No se parchea en silencio.

---

## 7. Next Allowed Prompt Type

Phase 2 Prompts:
- Request / Response design
- HTTP flow definition

[ES]
Todo lo demás está bloqueado hasta completar esta fase.

---
