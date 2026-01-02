<?php
/**
 * Configuración del sistema de logging.
 * Define opciones para habilitar, ruta, nivel mínimo y formato de fecha.
 * Valores obtenidos desde variables de entorno para evitar hardcodeo.
 * 
 * Retorna un arreglo asociativo con la configuración.
 */

return [
    'enabled' => filter_var(getenv('LOGGING_ENABLED'), FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? true, // Activar logging
    'log_path' => getenv('LOG_PATH') ?: __DIR__ . '/../../logs', // Ruta para almacenar archivos de log
    'minimum_level' => getenv('LOG_MINIMUM_LEVEL') ?: 'WARNING', // Nivel mínimo para registrar
    'date_format' => getenv('LOG_DATE_FORMAT') ?: 'Y-m-d H:i:s', // Formato de fecha para logs
];
