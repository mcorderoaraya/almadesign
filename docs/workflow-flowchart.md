# Workflow Flowchart  
## Corporate Website – Cline / VS Code

Este documento describe el flujo completo del proyecto para el desarrollo de un sitio web corporativo utilizando un workflow basado en roles, gates de aprobación y validación continua mediante Testing QA.

---

## Convenciones del diagrama

- Rectángulo: tarea o actividad
- Rombo: decisión / gate de aprobación
- JP: Jefe de Proyecto
- QA: Testing QA

Ninguna tarea puede avanzar sin la aprobación explícita del Jefe de Proyecto cuando corresponda.

---

## Diagrama de flujo del proyecto

```mermaid
flowchart TD

A[Inicio del Proyecto] --> B[JP: Definición de Requerimientos]
B --> C{JP aprueba requerimientos?}

C -- No --> B
C -- Sí --> D[JP: Definición de Arquitectura]

D --> E{JP aprueba arquitectura?}
E -- No --> D
E -- Sí --> F[UX/UI: Diseño UI + Lineamientos SEO/SEM]

F --> G[QA: Test UX/UI]
G --> H{QA aprueba UX/UI?}

H -- No --> F
H -- Sí --> I[JP: Gate UX/UI aprobado]

I --> J[SQL: Diseño del Modelo de Datos]
J --> K[QA: Test esquema SQL]

K --> L{QA aprueba SQL?}
L -- No --> J
L -- Sí --> M[JP: Gate Modelo de Datos aprobado]

M --> N[PHP: Backend base + Seguridad]
N --> O[QA: Test Backend]

O --> P{QA aprueba Backend?}
P -- No --> N
P -- Sí --> Q[JP: Gate Backend aprobado]

Q --> R[PHP: Implementación de Plugins]
R --> S[SQL: Ajustes de esquema para Plugins]
S --> T[QA: Test Plugins]

T --> U{QA aprueba Plugins?}
U -- No --> R
U -- Sí --> V[JP: Gate Plugins aprobado]

V --> W[UX/UI: Integración Final Frontend]
W --> X[QA: Test de Integración]

X --> Y{QA aprueba Integración?}
Y -- No --> W
Y -- Sí --> Z[QA: Test Final del Sistema]

Z --> AA{QA valida sistema 100%?}
AA -- No --> AB[QA: Reporte final a JP]
AB --> N
AA -- Sí --> AC[JP: Aprobación Final del Proyecto]

AC --> AD[Fin del Proyecto]
