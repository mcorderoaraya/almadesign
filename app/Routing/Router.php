<?php

namespace App\Routing;

use App\Http\Request;
use App\Http\Response;

/**
 * Router
 *
 * ÚNICA responsabilidad:
 * - Recibir Request
 * - Encontrar un handler válido
 * - Ejecutarlo
 * - Retornar Response
 *
 * NO captura excepciones
 * NO envía headers
 */
final class Router
{
    private RouteCollection $routes;

    public function __construct(RouteCollection $routes)
    {
        $this->routes = $routes;
    }

    /**
     * Despacha una request al handler correspondiente
     *
     * @throws \Throwable (propaga al Kernel)
     */
    public function dispatch(Request $request): Response
    {
        $method = $request->getMethod();
        $path   = $request->getPath();

        $route = $this->routes->match($method, $path);

        if ($route === null) {
            // IMPORTANTE:
            // Router NO decide qué hacer con un 404
            // Solo informa la condición
            throw new \RuntimeException('ROUTE_NOT_FOUND', 404);
        }

        $handler = $route['handler'];
        $params  = $route['params'];

        // Ejecuta el handler (controller explícito)
        return $handler($request, $params);
    }
}