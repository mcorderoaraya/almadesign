<?php
declare(strict_types=1);

/**
 * ------------------------------------------------------------
 * AlmaDesign Backend Bootstrap
 * ------------------------------------------------------------
 * Punto único de entrada HTTP.
 * - Carga autoload de Composer
 * - Inicializa entorno
 * - Construye Request
 * - Ejecuta Kernel
 * - Emite Response
 * ------------------------------------------------------------
 */

// ------------------------------------------------------------
// 1. Autoload Composer
// ------------------------------------------------------------
$autoloadPath = dirname(__DIR__) . '/vendor/autoload.php';

if (!file_exists($autoloadPath)) {
    http_response_code(500);
    echo 'Composer autoload not found. Run composer install.';
    exit;
}

require $autoloadPath;

// ------------------------------------------------------------
// 2. Cargar variables de entorno (.env)
// ------------------------------------------------------------
$envPath = dirname(__DIR__);

if (file_exists($envPath . '/.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable($envPath);
    $dotenv->safeLoad();
}

// ------------------------------------------------------------
// 3. Imports explícitos (sin magia)
// ------------------------------------------------------------
use App\Http\Request;
use App\Http\Response;
use App\Routing\Router;
use App\Routing\RouteCollection;
use App\App\Kernel;

// ------------------------------------------------------------
// 4. Crear Request desde PHP globals
// ------------------------------------------------------------
$request = Request::fromGlobals();

// ------------------------------------------------------------
// 5. Definir rutas explícitas (router mínimo)
// ------------------------------------------------------------
$routes = new RouteCollection();

/**
 * Health check
 */
$routes->get('/health', function () {
    return Response::json([
        'status' => 'ok',
        'service' => 'almadesign-backend',
        'timestamp' => time()
    ]);
});

/**
 * Root endpoint (debug / bootstrap validation)
 */
$routes->get('/', function (Request $request) {
    return Response::json([
        'ok'     => true,
        'method'=> $request->getMethod(),
        'path'  => $request->getPath(),
        'query' => $request->getQueryParams()
    ]);
});

// ------------------------------------------------------------
// 6. Inicializar Kernel
// ------------------------------------------------------------
$kernel = new Kernel($routes);

// ------------------------------------------------------------
// 7. Ejecutar aplicación
// ------------------------------------------------------------
try {
    $response = $kernel->handle($request);
} catch (Throwable $e) {
    $response = Response::json([
        'error'   => 'Application error',
        'message' => $e->getMessage(),
    ], 500);
}

// ------------------------------------------------------------
// 8. Emitir respuesta HTTP
// ------------------------------------------------------------
$response = $kernel->handle($request);
$response->send();