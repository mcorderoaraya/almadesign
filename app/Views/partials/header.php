<?php
declare(strict_types=1);

$currentPath = (string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$currentPath = '/' . trim($currentPath, '/');
$currentPath = $currentPath === '/' ? '/' : rtrim($currentPath, '/');

$headerClass = 'site-header' . ($currentPath === '/ai-for-humans' ? ' site-header--ai-for-humans' : '');
$brandLogo = $currentPath === '/ai-for-humans'
    ? 'img/logos/logo_azul_horizontal_2.svg'
    : 'img/logos/logo_crema_horizontal.svg';
?>
<header class="<?= e($headerClass) ?>">
    <a class="brand" href="<?= e(url('/')) ?>" aria-label="Ir al inicio">
        <img class="brand-logo" src="<?= e(asset($brandLogo)) ?>" alt="AlmaDesign" width="196" height="86">
    </a>
    <button class="menu-toggle" type="button" aria-label="Abrir menú principal" aria-expanded="false" aria-controls="site-nav">
        <span></span>
        <span></span>
        <span></span>
    </button>
    <nav class="site-nav" id="site-nav" aria-label="Navegación principal">
        <a class="<?= $currentPath === '/' ? 'is-active' : '' ?>" href="<?= e(url('/')) ?>"<?= $currentPath === '/' ? ' aria-current="page"' : '' ?>>Inicio</a>
        <a class="<?= $currentPath === '/consultoria-ia-procesos' ? 'is-active' : '' ?>" href="<?= e(url('/consultoria-ia-procesos')) ?>"<?= $currentPath === '/consultoria-ia-procesos' ? ' aria-current="page"' : '' ?>>Consultoría</a>
        <a class="<?= $currentPath === '/apogeo' ? 'is-active' : '' ?>" href="<?= e(url('/apogeo')) ?>"<?= $currentPath === '/apogeo' ? ' aria-current="page"' : '' ?>>Apogeo</a>
        <a class="<?= $currentPath === '/ai-for-humans' ? 'is-active' : '' ?>" href="<?= e(url('/ai-for-humans')) ?>"<?= $currentPath === '/ai-for-humans' ? ' aria-current="page"' : '' ?>>AI for Humans</a>
        <a class="nav-cta" href="/contacto">Conversemos</a>
    </nav>
</header>
