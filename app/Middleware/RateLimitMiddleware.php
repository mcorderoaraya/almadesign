<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Http\Request;
use App\Http\Response;

/**
 * RateLimitMiddleware (simple, sin Redis, sin DB).
 *
 * [ES] Diseño:
 * - Usa $_SESSION como storage de ventana por IP.
 * - Es suficiente para entorno local/dev.
 * - En producción real: mover a Redis/memcached y reglas por endpoint.
 *
 * [ES] Contrato:
 * - Si excede límite → Response::json(..., 429)
 * - Si no → null (continúa)
 */
final class RateLimitMiddleware implements MiddlewareInterface
{
    private int $maxRequests;
    private int $windowSeconds;
    private string $keyPrefix;

    public function __construct(int $maxRequests = 100, int $windowSeconds = 60, string $keyPrefix = 'rate_limit_')
    {
        $this->maxRequests = $maxRequests;
        $this->windowSeconds = $windowSeconds;
        $this->keyPrefix = $keyPrefix;
    }

    public function handle(Request $request): ?Response
    {
        // [ES] Sin sesión no hay rate limit básico con este storage.
        // Asegúrate de llamar session_start() en public/index.php.
        if (session_status() !== PHP_SESSION_ACTIVE) {
            return Response::json([
                'error' => 'rate_limit_storage_unavailable',
                'message' => 'Session is not active. Call session_start() in public/index.php.'
            ], 500);
        }

        $ip = $request->getClientIp();
        $key = $this->keyPrefix . md5($ip);

        $now = time();

        $data = $_SESSION[$key] ?? [
            'count' => 0,
            'start' => $now
        ];

        // [ES] Reinicia ventana si expiró
        if (($now - (int)$data['start']) > $this->windowSeconds) {
            $data = [
                'count' => 0,
                'start' => $now
            ];
        }

        $data['count'] = (int)$data['count'] + 1;
        $_SESSION[$key] = $data;

        if ($data['count'] > $this->maxRequests) {
            $retryAfter = max(1, $this->windowSeconds - ($now - (int)$data['start']));

            return Response::json([
                'error' => 'Too Many Requests',
                'message' => 'Rate limit exceeded',
                'retry_after_seconds' => $retryAfter
            ], 429, [
                // [ES] Header estándar para rate limit
                'Retry-After' => (string)$retryAfter
            ]);
        }

        return null;
    }
}