<?php
declare(strict_types=1);

/** @var array<string, mixed> $section */
/** @var array<string, mixed> $extra */

$left = isset($extra['left']) && is_array($extra['left']) ? $extra['left'] : [];
$right = isset($extra['right']) && is_array($extra['right']) ? $extra['right'] : [];
$insightClass = ((bool) ($extra['is_insight'] ?? false)) ? ' document-management-feature--insight' : '';
?>
<section class="vertical-detail-content alma-section alma-content-section document-management-feature-section" id="<?= e((string) $section['section_key']) ?>" aria-label="<?= e((string) ($extra['aria_label'] ?? 'Bloque destacado')) ?>">
    <div class="alma-assistant-feature document-management-feature<?= e($insightClass) ?>">
        <article class="alma-assistant-feature__intro"<?= isset($left['anchor']) ? ' id="' . e((string) $left['anchor']) . '"' : '' ?>>
            <?php if (($left['eyebrow'] ?? '') !== ''): ?>
                <p class="eyebrow"><?= e((string) $left['eyebrow']) ?></p>
            <?php endif; ?>
            <h2><?= e((string) ($left['title'] ?? '')) ?></h2>
            <?php foreach ((array) ($left['body'] ?? []) as $bodyParagraph): ?>
                <p><?= e((string) $bodyParagraph) ?></p>
            <?php endforeach; ?>
        </article>
        <article class="alma-assistant-feature__support"<?= isset($right['anchor']) ? ' id="' . e((string) $right['anchor']) . '"' : '' ?>>
            <?php if (($right['eyebrow'] ?? '') !== ''): ?>
                <p class="eyebrow"><?= e((string) $right['eyebrow']) ?></p>
            <?php endif; ?>
            <h2><?= e((string) ($right['title'] ?? '')) ?></h2>
            <?php foreach ((array) ($right['body'] ?? []) as $bodyParagraph): ?>
                <p><?= e((string) $bodyParagraph) ?></p>
            <?php endforeach; ?>
        </article>
    </div>
</section>
