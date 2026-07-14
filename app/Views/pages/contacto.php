<?php
declare(strict_types=1);
?>
<section class="rag-contact" aria-label="RAG de contacto AlmaDesign">
    <div class="rag-conversation" aria-live="polite">
        <div id="status" class="status" hidden></div>

        <div id="result" class="result" hidden>
            <section class="markdown-viewport" aria-label="Respuesta">
                <article id="markdown-content"></article>
            </section>
        </div>

        <div id="error" class="error" hidden></div>
    </div>

    <form
        id="chat-form"
        class="rag-composer"
        data-chat-endpoint="<?= e(url('/contacto/rag/chat')) ?>"
        data-conversation-start-endpoint="<?= e(url('/contacto/rag/iniciar')) ?>"
        data-csrf-token="<?= e($csrfToken ?? '') ?>"
        data-initial-product="<?= e($initialProduct ?? '') ?>"
        data-initial-question="<?= e($initialQuestion ?? '') ?>"
        data-fallback-url="<?= e($fallbackUrl ?? url('/contacto/formulario?motivo=limite')) ?>"
    >
        <label for="question" class="sr-only">Mensaje</label>
        <textarea
            id="question"
            name="question"
            maxlength="4000"
            rows="1"
            placeholder="Escribe tu mensaje"
        ></textarea>
        <div id="session-meter" class="session-meter" aria-live="polite" title="Modo de respuesta">
            <span id="session-budget-value" class="session-budget-value">05:00</span>
            <span id="session-mode-label" class="session-mode-label">High</span>
        </div>
        <button type="submit" id="submit-btn" aria-label="Enviar">
            <span aria-hidden="true"></span>
        </button>
        <div id="char-counter" class="char-counter" aria-live="polite">(máximo 500 palabras) 0/500</div>
        <div id="reference" class="reference" aria-live="polite" hidden></div>
        <button type="button" id="reset-btn" class="secondary" hidden>Nueva conversación</button>
    </form>
</section>
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/dompurify/dist/purify.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/mermaid/dist/mermaid.min.js"></script>
