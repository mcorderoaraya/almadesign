<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Csrf;
use App\Core\RateLimiter;
use App\Services\Mailer;
use Throwable;

final class ContactController extends BaseController
{
    public function index(): void
    {
        $this->renderForm();
    }

    public function send(): void
    {
        $input = $this->sanitize($_POST);
        $errors = [];
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $rateKey = hash('sha256', 'contact|' . $ip . '|' . session_id());

        if (!Csrf::validate($input['csrf_token'] ?? '')) {
            $errors['general'] = 'No pudimos validar la solicitud. Intenta nuevamente.';
            $this->logContact('csrf_failed', $ip, $input['email'] ?? '', 'csrf');
        }

        if (($input['website'] ?? '') !== '') {
            $this->logContact('honeypot_blocked', $ip, $input['email'] ?? '', 'bot');
            $this->redirect('/contacto/gracias');
        }

        if (!RateLimiter::allow($rateKey, 3, 600)) {
            $errors['general'] = 'Recibimos varias solicitudes en poco tiempo. Intenta nuevamente más tarde.';
            $this->logContact('rate_limited', $ip, $input['email'] ?? '', 'rate_limit');
        }

        $errors = array_merge($errors, $this->validate($input));

        if ($errors !== []) {
            $this->renderForm($input, $errors);
            return;
        }

        try {
            (new Mailer())->sendContactMessage([
                'nombre' => $input['nombre'],
                'email' => $input['email'],
                'telefono' => $input['telefono'],
                'asunto' => $input['asunto'],
                'mensaje' => $input['mensaje'],
            ]);

            Csrf::rotate();
            $this->logContact('sent', $ip, $input['email']);
            $this->redirect('/contacto/gracias');
        } catch (Throwable) {
            $this->logContact('send_failed', $ip, $input['email'], 'mailer');
            $this->renderForm($input, [
                'general' => 'No pudimos enviar el mensaje en este momento. Intenta nuevamente más tarde.',
            ]);
        }
    }

    public function thanks(): void
    {
        $this->view('pages/contacto-gracias', [
            'title' => 'Mensaje recibido | AlmaDesign',
            'metaDescription' => 'Confirmación de contacto recibido por AlmaDesign Web.',
        ]);
    }

    /**
     * @param array<string, mixed> $old
     * @param array<string, string> $errors
     */
    private function renderForm(array $old = [], array $errors = []): void
    {
        $this->view('pages/contacto', [
            'title' => 'Contacto | AlmaDesign',
            'metaDescription' => 'Contacto de AlmaDesign para conversaciones sobre diseño, tecnología e IA gobernada.',
            'csrfToken' => Csrf::token(),
            'old' => $old,
            'errors' => $errors,
        ]);
    }

    /**
     * @param array<string, mixed> $input
     * @return array<string, string>
     */
    private function sanitize(array $input): array
    {
        return [
            'nombre' => trim((string) ($input['nombre'] ?? '')),
            'email' => mb_strtolower(trim((string) ($input['email'] ?? ''))),
            'telefono' => trim((string) ($input['telefono'] ?? '')),
            'asunto' => trim((string) ($input['asunto'] ?? '')),
            'mensaje' => trim((string) ($input['mensaje'] ?? '')),
            'website' => trim((string) ($input['website'] ?? '')),
            'csrf_token' => trim((string) ($input['csrf_token'] ?? '')),
        ];
    }

    /**
     * @param array<string, string> $input
     * @return array<string, string>
     */
    private function validate(array $input): array
    {
        $errors = [];

        if (mb_strlen($input['nombre']) < 2 || mb_strlen($input['nombre']) > 120) {
            $errors['nombre'] = 'Ingresa un nombre de 2 a 120 caracteres.';
        }

        if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL) || mb_strlen($input['email']) > 180) {
            $errors['email'] = 'Ingresa un email válido de máximo 180 caracteres.';
        }

        if (mb_strlen($input['telefono']) > 40) {
            $errors['telefono'] = 'El teléfono debe tener máximo 40 caracteres.';
        }

        if (mb_strlen($input['asunto']) < 3 || mb_strlen($input['asunto']) > 160) {
            $errors['asunto'] = 'Ingresa un asunto de 3 a 160 caracteres.';
        }

        if (mb_strlen($input['mensaje']) < 10 || mb_strlen($input['mensaje']) > 3000) {
            $errors['mensaje'] = 'Ingresa un mensaje de 10 a 3000 caracteres.';
        }

        return $errors;
    }

    private function redirect(string $path): never
    {
        header('Location: ' . $path, true, 303);
        exit;
    }

    private function logContact(string $result, string $ip, string $email = '', string $error = ''): void
    {
        $logDir = BASE_PATH . '/logs';
        if (!is_dir($logDir)) {
            mkdir($logDir, 0755, true);
        }

        $line = json_encode([
            'timestamp' => gmdate('c'),
            'result' => $result,
            'ip_hash' => hash('sha256', $ip),
            'email_hash' => $email !== '' ? hash('sha256', mb_strtolower($email)) : '',
            'error' => $error,
        ], JSON_UNESCAPED_SLASHES);

        if ($line !== false) {
            file_put_contents($logDir . '/contact.log', $line . PHP_EOL, FILE_APPEND | LOCK_EX);
        }
    }
}
