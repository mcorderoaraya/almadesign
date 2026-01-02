<?php
declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Application Entry Point
|--------------------------------------------------------------------------
| Single and only entry point for the application.
|
| Responsibilities:
| - Load Composer autoloader
| - Load environment variables
| - Build HTTP Request
| - Delegate execution to Kernel
| - Send HTTP Response
|
| [ES]
| Este archivo NO contiene lógica de negocio.
| NO define rutas.
| NO instancia servicios.
| NO incluye clases manualmente.
*/

// -----------------------------------------------------
// Error reporting (development only)
// -----------------------------------------------------
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// -----------------------------------------------------
// Define base path
// -----------------------------------------------------
define('BASE_PATH', dirname(__DIR__));

// -----------------------------------------------------
// Load Composer autoloader (ONLY autoload allowed)
// -----------------------------------------------------
$autoloadPath = BASE_PATH . '/vendor/autoload.php';

if (!file_exists($autoloadPath)) {
    http_response_code(500);
    echo 'Composer autoload not found.';
    exit;
}

require_once $autoloadPath;

// -----------------------------------------------------
// Load environment variables (.env) if present
// -----------------------------------------------------
if (file_exists(BASE_PATH . '/.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
    $dotenv->load();
}

// -----------------------------------------------------
// Bootstrap HTTP flow
// -----------------------------------------------------
use Almadesign\Backend\App\Kernel;
use Almadesign\Backend\Http\Request;

try {
    // Build normalized HTTP request
    $request = Request::fromGlobals();

    // Kernel owns lifecycle
    $kernel = new Kernel();

    // Handle request and produce response
    $response = $kernel->handle($request);

    // Emit response
    $response->send();

} catch (Throwable $e) {
    http_response_code(500);

    // Safe error output (development only)
    echo 'Application error:<br>';
    echo nl2br(htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8'));

    exit;
}