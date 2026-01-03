<?php
declare(strict_types=1);

namespace App\Routing;

use App\Http\Request;
use App\Http\Response;

/**
 * Router
 *
 * Minimal HTTP router.
 *
 * Responsibilities:
 * - Register routes (method + path + handler)
 * - Dispatch incoming requests
 * - Return a Response or 404
 *
 * [ES]
 * - Este router es intencionalmente simple.
 * - No hay expresiones regulares.
 * - No hay middlewares todavía.
 * - No hay parámetros dinámicos.
 * - Primero estabilidad, luego complejidad.
 */
final class Router
{
    /**
     * @var array<int, array{method:string, path:string, handler:callable}>
     */
    private array $routes = [];

    /**
     * Register a route.
     *
     * @param string   $method  HTTP method (GET, POST, etc.)
     * @param string   $path    Exact path (e.g. /health)
     * @param callable $handler Function(Request): Response
     */
    public function add(string $method, string $path, callable $handler): void
    {
        $this->routes[] = [
            'method'  => strtoupper($method),
            'path'    => $this->normalizePath($path),
            'handler' => $handler,
        ];
    }

    /**
     * Dispatch the request to the matching route.
     *
     * @param Request $request
     * @return Response
     */
    public function dispatch(Request $request): Response
    {
        $method = strtoupper($request->getMethod());
        $path   = $this->normalizePath($request->getPath());

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $path) {
                return ($route['handler'])($request);
            }
        }

        return Response::json(
            ['error' => 'Not Found'],
            404
        );
    }

    /**
     * Normalize paths to avoid false 404s.
     *
     * Rules:
     * - Remove query string
     * - Ensure leading slash
     * - Remove trailing slash (except root)
     *
     * [ES]
     * - Esto evita errores clásicos como:
     *   /health vs /health/
     *   /health?x=1
     */
    private function normalizePath(string $path): string
    {
        // Remove query string
        $path = parse_url($path, PHP_URL_PATH) ?? '/';

        // Ensure leading slash
        if ($path === '') {
            $path = '/';
        }

        // Remove trailing slash except root
        if ($path !== '/' && str_ends_with($path, '/')) {
            $path = rtrim($path, '/');
        }

        return $path;
    }
}
