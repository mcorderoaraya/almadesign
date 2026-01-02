<?php

namespace App\Plugins\Backup;

/**
 * Servicio para manejar la iniciación manual de backups.
 * 
 * Crea registros de backup sin ejecutar lógica de sistema de archivos ni dumps.
 */
class BackupService
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
     * Inicia un backup manual creando un registro correspondiente.
     * 
     * @return void
     */
    public function initiateManualBackup(): void
    {
        $backup = new BackupEntity();
        $backup->type = 'manual';
        $backup->status = 'pending';
        $backup->scheduled_at = null;
        $backup->executed_at = null;
        $backup->file_path = null;

        $this->repository->createBackupRecord($backup);
    }
}
