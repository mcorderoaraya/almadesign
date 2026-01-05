<?php
declare(strict_types=1);

namespace App\Application;

use App\DTO\GetUserRequestDTO;
use App\Repositories\UserRepositoryInterface;
use App\Exceptions\DomainException;

/**
 * GetUserUseCase
 *
 * ES:
 * Caso de uso desacoplado de la persistencia.
 */
final class GetUserUseCase implements UseCaseInterface
{
    private UserRepositoryInterface $users;

    public function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    public function execute(object $input): UseCaseResult
    {
        if (!$input instanceof GetUserRequestDTO) {
            throw new \InvalidArgumentException('Invalid input DTO');
        }

        $user = $this->users->findById($input->userId);

        if ($user === null) {
            throw new DomainException('User not found');
        }

        return UseCaseResult::success($user);
    }
}