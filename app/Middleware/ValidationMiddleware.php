<?php
declare(strict_types=1);

namespace App\Middleware;

use App\Http\Request;
use App\Http\Response;
use App\Validation\Validator;
use App\Errors\ErrorCatalog;

/**
 * ValidationMiddleware
 *
 * [ES] Middleware explícito para validar:
 * - query params
 * - body
 * - route params
 *
 * [ES] Si la validación falla, el controller NO se ejecuta.
 */
final class ValidationMiddleware implements MiddlewareInterface
{
    private Validator $validator;
    private string $source;

    /**
     * @param Validator $validator
     * @param string $source  'query' | 'body' | 'params'
     */
    public function __construct(Validator $validator, string $source = 'body')
    {
        $this->validator = $validator;
        $this->source = $source;
    }

    public function handle(Request $request, callable $next): Response
    {
        $data = match ($this->source) {
            'query'  => $request->getQuery(),
            'params' => $request->getRouteParams(),
            default  => $request->getBody(),
        };

        if (!$this->validator->validate($data)) {
            $code = ErrorCatalog::VALIDATION_FAILED;

            return Response::json(
                ErrorCatalog::payload(
                    $code,
                    [
                        'method' => $request->getMethod(),
                        'path'   => $request->getPath(),
                        'source' => $this->source,
                    ],
                    $this->validator->errors()
                ),
                ErrorCatalog::status($code)
            );
        }

        return $next($request);
    }
}