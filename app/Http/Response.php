<?php
declare(strict_types=1);

namespace App\Http;

/**
 * Response (Minimal)
 *
 * Encapsulates HTTP response status, headers, and body.
 *
 * [ES] Esta clase define una salida HTTP estable.
 * [ES] Objetivo: evitar echo/header dispersos por el sistema.
 */
final class Response
{
    private int $statusCode;
    private array $headers;
    private string $body;

    public function __construct(string $body = '', int $statusCode = 200, array $headers = [])
    {
        $this->body       = $body;
        $this->statusCode = $statusCode;
        $this->headers    = $headers;
    }

    /**
     * Build a JSON response.
     *
     * [ES] Crea respuesta JSON sin asumir frameworks.
     */
    public static function json(array $data, int $statusCode = 200): self
    {
        $json = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        return new self(
            $json === false ? '{}' : $json,
            $statusCode,
            ['Content-Type' => 'application/json; charset=utf-8']
        );
    }

    /**
     * Build an HTML response.
     *
     * [ES] HTML básico para páginas.
     */
    public static function html(string $html, int $statusCode = 200): self
    {
        return new self(
            $html,
            $statusCode,
            ['Content-Type' => 'text/html; charset=utf-8']
        );
    }

    public function withHeader(string $name, string $value): self
    {
        $clone = clone $this;
        $clone->headers[$name] = $value;
        return $clone;
    }

    public function statusCode(): int
    {
        return $this->statusCode;
    }

    public function headers(): array
    {
        return $this->headers;
    }

    public function body(): string
    {
        return $this->body;
    }

    /**
     * Emit the response to the client.
     *
     * [ES] Centraliza emisión HTTP; el Kernel lo usa como salida final.
     */
    public function send(): void
    {
        http_response_code($this->statusCode);

        foreach ($this->headers as $name => $value) {
            header($name . ': ' . $value);
        }

        echo $this->body;
    }
}