<?php

namespace App\Middleware;

use App\Http\Request;
use App\Http\Response;

/**
 * [ES] Middleware de autenticación básica.
 * Verifica presencia de header Authorization.
 */
final class AuthMiddleware implements MiddlewareInterface
{
    public function handle(Request $request): ?Response
    {
        $auth = $request->getHeader('Authorization');

        if ($auth === null) {
            return Response::json(
                ['error' => 'Unauthorized'],
                401
            );
        }

        // [ES] Aquí luego puedes validar token real
        return null;
    }
}