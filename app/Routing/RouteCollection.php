<?php
declare(strict_types=1);

namespace App\Routing;

/**
 * [ES] RouteCollection NO es estrictamente necesaria, pero si quieres mantenerla:
 * - Actúa como “fachada” para registrar rutas sobre Router
 * - Evita que index.php conozca detalles internos del Router
 *
 * [ES] Importante:
 * - No implementa dispatch
 * - No implementa matching
 * - No “inventa” métodos (get/register/etc) que no existan en Router
 */
final class RouteCollection
{
    private Router $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function get(string $path, callable $handler): void
    {
        $this->router->get($path, $handler);
    }

    public function post(string $path, callable $handler): void
    {
        $this->router->post($path, $handler);
    }

    public function map(string $method, string $path, callable $handler): void
    {
        $this->router->map($method, $path, $handler);
    }

    public function setNotFoundHandler(callable $handler): void
    {
        $this->router->setNotFoundHandler($handler);
    }

    public function setErrorHandler(callable $handler): void
    {
        $this->router->setErrorHandler($handler);
    }
}