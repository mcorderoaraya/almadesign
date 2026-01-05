<?php
declare(strict_types=1);

namespace App\Errors;

// Agregar al inicio
use App\Exceptions\DomainException;
use App\Exceptions\ValidationException;
use App\Exceptions\AuthException;

use Throwable;

/**
 * [ES] Catálogo central de errores del sistema.
 * [ES] Regla: Ningún controller/router/middleware debe "inventar" HTTP status o mensajes.
 * [ES] Todo sale desde aquí para asegurar consistencia y trazabilidad.
 */
final class ErrorCatalog
{
    // =========================
    // [ES] Códigos internos (estables)
    // =========================
    public const NOT_FOUND            = 'NOT_FOUND';
    public const METHOD_NOT_ALLOWED   = 'METHOD_NOT_ALLOWED';

    public const VALIDATION_FAILED    = 'VALIDATION_FAILED';
    public const UNAUTHORIZED         = 'UNAUTHORIZED';
    public const FORBIDDEN            = 'FORBIDDEN';

    public const CSRF_FAILED          = 'CSRF_FAILED';
    public const RATE_LIMITED         = 'RATE_LIMITED';

    public const INTERNAL_ERROR       = 'INTERNAL_ERROR';

    /**
     * [ES] Definición única: código interno -> (http_status, mensaje público)
     * [ES] El mensaje público debe ser estable y no filtrar detalles sensibles.
     */
    private const DEFINITIONS = [
        self::NOT_FOUND => [
            'status'  => 404,
            'message' => 'Not Found',
        ],
        self::METHOD_NOT_ALLOWED => [
            'status'  => 405,
            'message' => 'Method Not Allowed',
        ],
        self::VALIDATION_FAILED => [
            'status'  => 422,
            'message' => 'Validation Failed',
        ],
        self::UNAUTHORIZED => [
            'status'  => 401,
            'message' => 'Unauthorized',
        ],
        self::FORBIDDEN => [
            'status'  => 403,
            'message' => 'Forbidden',
        ],
        self::CSRF_FAILED => [
            'status'  => 419, // [ES] Convención común para CSRF (no estándar RFC, pero práctico).
            'message' => 'CSRF Token Invalid',
        ],
        self::RATE_LIMITED => [
            'status'  => 429,
            'message' => 'Too Many Requests',
        ],
        self::INTERNAL_ERROR => [
            'status'  => 500,
            'message' => 'Internal Server Error',
        ],
    ];

    /**
     * [ES] Obtiene status HTTP por código interno.
     */
    public static function status(string $code): int
    {
        return self::DEFINITIONS[$code]['status'] ?? 500;
    }

    /**
     * [ES] Obtiene mensaje público por código interno.
     */
    public static function publicMessage(string $code): string
    {
        return self::DEFINITIONS[$code]['message'] ?? 'Internal Server Error';
    }

    /**
     * [ES] Normaliza un error a un paquete estándar.
     * [ES] `details` es opcional y se usa solo para validación u otros errores "seguros".
     */
    public static function payload(
        string $code,
        array $meta = [],
        array $details = []
    ): array {
        $payload = [
            'success' => false,
            'error'   => self::publicMessage($code),
            'code'    => $code,
            'meta'    => $meta,
        ];

        if (!empty($details)) {
            // [ES] Detalles solo cuando se decide explícitamente (ej: validación).
            $payload['details'] = $details;
        }

        return $payload;
    }

    /**
     * [ES] Mapear excepciones a códigos internos (mínimo viable).
     * [ES] Si mañana introduces excepciones específicas (ValidationException, AuthException),
     * [ES] se centraliza aquí el mapeo para no ensuciar el Kernel.
     */
    public static function fromException(\Throwable $e): string
    {
        // ES: Excepciones de dominio tienen prioridad
        if ($e instanceof DomainException) {
            return $e->getDomainCode();
        }

        // ES: Fallback técnico
        return self::INTERNAL_ERROR;
    }
}