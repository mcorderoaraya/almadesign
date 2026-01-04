<?php

namespace App\Routing;

use App\Http\Request;
use App\Http\Response;

/**
 * [ES] Router del sistema.
 * Responsabilidad única:
 * - registrar rutas
 * - resolver método + path
 * - delegar a Route
 */
final class Router
{
    /**
     * @var Route[]
     */
    private array $routes = [];

    /**
     * [ES] Registra una ruta GET con middlewares opcionales.
     */
    public function get(
        string $path,
        callable $handler,
        array $middlewares = []
    ): void {
        $this->routes[] = new Route('GET', $path, $handler, $middlewares);
    }

    /**
     * [ES] Registra una ruta POST con middlewares opcionales.
     */
    public function post(
        string $path,
        callable $handler,
        array $middlewares = []
    ): void {
        $this->routes[] = new Route('POST', $path, $handler, $middlewares);
    }

    /**
     * [ES] Resuelve el Request y devuelve Response.
     */
    public function dispatch(Request $request): Response
    {
        foreach ($this->routes as $route) {
            if ($route->matches($request)) {
                return $route->handle($request);
            }
        }

        return Response::json(['error' => 'Not Found'], 404);
    }
}