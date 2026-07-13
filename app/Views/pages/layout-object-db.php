<?php
declare(strict_types=1);

use App\Core\LayoutObject;

/** @var array<string, mixed> $page */
/** @var array<int, array<string, mixed>> $sections */

$decode = static function (array $section): array {
    $json = json_decode((string) ($section['extra_json'] ?? '{}'), true);
    return is_array($json) ? $json : [];
};
?>
<!-- content-source:postgresql-layout-objects -->
<div class="alo-page">
    <?php foreach ($sections as $section): ?>
        <?php LayoutObject::render($section, $decode($section)); ?>
    <?php endforeach; ?>
</div>
