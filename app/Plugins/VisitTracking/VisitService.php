<?php
/**
 * Servicio para manejo de registro de visitas.
 * Acepta identificador de página y captura metadatos de la solicitud.
 * Delegación de persistencia al repositorio.
 * Sin lógica de agregación ni limitación de tasa.
 */

namespace App\Plugins\VisitTracking;

class VisitService
{
    protected VisitRepository $visitRepository;

    public function __construct(VisitRepository $visitRepository)
    {
        $this->visitRepository = $visitRepository;
    }

    /**
     * Registra una visita a una página.
     * 
     * @param int $pageId
     * @return void
     */
    public function registerVisit(int $pageId): void
    {
        $visit = new VisitEntity();
        $visit->page_id = $pageId;
        $visit->ip_address = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $visit->user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
        $visit->visited_at = date('Y-m-d H:i:s');

        $this->visitRepository->recordVisit($visit);
    }
}
