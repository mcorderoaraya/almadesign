# 00 – Project Requirements
## Corporate Website System

[ES] Este documento define los requerimientos funcionales y no funcionales del sistema.  
[ES] Es la fuente de verdad para todo el proyecto. Ningún desarrollo puede contradecir este archivo.

---

## 1. Project Overview

The objective of this project is to design and develop a corporate website with a public-facing site and a secure administration area, using a strict role-based workflow governed by approvals and QA validation.

[ES] El sistema incluye un sitio público y un panel de administración con control de accesos.

---

## 2. Target Users

### 2.1 Public Users
- Website visitors
- Potential clients
- Contact form users

[ES] Usuarios externos sin autenticación.

### 2.2 Administrative Users
- System Administrator
- Content Manager

[ES] Usuarios autenticados con distintos niveles de permisos.

---

## 3. Functional Requirements

### 3.1 Public Website

The public website must include:

- Home page
- Corporate information pages
- Contact page
- SEO-friendly URLs
- Optimized performance and accessibility

[ES] El contenido público debe ser editable desde el panel de administración.

---

### 3.2 Page Builder Plugin

The system must include a page builder plugin that allows administrators to create and manage pages.

Each page must support:
- Page name (e.g., index, about-us)
- Reorderable content blocks

Each block must support:
- Title
- Rich text content
- Image gallery:
  - Formats: webp, png
  - Maximum size: 5 MB per image
  - Main image selection
  - Secondary images
- Audio or podcast gallery:
  - Format: mp3
  - Maximum size: 10 MB
- Video:
  - Format: mp4
  - Maximum size: 10 MB

[ES] El orden de los bloques debe ser controlado por el backend y respetado por el frontend.

---

### 3.3 Administration Panel

The administration panel must allow:

- Secure login and logout
- Role-based access control
- Content management
- Plugin management
- System configuration

[ES] El panel no expone lógica sensible al frontend.

---

### 3.4 Visit Tracking Plugin

The system must include a visit tracking plugin that:

- Records visits per page
- Displays data in an asynchronous dashboard
- Allows filtering by specific date

[ES] El dashboard debe ser no bloqueante y eficiente.

---

### 3.5 Heatmap Plugin

The system must include a heatmap plugin that:

- Tracks mouse movement on public pages
- Displays heat intensity over page screenshots
- Allows page selection via dropdown

[ES] El mapa de calor es informativo, no invasivo.

---

### 3.6 Backup Plugin

The system must include a backup plugin that allows:

- Manual backups
- Scheduled automatic backups by date and time

[ES] Los respaldos deben ser controlados únicamente por administradores.

---

### 3.7 Inbox Plugin

The system must include an inbox plugin that:

- Receives messages from the website contact form
- Allows configuration of the client email address
- Generates automatic responses to visitors
- Allows administrators to send manual replies with:
  - Recipient email
  - Subject
  - Rich text content

[ES] El usuario visitante siempre debe recibir confirmación.

---

### 3.8 Email Server

The backend must include an email sending service with the following requirements:

Mandatory fields:
- Visitor email
- Subject
- Rich text body

Optional fields:
- Image attachment (webp or png, max 5 MB)
- External URLs (social networks or websites)

[ES] El envío de correos debe ser validado server-side.

---

## 4. Non-Functional Requirements

### 4.1 Performance

- The system must be optimized for fast load times
- Database queries must be efficient
- Assets must be optimized

[ES] El rendimiento es un criterio obligatorio, no opcional.

---

### 4.2 Security

The system must implement protection against:
- SQL Injection
- Cross-Site Scripting (XSS)
- Authentication and authorization vulnerabilities
- Basic scraping attempts

[ES] La seguridad mínima es obligatoria en todo el sistema.

---

### 4.3 SEO Requirements

- Clean and readable URLs
- Metadata support (title, description)
- Semantic HTML structure
- Performance-oriented frontend

[ES] SEO se considera desde backend y frontend.

---

### 4.4 Data Integrity

- All data must be validated server-side
- Database integrity must be enforced via constraints

[ES] No se confía en validaciones del cliente.

---

## 5. Constraints

- PHP version: 8.x
- MySQL version: 8.x
- ORM required and approved by Project Manager
- Tailwind CSS must be used for styling
- Documentation must be written in English with Spanish annotations

[ES] Ninguna de estas restricciones puede ser ignorada.

---

## 6. Acceptance Criteria

The system is considered acceptable when:

- All functional requirements are implemented
- All non-functional requirements are satisfied
- All tasks are validated by QA
- Final approval is issued by the Project Manager

[ES] Sin aprobación final, el proyecto no se considera terminado.

---

## 7. Change Management

Any change to these requirements must be:
- Documented
- Approved by the Project Manager
- Versioned

[ES] Cambios no documentados están prohibidos.

---

## Document Status

- Version: 1.0
- Status: Initial Approved Draft
- File: /docs/00_requirements.md

[ES] Este documento bloquea el inicio del desarrollo sin aprobación.
