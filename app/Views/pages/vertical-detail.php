<?php
declare(strict_types=1);

/** @var array<int, array{title: string, body?: string, items?: list<string>}> $sections */
/** @var array<int, array{title: string, intro: string, items: list<array{title: string, body: string, key: string}>}>|null $cardSections */
/** @var list<string> $guardrails */
$cardSections = $cardSections ?? [];
?>
<div class="alma-home">
    <section class="vertical-detail-hero" aria-labelledby="vertical-detail-title">
        <p class="eyebrow"><?= e($eyebrow) ?></p>
        <h1 id="vertical-detail-title"><?= e($heading) ?></h1>
        <p class="lead"><?= e($lead) ?></p>
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
                    <p><?= e($section['body']) ?></p>
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
        <section class="consulting-section <?= $cardSectionIndex === 0 ? 'consulting-section--approach' : 'consulting-section--deliverables' ?>" aria-labelledby="consulting-section-<?= e((string) $cardSectionIndex) ?>">
            <div class="section-heading">
                <p class="eyebrow">Consultoría IA y procesos</p>
                <h2 id="consulting-section-<?= e((string) $cardSectionIndex) ?>"><?= e($cardSection['title']) ?></h2>
                <p><?= e($cardSection['intro']) ?></p>
            </div>
            <div class="consulting-card-grid">
                <?php foreach ($cardSection['items'] as $itemIndex => $item): ?>
                    <article class="consulting-card">
                        <span class="consulting-card__index"><?= e(str_pad((string) ($itemIndex + 1), 2, '0', STR_PAD_LEFT)) ?></span>
                        <h3><?= e($item['title']) ?></h3>
                        <p><?= e($item['body']) ?></p>
                        <p class="consulting-card__key"><strong>Clave:</strong> <?= e($item['key']) ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endforeach; ?>

    <section class="vertical-detail-guardrails alma-section" aria-labelledby="guardrails-title">
        <div class="section-heading">
            <p class="eyebrow">Gobernanza</p>
            <h2 id="guardrails-title">Límites explícitos de comunicación.</h2>
        </div>
        <ul>
            <?php foreach ($guardrails as $guardrail): ?>
                <li><?= e($guardrail) ?></li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section class="alma-final-cta" aria-labelledby="vertical-final-cta">
        <div>
            <p class="eyebrow">Conversemos</p>
            <h2 id="vertical-final-cta">Hablemos de tu proyecto.</h2>
            <p>Si tu organización necesita claridad, trazabilidad y criterio humano para adoptar IA, AlmaDesign puede ayudarte a ordenar el camino.</p>
        </div>
        <a class="button button-primary" href="<?= e(url('/contacto')) ?>">Hablemos de tu proyecto</a>
    </section>
</div>
