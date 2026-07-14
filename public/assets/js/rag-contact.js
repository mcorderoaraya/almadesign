const ALMA_RAG_CONFIG = Object.freeze({
  chatEndpoint: "/contacto/rag/chat",
  conversationStartEndpoint: "/contacto/rag/iniciar",
  defaultPlaceholder: "Escribe tu mensaje",
});

class MarkdownViewport {
  constructor(contentEl) {
    this.contentEl = contentEl;
    this.viewportEl = contentEl.closest(".markdown-viewport");
    this.bindDomScroll();

    if (window.marked) {
      window.marked.setOptions({
        breaks: true,
        gfm: true,
        headerIds: false,
        mangle: false,
      });
    }

    if (window.mermaid) {
      window.mermaid.initialize({
        startOnLoad: false,
        securityLevel: "strict",
        theme: "base",
        flowchart: {
          htmlLabels: false,
        },
        themeVariables: {
          primaryColor: "#fff5e9",
          primaryTextColor: "#172f45",
          primaryBorderColor: "#e97952",
          lineColor: "#4f5f6d",
          secondaryColor: "#f8d4c3",
          tertiaryColor: "#ffffff",
          fontFamily: "Inter, system-ui, -apple-system, sans-serif",
        },
      });
    }
  }

  render(markdown) {
    const source = typeof markdown === "string" ? markdown : "";

    if (!window.marked || !window.DOMPurify) {
      this.contentEl.textContent = source;
      return;
    }

    const rawHtml = window.marked.parse(source);
    const safeHtml = window.DOMPurify.sanitize(rawHtml, {
      USE_PROFILES: { html: true },
      ALLOWED_TAGS: [
        "a",
        "blockquote",
        "br",
        "code",
        "del",
        "em",
        "h1",
        "h2",
        "h3",
        "h4",
        "h5",
        "h6",
        "hr",
        "li",
        "ol",
        "p",
        "pre",
        "strong",
        "table",
        "tbody",
        "td",
        "th",
        "thead",
        "tr",
        "ul",
      ],
      ALLOWED_ATTR: ["class", "href", "target", "rel"],
    });

    this.contentEl.innerHTML = safeHtml;
    this.hardenLinks();
    this.renderMermaidBlocks();
    window.scrollTo({ top: 0, left: 0, behavior: "auto" });
  }

  clear() {
    this.contentEl.replaceChildren();
  }

  hardenLinks() {
    this.contentEl.querySelectorAll("a[href]").forEach((link) => {
      link.target = "_blank";
      link.rel = "noopener noreferrer";
    });
  }

  async renderMermaidBlocks() {
    if (!window.mermaid || !window.DOMPurify) {
      return;
    }

    const blocks = Array.from(this.contentEl.querySelectorAll("pre code.language-mermaid"));
    for (const block of blocks) {
      const source = block.textContent.trim();
      const pre = block.closest("pre");
      if (!source || !pre) {
        continue;
      }

      const container = document.createElement("div");
      container.className = "mermaid-viewport";
      container.setAttribute("role", "img");
      container.setAttribute("aria-label", "Diagrama generado desde Markdown");

      try {
        const diagramId = `alma-mermaid-${Date.now()}-${Math.random().toString(16).slice(2)}`;
        const rendered = await window.mermaid.render(diagramId, source);
        const safeSvg = window.DOMPurify.sanitize(rendered.svg, {
          USE_PROFILES: { svg: true, svgFilters: true },
        });
        container.innerHTML = safeSvg;
      } catch (error) {
        container.textContent = source;
        container.classList.add("mermaid-viewport--fallback");
      }

      pre.replaceWith(container);
    }
  }

  bindDomScroll() {
    if (!this.viewportEl) {
      return;
    }

    this.viewportEl.addEventListener(
      "wheel",
      (event) => {
        window.scrollBy({
          top: event.deltaY,
          left: event.deltaX,
          behavior: "auto",
        });
        event.preventDefault();
      },
      { passive: false }
    );
  }
}

class AlmaRagWidget {
  constructor(config) {
    this.leadState = null;
    this.conversationState = null;
    this.initialProductSubmitted = false;
    this.leadCompleted = false;
    this.sessionTimer = null;
    this.sessionInterval = null;
    this.closeRedirectTimer = null;
    this.sessionStartedAt = Date.now();

    this.ui = {
      form: document.getElementById("chat-form"),
      questionInput: document.getElementById("question"),
      submitBtn: document.getElementById("submit-btn"),
      resetBtn: document.getElementById("reset-btn"),
      statusEl: document.getElementById("status"),
      resultEl: document.getElementById("result"),
      markdownContentEl: document.getElementById("markdown-content"),
      errorEl: document.getElementById("error"),
      charCounterEl: document.getElementById("char-counter"),
      referenceEl: document.getElementById("reference"),
      sessionMeterEl: document.getElementById("session-meter"),
      sessionBudgetValueEl: document.getElementById("session-budget-value"),
      sessionModeLabelEl: document.getElementById("session-mode-label"),
      privacyNoticeEl: document.querySelector(".rag-privacy-notice"),
    };

    this.config = this.resolveConfig(config);
    this.maxQuestionWords = 500;
    this.markdownViewport = new MarkdownViewport(this.ui.markdownContentEl);
  }

  resolveConfig(config) {
    return {
      ...config,
      chatEndpoint: this.ui.form.dataset.chatEndpoint || config.chatEndpoint,
      conversationStartEndpoint:
        this.ui.form.dataset.conversationStartEndpoint || config.conversationStartEndpoint,
      csrfToken: this.ui.form.dataset.csrfToken || "",
      initialProduct: this.ui.form.dataset.initialProduct || "",
      initialQuestion: this.ui.form.dataset.initialQuestion || "",
      fallbackUrl: this.ui.form.dataset.fallbackUrl || "/contacto/formulario?motivo=limite",
      closeRedirectUrl: "/",
      closeRedirectDelayMs: 10 * 1000,
      sessionLimitMs: 5 * 60 * 1000,
    };
  }

  init() {
    this.bindEvents();
    this.startSessionLimitTimer();
    this.boot();
    this.updateCharCounter();
  }

  startSessionLimitTimer() {
    window.clearTimeout(this.sessionTimer);
    window.clearInterval(this.sessionInterval);
    this.sessionStartedAt = Date.now();
    this.updateSessionMeter();
    this.sessionInterval = window.setInterval(() => this.updateSessionMeter(), 1000);
    this.sessionTimer = window.setTimeout(() => {
      this.updateSessionMeter(0);
      if (!this.leadCompleted) {
        window.location.assign(this.config.fallbackUrl);
      }
    }, this.config.sessionLimitMs);
  }

  updateSessionMeter(forcedRemainingMs = null) {
    if (!this.ui.sessionMeterEl || !this.ui.sessionBudgetValueEl || !this.ui.sessionModeLabelEl) {
      return;
    }

    const elapsedMs = Date.now() - this.sessionStartedAt;
    const remainingMs = forcedRemainingMs ?? Math.max(0, this.config.sessionLimitMs - elapsedMs);
    const totalSeconds = Math.ceil(remainingMs / 1000);
    const minutes = String(Math.floor(totalSeconds / 60)).padStart(2, "0");
    const seconds = String(totalSeconds % 60).padStart(2, "0");
    const isLow = remainingMs <= 0;

    this.ui.sessionBudgetValueEl.textContent = `${minutes}:${seconds}`;
    this.ui.sessionModeLabelEl.textContent = isLow ? "Low" : "High";
    this.ui.sessionMeterEl.classList.toggle("is-low", isLow);
  }

  bindEvents() {
    this.ui.form.addEventListener("submit", (event) => this.handleSubmit(event));
    this.ui.questionInput.addEventListener("input", () => this.updateCharCounter());
    this.ui.questionInput.addEventListener("keydown", (event) => this.handleQuestionKeydown(event));
    this.ui.resetBtn.addEventListener("click", () => this.handleReset());
  }

  handleQuestionKeydown(event) {
    if (event.key !== "Enter" || event.shiftKey || event.ctrlKey || event.altKey || event.metaKey) {
      return;
    }

    event.preventDefault();
    if (!this.ui.submitBtn.disabled) {
      this.ui.form.requestSubmit();
    }
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
    const words = this.countWords(this.ui.questionInput.value);
    this.ui.charCounterEl.textContent =
      `(máximo ${this.maxQuestionWords} palabras) ` +
      `${words}/${this.maxQuestionWords}`;
    this.ui.charCounterEl.classList.toggle("is-over-limit", words > this.maxQuestionWords);
  }

  countWords(value) {
    const normalized = value.trim();
    return normalized ? normalized.split(/\s+/).length : 0;
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
    this.leadCompleted = false;
    window.clearTimeout(this.closeRedirectTimer);
    this.closeRedirectTimer = null;
    this.ui.questionInput.disabled = false;
    this.ui.submitBtn.disabled = false;
    this.ui.questionInput.value = "";
    this.setComposerPrompt();
    this.updateCharCounter();
    this.hideReference();
    this.markdownViewport.clear();
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
    this.markdownViewport.render(this.formatAnswer(data));
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

  async submitQuestion(question, product = "") {
    const body = { question };
    if (product) {
      body.product = product;
    }
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
    if (this.countWords(question) > this.maxQuestionWords) {
      this.showError(`Tu mensaje supera el máximo de ${this.maxQuestionWords} palabras.`);
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
      if (!this.closeRedirectTimer) {
        this.ui.submitBtn.disabled = false;
      }
    }
  }

  handleSuccessfulResponse(data) {
    this.renderResult(data);
    if (this.isMailSentWithCompletedLead(data)) {
      this.leadCompleted = true;
      window.clearTimeout(this.sessionTimer);
      window.clearInterval(this.sessionInterval);
      this.scheduleCloseRedirect();
    } else if (data.lead_state && data.lead_state.next_field === null) {
      this.leadCompleted = true;
      window.clearTimeout(this.sessionTimer);
      window.clearInterval(this.sessionInterval);
    }
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

  isMailSentWithCompletedLead(data) {
    return Boolean(
      data &&
        data.intent === "lead_resumido" &&
        data.email_status &&
        data.email_status.status === "sent"
    );
  }

  scheduleCloseRedirect() {
    window.clearTimeout(this.closeRedirectTimer);
    this.ui.questionInput.disabled = true;
    this.ui.submitBtn.disabled = true;
    this.ui.resetBtn.hidden = true;

    this.closeRedirectTimer = window.setTimeout(() => {
      window.location.assign(this.config.closeRedirectUrl);
    }, this.config.closeRedirectDelayMs);
  }

  async handleReset() {
    this.hideElement(this.ui.statusEl);
    this.hideElement(this.ui.errorEl);
    this.ui.resultEl.hidden = true;
    this.clearConversationState();
    this.startSessionLimitTimer();
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
      await this.submitInitialProductQuestion();
    } catch (err) {
      this.showError(
        "El RAG de contacto no está disponible por un momento. " +
          "Puedes intentar nuevamente en unos segundos."
      );
    }
  }

  async submitInitialProductQuestion() {
    if (
      this.initialProductSubmitted ||
      !this.config.initialProduct ||
      !this.config.initialQuestion
    ) {
      return;
    }

    this.initialProductSubmitted = true;
    this.hidePrivacyNotice();
    this.ui.submitBtn.disabled = true;
    this.showStatus("Consultando...");

    try {
      const result = await this.submitQuestion(
        this.config.initialQuestion,
        this.config.initialProduct
      );
      this.hideElement(this.ui.statusEl);

      if (result.ok) {
        this.handleSuccessfulResponse(result.data);
      } else {
        this.showError(result.message);
      }
    } finally {
      this.ui.submitBtn.disabled = false;
    }
  }
}

new AlmaRagWidget(ALMA_RAG_CONFIG).init();
