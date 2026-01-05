<?php
declare(strict_types=1);

namespace App\Application;

use App\Repositories\UserRepositoryInterface;
use App\DTO\SaveUserRequestDTO;
use App\Entities\User;

/**
 * SaveUserUseCase
 *
 * ES:
 * - Orquesta escritura
 * - Decide si crear o actualizar
 * - No conoce HTTP ni DB
 */
final class SaveUserUseCase
{
    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(SaveUserRequestDTO $dto): User
    {
        $user = new User(
            $dto->id,
            $dto->email,
            $dto->name
        );

        if ($user->id() === null) {
            return $this->repository->save($user);
        }

        return $this->repository->update($user);
    }
}