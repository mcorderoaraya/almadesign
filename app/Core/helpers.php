<?php
declare(strict_types=1);

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function url(string $path = '/'): string
{
    $path = '/' . ltrim($path, '/');

    return $path === '//' ? '/' : $path;
}

function asset(string $path): string
{
    return '/assets/' . ltrim($path, '/');
}
