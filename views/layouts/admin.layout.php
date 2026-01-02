<?php
/** @var string $adminTitle */
/** @var string $contentView */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require __DIR__ . '/../partials/admin-head.php'; ?>
</head>
<body class="bg-background text-foreground min-h-screen">

  <?php require __DIR__ . '/../partials/admin-header.php'; ?>

  <div class="flex min-h-screen">

    <?php require __DIR__ . '/../partials/admin-sidebar.php'; ?>

    <main class="flex-1 p-8">
      <?php require $contentView; ?>
    </main>

  </div>

  <?php require __DIR__ . '/../partials/admin-footer.php'; ?>

</body>
</html>