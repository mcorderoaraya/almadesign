<?php
declare(strict_types=1);
?>
<header class="site-header">
    <a class="brand" href="<?= e(url('/')) ?>" aria-label="Ir al inicio">
        <img class="brand-logo" src="<?= e(asset('img/logo_horizontal_naranja.svg')) ?>" alt="AlmaDesign" width="196" height="44">
    </a>
    <nav class="site-nav" aria-label="Navegación principal">
        <a href="<?= e(url('/')) ?>">Inicio</a>
        <a href="<?= e(url('/consultoria-ia-procesos')) ?>">Consultoría</a>
        <a href="<?= e(url('/apogeo')) ?>">Apogeo</a>
        <a href="<?= e(url('/ai-for-humans')) ?>">AI for Humans</a>
        <a href="<?= e(url('/contacto')) ?>">Contacto</a>
        <a class="nav-cta" href="<?= e(url('/contacto')) ?>">Conversemos</a>
    </nav>
</header>
