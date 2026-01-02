<?php
/**
 * Middleware para protección CSRF.
 * Aplica a métodos POST, PUT, PATCH y DELETE.
 * Bloquea la solicitud si el token CSRF es inválido o está ausente.
 * No realiza redirecciones.
 */

namespace App\Middleware;

use App\Services\CsrfService;

class CsrfMiddleware
{
    protected CsrfService $csrfService;

    public function __construct(CsrfService $csrfService)
    {
        $this->csrfService = $csrfService;
    }

    /**
     * Maneja la validación del token CSRF en la solicitud.
     * 
     * @return void
     * @throws \Exception Si el token CSRF es inválido o ausente.
     */
    public function handle(): void
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $methodsToCheck = ['POST', 'PUT', 'PATCH', 'DELETE'];

        if (in_array($method, $methodsToCheck, true)) {
            $token = $_POST['_csrf_token'] ?? null;
            if (!$this->csrfService->validateToken($token)) {
                throw new \Exception('Token CSRF inválido o ausente.', 403);
            }
        }
    }
}
