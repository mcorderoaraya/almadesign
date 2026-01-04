<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;

/**
 * [ES] Healthcheck del sistema.
 */
final class HealthController
{
    public function check(Request $request): Response
    {
        return Response::json([
            'status' => 'healthy',
        ]);
    }
}