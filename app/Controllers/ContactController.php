<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Csrf;
use App\Core\Env;
use App\Core\RateLimiter;
use App\Services\Mailer;
use App\Services\RagClient;
use App\Services\RagUnavailable;
use JsonException;
use Throwable;

final class ContactController extends BaseController
{
    // Nombre específico para evitar autofill accidental del honeypot.
    private const HONEYPOT_FIELD = 'almadesign_hp_field';
    private const BUSINESS_FIELDS = ['nombre', 'email', 'telefono', 'asunto', 'mensaje'];
    private const TECHNICAL_FIELDS = ['csrf_token', self::HONEYPOT_FIELD];
    private const PRODUCT_PROMPTS = [
        'asistente-247' => 'Quiero saber más de Asistente 24/7',
        'charlas' => 'Quiero saber más de las charlas AlmaDesign',
        'charlahumanos' => 'Quiero saber más de Charlas para humanos',
        'charlatecnica' => 'Quiero saber más de Charlas para equipos de trabajo y áreas IT',
        'charlagerencia' => 'Quiero saber más de Charlas para gerencias y directivos',
        'orquestacion-asistentes-ia' => 'Quiero saber más de Orquestación con Asistentes IA',
        'consultoria' => 'Quiero saber más de Consultoría IA y procesos',
        'gestion-documental-gobernada' => 'Quiero saber más de Gestión Documental Gobernada',
        'software-factory' => 'Quiero saber más de Software Factory',
    ];

    public function index(): void
    {
        $this->renderForm();
    }

    public function form(): void
    {
        $this->renderContactForm();
    }

    public function send(): void
    {
        $input = $this->sanitize($_POST);
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $rateKey = hash('sha256', 'contact|' . $ip . '|' . session_id());

        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            http_response_code(405);
            return;
        }

        if (!Csrf::validate($input['csrf_token'] ?? '')) {
            $this->logContact('csrf_failed', $ip, $input['email'] ?? '', 'csrf');
            $this->renderContactForm($input, [
                'general' => 'No pudimos validar la solicitud. Intenta nuevamente.',
            ], 422);
            return;
        }

        if (($input[self::HONEYPOT_FIELD] ?? '') !== '') {
            $this->logContact('honeypot_blocked', $ip, $input['email'] ?? '', 'bot');
            $this->redirect('/contacto/gracias');
        }

        $errors = $this->validateFieldTypes($_POST);

        foreach ($this->validate($input) as $field => $message) {
            $errors[$field] ??= $message;
        }

        if ($errors !== []) {
            $this->logContact('validation_failed', $ip, $input['email'] ?? '', 'validation');
            $this->renderContactForm($input, $errors, 422);
            return;
        }

        if (!RateLimiter::allow($rateKey, 3, 600)) {
            $this->logContact('rate_limited', $ip, $input['email'] ?? '', 'rate_limit');
            $this->renderContactForm($input, [
                'general' => 'Recibimos varias solicitudes en poco tiempo. Intenta nuevamente más tarde.',
            ], 429);
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
            $this->renderContactForm($input, [
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

    public function ragStart(): void
    {
        try {
            $response = $this->ragClient()->startConversation();
            $this->jsonResponse($response->statusCode, $response->body);
        } catch (RagUnavailable $exception) {
            $this->jsonPayload(503, [
                'detail' => $exception->getMessage(),
            ]);
        }
    }

    public function ragChat(): void
    {
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            $this->jsonPayload(405, [
                'detail' => 'Método no permitido.',
            ]);
            return;
        }

        if (!Csrf::validate($this->csrfHeader())) {
            $this->jsonPayload(419, [
                'detail' => 'No pudimos validar la sesión. Recarga la página e intenta nuevamente.',
            ]);
            return;
        }

        $rawBody = file_get_contents('php://input') ?: '';
        if (strlen($rawBody) > 20000) {
            $this->jsonPayload(413, [
                'detail' => 'La solicitud es demasiado extensa.',
            ]);
            return;
        }

        try {
            $payload = json_decode($rawBody, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException) {
            $this->jsonPayload(400, [
                'detail' => 'El mensaje enviado no tiene un formato válido.',
            ]);
            return;
        }

        if (!is_array($payload)) {
            $this->jsonPayload(400, [
                'detail' => 'El mensaje enviado no tiene un formato válido.',
            ]);
            return;
        }

        if (isset($payload['product']) && !array_key_exists((string) $payload['product'], self::PRODUCT_PROMPTS)) {
            unset($payload['product']);
        }

        try {
            $response = $this->ragClient()->chat($payload);
            $this->jsonResponse($response->statusCode, $response->body);
        } catch (RagUnavailable $exception) {
            $this->jsonPayload(503, [
                'detail' => $exception->getMessage(),
            ]);
        }
    }

    /**
     * @param array<string, mixed> $old
     * @param array<string, string> $errors
     */
    private function renderForm(array $old = [], array $errors = [], int $statusCode = 200): void
    {
        http_response_code($statusCode);
        $productSlug = $this->requestedProductSlug();

        $this->view('pages/contacto', [
            'title' => 'Conversemos | AlmaDesign',
            'metaDescription' => 'RAG de contacto de AlmaDesign para orientar consultas sobre consultoría, gestión documental e IA gobernada.',
            'bodyClass' => 'is-contact-rag-page',
            'pageScripts' => ['js/rag-contact.js'],
            'showFinalCta' => false,
            'showFooter' => false,
            'csrfToken' => Csrf::token(),
            'old' => $old,
            'errors' => $errors,
            'initialProduct' => $productSlug,
            'initialQuestion' => $productSlug !== null ? self::PRODUCT_PROMPTS[$productSlug] : '',
            'fallbackUrl' => url('/contacto/formulario?motivo=limite'),
        ]);
    }

    /**
     * @param array<string, mixed> $old
     * @param array<string, string> $errors
     */
    private function renderContactForm(array $old = [], array $errors = [], int $statusCode = 200): void
    {
        http_response_code($statusCode);

        $this->view('pages/contacto-formulario', [
            'title' => 'Formulario de contacto | AlmaDesign',
            'metaDescription' => 'Formulario tradicional de contacto de AlmaDesign para solicitar atención personalizada.',
            'bodyClass' => 'is-contact-form-page',
            'showFinalCta' => false,
            'csrfToken' => Csrf::token(),
            'honeypotName' => self::HONEYPOT_FIELD,
            'old' => $old,
            'errors' => $errors,
            'timeoutFallback' => ($_GET['motivo'] ?? '') === 'limite',
        ]);
    }

    private function requestedProductSlug(): ?string
    {
        $product = (string) ($_GET['producto'] ?? '');
        return array_key_exists($product, self::PRODUCT_PROMPTS) ? $product : null;
    }

    private function ragClient(): RagClient
    {
        return new RagClient(
            baseUrl: Env::get('RAG_BASE_URL', 'http://127.0.0.1:8000') ?? 'http://127.0.0.1:8000',
            timeoutSeconds: (float) (Env::get('RAG_TIMEOUT_SECONDS', '14') ?? '14'),
        );
    }

    private function csrfHeader(): string
    {
        return (string) ($_SERVER['HTTP_X_CSRF_TOKEN'] ?? '');
    }

    /**
     * @param array<string, mixed> $payload
     */
    private function jsonPayload(int $statusCode, array $payload): void
    {
        $body = json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        $this->jsonResponse($statusCode, $body !== false ? $body : '{"detail":"Error interno."}');
    }

    private function jsonResponse(int $statusCode, string $body): void
    {
        http_response_code($statusCode);
        header('Content-Type: application/json; charset=utf-8');
        header('Cache-Control: no-store');
        echo $body;
    }

    /**
     * @param array<string, mixed> $input
     * @return array<string, string>
     */
    private function sanitize(array $input): array
    {
        return [
            'nombre' => $this->cleanSingleLine($this->scalarField($input, 'nombre')),
            'email' => mb_strtolower($this->cleanSingleLine($this->scalarField($input, 'email'))),
            'telefono' => $this->cleanSingleLine($this->scalarField($input, 'telefono')),
            'asunto' => $this->cleanSingleLine($this->scalarField($input, 'asunto')),
            'mensaje' => $this->cleanMessage($this->scalarField($input, 'mensaje')),
            self::HONEYPOT_FIELD => $this->cleanSingleLine($this->scalarField($input, self::HONEYPOT_FIELD)),
            'csrf_token' => $this->cleanSingleLine($this->scalarField($input, 'csrf_token')),
        ];
    }

    /**
     * @param array<string, string> $input
     * @return array<string, string>
     */
    private function validate(array $input): array
    {
        $errors = [];

        if (mb_strlen($input['nombre']) < 2 || mb_strlen($input['nombre']) > 120 || $this->hasLineBreak($input['nombre']) || $this->hasUnsafeControlChars($input['nombre'])) {
            $errors['nombre'] = 'Ingresa un nombre de 2 a 120 caracteres.';
        }

        if (!$this->isValidEmail($input['email']) || mb_strlen($input['email']) > 180 || $this->hasLineBreak($input['email']) || $this->hasUnsafeControlChars($input['email'])) {
            $errors['email'] = 'Ingresa un email válido de máximo 180 caracteres.';
        }

        if ($input['telefono'] !== '' && (!preg_match('/^[0-9+() .-]{6,40}$/', $input['telefono']) || $this->hasLineBreak($input['telefono']) || $this->hasUnsafeControlChars($input['telefono']))) {
            $errors['telefono'] = 'El teléfono debe tener entre 6 y 40 caracteres válidos.';
        }

        if (mb_strlen($input['asunto']) < 3 || mb_strlen($input['asunto']) > 160 || $this->hasLineBreak($input['asunto']) || $this->hasUnsafeControlChars($input['asunto'])) {
            $errors['asunto'] = 'Ingresa un asunto de 3 a 160 caracteres.';
        }

        if (mb_strlen($input['mensaje']) < 10 || mb_strlen($input['mensaje']) > 3000 || $this->hasUnsafeControlChars($input['mensaje'])) {
            $errors['mensaje'] = 'Ingresa un mensaje de 10 a 3000 caracteres.';
        }

        return $errors;
    }

    private function isValidEmail(string $email): bool
    {
        if (!preg_match('/^[A-Z0-9._%+-]{2,64}@[A-Z0-9-]{1,63}(?:\.[A-Z0-9-]{2,63})+$/i', $email)) {
            return false;
        }

        [$local, $domain] = explode('@', $email, 2);
        if (str_starts_with($local, '.') || str_ends_with($local, '.') || str_contains($local, '..')) {
            return false;
        }

        foreach (explode('.', $domain) as $label) {
            if ($label === '' || str_starts_with($label, '-') || str_ends_with($label, '-')) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param array<string, mixed> $input
     * @return array<string, string>
     */
    private function validateFieldTypes(array $input): array
    {
        $errors = [];
        $knownFields = array_merge(self::BUSINESS_FIELDS, self::TECHNICAL_FIELDS);

        foreach (self::BUSINESS_FIELDS as $field) {
            if (isset($input[$field]) && !is_scalar($input[$field])) {
                $errors[$field] = 'El campo enviado no tiene un formato válido.';
            }
        }

        foreach (self::TECHNICAL_FIELDS as $field) {
            if (isset($input[$field]) && !is_scalar($input[$field])) {
                $errors['general'] = 'No pudimos procesar la solicitud. Intenta nuevamente.';
            }
        }

        foreach ($input as $field => $value) {
            if (!in_array((string) $field, $knownFields, true) && !is_scalar($value)) {
                $errors['general'] = 'No pudimos procesar la solicitud. Intenta nuevamente.';
            }
        }

        return $errors;
    }

    /**
     * @param array<string, mixed> $input
     */
    private function scalarField(array $input, string $field): string
    {
        $value = $input[$field] ?? '';

        if (!is_scalar($value)) {
            return '';
        }

        return (string) $value;
    }

    private function cleanSingleLine(string $value): string
    {
        return trim($value);
    }

    private function cleanMessage(string $value): string
    {
        $value = str_replace(["\r\n", "\r"], "\n", $value);

        return trim($value);
    }

    private function hasLineBreak(string $value): bool
    {
        return str_contains($value, "\r") || str_contains($value, "\n");
    }

    private function hasUnsafeControlChars(string $value): bool
    {
        return preg_match('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/', $value) === 1;
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
