<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;

/**
 * HealthController
 *
 * System health check endpoint.
 *
 * [ES]
 * - Endpoint técnico.
 * - No depende de DB ni servicios.
 */
final class HealthController
{
    public function check(Request $request): Response
    {
        return Response::json([
            'status' => 'healthy',
            'timestamp' => date('c')
        ]);
    }
}