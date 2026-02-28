<?php
declare(strict_types=1);

namespace App\Routing;

use App\Controllers\ErrorController;
use App\Http\Request;
use App\Http\Response;
use App\Middleware\MiddlewareInterface;
use Throwable;

/**
 * Router
 *
 * [ES] Router explícito, usando RouteCollection::match(Request).
 * [ES] Este archivo es donde antes se rompió el contrato pasando string a match().
 * [ES] Regla: match() SIEMPRE recibe Request.
 */
final class Router
{
    public function __construct(
        private RouteCollection $routes,
        private ErrorController $errors
    ) {}

    /**
     * @param list<class-string|MiddlewareInterface> $middlewares
     */
    public function get(string $pattern, callable $handler, array $middlewares = []): void
    {
        $this->routes->add('GET', $pattern, $handler, $middlewares);
    }

    /**
     * @param list<class-string|MiddlewareInterface> $middlewares
     */
    public function post(string $pattern, callable $handler, array $middlewares = []): void
    {
        $this->routes->add('POST', $pattern, $handler, $middlewares);
    }

    public function dispatch(Request $request): Response
    {
        try {
            $matched = $this->routes->match($request); // [ES] AQUÍ es donde NO se debe pasar string.
            if ($matched === null) {
                return $this->errors->notFound($request);
            }

            $requestWithParams = $request->withRouteParams($matched->params);

            // Handler base.
            $handler = function (Request $req) use ($matched): Response {
                // [ES] Permitimos handler(Request) o handler(Request, array $params)
                // sin Reflection pesada: probamos con 2 args y fallback a 1.
                try {
                    $res = ($matched->handler)($req, $req->getRouteParams());
                } catch (Throwable $e) {
                    // [ES] Si falló por argumentos, intentamos con 1.
                    $res = ($matched->handler)($req);
                }

                return ($res instanceof Response)
                    ? $res
                    : Response::json(['success' => false, 'error' => 'Invalid handler response'], 500);
            };

            // Middleware por ruta (clases), se ejecutan en orden.
            $pipeline = $handler;

            // [ES] Creamos el pipeline al revés.
            // [ES] Acepta instancias (MiddlewareInterface) o class-string.
            foreach (array_reverse($matched->middlewares) as $mwEntry) {
                $next = $pipeline;

                $pipeline = function (Request $req) use ($mwEntry, $next): Response {
                    // [ES] Caso 1: ya es una instancia lista.
                    if ($mwEntry instanceof MiddlewareInterface) {
                        return $mwEntry->handle($req, $next);
                    }

                    // [ES] Caso 2: es un class-string — instanciamos sin args.
                    if (!is_string($mwEntry) || !class_exists($mwEntry)) {
                        return Response::json([
                            'success' => false,
                            'error'   => 'Middleware class not found',
                            'meta'    => ['middleware' => is_string($mwEntry) ? $mwEntry : gettype($mwEntry)],
                        ], 500);
                    }

                    $mw = new $mwEntry();

                    if (!$mw instanceof MiddlewareInterface) {
                        return Response::json([
                            'success' => false,
                            'error'   => 'Invalid middleware (must implement MiddlewareInterface)',
                            'meta'    => ['middleware' => $mwEntry],
                        ], 500);
                    }

                    return $mw->handle($req, $next);
                };
            }

            return $pipeline($requestWithParams);
        } catch (Throwable $e) {
            return $this->errors->exception($e, $request);
        }
    }
}