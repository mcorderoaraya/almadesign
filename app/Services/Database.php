<?php
declare(strict_types=1);

namespace App\Services;

use PDO;
use RuntimeException;

// Conexión PostgreSQL del sitio. Mantiene separado el contenido editable del RAG.
final class Database
{
    public static function pdo(array $config): PDO
    {
        $dsn = $config['database_url'] ?? null;
        if (!is_string($dsn) || $dsn === '') {
            throw new RuntimeException('SITE_DATABASE_URL no está configurada.');
        }

        if (!in_array('pgsql', PDO::getAvailableDrivers(), true)) {
            throw new RuntimeException('La extensión pdo_pgsql/php-pgsql no está habilitada en PHP.');
        }

        $pdo = new PDO($dsn, null, null, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);

        $pdo->exec("SET TIME ZONE 'America/Santiago'");

        return $pdo;
    }
}
