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
final class SaveUserUseCase implements UseCaseInterface
{
    public function __construct(
        private UserRepositoryInterface $repository
    ) {}

    public function execute(object $input): UseCaseResult
    {
        if (!$input instanceof SaveUserRequestDTO) {
            throw new \InvalidArgumentException('Invalid input DTO');
        }

        $user = new User(
            $input->id,
            $input->email,
            $input->name
        );

        $saved = ($user->id() === null)
            ? $this->repository->save($user)
            : $this->repository->update($user);

        return UseCaseResult::success([
            'id'    => $saved->id(),
            'email' => $saved->email(),
            'name'  => $saved->name(),
        ]);
    }
}