# 02 – Data Model
## Corporate Website Platform

[ES] Este documento define el modelo de datos del sistema.  
[ES] Toda implementación en base de datos debe ajustarse estrictamente a este modelo.

---

## 1. Data Model Objectives

The data model is designed to:

- Ensure data integrity
- Support modular plugin architecture
- Optimize query performance
- Enforce validation at database level

[ES] El modelo prioriza consistencia y control por sobre flexibilidad excesiva.

---

## 2. Database Technology

- Database Engine: MySQL 8.x
- Charset: utf8mb4
- Collation: utf8mb4_unicode_ci

[ES] No se permite usar configuraciones por defecto sin validar.

---

## 3. Core Entities

### 3.1 Users

Purpose:
- Store administrative users

Fields:
- id (PK)
- name
- email (UNIQUE)
- password_hash
- role
- status
- created_at
- updated_at

[ES] Las contraseñas nunca se almacenan en texto plano.

---

### 3.2 Roles

Purpose:
- Define access control roles

Fields:
- id (PK)
- name
- description

[ES] El control de permisos se basa en roles, no en flags dispersos.

---

### 3.3 Pages

Purpose:
- Store website pages

Fields:
- id (PK)
- slug (UNIQUE)
- title
- status
- created_at
- updated_at

[ES] El slug se usa para URLs SEO-friendly.

---

### 3.4 Blocks

Purpose:
- Store page content blocks

Fields:
- id (PK)
- page_id (FK)
- type
- position
- created_at
- updated_at

[ES] El orden se controla por el backend.

---

## 4. Media Entities

### 4.1 Images

Fields:
- id (PK)
- block_id (FK)
- file_path
- is_main
- format
- size

[ES] Validaciones de formato y tamaño son obligatorias.

---

### 4.2 Audio

Fields:
- id (PK)
- block_id (FK)
- file_path
- duration
- size

---

### 4.3 Video

Fields:
- id (PK)
- block_id (FK)
- file_path
- duration
- size

---

## 5. Plugin-Specific Entities

### 5.1 Visits

Fields:
- id (PK)
- page_id (FK)
- ip_address
- user_agent
- visited_at

[ES] Los datos se almacenan con criterios de privacidad.

---

### 5.2 HeatmapEvents

Fields:
- id (PK)
- page_id (FK)
- x_position
- y_position
- created_at

[ES] No se almacena información personal del usuario.

---

### 5.3 Backups

Fields:
- id (PK)
- executed_at
- type
- status
- file_path

---

### 5.4 InboxMessages

Fields:
- id (PK)
- sender_email
- subject
- message_body
- received_at
- responded_at

---

## 6. Constraints and Integrity

- All foreign keys must enforce referential integrity
- Deletions must be controlled (soft delete where applicable)
- Indexes required on:
  - slug
  - foreign keys
  - date fields used in filters

[ES] La integridad se asegura en la base de datos, no solo en el código.

---

## 7. ORM Mapping Rules

- Each entity must map to a single table
- No lazy schema changes allowed
- Migrations must be versioned

[ES] Cambios directos en producción están prohibidos.

---

## Document Status

- Version: 1.0
- Status: Approved Data Model Baseline
- File: /docs/02_data_model.md

[ES] Este documento habilita la implementación SQL.
