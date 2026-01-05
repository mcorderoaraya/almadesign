<?php
declare(strict_types=1);

namespace App\Middleware;

use App\Http\Request;
use App\Http\Response;

/**
 * RateLimitMiddleware
 *
 * [ES] Rate limit mínimo (por IP + ruta). Sin Redis, sin magia.
 * [ES] Si quieres algo serio, usa almacenamiento externo.
 */
final class RateLimitMiddleware implements MiddlewareInterface
{
    private int $maxRequests = 60;   // [ES] 60 requests...
    private int $windowSec   = 60;   // [ES] ...por 60 segundos.

    public function handle(Request $request, callable $next): Response
    {
        $ip   = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $key  = sha1($ip . '|' . $request->getPath());
        $file = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'rl_' . $key . '.json';

        $now = time();
        $state = ['reset' => $now + $this->windowSec, 'count' => 0];

        if (is_file($file)) {
            $raw = file_get_contents($file);
            $decoded = $raw ? json_decode($raw, true) : null;
            if (is_array($decoded) && isset($decoded['reset'], $decoded['count'])) {
                $state = $decoded;
            }
        }

        // [ES] Resetea ventana si expiró.
        if ($now >= (int)$state['reset']) {
            $state = ['reset' => $now + $this->windowSec, 'count' => 0];
        }

        $state['count'] = (int)$state['count'] + 1;
        file_put_contents($file, json_encode($state));

        if ($state['count'] > $this->maxRequests) {
            return Response::json([
                'success' => false,
                'error'   => 'Rate limit exceeded',
                'meta'    => [
                    'reset' => (int)$state['reset'],
                    'limit' => $this->maxRequests,
                    'windowSec' => $this->windowSec,
                ],
            ], 429);
        }

        return $next($request);
    }
}