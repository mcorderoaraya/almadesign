<?php
/**
 * Servicio para helpers de seguridad.
 * Provee métodos para escape seguro de HTML y atributos para mitigar XSS.
 */

namespace App\Services;

class SecurityService
{
    /**
     * Escapa una cadena para salida segura en HTML.
     * 
     * @param string $string
     * @return string
     */
    public function escapeHtml(string $string): string
    {
        return htmlspecialchars($string, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }

    /**
     * Escapa una cadena para salida segura en atributos HTML.
     * 
     * @param string $string
     * @return string
     */
    public function escapeAttr(string $string): string
    {
        return htmlspecialchars($string, ENT_QUOTES | ENT_HTML5 | ENT_SUBSTITUTE, 'UTF-8');
    }
}
