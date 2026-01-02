<?php
/**
 * Configuración de la base de datos.
 * Los valores se obtienen desde variables de entorno para evitar credenciales hardcodeadas.
 * 
 * Retorna un arreglo asociativo con la configuración.
 */

return [
    'driver' => getenv('DB_DRIVER') ?: 'mysql', // Motor de base de datos
    'host' => getenv('DB_HOST') ?: 'localhost', // Dirección del servidor
    'port' => getenv('DB_PORT') ?: 3306, // Puerto de conexión
    'database' => getenv('DB_DATABASE') ?: '', // Nombre de la base de datos
    'username' => getenv('DB_USERNAME') ?: '', // Usuario de la base de datos
    'password' => getenv('DB_PASSWORD') ?: '', // Contraseña de la base de datos
    'charset' => getenv('DB_CHARSET') ?: 'utf8mb4', // Codificación de caracteres
];
