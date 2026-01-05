<?php
declare(strict_types=1);

namespace App\Http;

/**
 * Request
 *
 * [ES] Objeto Request mínimo. Centraliza método/path/query/body/headers.
 * [ES] Soporta params de ruta (route params) para /users/{id}.
 */
final class Request
{
    /** @var array<string, string> */
    private array $headers = [];

    /** @var array<string, mixed> */
    private array $query = [];

    /** @var array<string, mixed> */
    private array $body = [];

    /** @var array<string, string> */
    private array $routeParams = [];

    public function __construct(
        private string $method,
        private string $path,
        array $query = [],
        array $body = [],
        array $headers = []
    ) {
        $this->method  = strtoupper($method);
        $this->path    = $this->normalizePath($path);
        $this->query   = $query;
        $this->body    = $body;
        $this->headers = $this->normalizeHeaders($headers);
    }

    /**
     * [ES] Construye el Request desde PHP superglobals (Apache/FPM).
     * [ES] Esto evita que index.php invente strings “a mano”.
     */
    public static function fromGlobals(): self
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

        // PATH: preferimos REQUEST_URI (incluye query), luego parse_url.
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $path = (string)(parse_url($uri, PHP_URL_PATH) ?? '/');

        $query = $_GET ?? [];

        // Body: intenta JSON; si no, usa $_POST.
        $raw = (string)file_get_contents('php://input');
        $body = $_POST ?? [];

        $contentType = $_SERVER['CONTENT_TYPE'] ?? $_SERVER['HTTP_CONTENT_TYPE'] ?? '';
        if ($raw !== '' && stripos($contentType, 'application/json') !== false) {
            $decoded = json_decode($raw, true);
            if (is_array($decoded)) {
                $body = $decoded;
            }
        }

        // Headers: getallheaders() no siempre existe dependiendo de SAPIs.
        $headers = function_exists('getallheaders') ? (getallheaders() ?: []) : self::headersFromServer($_SERVER);

        return new self($method, $path, $query, $body, $headers);
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * [ES] Path “puro”: /users/10 (sin query string).
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /** @return array<string, mixed> */
    public function getQuery(): array
    {
        return $this->query;
    }

    /** @return array<string, mixed> */
    public function getBody(): array
    {
        return $this->body;
    }

    /**
     * [ES] Headers normalizados a lower-case.
     * @return array<string, string>
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function header(string $name, string $default = ''): string
    {
        $key = strtolower(trim($name));
        return $this->headers[$key] ?? $default;
    }

    /**
     * [ES] Params inyectados por el router (ej: id=10).
     * @return array<string, string>
     */
    public function getRouteParams(): array
    {
        return $this->routeParams;
    }

    public function routeParam(string $key, string $default = ''): string
    {
        return $this->routeParams[$key] ?? $default;
    }

    /**
     * [ES] Solo Router/Kernel deberían setear esto.
     * @param array<string, string> $params
     */
    public function withRouteParams(array $params): self
    {
        $clone = clone $this;
        $clone->routeParams = $params;
        return $clone;
    }

    // -------------------------
    // Helpers internos
    // -------------------------

    private function normalizePath(string $path): string
    {
        $path = trim($path);
        if ($path === '') return '/';
        if ($path[0] !== '/') $path = '/' . $path;

        // [ES] Remueve trailing slash salvo raíz.
        if (strlen($path) > 1) {
            $path = rtrim($path, '/');
        }
        return $path;
    }

    /**
     * @param array<string, mixed> $headers
     * @return array<string, string>
     */
    private function normalizeHeaders(array $headers): array
    {
        $out = [];
        foreach ($headers as $k => $v) {
            $key = strtolower(trim((string)$k));
            $val = is_array($v) ? implode(', ', $v) : (string)$v;
            $out[$key] = $val;
        }
        return $out;
    }

    /**
     * [ES] Fallback para extraer headers desde $_SERVER si no hay getallheaders().
     * @param array<string, mixed> $server
     * @return array<string, string>
     */
    private static function headersFromServer(array $server): array
    {
        $headers = [];
        foreach ($server as $key => $value) {
            if (str_starts_with((string)$key, 'HTTP_')) {
                $name = strtolower(str_replace('_', '-', substr((string)$key, 5)));
                $headers[$name] = (string)$value;
            }
        }
        // Content-Type/Length no vienen con HTTP_
        if (isset($server['CONTENT_TYPE'])) {
            $headers['content-type'] = (string)$server['CONTENT_TYPE'];
        }
        if (isset($server['CONTENT_LENGTH'])) {
            $headers['content-length'] = (string)$server['CONTENT_LENGTH'];
        }
        return $headers;
    }
}