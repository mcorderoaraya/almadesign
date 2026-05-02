<?php
declare(strict_types=1);
?>
<!doctype html>
<html lang="es">
<?php require BASE_PATH . '/app/Views/partials/head.php'; ?>
<body>
    <a class="skip-link" href="#main">Saltar al contenido principal</a>
    <?php require BASE_PATH . '/app/Views/partials/header.php'; ?>

    <main class="site-main" id="main">
        <?= $content ?>
    </main>

    <?php require BASE_PATH . '/app/Views/partials/footer.php'; ?>
    <script src="<?= e(asset('js/app.js')) ?>" defer></script>
</body>
</html>
