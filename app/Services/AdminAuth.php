<?php
declare(strict_types=1);

namespace App\Services;

use PDO;

// Servicio de autenticación del dashboard: contraseña + segundo factor TOTP.
final class AdminAuth
{
    public function __construct(private readonly PDO $pdo)
    {
    }

    public function findByEmail(string $email): ?array
    {
        $statement = $this->pdo->prepare('SELECT * FROM admin_users WHERE lower(email) = lower(:email) AND is_active = TRUE LIMIT 1');
        $statement->execute(['email' => $email]);
        $user = $statement->fetch();

        return is_array($user) ? $user : null;
    }

    public function findById(int $id): ?array
    {
        $statement = $this->pdo->prepare('SELECT * FROM admin_users WHERE id = :id AND is_active = TRUE LIMIT 1');
        $statement->execute(['id' => $id]);
        $user = $statement->fetch();

        return is_array($user) ? $user : null;
    }

    public function verifyPassword(array $user, string $password): bool
    {
        return isset($user['password_hash'])
            && is_string($user['password_hash'])
            && password_verify($password, $user['password_hash']);
    }

    public function touchLogin(int $id): void
    {
        $statement = $this->pdo->prepare('UPDATE admin_users SET last_login_at = NOW(), updated_at = NOW() WHERE id = :id');
        $statement->execute(['id' => $id]);
    }

    public function createUser(string $email, string $password, string $totpSecret): int
    {
        $statement = $this->pdo->prepare(
            'INSERT INTO admin_users (email, password_hash, totp_secret) VALUES (:email, :password_hash, :totp_secret) RETURNING id'
        );
        $statement->execute([
            'email' => $email,
            'password_hash' => password_hash($password, PASSWORD_DEFAULT),
            'totp_secret' => $totpSecret,
        ]);

        return (int) $statement->fetchColumn();
    }
}
