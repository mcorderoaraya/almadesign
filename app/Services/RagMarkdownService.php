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
        $status = ((string) ($input['status'] ?? 'draft')) === 'published' ? 'published' : 'draft';
        $filename = $slug . '.md';
        $content = $this->frontMatter($title, $sourceUrl) . "\n\n" . $body . "\n";

        $this->writeFile($filename, $content);

        $statement = $this->pdo->prepare(<<<'SQL'
            INSERT INTO rag_markdown_documents (slug, title, source_url, filename, content_markdown, status, published_at)
            VALUES (:slug, :title, :source_url, :filename, :content_markdown, :status, CASE WHEN :status = 'published' THEN NOW() ELSE NULL END)
            ON CONFLICT (slug) DO UPDATE SET
                title = EXCLUDED.title,
                source_url = EXCLUDED.source_url,
                filename = EXCLUDED.filename,
                content_markdown = EXCLUDED.content_markdown,
                status = EXCLUDED.status,
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
        ]);

        return (int) $statement->fetchColumn();
    }

    private function frontMatter(string $title, string $sourceUrl): string
    {
        return "---\n"
            . 'title: "' . str_replace('"', '\"', $title) . '"' . "\n"
            . 'source_url: "' . str_replace('"', '\"', $sourceUrl) . '"' . "\n"
            . "---";
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
}
