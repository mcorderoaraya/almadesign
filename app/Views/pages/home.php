<?php
declare(strict_types=1);

$verticals = [
    [
        'title' => 'Consultoría IA y procesos',
        'href' => url('/contacto'),
        'variant' => 'consulting',
        'summary' => 'Ordenamos fricciones internas, procesos y criterios para implementar IA con claridad, control y adopción responsable.',
        'cta' => 'Solicitar diagnóstico',
        'keywords' => 'CONSULTORÍA IA EMPRESAS',
    ],
    [
        'title' => 'Apogeo',
        'href' => url('/apogeo'),
        'variant' => 'apogeo',
        'summary' => 'Sistemas de conocimiento aumentado para recuperar contexto, sostener trazabilidad y trabajar con documentación verificable entre partes.',
        'cta' => 'Conocer Apogeo',
        'keywords' => 'RECUPERACIÓN CONTEXTUAL',
    ],
    [
        'title' => 'AI for Humans',
        'href' => url('/ai-for-humans'),
        'variant' => 'humans',
        'summary' => 'IA gobernada para proteger, potenciar y no reemplazar al humano en sus decisiones, procesos y capacidades.',
        'cta' => 'Explorar AI for Humans',
        'keywords' => 'DECISIONES HUMANAS COMPLEJAS',
    ],
];

$methodSteps = [
    ['step' => 'Diagnosticar', 'text' => 'Identificar fricciones internas, responsabilidades, documentos y decisiones críticas.'],
    ['step' => 'Ordenar', 'text' => 'Separar ruido, fuentes, criterios y prioridades para convertir confusión en claridad operativa.'],
    ['step' => 'Diseñar', 'text' => 'Transformar objetivos en flujos, interfaces, reglas y sistemas comprensibles.'],
    ['step' => 'Gobernar', 'text' => 'Definir límites, trazabilidad, supervisión humana y criterios de uso.'],
    ['step' => 'Acompañar', 'text' => 'Apoyar adopción, aprendizaje y mejora continua con dirección humana.'],
];
?>
<div class="alma-home">
    <section class="home-third home-third--hero" aria-labelledby="home-title">
        <div class="home-third__inner alma-hero">
            <div class="alma-hero__content">
                <p class="eyebrow">Inteligencia artificial gobernada</p>
                <h1 id="home-title">Arquitectura de conocimiento e inteligencia artificial gobernada para decisiones humanas complejas.</h1>
                <p class="lead">AlmaDesign diseña, ordena y gobierna sistemas de información, procesos e inteligencia aplicada para que las organizaciones decidan con más claridad, trazabilidad y criterio humano.</p>
                <p class="hero-text">No vendemos IA como moda. Diseñamos tecnología útil para reducir fricción, ordenar conocimiento y proteger el control humano sobre decisiones críticas.</p>
                <div class="hero-actions" aria-label="Acciones principales">
                    <a class="button button-primary" href="<?= e(url('/contacto')) ?>">Solicitar diagnóstico</a>
                    <a class="button button-secondary" href="#verticales">Explorar verticales</a>
                </div>
            </div>
            <aside class="alma-hero__signal" aria-label="Principios AlmaDesign">
                <img src="<?= e(asset('img/logo_horizontal_naranja.svg')) ?>" alt="AlmaDesign" width="258" height="118">
                <dl>
                    <div>
                        <dt>Claridad</dt>
                        <dd>Información comprensible para equipos humanos.</dd>
                    </div>
                    <div>
                        <dt>Trazabilidad</dt>
                        <dd>Criterios, fuentes y decisiones con ruta verificable.</dd>
                    </div>
                    <div>
                        <dt>Gobernanza</dt>
                        <dd>IA con límites explícitos, supervisión y responsabilidad.</dd>
                    </div>
                </dl>
            </aside>
        </div>
        <a class="scroll-down" href="#verticales" aria-label="Ir a verticales de AlmaDesign">
            <span class="scroll-down__label">Deslizar</span>
            <span class="scroll-down__line" aria-hidden="true"></span>
            <span class="scroll-down__arrow" aria-hidden="true"></span>
        </a>
    </section>

    <section class="home-third home-third--verticals" id="verticales" aria-labelledby="verticales-title">
        <div class="home-third__inner">
            <div class="alma-purpose" aria-labelledby="purpose-title">
                <div class="section-heading">
                    <p class="eyebrow">Propósito</p>
                    <h2 id="purpose-title">Tecnología al servicio de la comprensión humana.</h2>
                </div>
                <div class="alma-purpose__text">
                    <p>AlmaDesign nace desde una convicción simple: el problema no es la falta de información, sino la dificultad de comprenderla, ordenarla y convertirla en decisiones útiles.</p>
                    <p>Por eso diseñamos arquitecturas de conocimiento: sistemas capaces de conectar datos, documentos, procesos, criterios y personas bajo una estructura clara, gobernada y trazable.</p>
                </div>
            </div>
            <div class="verticals-section">
                <div class="section-heading">
                    <p class="eyebrow">Verticales</p>
                    <h2 id="verticales-title">Tres caminos para convertir complejidad en claridad.</h2>
                    <p>AlmaDesign trabaja en tres verticales conectadas por un mismo principio: ordenar procesos, conectar conocimiento y aplicar IA gobernada para apoyar decisiones humanas complejas.</p>
                </div>
                <div class="vertical-card-grid">
                    <?php foreach ($verticals as $vertical): ?>
                        <article class="vertical-card vertical-card--<?= e($vertical['variant']) ?>">
                            <div class="vertical-card__shell">
                                <div class="vertical-card__header">
                                    <span class="vertical-card__keyword"><?= e($vertical['keywords']) ?></span>
                                    <h3><?= e($vertical['title']) ?></h3>
                                    <p class="vertical-card__summary"><?= e($vertical['summary']) ?></p>
                                    <span class="vertical-card__separator" aria-hidden="true"></span>
                                </div>
                                <div class="vertical-card__visual" aria-hidden="true">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <div class="vertical-card__footer">
                                    <a class="vertical-card__cta" href="<?= e($vertical['href']) ?>" aria-label="<?= e($vertical['title'] . ': ' . $vertical['cta']) ?>"><?= e($vertical['cta']) ?></a>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="home-third home-third--human" aria-labelledby="trust-title">
        <div class="home-third__inner">
            <section class="method-section" aria-labelledby="method-title">
                <div class="section-heading">
                    <p class="eyebrow">Método AlmaDesign</p>
                    <h2 id="method-title">De la fricción al sistema gobernado.</h2>
                </div>
                <ol class="method-list" aria-label="Método AlmaDesign">
                    <?php foreach ($methodSteps as $methodStep): ?>
                        <li>
                            <strong><?= e($methodStep['step']) ?></strong>
                            <span><?= e($methodStep['text']) ?></span>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </section>

            <section class="trust-section" aria-labelledby="trust-title">
                <div class="trust-section__intro">
                    <p class="eyebrow">AI for Humans</p>
                    <h2 id="trust-title">IA gobernada, no automatización sin límites.</h2>
                    <blockquote>¿Esta tecnología mejora la capacidad humana de comprender, decidir y crear?</blockquote>
                    <p>Si la respuesta es no, no se construye. La eficiencia importa, pero nunca debe justificar deshumanización, pérdida de criterio, invasión de privacidad o automatización opaca.</p>
                </div>
                <div class="trust-pillar-grid" aria-label="Pilares de confianza">
                    <span>Claridad</span>
                    <span>Trazabilidad</span>
                    <span>Seguridad</span>
                    <span>Criterio humano</span>
                </div>
            </section>

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
</div>
