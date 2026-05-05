(() => {
    document.documentElement.classList.add('js-ready');

    const siteHeader = document.querySelector('.site-header');
    const menuToggle = document.querySelector('.menu-toggle');
    const siteNav = document.querySelector('#site-nav');

    if (siteHeader && menuToggle && siteNav) {
        const setMenuState = (isOpen) => {
            siteHeader.classList.toggle('is-menu-open', isOpen);
            menuToggle.setAttribute('aria-expanded', String(isOpen));
            menuToggle.setAttribute('aria-label', isOpen ? 'Cerrar menú principal' : 'Abrir menú principal');
        };

        menuToggle.addEventListener('click', () => {
            setMenuState(!siteHeader.classList.contains('is-menu-open'));
        });

        siteNav.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => setMenuState(false));
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                setMenuState(false);
            }
        });
    }

    const contactForm = document.querySelector('.contact-form');

    if (contactForm) {
        const submitButton = contactForm.querySelector('button[type="submit"]');
        const requiredFields = Array.from(contactForm.querySelectorAll('[required]')).filter((field) => (
            field instanceof HTMLInputElement || field instanceof HTMLTextAreaElement || field instanceof HTMLSelectElement
        ) && field.type !== 'hidden' && !field.closest('.honeypot'));

        const updateSubmitState = () => {
            if (!submitButton) {
                return;
            }

            submitButton.disabled = !requiredFields.every((field) => field.checkValidity());
        };

        requiredFields.forEach((field) => {
            field.addEventListener('input', updateSubmitState);
            field.addEventListener('change', updateSubmitState);
        });

        updateSubmitState();
    }

    const revealItems = document.querySelectorAll(
        '.info-card, .demo-group, .scope-card, .audience-grid span, .contact-form, .studio-panel, .hero-facts, .alma-vertical-card, .apogeo-architecture-card, .consulting-card, .executive-card, .apogeo-infographic-card, .apogeo-limits-item, .method-list li, .trust-pillar-grid li, .alma-hero__signal'
    );

    if (!('IntersectionObserver' in window)) {
        revealItems.forEach((item) => item.classList.add('is-visible'));
        return;
    }

    revealItems.forEach((item) => item.classList.add('reveal-ready'));

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) {
                return;
            }

            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
        });
    }, { threshold: 0.12 });

    revealItems.forEach((item) => observer.observe(item));
})();
