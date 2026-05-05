<?php
declare(strict_types=1);

/** @var array<string, string> $old */
/** @var array<string, string> $errors */
/** @var string $csrfToken */

$field = static fn (string $name): string => (string) ($old[$name] ?? '');
?>
<section class="contact-hero">
    <div class="section-heading">
        <p class="eyebrow">Contacto</p>
        <h1>Conversemos con calma.</h1>
        <p class="lead">Cuéntanos qué necesitas revisar con AlmaDesign. Respondemos por correo, sin automatismos invasivos ni base de datos de contactos.</p>
    </div>
    <aside class="contact-note" aria-label="Estado del formulario">
        <p>Contacto directo con AlmaDesign.</p>
        <span>Usamos tus datos solo para responder esta conversación.</span>
    </aside>
</section>

<section class="contact-section">
    <form class="contact-form" action="<?= e(url('/contacto/enviar')) ?>" method="post" novalidate>
        <?php if (!empty($errors['general'])): ?>
            <div class="form-alert" role="alert"><?= e($errors['general']) ?></div>
        <?php endif; ?>

        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">

        <div class="honeypot" aria-hidden="true">
            <!-- Nombre intencionalmente específico para evitar autofill accidental. -->
            <input id="almadesign_hp_field" name="almadesign_hp_field" type="text" value="" tabindex="-1" autocomplete="off">
        </div>

        <label>
            <span>Nombre</span>
            <input name="nombre" type="text" value="<?= e($field('nombre')) ?>" minlength="2" maxlength="120" autocomplete="name" required>
            <?php if (!empty($errors['nombre'])): ?><small><?= e($errors['nombre']) ?></small><?php endif; ?>
        </label>

        <label>
            <span>Email</span>
            <input name="email" type="email" value="<?= e($field('email')) ?>" maxlength="180" autocomplete="email" spellcheck="false" required>
            <?php if (!empty($errors['email'])): ?><small><?= e($errors['email']) ?></small><?php endif; ?>
        </label>

        <label>
            <span>Teléfono</span>
            <input name="telefono" type="tel" value="<?= e($field('telefono')) ?>" maxlength="40" pattern="[0-9+() .-]{6,40}" autocomplete="tel" inputmode="tel" required>
            <?php if (!empty($errors['telefono'])): ?><small><?= e($errors['telefono']) ?></small><?php endif; ?>
        </label>

        <label>
            <span>Asunto</span>
            <input name="asunto" type="text" value="<?= e($field('asunto')) ?>" minlength="3" maxlength="160" autocomplete="off" required>
            <?php if (!empty($errors['asunto'])): ?><small><?= e($errors['asunto']) ?></small><?php endif; ?>
        </label>

        <label class="full-span">
            <span>Mensaje</span>
            <textarea name="mensaje" rows="8" minlength="10" maxlength="3000" autocomplete="off" required><?= e($field('mensaje')) ?></textarea>
            <?php if (!empty($errors['mensaje'])): ?><small><?= e($errors['mensaje']) ?></small><?php endif; ?>
        </label>

        <div class="form-actions full-span">
            <button class="button button-primary" type="submit" disabled>Enviar mensaje</button>
            <p>No guardamos el contenido completo del mensaje en logs.</p>
        </div>
    </form>
</section>
