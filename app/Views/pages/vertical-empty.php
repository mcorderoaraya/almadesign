<?php
declare(strict_types=1);

$eyebrow = isset($eyebrow) && is_string($eyebrow) ? $eyebrow : 'AlmaDesign';
$heading = isset($heading) && is_string($heading) ? $heading : $eyebrow;
?>
<main class="vertical-empty-page" aria-labelledby="vertical-empty-title">
    <section class="vertical-empty-hero">
        <div class="vertical-empty-hero__inner">
            <p class="eyebrow"><?= e($eyebrow) ?></p>
            <h1 id="vertical-empty-title" class="o-heading"><?= e($heading) ?></h1>
        </div>
    </section>
</main>
