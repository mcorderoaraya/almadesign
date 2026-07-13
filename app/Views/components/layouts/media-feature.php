<?php
declare(strict_types=1);

use App\Core\Markdown;

/** @var array<string, mixed> $section */
/** @var array<string, mixed> $extra */

$image = (string) ($extra['image'] ?? '');
$alt = (string) ($extra['alt'] ?? '');
?>
<section class="alo-section" id="<?= e((string) $section['section_key']) ?>">
    <div class="alo-media">
        <article class="alo-media__copy">
            <?php if ((string) $section['eyebrow'] !== ''): ?>
                <p class="alo-eyebrow"><?= e((string) $section['eyebrow']) ?></p>
            <?php endif; ?>
            <h2 class="alo-title"><?= e((string) $section['title']) ?></h2>
            <div class="alo-richtext"><?= Markdown::safeBasic((string) $section['body_markdown']) ?></div>
        </article>
        <?php if ($image !== ''): ?>
            <figure class="alo-media__figure">
                <img class="alo-media__image" src="<?= e(asset($image)) ?>" alt="<?= e($alt) ?>" loading="lazy" decoding="async">
            </figure>
        <?php endif; ?>
    </div>
</section>
