<?php
declare(strict_types=1);

/** @var array<int, array{title: string, body?: string|list<string>, items?: list<string>}> $sections */
/** @var array<int, array{title: string, intro: string, items: list<array{title: string, body?: string|list<string>, items?: list<string>, key: string}>, eyebrow?: string, keyLabel?: string, variant?: string}>|null $cardSections */
/** @var list<string> $guardrails */
$cardSections = $cardSections ?? [];
$leadParagraphs = $leadParagraphs ?? [$lead];
$guardrailsEyebrow = $guardrailsEyebrow ?? 'Gobernanza';
$guardrailsTitle = $guardrailsTitle ?? 'Límites explícitos de comunicación.';
$guardrailsIntro = $guardrailsIntro ?? null;
$finalCta = $finalCta ?? [
    'eyebrow' => 'Conversemos',
    'title' => 'Hablemos de tu proyecto.',
    'body' => 'Si tu organización necesita claridad, trazabilidad y criterio humano para adoptar IA, AlmaDesign puede ayudarte a ordenar el camino.',
    'label' => 'Hablemos de tu proyecto',
    'href' => url('/contacto'),
];
?>
<div class="alma-home">
    <section class="vertical-detail-hero" aria-labelledby="vertical-detail-title">
        <p class="eyebrow"><?= e($eyebrow) ?></p>
        <h1 id="vertical-detail-title"><?= e($heading) ?></h1>
        <?php foreach ($leadParagraphs as $leadIndex => $leadParagraph): ?>
            <p class="lead<?= $leadIndex > 0 ? ' lead--secondary' : '' ?>"><?= e($leadParagraph) ?></p>
        <?php endforeach; ?>
        <div class="hero-actions" aria-label="Acciones principales">
            <a class="button button-primary" href="<?= e(url('/contacto')) ?>"><?= e($cta) ?></a>
            <a class="button button-secondary" href="<?= e(url('/')) ?>">Volver al Home</a>
        </div>
    </section>

    <section class="vertical-detail-content alma-section" aria-label="Contenido principal">
        <?php foreach ($sections as $section): ?>
            <article class="vertical-detail-block">
                <h2><?= e($section['title']) ?></h2>
                <?php if (isset($section['body'])): ?>
                    <?php foreach ((array) $section['body'] as $bodyParagraph): ?>
                        <p><?= e($bodyParagraph) ?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php if (isset($section['items'])): ?>
                    <ul>
                        <?php foreach ($section['items'] as $item): ?>
                            <li><?= e($item) ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </article>
        <?php endforeach; ?>
    </section>

    <?php foreach ($cardSections as $cardSectionIndex => $cardSection): ?>
        <?php
            $cardSectionVariant = $cardSection['variant'] ?? ($cardSectionIndex === 0 ? 'approach' : 'deliverables');
            $cardSectionId = 'card-section-' . $cardSectionIndex;
        ?>
        <section class="consulting-section consulting-section--<?= e($cardSectionVariant) ?><?= $cardSectionVariant === 'executive' ? ' executive-section' : '' ?>" aria-labelledby="<?= e($cardSectionId) ?>">
            <div class="section-heading">
                <p class="eyebrow"><?= e($cardSection['eyebrow'] ?? $eyebrow) ?></p>
                <h2 id="<?= e($cardSectionId) ?>"><?= e($cardSection['title']) ?></h2>
                <p><?= e($cardSection['intro']) ?></p>
            </div>
            <div class="consulting-card-grid">
                <?php foreach ($cardSection['items'] as $itemIndex => $item): ?>
                    <article class="consulting-card<?= $cardSectionVariant === 'executive' ? ' executive-card' : '' ?>">
                        <span class="consulting-card__index"><?= e(str_pad((string) ($itemIndex + 1), 2, '0', STR_PAD_LEFT)) ?></span>
                        <h3><?= e($item['title']) ?></h3>
                        <?php if (isset($item['body'])): ?>
                            <?php foreach ((array) $item['body'] as $bodyParagraph): ?>
                                <p><?= e($bodyParagraph) ?></p>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if (isset($item['items'])): ?>
                            <ul class="consulting-card__list">
                                <?php foreach ($item['items'] as $detail): ?>
                                    <li><?= e($detail) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <p class="consulting-card__key"><strong><?= e($cardSection['keyLabel'] ?? 'Clave') ?>:</strong> <?= e($item['key']) ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endforeach; ?>

    <section class="vertical-detail-guardrails alma-section" aria-labelledby="guardrails-title">
        <div class="section-heading">
            <p class="eyebrow"><?= e($guardrailsEyebrow) ?></p>
            <h2 id="guardrails-title"><?= e($guardrailsTitle) ?></h2>
            <?php if ($guardrailsIntro !== null): ?>
                <p><?= e($guardrailsIntro) ?></p>
            <?php endif; ?>
        </div>
        <ul>
            <?php foreach ($guardrails as $guardrail): ?>
                <li><?= e($guardrail) ?></li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section class="alma-final-cta" aria-labelledby="vertical-final-cta">
        <div>
            <p class="eyebrow"><?= e($finalCta['eyebrow']) ?></p>
            <h2 id="vertical-final-cta"><?= e($finalCta['title']) ?></h2>
            <p><?= e($finalCta['body']) ?></p>
        </div>
        <a class="button button-primary" href="<?= e($finalCta['href']) ?>"><?= e($finalCta['label']) ?></a>
    </section>
</div>
