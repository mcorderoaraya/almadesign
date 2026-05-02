<?php
declare(strict_types=1);

namespace App\Core;

final class App
{
    /**
     * @param array<string, mixed> $config
     */
    public function __construct(private readonly array $config)
    {
    }

    public function run(Router $router): void
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

        if ($method !== 'HEAD' && session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $uri = $_SERVER['REQUEST_URI'] ?? '/';

        $router->dispatch($method, $uri, $this->config);
    }
}
