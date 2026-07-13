<?php
declare(strict_types=1);
?>
<footer class="site-footer">
    <div class="site-footer__inner">
        <div class="site-footer__identity">
            <p class="site-footer__statement">Inteligencia artificial clara, humana y útil para equipos que necesitan avanzar sin perder control.</p>
            <a class="button button-primary site-footer__policy-button" href="<?= e(url('/politica-almadesign')) ?>">Políticas de AlmaDesign</a>
        </div>
        <div class="site-footer__menu">
            <p class="site-footer__menu-title">Menú</p>
            <nav class="site-footer__nav" aria-label="Mapa del sitio">
                <a href="<?= e(url('/')) ?>">Inicio</a>
                <a href="<?= e(url('/consultoria-ia-procesos')) ?>">Consultoría</a>
                <a href="<?= e(url('/charlas-ai-for-humans')) ?>">Charlas</a>
                <a href="<?= e(url('/gestion-documental')) ?>">Gestión Documental</a>
                <a href="<?= e(url('/orquestacion-asistentes-ia')) ?>">Orquestación IA</a>
                <a href="<?= e(url('/software-factory')) ?>">Software Factory</a>
                <a href="<?= e(url('/ai-for-humans')) ?>">AI for Humans</a>
                <a href="<?= e(url('/contacto')) ?>">Conversemos</a>
            </nav>
        </div>
        <div class="site-footer__social" aria-label="Redes sociales">
            <a class="site-footer__social-link site-footer__instagram" href="https://www.instagram.com/almadesign_ai/" target="_blank" rel="noopener noreferrer" aria-label="Instagram AlmaDesign" data-tooltip="Instagram">
                <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                    <rect x="4" y="4" width="16" height="16" rx="5"></rect>
                    <circle cx="12" cy="12" r="3.6"></circle>
                    <circle cx="17.2" cy="6.8" r="0.8"></circle>
                </svg>
            </a>
            <a class="site-footer__social-link site-footer__linkedin" href="https://www.linkedin.com/company/ai-alma-design/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn AlmaDesign" data-tooltip="LinkedIn">
                <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                    <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6z"></path>
                    <rect x="2" y="9" width="4" height="12"></rect>
                    <circle cx="4" cy="4" r="2"></circle>
                </svg>
            </a>
        </div>
    </div>
</footer>
