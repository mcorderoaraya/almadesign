<?php
declare(strict_types=1);

namespace App\Services;

use PDO;

// Repositorio del contenido editable del sitio. La salida es segura para vistas parametrizadas.
final class ContentRepository
{
    public function __construct(private readonly PDO $pdo)
    {
    }

    public function dashboardStats(): array
    {
        return [
            'pages' => (int) $this->pdo->query('SELECT COUNT(*) FROM site_pages')->fetchColumn(),
            'sections' => (int) $this->pdo->query('SELECT COUNT(*) FROM site_page_sections')->fetchColumn(),
            'rag_docs' => (int) $this->pdo->query('SELECT COUNT(*) FROM rag_markdown_documents')->fetchColumn(),
        ];
    }

    public function pages(): array
    {
        return $this->pdo
            ->query('SELECT p.*, COUNT(s.id) AS section_count FROM site_pages p LEFT JOIN site_page_sections s ON s.page_id = p.id GROUP BY p.id ORDER BY p.updated_at DESC, p.id DESC')
            ->fetchAll();
    }

    public function page(?int $id): ?array
    {
        if ($id === null || $id <= 0) {
            return null;
        }

        $statement = $this->pdo->prepare('SELECT * FROM site_pages WHERE id = :id');
        $statement->execute(['id' => $id]);
        $page = $statement->fetch();

        return is_array($page) ? $page : null;
    }

    /**
     * Entrega una página publicada con sus secciones activas para render público.
     *
     * @return array{page: array<string, mixed>, sections: array<int, array<string, mixed>>}|null
     */
    public function publishedPageBySlug(string $slug): ?array
    {
        $slug = $this->slug($slug);
        $statement = $this->pdo->prepare(
            "SELECT * FROM site_pages WHERE slug = :slug AND status = 'published' LIMIT 1"
        );
        $statement->execute(['slug' => $slug]);
        $page = $statement->fetch();

        if (!is_array($page)) {
            return null;
        }

        $sections = $this->sections((int) $page['id']);
        $sections = array_values(array_filter(
            $sections,
            static fn (array $section): bool => (bool) $section['is_active']
        ));

        if ($sections === []) {
            return null;
        }

        return [
            'page' => $page,
            'sections' => $sections,
        ];
    }

    public function sections(int $pageId): array
    {
        $statement = $this->pdo->prepare('SELECT * FROM site_page_sections WHERE page_id = :page_id ORDER BY sort_order, id');
        $statement->execute(['page_id' => $pageId]);

        return $statement->fetchAll();
    }

    public function section(?int $id): ?array
    {
        if ($id === null || $id <= 0) {
            return null;
        }

        $statement = $this->pdo->prepare('SELECT * FROM site_page_sections WHERE id = :id');
        $statement->execute(['id' => $id]);
        $section = $statement->fetch();

        return is_array($section) ? $section : null;
    }

    public function savePage(array $input): int
    {
        $id = (int) ($input['id'] ?? 0);
        $payload = [
            'slug' => $this->slug((string) ($input['slug'] ?? '')),
            'title' => trim((string) ($input['title'] ?? '')),
            'meta_description' => trim((string) ($input['meta_description'] ?? '')),
            'status' => $this->status((string) ($input['status'] ?? 'draft')),
        ];

        if ($id > 0) {
            $payload['id'] = $id;
            $statement = $this->pdo->prepare(
                'UPDATE site_pages SET slug = :slug, title = :title, meta_description = :meta_description, status = :status, updated_at = NOW() WHERE id = :id'
            );
            $statement->execute($payload);
            return $id;
        }

        $statement = $this->pdo->prepare(
            'INSERT INTO site_pages (slug, title, meta_description, status) VALUES (:slug, :title, :meta_description, :status) RETURNING id'
        );
        $statement->execute($payload);

        return (int) $statement->fetchColumn();
    }

    public function deletePage(int $id): void
    {
        $statement = $this->pdo->prepare('DELETE FROM site_pages WHERE id = :id');
        $statement->execute(['id' => $id]);
    }

    public function saveSection(array $input): int
    {
        $id = (int) ($input['id'] ?? 0);
        $payload = [
            'page_id' => (int) ($input['page_id'] ?? 0),
            'sort_order' => (int) ($input['sort_order'] ?? 100),
            'section_key' => $this->slug((string) ($input['section_key'] ?? 'section')),
            'eyebrow' => trim((string) ($input['eyebrow'] ?? '')),
            'title' => trim((string) ($input['title'] ?? '')),
            'body_markdown' => trim((string) ($input['body_markdown'] ?? '')),
            'is_active' => isset($input['is_active']) ? 'true' : 'false',
        ];

        if ($id > 0) {
            $payload['id'] = $id;
            $statement = $this->pdo->prepare(
                'UPDATE site_page_sections SET page_id = :page_id, sort_order = :sort_order, section_key = :section_key, eyebrow = :eyebrow, title = :title, body_markdown = :body_markdown, is_active = :is_active, updated_at = NOW() WHERE id = :id'
            );
            $statement->execute($payload);
            return $id;
        }

        $statement = $this->pdo->prepare(
            'INSERT INTO site_page_sections (page_id, sort_order, section_key, eyebrow, title, body_markdown, is_active) VALUES (:page_id, :sort_order, :section_key, :eyebrow, :title, :body_markdown, :is_active) RETURNING id'
        );
        $statement->execute($payload);

        return (int) $statement->fetchColumn();
    }

    public function deleteSection(int $id): void
    {
        $statement = $this->pdo->prepare('DELETE FROM site_page_sections WHERE id = :id');
        $statement->execute(['id' => $id]);
    }

    public function log(?int $adminUserId, string $action, string $entityType, string $entityId, array $metadata = []): void
    {
        $statement = $this->pdo->prepare(
            'INSERT INTO admin_audit_log (admin_user_id, action, entity_type, entity_id, metadata, ip_address) VALUES (:admin_user_id, :action, :entity_type, :entity_id, :metadata, :ip_address)'
        );
        $statement->execute([
            'admin_user_id' => $adminUserId,
            'action' => $action,
            'entity_type' => $entityType,
            'entity_id' => $entityId,
            'metadata' => json_encode($metadata, JSON_THROW_ON_ERROR),
            'ip_address' => $_SERVER['REMOTE_ADDR'] ?? '',
        ]);
    }

    public function slug(string $value): string
    {
        $value = strtolower(trim($value));
        $value = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $value) ?: $value;
        $value = preg_replace('/[^a-z0-9]+/', '-', $value) ?? '';
        $value = trim($value, '-');

        return $value !== '' ? $value : 'contenido';
    }

    private function status(string $value): string
    {
        return in_array($value, ['draft', 'published', 'archived'], true) ? $value : 'draft';
    }
}
