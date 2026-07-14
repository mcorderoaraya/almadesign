<?php
declare(strict_types=1);

namespace App\Services;

use PDO;

// Analítica propia y agregada: no usa cookies, no guarda IP completa ni fingerprint del navegador.
final class AnalyticsService
{
    public function __construct(private readonly PDO $pdo)
    {
    }

    /**
     * @param array<string, mixed> $server
     * @param array<string, mixed> $query
     */
    public function recordVisit(array $server, array $query, int $statusCode): void
    {
        if ($statusCode >= 400 || !$this->shouldTrack($server)) {
            return;
        }

        $statement = $this->pdo->prepare(<<<'SQL'
            INSERT INTO site_analytics_daily
                (day, path, referrer_domain, utm_source, utm_campaign, device_type, visits_count)
            VALUES
                (CURRENT_DATE, :path, :referrer_domain, :utm_source, :utm_campaign, :device_type, 1)
            ON CONFLICT (day, path, referrer_domain, utm_source, utm_campaign, device_type)
            DO UPDATE SET
                visits_count = site_analytics_daily.visits_count + 1,
                updated_at = NOW()
        SQL);

        $statement->execute([
            'path' => $this->path((string) ($server['REQUEST_URI'] ?? '/')),
            'referrer_domain' => $this->referrerDomain((string) ($server['HTTP_REFERER'] ?? ''), (string) ($server['HTTP_HOST'] ?? '')),
            'utm_source' => $this->dimension((string) ($query['utm_source'] ?? '')),
            'utm_campaign' => $this->dimension((string) ($query['utm_campaign'] ?? '')),
            'device_type' => $this->deviceType((string) ($server['HTTP_USER_AGENT'] ?? '')),
        ]);
    }

    /**
     * @return array{today: int, last_30_days: int, top_pages: array<int, array<string, mixed>>, top_referrers: array<int, array<string, mixed>>, top_campaigns: array<int, array<string, mixed>>, top_rag_questions: array<int, array<string, mixed>>}
     */
    public function dashboardSummary(): array
    {
        return [
            'today' => $this->totalSince('CURRENT_DATE'),
            'last_30_days' => $this->totalSince("CURRENT_DATE - INTERVAL '29 days'"),
            'top_pages' => $this->top('path'),
            'top_referrers' => $this->top('referrer_domain'),
            'top_campaigns' => $this->topCampaigns(),
            'top_rag_questions' => $this->topRagQuestions(),
        ];
    }

    /**
     * Registra preguntas RAG de forma agregada y anonimizada. No guarda IP, sesión,
     * user-agent ni conversación completa.
     */
    public function recordRagQuestion(string $question, string $productSlug = '', string $conversationStage = ''): void
    {
        $normalizedQuestion = $this->normalizeQuestion($question);
        if ($normalizedQuestion === '') {
            return;
        }

        $statement = $this->pdo->prepare(<<<'SQL'
            INSERT INTO rag_question_analytics_daily
                (day, question_normalized, product_slug, conversation_stage, questions_count)
            VALUES
                (CURRENT_DATE, :question_normalized, :product_slug, :conversation_stage, 1)
            ON CONFLICT (day, question_normalized, product_slug, conversation_stage)
            DO UPDATE SET
                questions_count = rag_question_analytics_daily.questions_count + 1,
                updated_at = NOW()
        SQL);

        $statement->execute([
            'question_normalized' => $normalizedQuestion,
            'product_slug' => $this->dimension($productSlug),
            'conversation_stage' => $this->dimension($conversationStage),
        ]);
    }

    private function shouldTrack(array $server): bool
    {
        $method = strtoupper((string) ($server['REQUEST_METHOD'] ?? 'GET'));
        if ($method !== 'GET' && $method !== 'HEAD') {
            return false;
        }

        $path = $this->path((string) ($server['REQUEST_URI'] ?? '/'));
        if (str_starts_with($path, '/dashboard') || str_starts_with($path, '/contacto/rag')) {
            return false;
        }

        $userAgent = strtolower((string) ($server['HTTP_USER_AGENT'] ?? ''));
        if ($userAgent === '') {
            return true;
        }

        return preg_match('/bot|crawl|spider|slurp|preview|monitor|uptime|scanner/', $userAgent) !== 1;
    }

    private function path(string $requestUri): string
    {
        $path = (string) parse_url($requestUri, PHP_URL_PATH);
        $path = '/' . trim($path, '/');

        return $path === '/' ? '/' : rtrim($path, '/');
    }

    private function referrerDomain(string $referrer, string $host): string
    {
        $domain = strtolower((string) parse_url($referrer, PHP_URL_HOST));
        $domain = preg_replace('/^www\./', '', $domain) ?? $domain;
        $currentHost = strtolower(preg_replace('/^www\./', '', explode(':', $host)[0] ?? '') ?? '');

        if ($domain === '') {
            return 'direct';
        }

        if ($currentHost !== '' && $domain === $currentHost) {
            return 'internal';
        }

        return $this->dimension($domain);
    }

    private function dimension(string $value): string
    {
        $value = strtolower(trim($value));
        $value = preg_replace('/[^a-z0-9._-]+/', '-', $value) ?? '';
        $value = trim($value, '-._');

        return mb_substr($value, 0, 120);
    }

    private function deviceType(string $userAgent): string
    {
        $userAgent = strtolower($userAgent);
        if ($userAgent === '') {
            return 'unknown';
        }

        if (str_contains($userAgent, 'ipad') || str_contains($userAgent, 'tablet')) {
            return 'tablet';
        }

        if (str_contains($userAgent, 'mobile') || str_contains($userAgent, 'android') || str_contains($userAgent, 'iphone')) {
            return 'mobile';
        }

        return 'desktop';
    }

    private function totalSince(string $sqlStartDate): int
    {
        return (int) $this->pdo
            ->query("SELECT COALESCE(SUM(visits_count), 0) FROM site_analytics_daily WHERE day >= {$sqlStartDate}")
            ->fetchColumn();
    }

    /**
     * @return array<int, array{label: string, visits: int}>
     */
    private function top(string $column): array
    {
        if (!in_array($column, ['path', 'referrer_domain'], true)) {
            return [];
        }

        $statement = $this->pdo->query(
            "SELECT {$column} AS label, COALESCE(SUM(visits_count), 0)::INT AS visits
             FROM site_analytics_daily
             WHERE day >= CURRENT_DATE - INTERVAL '29 days'
             GROUP BY {$column}
             ORDER BY visits DESC, label ASC
             LIMIT 8"
        );

        return $statement->fetchAll();
    }

    /**
     * @return array<int, array{label: string, visits: int}>
     */
    private function topCampaigns(): array
    {
        return $this->pdo
            ->query(<<<'SQL'
                SELECT
                    CASE
                        WHEN utm_campaign <> '' THEN utm_source || ' / ' || utm_campaign
                        WHEN utm_source <> '' THEN utm_source
                        ELSE '(sin campaña)'
                    END AS label,
                    COALESCE(SUM(visits_count), 0)::INT AS visits
                FROM site_analytics_daily
                WHERE day >= CURRENT_DATE - INTERVAL '29 days'
                    AND (utm_source <> '' OR utm_campaign <> '')
                GROUP BY label
                ORDER BY visits DESC, label ASC
                LIMIT 8
            SQL)
            ->fetchAll();
    }

    /**
     * @return array<int, array{label: string, visits: int}>
     */
    private function topRagQuestions(): array
    {
        return $this->pdo
            ->query(<<<'SQL'
                SELECT
                    question_normalized AS label,
                    COALESCE(SUM(questions_count), 0)::INT AS visits
                FROM rag_question_analytics_daily
                WHERE day >= CURRENT_DATE - INTERVAL '29 days'
                GROUP BY question_normalized
                ORDER BY visits DESC, label ASC
                LIMIT 12
            SQL)
            ->fetchAll();
    }

    private function normalizeQuestion(string $question): string
    {
        $question = mb_strtolower(trim($question), 'UTF-8');
        $question = preg_replace('/[A-Z0-9._%+-]{2,64}@[A-Z0-9-]{1,63}(?:\.[A-Z0-9-]{2,63})+/iu', '[email]', $question) ?? '';
        $question = preg_replace('/(?:\+?\d[\d\-\s().]{6,}\d)/u', '[telefono]', $question) ?? '';
        $question = preg_replace('/https?:\/\/\S+/iu', '[url]', $question) ?? '';
        $question = preg_replace('/\s+/u', ' ', $question) ?? '';
        $question = trim($question, " \t\n\r\0\x0B.?!¡¿,;:");

        return mb_substr($question, 0, 220, 'UTF-8');
    }
}
