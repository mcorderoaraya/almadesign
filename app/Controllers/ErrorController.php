<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;

/**
 * ErrorController
 *
 * ÚNICO responsable de:
 * - 404
 * - 500
 * - Errores de dominio
 */
final class ErrorController
{
    /**
     * Ruta no encontrada
     */
    public function notFound(Request $request): Response
    {
        return Response::json([
            'error'  => 'Not Found',
            'path'   => $request->getPath(),
            'method'=> $request->getMethod()
        ], 404);
    }

    /**
     * Error no controlado
     */
    public function exception(Request $request, \Throwable $e): Response
    {
        return Response::json([
            'error'   => 'Internal Server Error',
            'message' => $e->getMessage(),
            'path'    => $request->getPath()
        ], 500);
    }
}