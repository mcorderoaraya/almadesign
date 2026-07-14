<?php
declare(strict_types=1);

$old = is_array($old ?? null) ? $old : [];
$errors = is_array($errors ?? null) ? $errors : [];
$honeypotName = is_string($honeypotName ?? null) ? $honeypotName : 'almadesign_hp_field';
$timeoutFallback = ($timeoutFallback ?? false) === true;

$field = static fn (string $name): string => is_scalar($old[$name] ?? null) ? (string) $old[$name] : '';
$error = static fn (string $name): string => is_string($errors[$name] ?? null) ? (string) $errors[$name] : '';
?>
<?php if (!$timeoutFallback): ?>
    <section class="contact-hero alma-home" aria-labelledby="contact-form-title">
        <div>
            <p class="eyebrow">CONVERSEMOS CON CONFIANZA</p>
            <div class="alma-hero__chapter">
                <h1 id="contact-form-title" class="o-heading">Cuéntanos qué necesitas. Usaremos tus datos solo para responderte.</h1>
            </div>
            <p class="lead">Descríbenos brevemente tu consulta, proyecto o necesidad. La información que envíes será utilizada únicamente para responder tu solicitud y coordinar el contacto contigo.<br>
En AlmaDesign creemos que la inteligencia artificial debe ampliar las capacidades humanas, no reemplazarlas. Por eso cada conversación comienza escuchando, comprendiendo y trabajando con criterio humano.</p>
        </div>

        <aside class="contact-note" aria-label="Uso de datos personales">
            <p>Tus datos personales</p>
            <span>En AlmaDesign aplicamos desde ya los principios de la nueva Ley de Protección de Datos Personales. La información que entregues en este formulario será utilizada únicamente para responder tus consultas o requerimientos.

El sistema solo envía un correo electrónico a nuestra área comercial y no almacena tus datos en nuestros registros ni los comparte con terceros.

<strong>Tu información te pertenece. A nosotros también nos importa tu privacidad.</strong></span>
        </aside>
    </section>
<?php endif; ?>

<section class="contact-section" aria-label="Formulario de contacto">
    <?php if ($timeoutFallback): ?>
        <div class="form-alert form-alert--session-timeout" role="status">
            La conversación llegó a su tiempo máximo. Puedes continuar por este formulario para que un ejecutivo te contacte.
        </div>
    <?php endif; ?>

    <?php if ($error('general') !== ''): ?>
        <div class="form-alert" role="alert">
            <?= e($error('general')) ?>
        </div>
    <?php endif; ?>

    <form class="contact-form" method="post" action="<?= e(url('/contacto/enviar')) ?>" data-contact-form>
        <input type="hidden" name="csrf_token" value="<?= e($csrfToken ?? '') ?>">

        <label class="honeypot" aria-hidden="true">
            <span>No completar</span>
            <input type="text" name="<?= e($honeypotName) ?>" tabindex="-1" autocomplete="off">
        </label>

        <label>
            <span>Nombre</span>
            <input type="text" name="nombre" value="<?= e($field('nombre')) ?>" required maxlength="20" pattern="[A-Za-zÁÉÍÓÚÜÑáéíóúüñ ]{2,20}" autocomplete="name" data-letters-only data-counter-input>
            <small class="field-counter" data-counter-for="nombre">0/20</small>
            <?php if ($error('nombre') !== ''): ?><small><?= e($error('nombre')) ?></small><?php endif; ?>
        </label>

        <label>
            <span>Email</span>
            <input type="email" name="email" value="<?= e($field('email')) ?>" required maxlength="180" autocomplete="email" data-counter-input>
            <small class="field-counter" data-counter-for="email">0/180</small>
            <?php if ($error('email') !== ''): ?><small><?= e($error('email')) ?></small><?php endif; ?>
        </label>

        <label>
            <span>Teléfono <em>opcional</em></span>
            <input type="tel" name="telefono" value="<?= e($field('telefono')) ?>" maxlength="40" autocomplete="tel" inputmode="tel" data-phone-input data-counter-input>
            <small class="field-counter" data-counter-for="telefono">0/40</small>
            <?php if ($error('telefono') !== ''): ?><small><?= e($error('telefono')) ?></small><?php endif; ?>
        </label>

        <label>
            <span>Asunto</span>
            <input type="text" name="asunto" value="<?= e($field('asunto') !== '' ? $field('asunto') : 'Contacto desde AlmaDesign') ?>" required maxlength="160">
            <?php if ($error('asunto') !== ''): ?><small><?= e($error('asunto')) ?></small><?php endif; ?>
        </label>

        <label class="full-span">
            <span>Mensaje</span>
            <textarea name="mensaje" required maxlength="1000" data-counter-input><?= e($field('mensaje')) ?></textarea>
            <small class="field-counter" data-counter-for="mensaje">0/1000</small>
            <?php if ($error('mensaje') !== ''): ?><small><?= e($error('mensaje')) ?></small><?php endif; ?>
        </label>

        <div class="form-actions full-span">
            <button class="button button-primary" type="submit" data-submit-label="Enviar solicitud" data-submitting-label="Enviando..." disabled>Enviar solicitud</button>
            <p>Responderemos a la brevedad.</p>
        </div>

        <p class="form-submit-status full-span" aria-live="polite" data-submit-status></p>
    </form>
</section>
