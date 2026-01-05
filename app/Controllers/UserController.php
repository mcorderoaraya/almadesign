<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Application\GetUserUseCase;
use App\DTO\GetUserRequestDTO;

/**
 * UserController
 *
 * EN:
 * Thin HTTP controller for user-related endpoints.
 *
 * ES:
 * Controller delgado.
 * - No contiene lógica de negocio
 * - No accede a base de datos
 * - No valida reglas (eso ocurre en middleware)
 * - Solo orquesta:
 *   Request → DTO → UseCase → Response
 *
 * REGLA DE ORO:
 * - Dependencias explícitas
 * - Sin DI automática
 * - Sin Service Container
 */
final class UserController
{
    /**
     * Caso de uso inyectado manualmente.
     *
     * ES:
     * El controller NO crea el Use Case.
     * Se lo entregan desde el bootstrap (index.php).
     */
    private GetUserUseCase $getUserUseCase;

    /**
     * Constructor explícito.
     *
     * ES:
     * Inyección MANUAL del Use Case.
     */
    public function __construct(GetUserUseCase $getUserUseCase)
    {
        $this->getUserUseCase = $getUserUseCase;
    }

    /**
     * GET /users/{id}
     *
     * EN:
     * Show a single user.
     *
     * ES:
     * Endpoint para obtener un usuario por ID.
     * El ID ya fue:
     * - Validado por constraint de ruta
     * - Validado por ValidationMiddleware
     */
    public function show(Request $request): Response
    {
        // Construcción del DTO de entrada (tipado)
        $dto = GetUserRequestDTO::fromRequest($request);

        // Ejecución del caso de uso
        $result = $this->getUserUseCase->execute($dto);

        // Traducción a Response HTTP normalizada
        return Response::json([
            'success' => true,
            'data'    => $result->data()
        ]);
    }
}