<?php
declare(strict_types=1);

namespace App\DTO;

use App\Http\Request;

/**
 * GetUserRequestDTO
 *
 * EN:
 * Typed input for "Get User" use case.
 *
 * ES:
 * DTO explícito para el caso de uso "obtener usuario".
 */
final class GetUserRequestDTO extends BaseRequestDTO
{
    public int $userId;

    private function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    /**
     * ES:
     * Construcción explícita desde Request.
     * Aquí NO se valida, solo se mapea.
     */
    public static function fromRequest(Request $request): static
    {
        return new self(
            (int)$request->routeParam('id')
        );
    }
}