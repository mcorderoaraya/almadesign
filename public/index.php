<?php

declare(strict_types=1);

use App\Http\Request;
use App\Http\Response;
use App\Routing\RouteCollection;
use App\Routing\Router;

require_once __DIR__ . '/../vendor/autoload.php';

$request = Request::fromGlobals();
$routes  = new RouteCollection();

/* =========================
   RUTAS CON CONSTRAINTS
   ========================= */

// Solo números
$routes->get('/users/{id:\d+}', function (Request $request): Response {
    return Response::json([
        'userId' => (int)$request->getParam('id')
    ]);
});

// Slug alfanumérico con guiones
$routes->get('/articles/{slug:[a-z\-]+}', function (Request $request): Response {
    return Response::json([
        'slug' => $request->getParam('slug')
    ]);
});

/* =========================
   DISPATCH
   ========================= */

$router = new Router($routes);
$response = $router->dispatch($request);
$response->send();