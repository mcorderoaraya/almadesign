<?php

namespace App\Services;

/**
 * Servicio central de email.
 * 
 * Responsable de validar parámetros y preparar el payload del email.
 * No envía emails reales ni conecta a servidores SMTP.
 * Diseñado para futura extensión y envío real.
 */
class EmailService
{
    /**
     * Valida los parámetros del email.
     * 
     * @param string $to Destinatario.
     * @param string $subject Asunto.
     * @param string $body Cuerpo del mensaje.
     * @return void
     * 
     * @throws \InvalidArgumentException Si algún parámetro es inválido.
     */
    public function validateEmailParams(string $to, string $subject, string $body): void
    {
        if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Email destinatario inválido.');
        }
        if (empty($subject)) {
            throw new \InvalidArgumentException('Asunto no puede estar vacío.');
        }
        if (empty($body)) {
            throw new \InvalidArgumentException('Cuerpo del mensaje no puede estar vacío.');
        }
    }

    /**
     * Prepara el payload del email para envío.
     * 
     * @param string $to Destinatario.
     * @param string $subject Asunto.
     * @param string $body Cuerpo del mensaje.
     * @return array Payload preparado.
     */
    public function prepareEmailPayload(string $to, string $subject, string $body): array
    {
        $this->validateEmailParams($to, $subject, $body);

        return [
            'to' => $to,
            'subject' => $subject,
            'body' => $body,
        ];
    }

    /**
     * Prepara una respuesta automática para un email recibido.
     * 
     * @param string $to Email del remitente original.
     * @param string $originalSubject Asunto original.
     * @return void
     */
    public function prepareAutoResponse(string $to, string $originalSubject): void
    {
        $subject = 'Re: ' . $originalSubject;
        $body = "Gracias por contactarnos. Hemos recibido su mensaje y le responderemos a la brevedad.";

        $payload = $this->prepareEmailPayload($to, $subject, $body);

        // Placeholder: no se envía email real.
    }
}
