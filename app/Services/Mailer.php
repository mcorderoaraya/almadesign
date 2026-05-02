<?php
declare(strict_types=1);

namespace App\Services;

use App\Core\Env;
use PHPMailer\PHPMailer\PHPMailer;
use RuntimeException;

final class Mailer
{
    /**
     * @param array<string, string> $data
     */
    public function sendContactMessage(array $data): void
    {
        if (!class_exists(PHPMailer::class)) {
            throw new RuntimeException('PHPMailer no disponible.');
        }

        $host = Env::get('SMTP_HOST');
        $username = Env::get('SMTP_USERNAME');
        $password = Env::get('SMTP_PASSWORD');
        $from = Env::get('SMTP_FROM');
        $to = Env::get('CONTACT_TO');

        if ($host === null || $username === null || $password === null || $from === null || $to === null) {
            throw new RuntimeException('Configuración SMTP incompleta.');
        }

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = $host;
        $mail->SMTPAuth = true;
        $mail->Username = $username;
        $mail->Password = $password;
        $mail->SMTPSecure = Env::get('SMTP_SECURE', PHPMailer::ENCRYPTION_STARTTLS) ?? PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = (int) (Env::get('SMTP_PORT', '587') ?? '587');
        $mail->CharSet = 'UTF-8';

        $mail->setFrom($from, Env::get('SMTP_FROM_NAME', 'AlmaDesign Web') ?? 'AlmaDesign Web');
        $mail->addAddress($to);
        $mail->addReplyTo($data['email'], $data['nombre']);

        $prefix = Env::get('CONTACT_SUBJECT_PREFIX', '[AlmaDesign]') ?? '[AlmaDesign]';
        $mail->Subject = trim($prefix . ' ' . $data['asunto']);
        $mail->Body = $this->buildBody($data);
        $mail->AltBody = $mail->Body;

        $mail->send();
    }

    /**
     * @param array<string, string> $data
     */
    private function buildBody(array $data): string
    {
        return implode("\n", [
            'Nuevo mensaje desde AlmaDesign Web',
            '',
            'Nombre: ' . $data['nombre'],
            'Email: ' . $data['email'],
            'Teléfono: ' . ($data['telefono'] !== '' ? $data['telefono'] : 'No informado'),
            'Asunto: ' . $data['asunto'],
            '',
            'Mensaje:',
            $data['mensaje'],
        ]);
    }
}
