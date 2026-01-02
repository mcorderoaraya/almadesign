<?php

namespace App\Plugins\Inbox;

use App\Entities\BaseEntity;

/**
 * Representa un mensaje de contacto enviado desde el sitio web.
 * 
 * Datos sensibles que requieren manejo seguro y confidencialidad.
 */
class InboxMessageEntity extends BaseEntity
{
    /**
     * Identificador único del mensaje.
     * @var int|null
     */
    public ?int $id = null;

    /**
     * Email del remitente.
     * @var string
     */
    public string $sender_email;

    /**
     * Asunto del mensaje.
     * @var string
     */
    public string $subject;

    /**
     * Cuerpo del mensaje.
     * @var string
     */
    public string $message_body;

    /**
     * Fecha y hora en que se recibió el mensaje (ISO 8601).
     * @var string
     */
    public string $received_at;

    /**
     * Fecha y hora en que se respondió el mensaje (ISO 8601), si aplica.
     * @var string|null
     */
    public ?string $responded_at = null;
}
