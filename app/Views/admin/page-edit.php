<?php declare(strict_types=1); ?>
<?php $pageId = isset($page['id']) ? (int) $page['id'] : 0; ?>
<section class="dashboard-shell" aria-labelledby="dashboard-page-edit-title">
    <?php require BASE_PATH . '/app/Views/admin/_nav.php'; ?>
    <header class="dashboard-header">
        <p class="eyebrow">Contenido</p>
        <h1 id="dashboard-page-edit-title"><?= $pageId > 0 ? 'Editar página.' : 'Nueva página.' ?></h1>
    </header>
    <form class="dashboard-form dashboard-form--wide" method="post" action="<?= e(url('/dashboard/pages/save')) ?>">
        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
        <input type="hidden" name="id" value="<?= e((string) $pageId) ?>">
        <div class="dashboard-form__grid">
            <label>Slug<input name="slug" value="<?= e((string) ($page['slug'] ?? '')) ?>" required></label>
            <label>Estado
                <select name="status">
                    <?php foreach (['draft', 'published', 'archived'] as $status): ?>
                        <option value="<?= e($status) ?>" <?= (($page['status'] ?? 'draft') === $status) ? 'selected' : '' ?>><?= e($status) ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>
        <label>Título<input name="title" value="<?= e((string) ($page['title'] ?? '')) ?>" required></label>
        <label>Meta descripción<textarea name="meta_description" rows="3"><?= e((string) ($page['meta_description'] ?? '')) ?></textarea></label>
        <div class="dashboard-actions">
            <button class="button button-primary" type="submit">Guardar página</button>
            <a class="button button-secondary" href="<?= e(url('/dashboard/pages')) ?>">Volver</a>
        </div>
    </form>

    <?php if ($pageId > 0): ?>
        <section class="dashboard-card">
            <div class="dashboard-header dashboard-header--row">
                <h2>Secciones</h2>
                <a href="<?= e(url('/dashboard/sections/edit?page_id=' . $pageId)) ?>">Nueva sección</a>
            </div>
            <?php foreach ($sections as $section): ?>
                <article class="dashboard-row">
                    <div>
                        <strong><?= e((string) $section['title']) ?></strong>
                        <span><?= e((string) $section['section_key']) ?> · orden <?= e((string) $section['sort_order']) ?></span>
                    </div>
                    <a href="<?= e(url('/dashboard/sections/edit?page_id=' . $pageId . '&id=' . (int) $section['id'])) ?>">Editar</a>
                </article>
            <?php endforeach; ?>
        </section>
        <form method="post" action="<?= e(url('/dashboard/pages/delete')) ?>" onsubmit="return confirm('¿Borrar esta página y sus secciones?');">
            <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
            <input type="hidden" name="id" value="<?= e((string) $pageId) ?>">
            <button class="dashboard-danger" type="submit">Borrar página</button>
        </form>
    <?php endif; ?>
</section>
