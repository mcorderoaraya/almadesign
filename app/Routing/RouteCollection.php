<?php
declare(strict_types=1);

namespace App\Routing;

final class RouteCollection
{
    private array $routes = [];

    /**
     * Register a GET route.
     *
     * [ES] Registra una ruta GET.
     */
    public function get(string $path, callable $handler): void
    {
        $this->routes['GET'][$path] = $handler;
    }

    /**
     * Register a POST route.
     *
     * [ES] Registra una ruta POST.
     */
    public function post(string $path, callable $handler): void
    {
        $this->routes['POST'][$path] = $handler;
    }

    /**
     * Match a route by HTTP method and path.
     *
     * [ES] Busca una ruta según método HTTP y path.
     */
    public function match(string $method, string $path): ?callable
    {
        return $this->routes[$method][$path] ?? null;
    }
}