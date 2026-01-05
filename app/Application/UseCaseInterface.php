<?php
declare(strict_types=1);

namespace App\Application;

/**
 * UseCaseInterface
 *
 * EN:
 * Contract for all application use cases.
 *
 * ES:
 * Contrato base para casos de uso.
 * Un Use Case representa una intención del sistema.
 */
interface UseCaseInterface
{
    /**
     * Execute the use case.
     *
     * ES:
     * Ejecuta el caso de uso con un DTO de entrada.
     */
    public function execute(object $input): UseCaseResult;
}