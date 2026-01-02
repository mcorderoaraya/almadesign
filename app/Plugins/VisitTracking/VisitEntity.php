<?php
/**
 * Entidad que representa una visita a una página.
 * Campos: id, page_id, ip_address, user_agent, visited_at.
 * Extiende BaseEntity.
 * Consideraciones de privacidad: solo se almacenan IP y user agent sin anonimizar.
 */

namespace App\Plugins\VisitTracking;

use App\Entities\BaseEntity;

class VisitEntity extends BaseEntity
{
    /**
     * Identificador único de la visita.
     * 
     * @var int|null
     */
    public ?int $id = null;

    /**
     * Identificador de la página visitada.
     * 
     * @var int
     */
    public int $page_id;

    /**
     * Dirección IP del visitante.
     * 
     * @var string
     */
    public string $ip_address;

    /**
     * User agent del visitante.
     * 
     * @var string
     */
    public string $user_agent;

    /**
     * Fecha y hora de la visita.
     * 
     * @var string
     */
    public string $visited_at;
}
