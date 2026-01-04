<?php
declare(strict_types=1);

/**
 * ============================================================
 * public/index.php
 * ============================================================
 *
 * [ES] Punto de entrada único del sistema.
 * [ES] Este archivo:
 *   - NO contiene lógica de negocio
 *   - NO implementa seguridad
 *   - NO decide flujos complejos
 *
 * [ES] Su única responsabilidad es:
 *   1. Bootstrapping mínimo
 *   2. Crear Request
 *   3. Ejecutar Middlewares explícitos
 *   4. Registrar rutas
 *   5. Delegar al Router
 *   6. Enviar la Response
 *
 * ============================================================
 */

// ------------------------------------------------------------
// Autoload de Composer
// ------------------------------------------------------------
// [ES] Carga automática de todas las clases del proyecto.
// [ES] Si esto falla, TODO el sistema falla.
require dirname(__DIR__) . '/vendor/autoload.php';

// ------------------------------------------------------------
// Imports explícitos (sin magia)
// ------------------------------------------------------------

use App\Http\Request;
use App\Routing\Router;

// Controllers
use App\Controllers\HomeController;
use App\Controllers\HealthController;
use App\Controllers\ErrorController;

// Middlewares
use App\Middleware\AuthMiddleware;
use App\Middleware\CsrfMiddleware;
use App\Middleware\RateLimitMiddleware;

// ------------------------------------------------------------
// Creación del Request
// ------------------------------------------------------------
// [ES] Se construye el Request a partir de las variables globales PHP.
// [ES] Aquí se normalizan método, path, headers, IP, etc.
$request = Request::fromGlobals();

// ------------------------------------------------------------
// Inicialización del Router
// ------------------------------------------------------------
// [ES] El Router SOLO resuelve method + path → handler.
$router = new Router();

// ------------------------------------------------------------
// Instanciación de Controllers (explícito)
// ------------------------------------------------------------
// [ES] No hay contenedor de dependencias.
// [ES] Cada controller se instancia de forma clara.
$homeController   = new HomeController();
$healthController = new HealthController();
$errorController  = new ErrorController();

// ------------------------------------------------------------
// Registro explícito de rutas
// ------------------------------------------------------------
// [ES] Aquí se define QUÉ rutas existen.
// [ES] No hay lógica, solo mapeo.

$router->get('/', [$homeController, 'index']);
$router->get('/health', [$healthController, 'check']);

// ------------------------------------------------------------
// Registro de Middlewares globales
// ------------------------------------------------------------
// [ES] Se ejecutan ANTES del router.
// [ES] Si alguno devuelve Response → el flujo se corta.

$middlewares = [
    // [ES] Rate limit primero: es barato y protege el sistema.
    new RateLimitMiddleware(),

    // [ES] Autenticación después.
    new AuthMiddleware(),

    // [ES] CSRF solo afecta métodos mutables (POST, PUT, DELETE).
    new CsrfMiddleware(),
];

// ------------------------------------------------------------
// Ejecución de Middlewares
// ------------------------------------------------------------

foreach ($middlewares as $middleware) {
    $middlewareResponse = $middleware->handle($request);

    // [ES] Si el middleware bloquea, se envía la respuesta y se termina.
    if ($middlewareResponse !== null) {
        $middlewareResponse->send();
        exit;
    }
}

// ------------------------------------------------------------
// Ejecución del Router con manejo de errores
// ------------------------------------------------------------

try {
    // [ES] El Router devuelve SIEMPRE una Response.
    $response = $router->dispatch($request);
} catch (Throwable $e) {
    // [ES] Cualquier excepción no controlada se delega al ErrorController.
    $response = $errorController->exception($e);
}

// ------------------------------------------------------------
// Envío de la respuesta final
// ------------------------------------------------------------
// [ES] Punto final del request HTTP.
$response->send();