<?php
/**
 * Middleware para limitación básica de tasa (rate limiting).
 * Identifica cliente por IP y limita solicitudes por ventana de tiempo.
 * Al exceder límite, retorna código 429 o lanza excepción.
 * Configurable por grupo de endpoints (placeholder).
 */

namespace App\Middleware;

class RateLimitMiddleware
{
    protected int $maxRequests;
    protected int $windowSeconds;
    protected bool $enabled;

    protected string $clientIp;
    protected string $storageKey;

    /**
     * Constructor que recibe configuración de limitación.
     * 
     * @param int $maxRequests
     * @param int $windowSeconds
     * @param bool $enabled
     */
    public function __construct(int $maxRequests, int $windowSeconds, bool $enabled)
    {
        $this->maxRequests = $maxRequests;
        $this->windowSeconds = $windowSeconds;
        $this->enabled = $enabled;

        $this->clientIp = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $this->storageKey = 'rate_limit_' . $this->clientIp;

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Maneja la limitación de tasa.
     * 
     * @return void
     * @throws \Exception Si se excede el límite de solicitudes.
     */
    public function handle(): void
    {
        if (!$this->enabled) {
            return;
        }

        $now = time();
        $rateData = $_SESSION[$this->storageKey] ?? ['count' => 0, 'start' => $now];

        if ($now - $rateData['start'] > $this->windowSeconds) {
            // Reiniciar ventana
            $rateData = ['count' => 1, 'start' => $now];
        } else {
            $rateData['count']++;
        }

        $_SESSION[$this->storageKey] = $rateData;

        if ($rateData['count'] > $this->maxRequests) {
            http_response_code(429);
            throw new \Exception('Demasiadas solicitudes. Por favor intente más tarde.', 429);
        }
    }
}
