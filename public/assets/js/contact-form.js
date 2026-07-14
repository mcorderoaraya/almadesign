(() => {
  const form = document.querySelector("[data-contact-form]");
  if (!form) {
    return;
  }

  const submitButton = form.querySelector('button[type="submit"]');
  const status = form.querySelector("[data-submit-status]");
  const fields = Array.from(form.querySelectorAll("[data-counter-input]"));
  const requiredFields = ["nombre", "email", "asunto", "mensaje"];

  form.classList.add("reveal-ready");

  const sanitizeName = (value) => value.replace(/[^\p{L} ]/gu, "").replace(/\s{2,}/g, " ").slice(0, 20);
  const sanitizePhone = (value) => value.replace(/[^0-9+() .-]/g, "").slice(0, 40);

  const updateCounter = (field) => {
    const name = field.getAttribute("name");
    const max = Number(field.getAttribute("maxlength") || 0);
    const counter = name ? form.querySelector(`[data-counter-for="${name}"]`) : null;

    if (counter && max > 0) {
      counter.textContent = `${field.value.length}/${max}`;
      counter.classList.toggle("is-limit", field.value.length >= max);
    }
  };

  const validateField = (field) => {
    if (!(field instanceof HTMLInputElement || field instanceof HTMLTextAreaElement)) {
      return true;
    }

    const name = field.getAttribute("name") || "";
    if (name === "nombre") {
      const validName = /^[\p{L} ]{2,20}$/u.test(field.value.trim());
      field.setCustomValidity(validName ? "" : "Ingresa solo letras y espacios, entre 2 y 20 caracteres.");
    } else if (name === "telefono" && field.value.trim() !== "") {
      const validPhone = /^[0-9+() .-]{6,40}$/.test(field.value.trim());
      field.setCustomValidity(validPhone ? "" : "Ingresa un teléfono válido.");
    } else {
      field.setCustomValidity("");
    }

    return field.checkValidity();
  };

  const updateSubmitState = () => {
    fields.forEach((field) => updateCounter(field));

    const requiredAreFilled = requiredFields.every((name) => {
      const field = form.elements.namedItem(name);
      return field instanceof HTMLInputElement || field instanceof HTMLTextAreaElement
        ? field.value.trim() !== ""
        : false;
    });

    const fieldsAreValid = fields.every((field) => validateField(field));

    if (submitButton instanceof HTMLButtonElement && form.dataset.submitting !== "true") {
      submitButton.disabled = !(requiredAreFilled && fieldsAreValid);
    }
  };

  fields.forEach((field) => {
    field.addEventListener("input", () => {
      if (field instanceof HTMLInputElement && field.dataset.lettersOnly !== undefined) {
        field.value = sanitizeName(field.value);
      }

      if (field instanceof HTMLInputElement && field.dataset.phoneInput !== undefined) {
        field.value = sanitizePhone(field.value);
      }

      updateSubmitState();
    });

    field.addEventListener("blur", () => {
      validateField(field);
      updateSubmitState();
    });
  });

  form.addEventListener("submit", (event) => {
    updateSubmitState();
    if (submitButton instanceof HTMLButtonElement && submitButton.disabled) {
      event.preventDefault();
      form.reportValidity();
      return;
    }

    if (form.dataset.submitting === "true") {
      return;
    }

    form.dataset.submitting = "true";
    form.classList.add("is-submitting");

    if (submitButton instanceof HTMLButtonElement) {
      submitButton.disabled = true;
      submitButton.textContent = submitButton.dataset.submittingLabel || "Enviando...";
    }

    if (status) {
      status.textContent = "Estamos enviando tu solicitud.";
    }
  });

  window.addEventListener("pageshow", () => {
    form.dataset.submitting = "false";
    form.classList.remove("is-submitting");

    if (submitButton instanceof HTMLButtonElement) {
      submitButton.textContent = submitButton.dataset.submitLabel || "Enviar solicitud";
    }

    if (status) {
      status.textContent = "";
    }

    updateSubmitState();
  });

  updateSubmitState();
})();
