<?php
declare(strict_types=1);

/** @var array<int, array{title: string, body?: string|list<string>, items?: list<string>, anchor?: string}> $sections */
/** @var array<int, array{title: string, body?: string|list<string>, items?: list<string>, anchor?: string}>|null $postSections */
/** @var array<int, array{title: string, intro: string, items: list<array{title: string, body?: string|list<string>, items?: list<string>, key: string, anchor?: string}>, eyebrow?: string, keyLabel?: string, variant?: string, anchor?: string}>|null $cardSections */
/** @var list<string|array{title: string, body: string}> $guardrails */
/** @var array<int, array{title: string, body: list<string>, subtitle?: string, quote?: string, anchor?: string}>|null $manifestSections */
/** @var array{eyebrow: string, title: string, body: string, file: string}|null $audioCard */
$cardSections = $cardSections ?? [];
$postSections = $postSections ?? [];
$architectureSection = $architectureSection ?? null;
$infographicSection = $infographicSection ?? null;
$limitsSection = $limitsSection ?? null;
$manifestSections = $manifestSections ?? [];
$audioCard = $audioCard ?? null;
$pageClass = $pageClass ?? '';
$leadParagraphs = $leadParagraphs ?? [$lead];
$heroAnchor = $heroAnchor ?? null;
$signatureAnchor = $signatureAnchor ?? null;
$finalCtaAnchor = $finalCtaAnchor ?? null;
$guardrailsEyebrow = $guardrailsEyebrow ?? 'Gobernanza';
$guardrailsTitle = $guardrailsTitle ?? 'Límites explícitos de comunicación.';
$guardrailsIntro = $guardrailsIntro ?? null;
$guardrailsAnchor = $guardrailsAnchor ?? null;
$guardrailsSecondaryAnchors = $guardrailsSecondaryAnchors ?? [];
$hasStructuredGuardrails = $guardrails !== [] && is_array($guardrails[0] ?? null);
$pageClassAttribute = $pageClass !== '' ? ' ' . $pageClass : '';
?>
<div class="alma-home<?= e($pageClassAttribute) ?>">
    <?php if ($manifestSections !== []): ?>
        <section class="manifest-hero"<?= $heroAnchor !== null ? ' id="' . e($heroAnchor) . '"' : '' ?> aria-labelledby="manifest-title">
            <div class="manifest-hero__grid">
                <div class="manifest-hero__copy">
                    <p class="eyebrow"><?= e($eyebrow) ?></p>
                    <h1 id="manifest-title"><?= e($heading) ?></h1>
                    <p class="lead"><?= e($lead) ?></p>
                </div>
                <?php if ($audioCard !== null): ?>
                    <aside class="manifest-audio-card" aria-labelledby="manifest-audio-title">
                        <p class="manifest-audio-card__eyebrow"><?= e($audioCard['eyebrow']) ?></p>
                        <h2 id="manifest-audio-title"><?= e($audioCard['title']) ?></h2>
                        <p><?= e($audioCard['body']) ?></p>
                        <audio controls preload="metadata" src="<?= e(asset($audioCard['file'])) ?>">
                            Tu navegador no soporta audio HTML5.
                        </audio>
                    </aside>
                <?php endif; ?>
            </div>
        </section>

        <section class="manifest-body" aria-label="Manifiesto AI for Humans">
            <?php foreach ($manifestSections as $manifestIndex => $manifestSection): ?>
                <article class="manifest-section"<?= isset($manifestSection['anchor']) ? ' id="' . e($manifestSection['anchor']) . '"' : '' ?>>
                    <p class="manifest-section__number"><em><?= e(str_pad((string) ($manifestIndex + 1), 2, '0', STR_PAD_LEFT)) ?></em></p>
                    <div class="manifest-section__content">
                        <?php if (isset($manifestSection['subtitle'])): ?>
                            <p class="manifest-section__subtitle"><?= e($manifestSection['subtitle']) ?></p>
                        <?php endif; ?>
                        <h2><?= e($manifestSection['title']) ?></h2>
                        <?php foreach ($manifestSection['body'] as $paragraph): ?>
                            <p><?= e($paragraph) ?></p>
                        <?php endforeach; ?>
                        <?php if (isset($manifestSection['quote'])): ?>
                            <blockquote>
                                <p><?= e($manifestSection['quote']) ?></p>
                            </blockquote>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>

        <section class="ai-for-humans-signature alma-section"<?= $signatureAnchor !== null ? ' id="' . e($signatureAnchor) . '"' : '' ?> aria-labelledby="ai-for-humans-signature-title">
            <div class="ai-for-humans-signature__inner">
                <figure class="ai-for-humans-signature__media">
                    <img src="<?= e(asset('img/mauricio.webp')) ?>" alt="Mauricio Cordero Araya" loading="lazy" decoding="async" width="320" height="400">
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

        <section class="home-third home-third--human"<?= $finalCtaAnchor !== null ? ' id="' . e($finalCtaAnchor) . '"' : '' ?> aria-label="Conversemos">
            <div class="home-third__inner">
                <section class="alma-final-cta" aria-labelledby="final-cta-title">
                    <div>
                        <p class="eyebrow">Conversemos</p>
                        <h2 id="final-cta-title">Hablemos de tu proyecto.</h2>
                        <p>Si tu organización enfrenta información dispersa, procesos difíciles de explicar o decisiones que requieren mayor claridad, AlmaDesign puede ayudarte a diseñar una solución gobernada, trazable y sostenible.</p>
                    </div>
                    <a class="button button-primary" href="<?= e(url('/contacto')) ?>">Hablemos de tu proyecto</a>
                </section>
            </div>
        </section>
    <?php else: ?>
    <section class="vertical-detail-hero"<?= $heroAnchor !== null ? ' id="' . e($heroAnchor) . '"' : '' ?> aria-labelledby="vertical-detail-title">
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

    <?php if ($sections !== []): ?>
        <section class="vertical-detail-content alma-section" aria-label="Contenido principal">
            <?php foreach ($sections as $section): ?>
                <article class="vertical-detail-block"<?= isset($section['anchor']) ? ' id="' . e($section['anchor']) . '"' : '' ?>>
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
    <?php endif; ?>

    <?php if ($architectureSection !== null): ?>
        <section class="apogeo-architectures-section"<?= isset($architectureSection['anchor']) ? ' id="' . e($architectureSection['anchor']) . '"' : '' ?> aria-labelledby="apogeo-architectures-title">
            <div class="apogeo-architectures-inner">
                <header class="apogeo-architectures-header">
                    <p class="eyebrow"><?= e($architectureSection['eyebrow']) ?></p>
                    <h2 id="apogeo-architectures-title"><?= e($architectureSection['title']) ?></h2>
                    <p><?= e($architectureSection['body']) ?></p>
                </header>

                <div class="apogeo-architecture-grid">
                    <?php foreach ($architectureSection['cards'] as $card): ?>
                        <article class="apogeo-architecture-card"<?= isset($card['anchor']) ? ' id="' . e($card['anchor']) . '"' : '' ?>>
                            <a class="apogeo-architecture-card__link" href="#apogeo-architectures-title" aria-label="<?= e($card['title'] . ': ' . $card['body']) ?>">
                                <img
                                    class="apogeo-architecture-card__image"
                                    src="<?= e(asset($card['image'])) ?>"
                                    alt="<?= e($card['alt']) ?>"
                                    loading="lazy"
                                    width="1122"
                                    height="1402"
                                >
                                <span class="sr-only"><?= e($card['title'] . '. ' . $card['body'] . ' ' . $card['micro']) ?></span>
                            </a>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php foreach ($cardSections as $cardSectionIndex => $cardSection): ?>
        <?php
            $cardSectionVariant = $cardSection['variant'] ?? ($cardSectionIndex === 0 ? 'approach' : 'deliverables');
            $cardSectionId = 'card-section-' . $cardSectionIndex;
        ?>
        <section class="consulting-section consulting-section--<?= e($cardSectionVariant) ?><?= $cardSectionVariant === 'executive' ? ' executive-section' : '' ?>"<?= isset($cardSection['anchor']) ? ' id="' . e($cardSection['anchor']) . '"' : '' ?> aria-labelledby="<?= e($cardSectionId) ?>">
            <div class="section-heading">
                <p class="eyebrow"><?= e($cardSection['eyebrow'] ?? $eyebrow) ?></p>
                <h2 id="<?= e($cardSectionId) ?>"><?= e($cardSection['title']) ?></h2>
                <p><?= e($cardSection['intro']) ?></p>
            </div>
            <div class="consulting-card-grid">
                <?php foreach ($cardSection['items'] as $itemIndex => $item): ?>
                    <article class="consulting-card<?= $cardSectionVariant === 'executive' ? ' executive-card' : '' ?>"<?= isset($item['anchor']) ? ' id="' . e($item['anchor']) . '"' : '' ?>>
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

    <?php if ($infographicSection !== null): ?>
        <section class="apogeo-infographic-section"<?= isset($infographicSection['anchor']) ? ' id="' . e($infographicSection['anchor']) . '"' : '' ?> aria-labelledby="apogeo-infographic-title">
            <div class="section-heading">
                <p class="eyebrow"><?= e($infographicSection['eyebrow']) ?></p>
                <h2 id="apogeo-infographic-title"><?= e($infographicSection['title']) ?></h2>
                <p><?= e($infographicSection['body']) ?></p>
            </div>
            <figure class="apogeo-infographic-card">
                <img
                    src="<?= e(asset($infographicSection['image'])) ?>"
                    alt="<?= e($infographicSection['alt']) ?>"
                    loading="lazy"
                    width="1672"
                    height="941"
                >
                <figcaption><?= e($infographicSection['caption']) ?></figcaption>
                <?php if (isset($infographicSection['concept'])): ?>
                    <div class="apogeo-infographic-concept"<?= isset($infographicSection['concept']['anchor']) ? ' id="' . e($infographicSection['concept']['anchor']) . '"' : '' ?>>
                        <h3><?= e($infographicSection['concept']['title']) ?></h3>
                        <?php foreach ($infographicSection['concept']['body'] as $paragraph): ?>
                            <p><?= e($paragraph) ?></p>
                        <?php endforeach; ?>
                        <ul>
                            <?php foreach ($infographicSection['concept']['items'] as $item): ?>
                                <li><?= e($item) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </figure>
        </section>
    <?php endif; ?>

    <?php if ($postSections !== []): ?>
        <section class="vertical-detail-content vertical-detail-content--after alma-section" aria-label="Contenido complementario">
            <?php foreach ($postSections as $section): ?>
                <article class="vertical-detail-block"<?= isset($section['anchor']) ? ' id="' . e($section['anchor']) . '"' : '' ?>>
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
    <?php endif; ?>

    <?php if ($limitsSection !== null): ?>
        <section class="apogeo-limits-section"<?= isset($limitsSection['anchor']) ? ' id="' . e($limitsSection['anchor']) . '"' : '' ?> aria-labelledby="apogeo-limits-title">
            <div class="apogeo-limits-grid">
                <header class="apogeo-limits-header">
                    <p class="eyebrow"><?= e($limitsSection['eyebrow']) ?></p>
                    <h2 id="apogeo-limits-title"><?= e($limitsSection['title']) ?></h2>
                    <p><?= e($limitsSection['lead']) ?></p>
                </header>

                <div class="apogeo-limits-body">
                    <?php foreach ($limitsSection['body'] as $paragraph): ?>
                        <p><?= e($paragraph) ?></p>
                    <?php endforeach; ?>

                    <div class="apogeo-limits-list">
                        <?php foreach ($limitsSection['items'] as $item): ?>
                            <section class="apogeo-limits-item">
                                <h3><?= e($item['title']) ?></h3>
                                <p><?= e($item['body']) ?></p>
                            </section>
                        <?php endforeach; ?>
                    </div>

                    <p class="apogeo-limits-closing"><?= e($limitsSection['closing']) ?></p>
                </div>
            </div>
        </section>
    <?php else: ?>
        <section class="vertical-detail-guardrails alma-section"<?= $guardrailsAnchor !== null ? ' id="' . e($guardrailsAnchor) . '"' : '' ?> aria-labelledby="guardrails-title">
            <?php foreach ($guardrailsSecondaryAnchors as $secondaryAnchor): ?>
                <span id="<?= e($secondaryAnchor) ?>" class="anchor-target" aria-hidden="true"></span>
            <?php endforeach; ?>
            <div class="section-heading">
                <p class="eyebrow"><?= e($guardrailsEyebrow) ?></p>
                <h2 id="guardrails-title"><?= e($guardrailsTitle) ?></h2>
                <?php if ($guardrailsIntro !== null): ?>
                    <p><?= e($guardrailsIntro) ?></p>
                <?php endif; ?>
            </div>
            <?php if ($hasStructuredGuardrails): ?>
                <?php foreach ($guardrails as $guardrail): ?>
                    <blockquote>
                        <p><strong><?= e($guardrail['title']) ?></strong></p>
                        <p><?= e($guardrail['body']) ?></p>
                    </blockquote>
                <?php endforeach; ?>
            <?php else: ?>
                <ul>
                    <?php foreach ($guardrails as $guardrail): ?>
                        <li><?= e($guardrail) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </section>
    <?php endif; ?>

    <section class="home-third home-third--human"<?= $finalCtaAnchor !== null ? ' id="' . e($finalCtaAnchor) . '"' : '' ?> aria-label="Conversemos">
        <div class="home-third__inner">
            <section class="alma-final-cta" aria-labelledby="final-cta-title">
                <div>
                    <p class="eyebrow">Conversemos</p>
                    <h2 id="final-cta-title">Hablemos de tu proyecto.</h2>
                    <p>Si tu organización enfrenta información dispersa, procesos difíciles de explicar o decisiones que requieren mayor claridad, AlmaDesign puede ayudarte a diseñar una solución gobernada, trazable y sostenible.</p>
                </div>
                <a class="button button-primary" href="<?= e(url('/contacto')) ?>">Hablemos de tu proyecto</a>
            </section>
        </div>
    </section>
    <?php endif; ?>
</div>
