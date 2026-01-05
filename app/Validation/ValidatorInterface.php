<?php

declare(strict_types=1);

namespace App\Validation;

/**
 * Contrato base para validadores.
 *
 * [ES] Regla:
 * - El validador NO emite respuestas.
 * - Solo retorna errores estructurados.
 */
interface ValidatorInterface
{
    /**
     * @return array<string,string> Lista de errores (campo => mensaje)
     */
    public function validate(array $data): array;
}