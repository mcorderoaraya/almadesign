<?php
declare(strict_types=1);

namespace App\Http;

/**
 * [ES] Representa una respuesta HTTP mínima y controlada.
 * [ES] Regla: toda salida se emite vía Response->send(), no con echo suelto.
 */
final class Response
{
    private int $status;
    /** @var array<string,string> */
    private array $headers;
    private string $body;

    public function __construct(string $body = '', int $status = 200, array $headers = [])
    {
        $this->body = $body;
        $this->status = $status;

        // [ES] Normaliza headers en formato key => value
        $this->headers = [];
        foreach ($headers as $k => $v) {
            $this->headers[(string)$k] = (string)$v;
        }
    }

    public function withStatus(int $status): self
    {
        $clone = clone $this;
        $clone->status = $status;
        return $clone;
    }

    public function withHeader(string $key, string $value): self
    {
        $clone = clone $this;
        $clone->headers[$key] = $value;
        return $clone;
    }

    /**
     * [ES] Creador estándar de JSON. No inventar headers en otros lados.
     */
    public static function json(array $data, int $status = 200, array $headers = []): self
    {
        $baseHeaders = [
            'Content-Type' => 'application/json; charset=utf-8',
            // [ES] Evita caché durante desarrollo/validación.
            'Cache-Control' => 'no-store, no-cache, must-revalidate',
            'Pragma' => 'no-cache',
        ];

        // [ES] Permite override explícito.
        foreach ($headers as $k => $v) {
            $baseHeaders[(string)$k] = (string)$v;
        }

        return new self(json_encode($data, JSON_UNESCAPED_UNICODE), $status, $baseHeaders);
    }

    /**
     * [ES] Emite la respuesta al cliente. Este es el único final válido.
     */
    public function send(): void
    {
        http_response_code($this->status);

        foreach ($this->headers as $k => $v) {
            header($k . ': ' . $v);
        }

        echo $this->body;
    }

    // [ES] Helpers de introspección útiles para tests/manual debugging.
    public function getStatus(): int { return $this->status; }
    public function getBody(): string { return $this->body; }
    public function getHeaders(): array { return $this->headers; }
}