<?php
declare(strict_types=1);

namespace App\Routing;

use App\Http\Request;

/**
 * RouteCollection
 *
 * [ES] Guarda rutas y resuelve match(Request) -> MatchedRoute|null
 * [ES] Soporta:
 *  - /users/{id}
 *  - /users/{id:\d+}
 */
final class RouteCollection
{
    /** @var array<int, array<string, mixed>> */
    private array $routes = [];

    /**
     * @param list<class-string> $middlewares
     */
    public function add(string $method, string $pattern, callable $handler, array $middlewares = []): void
    {
        $method  = strtoupper($method);
        $pattern = $this->normalizePath($pattern);

        [$regex, $paramNames] = $this->compilePattern($pattern);

        $this->routes[] = [
            'method'      => $method,
            'pattern'     => $pattern,
            'regex'       => $regex,
            'paramNames'  => $paramNames,
            'handler'     => $handler,
            'middlewares' => $middlewares,
        ];
    }

    public function match(Request $request): ?MatchedRoute
    {
        $method = $request->getMethod();
        $path   = $this->normalizePath($request->getPath());

        foreach ($this->routes as $r) {
            if ($r['method'] !== $method) {
                continue;
            }

            if (preg_match($r['regex'], $path, $m) !== 1) {
                continue;
            }

            // Extrae params por nombre.
            $params = [];
            foreach ($r['paramNames'] as $name) {
                if (isset($m[$name])) {
                    $params[$name] = (string)$m[$name];
                }
            }

            return new MatchedRoute(
                method: $method,
                pattern: $r['pattern'],
                handler: $r['handler'],
                params: $params,
                middlewares: $r['middlewares']
            );
        }

        return null;
    }

    // -------------------------
    // Helpers internos
    // -------------------------

    private function normalizePath(string $path): string
    {
        $path = trim($path);
        if ($path === '') return '/';
        if ($path[0] !== '/') $path = '/' . $path;
        if (strlen($path) > 1) $path = rtrim($path, '/');
        return $path;
    }

    /**
     * [ES] Compila /users/{id:\d+} en regex con named groups.
     *
     * @return array{0:string,1:list<string>} regex, paramNames
     */
    private function compilePattern(string $pattern): array
    {
        $paramNames = [];

        // Escapa slashes para regex, pero dejamos los { } para procesarlos.
        $regex = preg_replace_callback('/\{([a-zA-Z_][a-zA-Z0-9_]*)(:([^}]+))?\}/', function ($matches) use (&$paramNames) {
            $name = $matches[1];
            $constraint = $matches[3] ?? '[^/]+';

            $paramNames[] = $name;

            // Named group: (?P<id>\d+)
            return '(?P<' . $name . '>' . $constraint . ')';
        }, $pattern);

        if (!is_string($regex)) {
            // Fallback ultra defensivo.
            $regex = preg_quote($pattern, '/');
        } else {
            // Escapa puntos u otros caracteres fuera de params:
            // Para mantenerlo simple, asumimos que el patrón es estilo URL.
            // (Si empiezas a meter caracteres raros, tú mismo te lo buscas.)
        }

        $final = '/^' . str_replace('/', '\/', $regex) . '$/';

        return [$final, $paramNames];
    }
}

/**
 * MatchedRoute
 *
 * [ES] Resultado del match: handler + params + middlewares por ruta.
 */
final class MatchedRoute
{
    /**
     * @param array<string, string> $params
     * @param list<class-string> $middlewares
     */
    public function __construct(
        public string $method,
        public string $pattern,
        public $handler,
        public array $params = [],
        public array $middlewares = [],
    ) {}
}