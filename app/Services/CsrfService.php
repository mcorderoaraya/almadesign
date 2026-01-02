<?php
/**
 * Servicio para manejo de tokens CSRF.
 * Genera, almacena y valida tokens criptográficamente seguros.
 * La longitud del token es configurable.
 */

namespace App\Services;

class CsrfService
{
    protected string $sessionKey;
    protected int $tokenLength;

    public function __construct(string $sessionKey, int $tokenLength)
    {
        $this->sessionKey = $sessionKey;
        $this->tokenLength = $tokenLength;
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Genera un token CSRF seguro y lo almacena en sesión.
     * 
     * @return string El token generado.
     */
    public function generateToken(): string
    {
        $token = bin2hex(random_bytes($this->tokenLength));
        $_SESSION[$this->sessionKey] = $token;
        return $token;
    }

    /**
     * Valida el token CSRF recibido contra el almacenado en sesión.
     * 
     * @param string|null $token Token recibido en la solicitud.
     * @return bool Verdadero si el token es válido, falso en caso contrario.
     */
    public function validateToken(?string $token): bool
    {
        if (empty($token) || empty($_SESSION[$this->sessionKey])) {
            return false;
        }
        return hash_equals($_SESSION[$this->sessionKey], $token);
    }
}
