<?php
declare(strict_types=1);

namespace App\Core;

final class Router
{
    /**
     * @var array<string, array<string, callable|array{0: class-string, 1: string}>>
     */
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    /**
     * @param callable|array{0: class-string, 1: string} $handler
     */
    public function get(string $path, callable|array $handler): void
    {
        $this->routes['GET'][$this->normalizePath($path)] = $handler;
    }

    /**
     * @param callable|array{0: class-string, 1: string} $handler
     */
    public function post(string $path, callable|array $handler): void
    {
        $this->routes['POST'][$this->normalizePath($path)] = $handler;
    }

    /**
     * @param array<string, mixed> $config
     */
    public function dispatch(string $method, string $uri, array $config): void
    {
        $method = strtoupper($method);
        $lookupMethod = $method === 'HEAD' ? 'GET' : $method;
        $path = $this->normalizePath((string) parse_url($uri, PHP_URL_PATH));
        $handler = $this->routes[$lookupMethod][$path] ?? null;

        if ($handler === null) {
            http_response_code(404);
            View::render('errors/404', [
                'title' => 'Pagina no encontrada',
                'config' => $config,
            ]);
            return;
        }

        if (is_array($handler)) {
            [$controllerClass, $action] = $handler;
            $controller = new $controllerClass($config);
            $controller->{$action}();
            return;
        }

        $handler();
    }

    private function normalizePath(string $path): string
    {
        $path = '/' . trim($path, '/');

        return $path === '/' ? '/' : rtrim($path, '/');
    }
}
