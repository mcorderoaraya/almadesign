<?php

namespace App\Middleware;

use App\Http\Request;
use App\Http\Response;

/**
 * [ES] Middleware CSRF.
 * Solo se aplica a métodos mutables (POST, PUT, DELETE).
 */
final class CsrfMiddleware implements MiddlewareInterface
{
    public function handle(Request $request): ?Response
    {
        if (!in_array($request->getMethod(), ['POST', 'PUT', 'DELETE'], true)) {
            return null;
        }

        $token = $request->getHeader('X-CSRF-TOKEN');

        if ($token === null) {
            return Response::json(
                ['error' => 'CSRF token missing'],
                403
            );
        }

        // [ES] Validación real vendrá después
        return null;
    }
}