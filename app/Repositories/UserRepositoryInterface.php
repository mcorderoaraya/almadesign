<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Entities\User;

/**
 * UserRepositoryInterface
 *
 * ES:
 * - Define operaciones de lectura y escritura para User
 * - El dominio depende de esta interface, no de la implementación concreta
 */
interface UserRepositoryInterface
{
    /** Persistencia */
    public function save(User $user): User;
    public function update(User $user): User;

    /** Lectura */
    public function findById(int $id): ?User;
}
