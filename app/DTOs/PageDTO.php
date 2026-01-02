<?php

namespace App\DTOs;

use App\DTOs\BlockDTO;

/**
 * Data Transfer Object que define la estructura de una página para el frontend.
 * 
 * Este contrato asegura una estructura estable y predecible para el consumo del frontend.
 */
class PageDTO
{
    /**
     * Slug identificador único de la página.
     * @var string
     */
    public string $slug;

    /**
     * Título de la página.
     * @var string
     */
    public string $title;

    /**
     * Bloques contenidos en la página.
     * @var BlockDTO[]
     */
    public array $blocks = [];

    /**
     * Constructor para inicializar la página.
     * 
     * @param string $slug
     * @param string $title
     * @param BlockDTO[] $blocks
     */
    public function __construct(string $slug, string $title, array $blocks = [])
    {
        $this->slug = $slug;
        $this->title = $title;
        $this->blocks = $blocks;
    }
}
