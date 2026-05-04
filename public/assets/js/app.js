(() => {
    document.documentElement.classList.add('js-ready');

    const revealItems = document.querySelectorAll(
        '.info-card, .demo-group, .scope-card, .audience-grid span, .contact-form, .studio-panel, .hero-facts, .alma-vertical-card, .consulting-card, .executive-card, .apogeo-infographic-card, .method-list li, .trust-pillar-grid li, .alma-hero__signal'
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
