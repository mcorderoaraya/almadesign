const ALMA_RAG_CONFIG = Object.freeze({
  chatEndpoint: "/contacto/rag/chat",
  conversationStartEndpoint: "/contacto/rag/iniciar",
  defaultPlaceholder: "Escribe tu mensaje",
});

class AlmaRagWidget {
  constructor(config) {
    this.leadState = null;
    this.conversationState = null;

    this.ui = {
      form: document.getElementById("chat-form"),
      questionInput: document.getElementById("question"),
      submitBtn: document.getElementById("submit-btn"),
      resetBtn: document.getElementById("reset-btn"),
      statusEl: document.getElementById("status"),
      resultEl: document.getElementById("result"),
      answerEl: document.getElementById("answer"),
      errorEl: document.getElementById("error"),
      charCounterEl: document.getElementById("char-counter"),
      referenceEl: document.getElementById("reference"),
      privacyNoticeEl: document.querySelector(".rag-privacy-notice"),
    };

    this.config = this.resolveConfig(config);
    this.maxQuestionLength = Number(this.ui.questionInput.getAttribute("maxlength")) || 1000;
  }

  resolveConfig(config) {
    return {
      ...config,
      chatEndpoint: this.ui.form.dataset.chatEndpoint || config.chatEndpoint,
      conversationStartEndpoint:
        this.ui.form.dataset.conversationStartEndpoint || config.conversationStartEndpoint,
      csrfToken: this.ui.form.dataset.csrfToken || "",
    };
  }

  init() {
    this.bindEvents();
    this.boot();
    this.updateCharCounter();
  }

  bindEvents() {
    this.ui.form.addEventListener("submit", (event) => this.handleSubmit(event));
    this.ui.questionInput.addEventListener("input", () => this.updateCharCounter());
    this.ui.resetBtn.addEventListener("click", () => this.handleReset());
  }

  updateLeadControls() {
    const hasLead = this.leadState && this.leadState.next_field !== null;
    const hasConversation = this.conversationState && this.conversationState.stage !== "done";
    this.ui.resetBtn.hidden = !(hasLead || hasConversation);
  }

  setComposerPrompt() {
    this.ui.questionInput.placeholder = this.config.defaultPlaceholder;
  }

  updateCharCounter() {
    this.ui.charCounterEl.textContent =
      `(máximo ${this.maxQuestionLength} caracteres) ` +
      `${this.ui.questionInput.value.length}/${this.maxQuestionLength}`;
  }

  hideReference() {
    this.ui.referenceEl.hidden = true;
    this.ui.referenceEl.replaceChildren();
  }

  showPrivacyNotice() {
    if (this.ui.privacyNoticeEl) {
      this.ui.privacyNoticeEl.hidden = false;
    }
  }

  hidePrivacyNotice() {
    if (this.ui.privacyNoticeEl) {
      this.ui.privacyNoticeEl.hidden = true;
    }
  }

  renderReference(sources) {
    const references = this.getPublicReferences(sources);
    if (references.length === 0) {
      this.hideReference();
      return;
    }

    const strong = document.createElement("strong");
    strong.textContent = references.length === 1 ? "Fuente:" : "Fuentes:";

    const links = references.map((reference, index) => {
      const link = document.createElement("a");
      link.href = reference.url;
      link.target = "_blank";
      link.rel = "noopener noreferrer";
      link.textContent = reference.label;
      return index === 0 ? [link] : [document.createTextNode(" · "), link];
    }).flat();

    this.ui.referenceEl.replaceChildren(strong, document.createTextNode(" "), ...links);
    this.ui.referenceEl.hidden = false;
  }

  getPublicReferences(sources) {
    const byUrl = new Map();
    (sources || []).forEach((source) => {
      if (!source.source_url || byUrl.has(source.source_url)) {
        return;
      }
      byUrl.set(source.source_url, {
        url: source.source_url,
        label: this.publicReferenceLabel(source.source_url),
      });
    });
    return Array.from(byUrl.values());
  }

  publicReferenceLabel(sourceUrl) {
    try {
      const url = new URL(sourceUrl);
      return `${url.hostname}${url.pathname}`;
    } catch (_) {
      return sourceUrl;
    }
  }

  clearConversationState() {
    this.leadState = null;
    this.conversationState = null;
    this.ui.questionInput.value = "";
    this.setComposerPrompt();
    this.updateCharCounter();
    this.hideReference();
    this.updateLeadControls();
  }

  hideElement(el) {
    el.hidden = true;
    el.textContent = "";
  }

  showStatus(text) {
    this.ui.statusEl.hidden = false;
    this.ui.statusEl.textContent = text;
  }

  showError(text) {
    this.ui.errorEl.hidden = false;
    this.ui.errorEl.textContent = text;
  }

  formatAnswer(data) {
    const answer = typeof data.answer === "string" ? data.answer : "";
    const nextQuestion = typeof data.next_question === "string" ? data.next_question.trim() : "";
    if (!nextQuestion || answer.toLowerCase().includes(nextQuestion.toLowerCase())) {
      return answer;
    }
    return `${answer}\n\n${nextQuestion}`;
  }

  sanitizeHtml(html) {
    const allowedTags = new Set([
      "P",
      "STRONG",
      "EM",
      "UL",
      "OL",
      "LI",
      "BLOCKQUOTE",
      "CODE",
      "BR",
    ]);
    const template = document.createElement("template");
    template.innerHTML = html;

    const sanitizeNode = (node) => {
      if (node.nodeType === Node.TEXT_NODE) {
        return document.createTextNode(node.textContent || "");
      }

      if (node.nodeType !== Node.ELEMENT_NODE) {
        return document.createTextNode("");
      }

      if (!allowedTags.has(node.tagName)) {
        const fragment = document.createDocumentFragment();
        node.childNodes.forEach((child) => fragment.append(sanitizeNode(child)));
        return fragment;
      }

      const clean = document.createElement(node.tagName.toLowerCase());
      node.childNodes.forEach((child) => clean.append(sanitizeNode(child)));
      return clean;
    };

    const fragment = document.createDocumentFragment();
    template.content.childNodes.forEach((node) => fragment.append(sanitizeNode(node)));
    return fragment;
  }

  renderResult(data) {
    this.ui.answerEl.replaceChildren(this.sanitizeHtml(this.formatAnswer(data)));
    this.renderReference(data.sources);
    this.ui.resultEl.hidden = false;
  }

  extractValidationMessage(detail) {
    if (Array.isArray(detail)) {
      return detail
        .map((item) => item.msg || JSON.stringify(item))
        .join(" / ");
    }
    return typeof detail === "string" ? detail : JSON.stringify(detail);
  }

  async submitQuestion(question) {
    const body = { question };
    if (this.conversationState) {
      body.conversation_state = this.conversationState;
    }
    if (this.leadState) {
      body.lead_state = this.leadState;
    }

    const response = await fetch(this.config.chatEndpoint, {
      method: "POST",
      credentials: "same-origin",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-Token": this.config.csrfToken,
      },
      body: JSON.stringify(body),
    });

    let payload = null;
    try {
      payload = await response.json();
    } catch (_) {
      payload = null;
    }

    if (response.ok) {
      return { ok: true, data: payload };
    }

    if (response.status === 422) {
      const msg = payload ? this.extractValidationMessage(payload.detail) : "Pregunta inválida.";
      return { ok: false, status: 422, message: `Pregunta inválida: ${msg}` };
    }

    if (response.status === 419) {
      const msg = payload && payload.detail ? payload.detail : "La sesión no pudo validarse.";
      return { ok: false, status: 419, message: msg };
    }

    if (response.status === 503) {
      return {
        ok: false,
        status: 503,
        message:
          "El RAG de contacto no está disponible por un momento. Puedes intentar nuevamente en unos segundos.",
      };
    }

    const msg = payload && payload.detail ? this.extractValidationMessage(payload.detail) : response.statusText;
    return { ok: false, status: response.status, message: `Error inesperado (${response.status}): ${msg}` };
  }

  async startConversation() {
    const response = await fetch(this.config.conversationStartEndpoint, {
      credentials: "same-origin",
      headers: { Accept: "application/json" },
    });
    const payload = await response.json();
    if (!response.ok) {
      throw new Error(`No se pudo iniciar la conversacion (${response.status}).`);
    }
    return payload;
  }

  async handleSubmit(event) {
    event.preventDefault();

    this.hideElement(this.ui.statusEl);
    this.hideElement(this.ui.errorEl);
    this.ui.resultEl.hidden = true;

    const question = this.ui.questionInput.value.trim();
    if (!question) {
      this.showError("Escribe un mensaje para continuar.");
      return;
    }

    this.hidePrivacyNotice();
    this.ui.submitBtn.disabled = true;
    this.showStatus("Consultando...");

    try {
      const result = await this.submitQuestion(question);
      this.hideElement(this.ui.statusEl);

      if (result.ok) {
        this.handleSuccessfulResponse(result.data);
      } else {
        this.showError(result.message);
      }
    } catch (err) {
      this.hideElement(this.ui.statusEl);
      this.showError(
        "El RAG de contacto no está disponible por un momento. " +
          "Intenta nuevamente en unos segundos o vuelve a cargar la página."
      );
    } finally {
      this.ui.submitBtn.disabled = false;
    }
  }

  handleSuccessfulResponse(data) {
    this.renderResult(data);
    this.conversationState =
      data.conversation_state && data.conversation_state.stage !== "done"
        ? data.conversation_state
        : null;
    this.leadState =
      data.lead_state && data.lead_state.next_field !== null
        ? data.lead_state
        : null;
    this.updateLeadControls();
    this.ui.questionInput.value = "";
    this.updateCharCounter();
    this.setComposerPrompt();
  }

  async handleReset() {
    this.hideElement(this.ui.statusEl);
    this.hideElement(this.ui.errorEl);
    this.ui.resultEl.hidden = true;
    this.clearConversationState();
    this.showStatus("Iniciando nueva conversación...");
    await this.boot();
    this.hideElement(this.ui.statusEl);
  }

  async boot() {
    try {
      this.showPrivacyNotice();
      const data = await this.startConversation();
      this.renderResult(data);
      this.conversationState =
        data.conversation_state && data.conversation_state.stage !== "done"
          ? data.conversation_state
          : null;
      this.setComposerPrompt();
      this.updateLeadControls();
    } catch (err) {
      this.showError(
        "El RAG de contacto no está disponible por un momento. " +
          "Puedes intentar nuevamente en unos segundos."
      );
    }
  }
}

new AlmaRagWidget(ALMA_RAG_CONFIG).init();
