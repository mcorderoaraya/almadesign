<?php
declare(strict_types=1);

/*
 * Archivo: import_consulting_content.php
 * Path: scripts/import_consulting_content.php
 * Ambiente: local|produccion
 * Fecha de creacion: 2026-07-13
 * Explicacion tecnica: importa Consultoría IA y procesos hacia PostgreSQL usando objetos layout reutilizables.
 */

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/app/Core/Env.php';
require BASE_PATH . '/app/Services/Database.php';

App\Core\Env::load(BASE_PATH . '/.env');
$config = require BASE_PATH . '/config/app.php';
$pdo = App\Services\Database::pdo($config);

$page = [
    'slug' => 'consultoria-ia-procesos',
    'title' => 'Consultoría de inteligencia artificial y procesos | AlmaDesign',
    'meta_description' => 'Consultoría IA para empresas que necesitan ordenar procesos, diagnosticar fricciones internas e implementar inteligencia artificial con gobernanza y trazabilidad.',
];

$approachItems = [
    [
        'title' => 'Diagnóstico de fricciones internas',
        'body' => ['Identificamos los puntos donde la organización pierde claridad, tiempo o capacidad de decisión: tareas duplicadas, información dispersa, cuellos de botella, responsabilidades ambiguas y procesos que dependen de memoria informal o coordinación manual.'],
        'key' => 'Ver la fricción antes de escalarla.',
    ],
    [
        'title' => 'Levantamiento de procesos reales',
        'body' => ['Observamos cómo funciona la organización en la práctica, no solo cómo aparece en un organigrama o procedimiento formal. Levantamos el recorrido real de la información, las decisiones, los actores involucrados y los documentos que sostienen el trabajo cotidiano.'],
        'key' => 'Trabajar sobre la operación real, no sobre la versión idealizada.',
    ],
    [
        'title' => 'Priorización de casos de uso',
        'body' => ['No todo debe automatizarse al mismo tiempo ni con la misma profundidad. Priorizamos los casos de uso según impacto, factibilidad, riesgo, costo de adopción y valor para la organización.'],
        'key' => 'Elegir mejor antes de implementar más.',
    ],
    [
        'anchor' => 'gobernanza',
        'title' => 'Diseño de límites explícitos y criterios humanos',
        'body' => ['Definimos límites, reglas de uso y puntos de supervisión para que la tecnología opere dentro de un marco claro. Esto incluye criterios de validación, decisiones que deben seguir bajo control humano, manejo de excepciones y resguardo de la trazabilidad.'],
        'key' => 'Gobernar antes de delegar.',
    ],
    [
        'title' => 'Roadmap de implementación',
        'body' => ['Traducimos el diagnóstico en una hoja de ruta clara: etapas, dependencias, prioridades, responsables y secuencia de avance. El roadmap ordena qué se hace primero, qué condiciones deben existir y cómo se articula el proceso sin improvisación.'],
        'key' => 'Pasar de la intención a una secuencia ejecutable.',
    ],
    [
        'title' => 'Acompañamiento en adopción responsable',
        'body' => ['La implementación no termina cuando una herramienta queda disponible. Acompañamos la adopción para que las personas comprendan el sistema, integren nuevos criterios de trabajo y desarrollen confianza en el uso responsable de la tecnología.'],
        'key' => 'Adoptar con sentido, no solo activar herramientas.',
    ],
];

$deliverableItems = [
    [
        'title' => 'Mapa de procesos y fricciones',
        'body' => ['Documento estructurado que muestra cómo fluye realmente el trabajo: procesos, actores, documentos, decisiones, dependencias y puntos donde se genera fricción operativa. Permite ver con claridad dónde se pierde tiempo, trazabilidad o capacidad de decisión.'],
        'key' => 'Convertir operación dispersa en mapa comprensible.',
    ],
    [
        'title' => 'Priorización de oportunidades IA',
        'body' => ['Matriz de oportunidades que ordena posibles casos de uso según impacto, factibilidad, riesgo, costo de adopción y valor estratégico. Ayuda a decidir qué iniciativas conviene abordar primero y cuáles deben esperar.'],
        'key' => 'No todo lo posible es prioritario.',
    ],
    [
        'title' => 'Riesgos y límites explícitos',
        'body' => ['Identificación de riesgos operativos, humanos, técnicos y de gobernanza asociados a cada caso de uso. Incluye límites de automatización, controles mínimos, criterios de validación y puntos donde la supervisión humana debe permanecer activa.'],
        'key' => 'La IA necesita bordes antes de operar.',
    ],
    [
        'title' => 'Recomendaciones de implementación',
        'body' => ['Conjunto de recomendaciones prácticas para avanzar desde el diagnóstico hacia soluciones viables. Incluye criterios técnicos, organizacionales y humanos para reducir improvisación y evitar adoptar herramientas que no resuelven el problema real.'],
        'key' => 'Implementar con criterio, no por impulso.',
    ],
    [
        'title' => 'Roadmap técnico-operativo',
        'body' => ['Plan de avance por etapas que ordena prioridades, dependencias, responsables, decisiones pendientes y condiciones mínimas para implementar. Permite pasar de una intención general a una secuencia concreta y gobernable.'],
        'key' => 'Una ruta clara reduce fricción y riesgo.',
    ],
    [
        'title' => 'Criterios de adopción y supervisión humana',
        'body' => ['Marco de criterios para que la organización sepa cómo usar, validar y supervisar soluciones con IA. Define cuándo la tecnología puede asistir, cuándo debe escalar a revisión humana y qué evidencia debe conservarse.'],
        'key' => 'La decisión crítica sigue siendo humana.',
    ],
];

$guardrails = [
    [
        'title' => 'No se promete automatización sin validación humana.',
        'body' => 'Toda automatización debe tener un propósito claro, responsables definidos y criterios de revisión. La IA puede apoyar procesos, ordenar información y reducir carga operativa, pero las decisiones relevantes deben mantenerse bajo supervisión humana.',
    ],
    [
        'title' => 'No se prometen diagnósticos profundos como gratuitos.',
        'body' => 'Una conversación inicial puede ayudar a entender el problema. Un diagnóstico serio requiere revisar procesos reales, documentos, restricciones, responsabilidades y prioridades. AlmaDesign distingue claramente entre una orientación inicial y una evaluación técnica u organizacional profunda.',
    ],
    [
        'title' => 'No se promete reducción de costos sin evidencia ni evaluación.',
        'body' => 'La eficiencia debe demostrarse con datos, medición y análisis del impacto real. No se ofrecen porcentajes, ahorros ni resultados asegurados sin revisar antes el contexto operativo, los costos actuales, los riesgos y la capacidad de adopción de la organización.',
    ],
];

$sections = [
    [
        'key' => 'consultoria-ia-procesos',
        'order' => 10,
        'eyebrow' => 'Consultoría IA y procesos',
        'title' => 'Consultoría de inteligencia artificial y procesos para empresas.',
        'markdown' => 'Antes de automatizar, ordenamos procesos, fricciones, criterios y responsabilidades. AlmaDesign ayuda a organizaciones a identificar dónde la IA puede aportar valor real y cómo implementarla con trazabilidad, gobernanza y control humano.',
        'extra' => [
            'layout' => 'hero_vertical',
            'background_image' => 'img/cards/consultoria-ia-procesos-hero-v1.webp',
            'primary_label' => 'Solicitar diagnóstico',
            'primary_href' => '/contacto?producto=consultoria',
            'secondary_label' => 'Volver al Home',
            'secondary_href' => '/',
        ],
    ],
    [
        'key' => 'enfoque-almadesign',
        'order' => 20,
        'eyebrow' => 'Consultoría IA y procesos',
        'title' => 'Enfoque AlmaDesign',
        'markdown' => 'No partimos por la herramienta. Partimos por la realidad de la organización. Nuestro enfoque busca ordenar procesos, criterios y decisiones antes de automatizar, para que la inteligencia artificial se integre con claridad, trazabilidad y sentido humano.',
        'extra' => [
            'layout' => 'consulting_cards',
            'variant' => 'approach',
            'key_label' => 'Clave',
            'items' => $approachItems,
        ],
    ],
    [
        'key' => 'que-se-entrega',
        'order' => 30,
        'eyebrow' => 'Consultoría IA y procesos',
        'title' => 'Qué se entrega',
        'markdown' => 'El resultado de una consultoría no debe ser una promesa abstracta. Debe dejar claridad accionable: procesos entendidos, oportunidades priorizadas, riesgos visibles y un camino de implementación que la organización pueda evaluar, gobernar y ejecutar.',
        'extra' => [
            'layout' => 'consulting_cards',
            'variant' => 'deliverables',
            'key_label' => 'Clave',
            'items' => $deliverableItems,
        ],
    ],
    [
        'key' => 'que-no-se-promete',
        'order' => 40,
        'eyebrow' => 'Gobernanza',
        'title' => 'Límites explícitos de comunicación.',
        'markdown' => '',
        'extra' => [
            'layout' => 'guardrails',
            'items' => $guardrails,
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
        $extra = array_merge([
            'source' => 'app/Controllers/ContentController.php::consulting',
        ], $section['extra']);

        $insertStatement->execute([
            'page_id' => $pageId,
            'sort_order' => $section['order'],
            'section_key' => $section['key'],
            'eyebrow' => $section['eyebrow'],
            'title' => $section['title'],
            'body_markdown' => $section['markdown'],
            'extra_json' => json_encode($extra, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE),
        ]);
    }

    $pdo->commit();

    echo 'OK consultoria-ia-procesos layout objects cargada' . PHP_EOL;
    echo 'Secciones activas: ' . count($sections) . PHP_EOL;
} catch (Throwable $exception) {
    $pdo->rollBack();
    throw $exception;
}
