<?php

declare(strict_types=1);

namespace App\Routing;

use App\Http\Request;

/**
 * RouteCollection con soporte para:
 * - rutas estáticas
 * - parámetros dinámicos {id}
 * - parámetros con constraint {id:\d+}
 *
 * [ES] Regla:
 * - El constraint se evalúa por segmento.
 * - Si NO cumple → no hay match.
 */
final class RouteCollection
{
    private array $routes = [];

    public function get(string $path, callable $handler, array $middlewares = []): void
    {
        $this->add('GET', $path, $handler, $middlewares);
    }

    private function add(string $method, string $path, callable $handler, array $middlewares): void
    {
        if ($path === '') {
            $path = '/';
        }
        if ($path[0] !== '/') {
            $path = '/' . $path;
        }

        $this->routes[] = [
            'method'      => strtoupper($method),
            'path'        => rtrim($path, '/') ?: '/',
            'handler'     => $handler,
            'middlewares' => $middlewares,
        ];
    }

    /**
     * Match principal con soporte de constraints.
     */
    public function match(Request $request): ?array
    {
        $reqMethod = $request->getMethod();
        $reqPath   = $request->getPath();

        foreach ($this->routes as $route) {
            if ($route['method'] !== $reqMethod) {
                continue;
            }

            $params = $this->matchPath($route['path'], $reqPath);
            if ($params !== null) {
                return [
                    ...$route,
                    'params' => $params
                ];
            }
        }

        return null;
    }

    /**
     * Compara path de ruta vs path de request.
     *
     * Soporta:
     * - /users/{id}
     * - /users/{id:\d+}
     */
    private function matchPath(string $routePath, string $requestPath): ?array
    {
        $routeParts   = explode('/', trim($routePath, '/'));
        $requestParts = explode('/', trim($requestPath, '/'));

        if (count($routeParts) !== count($requestParts)) {
            return null;
        }

        $params = [];

        foreach ($routeParts as $i => $routePart) {
            $requestPart = $requestParts[$i];

            // Caso 1: parámetro simple {id}
            if (preg_match('/^\{(\w+)\}$/', $routePart, $m)) {
                $params[$m[1]] = $requestPart;
                continue;
            }

            // Caso 2: parámetro con constraint {id:\d+}
            if (preg_match('/^\{(\w+):(.+)\}$/', $routePart, $m)) {
                $paramName = $m[1];
                $pattern   = $m[2];

                // Aplica regex al segmento
                if (!preg_match('/^' . $pattern . '$/', $requestPart)) {
                    return null;
                }

                $params[$paramName] = $requestPart;
                continue;
            }

            // Caso 3: segmento estático
            if ($routePart !== $requestPart) {
                return null;
            }
        }

        return $params;
    }
}