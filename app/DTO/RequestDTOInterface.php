<?php
declare(strict_types=1);

namespace App\DTO;

use App\Http\Request;

/**
 * RequestDTOInterface
 *
 * EN:
 * Contract for all Request DTOs.
 *
 * ES:
 * Contrato base para DTOs de entrada.
 * Un DTO representa datos YA VALIDADOS.
 */
interface RequestDTOInterface
{
    /**
     * Build DTO from HTTP Request.
     *
     * ES:
     * Construye el DTO desde Request.
     * Se asume que la validación ya ocurrió.
     */
    public static function fromRequest(Request $request): static;
}