<?php
declare(strict_types=1);
?>
<!doctype html>
<html lang="es">
<?php require BASE_PATH . '/app/Views/partials/head.php'; ?>
<body>
    <?php require BASE_PATH . '/app/Views/partials/header.php'; ?>

    <main class="site-main">
        <?= $content ?>
    </main>

    <?php require BASE_PATH . '/app/Views/partials/footer.php'; ?>
    <script src="<?= e(asset('js/app.js')) ?>" defer></script>
</body>
</html>
