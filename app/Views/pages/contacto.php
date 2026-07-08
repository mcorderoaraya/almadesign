<?php
declare(strict_types=1);
?>
<section class="rag-contact" aria-label="RAG de contacto AlmaDesign">
    <div class="rag-conversation" aria-live="polite">
        <div id="status" class="status" hidden></div>

        <div id="result" class="result" hidden>
            <p id="answer"></p>
        </div>

        <p class="rag-privacy-notice">
            <strong>solicitaremos sus datos de contacto si usted decide comunicarse con un ejecutivo o solicitar atención personalizada.
            La información entregada será utilizada exclusivamente para responder a su solicitud, gestionar su contacto y entregar la orientación requerida. No será utilizada para otros fines sin su autorización.
            Si posteriormente usted solicita la eliminación de sus datos personales, estos serán borrados de nuestros registros, salvo que exista una obligación legal que exija conservarlos por un período determinado.</strong>
        </p>

        <div id="error" class="error" hidden></div>
    </div>

    <form
        id="chat-form"
        class="rag-composer"
        data-chat-endpoint="<?= e(url('/contacto/rag/chat')) ?>"
        data-conversation-start-endpoint="<?= e(url('/contacto/rag/iniciar')) ?>"
        data-csrf-token="<?= e($csrfToken ?? '') ?>"
    >
        <label for="question" class="sr-only">Mensaje</label>
        <textarea
            id="question"
            name="question"
            maxlength="1000"
            rows="1"
            placeholder="Escribe tu mensaje"
        ></textarea>
        <button type="submit" id="submit-btn" aria-label="Enviar">
            <span aria-hidden="true"></span>
        </button>
        <div id="char-counter" class="char-counter" aria-live="polite">(máximo 1000 caracteres) 0/1000</div>
        <div id="reference" class="reference" aria-live="polite" hidden></div>
        <button type="button" id="reset-btn" class="secondary" hidden>Nueva conversación</button>
    </form>
</section>
