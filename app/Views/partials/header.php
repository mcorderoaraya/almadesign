<?php
declare(strict_types=1);

$currentPath = (string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$currentPath = '/' . trim($currentPath, '/');
$currentPath = $currentPath === '/' ? '/' : rtrim($currentPath, '/');

$headerClass = 'site-header' . ($currentPath === '/ai-for-humans' ? ' site-header--ai-for-humans' : '');
$brandLogo = 'img/logos/logo_alma_vintage.svg';
$brandLogoScrolled = 'img/logos/logo_a_sola_vintage.svg';
?>
<header class="<?= e($headerClass) ?>">
    <a class="brand" href="<?= e(url('/')) ?>" aria-label="Ir al inicio">
        <img
            class="brand-logo"
            src="<?= e(asset($brandLogo)) ?>"
            data-default-src="<?= e(asset($brandLogo)) ?>"
            data-default-width="748"
            data-default-height="200"
            data-scrolled-src="<?= e(asset($brandLogoScrolled)) ?>"
            data-scrolled-width="207"
            data-scrolled-height="193"
            alt="AlmaDesign"
            width="748"
            height="200"
        >
    </a>
    <button class="menu-toggle" type="button" aria-label="Abrir menú principal" aria-expanded="false" aria-controls="site-nav">
        <img src="<?= e(asset('img/icons/botonResponsivo.svg')) ?>" alt="" aria-hidden="true" width="24" height="24">
    </button>
    <nav class="site-nav" id="site-nav" aria-label="Navegación principal">
        <a class="<?= $currentPath === '/' ? 'is-active' : '' ?>" href="<?= e(url('/')) ?>"<?= $currentPath === '/' ? ' aria-current="page"' : '' ?>>Inicio</a>
        <a class="<?= $currentPath === '/consultoria-ia-procesos' ? 'is-active' : '' ?>" href="<?= e(url('/consultoria-ia-procesos')) ?>"<?= $currentPath === '/consultoria-ia-procesos' ? ' aria-current="page"' : '' ?>>Consultoría</a>
        <a class="<?= $currentPath === '/charlas-ai-for-humans' ? 'is-active' : '' ?>" href="<?= e(url('/charlas-ai-for-humans')) ?>"<?= $currentPath === '/charlas-ai-for-humans' ? ' aria-current="page"' : '' ?>>Charlas</a>
        <a class="<?= $currentPath === '/gestion-documental' ? 'is-active' : '' ?>" href="<?= e(url('/gestion-documental')) ?>"<?= $currentPath === '/gestion-documental' ? ' aria-current="page"' : '' ?>>Gestión Documental</a>
        <a class="<?= $currentPath === '/orquestacion-asistentes-ia' ? 'is-active' : '' ?>" href="<?= e(url('/orquestacion-asistentes-ia')) ?>"<?= $currentPath === '/orquestacion-asistentes-ia' ? ' aria-current="page"' : '' ?>>Orquestación IA</a>
        <a class="<?= $currentPath === '/software-factory' ? 'is-active' : '' ?>" href="<?= e(url('/software-factory')) ?>"<?= $currentPath === '/software-factory' ? ' aria-current="page"' : '' ?>>Software Factory</a>
        <a class="<?= $currentPath === '/ai-for-humans' ? 'is-active' : '' ?>" href="<?= e(url('/ai-for-humans')) ?>"<?= $currentPath === '/ai-for-humans' ? ' aria-current="page"' : '' ?>>AI for Humans</a>
        <a class="nav-cta" href="/contacto">Conversemos</a>
    </nav>
</header>
