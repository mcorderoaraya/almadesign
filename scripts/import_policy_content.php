<?php
declare(strict_types=1);

/*
 * Archivo: import_policy_content.php
 * Path: scripts/import_policy_content.php
 * Ambiente: local|produccion
 * Fecha de creacion: 2026-07-13
 * Explicacion tecnica: importa el contenido completo de la vista politica-almadesign.php hacia PostgreSQL para validar render publico desde base de datos.
 */

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/app/Core/Env.php';
require BASE_PATH . '/app/Services/Database.php';

App\Core\Env::load(BASE_PATH . '/.env');
$config = require BASE_PATH . '/config/app.php';
$pdo = App\Services\Database::pdo($config);

$sourcePath = BASE_PATH . '/app/Views/pages/politica-almadesign.php';
$html = file_get_contents($sourcePath);

if ($html === false) {
    throw new RuntimeException('No se pudo leer ' . $sourcePath);
}

$html = preg_replace('/<\?php.*?\?>/s', '', $html) ?? $html;

$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTML('<?xml encoding="UTF-8">' . $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
libxml_clear_errors();

$xpath = new DOMXPath($dom);

$text = static function (?DOMNode $node): string {
    if ($node === null) {
        return '';
    }

    return trim(preg_replace(
        '/\s+/u',
        ' ',
        html_entity_decode($node->textContent, ENT_QUOTES | ENT_HTML5, 'UTF-8')
    ) ?? '');
};

$markdownForContent = static function (DOMElement $content) use ($text): string {
    $blocks = [];

    foreach ($content->childNodes as $child) {
        if (!$child instanceof DOMElement) {
            continue;
        }

        $tag = strtolower($child->tagName);
        $class = $child->getAttribute('class');

        if ($tag === 'p' && str_contains($class, 'manifest-section__subtitle')) {
            continue;
        }

        if ($tag === 'h2') {
            continue;
        }

        if ($tag === 'p') {
            $blocks[] = $text($child);
            continue;
        }

        if ($tag === 'ul') {
            $items = [];
            foreach ($child->getElementsByTagName('li') as $li) {
                $items[] = '- ' . $text($li);
            }

            if ($items !== []) {
                $blocks[] = implode("\n", $items);
            }
            continue;
        }

        if ($tag === 'blockquote') {
            $blocks[] = '> ' . $text($child);
            continue;
        }

        if ($tag === 'pre') {
            $blocks[] = "```\n" . trim($child->textContent) . "\n```";
        }
    }

    return trim(implode("\n\n", array_filter(
        $blocks,
        static fn (string $block): bool => trim($block) !== ''
    )));
};

$h1 = $xpath->query("//h1[@id='policy-title']")->item(0);
$leadNodes = $xpath->query(
    "//section[contains(concat(' ', normalize-space(@class), ' '), ' manifest-hero ')]" .
    "//p[contains(concat(' ', normalize-space(@class), ' '), ' lead ')]"
);

$heroBody = [];
foreach ($leadNodes as $lead) {
    $heroBody[] = $text($lead);
}

$pageTitle = 'Política AlmaDesign | IA para humanos';
$metaDescription = 'Política de AlmaDesign sobre protección de datos personales, consentimiento, sistemas RAG e inteligencia artificial responsable.';

$pdo->beginTransaction();

try {
    $pageStatement = $pdo->prepare(
        "INSERT INTO site_pages (slug, title, meta_description, status)
         VALUES (:slug, :title, :meta_description, 'published')
         ON CONFLICT (slug) DO UPDATE SET
            title = EXCLUDED.title,
            meta_description = EXCLUDED.meta_description,
            status = 'published',
            updated_at = NOW()
         RETURNING id"
    );
    $pageStatement->execute([
        'slug' => 'politica-almadesign',
        'title' => $pageTitle,
        'meta_description' => $metaDescription,
    ]);
    $pageId = (int) $pageStatement->fetchColumn();

    $deleteStatement = $pdo->prepare('DELETE FROM site_page_sections WHERE page_id = :page_id');
    $deleteStatement->execute(['page_id' => $pageId]);

    $insertStatement = $pdo->prepare(
        'INSERT INTO site_page_sections
            (page_id, sort_order, section_key, eyebrow, title, body_markdown, extra_json, is_active)
         VALUES
            (:page_id, :sort_order, :section_key, :eyebrow, :title, :body_markdown, :extra_json, TRUE)'
    );

    $insertStatement->execute([
        'page_id' => $pageId,
        'sort_order' => 10,
        'section_key' => 'hero',
        'eyebrow' => 'Política AlmaDesign',
        'title' => $text($h1),
        'body_markdown' => implode("\n\n", $heroBody),
        'extra_json' => json_encode([
            'source' => 'app/Views/pages/politica-almadesign.php',
            'type' => 'hero',
        ], JSON_THROW_ON_ERROR),
    ]);

    $sectionCount = 1;
    $articleNodes = $xpath->query("//article[contains(concat(' ', normalize-space(@class), ' '), ' manifest-section ')]");

    foreach ($articleNodes as $index => $article) {
        if (!$article instanceof DOMElement) {
            continue;
        }

        $content = $xpath
            ->query(".//div[contains(concat(' ', normalize-space(@class), ' '), ' manifest-section__content ')]", $article)
            ->item(0);

        if (!$content instanceof DOMElement) {
            continue;
        }

        $subtitle = $xpath
            ->query(".//p[contains(concat(' ', normalize-space(@class), ' '), ' manifest-section__subtitle ')]", $content)
            ->item(0);
        $title = $xpath->query('.//h2', $content)->item(0);

        $insertStatement->execute([
            'page_id' => $pageId,
            'sort_order' => 20 + ($index * 10),
            'section_key' => $article->getAttribute('id') ?: 'politica-seccion-' . ($index + 1),
            'eyebrow' => $text($subtitle),
            'title' => $text($title),
            'body_markdown' => $markdownForContent($content),
            'extra_json' => json_encode([
                'source' => 'app/Views/pages/politica-almadesign.php',
                'article_id' => $article->getAttribute('id'),
            ], JSON_THROW_ON_ERROR),
        ]);
        $sectionCount++;
    }

    $pdo->commit();

    echo 'OK politica-almadesign completa cargada' . PHP_EOL;
    echo 'Secciones activas: ' . $sectionCount . PHP_EOL;
} catch (Throwable $exception) {
    $pdo->rollBack();
    throw $exception;
}
