<?php

namespace App\Plugins\Heatmap;

/**
 * Servicio fachada para el plugin Heatmap.
 * 
 * Punto de entrada para controladores o middleware futuros.
 * Coordina únicamente el servicio HeatmapService.
 */
class HeatmapPluginService
{
    /**
     * @var HeatmapService
     */
    private HeatmapService $heatmapService;

    public function __construct(HeatmapService $heatmapService)
    {
        $this->heatmapService = $heatmapService;
    }

    /**
     * Registra un evento de heatmap.
     * 
     * @param int $pageId Identificador de la página.
     * @param float $xPos Posición X del cursor.
     * @param float $yPos Posición Y del cursor.
     * @return void
     */
    public function registerHeatmapEvent(int $pageId, float $xPos, float $yPos): void
    {
        $this->heatmapService->registerEvent($pageId, $xPos, $yPos);
    }
}
