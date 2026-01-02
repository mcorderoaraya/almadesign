# System Architecture – Almadesign Backend

---

## 1. Purpose of This Document

This document defines the **actual, validated system architecture** of the Almadesign backend.

It does not describe intentions, frameworks, or future ideas.
It documents what exists, what is allowed, and what is explicitly forbidden.

[ES]
Este documento describe la arquitectura REAL del sistema.
No es un plan, no es una promesa y no es una propuesta.
Es un contrato técnico.

---

## 2. Architectural Principles

- Single entry point
- Explicit bootstrap
- No hidden framework assumptions
- PSR-4 autoload compliance
- Progressive complexity only after validation

[ES]
La arquitectura se construye por capas validadas.
Nada se agrega si la capa anterior no funciona en runtime.

---

## 3. Runtime Entry Point

The system entry point is:

/public/index.php

Responsibilities of the entry point:
- Load Composer autoloader
- Load environment variables
- Instantiate the Kernel
- Delegate execution

The entry point MUST NOT:
- Contain business logic
- Handle routing
- Access database
- Render views

[ES]
index.php no decide nada.
Solo inicia el sistema y delega control.

---

## 4. Kernel Architecture

The Kernel is defined as:

Namespace:
Almadesign\Backend\App\Kernel

Location:
/app/App/Kernel.php

The Kernel is the owner of:
- Application lifecycle
- HTTP flow orchestration
- Controlled execution order

[ES]
El Kernel es el núcleo del sistema.
No es un controlador ni un helper global.

---

## 5. Bootstrap Validation Status

The following have been validated in runtime:

- Apache VirtualHost resolution
- PHP execution
- Composer autoload
- Kernel instantiation
- HTTP execution via curl

Evidence:
curl http://almadesign.local

Observed output:
Kernel booted successfully

[ES]
Esto cierra definitivamente los problemas de infraestructura.
Desde aquí en adelante, los errores son de código.

---

## 6. Architectural Freeze

From this version onward:
- The bootstrap is frozen
- The Kernel existence is mandatory
- No task may redefine entry points

[ES]
Este punto no se vuelve a discutir.
Cualquier cambio requiere versionado formal.

---

## 7. Next Architectural Phase

Phase 2:
- HTTP Request object
- HTTP Response object
- Kernel-mediated execution

Excluded:
- Database
- ORM
- Plugins
- Authentication

[ES]
No se salta de fase.
La complejidad se introduce de forma incremental.

---