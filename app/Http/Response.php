<?php
declare(strict_types=1);

namespace App\Http;

/**
 * [ES] Response mínimo:
 * - status
 * - headers
 * - body
 * - send(): emite la respuesta HTTP
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
     * [ES] Response JSON estándar.
     * - Encodes con JSON_THROW_ON_ERROR para no esconder bugs
     * - Fuerza Content-Type application/json
     */
    public static function json(array $data, int $status = 200): self
    {
        $json = json_encode(
            $data,
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR
        );

        return new self(
            $json,
            $status,
            ['Content-Type' => 'application/json; charset=utf-8']
        );
    }

    public function withHeader(string $name, string $value): self
    {
        // [ES] Inmutabilidad simple: devuelve clon con header agregado.
        $clone = clone $this;
        $clone->headers[$name] = $value;
        return $clone;
    }

    public function send(): void
    {
        /**
         * [ES] En CLI no existen headers; evitamos warnings.
         * En Apache sí se emite normalmente.
         */
        if (php_sapi_name() !== 'cli') {
            http_response_code($this->status);
            foreach ($this->headers as $name => $value) {
                header($name . ': ' . $value);
            }
        }

        echo $this->body;
    }
}