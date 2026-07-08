<?php
declare(strict_types=1);

namespace App\Services;

use JsonException;
use RuntimeException;

/**
 * Cliente HTTP interno para conectar el sitio PHP con RACK CORE RAG.
 *
 * El navegador conversa con rutas same-origin del sitio y este cliente llama al
 * backend FastAPI. Así evitamos exponer `127.0.0.1:8000`, reducimos problemas
 * CORS y mantenemos el contrato público del RAG bajo control del sitio.
 */
final class RagClient
{
    public function __construct(
        private readonly string $baseUrl,
        private readonly float $timeoutSeconds,
    ) {
    }

    public function startConversation(): RagResponse
    {
        return $this->request('GET', '/conversation/start');
    }

    /**
     * @param array<string, mixed> $payload
     */
    public function chat(array $payload): RagResponse
    {
        try {
            $body = json_encode($payload, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        } catch (JsonException $exception) {
            throw new RagUnavailable('No fue posible preparar la consulta para el RAG.', 0, $exception);
        }

        return $this->request('POST', '/chat', $body);
    }

    private function request(string $method, string $path, ?string $body = null): RagResponse
    {
        $headers = [
            'Accept: application/json',
        ];

        if ($body !== null) {
            $headers[] = 'Content-Type: application/json';
        }

        $context = stream_context_create([
            'http' => [
                'method' => $method,
                'header' => implode("\r\n", $headers),
                'content' => $body ?? '',
                'ignore_errors' => true,
                'timeout' => $this->timeoutSeconds,
            ],
        ]);

        $responseBody = @file_get_contents($this->endpoint($path), false, $context);
        if ($responseBody === false) {
            throw new RagUnavailable('El RAG no respondió dentro del tiempo esperado.');
        }

        return new RagResponse(
            statusCode: $this->statusCode($http_response_header ?? []),
            body: $responseBody,
        );
    }

    private function endpoint(string $path): string
    {
        return rtrim($this->baseUrl, '/') . '/' . ltrim($path, '/');
    }

    /**
     * @param list<string> $headers
     */
    private function statusCode(array $headers): int
    {
        foreach ($headers as $header) {
            if (preg_match('/^HTTP\/\S+\s+(\d{3})/', $header, $matches) === 1) {
                return (int) $matches[1];
            }
        }

        return 502;
    }
}

final class RagResponse
{
    public function __construct(
        public readonly int $statusCode,
        public readonly string $body,
    ) {
    }
}

final class RagUnavailable extends RuntimeException
{
}
