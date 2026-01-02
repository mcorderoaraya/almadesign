<?php
/**
 * Entidad que representa una página.
 * Propiedades: id, slug, title, status, created_at, updated_at.
 * Extiende BaseEntity.
 * No contiene lógica de persistencia.
 */

namespace App\Plugins\PageBuilder;

use App\Entities\BaseEntity;

class PageEntity extends BaseEntity
{
    /**
     * Identificador único de la página.
     * 
     * @var int|null
     */
    public ?int $id = null;

    /**
     * Slug único para URL SEO-friendly.
     * 
     * @var string
     */
    public string $slug;

    /**
     * Título de la página.
     * 
     * @var string
     */
    public string $title;

    /**
     * Estado de la página (ej. publicado, borrador).
     * 
     * @var string
     */
    public string $status;

    /**
     * Fecha de creación.
     * 
     * @var string|null
     */
    public ?string $created_at = null;

    /**
     * Fecha de última actualización.
     * 
     * @var string|null
     */
    public ?string $updated_at = null;
}
