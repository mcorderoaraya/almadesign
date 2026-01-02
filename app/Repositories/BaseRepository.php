<?php
/**
 * Clase abstracta base para repositorios.
 * Responsable de manejar la inyección de la conexión ORM.
 * No contiene métodos de consulta aún.
 */

namespace App\Repositories;

abstract class BaseRepository
{
    protected $ormConnection;

    /**
     * Constructor que recibe la conexión ORM.
     * 
     * @param mixed $ormConnection Instancia de la conexión ORM.
     */
    public function __construct($ormConnection)
    {
        $this->ormConnection = $ormConnection;
    }
}
