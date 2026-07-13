CREATE TABLE IF NOT EXISTS site_analytics_daily (
    id BIGSERIAL PRIMARY KEY,
    day DATE NOT NULL,
    path TEXT NOT NULL,
    referrer_domain TEXT NOT NULL DEFAULT 'direct',
    utm_source TEXT NOT NULL DEFAULT '',
    utm_campaign TEXT NOT NULL DEFAULT '',
    device_type TEXT NOT NULL DEFAULT 'unknown' CHECK (device_type IN ('desktop', 'mobile', 'tablet', 'unknown')),
    visits_count INTEGER NOT NULL DEFAULT 0 CHECK (visits_count >= 0),
    created_at TIMESTAMPTZ NOT NULL DEFAULT NOW(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT NOW(),
    UNIQUE (day, path, referrer_domain, utm_source, utm_campaign, device_type)
);

CREATE INDEX IF NOT EXISTS idx_site_analytics_daily_day
    ON site_analytics_daily (day DESC);

CREATE INDEX IF NOT EXISTS idx_site_analytics_daily_path
    ON site_analytics_daily (path);
