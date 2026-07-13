<?php
declare(strict_types=1);

use App\Core\Markdown;

/** @var array<string, mixed> $section */
?>
<section class="alo-section" id="<?= e((string) $section['section_key']) ?>">
    <article class="alo-prose">
        <?php if ((string) $section['eyebrow'] !== ''): ?>
            <p class="alo-eyebrow"><?= e((string) $section['eyebrow']) ?></p>
        <?php endif; ?>
        <h2 class="alo-title"><?= e((string) $section['title']) ?></h2>
        <div class="alo-richtext"><?= Markdown::safeBasic((string) $section['body_markdown']) ?></div>
    </article>
</section>
