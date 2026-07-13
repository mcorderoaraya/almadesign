<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Csrf;
use App\Core\View;
use App\Services\AdminAuth;
use App\Services\AnalyticsService;
use App\Services\ContentRepository;
use App\Services\Database;
use App\Services\RagMarkdownService;
use App\Services\TotpService;
use RuntimeException;
use Throwable;

final class AdminController extends BaseController
{
    public function login(): void
    {
        if ($this->currentUser() !== null && $this->twoFactorVerified()) {
            $this->redirect('/dashboard');
        }

        $this->adminView('admin/login', [
            'title' => 'Dashboard | AlmaDesign',
            'csrfToken' => Csrf::token(),
        ]);
    }

    public function authenticate(): void
    {
        if (!$this->validCsrf()) {
            $this->adminView('admin/login', $this->loginPayload('No pudimos validar la sesión.'), 422);
            return;
        }

        try {
            $auth = $this->auth();
            $user = $auth->findByEmail((string) ($_POST['email'] ?? ''));
            if ($user === null || !$auth->verifyPassword($user, (string) ($_POST['password'] ?? ''))) {
                $this->adminView('admin/login', $this->loginPayload('Credenciales inválidas.'), 401);
                return;
            }

            $_SESSION[$this->sessionKey()] = (int) $user['id'];
            $_SESSION[$this->twoFactorKey()] = false;
            $this->redirect('/dashboard/2fa');
        } catch (Throwable $exception) {
            $this->renderAdminError($exception);
        }
    }

    public function twoFactor(): void
    {
        $user = $this->requirePasswordStep();
        if ($user === null) {
            return;
        }

        $this->adminView('admin/two-factor', [
            'title' => 'Verificación 2FA | AlmaDesign',
            'csrfToken' => Csrf::token(),
            'email' => (string) $user['email'],
        ]);
    }

    public function verifyTwoFactor(): void
    {
        if (!$this->validCsrf()) {
            $this->adminView('admin/two-factor', [
                'title' => 'Verificación 2FA | AlmaDesign',
                'csrfToken' => Csrf::token(),
                'error' => 'No pudimos validar la sesión.',
            ], 422);
            return;
        }

        $user = $this->requirePasswordStep();
        if ($user === null) {
            return;
        }

        $totpSecret = (string) ($user['totp_secret'] ?? '');
        if (!(new TotpService())->verify($totpSecret, (string) ($_POST['code'] ?? ''))) {
            $this->adminView('admin/two-factor', [
                'title' => 'Verificación 2FA | AlmaDesign',
                'csrfToken' => Csrf::token(),
                'email' => (string) $user['email'],
                'error' => 'Código 2FA inválido.',
            ], 401);
            return;
        }

        $_SESSION[$this->twoFactorKey()] = true;
        $this->auth()->touchLogin((int) $user['id']);
        $this->redirect('/dashboard');
    }

    public function logout(): void
    {
        if ($this->validCsrf()) {
            unset($_SESSION[$this->sessionKey()], $_SESSION[$this->twoFactorKey()]);
            Csrf::rotate();
        }

        $this->redirect('/dashboard/login');
    }

    public function index(): void
    {
        $user = $this->requireAdmin();
        if ($user === null) {
            return;
        }

        try {
            $this->adminView('admin/index', [
                'title' => 'Dashboard AlmaDesign',
                'user' => $user,
                'stats' => $this->content()->dashboardStats(),
                'analytics' => $this->analytics()->dashboardSummary(),
                'csrfToken' => Csrf::token(),
            ]);
        } catch (Throwable $exception) {
            $this->renderAdminError($exception);
        }
    }

    public function pages(): void
    {
        if ($this->requireAdmin() === null) {
            return;
        }

        try {
            $this->adminView('admin/pages', [
                'title' => 'Páginas | Dashboard AlmaDesign',
                'pages' => $this->content()->pages(),
                'csrfToken' => Csrf::token(),
            ]);
        } catch (Throwable $exception) {
            $this->renderAdminError($exception);
        }
    }

    public function editPage(): void
    {
        if ($this->requireAdmin() === null) {
            return;
        }

        try {
            $repository = $this->content();
            $id = isset($_GET['id']) ? (int) $_GET['id'] : null;
            $page = $repository->page($id);

            $this->adminView('admin/page-edit', [
                'title' => 'Editar página | Dashboard AlmaDesign',
                'page' => $page,
                'sections' => $page !== null ? $repository->sections((int) $page['id']) : [],
                'csrfToken' => Csrf::token(),
            ]);
        } catch (Throwable $exception) {
            $this->renderAdminError($exception);
        }
    }

    public function savePage(): void
    {
        $user = $this->requireAdmin();
        if ($user === null || !$this->validCsrf()) {
            $this->redirect('/dashboard/pages');
        }

        try {
            $repository = $this->content();
            $id = $repository->savePage($_POST);
            $repository->log((int) $user['id'], 'save', 'site_page', (string) $id);
            $this->redirect('/dashboard/pages/edit?id=' . $id);
        } catch (Throwable $exception) {
            $this->renderAdminError($exception);
        }
    }

    public function deletePage(): void
    {
        $user = $this->requireAdmin();
        if ($user === null || !$this->validCsrf()) {
            $this->redirect('/dashboard/pages');
        }

        try {
            $id = (int) ($_POST['id'] ?? 0);
            $repository = $this->content();
            $repository->deletePage($id);
            $repository->log((int) $user['id'], 'delete', 'site_page', (string) $id);
            $this->redirect('/dashboard/pages');
        } catch (Throwable $exception) {
            $this->renderAdminError($exception);
        }
    }

    public function editSection(): void
    {
        if ($this->requireAdmin() === null) {
            return;
        }

        try {
            $repository = $this->content();
            $pageId = (int) ($_GET['page_id'] ?? 0);
            $section = $repository->section(isset($_GET['id']) ? (int) $_GET['id'] : null);

            $this->adminView('admin/section-edit', [
                'title' => 'Editar sección | Dashboard AlmaDesign',
                'page' => $repository->page($pageId),
                'section' => $section,
                'csrfToken' => Csrf::token(),
            ]);
        } catch (Throwable $exception) {
            $this->renderAdminError($exception);
        }
    }

    public function saveSection(): void
    {
        $user = $this->requireAdmin();
        if ($user === null || !$this->validCsrf()) {
            $this->redirect('/dashboard/pages');
        }

        try {
            $repository = $this->content();
            $id = $repository->saveSection($_POST);
            $repository->log((int) $user['id'], 'save', 'site_page_section', (string) $id);
            $this->redirect('/dashboard/pages/edit?id=' . (int) ($_POST['page_id'] ?? 0));
        } catch (Throwable $exception) {
            $this->renderAdminError($exception);
        }
    }

    public function deleteSection(): void
    {
        $user = $this->requireAdmin();
        if ($user === null || !$this->validCsrf()) {
            $this->redirect('/dashboard/pages');
        }

        try {
            $id = (int) ($_POST['id'] ?? 0);
            $pageId = (int) ($_POST['page_id'] ?? 0);
            $repository = $this->content();
            $repository->deleteSection($id);
            $repository->log((int) $user['id'], 'delete', 'site_page_section', (string) $id);
            $this->redirect('/dashboard/pages/edit?id=' . $pageId);
        } catch (Throwable $exception) {
            $this->renderAdminError($exception);
        }
    }

    public function ragMarkdown(): void
    {
        if ($this->requireAdmin() === null) {
            return;
        }

        try {
            $this->adminView('admin/rag-markdown', [
                'title' => 'Markdown RAG | Dashboard AlmaDesign',
                'documents' => $this->ragMarkdownService()->documents(),
                'csrfToken' => Csrf::token(),
            ]);
        } catch (Throwable $exception) {
            $this->renderAdminError($exception);
        }
    }

    public function saveRagMarkdown(): void
    {
        $user = $this->requireAdmin();
        if ($user === null || !$this->validCsrf()) {
            $this->redirect('/dashboard/rag-markdown');
        }

        try {
            $service = $this->ragMarkdownService();
            $id = $service->save($_POST);
            $this->content()->log((int) $user['id'], 'save', 'rag_markdown_document', (string) $id);
            $this->redirect('/dashboard/rag-markdown');
        } catch (Throwable $exception) {
            $this->renderAdminError($exception);
        }
    }

    private function auth(): AdminAuth
    {
        return new AdminAuth(Database::pdo($this->config));
    }

    private function content(): ContentRepository
    {
        return new ContentRepository(Database::pdo($this->config));
    }

    private function analytics(): AnalyticsService
    {
        return new AnalyticsService(Database::pdo($this->config));
    }

    private function ragMarkdownService(): RagMarkdownService
    {
        $repository = $this->content();
        return new RagMarkdownService(
            Database::pdo($this->config),
            (string) ($this->config['rag_markdown_path'] ?? ''),
            $repository
        );
    }

    private function requirePasswordStep(): ?array
    {
        $id = $_SESSION[$this->sessionKey()] ?? null;
        if (!is_int($id) && !ctype_digit((string) $id)) {
            $this->redirect('/dashboard/login');
            return null;
        }

        try {
            $user = $this->auth()->findById((int) $id);
            if ($user === null) {
                $this->redirect('/dashboard/login');
                return null;
            }

            return $user;
        } catch (Throwable $exception) {
            $this->renderAdminError($exception);
            return null;
        }
    }

    private function requireAdmin(): ?array
    {
        $user = $this->requirePasswordStep();
        if ($user === null) {
            return null;
        }

        if (!$this->twoFactorVerified()) {
            $this->redirect('/dashboard/2fa');
            return null;
        }

        return $user;
    }

    private function currentUser(): ?array
    {
        $id = $_SESSION[$this->sessionKey()] ?? null;
        if (!is_int($id) && !ctype_digit((string) $id)) {
            return null;
        }

        try {
            return $this->auth()->findById((int) $id);
        } catch (Throwable) {
            return null;
        }
    }

    private function twoFactorVerified(): bool
    {
        return ($_SESSION[$this->twoFactorKey()] ?? false) === true;
    }

    private function validCsrf(): bool
    {
        return Csrf::validate((string) ($_POST['csrf_token'] ?? ''));
    }

    private function loginPayload(string $error): array
    {
        return [
            'title' => 'Dashboard | AlmaDesign',
            'csrfToken' => Csrf::token(),
            'error' => $error,
        ];
    }

    private function renderAdminError(Throwable $exception): void
    {
        $message = $exception instanceof RuntimeException
            ? $exception->getMessage()
            : 'No pudimos completar la operación del dashboard.';

        $this->adminView('admin/error', [
            'title' => 'Dashboard no disponible | AlmaDesign',
            'message' => $message,
        ], 500);
    }

    private function adminView(string $view, array $data = [], int $statusCode = 200): void
    {
        http_response_code($statusCode);
        View::render($view, array_merge([
            'config' => $this->config,
            'bodyClass' => 'is-dashboard-page',
            'showFinalCta' => false,
            'showFooter' => false,
        ], $data));
    }

    private function redirect(string $path): void
    {
        header('Location: ' . url($path), true, 302);
        exit;
    }

    private function sessionKey(): string
    {
        return (string) ($this->config['admin']['session_key'] ?? 'almadesign_admin_user_id');
    }

    private function twoFactorKey(): string
    {
        return (string) ($this->config['admin']['remember_2fa_key'] ?? 'almadesign_admin_2fa_verified');
    }
}
