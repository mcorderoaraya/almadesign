<?php
declare(strict_types=1);

/** @var array<string, mixed> $section */
/** @var array<string, mixed> $extra */

$items = isset($extra['items']) && is_array($extra['items']) ? $extra['items'] : [];
$variant = (string) ($extra['variant'] ?? 'approach');
$keyLabel = (string) ($extra['key_label'] ?? 'Clave');
$sectionClass = 'consulting-section alma-content-section consulting-section--' . $variant;

if ($variant === 'executive') {
    $sectionClass .= ' executive-section';
}

$sectionId = 'consulting-section-' . preg_replace('/[^a-z0-9_-]/i', '-', (string) $section['section_key']);
?>
<section class="<?= e($sectionClass) ?>" id="<?= e((string) $section['section_key']) ?>" aria-labelledby="<?= e($sectionId) ?>">
    <div class="section-heading">
        <?php if ((string) $section['eyebrow'] !== ''): ?>
            <p class="eyebrow"><?= e((string) $section['eyebrow']) ?></p>
        <?php endif; ?>
        <h2 id="<?= e($sectionId) ?>"><?= e((string) $section['title']) ?></h2>
        <?php if ((string) $section['body_markdown'] !== ''): ?>
            <p><?= e((string) $section['body_markdown']) ?></p>
        <?php endif; ?>
    </div>
    <div class="consulting-card-grid">
        <?php foreach ($items as $itemIndex => $item): ?>
            <?php if (is_array($item)): ?>
                <?php $cardClass = $variant === 'executive' ? 'consulting-card executive-card' : 'consulting-card'; ?>
                <article class="<?= e($cardClass) ?>"<?= isset($item['anchor']) ? ' id="' . e((string) $item['anchor']) . '"' : '' ?>>
                    <span class="consulting-card__index"><?= e(str_pad((string) ($itemIndex + 1), 2, '0', STR_PAD_LEFT)) ?></span>
                    <h3><?= e((string) ($item['title'] ?? '')) ?></h3>
                    <?php foreach ((array) ($item['body'] ?? []) as $bodyParagraph): ?>
                        <p><?= e((string) $bodyParagraph) ?></p>
                    <?php endforeach; ?>
                    <?php if (isset($item['items']) && is_array($item['items'])): ?>
                        <ul class="consulting-card__list">
                            <?php foreach ($item['items'] as $detail): ?>
                                <li><?= e((string) $detail) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <?php if (($item['key'] ?? '') !== ''): ?>
                        <p class="consulting-card__key"><strong><?= e($keyLabel) ?>:</strong> <?= e((string) $item['key']) ?></p>
                    <?php endif; ?>
                </article>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>
