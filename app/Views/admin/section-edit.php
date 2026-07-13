<?php declare(strict_types=1); ?>
<?php $sectionId = isset($section['id']) ? (int) $section['id'] : 0; ?>
<?php $pageId = isset($page['id']) ? (int) $page['id'] : (int) ($section['page_id'] ?? 0); ?>
<section class="dashboard-shell" aria-labelledby="dashboard-section-edit-title">
    <?php require BASE_PATH . '/app/Views/admin/_nav.php'; ?>
    <header class="dashboard-header">
        <p class="eyebrow">Contenido</p>
        <h1 id="dashboard-section-edit-title"><?= $sectionId > 0 ? 'Editar sección.' : 'Nueva sección.' ?></h1>
        <p><?= e((string) ($page['title'] ?? '')) ?></p>
    </header>
    <form class="dashboard-form dashboard-form--wide" method="post" action="<?= e(url('/dashboard/sections/save')) ?>">
        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
        <input type="hidden" name="id" value="<?= e((string) $sectionId) ?>">
        <input type="hidden" name="page_id" value="<?= e((string) $pageId) ?>">
        <div class="dashboard-form__grid">
            <label>Clave<input name="section_key" value="<?= e((string) ($section['section_key'] ?? 'seccion')) ?>" required></label>
            <label>Orden<input type="number" name="sort_order" value="<?= e((string) ($section['sort_order'] ?? 100)) ?>"></label>
        </div>
        <label>Eyebrow<input name="eyebrow" value="<?= e((string) ($section['eyebrow'] ?? '')) ?>"></label>
        <label>Título<input name="title" value="<?= e((string) ($section['title'] ?? '')) ?>"></label>
        <label>Markdown<textarea name="body_markdown" rows="14"><?= e((string) ($section['body_markdown'] ?? '')) ?></textarea></label>
        <label class="dashboard-check"><input type="checkbox" name="is_active" value="1" <?= (($section['is_active'] ?? true) ? 'checked' : '') ?>> Activa</label>
        <div class="dashboard-actions">
            <button class="button button-primary" type="submit">Guardar sección</button>
            <a class="button button-secondary" href="<?= e(url('/dashboard/pages/edit?id=' . $pageId)) ?>">Volver</a>
        </div>
    </form>
    <?php if ($sectionId > 0): ?>
        <form method="post" action="<?= e(url('/dashboard/sections/delete')) ?>" onsubmit="return confirm('¿Borrar esta sección?');">
            <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
            <input type="hidden" name="id" value="<?= e((string) $sectionId) ?>">
            <input type="hidden" name="page_id" value="<?= e((string) $pageId) ?>">
            <button class="dashboard-danger" type="submit">Borrar sección</button>
        </form>
    <?php endif; ?>
</section>
