<?php

declare(strict_types=1);

namespace App\Http;

/**
 * JsonResponseTransformer
 *
 * [ES] Envuelve la respuesta JSON en un
 * formato estándar de API.
 */
final class JsonResponseTransformer implements ResponseTransformerInterface
{
    public function transform(Response $response): Response
    {
        $payload = json_decode($response->getBody(), true);

        // Si no es JSON válido, no se transforma
        if ($payload === null) {
            return $response;
        }

        $isSuccess = $response->getStatus() < 400;

        $normalized = [
            'success' => $isSuccess,
            $isSuccess ? 'data' : 'error' => $payload,
            'meta' => [
                'timestamp' => date('c')
            ]
        ];

        return Response::json(
            $normalized,
            $response->getStatus(),
            $response->getHeaders()
        );
    }
}