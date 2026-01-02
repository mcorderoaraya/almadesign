<?php

namespace App\Plugins\Heatmap;

use App\Repositories\BaseRepository;

/**
 * Repositorio para la gestión de eventos de heatmap.
 * 
 * Contiene métodos para registrar y consultar eventos de interacción del mouse.
 * 
 * Uso esperado:
 * - recordEvent: para almacenar un nuevo evento de heatmap.
 * - findByPage: para recuperar eventos asociados a una página específica.
 * - findByDateRange: para obtener eventos dentro de un rango de fechas.
 * 
 * Nota: No contiene lógica SQL ni de persistencia directa, solo definiciones de métodos.
 */
class HeatmapRepository extends BaseRepository
{
    /**
     * Registra un evento de heatmap.
     * 
     * @param HeatmapEventEntity $event Evento a registrar.
     * @return void
     */
    public function recordEvent(HeatmapEventEntity $event): void
    {
        // Método placeholder para registrar evento
    }

    /**
     * Obtiene eventos de heatmap por identificador de página.
     * 
     * @param int $pageId Identificador de la página.
     * @return HeatmapEventEntity[] Lista de eventos.
     */
    public function findByPage(int $pageId): array
    {
        // Método placeholder para obtener eventos por página
        return [];
    }

    /**
     * Obtiene eventos de heatmap dentro de un rango de fechas.
     * 
     * @param string $startDate Fecha de inicio (formato ISO 8601).
     * @param string $endDate Fecha de fin (formato ISO 8601).
     * @return HeatmapEventEntity[] Lista de eventos.
     */
    public function findByDateRange(string $startDate, string $endDate): array
    {
        // Método placeholder para obtener eventos por rango de fechas
        return [];
    }
}
