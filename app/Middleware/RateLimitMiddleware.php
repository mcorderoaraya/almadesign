<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Http\Request;
use App\Http\Response;

/**
 * Middleware de Rate Limiting (limitación de peticiones)
 *
 * OBJETIVO:
 * - Prevenir abuso por IP
 * - NO emitir output
 * - NO enviar la respuesta
 * - SOLO devolver Response o null
 */
final class RateLimitMiddleware implements MiddlewareInterface
{
    /**
     * Número máximo de requests permitidos
     */
    private int $maxRequests = 100;

    /**
     * Ventana de tiempo en segundos
     */
    private int $windowSeconds = 60;

    /**
     * Punto de entrada del middleware
     */
    public function handle(Request $request): ?Response
    {
        $ip = $request->getClientIp();

        if ($this->isRateLimited($ip)) {
            // ⚠️ IMPORTANTE:
            // Se DEVUELVE Response, NO se envía
            return Response::json(
                [
                    'error' => 'Too Many Requests',
                    'message' => 'Rate limit exceeded'
                ],
                429
            );
        }

        // null = continuar con el siguiente middleware o el handler
        return null;
    }

    /**
     * Verifica si una IP excedió el límite
     */
    private function isRateLimited(string $ip): bool
    {
        $key = $this->getStorageKey($ip);

        $data = $_SESSION[$key] ?? [
            'count' => 0,
            'start' => time(),
        ];

        // Si la ventana expiró, se reinicia
        if (time() - $data['start'] > $this->windowSeconds) {
            $data = [
                'count' => 0,
                'start' => time(),
            ];
        }

        $data['count']++;

        $_SESSION[$key] = $data;

        return $data['count'] > $this->maxRequests;
    }

    /**
     * Genera la clave de almacenamiento por IP
     */
    private function getStorageKey(string $ip): string
    {
        return 'rate_limit_' . md5($ip);
    }
}