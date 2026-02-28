<?php
declare(strict_types=1);

namespace App\Database;

use PDO;
use PDOException;
use RuntimeException;

/**
 * PDOFactory
 *
 * ES:
 * - Construye la conexión PDO desde app/Config/database.php
 * - Si la conexión falla lanza RuntimeException
 *   → el Kernel la captura y devuelve HTTP 500 JSON controlado
 * - No es un singleton: cada llamada crea una nueva conexión
 */
final class PDOFactory
{
    public static function create(): PDO
    {
        $cfg = require dirname(__DIR__) . '/Config/database.php';

        $dsn = sprintf(
            '%s:host=%s;port=%s;dbname=%s;charset=%s',
            $cfg['driver'],
            $cfg['host'],
            $cfg['port'],
            $cfg['database'],
            $cfg['charset']
        );

        try {
            return new PDO($dsn, $cfg['username'], $cfg['password'], [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        } catch (PDOException $e) {
            throw new RuntimeException(
                'Database connection failed: ' . $e->getMessage(),
                (int) $e->getCode(),
                $e
            );
        }
    }
}
