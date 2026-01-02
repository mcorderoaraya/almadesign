<?php
/**
 * Servicio para manejo de bloques de contenido.
 * Maneja adición, reordenamiento y eliminación de bloques.
 * El control de posición es manejado por el backend.
 */

namespace App\Plugins\PageBuilder;

class BlockService
{
    protected BlockRepository $blockRepository;

    public function __construct(BlockRepository $blockRepository)
    {
        $this->blockRepository = $blockRepository;
    }

    /**
     * Añade un bloque a una página.
     * 
     * @param BlockEntity $block
     * @return void
     */
    public function addBlock(BlockEntity $block): void
    {
        $this->blockRepository->create($block);
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
        $this->blockRepository->updateOrder($pageId, $orderedBlockIds);
    }

    /**
     * Elimina un bloque.
     * 
     * @param int $blockId
     * @return void
     */
    public function removeBlock(int $blockId): void
    {
        $this->blockRepository->delete($blockId);
    }
}
