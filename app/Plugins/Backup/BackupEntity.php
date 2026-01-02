<?php

namespace App\Plugins\Backup;

use App\Entities\BaseEntity;

/**
 * Representa un registro de backup.
 * 
 * Ciclo de vida de un backup:
 * - type: indica si es manual o programado.
 * - scheduled_at: fecha y hora programada para ejecución (si aplica).
 * - executed_at: fecha y hora en que se ejecutó el backup.
 * - status: estado actual del backup (pendiente, en progreso, completado, fallido).
 * - file_path: ruta del archivo generado (si aplica).
 * 
 * No contiene lógica de sistema de archivos.
 */
class BackupEntity extends BaseEntity
{
    /**
     * Identificador único del backup.
     * @var int|null
     */
    public ?int $id = null;

    /**
     * Tipo de backup: manual o scheduled.
     * @var string
     */
    public string $type;

    /**
     * Fecha y hora programada para el backup (ISO 8601).
     * @var string|null
     */
    public ?string $scheduled_at = null;

    /**
     * Fecha y hora en que se ejecutó el backup (ISO 8601).
     * @var string|null
     */
    public ?string $executed_at = null;

    /**
     * Estado actual del backup.
     * @var string
     */
    public string $status;

    /**
     * Ruta del archivo generado por el backup.
     * @var string|null
     */
    public ?string $file_path = null;
}
