<?php
declare(strict_types=1);

namespace App\App;

use App\Controllers\ErrorController;
use App\Errors\ErrorCatalog;
use App\Exceptions\ValidationException;
use App\Http\Request;
use App\Http\Response;
use App\Routing\Router;
use Throwable;

/**
 * Kernel
 *
 * ES:
 * Traduce excepciones del dominio a respuestas normalizadas.
 */
final class Kernel
{
    private Router $router;
    private ErrorController $errorController;

    public function __construct(Router $router, ErrorController $errorController)
    {
        $this->router = $router;
        $this->errorController = $errorController;
    }

    public function handle(Request $request): Response
    {
        try {
            return $this->router->dispatch($request);
        } catch (ValidationException $e) {
            // ES: Caso especial: errores de validación traen details
            $code = ErrorCatalog::VALIDATION_FAILED;

            return Response::json(
                ErrorCatalog::payload(
                    $code,
                    [
                        'method' => $request->getMethod(),
                        'path'   => $request->getPath(),
                    ],
                    $e->getErrors()
                ),
                ErrorCatalog::status($code)
            );
        } catch (Throwable $e) {
            // ES: Todo lo demás pasa por el catálogo
            return $this->errorController->exception($e, $request);
        }
    }
}