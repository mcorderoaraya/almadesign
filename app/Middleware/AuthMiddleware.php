<?php
/**
 * Middleware para verificar sesión autenticada.
 * Bloquea acceso si el usuario no está autenticado.
 * No realiza redirecciones, solo retorna estado o lanza excepción.
 */

namespace App\Middleware;

class AuthMiddleware
{
    /**
     * Verifica si la sesión está autenticada.
     * 
     * @return void
     * @throws \Exception Si no está autenticado.
     */
    public function handle(): void
    {
        session_start();
        if (empty($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            throw new \Exception('Acceso denegado: usuario no autenticado.');
        }
    }
}
