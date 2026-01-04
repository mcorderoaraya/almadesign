<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Http\Request;
use App\Http\Response;

/**
 * CONTRATO OBLIGATORIO PARA TODOS LOS MIDDLEWARES
 *
 * REGLA:
 * - handle() SIEMPRE recibe Request
 * - handle() SOLO puede devolver:
 *   - Response  → corta el flujo
 *   - null      → permite continuar
 *
 * PROHIBIDO:
 * - echo
 * - die / exit
 * - send()
 * - return bool / array / string
 */
interface MiddlewareInterface
{
    /**
     * Ejecuta la lógica del middleware.
     *
     * @param Request $request
     * @return Response|null
     */
    public function handle(Request $request): ?Response;
}