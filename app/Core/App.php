<?php
declare(strict_types=1);

namespace App\Core;

use App\Services\AnalyticsService;
use App\Services\Database;
use Throwable;

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

        if ($method !== 'HEAD' && $this->needsSession($_SERVER['REQUEST_URI'] ?? '/') && session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $uri = $_SERVER['REQUEST_URI'] ?? '/';

        $router->dispatch($method, $uri, $this->config);
        $this->recordAnalytics();
    }

    private function needsSession(string $uri): bool
    {
        $path = (string) parse_url($uri, PHP_URL_PATH);

        return str_starts_with($path, '/dashboard')
            || $path === '/contacto'
            || $path === '/contacto/formulario'
            || $path === '/contacto/enviar'
            || str_starts_with($path, '/contacto/rag');
    }

    private function recordAnalytics(): void
    {
        try {
            (new AnalyticsService(Database::pdo($this->config)))
                ->recordVisit($_SERVER, $_GET, http_response_code());
        } catch (Throwable) {
            // La analítica nunca debe afectar la disponibilidad del sitio público.
        }
    }
}
