<?php
/**
 * Servicio fachada para el plugin Visit Tracking.
 * Coordina VisitService.
 * Punto de entrada para controladores o middleware futuros.
 */

namespace App\Plugins\VisitTracking;

class VisitTrackingService
{
    protected VisitService $visitService;

    public function __construct(VisitService $visitService)
    {
        $this->visitService = $visitService;
    }

    /**
     * Registra una visita a una página.
     * 
     * @param int $pageId
     * @return void
     */
    public function registerVisit(int $pageId): void
    {
        $this->visitService->registerVisit($pageId);
    }
}
