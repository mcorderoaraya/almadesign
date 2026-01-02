<?php
/**
 * Middleware para verificar permisos basados en roles.
 * Usa datos de rol almacenados en la sesión.
 * Bloquea acceso si el usuario no tiene permisos.
 */

namespace App\Middleware;

class RoleMiddleware
{
    protected array $allowedRoles;

    /**
     * Constructor que recibe los roles permitidos para la ruta.
     * 
     * @param array $allowedRoles
     */
    public function __construct(array $allowedRoles)
    {
        $this->allowedRoles = $allowedRoles;
    }

    /**
     * Verifica si el usuario tiene rol autorizado.
     * 
     * @return void
     * @throws \Exception Si el usuario no tiene permisos.
     */
    public function handle(): void
    {
        session_start();
        if (empty($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            throw new \Exception('Acceso denegado: usuario no autenticado.');
        }

        if (empty($_SESSION['user_role']) || !in_array($_SESSION['user_role'], $this->allowedRoles, true)) {
            throw new \Exception('Acceso denegado: usuario sin permisos suficientes.');
        }
    }
}
