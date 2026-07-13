<?php
declare(strict_types=1);

/** @var array<string, mixed> $section */
/** @var array<string, mixed> $extra */

$items = isset($extra['items']) && is_array($extra['items']) ? $extra['items'] : [];
?>
<section class="vertical-detail-content alma-section alma-content-section" id="<?= e((string) $section['section_key']) ?>" aria-label="<?= e((string) ($extra['aria_label'] ?? 'Contenido principal')) ?>">
    <?php foreach ($items as $item): ?>
        <?php if (is_array($item)): ?>
            <?php $sectionClass = 'vertical-detail-block' . (isset($item['class']) ? ' ' . (string) $item['class'] : ''); ?>
            <article class="<?= e($sectionClass) ?>"<?= isset($item['anchor']) ? ' id="' . e((string) $item['anchor']) . '"' : '' ?>>
                <h2><?= e((string) ($item['title'] ?? '')) ?></h2>
                <?php foreach ((array) ($item['body'] ?? []) as $bodyParagraph): ?>
                    <p><?= e((string) $bodyParagraph) ?></p>
                <?php endforeach; ?>
                <?php if (isset($item['items']) && is_array($item['items'])): ?>
                    <ul>
                        <?php foreach ($item['items'] as $detail): ?>
                            <li><?= e((string) $detail) ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <?php if (($item['quote'] ?? '') !== ''): ?>
                    <blockquote class="vertical-detail-quote">
                        <p><?= e((string) $item['quote']) ?></p>
                    </blockquote>
                <?php endif; ?>
                <?php if (isset($item['table']) && is_array($item['table'])): ?>
                    <div class="vertical-detail-table-wrap" role="region" aria-label="<?= e((string) ($item['title'] ?? 'Tabla')) ?>" tabindex="0">
                        <table class="vertical-detail-table">
                            <thead>
                                <tr>
                                    <?php foreach ((array) ($item['table']['headers'] ?? []) as $header): ?>
                                        <th scope="col"><?= e((string) $header) ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ((array) ($item['table']['rows'] ?? []) as $row): ?>
                                    <?php if (is_array($row)): ?>
                                        <tr>
                                            <?php foreach ($row as $cellIndex => $cell): ?>
                                                <?php if ($cellIndex === 0): ?>
                                                    <th scope="row"><?= e((string) $cell) ?></th>
                                                <?php else: ?>
                                                    <td><?= e((string) $cell) ?></td>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </article>
        <?php endif; ?>
    <?php endforeach; ?>
</section>
