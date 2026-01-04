<?php

namespace App\Middleware;

use App\Http\Request;
use App\Http\Response;

/**
 * [ES] Contrato base para todos los middlewares.
 * Si retorna null → la ejecución continúa.
 * Si retorna Response → la ejecución se detiene.
 */
interface MiddlewareInterface
{
    public function handle(Request $request): ?Response;
}