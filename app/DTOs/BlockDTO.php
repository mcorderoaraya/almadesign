<?php

namespace App\DTOs;

/**
 * Data Transfer Object que define la estructura de un bloque para el frontend.
 * 
 * Contiene tipo, posición y contenido normalizado para asegurar un contrato estable.
 */
class BlockDTO
{
    /**
     * Tipo de bloque.
     * @var string
     */
    public string $type;

    /**
     * Posición del bloque en la página.
     * @var int
     */
    public int $position;

    /**
     * Contenido normalizado del bloque.
     * @var mixed
     */
    public $content;

    /**
     * Constructor para inicializar el bloque.
     * 
     * @param string $type
     * @param int $position
     * @param mixed $content
     */
    public function __construct(string $type, int $position, $content)
    {
        $this->type = $type;
        $this->position = $position;
        $this->content = $content;
    }
}
