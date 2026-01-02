<?php

namespace App\Services;

use App\DTOs\PageDTO;
use App\DTOs\BlockDTO;
use App\Plugins\PageBuilder\PageBuilderService;
use App\Services\SecurityService;

/**
 * Servicio para coordinar la agregación de contenido estructurado para frontend.
 * 
 * Consume servicios de PageBuilder y aplica escape de salida para seguridad.
 * No contiene lógica de persistencia.
 */
class ContentService
{
    /**
     * @var PageBuilderService
     */
    private PageBuilderService $pageBuilderService;

    /**
     * @var SecurityService
     */
    private SecurityService $securityService;

    public function __construct(PageBuilderService $pageBuilderService, SecurityService $securityService)
    {
        $this->pageBuilderService = $pageBuilderService;
        $this->securityService = $securityService;
    }

    /**
     * Obtiene el contenido estructurado de una página por su slug.
     * 
     * @param string $slug
     * @return array Contenido estructurado listo para JSON.
     */
    public function getPageContentBySlug(string $slug): array
    {
        $pageEntity = $this->pageBuilderService->getPageBySlug($slug);
        if (!$pageEntity) {
            return [];
        }

        $blocks = $this->pageBuilderService->getBlocksByPageId($pageEntity->id);

        $blockDTOs = [];
        foreach ($blocks as $block) {
            $blockDTOs[] = new BlockDTO(
                $this->securityService->escape($block->type),
                (int)$block->position,
                $this->normalizeContent($block->content)
            );
        }

        $pageDTO = new PageDTO(
            $this->securityService->escape($pageEntity->slug),
            $this->securityService->escape($pageEntity->title),
            $blockDTOs
        );

        return $this->dtoToArray($pageDTO);
    }

    /**
     * Obtiene el contenido estructurado de la página principal.
     * 
     * @return array Contenido estructurado listo para JSON.
     */
    public function getHomepageContent(): array
    {
        $homepageSlug = $this->pageBuilderService->getHomepageSlug();
        return $this->getPageContentBySlug($homepageSlug);
    }

    /**
     * Normaliza el contenido del bloque para salida segura.
     * 
     * @param mixed $content
     * @return mixed
     */
    private function normalizeContent($content)
    {
        // Placeholder para normalización y escape adicional si es necesario
        if (is_string($content)) {
            return $this->securityService->escape($content);
        }
        if (is_array($content)) {
            $escaped = [];
            foreach ($content as $key => $value) {
                $escaped[$key] = $this->normalizeContent($value);
            }
            return $escaped;
        }
        return $content;
    }

    /**
     * Convierte un DTO a array recursivamente para JSON.
     * 
     * @param mixed $dto
     * @return array
     */
    private function dtoToArray($dto): array
    {
        if (is_array($dto)) {
            $result = [];
            foreach ($dto as $item) {
                $result[] = $this->dtoToArray($item);
            }
            return $result;
        }
        if (is_object($dto)) {
            $result = [];
            foreach (get_object_vars($dto) as $key => $value) {
                $result[$key] = $this->dtoToArray($value);
            }
            return $result;
        }
        return $dto;
    }
}
