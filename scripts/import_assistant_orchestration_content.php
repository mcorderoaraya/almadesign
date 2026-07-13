<?php
declare(strict_types=1);

/*
 * Archivo: import_assistant_orchestration_content.php
 * Path: scripts/import_assistant_orchestration_content.php
 * Ambiente: local|produccion
 * Fecha de creacion: 2026-07-13
 * Explicacion tecnica: importa Orquestación con Asistentes IA hacia PostgreSQL usando objetos layout reutilizables.
 */

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/app/Core/Env.php';
require BASE_PATH . '/app/Services/Database.php';

App\Core\Env::load(BASE_PATH . '/.env');
$config = require BASE_PATH . '/config/app.php';
$pdo = App\Services\Database::pdo($config);

$page = [
    'slug' => 'orquestacion-asistentes-ia',
    'title' => 'Orquestación con Asistentes IA | AlmaDesign',
    'meta_description' => 'Automatización con criterio humano: asistentes IA, procesos y aplicaciones a medida que aumentan eficiencia sin borrar responsabilidad, validación ni juicio humano.',
];

$productRows = [
    ['Knowledge Desk Copilot', 'Mesa de ayuda interna con tickets, respuestas sugeridas y base de conocimiento gobernada', 'RAG + ticketing'],
    ['CRM Copilot', 'Seguimiento comercial, historial de clientes, próximas acciones y respuestas asistidas', 'CRM + RAG'],
    ['Policy & Procedure Assistant', 'Consulta de políticas internas, procedimientos, manuales y normativa interna', 'RAG documental'],
    ['Bid / Proposal Copilot', 'Apoyo para licitaciones, propuestas técnicas y documentos repetitivos', 'RAG + trazabilidad'],
    ['Compliance Document Copilot', 'Revisión asistida de documentos frente a políticas, privacidad, contratos o requisitos', 'RAG + reglas'],
    ['Onboarding Assistant', 'Asistente para nuevos colaboradores con preguntas frecuentes, procesos y documentos internos', 'RAG + flujo guiado'],
    ['Operations Ticketing Copilot', 'Registro, clasificación y derivación de solicitudes internas: TI, RRHH, legal, finanzas, operaciones', 'Ticketing + IA'],
    ['Graph Knowledge Navigator', 'Para organizaciones con documentos complejos, relaciones entre áreas, normas, contratos, personas y procesos', 'GraphRAG'],
];

$sections = [
    [
        'key' => 'orquestacion-asistentes-ia',
        'order' => 10,
        'eyebrow' => 'Orquestación con Asistentes IA',
        'title' => 'Orquestación con Asistentes IA',
        'markdown' => 'Automatizamos con criterio humano: asistentes IA, procesos y aplicaciones a medida que aumentan la eficiencia sin borrar la responsabilidad, la validación y el juicio de las personas.',
        'extra' => [
            'layout' => 'hero_vertical',
            'background_image' => 'img/cards/orquestacion-asistentes-ia-hero-v1.webp',
            'primary_label' => 'Conversar sobre Orquestación IA',
            'primary_href' => '/contacto?producto=orquestacion-asistentes-ia',
            'secondary_label' => 'Volver al Home',
            'secondary_href' => '/',
        ],
    ],
    [
        'key' => 'diagnostico-orquestacion',
        'order' => 20,
        'eyebrow' => '',
        'title' => '',
        'markdown' => '',
        'extra' => [
            'layout' => 'assistant_feature',
            'aria_label' => 'Diagnóstico de automatización con asistentes IA',
            'left' => [
                'anchor' => 'automatizacion-con-limites',
                'eyebrow' => 'Diagnóstico operativo',
                'title' => 'La IA puede resolver más rápido que la empresa puede operar.',
                'body' => [
                    'Automatizamos procesos, desarrollamos asistentes y construimos aplicaciones a medida, pero no creemos que todo deba ser automatizado.',
                    'Un asistente IA puede clasificar tickets, responder consultas, preparar documentos, sugerir decisiones y acelerar flujos completos. Eso aumenta capacidad, pero también cambia la presión sobre las áreas que deben ejecutar el trabajo real.',
                ],
            ],
            'right' => [
                'anchor' => 'capacidad-operativa',
                'eyebrow' => 'Riesgo',
                'title' => 'La fricción aparece cuando la velocidad digital choca con la capacidad física.',
                'body' => [
                    'La IA no elimina automáticamente el trabajo: muchas veces lo desplaza hacia bodega, reparto, soporte, validación, cumplimiento o supervisión humana.',
                    'Por eso AlmaDesign diseña automatizaciones con criterio operativo: primero comprender el proceso completo, luego definir límites, después automatizar solo donde la organización puede absorber esa velocidad.',
                ],
            ],
        ],
    ],
    [
        'key' => 'orquestar-con-capacidad',
        'order' => 30,
        'eyebrow' => 'Orquestación',
        'title' => 'Orquestar es equilibrar velocidad, capacidad y responsabilidad.',
        'markdown' => 'Un asistente útil no solo responde rápido. Debe saber cuándo preparar, cuándo sugerir, cuándo ejecutar una tarea repetitiva y cuándo escalar a una persona. La orquestación conecta IA, sistemas, procesos y validación humana para que la automatización no rompa la operación.',
        'extra' => [
            'layout' => 'rag_comparison',
            'comparison_label' => 'Beneficios y forma de gobernar asistentes IA',
            'decision_label' => 'Criterios operativos de orquestación IA',
            'flow_label' => 'Flujo operativo para automatizar con criterio humano',
            'columns' => [
                [
                    'label' => 'Beneficios',
                    'title' => 'Dónde la IA sí aumenta capacidad.',
                    'markdown' => implode("\n", [
                        'La IA aporta valor cuando reduce fricción repetitiva y deja mejor preparado el trabajo que una persona debe validar o ejecutar.',
                        '',
                        '- Clasificación de tickets, solicitudes y casos recurrentes.',
                        '- Respuestas sugeridas basadas en conocimiento gobernado.',
                        '- Recuperación de evidencia documental antes de decidir.',
                        '- Derivación más clara entre soporte, ventas, operaciones y administración.',
                    ]),
                ],
                [
                    'label' => 'Cómo',
                    'title' => 'Cómo evitamos la sobreautomatización.',
                    'markdown' => implode("\n", [
                        'Antes de escalar, medimos qué pasa aguas abajo: quién ejecuta, qué capacidad existe, qué costo aparece y qué decisiones requieren responsabilidad humana.',
                        '',
                        '- Definir límites explícitos para cada asistente.',
                        '- Medir impacto sobre personas, tiempos físicos y costos reales.',
                        '- Mantener revisión humana en decisiones sensibles.',
                        '- Escalar por pilotos, no por entusiasmo tecnológico.',
                    ]),
                ],
            ],
            'decision_rows' => [
                ['Beneficio operativo', 'La IA prepara, ordena y acelera tareas repetitivas sin exigir que todo el proceso sea automático.'],
                ['Punto crítico', 'Si una etapa se acelera sin mirar la capacidad del resto del proceso, el cuello de botella solo cambia de lugar.'],
                ['Regla de diseño', 'Automatizar solo cuando la organización puede sostener la velocidad con personas, sistemas, costos y responsabilidad claros.'],
            ],
            'flow' => ['Diagnosticar', 'Priorizar', 'Pilotear', 'Medir capacidad', 'Escalar', 'Gobernar'],
        ],
    ],
    [
        'key' => 'contenido-orquestacion',
        'order' => 40,
        'eyebrow' => '',
        'title' => '',
        'markdown' => '',
        'extra' => [
            'layout' => 'vertical_sections',
            'items' => [
                [
                    'anchor' => 'caso-distribucion-ia',
                    'title' => 'Caso de uso: cuando la IA acelera más que la operación.',
                    'body' => [
                        'Una empresa de distribución implementa un asistente IA para su mesa de tickets. El sistema clasifica solicitudes, responde en segundos y resuelve casos frecuentes como devoluciones, reposición de productos, cambios de entrega o nuevos despachos.',
                        'El asistente funciona bien, pero aparece una fricción que no estaba en el cálculo inicial: la operación física no se mueve a la misma velocidad que la IA. Si el sistema aprueba más devoluciones, alguien debe retirar esos productos. Si genera más entregas, alguien debe despacharlas. Si ordena más solicitudes por hora, bodega, repartidores, camiones y coordinación reciben más carga en menos tiempo.',
                        'La IA no eliminó el trabajo: lo desplazó hacia otra parte del proceso. La empresa descubre que el cuello de botella no estaba solo en la atención al cliente, sino en la capacidad real de reparto, logística y cumplimiento.',
                        'El retorno esperado por automatizar tickets puede demorarse o incluso volverse en contra si la organización debe contratar más repartidores, ampliar turnos, aumentar flota o reforzar áreas que no estaban preparadas para absorber ese volumen.',
                        'Por eso, antes de acelerar una etapa, hay que mirar la cadena completa: personas, tiempos físicos, costos, capacidad instalada, experiencia del cliente y responsabilidad operacional.',
                    ],
                    'quote' => 'La IA puede acelerar una decisión, pero no puede ignorar la capacidad humana y operativa que debe sostenerla.',
                ],
                [
                    'anchor' => 'knowledge-desk-copilot',
                    'title' => 'Producto destacado: Knowledge Desk Copilot',
                    'body' => [
                        'Mesa de ayuda inteligente basada en conocimiento gobernado, donde la IA sugiere respuestas, clasifica solicitudes y recupera evidencia documental, pero cada decisión relevante mantiene validación humana.',
                        'Un sistema de asistencia operativa para reducir fricción interna sin perder control humano.',
                    ],
                ],
                [
                    'anchor' => 'productos-de-automatizacion',
                    'title' => 'La IA prepara, ordena, sugiere y ejecuta tareas repetitivas; el humano valida, decide y responde por el resultado.',
                    'table' => [
                        'headers' => ['Producto', 'Qué resuelve', 'Base técnica'],
                        'rows' => $productRows,
                    ],
                ],
            ],
        ],
    ],
    [
        'key' => 'sintesis-orquestacion',
        'order' => 50,
        'eyebrow' => '',
        'title' => '',
        'markdown' => '',
        'extra' => [
            'layout' => 'assistant_feature',
            'aria_label' => 'Síntesis y gobernanza de asistentes IA',
            'is_insight' => true,
            'left' => [
                'anchor' => 'gobernanza-operativa',
                'eyebrow' => 'Gobernanza',
                'title' => 'Gobernanza antes de automatización.',
                'body' => [
                    'Definimos reglas claras para que la inteligencia artificial opere con límites, trazabilidad y responsabilidad humana.',
                    'La gobernanza permite establecer qué información puede usar un asistente IA, qué tipo de respuestas puede entregar, cuándo debe pedir revisión humana y cuáles son los límites explícitos frente a clientes, equipos internos o procesos sensibles.',
                    'Gobernar es poner reglas claras para que la IA sea útil, segura y revisable por humanos.',
                ],
            ],
            'right' => [
                'anchor' => 'criterio-humano',
                'eyebrow' => 'Criterio humano',
                'title' => 'Más rápido no siempre significa más inteligente.',
                'body' => [
                    'Un asistente IA puede ordenar información, guiar flujos, responder preguntas, generar documentos, conectar sistemas y acelerar tareas repetitivas. Pero su valor depende de límites claros: qué puede hacer, qué debe escalar, qué datos puede usar y quién revisa sus respuestas.',
                    'La eficiencia útil no consiste en sacar personas del proceso, sino en liberar tiempo y reducir fricción para que las personas puedan revisar mejor, decidir mejor y dedicar energía a tareas de mayor sentido.',
                    'Una organización sin humanos revisando sus procesos no es más inteligente: solo es más rápida para equivocarse.',
                ],
            ],
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
            'source' => 'app/Controllers/ContentController.php::assistantOrchestration',
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

    echo 'OK orquestacion-asistentes-ia layout objects cargada' . PHP_EOL;
    echo 'Secciones activas: ' . count($sections) . PHP_EOL;
} catch (Throwable $exception) {
    $pdo->rollBack();
    throw $exception;
}
