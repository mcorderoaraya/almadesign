<?php
declare(strict_types=1);

namespace App\Entities;

/**
 * User (Entidad de Dominio)
 *
 * ES:
 * - Representa el estado válido de un usuario
 * - No sabe persistirse
 * - No conoce HTTP, DB ni frameworks
 */
final class User
{
    private ?int $id;
    private string $email;
    private string $name;

    public function __construct(?int $id, string $email, string $name)
    {
        $this->id    = $id;
        $this->email = $email;
        $this->name  = $name;
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function name(): string
    {
        return $this->name;
    }

    /**
     * ES:
     * Retorna una nueva instancia con ID asignado
     * (útil tras un INSERT)
     */
    public function withId(int $id): self
    {
        return new self($id, $this->email, $this->name);
    }
}