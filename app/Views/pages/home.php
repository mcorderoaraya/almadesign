<?php
declare(strict_types=1);

use App\Core\Markdown;

/** @var array<int, array<string, mixed>>|null $sections */

$sectionMap = [];
if (isset($sections) && is_array($sections)) {
    foreach ($sections as $section) {
        if (is_array($section) && isset($section['section_key'])) {
            $sectionMap[(string) $section['section_key']] = $section;
        }
    }
}

$sectionValue = static function (string $key, string $field, string $fallback) use ($sectionMap): string {
    $value = trim((string) ($sectionMap[$key][$field] ?? ''));

    return $value !== '' ? $value : $fallback;
};

$sectionMarkdown = static function (string $key, string $fallback) use ($sectionMap): string {
    $markdown = trim((string) ($sectionMap[$key]['body_markdown'] ?? ''));

    return $markdown !== '' ? Markdown::safeBasic($markdown) : '<p>' . e($fallback) . '</p>';
};

$products = [
    [
        'title' => 'Charlas AI for Humans',
        'href' => url('/charlas-ai-for-humans'),
        'variant' => 'talks',
        'summary' => 'Charlas para ampliar capacidades humanas con herramientas basadas en IA: pensar mejor, decidir con más contexto y usar tecnología sin perder criterio.',
        'cta' => 'Detalles de nuestras charlas',
        'label' => 'PRODUCTO DESTACADO',
        'image' => 'img/cards/charlas-ai-for-humans.webp',
        'accessible' => 'Grupo de personas conversando sobre inteligencia artificial, aprendizaje y decisiones humanas en un entorno imaginativo.',
        'audiences' => [
            'Charla para usuarios, empleados o público general.',
            'Charla para grupos de toma de decisión empresarial, especialmente gerentes TI.',
            'Charla para gerencias y equipos directivos.',
        ],
    ],
    [
        'title' => 'Gestión Documental',
        'href' => url('/gestion-documental'),
        'variant' => 'apogeo',
        'summary' => 'Ordenamos documentos, conversaciones y antecedentes para que encontrar contexto deje de ser una búsqueda agotadora.',
        'cta' => 'Conocer Gestión Documental',
        'label' => 'CONOCIMIENTO QUE SE PUEDE REVISAR',
        'image' => 'img/cards/gestion-documental.webp',
        'accessible' => 'Equipo revisando documentos conectados como una red de conocimiento para ordenar información crítica.',
    ],
    [
        'title' => 'Orquestación con Asistentes IA',
        'href' => url('/orquestacion-asistentes-ia'),
        'variant' => 'automation',
        'summary' => 'Desarrollamos asistentes, automatizaciones y aplicaciones a medida para resolver fricciones empresariales y conectar procesos con criterio operativo.',
        'cta' => 'Diseñar una solución',
        'label' => 'AUTOMATIZACIÓN Y DESARROLLO A MEDIDA',
        'image' => 'img/cards/orquestacion-asistentes-ia.webp',
        'accessible' => 'Orquestación con Asistentes IA. Automatización de procesos, solución de fricciones empresariales y desarrollo de aplicaciones a medida.',
    ],
    [
        'title' => 'Software Factory',
        'href' => url('/software-factory'),
        'variant' => 'factory',
        'summary' => 'Construimos sistemas a medida para organizaciones que necesitan aplicaciones robustas, integraciones confiables y datos bien gobernados.',
        'cta' => 'Construir un sistema',
        'label' => 'DESARROLLO DE SISTEMAS A MEDIDA',
        'image' => 'img/cards/software-factory.webp',
        'accessible' => 'Software Factory. Desarrollo de sistemas a medida con Python, Java Enterprise, Next.js, SQLite, MySQL, PostgreSQL, Oracle, conectores API REST y WebServices.',
        'featuresLabel' => 'Tecnologías y capacidades de Software Factory',
        'features' => [
            'Python, Java Enterprise y Next.js',
            'SQLite, MySQL, PostgreSQL y Oracle',
            'Web, móvil, APIs e integraciones',
            'Conectores API REST y WebServices',
        ],
    ],
];

$designPatternSteps = [
    'Brief del cliente',
    'Análisis funcional',
    'Arquitectura',
    'Selección tecnológica',
    'Patrones del lenguaje',
    'Documentación técnica',
    'Desarrollo asistido por IA',
    'Revisión de coherencia',
    'QA interno',
    'Feedback cliente',
    'Ajustes',
    'QA externo',
    'Entrega defendible',
];

$trustPillars = [
    ['title' => 'Calma', 'detail' => 'Avanzar sin alimentar miedo ni confusión.'],
    ['title' => 'Claridad', 'detail' => 'Explicar antes de automatizar.'],
    ['title' => 'Control humano', 'detail' => 'Las decisiones importantes mantienen responsable humano.'],
    ['title' => 'Confianza', 'detail' => 'Evidencia, límites y lenguaje entendible.'],
];
?>
<?php if (($contentSource ?? '') === 'postgresql'): ?>
    <!-- content-source:postgresql -->
<?php endif; ?>
<div class="alma-home alma-content-page">
    <section class="home-third home-third--hero alma-content-hero" aria-labelledby="home-title">
        <div class="home-third__inner">
            <div class="alma-hero__top" aria-label="Contexto AlmaDesign">
                <p class="eyebrow"><?= e($sectionValue('hero', 'eyebrow', 'Charlas · conocimiento aumentado · decisiones humanas')) ?></p>
                <p class="meta">PERSONAS · EQUIPOS · GERENCIAS</p>
            </div>

            <div class="alma-hero">
                <figure class="alma-hero__lamp">
                    <picture>
                        <source media="(max-width: 980px)" srcset="<?= e(asset('img/hero/lampara-de-pie-mobile.webp')) ?>">
                        <img src="<?= e(asset('img/hero/lampara-de-pie.webp')) ?>" alt="Lámpara cálida rodeada de peces, símbolo de ideas que se iluminan y circulan con libertad." width="499" height="1405">
                    </picture>
                </figure>
                <div class="alma-hero__content">
                    <div class="alma-hero__chapter">
                        <span>Alma Design</span>
                        <small>Primero las personas. Después la automatización.</small>
                    </div>
                    <h1 id="home-title" class="o-heading"><?= e($sectionValue('hero', 'title', 'Potencia tus ideas y expande tus horizontes con inteligencia artificial.')) ?></h1>
                    <div class="lead"><?= $sectionMarkdown('hero', 'AlmaDesign diseña, ordena y gobierna sistemas de información, procesos e inteligencia aplicada para que las organizaciones decidan con más claridad, trazabilidad y criterio humano.') ?></div>
                    <div class="hero-actions" aria-label="Acciones principales">
                        <a class="button button-primary" href="<?= e(url('/contacto')) ?>">Diseñemos juntos</a>
                        <a class="button button-secondary" href="#productos">Ver productos</a>
                        <a class="button button-primary" href="<?= e(url('/politica-almadesign')) ?>">Políticas de AlmaDesign</a>
                    </div>
                </div>
                <aside class="alma-hero__signal" aria-label="Síntesis AlmaDesign">
                    <dl class="alma-hero__signal-list">
                        <div>
                            <dt>Qué hacemos</dt>
                            <dd>Expandimos al ser humano.
Usamos inteligencia artificial para abrir nuevas formas de pensar, decidir, crear y descubrir, conectando a las personas con el conocimiento vivo del mundo que las rodea.</dd>
                        </div>
                        <div>
                            <dt>Enfoque</dt>
                            <dd>En medio de la nueva revolución del conocimiento, diseñamos herramientas que transforman información dispersa en claridad, contexto y posibilidad. La IA acompaña; el ser humano interpreta, decide y da sentido.</dd>
                        </div>
                        <div>
                            <dt>Principio</dt>
                            <dd>Toda inteligencia artificial debe estar al servicio de la vida humana: protegerla, potenciarla y respetar su integridad mental, física y ética.</dd>
                        </div>
                    </dl>
                </aside>
            </div>

            <div class="alma-hero__footstrip" aria-label="Productos AlmaDesign">
                <span>Charlas AI for Humans</span>
                <span>Gestión Documental</span>
                <span>Orquestación IA</span>
                <span>Asistente Personal 24/7</span>
                <span>Software Factory</span>
            </div>
        </div>
    </section>

    <section class="home-third home-third--verticals alma-content-section" aria-label="Productos AlmaDesign">
        <div class="alma-purpose alma-purpose--window" aria-labelledby="purpose-title">
            <div class="alma-purpose__copy">
                <div class="section-heading">
                    <p class="eyebrow"><?= e($sectionValue('productos', 'eyebrow', 'Propósito')) ?></p>
                    <h2 id="purpose-title" class="o-heading"><?= e($sectionValue('productos', 'title', 'Productos para ampliar capacidades humanas, ordenar conocimiento y decidir con más claridad.')) ?></h2>
                </div>
                <div class="alma-purpose__text">
                    <?= $sectionMarkdown('productos', 'Muchas personas y organizaciones sienten que deben adoptar IA rápido, aunque todavía no tengan claro cómo usarla para pensar mejor, decidir mejor o trabajar con menos ruido. AlmaDesign trabaja justo ahí: creando experiencias y productos que acercan la IA al criterio humano, al contexto y a decisiones que se puedan explicar.') ?>
                </div>
            </div>
        </div>
        <div class="home-third__inner">
            <div class="verticals-section products-section">
                <section class="alma-assistant-feature" id="productos" aria-labelledby="assistant-feature-title">
                    <div class="alma-assistant-feature__intro">
                        <p class="eyebrow"><?= e($sectionValue('asistente-247', 'eyebrow', 'Asistente Personal 24/7')) ?></p>
                        <h3 id="assistant-feature-title"><?= e($sectionValue('asistente-247', 'title', 'Asistencia personal')) ?></h3>
                        <?= $sectionMarkdown('asistente-247', 'Un asistente personal gestionado por AlmaDesign para ordenar tu agenda, tareas, reuniones, ideas y comunicaciones diarias. Desde app web, móvil e interacción voz a voz, te ayuda a preparar reuniones, gestionar calendario, redactar correos, registrar acuerdos y dar seguimiento continuo a lo importante.') ?>
                        <a class="alma-assistant-feature__cta" href="<?= e(url('/contacto?producto=asistente-247')) ?>">Quiero saber más de Asistente 24/7</a>
                    </div>
                    <div class="alma-assistant-feature__support">
                        <p>AlmaDesign no solo entrega la herramienta: la mantiene, ajusta y evoluciona contigo.</p>
                        <ul aria-label="Capacidades del asistente personal">
                            <li>App web y móvil</li>
                            <li>Interacción voz a voz</li>
                            <li>Calendario, recordatorios y agenda</li>
                            <li>Preparación y seguimiento de reuniones</li>
                            <li>Redacción y envío asistido de emails</li>
                            <li>Bitácoras y flujos personalizados</li>
                        </ul>
                    </div>
                </section>
                <div class="alma-product-card-grid">
                    <?php foreach ($products as $productIndex => $product): ?>
                        <article class="alma-product-card alma-product-card--<?= e($product['variant']) ?>">
                            <a class="alma-product-card__media" href="<?= e($product['href']) ?>" aria-label="<?= e($product['title'] . ': ' . $product['cta']) ?>">
                                <img
                                    class="alma-product-card__image"
                                    src="<?= e(asset($product['image'])) ?>"
                                    alt="<?= e($product['accessible']) ?>"
                                    loading="eager"
                                    decoding="async"
                                    width="1254"
                                    height="1254"
                                >
                            </a>
                            <div class="alma-product-card__content">
                                <p class="alma-product-card__label"><?= e($product['label']) ?></p>
                                <h3><?= e($product['title']) ?></h3>
                                <p><?= e($product['summary']) ?></p>
                                <?php if (isset($product['audiences'])): ?>
                                    <ul class="alma-product-card__audiences" aria-label="Tipos de charlas">
                                        <?php foreach ($product['audiences'] as $audience): ?>
                                            <li><?= e($audience) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                                <?php if (isset($product['features'])): ?>
                                    <ul class="alma-product-card__features" aria-label="<?= e($product['featuresLabel']) ?>">
                                        <?php foreach ($product['features'] as $feature): ?>
                                            <li><?= e($feature) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                                <a class="alma-product-card__cta" href="<?= e($product['href']) ?>"><?= e($product['cta']) ?></a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="home-third home-third--human alma-content-section" aria-labelledby="trust-title">
        <div class="home-third__inner">
            <section class="method-section" aria-labelledby="method-title">
                <div class="section-heading">
                    <p class="eyebrow">Código defendible asistido por IA</p>
                    <h2 id="method-title" class="o-heading">Patrón de diseño</h2>
                </div>
                <div class="method-system">
                    <div class="method-sky" aria-hidden="true">
                        <span class="method-cloud method-cloud--one"></span>
                        <span class="method-cloud method-cloud--two"></span>
                        <span class="method-fish method-fish--one"></span>
                        <span class="method-fish method-fish--two"></span>
                        <span class="method-fish method-fish--three"></span>
                    </div>
                    <svg class="method-system__trace" viewBox="0 0 1000 260" preserveAspectRatio="none" aria-hidden="true">
                        <path d="M35 128 C140 42 214 214 318 128 S496 42 602 128 S780 214 965 128" />
                    </svg>
                    <ol class="method-list method-list--flow" aria-label="Patrón de diseño AlmaDesign">
                        <?php foreach ($designPatternSteps as $index => $methodStep): ?>
                            <li>
                                <span class="method-list__node" aria-hidden="true"></span>
                                <span class="method-list__step"><?= e(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)) ?></span>
                                <strong><?= e($methodStep) ?></strong>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                    <div class="method-summary" aria-label="Principios del patrón de diseño">
                        <p>Todo sistema debe nacer desde el brief, pasar por arquitectura, respetar los patrones del lenguaje, mantener código limpio, recibir feedback del cliente y superar QA interno y externo.</p>
                        <p>La IA no reemplaza el oficio. Lo amplifica cuando existe arquitectura, criterio y responsabilidad humana.</p>
                    </div>
                </div>
            </section>

            <section class="trust-section" aria-labelledby="trust-title">
                <div class="trust-section__intro">
                    <p class="eyebrow"><?= e($sectionValue('pilares', 'eyebrow', 'AI for Humans')) ?></p>
                    <h2 id="trust-title" class="o-heading"><?= e($sectionValue('pilares', 'title', 'IA que acompaña, no que intimida.')) ?></h2>
                    <blockquote>¿Esta tecnología ayuda a las personas a trabajar con más claridad y menos miedo?</blockquote>
                    <?= $sectionMarkdown('pilares', 'Si la respuesta es no, hay que detenerse. La eficiencia importa, pero no debe justificar pérdida de criterio, presión permanente, vigilancia invisible o decisiones que nadie puede explicar.') ?>
                </div>
                <div class="trust-system">
                    <svg class="trust-system__map" viewBox="0 0 420 420" aria-hidden="true">
                        <path d="M94 98 H210 V210 H326" />
                        <path d="M94 322 H210 V210 H326" />
                        <circle cx="94" cy="98" r="6" />
                        <circle cx="326" cy="98" r="6" />
                        <circle cx="94" cy="322" r="6" />
                        <circle cx="326" cy="322" r="6" />
                        <circle cx="210" cy="210" r="8" />
                    </svg>
                    <ul class="trust-pillar-grid" aria-label="Pilares de confianza">
                        <?php foreach ($trustPillars as $index => $pillar): ?>
                            <li>
                                <span class="trust-pillar-grid__index"><?= e(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)) ?></span>
                                <span class="trust-pillar-grid__mark" aria-hidden="true"></span>
                                <strong><?= e($pillar['title']) ?></strong>
                                <span><?= e($pillar['detail']) ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </section>

        </div>
    </section>
</div>
