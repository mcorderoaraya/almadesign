<?php

namespace App\Controllers;

use App\Services\ContentService;

/**
 * Controlador de solo lectura para exponer endpoints de contenido estructurado.
 * 
 * Expone endpoints para obtener página por slug y contenido de la página principal.
 * Delegar toda la lógica a ContentService.
 * Retorna arrays estructurados listos para codificación JSON.
 */
class ContentController
{
    /**
     * @var ContentService
     */
    private ContentService $contentService;

    public function __construct(ContentService $contentService)
    {
        $this->contentService = $contentService;
    }

    /**
     * Endpoint para obtener contenido de página por slug.
     * 
     * @param string $slug
     * @return array
     */
    public function getPageBySlug(string $slug): array
    {
        return $this->contentService->getPageContentBySlug($slug);
    }

    /**
     * Endpoint para obtener contenido de la página principal.
     * 
     * @return array
     */
    public function getHomepageContent(): array
    {
        return $this->contentService->getHomepageContent();
    }
}
