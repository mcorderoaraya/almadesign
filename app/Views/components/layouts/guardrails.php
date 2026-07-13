<?php
declare(strict_types=1);

/** @var array<string, mixed> $section */
/** @var array<string, mixed> $extra */

$items = isset($extra['items']) && is_array($extra['items']) ? $extra['items'] : [];
?>
<section class="vertical-detail-guardrails alma-section alma-content-section" id="<?= e((string) $section['section_key']) ?>" aria-labelledby="guardrails-title">
    <div>
        <?php if ((string) $section['eyebrow'] !== ''): ?>
            <p class="eyebrow"><?= e((string) $section['eyebrow']) ?></p>
        <?php endif; ?>
        <h2 id="guardrails-title"><?= e((string) $section['title']) ?></h2>
        <?php if ((string) $section['body_markdown'] !== ''): ?>
            <p><?= e((string) $section['body_markdown']) ?></p>
        <?php endif; ?>
    </div>
    <?php foreach ($items as $item): ?>
        <?php if (is_array($item)): ?>
            <blockquote>
                <p><strong><?= e((string) ($item['title'] ?? '')) ?></strong></p>
                <p><?= e((string) ($item['body'] ?? '')) ?></p>
            </blockquote>
        <?php endif; ?>
    <?php endforeach; ?>
</section>
