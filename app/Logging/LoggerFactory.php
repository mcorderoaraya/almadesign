<?php
declare(strict_types=1);

namespace App\Logging;

/**
 * LoggerFactory
 *
 * [ES] Construye Logger desde configuración.
 * [ES] Aquí se traduce config -> parámetros del constructor real.
 */
final class LoggerFactory
{
    public static function fromConfig(array $config): Logger
    {
        // [ES] Traduce config a parámetros reales del constructor.
        // [ES] Reemplaza esta línea por TU firma real:
        // return new Logger($config['path'], $config['channel'], $config['min_level']);

        // Placeholder explícito (para que no “pase” silenciosamente):
        throw new \RuntimeException('LoggerFactory::fromConfig must be implemented to match Logger::__construct signature.');
    }
}