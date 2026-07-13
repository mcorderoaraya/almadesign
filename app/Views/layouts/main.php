<?php
declare(strict_types=1);

$layoutPath = (string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$layoutPath = '/' . trim($layoutPath, '/');
$layoutPath = $layoutPath === '/' ? '/' : rtrim($layoutPath, '/');
$layoutHasFooter = ($showFooter ?? true) === true;
$layoutIsContact = $layoutPath === '/contacto' || str_starts_with($layoutPath, '/contacto/');
$layoutIsDashboard = $layoutPath === '/dashboard' || str_starts_with($layoutPath, '/dashboard/');
$layoutShouldShowFinalCta = $layoutHasFooter && !$layoutIsContact && !$layoutIsDashboard;
?>
<!doctype html>
<html lang="es">
<?php require BASE_PATH . '/app/Views/partials/head.php'; ?>
<body<?= isset($bodyClass) && is_string($bodyClass) && $bodyClass !== '' ? ' class="' . e($bodyClass) . '"' : '' ?>>
    <a class="skip-link" href="#main">Saltar al contenido principal</a>
    <?php require BASE_PATH . '/app/Views/partials/header.php'; ?>

    <main class="site-main" id="main">
        <?= $content ?>
        <?php if ($layoutShouldShowFinalCta): ?>
            <?php require BASE_PATH . '/app/Views/partials/final-cta.php'; ?>
        <?php endif; ?>
    </main>

    <?php if ($layoutHasFooter): ?>
        <?php require BASE_PATH . '/app/Views/partials/footer.php'; ?>
    <?php endif; ?>
    <script src="<?= e(asset('js/app.js')) ?>" defer></script>
    <?php foreach (($pageScripts ?? []) as $pageScript): ?>
        <?php if (is_string($pageScript) && $pageScript !== ''): ?>
            <script src="<?= e(asset($pageScript)) ?>" defer></script>
        <?php endif; ?>
    <?php endforeach; ?>
</body>
</html>
