<?php
declare(strict_types=1);

/*
 * Archivo: seed_site_content.php
 * Path: scripts/seed_site_content.php
 * Ambiente: local|produccion
 * Fecha de creacion: 2026-07-12
 * Explicacion tecnica: carga una base editorial inicial del sitio AlmaDesign en PostgreSQL sin modificar el render publico actual.
 */

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/app/Core/Env.php';
require BASE_PATH . '/app/Services/Database.php';

App\Core\Env::load(BASE_PATH . '/.env');
$config = require BASE_PATH . '/config/app.php';
$pdo = App\Services\Database::pdo($config);

/**
 * @return list<array{
 *     slug: string,
 *     title: string,
 *     meta_description: string,
 *     status: string,
 *     sections: list<array{key: string, order: int, eyebrow: string, title: string, markdown: string}>
 * }>
 */
function seedPages(): array
{
    return [
        [
            'slug' => 'home',
            'title' => 'AlmaDesign | Charlas, software a medida y asistentes IA',
            'meta_description' => 'AlmaDesign crea charlas, gestion documental, asistentes personales 24/7, software a medida y soluciones de orquestacion con IA para ordenar procesos y decisiones.',
            'status' => 'published',
            'sections' => [
                [
                    'key' => 'hero',
                    'order' => 10,
                    'eyebrow' => 'Charlas · conocimiento aumentado · decisiones humanas',
                    'title' => 'Potencia tus ideas y expande tus horizontes con inteligencia artificial.',
                    'markdown' => "AlmaDesign disena, ordena y gobierna sistemas de informacion, procesos e inteligencia aplicada para que las organizaciones decidan con mas claridad, trazabilidad y criterio humano.\n\n**Principio:** primero las personas. Despues la automatizacion.",
                ],
                [
                    'key' => 'productos',
                    'order' => 20,
                    'eyebrow' => 'Productos',
                    'title' => 'Productos para ampliar capacidades humanas.',
                    'markdown' => "- Charlas AI for Humans\n- Gestion Documental\n- Orquestacion con Asistentes IA\n- Asistente Personal 24/7\n- Software Factory\n\nCada linea busca reducir ruido, ordenar conocimiento y sostener decisiones con mejor contexto.",
                ],
                [
                    'key' => 'asistente-247',
                    'order' => 30,
                    'eyebrow' => 'Asistente Personal 24/7',
                    'title' => 'Asistencia personal gestionada por AlmaDesign.',
                    'markdown' => "Un asistente personal para ordenar agenda, tareas, reuniones, ideas y comunicaciones diarias.\n\nIncluye app web y movil, interaccion voz a voz, calendario, recordatorios, preparacion de reuniones, redaccion asistida de emails, bitacoras y flujos personalizados.",
                ],
                [
                    'key' => 'pilares',
                    'order' => 40,
                    'eyebrow' => 'Criterio AlmaDesign',
                    'title' => 'Calma, claridad, control humano y confianza.',
                    'markdown' => "La inteligencia artificial debe estar al servicio de la vida humana: protegerla, potenciarla y respetar su integridad mental, fisica y etica.",
                ],
            ],
        ],
        [
            'slug' => 'consultoria-ia-procesos',
            'title' => 'Consultoria de inteligencia artificial y procesos | AlmaDesign',
            'meta_description' => 'Consultoria IA para empresas que necesitan ordenar procesos, diagnosticar fricciones internas e implementar inteligencia artificial con gobernanza y trazabilidad.',
            'status' => 'published',
            'sections' => [
                [
                    'key' => 'hero',
                    'order' => 10,
                    'eyebrow' => 'Consultoria IA y procesos',
                    'title' => 'Consultoria de inteligencia artificial y procesos para empresas.',
                    'markdown' => 'Antes de automatizar, ordenamos procesos, fricciones, criterios y responsabilidades. AlmaDesign ayuda a identificar donde la IA puede aportar valor real y como implementarla con trazabilidad, gobernanza y control humano.',
                ],
                [
                    'key' => 'enfoque-almadesign',
                    'order' => 20,
                    'eyebrow' => 'Enfoque',
                    'title' => 'No partimos por la herramienta.',
                    'markdown' => "- Diagnostico de fricciones internas\n- Levantamiento de procesos reales\n- Priorizacion de casos de uso\n- Diseno de limites explicitos y criterios humanos\n- Roadmap de implementacion\n- Acompanamiento en adopcion responsable",
                ],
                [
                    'key' => 'que-se-entrega',
                    'order' => 30,
                    'eyebrow' => 'Entregables',
                    'title' => 'Claridad accionable para decidir.',
                    'markdown' => "- Mapa de procesos y fricciones\n- Priorizacion de oportunidades IA\n- Riesgos y limites explicitos\n- Recomendaciones de implementacion\n- Roadmap tecnico-operativo\n- Criterios de adopcion y supervision humana",
                ],
                [
                    'key' => 'limites',
                    'order' => 40,
                    'eyebrow' => 'Gobernanza',
                    'title' => 'Limites explicitos de comunicacion.',
                    'markdown' => "No se promete automatizacion sin validacion humana. No se prometen diagnosticos profundos gratuitos. No se prometen reducciones de costo sin evidencia ni evaluacion.",
                ],
            ],
        ],
        [
            'slug' => 'gestion-documental',
            'title' => 'Gestion Documental | AlmaDesign',
            'meta_description' => 'Gestion documental para ordenar documentos, conversaciones y antecedentes criticos con IA, trazabilidad y criterios humanos.',
            'status' => 'published',
            'sections' => [
                [
                    'key' => 'hero',
                    'order' => 10,
                    'eyebrow' => 'Gestion Documental',
                    'title' => 'Ordenar conocimiento antes de automatizarlo.',
                    'markdown' => 'AlmaDesign ayuda a transformar documentos, conversaciones y antecedentes dispersos en una base consultable, trazable y gobernada.',
                ],
                [
                    'key' => 'problema',
                    'order' => 20,
                    'eyebrow' => 'Problema',
                    'title' => 'La informacion existe, pero no siempre esta disponible para decidir.',
                    'markdown' => "Muchas organizaciones pierden tiempo buscando versiones, correos, adjuntos, acuerdos o antecedentes que sostienen decisiones importantes.\n\nLa gestion documental reduce esa friccion y permite consultar conocimiento con mejor contexto.",
                ],
                [
                    'key' => 'capacidades',
                    'order' => 30,
                    'eyebrow' => 'Capacidades',
                    'title' => 'Base documental consultable y verificable.',
                    'markdown' => "- Organizacion de documentos y metadatos\n- Preparacion para busqueda semantica\n- Trazabilidad de fuentes\n- Criterios de vigencia y version\n- Recuperacion de contexto para RAG\n- Control humano sobre informacion critica",
                ],
            ],
        ],
        [
            'slug' => 'orquestacion-asistentes-ia',
            'title' => 'Orquestacion con Asistentes IA | AlmaDesign',
            'meta_description' => 'Asistentes, automatizaciones y aplicaciones a medida para resolver fricciones empresariales y conectar procesos con criterio operativo.',
            'status' => 'published',
            'sections' => [
                [
                    'key' => 'hero',
                    'order' => 10,
                    'eyebrow' => 'Orquestacion IA',
                    'title' => 'Asistentes y automatizaciones con criterio operativo.',
                    'markdown' => 'Disenamos asistentes, automatizaciones y aplicaciones a medida para resolver fricciones empresariales, conectar procesos y mantener supervision humana sobre decisiones relevantes.',
                ],
                [
                    'key' => 'capacidades',
                    'order' => 20,
                    'eyebrow' => 'Capacidades',
                    'title' => 'Automatizacion conectada a procesos reales.',
                    'markdown' => "- Asistentes conversacionales\n- Flujos de trabajo asistidos\n- Integraciones con sistemas existentes\n- Automatizacion de tareas repetitivas\n- Registro de acuerdos y seguimiento\n- Escalamiento a personas cuando corresponde",
                ],
                [
                    'key' => 'criterio',
                    'order' => 30,
                    'eyebrow' => 'Gobernanza',
                    'title' => 'La IA asiste; la responsabilidad permanece humana.',
                    'markdown' => 'Cada asistente debe tener limites, criterios de uso, datos autorizados, trazabilidad y una ruta clara para escalar excepciones.',
                ],
            ],
        ],
        [
            'slug' => 'software-factory',
            'title' => 'Software Factory | AlmaDesign',
            'meta_description' => 'Desarrollo de sistemas a medida, aplicaciones web y moviles, APIs, integraciones y soluciones robustas con datos bien gobernados.',
            'status' => 'published',
            'sections' => [
                [
                    'key' => 'hero',
                    'order' => 10,
                    'eyebrow' => 'Software Factory',
                    'title' => 'Sistemas a medida para organizaciones que necesitan robustez.',
                    'markdown' => 'Construimos sistemas a medida para organizaciones que necesitan aplicaciones robustas, integraciones confiables y datos bien gobernados.',
                ],
                [
                    'key' => 'capacidades',
                    'order' => 20,
                    'eyebrow' => 'Capacidades',
                    'title' => 'Desarrollo, integraciones y datos.',
                    'markdown' => "- Aplicaciones web y moviles\n- APIs e integraciones\n- Conectores REST y WebServices\n- Bases de datos SQLite, MySQL, PostgreSQL y Oracle\n- Python, Java Enterprise y Next.js\n- QA funcional y arquitectura mantenible",
                ],
                [
                    'key' => 'metodo',
                    'order' => 30,
                    'eyebrow' => 'Metodo',
                    'title' => 'Desarrollo asistido por IA, pero revisado por criterio humano.',
                    'markdown' => 'El proceso considera analisis funcional, arquitectura, seleccion tecnologica, patrones de diseno, desarrollo asistido por IA, revision de coherencia, QA interno, feedback del cliente y entrega defendible.',
                ],
            ],
        ],
        [
            'slug' => 'apogeo',
            'title' => 'Apogeo | Conocimiento aumentado y documentacion verificable',
            'meta_description' => 'Apogeo transforma informacion critica, dispersa y cambiante en conocimiento consultable, trazable y verificable para decisiones gerenciales mejor informadas.',
            'status' => 'published',
            'sections' => [
                [
                    'key' => 'hero',
                    'order' => 10,
                    'eyebrow' => 'Apogeo',
                    'title' => 'Conocimiento aumentado y decisiones mejor informadas.',
                    'markdown' => 'Apogeo transforma informacion critica, dispersa y cambiante en conocimiento consultable, trazable y verificable.',
                ],
                [
                    'key' => 'arquitecturas',
                    'order' => 20,
                    'eyebrow' => 'Arquitecturas Apogeo',
                    'title' => 'RAG, GraphRAG y RAGK.',
                    'markdown' => "- **RAG:** recuperacion contextual de informacion relevante.\n- **GraphRAG:** relaciones entre conceptos, documentos, eventos y entidades.\n- **RAGK:** recuperacion, conocimiento conectado, trazabilidad y flujo gobernado.",
                ],
                [
                    'key' => 'capacidades',
                    'order' => 30,
                    'eyebrow' => 'Capacidades gerenciales',
                    'title' => 'Informacion critica como base gobernada.',
                    'markdown' => "- Recuperacion contextual\n- Conocimiento conectado\n- Busqueda inteligente empresarial\n- Mensajeria segura entre partes\n- Orquestacion de informacion\n- Documentacion verificable\n- Trazabilidad documental",
                ],
            ],
        ],
        [
            'slug' => 'ai-for-humans',
            'title' => 'AI for Humans | AlmaDesign',
            'meta_description' => 'Manifiesto AlmaDesign para una inteligencia artificial al servicio de las personas, la claridad, el criterio y la dignidad humana.',
            'status' => 'published',
            'sections' => [
                [
                    'key' => 'hero',
                    'order' => 10,
                    'eyebrow' => 'AI for Humans',
                    'title' => 'IA que protege, potencia y no reemplaza.',
                    'markdown' => 'AlmaDesign nace de una conviccion: la tecnologia correcta no reemplaza el alma humana; le devuelve instrumentos para crear, decidir y desarrollarse.',
                ],
                [
                    'key' => 'principios',
                    'order' => 20,
                    'eyebrow' => 'Manifiesto',
                    'title' => 'Primero las personas.',
                    'markdown' => "- La IA debe ampliar capacidades humanas.\n- La decision critica debe mantener responsable humano.\n- La tecnologia debe explicar, no oscurecer.\n- La automatizacion debe tener limites.\n- El conocimiento debe ser trazable y revisable.",
                ],
                [
                    'key' => 'firma',
                    'order' => 30,
                    'eyebrow' => 'Firma fundacional',
                    'title' => 'Mauricio Cordero Araya, fundador de AlmaDesign.',
                    'markdown' => 'AlmaDesign trabaja para que la inteligencia artificial acompane a las personas con calma, claridad, control humano y confianza.',
                ],
            ],
        ],
        [
            'slug' => 'charlas-ai-for-humans',
            'title' => 'Charlas AI for Humans | AlmaDesign',
            'meta_description' => 'Charlas de inteligencia artificial para usuarios, equipos, gerencias y organizaciones que necesitan adoptar IA con criterio humano.',
            'status' => 'published',
            'sections' => [
                [
                    'key' => 'hero',
                    'order' => 10,
                    'eyebrow' => 'Charlas AI for Humans',
                    'title' => 'Charlas para pensar mejor con inteligencia artificial.',
                    'markdown' => 'Charlas para ampliar capacidades humanas con herramientas basadas en IA: pensar mejor, decidir con mas contexto y usar tecnologia sin perder criterio.',
                ],
                [
                    'key' => 'audiencias',
                    'order' => 20,
                    'eyebrow' => 'Audiencias',
                    'title' => 'Usuarios, equipos y gerencias.',
                    'markdown' => "- Usuarios, empleados o publico general\n- Grupos de toma de decision empresarial\n- Gerentes TI y equipos directivos\n- Organizaciones que necesitan claridad antes de adoptar IA",
                ],
                [
                    'key' => 'objetivo',
                    'order' => 30,
                    'eyebrow' => 'Objetivo',
                    'title' => 'Adopcion responsable y comprensible.',
                    'markdown' => 'Las charlas buscan reducir miedo y ruido, explicar usos reales, abrir preguntas relevantes y proteger el criterio humano en la adopcion de IA.',
                ],
            ],
        ],
        [
            'slug' => 'politica-almadesign',
            'title' => 'Politica AlmaDesign | IA para humanos',
            'meta_description' => 'Politica de AlmaDesign sobre proteccion de datos personales, consentimiento, sistemas RAG e inteligencia artificial responsable.',
            'status' => 'published',
            'sections' => [
                [
                    'key' => 'hero',
                    'order' => 10,
                    'eyebrow' => 'Politica AlmaDesign',
                    'title' => 'Proteccion de datos, consentimiento e IA responsable.',
                    'markdown' => 'AlmaDesign declara una politica de uso responsable de informacion, proteccion de datos personales, consentimiento, transparencia y limites humanos en sistemas con IA.',
                ],
                [
                    'key' => 'datos-personales',
                    'order' => 20,
                    'eyebrow' => 'Datos personales',
                    'title' => 'Tratamiento limitado y con proposito.',
                    'markdown' => 'Los datos entregados por usuarios se usan para responder solicitudes, gestionar contacto comercial autorizado y mejorar la atencion dentro de limites declarados.',
                ],
                [
                    'key' => 'rag-ia',
                    'order' => 30,
                    'eyebrow' => 'RAG e IA',
                    'title' => 'Uso de contexto recuperado y control humano.',
                    'markdown' => 'Los sistemas RAG deben responder con informacion recuperada desde fuentes autorizadas. Cuando no existe evidencia suficiente, el sistema debe decirlo claramente.',
                ],
                [
                    'key' => 'contacto',
                    'order' => 40,
                    'eyebrow' => 'Contacto',
                    'title' => 'Canal de contacto.',
                    'markdown' => 'Las consultas sobre datos, contacto comercial o solicitudes relacionadas con AlmaDesign deben canalizarse mediante los formularios y medios oficiales del sitio.',
                ],
            ],
        ],
        [
            'slug' => 'apogeo-lux',
            'title' => 'Apogeo Lux | Consulta juridica confiable y arquitectura GraphRAG | AlmaDesign',
            'meta_description' => 'Apogeo Lux es la vision de AlmaDesign para una solucion de consulta juridica confiable sobre normas, leyes chilenas, jurisprudencia, fuentes verificables y trazabilidad avanzada.',
            'status' => 'published',
            'sections' => [
                [
                    'key' => 'hero',
                    'order' => 10,
                    'eyebrow' => 'Apogeo Lux',
                    'title' => 'Consulta juridica confiable con trazabilidad avanzada.',
                    'markdown' => 'Apogeo Lux es la vision de AlmaDesign para reunir consulta normativa, relaciones entre fuentes, contexto juridico, trazabilidad, jurisprudencia y criterio humano en una arquitectura GraphRAG gobernada.',
                ],
                [
                    'key' => 'proposito',
                    'order' => 20,
                    'eyebrow' => 'Proposito',
                    'title' => 'Conocimiento juridico consultable y verificable.',
                    'markdown' => 'El objetivo es ayudar a revisar normas, leyes chilenas, jurisprudencia y fuentes verificables sin reemplazar el criterio juridico profesional.',
                ],
                [
                    'key' => 'limites',
                    'order' => 30,
                    'eyebrow' => 'Limites',
                    'title' => 'No reemplaza asesoria juridica.',
                    'markdown' => 'Apogeo Lux debe tratarse como sistema de apoyo documental y analitico. Las decisiones juridicas relevantes requieren revision humana experta.',
                ],
            ],
        ],
    ];
}

$pageStatement = $pdo->prepare(
    'INSERT INTO site_pages (slug, title, meta_description, status)
     VALUES (:slug, :title, :meta_description, :status)
     ON CONFLICT (slug) DO UPDATE SET
        title = EXCLUDED.title,
        meta_description = EXCLUDED.meta_description,
        status = EXCLUDED.status,
        updated_at = NOW()
     RETURNING id'
);

$sectionStatement = $pdo->prepare(
    'INSERT INTO site_page_sections
        (page_id, sort_order, section_key, eyebrow, title, body_markdown, extra_json, is_active)
     VALUES
        (:page_id, :sort_order, :section_key, :eyebrow, :title, :body_markdown, :extra_json, TRUE)
     ON CONFLICT (page_id, section_key) DO UPDATE SET
        sort_order = EXCLUDED.sort_order,
        eyebrow = EXCLUDED.eyebrow,
        title = EXCLUDED.title,
        body_markdown = EXCLUDED.body_markdown,
        extra_json = EXCLUDED.extra_json,
        is_active = TRUE,
        updated_at = NOW()'
);

$pdo->beginTransaction();

try {
    $pageCount = 0;
    $sectionCount = 0;

    foreach (seedPages() as $page) {
        $pageStatement->execute([
            'slug' => $page['slug'],
            'title' => $page['title'],
            'meta_description' => $page['meta_description'],
            'status' => $page['status'],
        ]);
        $pageId = (int) $pageStatement->fetchColumn();
        $pageCount++;

        foreach ($page['sections'] as $section) {
            $sectionStatement->execute([
                'page_id' => $pageId,
                'sort_order' => $section['order'],
                'section_key' => $section['key'],
                'eyebrow' => $section['eyebrow'],
                'title' => $section['title'],
                'body_markdown' => $section['markdown'],
                'extra_json' => json_encode([
                    'seeded_by' => 'scripts/seed_site_content.php',
                    'source' => 'current_php_site_content_summary',
                ], JSON_THROW_ON_ERROR),
            ]);
            $sectionCount++;
        }
    }

    $pdo->commit();

    echo 'OK seed_site_content.php' . PHP_EOL;
    echo 'Paginas cargadas/actualizadas: ' . $pageCount . PHP_EOL;
    echo 'Secciones cargadas/actualizadas: ' . $sectionCount . PHP_EOL;
} catch (Throwable $exception) {
    $pdo->rollBack();
    throw $exception;
}
