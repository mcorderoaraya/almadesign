<?php
/**
 * Entidad que representa un bloque de contenido.
 * Propiedades: id, page_id, type, position.
 * Extiende BaseEntity.
 * No contiene lógica de persistencia.
 */

namespace App\Plugins\PageBuilder;

use App\Entities\BaseEntity;

class BlockEntity extends BaseEntity
{
    /**
     * Identificador único del bloque.
     * 
     * @var int|null
     */
    public ?int $id = null;

    /**
     * Identificador de la página a la que pertenece el bloque.
     * 
     * @var int
     */
    public int $page_id;

    /**
     * Tipo de bloque (ej. texto, imagen, video).
     * 
     * @var string
     */
    public string $type;

    /**
     * Posición del bloque en la página.
     * 
     * @var int
     */
    public int $position;
}
