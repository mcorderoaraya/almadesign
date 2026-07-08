<?php
declare(strict_types=1);

$faqItems = [
    [
        'question' => '¿Qué es Apogeo Lux?',
        'answer' => 'Apogeo Lux es la visión de AlmaDesign para construir una solución de consulta jurídica confiable sobre normas, leyes chilenas, fuentes verificables, jurisprudencia y relaciones de conocimiento trazables.',
    ],
    [
        'question' => '¿Qué problema resuelve?',
        'answer' => 'Ayuda a organizaciones que trabajan con información jurídica crítica a estudiar normas, fuentes y relaciones con mayor claridad, continuidad, profundidad contextual y trazabilidad.',
    ],
    [
        'question' => '¿Qué aporta una arquitectura GraphRAG?',
        'answer' => 'Una arquitectura GraphRAG permite conectar normas, fuentes, antecedentes, contexto y futuras capas interpretativas para construir consultas con más profundidad, relación entre piezas y evidencia verificable.',
    ],
    [
        'question' => '¿Por qué es valioso integrar jurisprudencia?',
        'answer' => 'La jurisprudencia completa la lectura del derecho porque muestra cómo las normas viven en su interpretación, aplicación y evolución de criterios.',
    ],
    [
        'question' => '¿Qué tipo de organizaciones pueden interesarse?',
        'answer' => 'Estudios jurídicos, fiscalías corporativas, equipos de cumplimiento, instituciones públicas, organizaciones reguladas, universidades y áreas intensivas en documentación normativa.',
    ],
    [
        'question' => '¿Cómo puedo ser de los primeros en contar con esta solución?',
        'answer' => 'Puedes registrar tu interés desde el llamado principal de la página o contactar a AlmaDesign para conversar sobre la aplicación de Apogeo Lux en tu organización.',
    ],
];

$faqJsonLd = [
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => array_map(static fn (array $item): array => [
        '@type' => 'Question',
        'name' => $item['question'],
        'acceptedAnswer' => [
            '@type' => 'Answer',
            'text' => $item['answer'],
        ],
    ], $faqItems),
];
?>
<div class="alma-home apogeo-lux-landing">
    <section class="vertical-detail-hero" aria-labelledby="apogeo-lux-title">
        <p class="eyebrow apogeo-lux-hero__eyebrow">Apogeo Lux</p>
        <div class="apogeo-lux-hero__brand">
            <span class="apogeo-lux-wordmark apogeo-lux-wordmark--dark">
                <span class="apogeo-lux-wordmark__apogeo">Apogeo</span>
                <em class="apogeo-lux-wordmark__lux">Lux</em>
            </span>
        </div>
        <div class="apogeo-lux-hero__separator" aria-hidden="true"></div>
        <h1 id="apogeo-lux-title">Consulta jurídica confiable sobre normas, leyes chilenas y relaciones de conocimiento.</h1>
        <p class="lead">Apogeo Lux es la visión de AlmaDesign para una solución jurídica gobernada capaz de reunir normas, fuentes, trazabilidad, relaciones de contexto y criterio humano en una misma arquitectura de consulta confiable.</p>
        <p class="lead lead--secondary">Nuestra visión es ofrecer una forma más profunda de estudiar leyes chilenas y sus fuentes, conectando información jurídica dispersa mediante una arquitectura GraphRAG pensada para aportar claridad, continuidad, evidencia y confianza.</p>
        <div class="hero-actions" aria-label="Acciones principales">
            <a class="button button-primary" href="#interes-primero">Quiero conocer esta solución</a>
            <a class="button button-secondary" href="#vision-apogeo-lux">Conocer la visión completa</a>
        </div>
    </section>

    <section class="apogeo-lux-editorial-section alma-section" aria-labelledby="apogeo-lux-problema">
        <div class="section-heading">
            <p class="eyebrow">El problema</p>
            <h2 id="apogeo-lux-problema">El derecho exige más que respuestas: exige contexto, fuente y relación.</h2>
        </div>
        <div class="apogeo-lux-editorial-copy">
            <p>Las organizaciones que trabajan con normas y leyes chilenas enfrentan un desafío estructural: la información jurídica no vive aislada. Una ley remite a otra, una interpretación altera su lectura, una fuente exige contexto y el análisis profesional necesita recorrer relaciones que muchas veces están dispersas.</p>
            <p>Cuando la consulta jurídica se reduce a búsqueda lineal o respuesta superficial, se pierde profundidad, continuidad y capacidad de revisión.</p>
            <p>Apogeo Lux nace para responder a ese desafío desde una arquitectura más madura: una arquitectura que no solo recupera fragmentos, sino que articula relaciones, contexto y trazabilidad.</p>
        </div>
    </section>

    <section class="apogeo-lux-technical-application" aria-labelledby="apogeo-lux-technical-application-title">
        <div class="apogeo-lux-technical-application__inner">
            <article class="apogeo-lux-technical-application__card">
                <div class="apogeo-lux-technical-application__heading">
                    <p class="eyebrow">GraphRAG jurídico</p>
                    <h2 id="apogeo-lux-technical-application-title">Aplicación técnica de Apogeo Lux</h2>
                    <p>Generación aumentada por recuperación</p>
                </div>
                <img
                    class="apogeo-lux-technical-application__image"
                    src="<?= e(asset('img/apogeo-lux/diagrama_graphRAG.png')) ?>"
                    alt="Diagrama conceptual de GraphRAG jurídico de Apogeo Lux, desde la consulta hasta el contexto jurídico compuesto"
                    loading="lazy"
                    decoding="async"
                    width="1672"
                    height="941"
                >
            </article>
        </div>
    </section>

    <section class="apogeo-lux-editorial-section alma-section" id="vision-apogeo-lux" aria-labelledby="apogeo-lux-vision-title">
        <div class="section-heading">
            <p class="eyebrow">Nuestra visión</p>
            <h2 id="apogeo-lux-vision-title">
                <span class="apogeo-lux-wordmark apogeo-lux-wordmark--dark">
                    <span class="apogeo-lux-wordmark__apogeo">Apogeo</span>
                    <em class="apogeo-lux-wordmark__lux">Lux</em>
                </span>
                transforma consulta jurídica en arquitectura de conocimiento.
            </h2>
        </div>
        <div class="apogeo-lux-editorial-copy">
            <p>Apogeo Lux está concebido como una solución de consulta jurídica confiable para normas y leyes chilenas, capaz de reunir piezas que hoy suelen estar separadas: fuente normativa, contexto, trazabilidad, relaciones entre documentos, referencias cruzadas y criterio humano.</p>
            <p>Nuestra visión es construir una plataforma donde la consulta no dependa solo de palabras clave o coincidencias textuales, sino de relaciones significativas entre normas, fuentes, antecedentes y futuras capas de interpretación.</p>
            <p>Apogeo Lux no busca reducir el trabajo jurídico: busca elevarlo. Busca entregar una estructura de conocimiento que permita estudiar con más profundidad, recorrer relaciones con mayor claridad y sostener análisis con mejor respaldo.</p>
        </div>
    </section>

    <section class="consulting-section consulting-section--approach" aria-labelledby="apogeo-lux-graphrag">
        <div class="section-heading">
            <p class="eyebrow">Por qué GraphRAG</p>
            <h2 id="apogeo-lux-graphrag">Las ventajas de contar con una arquitectura GraphRAG.</h2>
            <p>GraphRAG permite pensar la consulta jurídica como una red de conocimiento gobernada. En vez de tratar normas, fuentes y antecedentes como elementos aislados, la arquitectura conecta piezas para ofrecer más profundidad, más contexto, más continuidad y más trazabilidad.</p>
        </div>
        <div class="consulting-card-grid">
            <article class="consulting-card">
                <span class="consulting-card__index">01</span>
                <h3>Relación entre fuentes</h3>
                <p>Permite relacionar normas, leyes, fuentes y antecedentes en vez de dejarlos como resultados separados.</p>
                <p class="consulting-card__key"><strong>Valor:</strong> La consulta deja de ser plana y comienza a mostrar estructura.</p>
            </article>
            <article class="consulting-card">
                <span class="consulting-card__index">02</span>
                <h3>Profundidad contextual</h3>
                <p>Aporta contexto alrededor de una pregunta jurídica, conectando documentos, referencias y criterios relevantes.</p>
                <p class="consulting-card__key"><strong>Valor:</strong> Más comprensión antes de decidir qué revisar.</p>
            </article>
            <article class="consulting-card">
                <span class="consulting-card__index">03</span>
                <h3>Trazabilidad verificable</h3>
                <p>Favorece una ruta entre consulta, respuesta y fuente, para que el análisis profesional pueda revisar evidencia.</p>
                <p class="consulting-card__key"><strong>Valor:</strong> Confianza sustentada en fuentes visibles.</p>
            </article>
            <article class="consulting-card">
                <span class="consulting-card__index">04</span>
                <h3>Continuidad del análisis</h3>
                <p>Mejora la continuidad del estudio jurídico al permitir recorrer relaciones, no solo resultados aislados.</p>
                <p class="consulting-card__key"><strong>Valor:</strong> Un análisis que conserva hilo y contexto.</p>
            </article>
            <article class="consulting-card">
                <span class="consulting-card__index">05</span>
                <h3>Navegación de conocimiento</h3>
                <p>Permite navegar estructuras jurídicas conectadas, haciendo visible la relación entre piezas dispersas.</p>
                <p class="consulting-card__key"><strong>Valor:</strong> Inteligencia jurídica como mapa, no solo respuesta.</p>
            </article>
            <article class="consulting-card">
                <span class="consulting-card__index">06</span>
                <h3>Escalabilidad gobernada</h3>
                <p>Sostiene una visión escalable hacia jurisprudencia, criterios administrativos y documentación institucional propia.</p>
                <p class="consulting-card__key"><strong>Valor:</strong> Una arquitectura preparada para crecer con orden.</p>
            </article>
        </div>
    </section>

    <section class="consulting-section consulting-section--deliverables" aria-labelledby="apogeo-lux-piezas">
        <div class="section-heading">
            <p class="eyebrow">Arquitectura de valor</p>
            <h2 id="apogeo-lux-piezas">Una solución pensada para reunir todas las piezas relevantes.</h2>
            <p>La propuesta de Apogeo Lux reúne consulta normativa, trazabilidad, fuentes, relaciones jurídicas, jurisprudencia y revisión humana en una arquitectura de conocimiento diseñada para organizaciones intensivas en información legal y regulatoria.</p>
        </div>
        <div class="apogeo-lux-matrix" aria-label="Piezas de la solución Apogeo Lux">
            <article><span>01</span><strong>Consulta de normas y leyes chilenas.</strong></article>
            <article><span>02</span><strong>Fuentes verificables y trazabilidad de origen.</strong></article>
            <article><span>03</span><strong>Relaciones entre normas, referencias y contexto.</strong></article>
            <article><span>04</span><strong>Estudio jurídico asistido por estructura de conocimiento.</strong></article>
            <article><span>05</span><strong>Citas y sustento de respuesta.</strong></article>
            <article><span>06</span><strong>Jurisprudencia como capa interpretativa esencial.</strong></article>
            <article><span>07</span><strong>Jurisprudencia administrativa y criterios públicos.</strong></article>
            <article><span>08</span><strong>Documentación institucional propia.</strong></article>
            <article><span>09</span><strong>Relación entre normas, doctrina, criterio y evidencia.</strong></article>
            <article><span>10</span><strong>Arquitectura de revisión humana.</strong></article>
            <article><span>11</span><strong>Gobernanza y límites explícitos.</strong></article>
            <article><span>12</span><strong>Escalabilidad hacia organizaciones intensivas en normativa.</strong></article>
        </div>
    </section>

    <section class="vertical-detail-content alma-section" aria-labelledby="apogeo-lux-jurisprudencia">
        <article class="vertical-detail-block apogeo-lux-editorial">
            <p class="eyebrow">Jurisprudencia</p>
            <h2 id="apogeo-lux-jurisprudencia">La jurisprudencia completa la lectura del derecho.</h2>
            <p>Apogeo Lux contempla la jurisprudencia como una capa central de valor, porque una ley no vive solo en su texto: vive también en su interpretación, en su aplicación y en la forma en que distintos criterios van configurando su sentido.</p>
            <p>Nuestra visión es que Apogeo Lux permita estudiar normas y fuentes acompañado por jurisprudencia trazada, relacionada y comprensible, para ofrecer una consulta más rica, más útil y más alineada con la realidad del trabajo jurídico.</p>
        </article>
    </section>

    <section class="consulting-section apogeo-lux-diagrams" aria-labelledby="apogeo-lux-diagrams-title">
        <div class="section-heading">
            <p class="eyebrow">Diagramas conceptuales</p>
            <h2 id="apogeo-lux-diagrams-title">La arquitectura explicada como sistema de conocimiento.</h2>
            <p>Apogeo Lux está pensado como una composición clara entre consulta, fuentes, relaciones, contexto, jurisprudencia y revisión humana. Estos diagramas resumen la lógica de valor sin convertirla en una ficha técnica.</p>
        </div>
        <div class="apogeo-lux-diagram-grid">
            <article class="apogeo-lux-diagram">
                <h3>Cómo se articula Apogeo Lux</h3>
                <ol>
                    <li>Consulta</li>
                    <li>Normas</li>
                    <li>Relaciones</li>
                    <li>Contexto</li>
                    <li>Jurisprudencia</li>
                    <li>Criterio humano</li>
                </ol>
            </article>
            <article class="apogeo-lux-diagram">
                <h3>Qué integra la solución</h3>
                <ol>
                    <li>Normas</li>
                    <li>Leyes chilenas</li>
                    <li>Fuentes</li>
                    <li>Jurisprudencia</li>
                    <li>Trazabilidad</li>
                    <li>Documentación</li>
                    <li>Revisión humana</li>
                </ol>
            </article>
            <article class="apogeo-lux-diagram">
                <h3>Qué valor aporta GraphRAG</h3>
                <ol>
                    <li>Profundidad</li>
                    <li>Relaciones</li>
                    <li>Contexto</li>
                    <li>Continuidad</li>
                    <li>Trazabilidad</li>
                    <li>Confianza</li>
                </ol>
            </article>
        </div>
    </section>

    <section class="consulting-section consulting-section--executive executive-section" aria-labelledby="apogeo-lux-audiencias">
        <div class="section-heading">
            <p class="eyebrow">Para quién es</p>
            <h2 id="apogeo-lux-audiencias">Pensado para organizaciones que trabajan con complejidad jurídica real.</h2>
            <p>Apogeo Lux está pensado para equipos que necesitan estudiar, conectar y revisar información jurídica crítica con claridad, evidencia y continuidad.</p>
        </div>
        <div class="apogeo-lux-audience-grid">
            <span>Estudios jurídicos</span>
            <span>Fiscalías corporativas</span>
            <span>Equipos de cumplimiento</span>
            <span>Instituciones públicas</span>
            <span>Organizaciones reguladas</span>
            <span>Universidades y centros especializados</span>
            <span>Áreas con documentación normativa crítica</span>
        </div>
    </section>

    <section class="vertical-detail-content vertical-detail-content--after alma-section" aria-labelledby="apogeo-lux-compromiso">
        <article class="vertical-detail-block apogeo-lux-editorial">
            <p class="eyebrow">Compromiso</p>
            <h2 id="apogeo-lux-compromiso">Nuestro compromiso es una inteligencia jurídica gobernada.</h2>
            <p>Apogeo Lux expresa una convicción de AlmaDesign: la inteligencia artificial aplicada al derecho debe aumentar claridad, trazabilidad y capacidad de estudio, nunca borrar el criterio humano.</p>
            <p>Nuestro compromiso es diseñar una solución donde las relaciones entre fuentes, la profundidad contextual y la estructura del conocimiento aporten más confianza, no más opacidad.</p>
        </article>
    </section>

    <section class="vertical-detail-guardrails alma-section" aria-labelledby="apogeo-lux-limites">
        <div class="section-heading">
            <p class="eyebrow">Límites explícitos</p>
            <h2 id="apogeo-lux-limites">Límites explícitos de la propuesta.</h2>
            <p>La arquitectura de Apogeo Lux está diseñada para fortalecer la comprensión jurídica, sostener trazabilidad y acompañar revisión profesional con una estructura de conocimiento gobernada.</p>
        </div>
        <blockquote>
            <p><strong>Apogeo Lux fortalece el estudio jurídico; no sustituye el juicio profesional.</strong></p>
            <p>La solución está pensada para apoyar a equipos que necesitan más profundidad, mejor relación entre fuentes y mayor claridad de revisión.</p>
        </blockquote>
        <blockquote>
            <p><strong>La consulta confiable necesita criterio humano, contexto y revisión.</strong></p>
            <p>El valor está en reunir evidencia y relaciones para que las personas responsables puedan interpretar con mejores condiciones.</p>
        </blockquote>
        <blockquote>
            <p><strong>La arquitectura de conocimiento debe servir a la comprensión, no a la automatización ciega.</strong></p>
            <p>Apogeo Lux pone la trazabilidad, el contexto y la gobernanza al centro de la experiencia de consulta.</p>
        </blockquote>
        <blockquote>
            <p><strong>La trazabilidad y la relación entre fuentes son parte del valor esencial de la solución.</strong></p>
            <p>Una consulta jurídica madura necesita explicar de dónde viene la información, cómo se conecta y qué rol cumple dentro del análisis.</p>
        </blockquote>
    </section>

    <section class="consulting-section apogeo-lux-interest" id="interes-primero" aria-labelledby="apogeo-lux-interest-title">
        <div class="section-heading">
            <p class="eyebrow">Captura de interés</p>
            <h2 id="apogeo-lux-interest-title">Quiero ser el primero en contar con esta solución.</h2>
            <p>Si esta visión resuena con tu organización, puedes dejar tus datos para ser de los primeros en conocer Apogeo Lux, su evolución y las próximas instancias de conversación.</p>
        </div>
        <div class="apogeo-lux-interest__panel">
            <p>Sé de los primeros en conocer Apogeo Lux y conversar sobre su aplicación en tu organización.</p>
            <a class="button button-primary" href="/contacto">Quiero anotarme</a>
        </div>
    </section>

    <section class="consulting-section faq" aria-labelledby="apogeo-lux-faq">
        <div class="section-heading">
            <p class="eyebrow">FAQ</p>
            <h2 id="apogeo-lux-faq">Preguntas frecuentes.</h2>
        </div>
        <div class="faq-list">
            <?php foreach ($faqItems as $item): ?>
                <details>
                    <summary><?= e($item['question']) ?></summary>
                    <p><?= e($item['answer']) ?></p>
                </details>
            <?php endforeach; ?>
        </div>
    </section>

</div>

<script type="application/ld+json">
<?= json_encode($faqJsonLd, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>
</script>
