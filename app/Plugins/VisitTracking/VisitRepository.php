<?php
/**
 * Repositorio para manejo de visitas.
 * Extiende BaseRepository.
 * Métodos placeholder para recordVisit, countByPage y countByDate.
 * No contiene lógica SQL.
 */

namespace App\Plugins\VisitTracking;

use App\Repositories\BaseRepository;

class VisitRepository extends BaseRepository
{
    /**
     * Registra una nueva visita.
     * 
     * @param VisitEntity $visit
     * @return void
     */
    public function recordVisit(VisitEntity $visit): void
    {
        // Placeholder: implementar registro de visita usando ORM
    }

    /**
     * Cuenta visitas por página.
     * 
     * @param int $pageId
     * @return int
     */
    public function countByPage(int $pageId): int
    {
        // Placeholder: implementar conteo de visitas por página usando ORM
        return 0;
    }

    /**
     * Cuenta visitas por fecha.
     * 
     * @param string $date Fecha en formato YYYY-MM-DD
     * @return int
     */
    public function countByDate(string $date): int
    {
        // Placeholder: implementar conteo de visitas por fecha usando ORM
        return 0;
    }
}
