<?php
declare(strict_types=1);

namespace App\Middleware;

use App\Http\Request;
use App\Http\Response;

/**
 * MiddlewareInterface
 *
 * [ES] Contrato mínimo. Un middleware envuelve el flujo.
 */
interface MiddlewareInterface
{
    /**
     * @param callable(Request):Response $next
     */
    public function handle(Request $request, callable $next): Response;
}