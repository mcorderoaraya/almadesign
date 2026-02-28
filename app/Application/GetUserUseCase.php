<?php
declare(strict_types=1);

namespace App\Application;

use App\DTO\GetUserRequestDTO;
use App\Exceptions\DomainException;
use App\Repositories\UserRepositoryInterface;

/**
 * GetUserUseCase
 *
 * EN:
 * Application service for retrieving a single user by ID.
 *
 * ES:
 * - Recibe GetUserRequestDTO
 * - Consulta el repositorio
 * - Lanza DomainException si no existe
 * - No conoce HTTP ni PDO directamente
 */
final class GetUserUseCase implements UseCaseInterface
{
    public function __construct(
        private UserRepositoryInterface $users
    ) {}

    public function execute(object $input): UseCaseResult
    {
        if (!$input instanceof GetUserRequestDTO) {
            throw new \InvalidArgumentException('Invalid input DTO');
        }

        $user = $this->users->findById($input->userId);

        if ($user === null) {
            throw new DomainException('User not found');
        }

        return UseCaseResult::success([
            'id'    => $user->id(),
            'email' => $user->email(),
            'name'  => $user->name(),
        ]);
    }
}
