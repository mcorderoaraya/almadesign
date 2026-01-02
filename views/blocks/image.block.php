<?php
/**
 * Image Block
 *
 * @var array $data
 */

$src = $data['src'] ?? null;
$alt = $data['alt'] ?? '';

if (!$src) return;
?>

<section class="max-w-7xl mx-auto px-4 py-12">
  <img src="<?= htmlspecialchars($src) ?>"
       alt="<?= htmlspecialchars($alt) ?>"
       class="w-full rounded-lg shadow-sm">
</section>