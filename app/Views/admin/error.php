<?php declare(strict_types=1); ?>
<section class="dashboard-shell" aria-labelledby="dashboard-error-title">
    <div class="dashboard-card">
        <p class="eyebrow">Dashboard</p>
        <h1 id="dashboard-error-title">No disponible.</h1>
        <p><?= e($message ?? 'No pudimos cargar el dashboard.') ?></p>
        <p class="dashboard-muted">Revise SITE_DATABASE_URL, la migración PostgreSQL y la extensión PHP pdo_pgsql.</p>
    </div>
</section>
