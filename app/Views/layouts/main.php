<?php
declare(strict_types=1);
?>
<!doctype html>
<html lang="es">
<?php require BASE_PATH . '/app/Views/partials/head.php'; ?>
<body<?= isset($bodyClass) && is_string($bodyClass) && $bodyClass !== '' ? ' class="' . e($bodyClass) . '"' : '' ?>>
    <a class="skip-link" href="#main">Saltar al contenido principal</a>
    <?php require BASE_PATH . '/app/Views/partials/header.php'; ?>

    <main class="site-main" id="main">
        <?= $content ?>
        <?php if (($showFinalCta ?? true) === true): ?>
            <?php require BASE_PATH . '/app/Views/partials/final-cta.php'; ?>
        <?php endif; ?>
    </main>

    <?php if (($showFooter ?? true) === true): ?>
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
