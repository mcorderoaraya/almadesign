<?php
declare(strict_types=1);

$currentPath = (string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$currentPath = '/' . trim($currentPath, '/');
$currentPath = $currentPath === '/' ? '/' : rtrim($currentPath, '/');

$navItems = [
    ['label' => 'Inicio', 'href' => url('/')],
    ['label' => 'Consultoría', 'href' => url('/consultoria-ia-procesos')],
    ['label' => 'Apogeo', 'href' => url('/apogeo')],
    ['label' => 'AI for Humans', 'href' => url('/ai-for-humans')],
];

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
        <?php foreach ($navItems as $navItem): ?>
            <?php $isActive = $currentPath === $navItem['href']; ?>
            <a
                class="<?= $isActive ? 'is-active' : '' ?>"
                href="<?= e($navItem['href']) ?>"
                <?= $isActive ? 'aria-current="page"' : '' ?>
            ><?= e($navItem['label']) ?></a>
        <?php endforeach; ?>
        <a class="nav-cta" href="/contacto">Conversemos</a>
    </nav>
</header>
