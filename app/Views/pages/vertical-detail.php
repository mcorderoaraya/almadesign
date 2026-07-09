<?php
declare(strict_types=1);

/** @var array<int, array{title: string, body?: string|list<string>, items?: list<string>, quote?: string, table?: array{headers: list<string>, rows: list<list<string>>}, anchor?: string}> $sections */
/** @var array<int, array{title: string, body?: string|list<string>, items?: list<string>, quote?: string, table?: array{headers: list<string>, rows: list<list<string>>}, anchor?: string}>|null $postSections */
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
$featureBlock = $featureBlock ?? null;
$ragGraphSection = $ragGraphSection ?? null;
$insightBlock = $insightBlock ?? null;
$pageClass = $pageClass ?? '';
$leadParagraphs = $leadParagraphs ?? [$lead];
$heroAnchor = $heroAnchor ?? null;
$ctaHref = $ctaHref ?? url('/contacto');
$signatureAnchor = $signatureAnchor ?? null;
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
                    <?php foreach ($leadParagraphs as $leadIndex => $leadParagraph): ?>
                        <p class="lead<?= $leadIndex > 0 ? ' lead--secondary' : '' ?>"><?= e($leadParagraph) ?></p>
                    <?php endforeach; ?>
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

    <?php else: ?>
    <section class="vertical-detail-hero"<?= $heroAnchor !== null ? ' id="' . e($heroAnchor) . '"' : '' ?> aria-labelledby="vertical-detail-title">
        <p class="eyebrow"><?= e($eyebrow) ?></p>
        <h1 id="vertical-detail-title"><?= e($heading) ?></h1>
        <?php foreach ($leadParagraphs as $leadIndex => $leadParagraph): ?>
            <p class="lead<?= $leadIndex > 0 ? ' lead--secondary' : '' ?>"><?= e($leadParagraph) ?></p>
        <?php endforeach; ?>
        <div class="hero-actions" aria-label="Acciones principales">
            <a class="button button-primary" href="<?= e($ctaHref) ?>"><?= e($cta) ?></a>
            <a class="button button-secondary" href="<?= e(url('/')) ?>">Volver al Home</a>
        </div>
    </section>

    <?php if ($featureBlock !== null): ?>
        <section class="vertical-detail-content alma-section document-management-feature-section" aria-label="<?= e($featureBlock['ariaLabel'] ?? 'Bloque destacado') ?>">
            <div class="alma-assistant-feature document-management-feature">
                <article class="alma-assistant-feature__intro"<?= isset($featureBlock['left']['anchor']) ? ' id="' . e($featureBlock['left']['anchor']) . '"' : '' ?>>
                    <?php if (isset($featureBlock['left']['eyebrow'])): ?>
                        <p class="eyebrow"><?= e($featureBlock['left']['eyebrow']) ?></p>
                    <?php endif; ?>
                    <h2><?= e($featureBlock['left']['title']) ?></h2>
                    <?php foreach ((array) $featureBlock['left']['body'] as $bodyParagraph): ?>
                        <p><?= e($bodyParagraph) ?></p>
                    <?php endforeach; ?>
                </article>
                <article class="alma-assistant-feature__support"<?= isset($featureBlock['right']['anchor']) ? ' id="' . e($featureBlock['right']['anchor']) . '"' : '' ?>>
                    <?php if (isset($featureBlock['right']['eyebrow'])): ?>
                        <p class="eyebrow"><?= e($featureBlock['right']['eyebrow']) ?></p>
                    <?php endif; ?>
                    <h2><?= e($featureBlock['right']['title']) ?></h2>
                    <?php foreach ((array) $featureBlock['right']['body'] as $bodyParagraph): ?>
                        <p><?= e($bodyParagraph) ?></p>
                    <?php endforeach; ?>
                </article>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($ragGraphSection !== null): ?>
        <section class="document-rag-section alma-section"<?= isset($ragGraphSection['anchor']) ? ' id="' . e($ragGraphSection['anchor']) . '"' : '' ?> aria-labelledby="document-rag-title">
            <div class="document-rag-section__inner">
                <header class="document-rag-section__header">
                    <?php if (isset($ragGraphSection['eyebrow'])): ?>
                        <p class="eyebrow"><?= e($ragGraphSection['eyebrow']) ?></p>
                    <?php endif; ?>
                    <h2 id="document-rag-title"><?= e($ragGraphSection['title']) ?></h2>
                    <?php if (isset($ragGraphSection['body'])): ?>
                        <p><?= e($ragGraphSection['body']) ?></p>
                    <?php endif; ?>
                </header>

                <div class="document-rag-comparison" aria-label="<?= e($ragGraphSection['comparisonLabel'] ?? 'Comparación operativa') ?>">
                    <?php foreach ($ragGraphSection['columns'] as $column): ?>
                        <article class="document-rag-panel"<?= isset($column['anchor']) ? ' id="' . e($column['anchor']) . '"' : '' ?>>
                            <p class="document-rag-panel__label"><?= e($column['label']) ?></p>
                            <h3><?= e($column['title']) ?></h3>
                            <p><?= e($column['body']) ?></p>
                            <?php if (isset($column['items'])): ?>
                                <ul>
                                    <?php foreach ($column['items'] as $item): ?>
                                        <li><?= e($item) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>

                <?php if (isset($ragGraphSection['decisionRows'])): ?>
                    <div class="document-rag-decision" role="region" aria-label="<?= e($ragGraphSection['decisionLabel'] ?? 'Criterios operativos') ?>" tabindex="0">
                        <table>
                            <tbody>
                                <?php foreach ($ragGraphSection['decisionRows'] as $row): ?>
                                    <tr>
                                        <th scope="row"><?= e($row[0]) ?></th>
                                        <td><?= e($row[1]) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>

                <?php if (isset($ragGraphSection['flow'])): ?>
                    <ol class="document-rag-flow" aria-label="<?= e($ragGraphSection['flowLabel'] ?? 'Flujo operativo') ?>">
                        <?php foreach ($ragGraphSection['flow'] as $step): ?>
                            <li><?= e($step) ?></li>
                        <?php endforeach; ?>
                    </ol>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($sections !== []): ?>
        <section class="vertical-detail-content alma-section" aria-label="Contenido principal">
            <?php foreach ($sections as $section): ?>
                <?php
                $sectionClass = 'vertical-detail-block';
                if (isset($section['class']) && is_string($section['class'])) {
                    $sectionClass .= ' ' . $section['class'];
                }
                ?>
                <article class="<?= e($sectionClass) ?>"<?= isset($section['anchor']) ? ' id="' . e($section['anchor']) . '"' : '' ?>>
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
                    <?php if (isset($section['quote'])): ?>
                        <blockquote class="vertical-detail-quote">
                            <p><?= e($section['quote']) ?></p>
                        </blockquote>
                    <?php endif; ?>
                    <?php if (isset($section['table'])): ?>
                        <div class="vertical-detail-table-wrap" role="region" aria-label="<?= e($section['title']) ?>" tabindex="0">
                            <table class="vertical-detail-table">
                                <thead>
                                    <tr>
                                        <?php foreach ($section['table']['headers'] as $header): ?>
                                            <th scope="col"><?= e($header) ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($section['table']['rows'] as $row): ?>
                                        <tr>
                                            <?php foreach ($row as $cellIndex => $cell): ?>
                                                <?php if ($cellIndex === 0): ?>
                                                    <th scope="row"><?= e($cell) ?></th>
                                                <?php else: ?>
                                                    <td><?= e($cell) ?></td>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </section>
    <?php endif; ?>

    <?php if ($insightBlock !== null): ?>
        <section class="vertical-detail-content alma-section document-management-feature-section" aria-label="<?= e($insightBlock['ariaLabel'] ?? 'Síntesis y gobernanza') ?>">
            <div class="alma-assistant-feature document-management-feature document-management-feature--insight">
                <article class="alma-assistant-feature__intro"<?= isset($insightBlock['left']['anchor']) ? ' id="' . e($insightBlock['left']['anchor']) . '"' : '' ?>>
                    <?php if (isset($insightBlock['left']['eyebrow'])): ?>
                        <p class="eyebrow"><?= e($insightBlock['left']['eyebrow']) ?></p>
                    <?php endif; ?>
                    <h2><?= e($insightBlock['left']['title']) ?></h2>
                    <?php foreach ((array) $insightBlock['left']['body'] as $bodyParagraph): ?>
                        <p><?= e($bodyParagraph) ?></p>
                    <?php endforeach; ?>
                </article>
                <article class="alma-assistant-feature__support"<?= isset($insightBlock['right']['anchor']) ? ' id="' . e($insightBlock['right']['anchor']) . '"' : '' ?>>
                    <?php if (isset($insightBlock['right']['eyebrow'])): ?>
                        <p class="eyebrow"><?= e($insightBlock['right']['eyebrow']) ?></p>
                    <?php endif; ?>
                    <h2><?= e($insightBlock['right']['title']) ?></h2>
                    <?php foreach ((array) $insightBlock['right']['body'] as $bodyParagraph): ?>
                        <p><?= e($bodyParagraph) ?></p>
                    <?php endforeach; ?>
                </article>
            </div>
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
                    <?php if (isset($section['quote'])): ?>
                        <blockquote class="vertical-detail-quote">
                            <p><?= e($section['quote']) ?></p>
                        </blockquote>
                    <?php endif; ?>
                    <?php if (isset($section['table'])): ?>
                        <div class="vertical-detail-table-wrap" role="region" aria-label="<?= e($section['title']) ?>" tabindex="0">
                            <table class="vertical-detail-table">
                                <thead>
                                    <tr>
                                        <?php foreach ($section['table']['headers'] as $header): ?>
                                            <th scope="col"><?= e($header) ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($section['table']['rows'] as $row): ?>
                                        <tr>
                                            <?php foreach ($row as $cellIndex => $cell): ?>
                                                <?php if ($cellIndex === 0): ?>
                                                    <th scope="row"><?= e($cell) ?></th>
                                                <?php else: ?>
                                                    <td><?= e($cell) ?></td>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
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
    <?php elseif ($guardrails !== [] || $guardrailsIntro !== null): ?>
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

    <?php endif; ?>
</div>
