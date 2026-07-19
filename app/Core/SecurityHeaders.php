<?php
declare(strict_types=1);

namespace App\Core;

final class SecurityHeaders
{
    private const HSTS = 'Strict-Transport-Security';
    private const CSP_REPORT_ONLY = 'Content-Security-Policy-Report-Only';

    public static function send(): void
    {
        if (headers_sent()) {
            return;
        }

        self::sendIfMissing('X-Content-Type-Options', 'nosniff');
        self::sendIfMissing('X-Frame-Options', 'SAMEORIGIN');
        self::sendIfMissing('Referrer-Policy', 'strict-origin-when-cross-origin');
        self::sendIfMissing('Permissions-Policy', 'geolocation=(), microphone=(), camera=()');
        self::sendIfMissing(self::CSP_REPORT_ONLY, self::cspReportOnly());

        if (self::isHttpsRequest()) {
            self::sendIfMissing(self::HSTS, 'max-age=31536000; includeSubDomains');
        }
    }

    private static function cspReportOnly(): string
    {
        return implode('; ', [
            "default-src 'self'",
            "base-uri 'self'",
            "object-src 'none'",
            "frame-ancestors 'self'",
            "form-action 'self'",
            "img-src 'self' data: https:",
            "font-src 'self' data: https:",
            "style-src 'self' 'unsafe-inline' https:",
            "script-src 'self' 'unsafe-inline' https:",
            "connect-src 'self' https:",
            'upgrade-insecure-requests',
        ]);
    }

    private static function isHttpsRequest(): bool
    {
        $https = strtolower((string) ($_SERVER['HTTPS'] ?? ''));
        if ($https !== '' && $https !== 'off') {
            return true;
        }

        $forwardedProto = strtolower((string) ($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? ''));
        if ($forwardedProto === 'https') {
            return true;
        }

        return (string) ($_SERVER['SERVER_PORT'] ?? '') === '443';
    }

    private static function sendIfMissing(string $name, string $value): void
    {
        if (self::hasHeader($name)) {
            return;
        }

        header($name . ': ' . $value);
    }

    private static function hasHeader(string $name): bool
    {
        $needle = strtolower($name) . ':';

        foreach (headers_list() as $header) {
            if (str_starts_with(strtolower($header), $needle)) {
                return true;
            }
        }

        return false;
    }
}
