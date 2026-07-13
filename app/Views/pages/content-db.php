<?php
declare(strict_types=1);

use App\Core\Markdown;

/** @var array<string, mixed> $page */
/** @var array<int, array<string, mixed>> $sections */

$viewClass = isset($viewClass) && is_string($viewClass) ? $viewClass : '';
$ariaLabel = isset($ariaLabel) && is_string($ariaLabel) ? $ariaLabel : (string) ($page['title'] ?? 'Contenido');
$showSignature = ($showSignature ?? false) === true;
$isPolicyPage = str_contains($viewClass, 'policy-page') || str_contains(mb_strtolower($ariaLabel), 'política');
$hero = $sections[0] ?? null;
$bodySections = array_slice($sections, 1);
?>
<!-- content-source:postgresql -->
<div class="alma-home alma-content-page<?= $viewClass !== '' ? ' ' . e($viewClass) : '' ?>" aria-labelledby="content-db-title">
    <?php if ($hero !== null): ?>
        <section class="manifest-hero alma-content-hero" aria-labelledby="content-db-title">
            <div class="manifest-hero__grid">
                <div class="manifest-hero__copy">
                    <?php if ((string) $hero['eyebrow'] !== ''): ?>
                        <p class="eyebrow"><?= e((string) $hero['eyebrow']) ?></p>
                    <?php endif; ?>
                    <h1 id="content-db-title"><?= e((string) $hero['title']) ?></h1>
                    <div class="lead">
                        <?= Markdown::safeBasic((string) $hero['body_markdown']) ?>
                    </div>
                    <?php if (!$isPolicyPage): ?>
                        <div class="hero-actions" aria-label="Acciones principales">
                            <a class="button button-primary" href="<?= e(url('/politica-almadesign')) ?>">Políticas de AlmaDesign</a>
                        </div>
                    <?php endif; ?>
                </div>
                <aside class="manifest-audio-card policy-manifest-card" aria-label="Principio central">
                    <p class="manifest-audio-card__eyebrow">Principio</p>
                    <h2>IA para humanos</h2>
                    <p>La IA debe estar al servicio de las personas, no las personas al servicio de la IA.</p>
                </aside>
            </div>
        </section>
    <?php endif; ?>

    <section class="manifest-body alma-content-section" aria-label="<?= e($ariaLabel) ?>">
        <?php foreach ($bodySections as $index => $section): ?>
            <article class="manifest-section" id="<?= e((string) $section['section_key']) ?>">
                <p class="manifest-section__number"><em><?= e(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)) ?></em></p>
                <div class="manifest-section__content">
                    <?php if ((string) $section['eyebrow'] !== ''): ?>
                        <p class="manifest-section__subtitle"><?= e((string) $section['eyebrow']) ?></p>
                    <?php endif; ?>
                    <h2><?= e((string) $section['title']) ?></h2>
                    <?= Markdown::safeBasic((string) $section['body_markdown']) ?>
                </div>
            </article>
        <?php endforeach; ?>
    </section>

    <?php if ($showSignature): ?>
        <section class="ai-for-humans-signature alma-section alma-content-section" id="firma-fundacional" aria-labelledby="ai-for-humans-signature-title">
            <div class="ai-for-humans-signature__inner">
                <figure class="ai-for-humans-signature__media">
                    <img src="<?= e(asset('img/logos/logo_alma_vintage.svg')) ?>" alt="AlmaDesign" loading="lazy" decoding="async" width="320" height="110">
                </figure>
                <div class="ai-for-humans-signature__content">
                    <h2 id="ai-for-humans-signature-title" class="sr-only">Firma fundacional</h2>
                    <blockquote class="ai-for-humans-signature__quote">
                        <p>AlmaDesign nace de una convicción: la tecnología correcta no reemplaza el alma humana; le devuelve instrumentos para crear, decidir y desarrollarse.</p>
                    </blockquote>
                    <p class="ai-for-humans-signature__name">Mauricio Cordero Araya</p>
                    <p class="ai-for-humans-signature__role">Fundador de AlmaDesign</p>
                </div>
            </div>
        </section>
    <?php endif; ?>
</div>
