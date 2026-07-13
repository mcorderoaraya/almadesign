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
                </select>
            </label>
        </div>
        <label>Título<input name="title" required></label>
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
                    <span><?= e((string) $document['filename']) ?> · <?= e((string) $document['status']) ?></span>
                </div>
            </article>
        <?php endforeach; ?>
    </section>
</section>
