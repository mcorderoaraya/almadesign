<?php

declare(strict_types=1);

namespace App\Http;

/**
 * Response mínima del sistema.
 *
 * [ES] Objetivo:
 * - Contener status, headers y body.
 * - Permitir Response::json(...) para API/debug.
 * - send() como única salida HTTP (no usar echo en otros lugares).
 */
final class Response
{
    private int $status;
    private array $headers;
    private string $body;

    public function __construct(string $body = '', int $status = 200, array $headers = [])
    {
        $this->body = $body;
        $this->status = $status;
        $this->headers = $headers;
    }

    /**
     * [ES] Factory JSON estándar.
     * - Siempre retorna Response.
     * - Content-Type fijo a application/json; charset=utf-8.
     */
    public static function json(array $data, int $status = 200, array $headers = []): self
    {
        $payload = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        if ($payload === false) {
            // [ES] Si JSON falla, respondemos de forma controlada.
            $payload = json_encode([
                'error' => 'json_encode_failed'
            ]);
            $status = 500;
        }

        $baseHeaders = [
            'Content-Type' => 'application/json; charset=utf-8',
            // [ES] Evita cache en respuestas de diagnóstico
            'Cache-Control' => 'no-store, no-cache, must-revalidate',
            'Pragma' => 'no-cache',
        ];

        return new self($payload, $status, array_merge($baseHeaders, $headers));
    }

    public function withHeader(string $name, string $value): self
    {
        $clone = clone $this;
        $clone->headers[$name] = $value;
        return $clone;
    }

    /**
     * [ES] Envía headers y body. Esta es la única capa autorizada a emitir output.
     */
    public function send(): void
    {
        http_response_code($this->status);

        foreach ($this->headers as $name => $value) {
            header($name . ': ' . $value);
        }

        echo $this->body;
    }
}