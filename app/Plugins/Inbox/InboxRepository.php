<?php

namespace App\Plugins\Inbox;

use App\Repositories\BaseRepository;

/**
 * Repositorio para la gestión de mensajes de la bandeja de entrada.
 * 
 * Contiene métodos para almacenar mensajes, marcar como respondidos y consultar mensajes sin respuesta.
 * 
 * Nota: No contiene lógica SQL ni de persistencia directa, solo definiciones de métodos.
 */
class InboxRepository extends BaseRepository
{
    /**
     * Almacena un mensaje recibido.
     * 
     * @param InboxMessageEntity $message Entidad del mensaje a almacenar.
     * @return void
     */
    public function storeMessage(InboxMessageEntity $message): void
    {
        // Método placeholder para almacenar mensaje
    }

    /**
     * Marca un mensaje como respondido.
     * 
     * @param int $messageId Identificador del mensaje.
     * @param string $respondedAt Fecha y hora de respuesta (ISO 8601).
     * @return void
     */
    public function markAsResponded(int $messageId, string $respondedAt): void
    {
        // Método placeholder para marcar mensaje como respondido
    }

    /**
     * Obtiene mensajes sin respuesta.
     * 
     * @return InboxMessageEntity[] Lista de mensajes sin respuesta.
     */
    public function findUnanswered(): array
    {
        // Método placeholder para obtener mensajes sin respuesta
        return [];
    }
}
