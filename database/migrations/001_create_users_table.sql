-- Migration: 001_create_users_table
-- Description: Tabla base de usuarios administrativos
-- Charset: utf8mb4 / Collation: utf8mb4_unicode_ci
-- Version: 1.0 (aprobado en docs/02_data_model.md)

CREATE TABLE IF NOT EXISTS users (
    id            INT UNSIGNED        AUTO_INCREMENT PRIMARY KEY,
    name          VARCHAR(255)        NOT NULL,
    email         VARCHAR(255)        NOT NULL,
    password_hash VARCHAR(255)        NOT NULL,
    role          ENUM('admin','editor','viewer') NOT NULL DEFAULT 'viewer',
    status        ENUM('active','inactive','banned') NOT NULL DEFAULT 'active',
    created_at    DATETIME            NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at    DATETIME            NOT NULL DEFAULT CURRENT_TIMESTAMP
                                      ON UPDATE CURRENT_TIMESTAMP,

    UNIQUE KEY uq_users_email (email),
    INDEX idx_users_role   (role),
    INDEX idx_users_status (status)

) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_unicode_ci;
