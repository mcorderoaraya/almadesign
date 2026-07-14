<?php declare(strict_types=1); ?>
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
            <label>Slug<input name="slug" required></label>
            <label>Estado
                <select name="status">
                    <option value="draft">draft</option>
                    <option value="published">published</option>
                    <option value="archived">archived</option>
                </select>
            </label>
            <label>Tipo de contenido
                <select name="content_type">
                    <option value="reference">Referencia general</option>
                    <option value="legal_reference">Referencia legal</option>
                    <option value="policy_note">Nota de política</option>
                    <option value="product_context">Contexto de producto</option>
                    <option value="operational_note">Nota operativa</option>
                </select>
            </label>
            <label>Visibilidad
                <select name="visibility">
                    <option value="rag_only">Solo RAG</option>
                    <option value="linked">Vinculado a página</option>
                    <option value="public">Público</option>
                    <option value="internal">Interno</option>
                </select>
            </label>
        </div>
        <label>Título<input name="title" required></label>
        <label>Slug relacionado<input name="parent_slug" placeholder="politica-almadesign"></label>
        <label>Source URL<input name="source_url" value="https://almadesign.cl/" required></label>
        <label>Markdown<textarea name="content_markdown" rows="16" required></textarea></label>
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
