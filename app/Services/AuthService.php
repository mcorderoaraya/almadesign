<?php
/**
 * Servicio de autenticación.
 * Maneja la verificación de credenciales, hashing de contraseñas,
 * creación y destrucción de sesiones.
 * Utiliza repositorios ORM como placeholders.
 */

namespace App\Services;

class AuthService
{
    protected $userRepository;

    /**
     * Constructor que recibe el repositorio de usuarios.
     * 
     * @param mixed $userRepository Repositorio ORM para usuarios.
     */
    public function __construct($userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Verifica las credenciales del usuario.
     * 
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function verifyCredentials(string $email, string $password): bool
    {
        // Placeholder: obtener usuario por email usando ORM
        $user = $this->userRepository->findByEmail($email);

        if (!$user) {
            return false;
        }

        // Verificar hash de contraseña
        return password_verify($password, $user->password_hash);
    }

    /**
     * Crea una sesión segura para el usuario autenticado.
     * 
     * @param int $userId
     * @return void
     */
    public function createSession(int $userId): void
    {
        session_name('APP_SESSION');
        session_start();
        session_regenerate_id(true);
        $_SESSION['user_id'] = $userId;
        $_SESSION['logged_in'] = true;
        $_SESSION['login_time'] = time();
    }

    /**
     * Destruye la sesión actual.
     * 
     * @return void
     */
    public function destroySession(): void
    {
        session_start();
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
    }
}
