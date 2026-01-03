<?php
declare(strict_types=1);

namespace App\Http;

/**
 * Class Request
 *
 * [ES] Representa una solicitud HTTP entrante.
 * Centraliza el acceso a variables globales.
 */
final class Request
{
    private string $method;
    private string $path;
    private array $query;
    private array $body;

    private function __construct(
        string $method,
        string $path,
        array $query,
        array $body
    ) {
        $this->method = $method;
        $this->path   = $path;
        $this->query  = $query;
        $this->body   = $body;
    }

    /**
     * Build request from PHP globals.
     *
     * [ES] Fábrica de Request a partir de $_SERVER, $_GET y php://input.
     */
    public static function fromGlobals(): self
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $parsed = parse_url($uri);

        $path = '/' . trim($parsed['path'] ?? '/', '/');

        parse_str($parsed['query'] ?? '', $query);

        $rawBody = file_get_contents('php://input');
        $decoded = json_decode($rawBody, true);

        $body = is_array($decoded) ? $decoded : [];

        return new self(
            strtoupper($method),
            $path,
            $query,
            $body
        );
    }

    /**
     * [ES] Retorna método HTTP.
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * [ES] Retorna path sin query string.
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * [ES] Retorna parámetros GET.
     */
    public function getQuery(): array
    {
        return $this->query;
    }

    /**
     * [ES] Retorna body JSON.
     */
    public function getBody(): array
    {
        return $this->body;
    }
}