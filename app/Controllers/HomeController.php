<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;

/**
 * HomeController
 *
 * Handles the public home endpoint.
 *
 * [ES]
 * - Un controller = una responsabilidad.
 * - No hay lógica de negocio aquí.
 * - Solo traducción HTTP -> respuesta.
 */
final class HomeController
{
    public function index(Request $request): Response
    {
        return Response::json([
            'ok' => true,
            'message' => 'Almadesign backend is running'
        ]);
    }
}