<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;

/**
 * [ES] Controlador principal del sistema.
 */
final class HomeController
{
    public function index(Request $request): Response
    {
        return Response::json([
            'ok'      => true,
            'service' => 'almadesign-backend',
        ]);
    }
}