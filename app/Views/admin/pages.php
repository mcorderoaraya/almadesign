<?php declare(strict_types=1); ?>
<section class="dashboard-shell" aria-labelledby="dashboard-pages-title">
    <?php require BASE_PATH . '/app/Views/admin/_nav.php'; ?>
    <header class="dashboard-header dashboard-header--row">
        <div>
            <p class="eyebrow">Contenido</p>
            <h1 id="dashboard-pages-title">Páginas.</h1>
        </div>
        <a class="button button-primary" href="<?= e(url('/dashboard/pages/edit')) ?>">Nueva página</a>
    </header>
    <div class="dashboard-table" role="region" aria-label="Listado de páginas" tabindex="0">
        <table>
            <thead>
                <tr>
                    <th>Slug</th>
                    <th>Título</th>
                    <th>Estado</th>
                    <th>Secciones</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pages as $page): ?>
                    <tr>
                        <td><?= e((string) $page['slug']) ?></td>
                        <td><?= e((string) $page['title']) ?></td>
                        <td><?= e((string) $page['status']) ?></td>
                        <td><?= e((string) $page['section_count']) ?></td>
                        <td><a href="<?= e(url('/dashboard/pages/edit?id=' . (int) $page['id'])) ?>">Editar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
