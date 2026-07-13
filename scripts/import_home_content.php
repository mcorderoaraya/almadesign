<?php
declare(strict_types=1);

/*
 * Archivo: import_home_content.php
 * Path: scripts/import_home_content.php
 * Ambiente: local|produccion
 * Fecha de creacion: 2026-07-13
 * Explicacion tecnica: importa el contenido aprobado del index hacia PostgreSQL para que la portada pueda renderizar desde base de datos con fallback PHP.
 */

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/app/Core/Env.php';
require BASE_PATH . '/app/Services/Database.php';

App\Core\Env::load(BASE_PATH . '/.env');
$config = require BASE_PATH . '/config/app.php';
$pdo = App\Services\Database::pdo($config);

$page = [
    'slug' => 'home',
    'title' => 'AlmaDesign | Charlas, software a medida y asistentes IA',
    'meta_description' => 'AlmaDesign crea charlas, gestión documental, asistentes personales 24/7, software a medida y soluciones de orquestación con IA para ordenar procesos y decisiones.',
];

$sections = [
    [
        'key' => 'hero',
        'order' => 10,
        'eyebrow' => 'Charlas · conocimiento aumentado · decisiones humanas',
        'title' => 'Potencia tus ideas y expande tus horizontes con inteligencia artificial.',
        'markdown' => 'AlmaDesign diseña, ordena y gobierna sistemas de información, procesos e inteligencia aplicada para que las organizaciones decidan con más claridad, trazabilidad y criterio humano.',
    ],
    [
        'key' => 'productos',
        'order' => 20,
        'eyebrow' => 'Propósito',
        'title' => 'Productos para ampliar capacidades humanas, ordenar conocimiento y decidir con más claridad.',
        'markdown' => implode("\n\n", [
            'Muchas personas y organizaciones sienten que deben adoptar IA rápido, aunque todavía no tengan claro cómo usarla para pensar mejor, decidir mejor o trabajar con menos ruido.',
            'AlmaDesign trabaja justo ahí: creando experiencias y productos que acercan la IA al criterio humano, al contexto y a decisiones que se puedan explicar.',
        ]),
    ],
    [
        'key' => 'asistente-247',
        'order' => 30,
        'eyebrow' => 'Asistente Personal 24/7',
        'title' => 'Asistencia personal',
        'markdown' => 'Un asistente personal gestionado por AlmaDesign para ordenar tu agenda, tareas, reuniones, ideas y comunicaciones diarias. Desde app web, móvil e interacción voz a voz, te ayuda a preparar reuniones, gestionar calendario, redactar correos, registrar acuerdos y dar seguimiento continuo a lo importante.',
    ],
    [
        'key' => 'pilares',
        'order' => 40,
        'eyebrow' => 'AI for Humans',
        'title' => 'IA que acompaña, no que intimida.',
        'markdown' => 'Si la respuesta es no, hay que detenerse. La eficiencia importa, pero no debe justificar pérdida de criterio, presión permanente, vigilancia invisible o decisiones que nadie puede explicar.',
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
                'source' => 'app/Views/pages/home.php',
                'layout' => 'home-approved',
            ], JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE),
        ]);
    }

    $pdo->commit();

    echo 'OK home cargada' . PHP_EOL;
    echo 'Secciones activas: ' . count($sections) . PHP_EOL;
} catch (Throwable $exception) {
    $pdo->rollBack();
    throw $exception;
}
