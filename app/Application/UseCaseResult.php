<?php
declare(strict_types=1);

namespace App\Application;

/**
 * UseCaseResult
 *
 * EN:
 * Standard result returned by use cases.
 *
 * ES:
 * Resultado estándar de un caso de uso.
 * No es Response. No conoce HTTP.
 */
final class UseCaseResult
{
    private bool $success;
    private array $data;

    private function __construct(bool $success, array $data = [])
    {
        $this->success = $success;
        $this->data = $data;
    }

    public static function success(array $data = []): self
    {
        return new self(true, $data);
    }

    public static function failure(array $data = []): self
    {
        return new self(false, $data);
    }

    public function isSuccess(): bool
    {
        return $this->success;
    }

    public function data(): array
    {
        return $this->data;
    }
}