<?php
declare(strict_types=1);

$talks = [
    [
        'number' => '01',
        'title' => 'Charlas para personas comunes',
        'subtitle' => 'Entender la IA como expansión humana',
        'body' => 'Para personas no técnicas que quieren comprender qué es la IA, cómo usarla en la vida diaria y por qué puede ampliar creatividad, aprendizaje, trabajo y organización personal sin reemplazar el criterio humano.',
    ],
    [
        'number' => '02',
        'title' => 'Charlas para equipos de trabajo y áreas IT',
        'subtitle' => 'Adoptar IA con criterio, procesos y gobernanza',
        'body' => 'Para equipos que necesitan pasar del entusiasmo inicial a una adopción ordenada: detectar procesos candidatos, diseñar pilotos responsables, cuidar datos, trazabilidad, permisos y límites antes de automatizar.',
    ],
    [
        'number' => '03',
        'title' => 'Charlas para gerencias y directivos',
        'subtitle' => 'IA como decisión estratégica, no como moda tecnológica',
        'body' => 'Para líderes que necesitan decidir qué capacidades humanas, comerciales y operativas quieren ampliar con IA, bajo qué límites, con qué responsabilidad y con qué hoja de ruta realista.',
    ],
];

$peopleTalkParagraphs = [
    'Esta charla está pensada para personas que escuchan hablar de inteligencia artificial todos los días, pero todavía sienten que es un mundo lejano, complejo o amenazante.',
    'El objetivo es explicar qué es la IA de forma clara, cercana y humana: qué puede hacer, qué no puede hacer, cómo se usa en la vida cotidiana y por qué puede convertirse en una herramienta de expansión personal, creativa y laboral.',
    'Durante años, muchas personas dejaron de crear, aprender o emprender no por falta de talento, sino por falta de medios, tiempo, herramientas o acompañamiento. La inteligencia artificial cambia esa frontera. Puede ayudar a escribir, diseñar, investigar, organizar, estudiar, vender, comunicar y producir con recursos que antes estaban reservados para pocos.',
    'Pero esa potencia debe tener dirección humana. Por eso esta charla también aborda los riesgos: dependencia excesiva, desinformación, pérdida de criterio, uso irresponsable de datos, ansiedad productiva y reemplazo mal entendido.',
    'La propuesta no es "usar IA para hacerlo todo más rápido". La propuesta es aprender a usar IA para pensar mejor, crear mejor y trabajar con más sentido.',
];

$peopleTalkTopics = [
    'Qué es realmente la inteligencia artificial.',
    'Qué puede hacer y qué no puede hacer.',
    'Cómo usar IA en la vida diaria sin miedo.',
    'IA para creatividad, estudio, trabajo y organización personal.',
    'Cómo hacer buenas preguntas a una IA.',
    'Riesgos básicos: errores, sesgos, privacidad y dependencia.',
    'Por qué el criterio humano sigue siendo central.',
    'IA como herramienta de expansión, no como reemplazo.',
];

$teamTalkParagraphs = [
    'Esta charla está orientada a equipos que ya trabajan con tecnología, operaciones, datos, soporte, desarrollo, marketing, administración o procesos internos, y necesitan pasar del entusiasmo inicial a una adopción más ordenada.',
    'La IA puede automatizar tareas, ordenar información, apoyar decisiones y acelerar procesos. Pero si se incorpora sin diagnóstico, puede producir más ruido que valor: herramientas dispersas, datos mal usados, automatizaciones sin control, dependencia de prompts improvisados y decisiones sin trazabilidad.',
    'En AlmaDesign proponemos una adopción responsable: primero comprender el proceso, luego definir límites, después automatizar.',
    'Esta charla muestra cómo identificar oportunidades reales de IA dentro de una organización: documentos, atención, reportes, búsqueda de información, generación de contenido, flujos repetitivos, conocimiento interno y asistentes empresariales.',
    'También introduce conceptos como RAG, GraphRAG, agentes, evaluación, permisos, trazabilidad y privacidad por diseño, pero explicados desde el valor práctico para el equipo, no desde la moda técnica.',
];

$teamTalkTopics = [
    'Cómo detectar procesos candidatos a IA.',
    'Diferencia entre chatbot, asistente, automatización y agente.',
    'Uso de IA en documentos, reportes, soporte y operaciones.',
    'RAG y GraphRAG explicados de forma práctica.',
    'Riesgos de automatizar sin gobernanza.',
    'Privacidad, datos sensibles y trazabilidad.',
    'Cómo diseñar pilotos pequeños con impacto real.',
    'Criterios para evaluar si una solución de IA funciona.',
];

$executiveTalkParagraphs = [
    'Esta charla está pensada para gerencias, dueños de empresa, directivos y líderes que necesitan entender qué significa adoptar inteligencia artificial desde una perspectiva estratégica.',
    'La pregunta central no es "qué herramienta de IA usamos". La pregunta correcta es: qué capacidades humanas, comerciales y operativas queremos ampliar con IA, bajo qué límites y con qué responsabilidad.',
    'La inteligencia artificial puede mejorar productividad, análisis, comunicación, ventas, atención, documentación y toma de decisiones. Pero también puede introducir riesgos importantes: exposición de datos, decisiones opacas, dependencia tecnológica, automatización mal diseñada, pérdida de criterio interno y falsa sensación de control.',
    'Por eso AlmaDesign plantea la IA desde una mirada de gobernanza humana: la organización debe saber qué automatiza, qué no automatiza, qué datos usa, quién decide, quién valida y qué consecuencias acepta.',
];

$executiveTalkTopics = [
    'Qué significa adoptar IA a nivel estratégico.',
    'Oportunidades reales para empresas y organizaciones.',
    'Productividad versus criterio humano.',
    'Riesgos legales, operativos, reputacionales y de datos.',
    'Privacidad por diseño y tratamiento responsable de información.',
    'Alineamiento con buenas prácticas internacionales y Ley chilena N° 21.719.',
    'Cómo priorizar casos de uso de alto impacto.',
    'Cómo pasar de experimentos aislados a una hoja de ruta de IA.',
    'Gobernanza antes de automatización.',
];
?>
<main class="talks-page" aria-labelledby="talks-title">
    <section class="home-third home-third--verticals talks-hero talks-hero--background">
        <div class="home-third__inner talks-hero__inner">
            <div class="talks-hero__copy">
                <p class="eyebrow">Charlas AI for Humans</p>
                <h1 id="talks-title" class="o-heading">
                    <span>Charlas AlmaDesign</span>
                    <span>Inteligencia artificial para personas, equipos y organizaciones</span>
                </h1>
                <div class="talks-hero__intro">
                    <p class="lead">La inteligencia artificial ya no es solo un tema técnico. Es una transformación cultural, creativa, laboral y estratégica.</p>
                    <p>En AlmaDesign realizamos charlas para ayudar a personas, equipos y organizaciones a comprender la IA sin miedo, sin humo y sin tecnicismos innecesarios. Nuestro enfoque nace del manifiesto AI for Humans: la tecnología tiene sentido cuando amplía la capacidad humana de crear, comprender, decidir y trabajar con mayor dignidad.</p>
                    <p>No hablamos de IA como reemplazo del ser humano. Hablamos de IA como herramienta para devolver capacidad, abrir posibilidades y construir una relación más consciente entre personas, trabajo y tecnología.</p>
                </div>
                <div class="hero-actions">
                    <a class="button button-primary" href="<?= e(url('/contacto')) ?>">Solicitar una charla</a>
                    <a class="button button-secondary" href="<?= e(url('/ai-for-humans')) ?>">Leer manifiesto</a>
                </div>
            </div>
        </div>
    </section>

    <section class="home-third home-third--verticals talks-products" aria-labelledby="talks-products-title">
        <div class="home-third__inner">
            <div class="verticals-section talks-products__inner">
                <div class="talks-products__heading">
                    <p class="eyebrow">Productos</p>
                    <h2 id="talks-products-title">Tres formas de abrir la conversación.</h2>
                </div>

                <div class="talks-product-grid">
                    <?php foreach ($talks as $talk): ?>
                        <article class="talks-product-card">
                            <span class="talks-product-card__number"><?= e($talk['number']) ?></span>
                            <h3><?= e($talk['title']) ?></h3>
                            <p class="talks-product-card__subtitle"><?= e($talk['subtitle']) ?></p>
                            <p><?= e($talk['body']) ?></p>
                            <a class="talks-product-card__cta" href="<?= e(url('/contacto')) ?>">Solicitar</a>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="talks-detail" id="charlas-para-personas" aria-labelledby="talks-people-title">
        <div class="talks-detail__inner">
            <div class="talks-detail__intro">
                <p class="eyebrow">Charla 01</p>
                <h2 id="talks-people-title">Charlas para personas comunes</h2>
                <p>Entender la IA como expansión humana</p>
            </div>

            <div class="talks-detail__content">
                <div class="talks-detail__body">
                    <?php foreach ($peopleTalkParagraphs as $paragraph): ?>
                        <p><?= e($paragraph) ?></p>
                    <?php endforeach; ?>

                    <blockquote>
                        <p>La IA bien utilizada no reemplaza lo que somos. Nos entrega nuevos instrumentos para expresar, crear, aprender, ordenar ideas y ampliar nuestras posibilidades.</p>
                    </blockquote>
                </div>

                <aside class="talks-detail__aside" aria-label="Detalle de la charla para personas comunes">
                    <div>
                        <h3>Temas principales</h3>
                        <ul>
                            <?php foreach ($peopleTalkTopics as $topic): ?>
                                <li><?= e($topic) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div>
                        <h3>Dirigida a</h3>
                        <p>Personas no técnicas, estudiantes, trabajadores, profesionales independientes, adultos que quieren actualizarse, creadores, emprendedores y cualquier persona que quiera entender la IA desde una mirada humana.</p>
                    </div>

                    <div>
                        <h3>Resultado esperado</h3>
                        <p>Que cada asistente salga entendiendo qué es la IA, cómo puede usarla de forma práctica y por qué su valor personal no disminuye frente a la tecnología: se puede ampliar si aprende a gobernarla.</p>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <section class="talks-detail" id="charlas-para-equipos-it" aria-labelledby="talks-team-title">
        <div class="talks-detail__inner">
            <div class="talks-detail__intro">
                <p class="eyebrow">Charla 02</p>
                <h2 id="talks-team-title">Charlas para equipos de trabajo y áreas IT</h2>
                <p>Adoptar IA con criterio, procesos y gobernanza</p>
            </div>

            <div class="talks-detail__content">
                <div class="talks-detail__body">
                    <?php foreach ($teamTalkParagraphs as $paragraph): ?>
                        <p><?= e($paragraph) ?></p>
                    <?php endforeach; ?>

                    <blockquote>
                        <p>Antes de automatizar, hay que comprender. Antes de escalar, hay que gobernar.</p>
                    </blockquote>
                </div>

                <aside class="talks-detail__aside" aria-label="Detalle de la charla para equipos de trabajo y áreas IT">
                    <div>
                        <h3>Temas principales</h3>
                        <ul>
                            <?php foreach ($teamTalkTopics as $topic): ?>
                                <li><?= e($topic) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div>
                        <h3>Dirigida a</h3>
                        <p>Equipos de IT, operaciones, administración, soporte, marketing, comunicaciones, desarrollo, innovación y transformación digital.</p>
                    </div>

                    <div>
                        <h3>Resultado esperado</h3>
                        <p>Que el equipo pueda distinguir entre uso superficial de IA y adopción útil, segura y medible, identificando casos concretos para comenzar con pilotos responsables.</p>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <section class="talks-detail" id="charlas-para-gerencias" aria-labelledby="talks-executive-title">
        <div class="talks-detail__inner">
            <div class="talks-detail__intro">
                <p class="eyebrow">Charla 03</p>
                <h2 id="talks-executive-title">Charlas para gerencias y directivos</h2>
                <p>IA como decisión estratégica, no como moda tecnológica</p>
            </div>

            <div class="talks-detail__content">
                <div class="talks-detail__body">
                    <?php foreach ($executiveTalkParagraphs as $paragraph): ?>
                        <p><?= e($paragraph) ?></p>
                    <?php endforeach; ?>

                    <blockquote>
                        <p>La IA no reemplaza la dirección. La exige con más claridad.</p>
                    </blockquote>
                </div>

                <aside class="talks-detail__aside" aria-label="Detalle de la charla para gerencias y directivos">
                    <div>
                        <h3>Temas principales</h3>
                        <ul>
                            <?php foreach ($executiveTalkTopics as $topic): ?>
                                <li><?= e($topic) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div>
                        <h3>Dirigida a</h3>
                        <p>Gerencias generales, directorios, dueños de empresa, líderes de área, equipos ejecutivos, instituciones y organizaciones que necesitan tomar decisiones informadas sobre IA.</p>
                    </div>

                    <div>
                        <h3>Resultado esperado</h3>
                        <p>Que la dirección pueda entender la IA como una decisión estratégica y no como una compra de herramientas, definiendo prioridades, límites y primeros pasos realistas.</p>
                    </div>
                </aside>
            </div>
        </div>
    </section>
</main>
