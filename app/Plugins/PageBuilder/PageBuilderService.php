<?php
/**
 * Servicio fachada para el plugin Page Builder.
 * Coordina PageService y BlockService.
 * Punto de entrada para controladores futuros.
 */

namespace App\Plugins\PageBuilder;

class PageBuilderService
{
    protected PageService $pageService;
    protected BlockService $blockService;

    public function __construct(PageService $pageService, BlockService $blockService)
    {
        $this->pageService = $pageService;
        $this->blockService = $blockService;
    }

    /**
     * Crea una nueva página.
     * 
     * @param PageEntity $page
     * @return void
     */
    public function createPage(PageEntity $page): void
    {
        $this->pageService->createPage($page);
    }

    /**
     * Actualiza una página existente.
     * 
     * @param PageEntity $page
     * @return void
     */
    public function updatePage(PageEntity $page): void
    {
        $this->pageService->updatePage($page);
    }

    /**
     * Cambia el estado de una página.
     * 
     * @param int $pageId
     * @param string $newStatus
     * @return void
     */
    public function changePageStatus(int $pageId, string $newStatus): void
    {
        $this->pageService->changePageStatus($pageId, $newStatus);
    }

    /**
     * Añade un bloque a una página.
     * 
     * @param BlockEntity $block
     * @return void
     */
    public function addBlock(BlockEntity $block): void
    {
        $this->blockService->addBlock($block);
    }

    /**
     * Reordena los bloques de una página.
     * 
     * @param int $pageId
     * @param array $orderedBlockIds
     * @return void
     */
    public function reorderBlocks(int $pageId, array $orderedBlockIds): void
    {
        $this->blockService->reorderBlocks($pageId, $orderedBlockIds);
    }

    /**
     * Elimina un bloque.
     * 
     * @param int $blockId
     * @return void
     */
    public function removeBlock(int $blockId): void
    {
        $this->blockService->removeBlock($blockId);
    }
}
