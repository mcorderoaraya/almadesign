CREATE TABLE IF NOT EXISTS rag_question_analytics_daily (
    id BIGSERIAL PRIMARY KEY,
    day DATE NOT NULL,
    question_normalized TEXT NOT NULL,
    product_slug TEXT NOT NULL DEFAULT '',
    conversation_stage TEXT NOT NULL DEFAULT '',
    questions_count INTEGER NOT NULL DEFAULT 0 CHECK (questions_count >= 0),
    created_at TIMESTAMPTZ NOT NULL DEFAULT NOW(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT NOW(),
    UNIQUE (day, question_normalized, product_slug, conversation_stage)
);

CREATE INDEX IF NOT EXISTS idx_rag_question_analytics_daily_day
    ON rag_question_analytics_daily (day DESC);

CREATE INDEX IF NOT EXISTS idx_rag_question_analytics_daily_question
    ON rag_question_analytics_daily (question_normalized);
