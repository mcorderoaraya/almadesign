<?php
/** @var string $pageTitle */
/** @var string $pageDescription */
/** @var string $contentView */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require __DIR__ . '/../partials/head.php'; ?>
</head>
<body class="bg-background text-foreground">

  <?php require __DIR__ . '/../partials/header.php'; ?>

  <main id="main-content" class="min-h-screen">
    <?php require $contentView; ?>
  </main>

  <?php require __DIR__ . '/../partials/footer.php'; ?>

</body>
</html>