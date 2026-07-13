<?php
declare(strict_types=1);

use App\Core\Markdown;

/** @var array<string, mixed> $section */
/** @var array<string, mixed> $extra */

$cards = isset($extra['cards']) && is_array($extra['cards']) ? $extra['cards'] : [];
?>
<section class="alo-section" id="<?= e((string) $section['section_key']) ?>">
    <header class="alo-heading">
        <?php if ((string) $section['eyebrow'] !== ''): ?>
            <p class="alo-eyebrow"><?= e((string) $section['eyebrow']) ?></p>
        <?php endif; ?>
        <h2 class="alo-title"><?= e((string) $section['title']) ?></h2>
        <div class="alo-richtext"><?= Markdown::safeBasic((string) $section['body_markdown']) ?></div>
    </header>
    <div class="alo-cardgrid">
        <?php foreach ($cards as $card): ?>
            <?php if (is_array($card)): ?>
                <article class="alo-card">
                    <h3 class="alo-card__title"><?= e((string) ($card['title'] ?? '')) ?></h3>
                    <div class="alo-card__body"><?= Markdown::safeBasic((string) ($card['markdown'] ?? '')) ?></div>
                </article>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>
