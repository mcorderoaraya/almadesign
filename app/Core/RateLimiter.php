<?php
declare(strict_types=1);

namespace App\Core;

// Limitador liviano para formularios y endpoints sensibles sin depender de servicios externos.
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

    public static function allowShared(string $key, int $maxAttempts, int $windowSeconds, string $storageDir): bool
    {
        $now = time();
        if (!is_dir($storageDir) && !mkdir($storageDir, 0755, true) && !is_dir($storageDir)) {
            return false;
        }

        $file = rtrim($storageDir, '/') . '/' . hash('sha256', $key) . '.json';
        $handle = fopen($file, 'c+');
        if ($handle === false) {
            return false;
        }

        try {
            if (!flock($handle, LOCK_EX)) {
                return false;
            }

            $contents = stream_get_contents($handle);
            $decoded = $contents !== false && $contents !== '' ? json_decode($contents, true) : [];
            $attempts = is_array($decoded) ? array_values(array_filter(
                $decoded,
                static fn (mixed $timestamp): bool => is_int($timestamp) && $timestamp > ($now - $windowSeconds)
            )) : [];

            if (count($attempts) >= $maxAttempts) {
                self::writeAttempts($handle, $attempts);
                return false;
            }

            $attempts[] = $now;
            self::writeAttempts($handle, $attempts);
            return true;
        } finally {
            flock($handle, LOCK_UN);
            fclose($handle);
        }
    }

    /**
     * @param list<int> $attempts
     * @param resource $handle
     */
    private static function writeAttempts($handle, array $attempts): void
    {
        ftruncate($handle, 0);
        rewind($handle);
        fwrite($handle, json_encode(array_values($attempts), JSON_THROW_ON_ERROR));
        fflush($handle);
    }
}
