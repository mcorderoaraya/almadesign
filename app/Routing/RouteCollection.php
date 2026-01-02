<?php
declare(strict_types=1);

namespace App\Routing;

use Almadesign\Backend\Http\Request;
use Almadesign\Backend\Http\Response;

/**
 * RouteCollection
 *
 * Defines all application routes.
 *
 * [ES] Este archivo es el mapa de rutas del sistema.
 * [ES] NO es un Kernel.
 * [ES] NO controla el ciclo de vida.
 */
final class RouteCollection
{
    public static function register(Router $router): void
    {
        $router->add('GET', '/', function (Request $request): Response {
            return Response::json([
                'ok' => true,
                'message' => 'Almadesign backend is running'
            ]);
        });

        $router->add('GET', '/health', function (Request $request): Response {
            return Response::json([
                'status' => 'healthy',
                'time' => date('c')
            ]);
        });
    }
}