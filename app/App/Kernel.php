<?php

namespace App\App;

use App\Routing\Router;
use App\Http\Request;
use App\Http\Response;
use App\Controllers\ErrorController;

/**
 * Kernel
 *
 * ÚNICO lugar donde:
 * - existe try/catch
 * - se transforma error → HTTP
 */
final class Kernel
{
    private Router $router;
    private ErrorController $errorController;

    public function __construct(
        Router $router,
        ErrorController $errorController
    ) {
        $this->router = $router;
        $this->errorController = $errorController;
    }

    /**
     * Maneja el ciclo completo de la aplicación
     */
    public function handle(Request $request): Response
    {
        try {
            return $this->router->dispatch($request);

        } catch (\RuntimeException $e) {
            // Errores esperables del dominio (404, etc)
            if ($e->getCode() === 404) {
                return $this->errorController->notFound($request);
            }

            return $this->errorController->exception($request, $e);

        } catch (\Throwable $e) {
            // CUALQUIER otro error
            return $this->errorController->exception($request, $e);
        }
    }
}