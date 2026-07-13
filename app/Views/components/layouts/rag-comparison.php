<?php
declare(strict_types=1);

use App\Core\Markdown;

/** @var array<string, mixed> $section */
/** @var array<string, mixed> $extra */

$columns = isset($extra['columns']) && is_array($extra['columns']) ? $extra['columns'] : [];
$decisionRows = isset($extra['decision_rows']) && is_array($extra['decision_rows']) ? $extra['decision_rows'] : [];
$flow = isset($extra['flow']) && is_array($extra['flow']) ? $extra['flow'] : [];
?>
<section class="document-rag-section alma-section alma-content-section" id="<?= e((string) $section['section_key']) ?>" aria-labelledby="document-rag-title">
    <div class="document-rag-section__inner">
    <header class="document-rag-section__header">
        <?php if ((string) $section['eyebrow'] !== ''): ?>
            <p class="eyebrow"><?= e((string) $section['eyebrow']) ?></p>
        <?php endif; ?>
        <h2 id="document-rag-title"><?= e((string) $section['title']) ?></h2>
        <div><?= Markdown::safeBasic((string) $section['body_markdown']) ?></div>
    </header>
    <div class="document-rag-comparison" aria-label="<?= e((string) ($extra['comparison_label'] ?? 'Comparación operativa')) ?>">
        <?php foreach ($columns as $column): ?>
            <?php if (is_array($column)): ?>
                <article class="document-rag-panel">
                    <p class="document-rag-panel__label"><?= e((string) ($column['label'] ?? '')) ?></p>
                    <h3><?= e((string) ($column['title'] ?? '')) ?></h3>
                    <div><?= Markdown::safeBasic((string) ($column['markdown'] ?? '')) ?></div>
                </article>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <?php if ($decisionRows !== []): ?>
        <div class="document-rag-decision" role="region" aria-label="<?= e((string) ($extra['decision_label'] ?? 'Criterios operativos')) ?>" tabindex="0">
            <table>
                <tbody>
                    <?php foreach ($decisionRows as $row): ?>
                        <?php if (is_array($row)): ?>
                            <tr>
                                <th scope="row"><?= e((string) ($row[0] ?? '')) ?></th>
                                <td><?= e((string) ($row[1] ?? '')) ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
    <?php if ($flow !== []): ?>
        <ol class="document-rag-flow" aria-label="<?= e((string) ($extra['flow_label'] ?? 'Flujo operativo')) ?>">
            <?php foreach ($flow as $step): ?>
                <li><?= e((string) $step) ?></li>
            <?php endforeach; ?>
        </ol>
    <?php endif; ?>
    </div>
</section>
