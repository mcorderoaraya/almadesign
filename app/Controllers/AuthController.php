<?php
/**
 * Controlador de autenticación.
 * Expone endpoints para login y logout.
 * Delegación a AuthService sin lógica adicional.
 */

namespace App\Controllers;

use App\Services\AuthService;

class AuthController
{
    protected AuthService $authService;

    /**
     * Constructor que recibe el servicio de autenticación.
     * 
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Endpoint para login.
     * 
     * @param string $email
     * @param string $password
     * @return array Resultado del login.
     */
    public function login(string $email, string $password): array
    {
        if ($this->authService->verifyCredentials($email, $password)) {
            // Placeholder: obtener ID de usuario desde repositorio
            $userId = 1; // Este valor debe obtenerse del usuario real
            $this->authService->createSession($userId);
            return ['success' => true, 'message' => 'Login exitoso'];
        }
        return ['success' => false, 'message' => 'Credenciales inválidas'];
    }

    /**
     * Endpoint para logout.
     * 
     * @return array Resultado del logout.
     */
    public function logout(): array
    {
        $this->authService->destroySession();
        return ['success' => true, 'message' => 'Logout exitoso'];
    }
}
