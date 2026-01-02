<?php
/**
 * Text Block
 *
 * @var array $data
 */

$title = $data['title'] ?? null;
$content = $data['content'] ?? null;

if (!$content) return;
?>

<section class="max-w-7xl mx-auto px-4 py-12">
  <?php if ($title): ?>
    <h2 class="text-2xl font-semibold mb-4"><?= htmlspecialchars($title) ?></h2>
  <?php endif; ?>

  <p class="text-muted-foreground max-w-3xl">
    <?= nl2br(htmlspecialchars($content)) ?>
  </p>
</section>