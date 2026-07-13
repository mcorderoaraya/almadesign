<?php
declare(strict_types=1);

use App\Core\Markdown;

/** @var array<string, mixed> $page */
/** @var array<int, array<string, mixed>> $sections */

$pageClass = isset($pageClass) && is_string($pageClass) ? $pageClass : '';
$ctaHref = isset($ctaHref) && is_string($ctaHref) ? $ctaHref : url('/contacto');
$cta = isset($cta) && is_string($cta) ? $cta : 'Conversemos';
$hero = $sections[0] ?? null;
$bodySections = array_slice($sections, 1);
?>
<!-- content-source:postgresql -->
<div class="alma-home alma-content-page<?= $pageClass !== '' ? ' ' . e($pageClass) : '' ?>">
    <?php if ($hero !== null): ?>
        <section class="vertical-detail-hero alma-content-hero" id="<?= e((string) $hero['section_key']) ?>" aria-labelledby="vertical-db-title">
            <div class="home-third__inner vertical-detail-hero__inner">
                <?php if ((string) $hero['eyebrow'] !== ''): ?>
                    <p class="eyebrow"><?= e((string) $hero['eyebrow']) ?></p>
                <?php endif; ?>
                <h1 id="vertical-db-title"><?= e((string) $hero['title']) ?></h1>
                <div class="lead">
                    <?= Markdown::safeBasic((string) $hero['body_markdown']) ?>
                </div>
                <div class="hero-actions" aria-label="Acciones principales">
                    <a class="button button-primary" href="<?= e($ctaHref) ?>"><?= e($cta) ?></a>
                    <a class="button button-secondary" href="<?= e(url('/')) ?>">Volver al Home</a>
                    <a class="button button-primary" href="<?= e(url('/politica-almadesign')) ?>">Políticas de AlmaDesign</a>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($bodySections !== []): ?>
        <section class="vertical-detail-content alma-section alma-content-section" aria-label="Contenido principal">
            <?php foreach ($bodySections as $section): ?>
                <article class="vertical-detail-block" id="<?= e((string) $section['section_key']) ?>">
                    <?php if ((string) $section['eyebrow'] !== ''): ?>
                        <p class="eyebrow"><?= e((string) $section['eyebrow']) ?></p>
                    <?php endif; ?>
                    <h2><?= e((string) $section['title']) ?></h2>
                    <?= Markdown::safeBasic((string) $section['body_markdown']) ?>
                </article>
            <?php endforeach; ?>
        </section>
    <?php endif; ?>
</div>
