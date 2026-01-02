<?php

namespace App\Plugins\Inbox;

/**
 * Servicio fachada para el plugin Inbox.
 * 
 * Punto de entrada para controladores futuros.
 * Coordina InboxService y EmailService.
 */
class InboxPluginService
{
    /**
     * @var InboxService
     */
    private InboxService $inboxService;

    /**
     * @var \App\Services\EmailService
     */
    private \App\Services\EmailService $emailService;

    public function __construct(InboxService $inboxService, \App\Services\EmailService $emailService)
    {
        $this->inboxService = $inboxService;
        $this->emailService = $emailService;
    }

    /**
     * Procesa un mensaje entrante.
     * 
     * @param InboxMessageEntity $message Mensaje a procesar.
     * @return void
     */
    public function processMessage(InboxMessageEntity $message): void
    {
        $this->inboxService->processIncomingMessage($message);
    }
}
