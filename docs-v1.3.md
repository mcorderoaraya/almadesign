# docs-v1.3.md  
## Bootstrap Validation & Kernel Initialization Milestone

---

## 1. Document Purpose

This document records a **validated technical milestone** in the Almadesign backend system:  
the successful bootstrap of the application runtime and the existence of a minimal, executable Kernel.

[ES]  
Este documento **no planifica**, **no especula** ni **propone**.  
Registra un **hecho técnico comprobado en runtime**: el sistema arranca correctamente y ejecuta código propio.

---

## 2. Scope of This Version

This version explicitly covers:

- Apache VirtualHost resolution
- PHP runtime execution
- Composer autoload (PSR-4)
- Minimal Kernel instantiation
- HTTP execution validation via curl

Anything outside this scope is intentionally excluded.

[ES]  
Esta versión **no incluye**:
- routing
- base de datos
- ORM
- plugins
- lógica de negocio
- frontend rendering

Esto es deliberado. El objetivo es **aislar el bootstrap**.

---

## 3. Validated Runtime Environment

The following components have been validated in execution:

- Web Server: Apache (Windows)
- VirtualHost: `almadesign.local`
- DocumentRoot: `/public`
- PHP execution enabled
- Composer autoload enabled
- `.env` successfully loaded
- HTTP access validated via `curl`

[ES]  
Esto significa que:
- el error ya **no es infraestructura**
- cualquier fallo futuro será **código de aplicación**

---

## 4. Entry Point Definition

The application entry point is:

