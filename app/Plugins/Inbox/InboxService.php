<?php

namespace App\Plugins\Inbox;

/**
 * Servicio para manejar el flujo de mensajes de la bandeja de entrada.
 * 
 * Valida campos requeridos, almacena mensajes y llama lógicamente a EmailService para respuesta automática.
 * No envía emails directamente.
 */
class InboxService
{
    /**
     * @var InboxRepository
     */
    private InboxRepository $repository;

    /**
     * @var \App\Services\EmailService
     */
    private \App\Services\EmailService $emailService;

    public function __construct(InboxRepository $repository, \App\Services\EmailService $emailService)
    {
        $this->repository = $repository;
        $this->emailService = $emailService;
    }

    /**
     * Procesa un mensaje entrante.
     * 
     * @param InboxMessageEntity $message Mensaje a procesar.
     * @return void
     * 
     * @throws \InvalidArgumentException Si faltan campos requeridos.
     */
    public function processIncomingMessage(InboxMessageEntity $message): void
    {
        // Validación básica placeholder
        if (empty($message->sender_email) || empty($message->subject) || empty($message->message_body)) {
            throw new \InvalidArgumentException('Faltan campos requeridos en el mensaje.');
        }

        $message->received_at = date('c'); // Fecha ISO 8601 actual

        $this->repository->storeMessage($message);

        // Llamada lógica a EmailService para respuesta automática (sin enviar email real)
        $this->emailService->prepareAutoResponse($message->sender_email, $message->subject);
    }
}
