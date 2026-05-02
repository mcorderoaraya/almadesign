<?php
declare(strict_types=1);
?>
<section class="home-hero">
    <div class="home-hero__copy">
        <p class="eyebrow">AI for humans</p>
        <h1>AlmaDesign</h1>
        <p class="lead">Desarrollo web, IA aplicada y soluciones digitales diseñadas con criterio humano.</p>
        <p class="hero-text">Construimos experiencias sobrias, trazables y mantenibles para productos que necesitan confianza, claridad técnica y una presencia digital con carácter propio.</p>
        <div class="hero-actions" aria-label="Acciones principales">
            <a class="button button-primary" href="<?= e(url('/apogeo-lux')) ?>">Explorar Apogeo Lux</a>
            <a class="button button-secondary" href="<?= e(url('/contacto')) ?>">Contactar a AlmaDesign</a>
        </div>
    </div>
    <aside class="studio-panel" aria-label="Enfoque AlmaDesign">
        <div class="studio-panel__header">
            <span>AD</span>
            <p>Estudio digital</p>
        </div>
        <dl>
            <div>
                <dt>Web</dt>
                <dd>Arquitectura clara, interfaces rápidas y contenido gobernado.</dd>
            </div>
            <div>
                <dt>IA aplicada</dt>
                <dd>Flujos útiles, auditables y ajustados al contexto del negocio.</dd>
            </div>
            <div>
                <dt>Producto</dt>
                <dd>Diseño sobrio para sistemas que deben ser entendidos y usados.</dd>
            </div>
        </dl>
    </aside>
</section>

<section class="section-grid home-capabilities" aria-label="Capacidades AlmaDesign">
    <div class="section-heading">
        <p class="eyebrow">Qué hacemos</p>
        <h2>Digital con dirección, no solo presencia.</h2>
    </div>
    <div class="cards-grid cards-grid--three">
        <article class="info-card feature-card">
            <span>01</span>
            <h3>Sitios web gobernados</h3>
            <p>Estructuras mantenibles, contenido claro y una base técnica preparada para evolucionar sin ruido.</p>
        </article>
        <article class="info-card feature-card">
            <span>02</span>
            <h3>IA aplicada</h3>
            <p>Prototipos y productos que privilegian trazabilidad, límites explícitos y utilidad real.</p>
        </article>
        <article class="info-card feature-card">
            <span>03</span>
            <h3>Soluciones digitales</h3>
            <p>Herramientas sobrias para operaciones, comunicación, automatización y validación de ideas.</p>
        </article>
    </div>
</section>

<section class="home-feature">
    <div>
        <p class="eyebrow">Producto destacado</p>
        <h2>Apogeo Lux</h2>
        <p>Landing comercial y demo gobernada para revisar IA jurídica trazable sobre normas públicas BCN / LeyChile.</p>
    </div>
    <a class="button button-primary" href="<?= e(url('/apogeo-lux')) ?>">Ver producto</a>
</section>
