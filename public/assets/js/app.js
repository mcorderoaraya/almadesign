(() => {
    document.documentElement.classList.add('js-ready');

    const siteHeader = document.querySelector('.site-header');
    const menuToggle = document.querySelector('.menu-toggle');
    const siteNav = document.querySelector('#site-nav');
    const brandLogo = siteHeader ? siteHeader.querySelector('.brand-logo') : null;

    if (siteHeader) {
        const defaultLogoSrc = brandLogo ? brandLogo.dataset.defaultSrc || brandLogo.getAttribute('src') : '';
        const scrolledLogoSrc = brandLogo ? brandLogo.dataset.scrolledSrc || defaultLogoSrc : '';
        const defaultLogoWidth = brandLogo ? brandLogo.dataset.defaultWidth || brandLogo.getAttribute('width') : '';
        const defaultLogoHeight = brandLogo ? brandLogo.dataset.defaultHeight || brandLogo.getAttribute('height') : '';
        const scrolledLogoWidth = brandLogo ? brandLogo.dataset.scrolledWidth || defaultLogoWidth : '';
        const scrolledLogoHeight = brandLogo ? brandLogo.dataset.scrolledHeight || defaultLogoHeight : '';
        let headerIsScrolled = false;
        let scrollFrame = null;

        if (scrolledLogoSrc && scrolledLogoSrc !== defaultLogoSrc) {
            const preloadScrolledLogo = new Image();
            preloadScrolledLogo.src = scrolledLogoSrc;
        }

        const setHeaderScrollState = () => {
            const isScrolled = headerIsScrolled ? window.scrollY > 8 : window.scrollY > 48;

            if (isScrolled === headerIsScrolled) {
                return;
            }

            const nextLogoSrc = isScrolled ? scrolledLogoSrc : defaultLogoSrc;
            const nextLogoWidth = isScrolled ? scrolledLogoWidth : defaultLogoWidth;
            const nextLogoHeight = isScrolled ? scrolledLogoHeight : defaultLogoHeight;
            headerIsScrolled = isScrolled;

            siteHeader.classList.toggle('is-scrolled', isScrolled);

            if (brandLogo && nextLogoSrc && brandLogo.getAttribute('src') !== nextLogoSrc) {
                brandLogo.setAttribute('src', nextLogoSrc);
            }

            if (brandLogo && nextLogoWidth) {
                brandLogo.setAttribute('width', nextLogoWidth);
            }

            if (brandLogo && nextLogoHeight) {
                brandLogo.setAttribute('height', nextLogoHeight);
            }
        };

        const requestHeaderScrollState = () => {
            if (scrollFrame !== null) {
                return;
            }

            scrollFrame = window.requestAnimationFrame(() => {
                scrollFrame = null;
                setHeaderScrollState();
            });
        };

        setHeaderScrollState();
        window.addEventListener('scroll', requestHeaderScrollState, { passive: true });
    }

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
        '.info-card, .demo-group, .scope-card, .audience-grid span, .contact-form, .studio-panel, .hero-facts, .alma-vertical-card, .alma-product-card, .alma-assistant-feature, .apogeo-architecture-card, .consulting-card, .executive-card, .apogeo-infographic-card, .apogeo-limits-item, .method-list li, .trust-pillar-grid li'
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
