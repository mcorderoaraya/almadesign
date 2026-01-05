<?php
declare(strict_types=1);

namespace App\Repositories\MySQL;

use PDO;
use App\Entities\User;

/**
 * MySQLUserRepository
 *
 * ES:
 * - Implementación concreta
 * - Usa PDO
 * - No valida reglas de negocio
 */
final class MySQLUserRepository implements UserRepositoryInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function save(User $user): User
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO users (email, name) VALUES (:email, :name)'
        );

        $stmt->execute([
            'email' => $user->email(),
            'name'  => $user->name(),
        ]);

        $id = (int) $this->pdo->lastInsertId();

        return $user->withId($id);
    }

    public function update(User $user): User
    {
        $stmt = $this->pdo->prepare(
            'UPDATE users SET email = :email, name = :name WHERE id = :id'
        );

        $stmt->execute([
            'id'    => $user->id(),
            'email'=> $user->email(),
            'name' => $user->name(),
        ]);

        return $user;
    }

    public function findById(int $id): ?User
    {
        $stmt = $this->pdo->prepare(
            'SELECT id, email, name FROM users WHERE id = :id'
        );

        $stmt->execute(['id' => $id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new User(
            (int)$row['id'],
            $row['email'],
            $row['name']
        );
    }
}