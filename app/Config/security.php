<?php
/**
 * Configuración de seguridad.
 * Define parámetros relacionados con la protección y control de acceso.
 * 
 * Retorna un arreglo asociativo con la configuración.
 * Los valores se obtienen desde variables de entorno para evitar hardcodeo.
 */

return [
    'session_name' => getenv('SESSION_NAME') ?: 'APP_SESSION', // Nombre de la sesión
    'session_timeout' => getenv('SESSION_TIMEOUT') ?: 3600, // Tiempo en segundos
    'password_hash_algorithm' => PASSWORD_DEFAULT, // Algoritmo para hash de contraseñas
    'csrf_token_length' => getenv('CSRF_TOKEN_LENGTH') ?: 32, // Longitud del token CSRF (placeholder)
    'csrf_session_key' => getenv('CSRF_SESSION_KEY') ?: 'csrf_token', // Clave de sesión para token CSRF
    'rate_limit_window_seconds' => getenv('RATE_LIMIT_WINDOW_SECONDS') ?: 60, // Ventana de tiempo para rate limiting
    'rate_limit_max_requests' => getenv('RATE_LIMIT_MAX_REQUESTS') ?: 100, // Máximo de solicitudes permitidas
    'rate_limit_enabled' => filter_var(getenv('RATE_LIMIT_ENABLED'), FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? true, // Activar limitación de tasa
];
