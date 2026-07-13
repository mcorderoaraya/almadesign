<?php
declare(strict_types=1);

/*
 * Archivo: import_document_management_content.php
 * Path: scripts/import_document_management_content.php
 * Ambiente: local|produccion
 * Fecha de creacion: 2026-07-13
 * Explicacion tecnica: importa Gestión Documental hacia PostgreSQL usando objetos layout reutilizables del sitio.
 */

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/app/Core/Env.php';
require BASE_PATH . '/app/Services/Database.php';

App\Core\Env::load(BASE_PATH . '/.env');
$config = require BASE_PATH . '/config/app.php';
$pdo = App\Services\Database::pdo($config);

$page = [
    'slug' => 'gestion-documental',
    'title' => 'Gestión Documental Gobernada | AlmaDesign',
    'meta_description' => 'Gestión documental gobernada para ordenar documentos críticos, habilitar asistentes IA con evidencia, trazabilidad y límites claros de uso.',
];

$caseTable = implode("\n", [
    '| Sector | Problema | Solución | Resultado medible |',
    '|---|---|---|---|',
    '| Automoción | Sistemas RAG fragmentados por departamento, con dificultad para colaboración segura. | Toyota construyó una infraestructura RAG compartida en AWS con autenticación interna y control centralizado de acceso a archivos. | Reducción aproximada del 20% en tiempo de investigación y 50% en esfuerzo de investigación en una iniciativa interna. |',
    '| Banca minorista | Tellers necesitaban consultar políticas y procedimientos durante interacciones con clientes. | Wells Fargo desplegó una herramienta RAG para recuperar políticas y procedimientos en tiempo real. | Reducción aproximada del 20% del flujo de resolución de consultas. |',
    '| Banca digital | Chatbot con base de conocimiento estática, lentitud y baja precisión. | Hong Leong Bank migró a RAG dinámico con Gemini 2.5 Flash. | Precisión del chatbot subió de 75% a 99% y las transacciones mensuales de chat crecieron 3x. |',
    '| Salud digital | Conocimiento interno en seis silos; baja velocidad de resolución y pérdida de tiempo en soporte. | Orion Health creó Oribot, chatbot interno con Amazon Bedrock y RAG sobre más de 500.000 registros. | Recupera respuestas en menos de 1 minuto, ahorra 50 horas/día y resultó 10x más costo-efectivo que alternativas comerciales. |',
    '| Cumplimiento bancario | Revisiones manuales de proveedores y quejas con alta carga operativa. | Coastal Community Bank usó una aplicación RAG para acelerar procesamiento documental y prellenado. | Revisión de quejas al 100% con 94% de precisión y ahorro equivalente a 1 FTE/año. |',
    '| Investigación e innovación | Elaboración manual de reportes demasiado lenta. | Cypris integró búsqueda vectorial y RAG con Elasticsearch para investigación asistida. | Generación de reportes pasó de semanas a 15 minutos. |',
    '| Inteligencia y seguridad | Tiempo excesivo para producir briefings accionables. | MAX Security y BigData Boutique desarrollaron SCOUT AI con RAG. | Briefings bajaron de 2 horas a 25 minutos y se redujo la carga de investigación en 7 horas por analista por semana. |',
    '| IA empresarial | Exactitud insuficiente para usos de alto valor con grandes volúmenes documentales. | Contextual AI construyó una plataforma avanzada de RAG sobre Elastic con búsqueda híbrida. | 90%+ de precisión RAG y operación sobre repositorios de hasta 22 millones de chunks. |',
]);

$sections = [
    [
        'key' => 'gestion-documental',
        'order' => 10,
        'eyebrow' => 'Gestión Documental',
        'title' => 'Gestión Documental Gobernada',
        'markdown' => 'Ordenamos documentos críticos para que una IA pueda asistir a las personas con evidencia, trazabilidad y límites claros de uso, aumentando la capacidad humana para encontrar información, responder con mayor eficiencia y tomar mejores decisiones.',
        'extra' => [
            'layout' => 'hero_vertical',
            'background_image' => 'img/cards/gestion-documental-hero-v2.webp',
            'primary_label' => 'Conversar sobre Gestión Documental',
            'primary_href' => '/contacto?producto=gestion-documental-gobernada',
            'secondary_label' => 'Volver al Home',
            'secondary_href' => '/',
        ],
    ],
    [
        'key' => 'diagnostico-documental',
        'order' => 20,
        'eyebrow' => '',
        'title' => '',
        'markdown' => '',
        'extra' => [
            'layout' => 'two_column_feature',
            'columns' => [
                [
                    'eyebrow' => 'Diagnóstico documental',
                    'title' => 'El problema no es la falta de información. Es la coherencia.',
                    'markdown' => implode("\n\n", [
                        'Muchas organizaciones no tienen un problema de falta de información. Tienen un problema de coherencia.',
                        'Los documentos existen, pero están dispersos en carpetas, correos, sistemas internos, unidades compartidas, versiones antiguas, archivos personales y plataformas que no conversan entre sí. El resultado es una operación lenta: las personas pierden tiempo buscando antecedentes, validando cuál es la versión correcta y preguntando una y otra vez por información que ya existe.',
                    ]),
                ],
                [
                    'eyebrow' => 'IA con evidencia',
                    'title' => 'Una IA útil necesita fuentes confiables.',
                    'markdown' => implode("\n\n", [
                        'Esa fricción aumenta cuando se incorpora inteligencia artificial sin una gestión documental gobernada. Un asistente de IA puede ser muy útil, pero necesita fuentes confiables, permisos claros, documentos vigentes y trazabilidad.',
                        'Si la base documental está desordenada, la IA puede entregar respuestas incompletas, poco verificables o basadas en documentos que no deberían ser usados.',
                        'Aquí entra la gestión documental gobernada: ordenar la información para que pueda ser encontrada, entendida, consultada y auditada.',
                    ]),
                ],
            ],
        ],
    ],
    [
        'key' => 'centralizar-documentacion',
        'order' => 30,
        'eyebrow' => 'Documentación centralizada',
        'title' => 'Centralizar la documentación transforma información dispersa en capacidad operativa.',
        'markdown' => 'Centralizar no significa guardar todo en una misma carpeta. Significa ordenar fuentes, versiones, permisos y vigencia para que las personas y los asistentes de IA puedan trabajar con evidencia confiable.',
        'extra' => [
            'layout' => 'rag_comparison',
            'columns' => [
                [
                    'label' => 'Beneficios',
                    'title' => 'Qué gana una organización al centralizar su documentación.',
                    'markdown' => implode("\n", [
                        'Cuando la documentación se vuelve confiable, las personas dejan de perder tiempo buscando, validando versiones o preguntando por antecedentes que ya existen.',
                        '',
                        '- Menos tiempo perdido buscando documentos o confirmando versiones.',
                        '- Respuestas más consistentes entre áreas, equipos y canales.',
                        '- Mejor trazabilidad para decisiones, auditorías, soporte y cumplimiento.',
                        '- Menor dependencia de personas clave para acceder al conocimiento interno.',
                    ]),
                ],
                [
                    'label' => 'Cómo',
                    'title' => 'Cómo lo resolvemos con gestión documental gobernada.',
                    'markdown' => implode("\n", [
                        'Primero ordenamos el corpus documental. Después definimos fuentes autorizadas, permisos, metadatos y criterios de uso. Recién entonces una IA puede asistir con respuestas citadas, límites claros y revisión humana.',
                        '',
                        '- RAG para recuperar documentos relevantes y responder con evidencia.',
                        '- GraphRAG cuando importan relaciones entre normas, contratos, áreas o procesos.',
                        '- Gobernanza para controlar qué se usa, quién puede verlo y cuándo escalar a una persona.',
                    ]),
                ],
            ],
            'decision_rows' => [
                ['Beneficio operativo', 'Las personas encuentran información vigente sin recorrer carpetas, correos o versiones antiguas.'],
                ['Beneficio para IA', 'El asistente responde desde documentos autorizados, con fuentes citables y menor riesgo de inventar.'],
                ['Beneficio de gobierno', 'La organización define permisos, límites de uso, responsables, vigencia y trazabilidad antes de automatizar.'],
            ],
            'flow' => [
                'Inventariar',
                'Depurar versiones',
                'Definir permisos',
                'Indexar',
                'Responder con evidencia',
                'Auditar',
            ],
        ],
    ],
    [
        'key' => 'casos-uso-rag-empresa',
        'order' => 40,
        'eyebrow' => 'Evidencia operativa',
        'title' => 'Casos de uso empresariales concretos',
        'markdown' => implode("\n\n", [
            'La evidencia más útil para decidir no son las demos, sino los resultados operativos. En la muestra revisada, RAG y sus variantes ya muestran impacto en banca, automoción, salud, inteligencia, cumplimiento y research automation.',
            $caseTable,
        ]),
        'extra' => [
            'layout' => 'case_table',
        ],
    ],
    [
        'key' => 'sintesis-gobernanza',
        'order' => 50,
        'eyebrow' => '',
        'title' => '',
        'markdown' => '',
        'extra' => [
            'layout' => 'insight_split',
            'columns' => [
                [
                    'eyebrow' => 'Síntesis operativa',
                    'title' => 'La lectura transversal',
                    'markdown' => implode("\n\n", [
                        'La primera ola de valor aparece en knowledge access, customer support, document QA, compliance y research workflows.',
                        'Los resultados medibles más frecuentes son reducción de tiempo, más precisión, más cobertura operativa y menor dependencia de expertos humanos para búsquedas repetitivas.',
                        'Los casos que más justifican GraphRAG son aquellos donde la semántica sola no basta: citas legales, trazabilidad contractual, causalidad de incidentes, jerarquías organizativas o relaciones entre eventos.',
                    ]),
                ],
                [
                    'eyebrow' => 'Gobernanza',
                    'title' => 'Gobernanza antes de tecnología.',
                    'markdown' => implode("\n\n", [
                        'Por eso, la gestión documental gobernada no debe partir por la tecnología, sino por una pregunta operativa: ¿qué decisiones queremos asistir con evidencia confiable?',
                        'Desde ahí se definen las fuentes autorizadas, los permisos, la vigencia documental, los criterios de calidad, la trazabilidad de respuestas y los límites de uso de la IA.',
                        'El objetivo no es reemplazar el criterio profesional. Es reducir la fricción documental, acelerar la búsqueda de evidencia y permitir que las personas decidan mejor, con menos ruido y más trazabilidad.',
                    ]),
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
            'source' => 'app/Controllers/ContentController.php::documentManagement',
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

    echo 'OK gestion-documental layout objects cargada' . PHP_EOL;
    echo 'Secciones activas: ' . count($sections) . PHP_EOL;
} catch (Throwable $exception) {
    $pdo->rollBack();
    throw $exception;
}
