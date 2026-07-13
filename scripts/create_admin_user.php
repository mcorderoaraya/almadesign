<?php
declare(strict_types=1);

/*
 * Archivo: create_admin_user.php
 * Path: scripts/create_admin_user.php
 * Ambiente: local|produccion
 * Fecha de creacion: 2026-07-12
 * Explicacion tecnica: crea un usuario administrador con password hash y secreto TOTP para el dashboard.
 */

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/app/Core/Env.php';
require BASE_PATH . '/app/Services/Database.php';
require BASE_PATH . '/app/Services/AdminAuth.php';
require BASE_PATH . '/app/Services/TotpService.php';

App\Core\Env::load(BASE_PATH . '/.env');
$config = require BASE_PATH . '/config/app.php';

$email = $argv[1] ?? '';
$password = $argv[2] ?? '';

if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 12) {
    fwrite(STDERR, "Uso: php scripts/create_admin_user.php admin@almadesign.cl 'PasswordLarga123'\n");
    fwrite(STDERR, "La contraseña debe tener al menos 12 caracteres.\n");
    exit(1);
}

$totp = new App\Services\TotpService();
$secret = $totp->generateSecret();
$auth = new App\Services\AdminAuth(App\Services\Database::pdo($config));
$id = $auth->createUser($email, $password, $secret);

echo 'Admin creado ID: ' . $id . PHP_EOL;
echo 'TOTP_SECRET: ' . $secret . PHP_EOL;
echo 'OTPAUTH_URI: ' . $totp->provisioningUri('AlmaDesign Dashboard', $email, $secret) . PHP_EOL;
