<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;

/**
 * Controlador de errores del sistema.
 * [ES] Centraliza respuestas 404 y excepciones no controladas.
 */
final class ErrorController
{
    /**
     * [ES] Maneja rutas no encontradas (404).
     */
    public function notFound(Request $request): Response
    {
        return Response::json(
            [
                'error'  => 'Not Found',
                'path'   => $request->getPath(),
                'method' => $request->getMethod(),
            ],
            404
        );
    }

    /**
     * [ES] Maneja excepciones no controladas del sistema.
     */
    public function exception(\Throwable $e): Response
    {
        return Response::json(
            [
                'error'   => 'Application error',
                'message' => $e->getMessage(),
            ],
            500
        );
    }
}