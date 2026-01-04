<?php
declare(strict_types=1);

namespace App\Http;

/**
 * [ES] Request mínimo:
 * - Encapsula method + path + query + headers + body raw
 * - NO hace validación de negocio
 * - NO depende de frameworks
 */
final class Request
{
    private string $method;
    private string $path;
    private array $query;
    private array $headers;
    private string $rawBody;

    private function __construct(
        string $method,
        string $path,
        array $query = [],
        array $headers = [],
        string $rawBody = ''
    ) {
        $this->method  = strtoupper(trim($method));
        $this->path    = $path;
        $this->query   = $query;
        $this->headers = $headers;
        $this->rawBody = $rawBody;
    }

    /**
     * [ES] Construye Request desde superglobales.
     * Esto define un contrato único y evita que el resto del sistema lea $_SERVER directamente.
     */
    public static function fromGlobals(): self
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $uri    = $_SERVER['REQUEST_URI'] ?? '/';

        // [ES] Separa path y query de REQUEST_URI
        $path = $uri;
        $qPos = strpos($uri, '?');
        if ($qPos !== false) {
            $path = substr($uri, 0, $qPos);
        }

        $query = $_GET ?? [];

        // [ES] Headers. getallheaders() existe en Apache, pero no siempre en CLI.
        $headers = [];
        if (function_exists('getallheaders')) {
            $headers = getallheaders() ?: [];
        } else {
            // [ES] Fallback básico desde $_SERVER
            foreach ($_SERVER as $key => $value) {
                if (str_starts_with($key, 'HTTP_')) {
                    $hName = str_replace('_', '-', strtolower(substr($key, 5)));
                    $headers[$hName] = $value;
                }
            }
        }

        $rawBody = file_get_contents('php://input') ?: '';

        return new self($method, $path, $query, $headers, $rawBody);
    }

    /**
     * [ES] getMethod(): usado por Router para elegir tabla de rutas.
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * [ES] getPath(): debe devolver SOLO la ruta, sin query string.
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * [ES] Query params (GET).
     */
    public function getQuery(): array
    {
        return $this->query;
    }

    /**
     * [ES] Headers normalizados como array. Útil para auth, content-type, etc.
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * [ES] Body raw (JSON, form data, etc). En router mínimo no lo parseamos automáticamente.
     */
    public function getRawBody(): string
    {
        return $this->rawBody;
    }
}