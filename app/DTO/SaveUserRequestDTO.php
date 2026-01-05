<?php
declare(strict_types=1);

namespace App\DTO;

use App\Http\Request;

/**
 * SaveUserRequestDTO
 *
 * ES:
 * - DTO de entrada para crear / actualizar usuario
 * - Ya llega validado por middleware
 */
final class SaveUserRequestDTO extends BaseRequestDTO
{
    public string $email;
    public string $name;
    public ?int $id;

    private function __construct(?int $id, string $email, string $name)
    {
        $this->id    = $id;
        $this->email = $email;
        $this->name  = $name;
    }

    public static function fromRequest(Request $request): self
    {
        return new self(
            $request->routeParam('id'),
            $request->input('email'),
            $request->input('name')
        );
    }
}