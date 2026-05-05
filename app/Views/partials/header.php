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
?>
<header class="site-header">
    <a class="brand" href="<?= e(url('/')) ?>" aria-label="Ir al inicio">
        <img class="brand-logo" src="<?= e(asset('img/logos/logo_crema_horizontal.svg')) ?>" alt="AlmaDesign" width="196" height="86">
    </a>
    <nav class="site-nav" aria-label="Navegación principal">
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
