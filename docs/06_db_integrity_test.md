Database Schema and Integrity Testing
TASK-051 – Database Integrity Validation (MySQL 8.x)

[ES] Este documento define el protocolo oficial de QA para validar la integridad estructural,
[ES] relacional y lógica de la base de datos MySQL 8.x.
[ES] Es un documento normativo. No propone, valida.
[ES] Si alguna prueba falla, el flujo de trabajo se detiene inmediatamente.

================================================================================
1. PURPOSE OF THIS DOCUMENT
================================================================================

This document defines the database integrity testing process to ensure that
the database schema is structurally correct, internally consistent, and
resistant to invalid data states.

The database must enforce correctness independently of application logic.

[ES] El objetivo no es verificar si la aplicación “funciona”.
[ES] El objetivo es garantizar que la base de datos no pueda corromperse,
[ES] incluso si el backend comete errores.

================================================================================
2. SCOPE OF TESTING
================================================================================

Included in scope:
- Tables and schema structure
- Column definitions and data types
- Primary keys
- Foreign keys and relationships
- Constraints (NOT NULL, UNIQUE, DEFAULT)
- CRUD behavior with valid and invalid data

Explicitly excluded from scope:
- Performance optimization
- Load or stress testing
- Security testing (handled in TASK-052)
- Backup and recovery testing

[ES] Si una prueba no está dentro de este alcance,
[ES] no debe ejecutarse en esta tarea.

================================================================================
3. PRECONDITIONS
================================================================================

Before executing any test:
- MySQL version must be 8.x
- Final schema must be deployed
- No pending migrations
- Test database must be isolated from production
- QA must have read/write access

[ES] Ejecutar pruebas de integridad sobre producción
[ES] es una violación grave del proceso.

================================================================================
4. SCHEMA STRUCTURE VALIDATION
================================================================================

Objective:
Ensure that the physical schema matches the approved data model.

Validation steps:
- List all tables.
- Verify that every table is documented.
- Verify that no undocumented tables exist.

Example commands:
SHOW TABLES;
DESCRIBE table_name;

Acceptance criteria:
- All documented tables exist.
- No undocumented tables exist.
- Column names and data types match documentation.

[ES] Una tabla extra o un campo no documentado
[ES] es una desviación estructural y debe corregirse.

================================================================================
5. PRIMARY KEY VALIDATION
================================================================================

Objective:
Ensure that every table has a stable and enforceable primary key.

Validation rules:
- Every table must have exactly one primary key.
- Primary keys must be immutable.
- AUTO_INCREMENT is allowed when appropriate.
- Composite primary keys are forbidden unless explicitly documented.

Acceptance criteria:
- No table without a primary key.
- No undocumented composite keys.

[ES] Sin clave primaria no hay integridad,
[ES] no hay relaciones confiables ni escalabilidad.

================================================================================
6. FOREIGN KEY AND RELATIONSHIP VALIDATION
================================================================================

Objective:
Ensure referential integrity between related tables.

Validation rules:
- All documented relationships must be enforced via FOREIGN KEY constraints.
- Foreign keys must reference valid primary keys.
- ON DELETE and ON UPDATE behavior must be documented and intentional.

Example command:
SHOW CREATE TABLE table_name;

Acceptance criteria:
- No logical relationships without physical constraints.
- No orphan records allowed.

[ES] Relaciones lógicas sin FOREIGN KEY físico
[ES] son inaceptables en un sistema gobernado.

================================================================================
7. CONSTRAINT VALIDATION
================================================================================

Objective:
Ensure that invalid data states are blocked at the database level.

Validation rules:
- Required fields must be NOT NULL.
- Unique fields must enforce UNIQUE constraints.
- Default values must be explicit.

Acceptance criteria:
- Invalid inserts fail at database level.
- Database does not rely solely on backend validation.

[ES] La base de datos debe defenderse incluso del backend.

================================================================================
8. INDEX VALIDATION
================================================================================

Objective:
Ensure indexes exist where required for integrity.

Validation rules:
- Primary keys must be indexed.
- Foreign keys must be indexed.
- Unique constraints must have supporting indexes.

Acceptance criteria:
- No missing indexes for relational integrity.

[ES] Aquí no se valida rendimiento,
[ES] se valida consistencia estructural.

================================================================================
9. CRUD INTEGRITY TESTING
================================================================================

Objective:
Validate behavior during CRUD operations.

Test cases:
- INSERT valid data must succeed
- INSERT invalid data must fail
- UPDATE valid data must succeed
- UPDATE invalid data must fail
- DELETE parent records must respect FK rules

Acceptance criteria:
- Database rejects invalid operations
- No silent failures
- Errors are generated

[ES] La base de datos no debe confiar en la aplicación.

================================================================================
10. DATA CONSISTENCY VERIFICATION
================================================================================

Objective:
Ensure existing data does not violate integrity rules.

Validation rules:
- No orphan records
- No duplicated logical entities
- No inconsistent relationships

Example check:
SELECT * FROM child_table
WHERE foreign_key NOT IN (SELECT id FROM parent_table);

Acceptance criteria:
- Result sets must be empty

[ES] Datos inconsistentes indican fallas previas
[ES] que deben corregirse antes de continuar.

================================================================================
11. ERROR HANDLING AND FEEDBACK
================================================================================

Objective:
Ensure database errors are explicit and traceable.

Validation rules:
- Constraint violations must raise errors
- Silent failures are forbidden
- Errors must be traceable

Acceptance criteria:
- Errors are visible to QA
- No operation fails silently

[ES] Un error silencioso es una falla crítica.

================================================================================
12. TEST RESULTS AND REPORTING
================================================================================

Test execution result:
- PASSED
- FAILED

If FAILED:
- Issues must be documented
- Workflow must stop

[ES] QA no avanza si falla.
[ES] Se corrige antes de continuar.

================================================================================
13. APPROVAL AND GOVERNANCE
================================================================================

Executed by:
- QA Engineer

Reviewed by:
- Project Manager

Approval status:
- Pending
- Approved

Next task dependency:
- TASK-052 – Test backend security and logic

[ES] Sin esta aprobación,
[ES] no se permite continuar el proceso.

================================================================================
END OF DOCUMENT
================================================================================