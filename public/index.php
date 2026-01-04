<?php
declare(strict_types=1);

/**
 * [ES] Entry point único del sistema.
 * Orquesta:
 * - middlewares globales
 * - rutas (con middlewares por ruta)
 * - dispatch
 * - manejo de errores
 */

require dirname(__DIR__) . '/vendor/autoload.php';

use App\Http\Request;
use App\Routing\Router;

// Controllers
use App\Controllers\HomeController;
use App\Controllers\HealthController;
use App\Controllers\ErrorController;

// Middlewares
use App\Middleware\RateLimitMiddleware;
use App\Middleware\AuthMiddleware;
use App\Middleware\CsrfMiddleware;

// --------------------------------------------------
// Request & Router
// --------------------------------------------------
$request = Request::fromGlobals();
$router  = new Router();

// --------------------------------------------------
// Controllers
// --------------------------------------------------
$home   = new HomeController();
$health = new HealthController();
$error  = new ErrorController();

// --------------------------------------------------
// Global middlewares (se ejecutan primero)
// --------------------------------------------------
$globalMiddlewares = [
    new RateLimitMiddleware(),
];

foreach ($globalMiddlewares as $middleware) {
    $response = $middleware->handle($request);
    if ($response !== null) {
        $response->send();
        exit;
    }
}

// --------------------------------------------------
// Routes (con middlewares por ruta)
// --------------------------------------------------
$router->get('/', [$home, 'index']);

$router->get('/health', [$health, 'check']);

// Ruta protegida de ejemplo
$router->post(
    '/admin/action',
    fn ($req) => \App\Http\Response::json(['ok' => true]),
    [
        new AuthMiddleware(),
        new CsrfMiddleware(),
    ]
);

// --------------------------------------------------
// Dispatch con manejo de excepciones
// --------------------------------------------------
try {
    $response = $router->dispatch($request);
} catch (Throwable $e) {
    $response = $error->exception($e);
}

$response->send();