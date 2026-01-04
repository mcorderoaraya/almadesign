<?php

declare(strict_types=1);

namespace App\Http;

/**
 * Request HTTP minimalista.
 * Responsable de:
 * - Método
 * - Path
 * - Query
 * - Params de ruta (dinámicos)
 */
final class Request
{
    private string $method;
    private string $path;
    private array $query;
    private array $params = [];

    private function __construct(string $method, string $path, array $query)
    {
        $this->method = strtoupper($method);
        $this->path   = $path;
        $this->query  = $query;
    }

    public static function fromGlobals(): self
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        return new self(
            $_SERVER['REQUEST_METHOD'] ?? 'GET',
            rtrim($uri, '/') ?: '/',
            $_GET
        );
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    /* =========================
       PARAMS DE RUTA
       ========================= */

    public function setParams(array $params): void
    {
        $this->params = $params;
    }

    public function getParam(string $key, mixed $default = null): mixed
    {
        return $this->params[$key] ?? $default;
    }

    public function getParams(): array
    {
        return $this->params;
    }
}