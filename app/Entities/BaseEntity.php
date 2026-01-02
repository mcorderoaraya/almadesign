<?php
/**
 * Clase abstracta base para entidades.
 * Define el mapeo de propiedades como placeholder.
 * No contiene lógica de persistencia.
 */

namespace App\Entities;

abstract class BaseEntity
{
    /**
     * Mapeo de propiedades de la entidad.
     * Placeholder para futura implementación.
     * 
     * @var array
     */
    protected static array $propertyMap = [];

    /**
     * Obtiene el mapeo de propiedades.
     * 
     * @return array
     */
    public static function getPropertyMap(): array
    {
        return static::$propertyMap;
    }
}
