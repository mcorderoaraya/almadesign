<?php

namespace App\Middleware;

use App\Http\Request;
use App\Http\Response;

/**
 * [ES] Middleware de rate limiting básico.
 * Usa IP como clave (ejemplo simple).
 */
final class RateLimitMiddleware implements MiddlewareInterface
{
    private static array $requests = [];

    public function handle(Request $request): ?Response
    {
        $ip = $request->getClientIp();
        $now = time();

        self::$requests[$ip] = self::$requests[$ip] ?? [];

        // [ES] Limpia requests viejas (>60s)
        self::$requests[$ip] = array_filter(
            self::$requests[$ip],
            fn ($t) => ($now - $t) < 60
        );

        if (count(self::$requests[$ip]) >= 60) {
            return Response::json(
                ['error' => 'Too many requests'],
                429
            );
        }

        self::$requests[$ip][] = $now;

        return null;
    }
}