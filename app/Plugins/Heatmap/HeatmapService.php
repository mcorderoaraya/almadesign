<?php

namespace App\Plugins\Heatmap;

/**
 * Servicio para manejar el registro de eventos de heatmap.
 * 
 * Este servicio valida las coordenadas recibidas y delega la persistencia al repositorio.
 * No realiza agregaciones ni análisis de datos.
 */
class HeatmapService
{
    /**
     * @var HeatmapRepository
     */
    private HeatmapRepository $repository;

    public function __construct(HeatmapRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Registra un evento de heatmap con validación básica de coordenadas.
     * 
     * @param int $pageId Identificador de la página.
     * @param float $xPos Posición X del cursor.
     * @param float $yPos Posición Y del cursor.
     * @return void
     * 
     * @throws \InvalidArgumentException Si las coordenadas están fuera de rango.
     */
    public function registerEvent(int $pageId, float $xPos, float $yPos): void
    {
        // Validación básica placeholder: coordenadas deben estar entre 0 y 1 (normalizadas)
        if ($xPos < 0.0 || $xPos > 1.0 || $yPos < 0.0 || $yPos > 1.0) {
            throw new \InvalidArgumentException('Las coordenadas deben estar entre 0 y 1.');
        }

        $event = new HeatmapEventEntity();
        $event->page_id = $pageId;
        $event->x_position = $xPos;
        $event->y_position = $yPos;
        $event->created_at = date('c'); // Fecha ISO 8601 actual

        $this->repository->recordEvent($event);
    }
}
