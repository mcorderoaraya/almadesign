<?php

namespace App\Plugins\Backup;

/**
 * Servicio para manejar la configuración de backups programados.
 * 
 * Almacena la fecha y hora deseada para la ejecución futura.
 * Valida el formato de programación (placeholder).
 * No ejecuta backups.
 */
class BackupSchedulerService
{
    /**
     * @var BackupRepository
     */
    private BackupRepository $repository;

    public function __construct(BackupRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Programa un backup para una fecha y hora específicas.
     * 
     * @param string $scheduledAt Fecha y hora programada (formato ISO 8601).
     * @return void
     * 
     * @throws \InvalidArgumentException Si el formato de fecha es inválido.
     */
    public function scheduleBackup(string $scheduledAt): void
    {
        // Validación básica placeholder del formato ISO 8601
        if (false === strtotime($scheduledAt)) {
            throw new \InvalidArgumentException('Formato de fecha programada inválido.');
        }

        $backup = new BackupEntity();
        $backup->type = 'scheduled';
        $backup->status = 'pending';
        $backup->scheduled_at = $scheduledAt;
        $backup->executed_at = null;
        $backup->file_path = null;

        $this->repository->createBackupRecord($backup);
    }
}
