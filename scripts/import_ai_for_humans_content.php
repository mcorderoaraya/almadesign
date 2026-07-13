<?php
declare(strict_types=1);

/*
 * Archivo: import_ai_for_humans_content.php
 * Path: scripts/import_ai_for_humans_content.php
 * Ambiente: local|produccion
 * Fecha de creacion: 2026-07-13
 * Explicacion tecnica: importa el manifiesto AI for Humans hacia PostgreSQL para validar render publico desde base de datos.
 */

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/app/Core/Env.php';
require BASE_PATH . '/app/Services/Database.php';

App\Core\Env::load(BASE_PATH . '/.env');
$config = require BASE_PATH . '/config/app.php';
$pdo = App\Services\Database::pdo($config);

$page = [
    'slug' => 'ai-for-humans',
    'title' => 'AI for Humans | Manifiesto público de AlmaDesign',
    'meta_description' => 'AI for Humans es el manifiesto público de AlmaDesign: inteligencia artificial gobernada para proteger, potenciar y no reemplazar al humano.',
];

$sections = [
    [
        'key' => 'manifiesto',
        'order' => 10,
        'eyebrow' => 'Manifiesto de AlmaDesign',
        'title' => 'AI for Humans',
        'markdown' => implode("\n\n", [
            'La inteligencia artificial no debe reemplazar el criterio humano, sino ampliar nuestra capacidad para decidir mejor, trabajar con más claridad y construir organizaciones más justas, eficientes y responsables.',
            'AI for Humans es un llamado a empresas, instituciones y gobiernos a adoptar la inteligencia artificial con propósito: ordenando procesos, protegiendo datos, reduciendo fricciones y manteniendo siempre a las personas en el centro de cada decisión.',
            'No todo debe automatizarse. No todo puede delegarse. La tecnología debe estar al servicio de quienes trabajan, gobiernan, cuidan, educan, emprenden y toman decisiones que afectan la vida de otros.',
            'Construyamos una IA útil, verificable y humana. Una IA con arquitectura, gobernanza mínima viable, evidencia y responsabilidad. Una IA que no borre al ser humano del proceso, sino que lo ayude a pensar, crear y actuar mejor.',
        ]),
    ],
    [
        'key' => 'ai-for-humans',
        'order' => 20,
        'eyebrow' => 'AI for Humans',
        'title' => 'La IA debe estar al servicio del ser humano.',
        'markdown' => 'AI for Humans es la postura fundacional de AlmaDesign: la tecnología solo tiene sentido cuando amplía la capacidad humana de crear, comprender, decidir y vivir con mayor dignidad.',
    ],
    [
        'key' => 'tecnologia-correcta',
        'order' => 30,
        'eyebrow' => '',
        'title' => 'La tecnología correcta devuelve capacidad.',
        'markdown' => 'Muchas personas no dejan de crear, aprender o avanzar por falta de talento, sino por falta de instrumentos, medios u oportunidades. La IA bien gobernada puede restituir acceso, lenguaje, claridad y herramientas.',
    ],
    [
        'key' => 'humano-al-centro',
        'order' => 40,
        'eyebrow' => '',
        'title' => 'La IA no debe ocupar el centro.',
        'markdown' => 'El centro sigue siendo humano: imaginación, interpretación, error, aprendizaje, cuidado, decisión y responsabilidad. Antes de automatizar hay que comprender; antes de escalar, gobernar; antes de delegar, definir límites.',
    ],
    [
        'key' => 'proteger',
        'order' => 50,
        'eyebrow' => '',
        'title' => 'Proteger es la primera obligación.',
        'markdown' => 'Una IA humana no debe invadir, vigilar, extraer datos sin control ni exigir productividad permanente. Debe respetar privacidad, tiempo, descanso, foco, dignidad, criterio profesional y salud mental.',
    ],
    [
        'key' => 'potenciar',
        'order' => 60,
        'eyebrow' => '',
        'title' => 'Potenciar no es explotar más.',
        'markdown' => 'Potenciar significa entregar mejores instrumentos para pensar, crear, ordenar información, decidir y liberar energía hacia tareas con mayor sentido humano. La IA debe dar margen, no aumentar la presión.',
    ],
    [
        'key' => 'no-reemplazar',
        'order' => 70,
        'eyebrow' => '',
        'title' => 'No reemplazar es una frontera ética.',
        'markdown' => 'La IA puede asistir, sugerir, clasificar, redactar, resumir y conectar, pero no debe apropiarse de decisiones que requieren juicio, sensibilidad, experiencia, contexto y responsabilidad humana.',
    ],
    [
        'key' => 'gobernanza-antes-de-automatizacion',
        'order' => 80,
        'eyebrow' => '',
        'title' => 'Gobernanza antes de automatización',
        'markdown' => 'AI for Humans no es anti-tecnología ni una certificación externa: es una brújula de diseño. AlmaDesign se compromete a construir IA con propósito, límites, trazabilidad, supervisión humana y responsabilidad, para que la tecnología no borre el alma humana, sino que la ayude a desarrollarse.',
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
            'extra_json' => json_encode([
                'source' => 'app/Controllers/ContentController.php::aiForHumans',
            ], JSON_THROW_ON_ERROR),
        ]);
    }

    $pdo->commit();

    echo 'OK ai-for-humans cargada' . PHP_EOL;
    echo 'Secciones activas: ' . count($sections) . PHP_EOL;
} catch (Throwable $exception) {
    $pdo->rollBack();
    throw $exception;
}
