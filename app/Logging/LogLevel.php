<?php
/**
 * Definición de niveles de log.
 * Constantes para uso en el sistema de logging.
 */

namespace App\Logging;

class LogLevel
{
    public const DEBUG = 'DEBUG';       // Información detallada para diagnóstico
    public const INFO = 'INFO';         // Información general sobre el funcionamiento
    public const WARNING = 'WARNING';   // Advertencias sobre posibles problemas
    public const ERROR = 'ERROR';       // Errores que afectan funcionalidades
    public const CRITICAL = 'CRITICAL'; // Errores críticos que requieren atención inmediata
}
