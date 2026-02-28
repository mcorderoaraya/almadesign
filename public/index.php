<?php
declare(strict_types=1);

/**
 * public/index.php
 *
 * EN:
 * Single entry point of the backend application.
 *
 * ES:
 * Punto de entrada ÚNICO del sistema.
 *
 * CONTEXTO ARQUITECTÓNICO:
 * - No contiene lógica de negocio
 * - No valida datos manualmente
 * - No maneja errores directamente
 * - Solo orquesta:
 *   Request → Router → Middleware → Controller → UseCase → Response
 *
 * REGLA DE ORO:
 * - Un solo punto de salida: Response->send()
 * - Ningún echo/die/var_dump fuera de Response
 */

// ======================================================
// 1. BASE PATH Y AUTOLOAD
// ======================================================

// Ruta base del proyecto (…/almadesign)
$basePath = dirname(__DIR__);

// Autoload de Composer (obligatorio para namespaces)
$autoload = $basePath . '/vendor/autoload.php';

if (!file_exists($autoload)) {
    // Fallback extremo: si no existe autoload, no seguimos
    http_response_code(500);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        'success' => false,
        'error'   => 'Internal Server Error',
        'code'    => 'AUTOLOAD_MISSING',
        'meta'    => [
            'hint' => 'Run composer install'
        ]
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

require $autoload;

// ======================================================
// 2. CARGA DE ENTORNO (.env) – SEGURA
// ======================================================

/**
 * ES:
 * Carga el archivo .env solo si existe.
 * No debe romper el sistema si falta.
 */
$envFile = $basePath . '/.env';

if (file_exists($envFile) && class_exists(\Dotenv\Dotenv::class)) {
    $dotenv = \Dotenv\Dotenv::createImmutable($basePath);
    $dotenv->safeLoad();
}

// ======================================================
// 3. USE STATEMENTS (EXPLÍCITOS)
// ======================================================

use App\App\Kernel;
use App\Controllers\ErrorController;
use App\Controllers\UserController;
use App\Database\PDOFactory;
use App\Http\Request;
use App\Http\Response;
use App\Repositories\MySQL\MySQLUserRepository;
use App\Routing\Router;
use App\Routing\RouteCollection;
use App\Validation\Validator;
use App\Middleware\ValidationMiddleware;
use App\Middleware\RateLimitMiddleware;
use App\Application\GetUserUseCase;

// ======================================================
// 4. CREACIÓN DEL REQUEST
// ======================================================

/**
 * ES:
 * El Request se construye UNA SOLA VEZ desde globals.
 * Ningún otro archivo debe acceder a $_GET, $_POST, $_SERVER.
 */
$request = Request::fromGlobals();

// ======================================================
// 5. OBJETOS CENTRALES
// ======================================================

/**
 * ES:
 * - ErrorController centraliza TODOS los errores
 * - Router enruta y ejecuta middleware
 * - Kernel orquesta y captura excepciones
 */
$errorController  = new ErrorController();
$routeCollection  = new RouteCollection();
$router           = new Router($routeCollection, $errorController);
$kernel           = new Kernel($router, $errorController);

// ======================================================
// 6. REGISTRO DE RUTAS
// ======================================================

/**
 * RUTA: /
 * ES:
 * Endpoint raíz para verificar que el backend está operativo.
 */
$router->get(
    '/',
    function (Request $request): Response {
        return Response::json([
            'success' => true,
            'data' => [
                'service' => 'almadesign-backend',
                'status'  => 'running'
            ]
        ]);
    },
    [
        // Rate limit básico incluso en root
        new RateLimitMiddleware()
    ]
);

/**
 * RUTA: /health
 * ES:
 * Endpoint estándar de healthcheck (monitorización).
 */
$router->get(
    '/health',
    function (Request $request): Response {
        return Response::json([
            'success' => true,
            'data' => [
                'status' => 'healthy'
            ]
        ]);
    }
);

/**
 * RUTA: /users/{id}
 *
 * ES:
 * - Constraint {id:\d+} filtra rutas inválidas
 * - ValidationMiddleware valida parámetros
 * - UserController es delgado
 * - La lógica vive en el Use Case
 *
 * DI lazy (sin Service Container):
 *   PDOFactory → MySQLUserRepository → GetUserUseCase → UserController
 * El PDO se instancia SOLO cuando la ruta es alcanzada,
 * para que GET / y GET /health no fallen sin DB.
 */
$router->get(
    '/users/{id:\d+}',
    function (Request $req, array $params = []): Response {
        $pdo            = PDOFactory::create();
        $userRepository = new MySQLUserRepository($pdo);
        $getUserUseCase = new GetUserUseCase($userRepository);
        $userController = new UserController($getUserUseCase);
        return $userController->show($req, $params);
    },
    [
        new RateLimitMiddleware(),
        new ValidationMiddleware(
            new Validator([
                'id' => 'required|numeric'
            ]),
            'params'
        )
    ]
);

// ======================================================
// 7. EJECUCIÓN FINAL
// ======================================================

/**
 * ES:
 * - El Kernel ejecuta todo el flujo
 * - Siempre devuelve una Response
 * - Aquí ocurre el ÚNICO send()
 */
$response = $kernel->handle($request);
$response->send();