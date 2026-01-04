<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Http\Request;
use App\Http\Response;

/**
 * Contrato único para middlewares explícitos.
 *
 * [ES] Regla:
 * - handle() retorna:
 *   - Response  → corta el flujo (ej: 401/403/429)
 *   - null      → continuar con el siguiente middleware o handler
 *
 * [ES] Prohibido en middleware:
 * - echo / print / var_dump
 * - exit / die
 * - header()
 * - send()
 */
interface MiddlewareInterface
{
    public function handle(Request $request): ?Response;
}