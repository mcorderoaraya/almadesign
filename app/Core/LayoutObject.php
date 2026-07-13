<?php
declare(strict_types=1);

namespace App\Core;

// Renderizador seguro de objetos layout reutilizables alimentados desde secciones PostgreSQL.
final class LayoutObject
{
    private const COMPONENTS = [
        'hero_vertical' => 'hero-vertical',
        'markdown_section' => 'markdown-section',
        'assistant_feature' => 'assistant-feature',
        'two_column_feature' => 'two-column-feature',
        'rag_comparison' => 'rag-comparison',
        'case_table' => 'case-table',
        'insight_split' => 'insight-split',
        'card_grid' => 'card-grid',
        'consulting_cards' => 'consulting-cards',
        'guardrails' => 'guardrails',
        'vertical_sections' => 'vertical-sections',
        'media_feature' => 'media-feature',
    ];

    /**
     * @param array<string, mixed> $section
     * @param array<string, mixed> $extra
     */
    public static function render(array $section, array $extra = []): void
    {
        $layout = (string) ($extra['layout'] ?? 'markdown_section');
        $component = self::COMPONENTS[$layout] ?? self::COMPONENTS['markdown_section'];
        $componentFile = BASE_PATH . '/app/Views/components/layouts/' . $component . '.php';

        if (!is_file($componentFile)) {
            return;
        }

        require $componentFile;
    }
}
