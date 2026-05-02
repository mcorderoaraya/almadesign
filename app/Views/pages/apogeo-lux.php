<?php
declare(strict_types=1);

$faqItems = [
    [
        'question' => '¿Qué es Apogeo Lux?',
        'answer' => 'Apogeo Lux es un producto de AlmaDesign en etapa MVP que demuestra GraphRAG jurídico local sobre normas públicas BCN / LeyChile, con respuestas extractivas, citas y source_ref verificable.',
    ],
    [
        'question' => '¿Apogeo Lux entrega asesoría legal?',
        'answer' => 'No entrega asesoría legal. Es una demo técnica gobernada para trazabilidad, auditoría y evaluación del enfoque.',
    ],
    [
        'question' => '¿Apogeo Lux usa LLM?',
        'answer' => 'No usa LLM generativo en esta demo. La demostración se concentra en recuperación, trazabilidad y respuestas extractivas citadas.',
    ],
    [
        'question' => '¿Qué fuentes usa Apogeo Lux?',
        'answer' => 'Usa normas públicas BCN / LeyChile procesadas en un pipeline local controlado.',
    ],
    [
        'question' => '¿Qué es source_ref?',
        'answer' => 'source_ref es una referencia verificable que conecta la respuesta con el fragmento, nodo textual y ancla jurídica usados como fuente.',
    ],
    [
        'question' => '¿Qué es GraphRAG jurídico?',
        'answer' => 'Es un enfoque que combina recuperación sobre grafos y referencias normativas para construir respuestas verificables desde fuentes jurídicas controladas.',
    ],
    [
        'question' => '¿Apogeo Lux ya está en producción?',
        'answer' => 'No es producción. El estado actual es MVP local funcional para demo.',
    ],
    [
        'question' => '¿Apogeo Lux integra jurisprudencia?',
        'answer' => 'No integra jurisprudencia en esta demo. El alcance actual está concentrado en normas públicas BCN / LeyChile.',
    ],
    [
        'question' => '¿Qué diferencia a Apogeo Lux de un chatbot legal?',
        'answer' => 'Apogeo Lux prioriza ruta verificable, citas, source_ref, separación entre ancla jurídica y nodo textual, y límites explícitos de gobernanza.',
    ],
    [
        'question' => '¿Qué rol cumple AlmaDesign?',
        'answer' => 'AlmaDesign diseña y gobierna el producto, el enfoque técnico y la presentación comercial responsable de Apogeo Lux.',
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
<section class="lux-hero" id="inicio">
    <div class="lux-hero__content">
        <p class="eyebrow">Producto de AlmaDesign.</p>
        <p class="brand-kicker">AI for humans</p>
        <h1>Apogeo Lux</h1>
        <p class="lead">IA jurídica gobernada, trazable y auditable sobre normas públicas BCN.</p>
        <p class="hero-text">MVP GraphRAG local funcional para demo, con respuestas extractivas citadas, <code>source_ref</code> verificable y límites explícitos de gobernanza.</p>
        <div class="hero-actions" aria-label="Acciones principales">
            <a class="button button-primary" href="#cta-final">Solicitar demo</a>
            <a class="button button-secondary" href="#enfoque-tec">Ver enfoque técnico</a>
        </div>
        <p class="notice">No es producción ni asesoría legal.</p>
    </div>
    <aside class="hero-facts" aria-label="Resumen gobernado">
        <dl>
            <div>
                <dt>Estado</dt>
                <dd>MVP local funcional para demo</dd>
            </div>
            <div>
                <dt>Fuente</dt>
                <dd>Normas públicas BCN / LeyChile</dd>
            </div>
            <div>
                <dt>Modo</dt>
                <dd>Respuesta extractiva con citas</dd>
            </div>
            <div>
                <dt>Gobernanza</dt>
                <dd><code>ready_for_production_anchor=false</code></dd>
            </div>
        </dl>
    </aside>
</section>

<section class="section-grid" id="problema">
    <div class="section-heading">
        <p class="eyebrow">Problema</p>
        <h2>La IA jurídica no puede depender de respuestas plausibles sin fuente.</h2>
    </div>
    <div class="cards-grid cards-grid--three">
        <article class="info-card">
            <h3>Respuestas sin trazabilidad</h3>
            <p>Una respuesta puede sonar correcta y aun así no dejar una ruta verificable hacia la norma usada.</p>
        </article>
        <article class="info-card">
            <h3>Mezcla entre inferencia y fuente</h3>
            <p>Sin separación explícita, el usuario no puede distinguir texto normativo, interpretación y ensamblaje técnico.</p>
        </article>
        <article class="info-card">
            <h3>Baja auditabilidad</h3>
            <p>Sin campos técnicos, nodos y referencias, una demo jurídica no puede ser revisada con rigor.</p>
        </article>
    </div>
</section>

<section class="section-split" id="solucion">
    <div class="section-heading">
        <p class="eyebrow">Solución</p>
        <h2>Ruta verificable desde norma pública hasta respuesta citada.</h2>
    </div>
    <div class="rail-list">
        <div><span>01</span><p>Fuente pública controlada.</p></div>
        <div><span>02</span><p>Normalización gobernada.</p></div>
        <div><span>03</span><p>Anchors jurídicos.</p></div>
        <div><span>04</span><p>Grafo local.</p></div>
        <div><span>05</span><p>Respuesta extractiva.</p></div>
    </div>
</section>

<section class="section-grid" id="enfoque-tec">
    <div class="section-heading">
        <p class="eyebrow">Cómo funciona</p>
        <h2>Pipeline trazable desde BCN hasta GraphRAG local.</h2>
    </div>
    <ol class="flow-list" aria-label="Flujo técnico Apogeo Lux">
        <li>Discovery BCN <code>opt=31</code>.</li>
        <li>Selección <code>idAgrupador</code>.</li>
        <li><code>opt=36</code>.</li>
        <li>Extracción <code>idNorma</code>.</li>
        <li><code>opt=7</code>.</li>
        <li>XML raw.</li>
        <li>JSON fiel.</li>
        <li>JSON canónico.</li>
        <li>Parte normativa.</li>
        <li>Parte versión.</li>
        <li>Chunks.</li>
        <li>Retrieval.</li>
        <li>Neo4j local.</li>
        <li>GraphRAG.</li>
        <li>Respuesta con citas y <code>source_ref</code>.</li>
    </ol>
</section>

<section class="section-grid" id="demo-multinorma">
    <div class="section-heading">
        <p class="eyebrow">Demo multinorma</p>
        <h2>Lote preparado para mostrar cobertura técnica controlada.</h2>
    </div>
    <div class="demo-board">
        <article class="demo-group">
            <h3>DEMO_READY</h3>
            <ul class="code-list">
                <li><code>idNorma</code> 6430</li>
                <li><code>idNorma</code> 140084</li>
                <li><code>idNorma</code> 30844</li>
                <li><code>idNorma</code> 206396</li>
            </ul>
        </article>
        <article class="demo-group demo-group--edge">
            <h3>EDGE_CASE</h3>
            <ul class="code-list">
                <li><code>idNorma</code> 28940</li>
            </ul>
            <p>28940 es caso de gobernanza, no éxito principal.</p>
        </article>
    </div>
</section>

<section class="section-split" id="trazabilidad">
    <div class="section-heading">
        <p class="eyebrow">Trazabilidad</p>
        <h2>Campos visibles para auditoría técnica.</h2>
    </div>
    <div class="trace-grid">
        <code>idNorma</code>
        <code>idParte_used</code>
        <code>anchor_classification</code>
        <code>anchor_quality</code>
        <code>chunk_id</code>
        <code>source_ref</code>
        <code>source_anchor_node_ref</code>
        <code>source_text_node_ref</code>
        <code>tech_retrieval</code>
        <code>tech_graph_context</code>
    </div>
</section>

<section class="section-grid governance" id="gobernanza">
    <div class="section-heading">
        <p class="eyebrow">Gobernanza</p>
        <h2>Alcance explícito de lo demostrado y lo no demostrado.</h2>
    </div>
    <div class="governance-grid">
        <article class="scope-card scope-card--yes">
            <h3>Qué sí demuestra</h3>
            <ul>
                <li>MVP GraphRAG local funcional para demo.</li>
                <li>Normas públicas BCN.</li>
                <li>Neo4j local.</li>
                <li>Respuestas extractivas con citas.</li>
                <li><code>source_ref</code> validado.</li>
                <li>Separación entre anchor jurídico y nodo textual.</li>
                <li>Clasificación de textos no anclables.</li>
                <li>Trazabilidad y auditoría técnica.</li>
            </ul>
        </article>
        <article class="scope-card scope-card--no">
            <h3>Qué no demuestra</h3>
            <ul>
                <li>No es producción.</li>
                <li>No entrega asesoría legal.</li>
                <li>No reemplaza abogados.</li>
                <li>No usa LLM generativo en esta demo.</li>
                <li>No integra jurisprudencia.</li>
                <li>No es GraphRAG enterprise.</li>
                <li>No es SaaS listo.</li>
                <li>No declara <code>ready_for_production_anchor=true</code>.</li>
                <li>No afirma cobertura jurídica total.</li>
            </ul>
        </article>
    </div>
</section>

<section class="section-grid" id="audiencias">
    <div class="section-heading">
        <p class="eyebrow">Para quién es</p>
        <h2>Equipos que necesitan evaluar IA jurídica con evidencia.</h2>
    </div>
    <div class="audience-grid">
        <span>Estudios jurídicos</span>
        <span>Legaltech</span>
        <span>Equipos de cumplimiento</span>
        <span>Instituciones públicas</span>
        <span>Inversionistas</span>
        <span>Socios tecnológicos</span>
    </div>
</section>

<section class="section-split" id="estado-actual">
    <div class="section-heading">
        <p class="eyebrow">Estado actual</p>
        <h2>MVP local funcional para demo ejecutiva.</h2>
    </div>
    <ul class="status-list">
        <li>MVP local funcional para demo.</li>
        <li>Pipeline GraphRAG por <code>idNorma</code> generalizado.</li>
        <li>Lote demo multinorma validado.</li>
        <li>Demo ejecutiva preparada.</li>
        <li>Guía de demo en vivo preparada.</li>
        <li>Neo4j local usado como MVP.</li>
        <li>Mantiene <code>ready_for_production_anchor=false</code>.</li>
    </ul>
</section>

<section class="section-grid faq" id="faq">
    <div class="section-heading">
        <p class="eyebrow">FAQ</p>
        <h2>Preguntas frecuentes.</h2>
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

<section class="final-cta" id="cta-final">
    <div>
        <p class="eyebrow">Conversemos sobre Apogeo Lux.</p>
        <h2>Demo gobernada para revisar trazabilidad, citas y límites técnicos.</h2>
        <p>Producto en etapa MVP. No es asesoría legal ni sistema en producción.</p>
    </div>
    <div class="hero-actions">
        <a class="button button-primary" href="mailto:contacto@almadesign.cl?subject=Solicitud%20demo%20Apogeo%20Lux">Solicitar demo</a>
        <a class="button button-secondary" href="mailto:contacto@almadesign.cl?subject=Contacto%20AlmaDesign">Contactar a AlmaDesign</a>
    </div>
</section>

<script type="application/ld+json">
<?= json_encode($faqJsonLd, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>
</script>
