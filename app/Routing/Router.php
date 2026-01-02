<?php
declare(strict_types=1);

namespace App\Routing;

use Almadesign\Backend\Http\Request;
use Almadesign\Backend\Http\Response;

/**
 * Router (Minimal)
 *
 * Maps HTTP method + path to a callable handler.
 *
 * [ES] Router mínimo, explícito y determinista.
 * [ES] No hay expresiones regulares, no hay middlewares,
 * [ES] no hay resolución automática de dependencias.
 */
final class Router
{
    /**
     * @var array<string, array<string, callable>>
     *
     * Example:
     * [
     *   'GET' => [
     *     '/' => callable,
     *     '/health' => callable
     *   ]
     * ]
     *
     * [ES] Primera clave = método HTTP
     * [ES] Segunda clave = path exacto
     */
    private array $routes = [];

    /**
     * Register a route.
     *
     * [ES] Registra una ruta exacta para un método concreto.
     */
    public function add(string $method, string $path, callable $handler): void
    {
        $method = strtoupper($method);

        if (!isset($this->routes[$method])) {
            $this->routes[$method] = [];
        }

        $this->routes[$method][$path] = $handler;
    }

    /**
     * Dispatch the request to the correct handler.
     *
     * [ES] Resuelve la ruta o devuelve 404.
     */
    public function dispatch(Request $request): Response
    {
        $method = $request->method();
        $path   = $request->path();

        if (!isset($this->routes[$method])) {
            return Response::json(
                ['error' => 'Method not allowed'],
                405
            );
        }

        if (!isset($this->routes[$method][$path])) {
            return Response::json(
                ['error' => 'Route not found'],
                404
            );
        }

        $handler = $this->routes[$method][$path];

        $response = $handler($request);

        if (!$response instanceof Response) {
            return Response::json(
                ['error' => 'Invalid handler response'],
                500
            );
        }

        return $response;
    }
}