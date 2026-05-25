<?php
declare(strict_types=1);
?>
<footer class="site-footer">
    <div class="site-footer__inner">
        <div class="site-footer__identity">
            <p class="site-footer__statement">Arquitectura de conocimiento e inteligencia artificial gobernada para decisiones humanas complejas.</p>
        </div>
        <nav class="site-footer__nav" aria-label="Mapa del sitio">
            <a href="<?= e(url('/')) ?>">Inicio</a>
            <a href="<?= e(url('/consultoria-ia-procesos')) ?>">Consultoría</a>
            <a href="<?= e(url('/apogeo')) ?>">Apogeo</a>
            <a href="<?= e(url('/ai-for-humans')) ?>">AI for Humans</a>
            <a href="<?= e(url('/contacto')) ?>">Contacto</a>
        </nav>
        <div class="site-footer__social" aria-label="Redes sociales">
            <a class="site-footer__instagram" href="https://www.instagram.com/almadesign2026/" target="_blank" rel="noopener noreferrer">
                <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                    <rect x="4" y="4" width="16" height="16" rx="5"></rect>
                    <circle cx="12" cy="12" r="3.6"></circle>
                    <circle cx="17.2" cy="6.8" r="0.8"></circle>
                </svg>
                <span>@almadesign</span>
            </a>
        
            <a class="site-footer__instagram"
            href="https://www.linkedin.com/company/ai-alma-design/"
            target="_blank"
            rel="noopener noreferrer">

                <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                    <rect x="3" y="3" width="18" height="18" rx="4"></rect>

                    <!-- i -->
                    <rect x="7" y="10" width="2" height="7"></rect>
                    <circle cx="8" cy="7.5" r="1"></circle>

                    <!-- n -->
                    <path d="M11 10h2v1.2c0.5-0.8 1.3-1.4 2.6-1.4
                            2 0 3.4 1.3 3.4 4v3.2h-2v-3
                            c0-1.2-0.5-2-1.7-2s-2 0.9-2 2.3V17h-2z">
                    </path>
                </svg>

                <span>@almadesign</span>
            </a>
        </div>
    </div>
</footer>
