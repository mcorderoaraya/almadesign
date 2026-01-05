<?php
declare(strict_types=1);

use App\Repositories\MySQL\MySQLUserRepository;
use App\Entities\User;

/**
 * UserRepositoryInterface
 *
 * ES:
 * - Define operaciones de lectura y escritura
 * - El dominio depende de esta interface, no de la DB
 */
interface UserRepositoryInterface
{
    /** Persistencia */
    public function save(User $user): User;
    public function update(User $user): User;

    /** Lectura */
    public function findById(int $id): ?User;
}