<?php
declare(strict_types=1);

namespace App\Exceptions;

/**
 * DomainException
 *
 * EN:
 * Base exception for all domain-level errors.
 *
 * ES:
 * Excepción base para todos los errores de dominio.
 * No conoce HTTP ni Response.
 * Solo comunica intención.
 */
abstract class DomainException extends \RuntimeException
{
    /**
     * Código interno del dominio (NO HTTP).
     */
    protected string $domainCode;

    public function getDomainCode(): string
    {
        return $this->domainCode;
    }
}