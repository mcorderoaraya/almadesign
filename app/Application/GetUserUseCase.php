<?php
declare(strict_types=1);

namespace App\Application;

use App\DTO\GetUserRequestDTO;
use App\Exceptions\DomainException;

/**
 * GetUserUseCase
 *
 * EN:
 * Application service for retrieving a user.
 *
 * ES:
 * Caso de uso: obtener un usuario.
 * Aquí vive la lógica de negocio.
 */
final class GetUserUseCase implements UseCaseInterface
{
    public function execute(object $input): UseCaseResult
    {
        // Defensa mínima de tipo (no debería fallar si se usa bien)
        if (!$input instanceof GetUserRequestDTO) {
            throw new \InvalidArgumentException('Invalid input DTO');
        }

        // ES:
        // Aquí normalmente llamarías a un repositorio:
        // $user = $this->userRepository->findById($input->userId);

        // Simulación simple
        $userId = $input->userId;

        // Ejemplo: usuario no encontrado
        if ($userId <= 0) {
            throw new DomainException('User not found');
        }

        return UseCaseResult::success([
            'id' => $userId,
            'name' => 'Demo User'
        ]);
    }
}