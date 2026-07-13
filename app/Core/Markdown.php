<?php
declare(strict_types=1);

namespace App\Core;

// Renderer Markdown mínimo y seguro para contenido editorial administrado desde PostgreSQL.
final class Markdown
{
    public static function safeBasic(string $markdown): string
    {
        $markdown = trim($markdown);

        if ($markdown === '') {
            return '';
        }

        $html = '';
        $lines = preg_split('/\R/', $markdown) ?: [];
        $paragraph = [];
        $listItems = [];
        $quote = [];
        $code = [];
        $inCode = false;
        $tableRows = [];

        $inline = static function (string $text): string {
            $safe = e($text);
            $safe = preg_replace('/\*\*(.+?)\*\*/', '<strong>$1</strong>', $safe) ?? $safe;
            return preg_replace('/\*(.+?)\*/', '<em>$1</em>', $safe) ?? $safe;
        };

        $flushParagraph = static function () use (&$html, &$paragraph, $inline): void {
            if ($paragraph === []) {
                return;
            }

            $html .= '<p>' . $inline(implode(' ', $paragraph)) . '</p>';
            $paragraph = [];
        };

        $flushList = static function () use (&$html, &$listItems, $inline): void {
            if ($listItems === []) {
                return;
            }

            $html .= '<ul>';
            foreach ($listItems as $item) {
                $html .= '<li>' . $inline($item) . '</li>';
            }
            $html .= '</ul>';
            $listItems = [];
        };

        $flushQuote = static function () use (&$html, &$quote, $inline): void {
            if ($quote === []) {
                return;
            }

            $html .= '<blockquote><p>' . $inline(implode(' ', $quote)) . '</p></blockquote>';
            $quote = [];
        };

        $flushCode = static function () use (&$html, &$code): void {
            if ($code === []) {
                return;
            }

            $html .= '<pre><code>' . e(implode("\n", $code)) . '</code></pre>';
            $code = [];
        };

        $flushTable = static function () use (&$html, &$tableRows, $inline): void {
            if (count($tableRows) < 2) {
                $tableRows = [];
                return;
            }

            $headers = array_shift($tableRows);
            $html .= '<div class="vertical-detail-table-wrap" role="region" aria-label="Tabla de contenido" tabindex="0">';
            $html .= '<table class="vertical-detail-table"><thead><tr>';
            foreach ($headers as $header) {
                $html .= '<th scope="col">' . $inline($header) . '</th>';
            }
            $html .= '</tr></thead><tbody>';

            foreach ($tableRows as $row) {
                $html .= '<tr>';
                foreach ($row as $index => $cell) {
                    $tag = $index === 0 ? 'th scope="row"' : 'td';
                    $closeTag = $index === 0 ? 'th' : 'td';
                    $html .= '<' . $tag . '>' . $inline($cell) . '</' . $closeTag . '>';
                }
                $html .= '</tr>';
            }

            $html .= '</tbody></table></div>';
            $tableRows = [];
        };

        $parseTableRow = static function (string $line): array {
            $line = trim($line, '| ');
            return array_map('trim', explode('|', $line));
        };

        foreach ($lines as $line) {
            $line = rtrim($line);

            if (trim($line) === '```') {
                if ($inCode) {
                    $flushCode();
                    $inCode = false;
                    continue;
                }

                $flushParagraph();
                $flushList();
                $flushQuote();
                $inCode = true;
                continue;
            }

            if ($inCode) {
                $code[] = $line;
                continue;
            }

            $line = trim($line);

        if ($line === '') {
            $flushParagraph();
            $flushList();
            $flushQuote();
            $flushTable();
            continue;
        }

            if (str_starts_with($line, '|') && str_ends_with($line, '|')) {
                $flushParagraph();
                $flushList();
                $flushQuote();

                if (preg_match('/^\|[\s:-]+\|/', $line) === 1) {
                    continue;
                }

                $tableRows[] = $parseTableRow($line);
                continue;
            }

        if (str_starts_with($line, '- ')) {
            $flushParagraph();
            $flushQuote();
            $flushTable();
            $listItems[] = substr($line, 2);
            continue;
        }

        if (str_starts_with($line, '> ')) {
            $flushParagraph();
            $flushList();
            $flushTable();
            $quote[] = substr($line, 2);
            continue;
        }

        $flushList();
        $flushQuote();
            $flushTable();
        $paragraph[] = $line;
    }

    $flushParagraph();
    $flushList();
    $flushQuote();
    $flushCode();
        $flushTable();

    return $html;
    }
}
