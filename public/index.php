<?php
declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Application Bootstrap
|--------------------------------------------------------------------------
| Entry point for all HTTP requests.
| This file must contain NO business logic.
|
| [ES] Punto único de entrada del sistema.
| [ES] Aquí solo se inicializa y se enruta.
|--------------------------------------------------------------------------
*/
require __DIR__ . '/../vendor/autoload.php';

use Almadesign\Backend\Test\Hello;

echo Hello::say();
exit;
// -----------------------------------------------------
// 1. Error reporting (development-safe)
// -----------------------------------------------------
error_reporting(E_ALL);
ini_set('display_errors', '1');

// -----------------------------------------------------
// 2. Define base paths
// -----------------------------------------------------
define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . '/app');
define('CONFIG_PATH', APP_PATH . '/Config');
define('STORAGE_PATH', ROOT_PATH . '/storage');

// -----------------------------------------------------
// 3. Load environment variables
// -----------------------------------------------------
$envFile = ROOT_PATH . '/.env';
if (!file_exists($envFile)) {
    http_response_code(500);
    exit('Environment file not found.');
}

require ROOT_PATH . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(ROOT_PATH);
$dotenv->load();

// -----------------------------------------------------
// 4. Load core configuration
// -----------------------------------------------------
$config = require CONFIG_PATH . '/app.php';
$databaseConfig = require CONFIG_PATH . '/database.php';
$securityConfig = require CONFIG_PATH . '/security.php';
$loggingConfig  = require CONFIG_PATH . '/logging.php';

// -----------------------------------------------------
// 5. Initialize Logger
// -----------------------------------------------------
use App\Logging\Logger;

$logger = new Logger($loggingConfig);

// -----------------------------------------------------
// 6. Initialize Database / ORM
// -----------------------------------------------------
use App\Config\ORM;

$orm = new ORM($databaseConfig, $logger);

// -----------------------------------------------------
// 7. Build Request object
// -----------------------------------------------------
use App\Http\Request;

$request = Request::fromGlobals();

// -----------------------------------------------------
// 8. Middleware pipeline
// -----------------------------------------------------
use App\Middleware\CsrfMiddleware;
use App\Middleware\AuthMiddleware;
use App\Middleware\RateLimitMiddleware;

$middlewares = [
    new CsrfMiddleware($securityConfig, $logger),
    new RateLimitMiddleware($securityConfig, $logger),
    new AuthMiddleware($securityConfig, $logger),
];

// -----------------------------------------------------
// 9. Dispatch request
// -----------------------------------------------------
use App\Routing\Router;

$router = new Router($middlewares, $logger);
$response = $router->dispatch($request);

// -----------------------------------------------------
// 10. Emit response
// -----------------------------------------------------
http_response_code($response->getStatusCode());

foreach ($response->getHeaders() as $name => $value) {
    header("$name: $value");
}

echo $response->getBody();
