<?php
/**
 * Servicio para manejo de páginas.
 * Coordina creación, actualización y cambio de estado.
 * Llama a repositorios sin lógica de validación.
 */

namespace App\Plugins\PageBuilder;

class PageService
{
    protected PageRepository $pageRepository;

    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * Crea una nueva página.
     * 
     * @param PageEntity $page
     * @return void
     */
    public function createPage(PageEntity $page): void
    {
        $this->pageRepository->create($page);
    }

    /**
     * Actualiza una página existente.
     * 
     * @param PageEntity $page
     * @return void
     */
    public function updatePage(PageEntity $page): void
    {
        $this->pageRepository->update($page);
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
        $page = $this->pageRepository->findById($pageId);
        if ($page) {
            $page->status = $newStatus;
            $this->pageRepository->update($page);
        }
    }
}
