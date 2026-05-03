<?php
declare(strict_types=1);

$siteName = $config['name'] ?? 'AlmaDesign';
$pageTitle = $title ?? $siteName;
$metaDescription = $metaDescription ?? 'AlmaDesign: AI for humans.';
$ogTitle = $ogTitle ?? $pageTitle;
$ogDescription = $ogDescription ?? $metaDescription;
$ogType = $ogType ?? 'website';
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#111826">
    <meta name="description" content="<?= e($metaDescription) ?>">
    <meta property="og:site_name" content="<?= e($siteName) ?>">
    <meta property="og:title" content="<?= e($ogTitle) ?>">
    <meta property="og:description" content="<?= e($ogDescription) ?>">
    <meta property="og:type" content="<?= e($ogType) ?>">
    <title><?= e($pageTitle) ?></title>
    <link rel="stylesheet" href="<?= e(asset('css/app.css')) ?>">
</head>
