<?php declare(strict_types=1); ?>
<section class="dashboard-shell" aria-labelledby="dashboard-title">
    <?php require BASE_PATH . '/app/Views/admin/_nav.php'; ?>
    <header class="dashboard-header">
        <p class="eyebrow">Dashboard AlmaDesign</p>
        <h1 id="dashboard-title">Gestión de contenidos.</h1>
        <p>Sesión protegida con contraseña y verificación en dos pasos.</p>
    </header>
    <div class="dashboard-grid">
        <article class="dashboard-card">
            <span>Páginas</span>
            <strong><?= e((string) ($stats['pages'] ?? 0)) ?></strong>
        </article>
        <article class="dashboard-card">
            <span>Secciones</span>
            <strong><?= e((string) ($stats['sections'] ?? 0)) ?></strong>
        </article>
        <article class="dashboard-card">
            <span>Markdown RAG</span>
            <strong><?= e((string) ($stats['rag_docs'] ?? 0)) ?></strong>
        </article>
    </div>

    <section class="dashboard-section" aria-labelledby="analytics-title">
        <header class="dashboard-header">
            <p class="eyebrow">Analítica propia</p>
            <h2 id="analytics-title">Visitas sin cookies ni identificación personal.</h2>
            <p>Conteo agregado por día, página, origen y campaña. No se guarda IP completa, user-agent completo ni historial individual.</p>
        </header>

        <div class="dashboard-grid dashboard-grid--analytics">
            <article class="dashboard-card">
                <span>Visitas hoy</span>
                <strong><?= e((string) ($analytics['today'] ?? 0)) ?></strong>
            </article>
            <article class="dashboard-card">
                <span>Últimos 30 días</span>
                <strong><?= e((string) ($analytics['last_30_days'] ?? 0)) ?></strong>
            </article>
            <article class="dashboard-card">
                <span>Privacidad</span>
                <strong>0</strong>
                <span>cookies analíticas</span>
            </article>
        </div>

        <div class="dashboard-analytics-grid">
            <article class="dashboard-card">
                <h2>Páginas más visitadas</h2>
                <?php foreach (($analytics['top_pages'] ?? []) as $row): ?>
                    <div class="dashboard-row">
                        <div>
                            <strong><?= e((string) ($row['label'] ?? '')) ?></strong>
                            <span><?= e((string) ($row['visits'] ?? 0)) ?> visitas</span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </article>

            <article class="dashboard-card">
                <h2>Origen</h2>
                <?php foreach (($analytics['top_referrers'] ?? []) as $row): ?>
                    <div class="dashboard-row">
                        <div>
                            <strong><?= e((string) ($row['label'] ?? '')) ?></strong>
                            <span><?= e((string) ($row['visits'] ?? 0)) ?> visitas</span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </article>

            <article class="dashboard-card">
                <h2>Campañas UTM</h2>
                <?php if (($analytics['top_campaigns'] ?? []) === []): ?>
                    <p class="dashboard-muted">Sin campañas registradas todavía.</p>
                <?php endif; ?>
                <?php foreach (($analytics['top_campaigns'] ?? []) as $row): ?>
                    <div class="dashboard-row">
                        <div>
                            <strong><?= e((string) ($row['label'] ?? '')) ?></strong>
                            <span><?= e((string) ($row['visits'] ?? 0)) ?> visitas</span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </article>

            <article class="dashboard-card">
                <h2>Preguntas frecuentes al RAG</h2>
                <?php if (($analytics['top_rag_questions'] ?? []) === []): ?>
                    <p class="dashboard-muted">Sin preguntas registradas todavía.</p>
                <?php endif; ?>
                <?php foreach (($analytics['top_rag_questions'] ?? []) as $row): ?>
                    <div class="dashboard-row">
                        <div>
                            <strong><?= e((string) ($row['label'] ?? '')) ?></strong>
                            <span><?= e((string) ($row['visits'] ?? 0)) ?> consultas</span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </article>
        </div>
    </section>
</section>
