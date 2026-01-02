<?php

namespace App\Plugins\Backup;

/**
 * Servicio fachada para el plugin Backup.
 * 
 * Punto de entrada para controladores futuros.
 * Coordina BackupService y BackupSchedulerService.
 */
class BackupPluginService
{
    /**
     * @var BackupService
     */
    private BackupService $backupService;

    /**
     * @var BackupSchedulerService
     */
    private BackupSchedulerService $schedulerService;

    public function __construct(BackupService $backupService, BackupSchedulerService $schedulerService)
    {
        $this->backupService = $backupService;
        $this->schedulerService = $schedulerService;
    }

    /**
     * Inicia un backup manual.
     * 
     * @return void
     */
    public function initiateManualBackup(): void
    {
        $this->backupService->initiateManualBackup();
    }

    /**
     * Programa un backup para una fecha y hora específicas.
     * 
     * @param string $scheduledAt Fecha y hora programada (formato ISO 8601).
     * @return void
     */
    public function scheduleBackup(string $scheduledAt): void
    {
        $this->schedulerService->scheduleBackup($scheduledAt);
    }
}
