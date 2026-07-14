<?php
declare(strict_types=1);

namespace App\Services;

use PDO;
use RuntimeException;

// Gestiona Markdown del RAG desde el dashboard, escribiendo solo dentro del directorio configurado.
final class RagMarkdownService
{
    public function __construct(
        private readonly PDO $pdo,
        private readonly string $markdownPath,
        private readonly ContentRepository $contentRepository
    ) {
    }

    public function documents(): array
    {
        return $this->pdo
            ->query('SELECT * FROM rag_markdown_documents ORDER BY updated_at DESC, id DESC')
            ->fetchAll();
    }

    public function save(array $input): int
    {
        $slug = $this->contentRepository->slug((string) ($input['slug'] ?? ''));
        $title = trim((string) ($input['title'] ?? ''));
        $sourceUrl = trim((string) ($input['source_url'] ?? 'https://almadesign.cl/'));
        $body = trim((string) ($input['content_markdown'] ?? ''));
        $status = $this->status((string) ($input['status'] ?? 'draft'));
        $contentType = $this->contentType((string) ($input['content_type'] ?? 'reference'));
        $parentSlug = $this->optionalSlug((string) ($input['parent_slug'] ?? ''));
        $visibility = $this->visibility((string) ($input['visibility'] ?? 'rag_only'));
        $filename = $slug . '.md';
        $content = $this->frontMatter($title, $sourceUrl, $contentType, $parentSlug, $visibility) . "\n\n" . $body . "\n";

        if ($status === 'published') {
            $this->writeFile($filename, $content);
        } else {
            $this->deleteFile($filename);
        }

        $statement = $this->pdo->prepare(<<<'SQL'
            INSERT INTO rag_markdown_documents (slug, title, source_url, filename, content_markdown, status, content_type, parent_slug, visibility, published_at)
            VALUES (:slug, :title, :source_url, :filename, :content_markdown, :status, :content_type, :parent_slug, :visibility, CASE WHEN :status = 'published' THEN NOW() ELSE NULL END)
            ON CONFLICT (slug) DO UPDATE SET
                title = EXCLUDED.title,
                source_url = EXCLUDED.source_url,
                filename = EXCLUDED.filename,
                content_markdown = EXCLUDED.content_markdown,
                status = EXCLUDED.status,
                content_type = EXCLUDED.content_type,
                parent_slug = EXCLUDED.parent_slug,
                visibility = EXCLUDED.visibility,
                published_at = CASE WHEN EXCLUDED.status = 'published' THEN COALESCE(rag_markdown_documents.published_at, NOW()) ELSE NULL END,
                updated_at = NOW()
            RETURNING id
            SQL);
        $statement->execute([
            'slug' => $slug,
            'title' => $title,
            'source_url' => $sourceUrl,
            'filename' => $filename,
            'content_markdown' => $body,
            'status' => $status,
            'content_type' => $contentType,
            'parent_slug' => $parentSlug,
            'visibility' => $visibility,
        ]);

        return (int) $statement->fetchColumn();
    }

    private function frontMatter(
        string $title,
        string $sourceUrl,
        string $contentType,
        string $parentSlug,
        string $visibility
    ): string {
        $lines = [
            '---',
            'title: "' . str_replace('"', '\"', $title) . '"',
            'source_url: "' . str_replace('"', '\"', $sourceUrl) . '"',
            'content_type: "' . $contentType . '"',
            'visibility: "' . $visibility . '"',
        ];

        if ($parentSlug !== '') {
            $lines[] = 'parent_slug: "' . $parentSlug . '"';
        }

        $lines[] = '---';

        return implode("\n", $lines);
    }

    private function status(string $value): string
    {
        return in_array($value, ['draft', 'published', 'archived'], true) ? $value : 'draft';
    }

    private function contentType(string $value): string
    {
        return in_array($value, ['reference', 'legal_reference', 'policy_note', 'product_context', 'operational_note'], true)
            ? $value
            : 'reference';
    }

    private function optionalSlug(string $value): string
    {
        $value = trim($value);

        return $value !== '' ? $this->contentRepository->slug($value) : '';
    }

    private function visibility(string $value): string
    {
        return in_array($value, ['rag_only', 'linked', 'public', 'internal'], true) ? $value : 'rag_only';
    }

    private function writeFile(string $filename, string $content): void
    {
        $base = realpath($this->markdownPath);
        if ($base === false || !is_dir($base)) {
            throw new RuntimeException('El directorio RAG_DOCS_MARKDOWN_PATH no existe.');
        }

        $target = $base . DIRECTORY_SEPARATOR . $filename;
        $resolvedDir = realpath(dirname($target));
        if ($resolvedDir === false || !str_starts_with($resolvedDir, $base)) {
            throw new RuntimeException('Ruta de Markdown fuera del directorio permitido.');
        }

        file_put_contents($target, $content, LOCK_EX);
    }

    private function deleteFile(string $filename): void
    {
        $base = realpath($this->markdownPath);
        if ($base === false || !is_dir($base)) {
            throw new RuntimeException('El directorio RAG_DOCS_MARKDOWN_PATH no existe.');
        }

        $target = $base . DIRECTORY_SEPARATOR . $filename;
        $resolvedDir = realpath(dirname($target));
        if ($resolvedDir === false || !str_starts_with($resolvedDir, $base)) {
            throw new RuntimeException('Ruta de Markdown fuera del directorio permitido.');
        }

        if (is_file($target)) {
            unlink($target);
        }
    }
}
