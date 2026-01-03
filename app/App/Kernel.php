<?php
declare(strict_types=1);

namespace App\App;

use App\Routing\RouteCollection;
use App\Http\Request;
use App\Http\Response;

final class Kernel
{
    private RouteCollection $routes;

    public function __construct(RouteCollection $routes)
    {
        $this->routes = $routes;

        // Root
        $this->routes->get('/', function () {
            return [
                'ok' => true,
                'service' => 'almadesign-backend'
            ];
        });

        // Health check
        $this->routes->get('/health', function () {
            return [
                'status' => 'healthy'
            ];
        });
    }

    /**
     * Handle an incoming HTTP request.
     *
     * [ES] Punto de entrada del backend. Orquesta request → router → response.
     */
    public function handle(Request $request): Response
    {
        $handler = $this->routes->match(
            $request->getMethod(),
            $request->getPath()
        );

        if (!$handler) {
            return Response::json(
                ['error' => 'Not Found'],
                404
            );
        }

        $result = $handler($request);

        return Response::json($result);
    }
}