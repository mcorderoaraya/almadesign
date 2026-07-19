<?php
declare(strict_types=1);

use App\Core\Markdown;

/** @var array<string, mixed> $section */
/** @var array<string, mixed> $extra */

$primaryHref = (string) ($extra['primary_href'] ?? url('/contacto'));
$primaryLabel = (string) ($extra['primary_label'] ?? 'Conversemos');
$secondaryHref = (string) ($extra['secondary_href'] ?? url('/'));
$secondaryLabel = (string) ($extra['secondary_label'] ?? 'Volver al Home');
$backgroundImage = (string) ($extra['background_image'] ?? '');
$backgroundImageAlt = trim((string) ($extra['image_alt'] ?? ''));
$style = $backgroundImage !== ''
    ? "--alo-hero-image: url('" . e(asset($backgroundImage)) . "');"
    : '';
?>
<section
    class="alo-hero"
    id="<?= e((string) $section['section_key']) ?>"
    <?= $style !== '' ? ' style="' . $style . '"' : '' ?>
>
    <?php if ($backgroundImageAlt !== ''): ?>
        <span class="sr-only"><?= e($backgroundImageAlt) ?></span>
    <?php endif; ?>
    <div class="alo-hero__inner">
        <?php if ((string) $section['eyebrow'] !== ''): ?>
            <p class="alo-eyebrow"><?= e((string) $section['eyebrow']) ?></p>
        <?php endif; ?>
        <h1 class="alo-hero__title"><?= e((string) $section['title']) ?></h1>
        <div class="alo-hero__body"><?= Markdown::safeBasic((string) $section['body_markdown']) ?></div>
        <div class="hero-actions" aria-label="Acciones principales">
            <a class="button button-primary" href="<?= e($primaryHref) ?>"><?= e($primaryLabel) ?></a>
            <a class="button button-secondary" href="<?= e($secondaryHref) ?>"><?= e($secondaryLabel) ?></a>
            <a class="button button-primary" href="<?= e(url('/politica-almadesign')) ?>">Políticas de AlmaDesign</a>
        </div>
    </div>
</section>
