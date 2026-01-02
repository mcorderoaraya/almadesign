<?php
/**
 * Block Renderer
 *
 * @param array $blocks
 *
 * [ES] Renderiza bloques definidos por backend.
 * [ES] NO define contenido ni layout.
 * [ES] SOLO mapea type → archivo de bloque.
 */

if (!isset($blocks) || !is_array($blocks)) {
    return;
}

foreach ($blocks as $block) {

    if (!isset($block['type'], $block['data'])) {
        continue; // contrato roto, se ignora
    }

    $blockFile = __DIR__ . '/../blocks/' . $block['type'] . '.block.php';

    if (file_exists($blockFile)) {
        $data = $block['data'];
        require $blockFile;
    }
}