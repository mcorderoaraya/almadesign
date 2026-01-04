<?php
declare(strict_types=1);

namespace App\Routing;

use App\Http\Request;
use App\Http\Response;

final class Router
{
    /**
     * [ES] Rutas registradas:
     * - Indexadas por método HTTP (GET/POST/etc)
     * - Luego por path exacto ("/", "/health")
     * - Cada valor es un callable(Request): Response
     */
    private array $routes = [];

    /**
     * [ES] Handler para 404 (Not Found).
     * Firma: callable(Request): Response
     */
    private $notFoundHandler;

    /**
     * [ES] Handler para errores 500 (excepciones durante ejecución).
     * Firma: callable(\Throwable, Request): Response
     */
    private $errorHandler;

    public function __construct()
    {
        /**
         * [ES] Defaults seguros:
         * - 404 devuelve JSON estándar
         * - 500 devuelve JSON estándar (sin filtrar detalle)
         */
        $this->notFoundHandler = function (Request $request): Response {
            return Response::json(['error' => 'Not Found'], 404);
        };

        $this->errorHandler = function (\Throwable $e, Request $request): Response {
            // [ES] En producción NO expones $e->getMessage().
            // [ES] Si quieres debug, habilítalo con un flag y logging, no en la respuesta.
            return Response::json(['error' => 'Internal Server Error'], 500);
        };
    }

    // ----------------------------
    // Registration helpers
    // ----------------------------

    public function get(string $path, callable $handler): void
    {
        $this->map('GET', $path, $handler);
    }

    public function post(string $path, callable $handler): void
    {
        $this->map('POST', $path, $handler);
    }

    public function map(string $method, string $path, callable $handler): void
    {
        $method = strtoupper(trim($method));
        $path = $this->normalizePath($path);

        /**
         * [ES] Reglas simples:
         * - match EXACTO (no regex, no params) para mantener router mínimo.
         * - Evitamos "magia" o comportamientos implícitos.
         */
        $this->routes[$method][$path] = $handler;
    }

    public function setNotFoundHandler(callable $handler): void
    {
        /**
         * [ES] Debe aceptar (Request): Response
         */
        $this->notFoundHandler = $handler;
    }

    public function setErrorHandler(callable $handler): void
    {
        /**
         * [ES] Debe aceptar (\Throwable, Request): Response
         */
        $this->errorHandler = $handler;
    }

    // ----------------------------
    // Dispatch
    // ----------------------------

    public function dispatch(Request $request): Response
    {
        $method = $request->getMethod();
        $path   = $this->normalizePath($request->getPath());

        $handler = $this->routes[$method][$path] ?? null;

        if ($handler === null) {
            // [ES] Ruta no encontrada => 404 controlado.
            return ($this->notFoundHandler)($request);
        }

        try {
            /**
             * [ES] Ejecuta el handler:
             * - Debe retornar Response
             * - Si no retorna Response, eso ES un bug y se trata como 500
             */
            $result = $handler($request);

            if (!$result instanceof Response) {
                // [ES] Contrato roto: handler no devolvió Response.
                return ($this->errorHandler)(
                    new \RuntimeException('Route handler did not return a Response instance.'),
                    $request
                );
            }

            return $result;
        } catch (\Throwable $e) {
            // [ES] Error durante ejecución => 500 controlado.
            $eh = $this->errorHandler;
            return $eh($e, $request);
        }
    }

    private function normalizePath(string $path): string
    {
        // [ES] Normaliza:
        // - vacío => "/"
        // - quita query string si viene por accidente
        // - quita trailing slash salvo raíz
        $path = trim($path);
        if ($path === '') return '/';

        $qPos = strpos($path, '?');
        if ($qPos !== false) {
            $path = substr($path, 0, $qPos);
        }

        if ($path !== '/' && str_ends_with($path, '/')) {
            $path = rtrim($path, '/');
        }

        if ($path === '') return '/';
        if ($path[0] !== '/') $path = '/' . $path;

        return $path;
    }
}