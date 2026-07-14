ALTER TABLE rag_markdown_documents
    ADD COLUMN IF NOT EXISTS content_type TEXT NOT NULL DEFAULT 'reference',
    ADD COLUMN IF NOT EXISTS parent_slug TEXT NOT NULL DEFAULT '',
    ADD COLUMN IF NOT EXISTS visibility TEXT NOT NULL DEFAULT 'rag_only';

DO $$
BEGIN
    IF NOT EXISTS (
        SELECT 1
        FROM pg_constraint
        WHERE conname = 'rag_markdown_documents_content_type_check'
    ) THEN
        ALTER TABLE rag_markdown_documents
            ADD CONSTRAINT rag_markdown_documents_content_type_check
            CHECK (content_type IN ('reference', 'legal_reference', 'policy_note', 'product_context', 'operational_note'));
    END IF;

    IF NOT EXISTS (
        SELECT 1
        FROM pg_constraint
        WHERE conname = 'rag_markdown_documents_visibility_check'
    ) THEN
        ALTER TABLE rag_markdown_documents
            ADD CONSTRAINT rag_markdown_documents_visibility_check
            CHECK (visibility IN ('rag_only', 'linked', 'public', 'internal'));
    END IF;
END $$;

CREATE INDEX IF NOT EXISTS idx_rag_markdown_documents_parent_slug
    ON rag_markdown_documents (parent_slug);

CREATE INDEX IF NOT EXISTS idx_rag_markdown_documents_content_type
    ON rag_markdown_documents (content_type);
