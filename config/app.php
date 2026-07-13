<?php
declare(strict_types=1);

return [
    'name' => 'AlmaDesign',
    'locale' => 'es_CL',
    'url' => 'http://localhost:8088',
    'database_url' => App\Core\Env::get('SITE_DATABASE_URL'),
    'admin' => [
        'session_key' => 'almadesign_admin_user_id',
        'remember_2fa_key' => 'almadesign_admin_2fa_verified',
    ],
    'rag_markdown_path' => App\Core\Env::get(
        'RAG_DOCS_MARKDOWN_PATH',
        '/home/mauricio/workspace/rack-core-rag-semantic/docs_markdown'
    ),
];
