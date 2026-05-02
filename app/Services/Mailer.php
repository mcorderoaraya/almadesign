<?php
declare(strict_types=1);

namespace App\Services;

use App\Core\Env;
use PHPMailer\PHPMailer\PHPMailer;
use RuntimeException;

final class Mailer
{
    private const INTERNAL_SUBJECT = 'Desde web almadesign';

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
        $mail->clearReplyTos();
        $mail->addReplyTo($data['email'], $data['nombre']);

        $mail->Subject = self::INTERNAL_SUBJECT;
        $mail->isHTML(true);
        $mail->Body = $this->buildHtmlBody($data);
        $mail->AltBody = $this->buildTextBody($data);

        $mail->send();
    }

    /**
     * @param array<string, string> $data
     */
    private function buildHtmlBody(array $data): string
    {
        $lines = $this->messageLines($data);

        return '<div style="font-family: Arial, sans-serif; font-size: 15px; line-height: 1.5;">'
            . implode('<br>', array_map(
                static fn (string $line): string => htmlspecialchars($line, ENT_QUOTES, 'UTF-8'),
                $lines
            ))
            . '</div>';
    }

    /**
     * @param array<string, string> $data
     */
    private function buildTextBody(array $data): string
    {
        return implode("\r\n", $this->messageLines($data));
    }

    /**
     * @param array<string, string> $data
     * @return list<string>
     */
    private function messageLines(array $data): array
    {
        return [
            'origen: formulario web AlmaDesign',
            'nombre: ' . $data['nombre'],
            'email: ' . $data['email'],
            'telefono: ' . ($data['telefono'] !== '' ? $data['telefono'] : 'No informado'),
            'asunto_usuario: ' . $data['asunto'],
            'mensaje: ' . $this->formatMessageValue($data['mensaje']),
        ];
    }

    private function formatMessageValue(string $value): string
    {
        $value = str_replace(["\r\n", "\r", "\n"], ' | ', $value);

        return trim(preg_replace('/[ \t]+/', ' ', $value) ?? $value);
    }
}
