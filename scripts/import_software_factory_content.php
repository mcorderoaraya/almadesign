<?php
declare(strict_types=1);

/*
 * Archivo: import_software_factory_content.php
 * Path: scripts/import_software_factory_content.php
 * Ambiente: local|produccion
 * Fecha de creacion: 2026-07-13
 * Explicacion tecnica: importa Software Factory hacia PostgreSQL usando objetos layout reutilizables.
 */

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/app/Core/Env.php';
require BASE_PATH . '/app/Services/Database.php';

App\Core\Env::load(BASE_PATH . '/.env');
$config = require BASE_PATH . '/config/app.php';
$pdo = App\Services\Database::pdo($config);

$page = [
    'slug' => 'software-factory',
    'title' => 'Software Factory | AlmaDesign',
    'meta_description' => 'Construimos sistemas a medida para organizaciones que necesitan aplicaciones robustas, integraciones confiables y datos bien gobernados.',
];

$sections = [
    [
        'key' => 'software-factory',
        'order' => 10,
        'eyebrow' => 'Software Factory',
        'title' => 'Software Factory',
        'markdown' => 'Construimos sistemas a medida para organizaciones que necesitan aplicaciones robustas, integraciones confiables y datos bien gobernados.',
        'extra' => [
            'layout' => 'hero_vertical',
            'background_image' => 'img/cards/software-factory-hero-v1.webp',
            'primary_label' => 'Conversar sobre Software Factory',
            'primary_href' => '/contacto?producto=software-factory',
            'secondary_label' => 'Volver al Home',
            'secondary_href' => '/',
        ],
    ],
    [
        'key' => 'patron-software-factory',
        'order' => 20,
        'eyebrow' => '',
        'title' => '',
        'markdown' => '',
        'extra' => [
            'layout' => 'assistant_feature',
            'aria_label' => 'Patrón de diseño de Software Factory',
            'left' => [
                'anchor' => 'patron-diseno-software',
                'eyebrow' => 'Patrón de diseño',
                'title' => 'La IA no reemplaza la arquitectura de software.',
                'body' => [
                    'La IA acelera y ordena la aplicación de buenas prácticas que ya existen.',
                    'Los patrones clásicos siguen siendo la base: requerimientos, análisis funcional, arquitectura, orientación a objetos coherente, separación de responsabilidades, patrones de diseño, documentación técnica, QA, feedback con cliente, entregas incrementales y mantenimiento.',
                ],
            ],
            'right' => [
                'anchor' => 'ia-asistente-tecnico',
                'eyebrow' => 'IA asistiva',
                'title' => 'La IA entra como asistente técnico, no como arquitecto soberano.',
                'body' => [
                    'Su rol es ordenar requerimientos, detectar inconsistencias, evitar duplicación de clases, sugerir patrones adecuados, mantener coherencia entre módulos, generar código base, revisar smells, crear tests, actualizar documentación y preparar entregables técnicos.',
                    'Pero siempre bajo arquitectura humana.',
                ],
            ],
        ],
    ],
    [
        'key' => 'codigo-defendible-asistido-ia',
        'order' => 30,
        'eyebrow' => 'Código defendible',
        'title' => 'Arquitectura clásica + IA asistiva + código defendible.',
        'markdown' => 'En AlmaDesign usamos IA para acelerar la construcción de sistemas, pero siempre sobre fundamentos clásicos de ingeniería: arquitectura clara, orientación a objetos coherente, patrones de diseño, documentación técnica, feedback del cliente, código limpio y QA exigente.',
        'extra' => [
            'layout' => 'rag_comparison',
            'comparison_label' => 'Principios de construcción y riesgos de deuda técnica',
            'decision_label' => 'Criterios de calidad de Software Factory',
            'flow_label' => 'Flujo de construcción de software asistido por IA',
            'columns' => [
                [
                    'label' => 'Fundamentos',
                    'title' => 'El oficio técnico sigue siendo la base.',
                    'markdown' => implode("\n", [
                        'La IA puede ayudar a producir más rápido, pero el sistema debe nacer desde un brief claro, una arquitectura defendible y decisiones técnicas coherentes.',
                        '',
                        '- Brief del cliente y análisis funcional.',
                        '- Arquitectura, capas y responsabilidades claras.',
                        '- Patrones del lenguaje y orientación a objetos coherente.',
                        '- Documentación técnica, feedback, QA y mantenimiento.',
                    ]),
                ],
                [
                    'label' => 'Riesgos',
                    'title' => 'IA rápida + sin arquitectura = deuda técnica acelerada.',
                    'markdown' => implode("\n", [
                        'La IA puede generar mucho código, pero si no hay criterio puede duplicar lógica, inventar clases innecesarias, mezclar responsabilidades, romper capas e introducir dependencias difíciles de defender.',
                        '',
                        '- Código que pasa visualmente, pero falla en QA real.',
                        '- Módulos difíciles de mantener o escalar.',
                        '- Dependencias mal elegidas y responsabilidades mezcladas.',
                        '- Entregas rápidas que encarecen el producto después.',
                    ]),
                ],
            ],
            'decision_rows' => [
                ['¿Se entiende?', 'El código, la arquitectura y los módulos pueden ser explicados por otro equipo técnico.'],
                ['¿Se mantiene?', 'Las responsabilidades están separadas y los cambios no rompen capas innecesariamente.'],
                ['¿Se prueba?', 'El sistema incorpora QA interno, pruebas y revisión antes de entrega.'],
                ['¿Se escala?', 'Las decisiones técnicas permiten crecimiento, integración y mantenimiento.'],
                ['¿Cumple el brief?', 'La solución responde al problema del cliente, no solo a una generación rápida de código.'],
            ],
            'flow' => ['Brief', 'Análisis', 'Arquitectura', 'Desarrollo IA', 'QA', 'Entrega'],
        ],
    ],
    [
        'key' => 'sintesis-software-factory',
        'order' => 40,
        'eyebrow' => '',
        'title' => '',
        'markdown' => '',
        'extra' => [
            'layout' => 'assistant_feature',
            'aria_label' => 'Síntesis técnica de Software Factory',
            'is_insight' => true,
            'left' => [
                'anchor' => 'principio-tecnico-almadesign',
                'eyebrow' => 'Principio técnico',
                'title' => 'No usamos IA para improvisar software.',
                'body' => [
                    'Usamos IA para construir mejor, más rápido y con más control sobre bases sólidas de ingeniería.',
                    'Todo sistema debe nacer desde el brief, pasar por arquitectura, respetar los patrones del lenguaje, mantener código limpio, recibir feedback del cliente y superar QA interno y externo.',
                ],
            ],
            'right' => [
                'anchor' => 'oficio-amplificado',
                'eyebrow' => 'Oficio',
                'title' => 'La IA no reemplaza el oficio.',
                'body' => [
                    'Lo amplifica cuando existe arquitectura, criterio y responsabilidad humana.',
                    'El resultado esperado no es solo más velocidad: es software que se entiende, se mantiene, se prueba, se escala y se puede defender ante otro equipo técnico.',
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
            'source' => 'app/Controllers/ContentController.php::softwareFactory',
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

    echo 'OK software-factory layout objects cargada' . PHP_EOL;
    echo 'Secciones activas: ' . count($sections) . PHP_EOL;
} catch (Throwable $exception) {
    $pdo->rollBack();
    throw $exception;
}
