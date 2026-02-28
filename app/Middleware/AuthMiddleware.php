<?php
declare(strict_types=1);

namespace App\Middleware;

use App\Errors\ErrorCatalog;
use App\Http\Request;
use App\Http\Response;

/**
 * [ES] Middleware de autenticación básica.
 * Verifica presencia de header Authorization.
 */
final class AuthMiddleware implements MiddlewareInterface
{
    public function handle(Request $request, callable $next): Response
    {
        $auth = $request->getHeader('Authorization');

        if ($auth === null) {
            $code = ErrorCatalog::UNAUTHORIZED;

            return Response::json(
                ErrorCatalog::payload($code, [
                    'method' => $request->getMethod(),
                    'path'   => $request->getPath(),
                ]),
                ErrorCatalog::status($code)
            );
        }

        // [ES] Header presente — continúa el pipeline.
        // Aquí puedes validar el token real en el futuro.
        return $next($request);
    }
}