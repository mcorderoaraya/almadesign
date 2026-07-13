<?php
declare(strict_types=1);

/*
 * Archivo: migrate_site_db.php
 * Path: scripts/migrate_site_db.php
 * Ambiente: local|produccion
 * Fecha de creacion: 2026-07-12
 * Explicacion tecnica: aplica migraciones PostgreSQL del dashboard del sitio usando SITE_DATABASE_URL.
 */

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/app/Core/Env.php';
require BASE_PATH . '/app/Services/Database.php';

App\Core\Env::load(BASE_PATH . '/.env');
$config = require BASE_PATH . '/config/app.php';
$pdo = App\Services\Database::pdo($config);

foreach (glob(BASE_PATH . '/database/migrations/*.sql') ?: [] as $migration) {
    $sql = file_get_contents($migration);
    if ($sql === false) {
        throw new RuntimeException('No se pudo leer ' . $migration);
    }
    $pdo->exec($sql);
    echo 'OK ' . basename($migration) . PHP_EOL;
}
