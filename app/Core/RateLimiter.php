<?php
declare(strict_types=1);

namespace App\Core;

final class RateLimiter
{
    public static function allow(string $key, int $maxAttempts, int $windowSeconds): bool
    {
        $now = time();
        $_SESSION['rate_limits'] ??= [];
        $_SESSION['rate_limits'][$key] ??= [];

        $attempts = array_filter(
            $_SESSION['rate_limits'][$key],
            static fn (int $timestamp): bool => $timestamp > ($now - $windowSeconds)
        );

        if (count($attempts) >= $maxAttempts) {
            $_SESSION['rate_limits'][$key] = array_values($attempts);
            return false;
        }

        $attempts[] = $now;
        $_SESSION['rate_limits'][$key] = array_values($attempts);

        return true;
    }
}
