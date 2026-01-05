<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Errors\ErrorCatalog;
use App\Http\Request;
use App\Http\Response;
use Throwable;

/**
 * [ES] Controller central de errores.
 * [ES] Regla: este controller NO define status/mensajes, solo usa ErrorCatalog.
 */
final class ErrorController
{
    /**
     * [ES] 404 estándar cuando no hay match de ruta o constraint.
     */
    public function notFound(Request $request): Response
    {
        $code = ErrorCatalog::NOT_FOUND;

        $meta = [
            'method' => $request->getMethod(),
            'path'   => $request->getPath(),
        ];

        return Response::json(
            ErrorCatalog::payload($code, $meta),
            ErrorCatalog::status($code)
        );
    }

    /**
     * [ES] Manejo central de excepciones NO controladas.
     * [ES] Importante: no filtrar el mensaje real de la excepción a producción.
     * [ES] Durante desarrollo puedes incluir trazas, pero por gobernanza debe estar controlado.
     */
    public function exception(Throwable $e, ?Request $request = null): Response
    {
        $code = ErrorCatalog::fromException($e);

        $meta = [
            'timestamp' => gmdate('c'),
        ];

        if ($request !== null) {
            $meta['method'] = $request->getMethod();
            $meta['path']   = $request->getPath();
        }

        // [ES] Modo desarrollo: si quieres incluir el mensaje real, hazlo bajo flag de entorno,
        // [ES] nunca “por defecto”.
        // [ES] Por ahora: respuesta pública limpia.
        return Response::json(
            ErrorCatalog::payload($code, $meta),
            ErrorCatalog::status($code)
        );
    }

    /**
     * [ES] 405 estándar si el path existe pero método no (si implementas esa lógica en Router).
     * [ES] Si tu Router aún no distingue esto, no se usa.
     */
    public function methodNotAllowed(Request $request): Response
    {
        $code = ErrorCatalog::METHOD_NOT_ALLOWED;

        $meta = [
            'method' => $request->getMethod(),
            'path'   => $request->getPath(),
        ];

        return Response::json(
            ErrorCatalog::payload($code, $meta),
            ErrorCatalog::status($code)
        );
    }
}