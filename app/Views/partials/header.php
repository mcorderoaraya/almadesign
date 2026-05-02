<?php
declare(strict_types=1);
?>
<header class="site-header">
    <a class="brand" href="<?= e(url('/')) ?>" aria-label="Ir al inicio">
        <span class="brand-mark">AD</span>
        <span class="brand-text">
            <span>AlmaDesign</span>
            <small>AI for humans</small>
        </span>
    </a>
    <nav class="site-nav" aria-label="Navegación principal">
        <a href="<?= e(url('/')) ?>">Inicio</a>
        <a href="<?= e(url('/apogeo-lux')) ?>">Apogeo Lux</a>
        <a href="<?= e(url('/contacto')) ?>">Contacto</a>
    </nav>
</header>
