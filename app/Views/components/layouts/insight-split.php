<?php
declare(strict_types=1);

use App\Core\Markdown;

/** @var array<string, mixed> $section */
/** @var array<string, mixed> $extra */

$columns = isset($extra['columns']) && is_array($extra['columns']) ? $extra['columns'] : [];
?>
<section class="alo-section" id="<?= e((string) $section['section_key']) ?>">
    <div class="alo-insight">
        <?php foreach ($columns as $column): ?>
            <?php if (is_array($column)): ?>
                <article class="alo-insight__panel">
                    <?php if (($column['eyebrow'] ?? '') !== ''): ?>
                        <p class="alo-eyebrow"><?= e((string) $column['eyebrow']) ?></p>
                    <?php endif; ?>
                    <h2 class="alo-title"><?= e((string) ($column['title'] ?? '')) ?></h2>
                    <div class="alo-richtext"><?= Markdown::safeBasic((string) ($column['markdown'] ?? '')) ?></div>
                </article>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>
