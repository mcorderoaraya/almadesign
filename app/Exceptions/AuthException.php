<?php
declare(strict_types=1);

namespace App\Exceptions;

/**
 * AuthException
 *
 * EN:
 * Represents authentication or authorization failures.
 *
 * ES:
 * Representa fallos de autenticación o autorización.
 */
final class AuthException extends DomainException
{
    /**
     * @param string $code 'UNAUTHORIZED' | 'FORBIDDEN'
     */
    public function __construct(string $code = 'UNAUTHORIZED')
    {
        parent::__construct('Authentication/Authorization error');
        $this->domainCode = $code;
    }
}