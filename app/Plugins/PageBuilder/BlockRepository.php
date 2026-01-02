<?php
/**
 * Repositorio para manejo de bloques de contenido.
 * Extiende BaseRepository.
 * Métodos placeholder para findByPage, create, updateOrder y delete.
 * No contiene lógica SQL.
 */

namespace App\Plugins\PageBuilder;

use App\Repositories\BaseRepository;

class BlockRepository extends BaseRepository
{
    /**
     * Obtiene bloques asociados a una página.
     * 
     * @param int $pageId
     * @return BlockEntity[]
     */
    public function findByPage(int $pageId): array
    {
        // Placeholder: implementar búsqueda de bloques por página usando ORM
        return [];
    }

    /**
     * Crea un nuevo bloque.
     * 
     * @param BlockEntity $block
     * @return void
     */
    public function create(BlockEntity $block): void
    {
        // Placeholder: implementar creación usando ORM
    }

    /**
     * Actualiza el orden de los bloques.
     * 
     * @param int $pageId
     * @param array $orderedBlockIds
     * @return void
     */
    public function updateOrder(int $pageId, array $orderedBlockIds): void
    {
        // Placeholder: implementar actualización de orden usando ORM
    }

    /**
     * Elimina un bloque.
     * 
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        // Placeholder: implementar eliminación usando ORM
    }
}
