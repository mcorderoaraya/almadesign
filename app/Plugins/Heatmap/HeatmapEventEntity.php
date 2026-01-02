<?php

namespace App\Plugins\Heatmap;

use App\Entities\BaseEntity;

/**
 * Representa un evento individual de heatmap.
 * 
 * Esta entidad contiene las coordenadas de interacción del mouse en una página específica,
 * junto con la marca de tiempo de creación.
 * 
 * Consideraciones de rendimiento:
 * - Se espera un alto volumen de eventos, por lo que esta entidad es ligera y sin lógica de persistencia.
 * - No se almacenan datos adicionales para minimizar el impacto en la base de datos.
 */
class HeatmapEventEntity extends BaseEntity
{
    /**
     * Identificador único del evento.
     * @var int|null
     */
    public ?int $id = null;

    /**
     * Identificador de la página donde ocurrió el evento.
     * @var int
     */
    public int $page_id;

    /**
     * Posición X del cursor en la página.
     * @var float
     */
    public float $x_position;

    /**
     * Posición Y del cursor en la página.
     * @var float
     */
    public float $y_position;

    /**
     * Fecha y hora en que se creó el evento.
     * @var string
     */
    public string $created_at;
}
