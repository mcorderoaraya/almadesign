<?php declare(strict_types=1); ?>
<nav class="dashboard-nav" aria-label="Navegación dashboard">
    <a href="<?= e(url('/dashboard')) ?>">Resumen</a>
    <a href="<?= e(url('/dashboard/pages')) ?>">Páginas</a>
    <a href="<?= e(url('/dashboard/rag-markdown')) ?>">Markdown RAG</a>
    <form method="post" action="<?= e(url('/dashboard/logout')) ?>">
        <input type="hidden" name="csrf_token" value="<?= e($csrfToken ?? '') ?>">
        <button type="submit">Salir</button>
    </form>
</nav>
