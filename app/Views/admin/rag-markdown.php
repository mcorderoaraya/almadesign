<?php declare(strict_types=1); ?>
<?php $draft = is_array($learningDraft ?? null) ? $learningDraft : []; ?>
<section class="dashboard-shell" aria-labelledby="dashboard-rag-title">
    <?php require BASE_PATH . '/app/Views/admin/_nav.php'; ?>
    <header class="dashboard-header">
        <p class="eyebrow">RAG</p>
        <h1 id="dashboard-rag-title">Agregar Markdown al RAG.</h1>
        <p>Guarda el documento en la carpeta configurada. La ingesta vectorial se ejecuta después desde el RAG.</p>
    </header>
    <form class="dashboard-form dashboard-form--wide" method="post" action="<?= e(url('/dashboard/rag-markdown/save')) ?>">
        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
        <div class="dashboard-form__grid">
            <label>Slug<input name="slug" value="<?= e((string) ($draft['slug'] ?? '')) ?>" required></label>
            <label>Estado
                <select name="status">
                    <?php foreach (['draft', 'published', 'archived'] as $status): ?>
                        <option value="<?= e($status) ?>" <?= (($draft['status'] ?? 'draft') === $status) ? 'selected' : '' ?>><?= e($status) ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <label>Tipo de contenido
                <select name="content_type">
                    <?php foreach ([
                        'reference' => 'Referencia general',
                        'legal_reference' => 'Referencia legal',
                        'policy_note' => 'Nota de política',
                        'product_context' => 'Contexto de producto',
                        'operational_note' => 'Nota operativa',
                    ] as $type => $label): ?>
                        <option value="<?= e($type) ?>" <?= (($draft['content_type'] ?? 'reference') === $type) ? 'selected' : '' ?>><?= e($label) ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <label>Visibilidad
                <select name="visibility">
                    <?php foreach ([
                        'rag_only' => 'Solo RAG',
                        'linked' => 'Vinculado a página',
                        'public' => 'Público',
                        'internal' => 'Interno',
                    ] as $visibility => $label): ?>
                        <option value="<?= e($visibility) ?>" <?= (($draft['visibility'] ?? 'rag_only') === $visibility) ? 'selected' : '' ?>><?= e($label) ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>
        <label>Título<input name="title" value="<?= e((string) ($draft['title'] ?? '')) ?>" required></label>
        <label>Slug relacionado<input name="parent_slug" value="<?= e((string) ($draft['parent_slug'] ?? '')) ?>" placeholder="politica-almadesign"></label>
        <label>Source URL<input name="source_url" value="<?= e((string) ($draft['source_url'] ?? 'https://almadesign.cl/')) ?>" required></label>
        <label>Markdown<textarea name="content_markdown" rows="16" required><?= e((string) ($draft['content_markdown'] ?? '')) ?></textarea></label>
        <button class="button button-primary" type="submit">Guardar Markdown</button>
    </form>
    <section class="dashboard-card">
        <h2>Documentos registrados</h2>
        <?php foreach ($documents as $document): ?>
            <article class="dashboard-row">
                <div>
                    <strong><?= e((string) $document['title']) ?></strong>
                    <span>
                        <?= e((string) $document['filename']) ?> ·
                        <?= e((string) $document['status']) ?> ·
                        <?= e((string) ($document['content_type'] ?? 'reference')) ?> ·
                        <?= e((string) ($document['visibility'] ?? 'rag_only')) ?>
                        <?php if (!empty($document['parent_slug'])): ?>
                            · relacionado: <?= e((string) $document['parent_slug']) ?>
                        <?php endif; ?>
                    </span>
                </div>
            </article>
        <?php endforeach; ?>
    </section>
</section>
