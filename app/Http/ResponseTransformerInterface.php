<?php

declare(strict_types=1);

namespace App\Http;

/**
 * Contrato para normalizadores de Response.
 *
 * [ES] Permite transformar la salida final
 * antes de ser enviada al cliente.
 */
interface ResponseTransformerInterface
{
    public function transform(Response $response): Response;
}