<?php
declare(strict_types=1);

use App\Core\Markdown;

/** @var array<string, mixed> $page */
/** @var array<int, array<string, mixed>> $sections */

$decode = static function (array $section): array {
    $json = json_decode((string) ($section['extra_json'] ?? '{}'), true);
    return is_array($json) ? $json : [];
};

$hero = null;
$products = [];
$details = [];

foreach ($sections as $section) {
    $extra = $decode($section);
    $type = (string) ($extra['type'] ?? '');

    if ($type === 'hero') {
        $hero = $section;
        continue;
    }

    if ($type === 'product') {
        $products[] = [$section, $extra];
        continue;
    }

    if ($type === 'detail') {
        $details[] = [$section, $extra];
    }
}
?>
<!-- content-source:postgresql -->
<div class="talks-page alma-content-page" aria-labelledby="talks-title">
    <?php if ($hero !== null): ?>
        <section class="home-third home-third--verticals alma-content-hero talks-hero talks-hero--background">
            <div class="home-third__inner talks-hero__inner">
                <div class="talks-hero__copy">
                    <?php if ((string) $hero['eyebrow'] !== ''): ?>
                        <p class="eyebrow"><?= e((string) $hero['eyebrow']) ?></p>
                    <?php endif; ?>
                    <h1 id="talks-title" class="o-heading"><?= e((string) $hero['title']) ?></h1>
                    <div class="talks-hero__intro">
                        <?= Markdown::safeBasic((string) $hero['body_markdown']) ?>
                    </div>
                    <div class="hero-actions">
                        <a class="button button-primary" href="<?= e(url('/contacto?producto=charlas')) ?>">Solicitar una charla</a>
                        <a class="button button-secondary" href="<?= e(url('/ai-for-humans')) ?>">Leer manifiesto</a>
                        <a class="button button-primary" href="<?= e(url('/politica-almadesign')) ?>">Políticas de AlmaDesign</a>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($products !== []): ?>
        <section class="home-third home-third--verticals alma-content-section talks-products" aria-labelledby="talks-products-title">
            <div class="home-third__inner">
                <div class="verticals-section talks-products__inner">
                    <div class="talks-products__heading">
                        <p class="eyebrow">Productos</p>
                        <h2 id="talks-products-title">Tres formas de abrir la conversación.</h2>
                    </div>

                    <div class="talks-product-grid">
                        <?php foreach ($products as [$section, $extra]): ?>
                            <article class="talks-product-card">
                                <span class="talks-product-card__number"><?= e((string) ($extra['number'] ?? '')) ?></span>
                                <h3><?= e((string) $section['title']) ?></h3>
                                <p class="talks-product-card__subtitle"><?= e((string) $section['eyebrow']) ?></p>
                                <?= Markdown::safeBasic((string) $section['body_markdown']) ?>
                                <a class="talks-product-card__cta" href="<?= e(url('/contacto?producto=' . (string) ($extra['product_slug'] ?? 'charlas'))) ?>">Solicitar</a>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php foreach ($details as [$section, $extra]): ?>
        <section class="talks-detail alma-content-section" id="<?= e((string) $section['section_key']) ?>" aria-labelledby="<?= e((string) $section['section_key']) ?>-title">
            <div class="talks-detail__inner">
                <div class="talks-detail__intro">
                    <p class="eyebrow"><?= e((string) ($extra['number_label'] ?? $section['eyebrow'])) ?></p>
                    <h2 id="<?= e((string) $section['section_key']) ?>-title"><?= e((string) $section['title']) ?></h2>
                    <?php if (($extra['subtitle'] ?? '') !== ''): ?>
                        <p><?= e((string) $extra['subtitle']) ?></p>
                    <?php endif; ?>
                </div>

                <div class="talks-detail__content">
                    <div class="talks-detail__body">
                        <?= Markdown::safeBasic((string) $section['body_markdown']) ?>
                    </div>

                    <aside class="talks-detail__aside" aria-label="<?= e((string) $section['title']) ?>">
                        <?php if (isset($extra['topics']) && is_array($extra['topics'])): ?>
                            <div>
                                <h3>Temas principales</h3>
                                <ul>
                                    <?php foreach ($extra['topics'] as $topic): ?>
                                        <li><?= e((string) $topic) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <?php if (($extra['audience'] ?? '') !== ''): ?>
                            <div>
                                <h3>Dirigida a</h3>
                                <p><?= e((string) $extra['audience']) ?></p>
                            </div>
                        <?php endif; ?>

                        <?php if (($extra['expected_result'] ?? '') !== ''): ?>
                            <div>
                                <h3>Resultado esperado</h3>
                                <p><?= e((string) $extra['expected_result']) ?></p>
                            </div>
                        <?php endif; ?>
                    </aside>
                </div>
            </div>
        </section>
    <?php endforeach; ?>
</div>
