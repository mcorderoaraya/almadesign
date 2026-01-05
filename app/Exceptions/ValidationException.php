<?php
declare(strict_types=1);

namespace App\Exceptions;

/**
 * ValidationException
 *
 * EN:
 * Thrown when request data violates validation rules.
 *
 * ES:
 * Se lanza cuando los datos no cumplen reglas de validación.
 */
final class ValidationException extends DomainException
{
    /** @var array<string,string> */
    private array $errors;

    /**
     * @param array<string,string> $errors
     */
    public function __construct(array $errors)
    {
        parent::__construct('Validation failed');
        $this->domainCode = 'VALIDATION_FAILED';
        $this->errors = $errors;
    }

    /**
     * Detalles de validación (seguros de exponer).
     *
     * @return array<string,string>
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}