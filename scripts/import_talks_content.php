<?php
declare(strict_types=1);

/*
 * Archivo: import_talks_content.php
 * Path: scripts/import_talks_content.php
 * Ambiente: local|produccion
 * Fecha de creacion: 2026-07-13
 * Explicacion tecnica: importa la página Charlas AI for Humans hacia PostgreSQL para validar contenido comercial renderizado desde base de datos.
 */

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/app/Core/Env.php';
require BASE_PATH . '/app/Services/Database.php';

App\Core\Env::load(BASE_PATH . '/.env');
$config = require BASE_PATH . '/config/app.php';
$pdo = App\Services\Database::pdo($config);

$page = [
    'slug' => 'charlas-ai-for-humans',
    'title' => 'Charlas AlmaDesign | Inteligencia artificial para personas y equipos',
    'meta_description' => 'Charlas AlmaDesign sobre inteligencia artificial para personas, equipos y organizaciones: comprender la IA sin miedo, sin humo y sin tecnicismos innecesarios.',
];

$sections = [
    [
        'key' => 'hero',
        'order' => 10,
        'eyebrow' => 'Charlas AI for Humans',
        'title' => 'Charlas AlmaDesign: Inteligencia artificial para personas, equipos y organizaciones',
        'markdown' => implode("\n\n", [
            'La inteligencia artificial ya no es solo un tema técnico. Es una transformación cultural, creativa, laboral y estratégica.',
            'En AlmaDesign realizamos charlas para ayudar a personas, equipos y organizaciones a comprender la IA sin miedo, sin humo y sin tecnicismos innecesarios. Nuestro enfoque nace del manifiesto AI for Humans: la tecnología tiene sentido cuando amplía la capacidad humana de crear, comprender, decidir y trabajar con mayor dignidad.',
            'No hablamos de IA como reemplazo del ser humano. Hablamos de IA como herramienta para devolver capacidad, abrir posibilidades y construir una relación más consciente entre personas, trabajo y tecnología.',
        ]),
        'extra' => ['type' => 'hero'],
    ],
    [
        'key' => 'producto-charlahumanos',
        'order' => 20,
        'eyebrow' => 'Entender la IA como expansión humana',
        'title' => 'Charlas para humanos',
        'markdown' => 'Para personas no técnicas que quieren comprender qué es la IA, cómo usarla en la vida diaria y por qué puede ampliar creatividad, aprendizaje, trabajo y organización personal sin reemplazar el criterio humano.',
        'extra' => ['type' => 'product', 'number' => '01', 'product_slug' => 'charlahumanos'],
    ],
    [
        'key' => 'producto-charlatecnica',
        'order' => 30,
        'eyebrow' => 'Adoptar IA con criterio, procesos y gobernanza',
        'title' => 'Charlas para equipos de trabajo y áreas IT',
        'markdown' => 'Para equipos que necesitan pasar del entusiasmo inicial a una adopción ordenada: detectar procesos candidatos, diseñar pilotos responsables, cuidar datos, trazabilidad, permisos y límites antes de automatizar.',
        'extra' => ['type' => 'product', 'number' => '02', 'product_slug' => 'charlatecnica'],
    ],
    [
        'key' => 'producto-charlagerencia',
        'order' => 40,
        'eyebrow' => 'IA como decisión estratégica, no como moda tecnológica',
        'title' => 'Charlas para gerencias y directivos',
        'markdown' => 'Para líderes que necesitan decidir qué capacidades humanas, comerciales y operativas quieren ampliar con IA, bajo qué límites, con qué responsabilidad y con qué hoja de ruta realista.',
        'extra' => ['type' => 'product', 'number' => '03', 'product_slug' => 'charlagerencia'],
    ],
    [
        'key' => 'charlas-para-personas',
        'order' => 50,
        'eyebrow' => 'Charla 01',
        'title' => 'Charlas para humanos',
        'markdown' => implode("\n\n", [
            'Esta charla está pensada para personas que escuchan hablar de inteligencia artificial todos los días, pero todavía sienten que es un mundo lejano, complejo o amenazante.',
            'El objetivo es explicar qué es la IA de forma clara, cercana y humana: qué puede hacer, qué no puede hacer, cómo se usa en la vida cotidiana y por qué puede convertirse en una herramienta de expansión personal, creativa y laboral.',
            'Durante años, muchas personas dejaron de crear, aprender o emprender no por falta de talento, sino por falta de medios, tiempo, herramientas o acompañamiento. La inteligencia artificial cambia esa frontera. Puede ayudar a escribir, diseñar, investigar, organizar, estudiar, vender, comunicar y producir con recursos que antes estaban reservados para pocos.',
            'Pero esa potencia debe tener dirección humana. Por eso esta charla también aborda los riesgos: dependencia excesiva, desinformación, pérdida de criterio, uso irresponsable de datos, ansiedad productiva y reemplazo mal entendido.',
            'La propuesta no es "usar IA para hacerlo todo más rápido". La propuesta es aprender a usar IA para pensar mejor, crear mejor y trabajar con más sentido.',
            '> La IA bien utilizada no reemplaza lo que somos. Nos entrega nuevos instrumentos para expresar, crear, aprender, ordenar ideas y ampliar nuestras posibilidades.',
        ]),
        'extra' => [
            'type' => 'detail',
            'number_label' => 'Charla 01',
            'subtitle' => 'Entender la IA como expansión humana',
            'topics' => [
                'Qué es realmente la inteligencia artificial.',
                'Qué puede hacer y qué no puede hacer.',
                'Cómo usar IA en la vida diaria sin miedo.',
                'IA para creatividad, estudio, trabajo y organización personal.',
                'Cómo hacer buenas preguntas a una IA.',
                'Riesgos básicos: errores, sesgos, privacidad y dependencia.',
                'Por qué el criterio humano sigue siendo central.',
                'IA como herramienta de expansión, no como reemplazo.',
            ],
            'audience' => 'Personas no técnicas, estudiantes, trabajadores, profesionales independientes, adultos que quieren actualizarse, creadores, emprendedores y cualquier persona que quiera entender la IA desde una mirada humana.',
            'expected_result' => 'Que cada asistente salga entendiendo qué es la IA, cómo puede usarla de forma práctica y por qué su valor personal no disminuye frente a la tecnología: se puede ampliar si aprende a gobernarla.',
        ],
    ],
    [
        'key' => 'charlas-para-equipos-it',
        'order' => 60,
        'eyebrow' => 'Charla 02',
        'title' => 'Charlas para equipos de trabajo y áreas IT',
        'markdown' => implode("\n\n", [
            'Esta charla está orientada a equipos que ya trabajan con tecnología, operaciones, datos, soporte, desarrollo, marketing, administración o procesos internos, y necesitan pasar del entusiasmo inicial a una adopción más ordenada.',
            'La IA puede automatizar tareas, ordenar información, apoyar decisiones y acelerar procesos. Pero si se incorpora sin diagnóstico, puede producir más ruido que valor: herramientas dispersas, datos mal usados, automatizaciones sin control, dependencia de prompts improvisados y decisiones sin trazabilidad.',
            'En AlmaDesign proponemos una adopción responsable: primero comprender el proceso, luego definir límites, después automatizar.',
            'Esta charla muestra cómo identificar oportunidades reales de IA dentro de una organización: documentos, atención, reportes, búsqueda de información, generación de contenido, flujos repetitivos, conocimiento interno y asistentes empresariales.',
            'También introduce conceptos como RAG, GraphRAG, agentes, evaluación, permisos, trazabilidad y privacidad por diseño, pero explicados desde el valor práctico para el equipo, no desde la moda técnica.',
            '> Antes de automatizar, hay que comprender. Antes de escalar, hay que gobernar.',
        ]),
        'extra' => [
            'type' => 'detail',
            'number_label' => 'Charla 02',
            'subtitle' => 'Adoptar IA con criterio, procesos y gobernanza',
            'topics' => [
                'Cómo detectar procesos candidatos a IA.',
                'Diferencia entre chatbot, asistente, automatización y agente.',
                'Uso de IA en documentos, reportes, soporte y operaciones.',
                'RAG y GraphRAG explicados de forma práctica.',
                'Riesgos de automatizar sin gobernanza.',
                'Privacidad, datos sensibles y trazabilidad.',
                'Cómo diseñar pilotos pequeños con impacto real.',
                'Criterios para evaluar si una solución de IA funciona.',
            ],
            'audience' => 'Equipos de IT, operaciones, administración, soporte, marketing, comunicaciones, desarrollo, innovación y transformación digital.',
            'expected_result' => 'Que el equipo pueda distinguir entre uso superficial de IA y adopción útil, segura y medible, identificando casos concretos para comenzar con pilotos responsables.',
        ],
    ],
    [
        'key' => 'charlas-para-gerencias',
        'order' => 70,
        'eyebrow' => 'Charla 03',
        'title' => 'Charlas para gerencias y directivos',
        'markdown' => implode("\n\n", [
            'Esta charla está pensada para gerencias, dueños de empresa, directivos y líderes que necesitan entender qué significa adoptar inteligencia artificial desde una perspectiva estratégica.',
            'La pregunta central no es "qué herramienta de IA usamos". La pregunta correcta es: qué capacidades humanas, comerciales y operativas queremos ampliar con IA, bajo qué límites y con qué responsabilidad.',
            'La inteligencia artificial puede mejorar productividad, análisis, comunicación, ventas, atención, documentación y toma de decisiones. Pero también puede introducir riesgos importantes: exposición de datos, decisiones opacas, dependencia tecnológica, automatización mal diseñada, pérdida de criterio interno y falsa sensación de control.',
            'Por eso AlmaDesign plantea la IA desde una mirada de gobernanza humana: la organización debe saber qué automatiza, qué no automatiza, qué datos usa, quién decide, quién valida y qué consecuencias acepta.',
            '> La IA no reemplaza la dirección. La exige con más claridad.',
        ]),
        'extra' => [
            'type' => 'detail',
            'number_label' => 'Charla 03',
            'subtitle' => 'IA como decisión estratégica, no como moda tecnológica',
            'topics' => [
                'Qué significa adoptar IA a nivel estratégico.',
                'Oportunidades reales para empresas y organizaciones.',
                'Productividad versus criterio humano.',
                'Riesgos legales, operativos, reputacionales y de datos.',
                'Privacidad por diseño y tratamiento responsable de información.',
                'Alineamiento con buenas prácticas internacionales y Ley chilena N° 21.719.',
                'Cómo priorizar casos de uso de alto impacto.',
                'Cómo pasar de experimentos aislados a una hoja de ruta de IA.',
                'Gobernanza antes de automatización.',
            ],
            'audience' => 'Gerencias generales, directorios, dueños de empresa, líderes de área, equipos ejecutivos, instituciones y organizaciones que necesitan tomar decisiones informadas sobre IA.',
            'expected_result' => 'Que la dirección pueda entender la IA como una decisión estratégica y no como una compra de herramientas, definiendo prioridades, límites y primeros pasos realistas.',
        ],
    ],
];

$pdo->beginTransaction();

try {
    $pageStatement = $pdo->prepare(
        "INSERT INTO site_pages (slug, title, meta_description, status)
         VALUES (:slug, :title, :meta_description, 'published')
         ON CONFLICT (slug) DO UPDATE SET
            title = EXCLUDED.title,
            meta_description = EXCLUDED.meta_description,
            status = 'published',
            updated_at = NOW()
         RETURNING id"
    );
    $pageStatement->execute($page);
    $pageId = (int) $pageStatement->fetchColumn();

    $deleteStatement = $pdo->prepare('DELETE FROM site_page_sections WHERE page_id = :page_id');
    $deleteStatement->execute(['page_id' => $pageId]);

    $insertStatement = $pdo->prepare(
        'INSERT INTO site_page_sections
            (page_id, sort_order, section_key, eyebrow, title, body_markdown, extra_json, is_active)
         VALUES
            (:page_id, :sort_order, :section_key, :eyebrow, :title, :body_markdown, :extra_json, TRUE)'
    );

    foreach ($sections as $section) {
        $insertStatement->execute([
            'page_id' => $pageId,
            'sort_order' => $section['order'],
            'section_key' => $section['key'],
            'eyebrow' => $section['eyebrow'],
            'title' => $section['title'],
            'body_markdown' => $section['markdown'],
            'extra_json' => json_encode($section['extra'], JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE),
        ]);
    }

    $pdo->commit();

    echo 'OK charlas-ai-for-humans cargada' . PHP_EOL;
    echo 'Secciones activas: ' . count($sections) . PHP_EOL;
} catch (Throwable $exception) {
    $pdo->rollBack();
    throw $exception;
}
