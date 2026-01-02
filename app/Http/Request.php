<?php
declare(strict_types=1);

namespace App\Http;

/**
 * Request (Minimal)
 *
 * Represents a normalized HTTP request built from PHP globals.
 *
 * [ES] Esta clase encapsula la petición HTTP.
 * [ES] Objetivo: NO tocar $_GET/$_POST/$_SERVER en el resto del sistema.
 * [ES] Soporta input JSON y formularios.
 */
final class Request
{
    private string $method;
    private string $path;
    private array $headers;
    private array $query;
    private array $body;
    private array $server;

    private function __construct(
        string $method,
        string $path,
        array $headers,
        array $query,
        array $body,
        array $server
    ) {
        $this->method  = strtoupper($method);
        $this->path    = $path;
        $this->headers = $headers;
        $this->query   = $query;
        $this->body    = $body;
        $this->server  = $server;
    }

    /**
     * Build a Request from PHP globals.
     *
     * [ES] Convierte el entorno PHP en una estructura estable e inmutable.
     */
    public static function fromGlobals(): self
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

        // [ES] REQUEST_URI incluye querystring; nosotros queremos solo la ruta.
        $uri  = $_SERVER['REQUEST_URI'] ?? '/';
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';

        $headers = self::readHeaders();
        $query   = $_GET ?? [];

        // [ES] Soporte JSON: si el Content-Type indica JSON, intentamos decodificar.
        $body = self::readBody($headers);

        return new self($method, $path, $headers, $query, $body, $_SERVER);
    }

    /**
     * [ES] Lee headers de manera compatible con Apache/Windows.
     */
    private static function readHeaders(): array
    {
        if (function_exists('getallheaders')) {
            $h = getallheaders();
            return is_array($h) ? $h : [];
        }

        // [ES] Fallback para entornos donde getallheaders no existe.
        $headers = [];
        foreach ($_SERVER as $key => $value) {
            if (str_starts_with($key, 'HTTP_')) {
                $name = str_replace('_', '-', substr($key, 5));
                $headers[$name] = $value;
            }
        }
        return $headers;
    }

    /**
     * [ES] Lee el body desde php://input (JSON) o $_POST (form).
     */
    private static function readBody(array $headers): array
    {
        $contentType = '';
        foreach ($headers as $k => $v) {
            if (strtolower((string)$k) === 'content-type') {
                $contentType = strtolower((string)$v);
                break;
            }
        }

        $raw = file_get_contents('php://input') ?: '';

        if ($raw !== '' && str_contains($contentType, 'application/json')) {
            $decoded = json_decode($raw, true);
            return is_array($decoded) ? $decoded : [];
        }

        // [ES] Si no es JSON, usamos POST tradicional.
        return $_POST ?? [];
    }

    // ---------------- Public API ----------------

    public function method(): string
    {
        return $this->method;
    }

    public function path(): string
    {
        return $this->path;
    }

    public function headers(): array
    {
        return $this->headers;
    }

    public function query(): array
    {
        return $this->query;
    }

    public function body(): array
    {
        return $this->body;
    }

    public function server(): array
    {
        return $this->server;
    }

    /**
     * Retrieve an input value.
     * Looks first in body, then in query.
     *
     * [ES] Entrada unificada: primero body, luego query.
     */
    public function input(string $key, mixed $default = null): mixed
    {
        if (array_key_exists($key, $this->body)) {
            return $this->body[$key];
        }
        if (array_key_exists($key, $this->query)) {
            return $this->query[$key];
        }
        return $default;
    }

    /**
     * Retrieve a header value (case-sensitive for now).
     *
     * [ES] En esta fase no normalizamos mayúsculas/minúsculas para headers.
     * [ES] Se puede mejorar en fases posteriores si hace falta.
     */
    public function header(string $name, mixed $default = null): mixed
    {
        return $this->headers[$name] ?? $default;
    }
}