<?php
declare(strict_types=1);

namespace App\Http;

/**
 * Class Response
 *
 * [ES] Representa una respuesta HTTP.
 * Centraliza headers, status code y output.
 */
final class Response
{
    private int $status;
    private array $headers;
    private string $body;

    private function __construct(string $body, int $status = 200, array $headers = [])
    {
        $this->body = $body;
        $this->status = $status;
        $this->headers = $headers;
    }

    /**
     * Create a JSON response.
     *
     * [ES] Crea una respuesta JSON estándar.
     */
    public static function json(array $data, int $status = 200): self
    {
        return new self(
            json_encode($data, JSON_UNESCAPED_UNICODE),
            $status,
            ['Content-Type' => 'application/json; charset=UTF-8']
        );
    }

    /**
     * Send response to client.
     *
     * [ES] Emite headers y cuerpo al cliente.
     */
    public function send(): void
    {
        http_response_code($this->status);

        foreach ($this->headers as $name => $value) {
            header("$name: $value");
        }

        echo $this->body;
    }
}