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
            <p class="eyebrow">Contacto AlmaDesign</p>
            <div class="alma-hero__chapter">
                <h1 id="contact-form-title"><span>Conversemos con tus datos de contacto.</span></h1>
            </div>
            <p class="lead">Déjanos tus antecedentes y un ejecutivo de AlmaDesign tomará contacto contigo.</p>
        </div>

        <aside class="contact-note" aria-label="Uso de datos personales">
            <p>Uso responsable de tus datos</p>
            <span>Usaremos esta información solo para responder tu solicitud y coordinar el contacto requerido.</span>
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

    <form class="contact-form" method="post" action="<?= e(url('/contacto/enviar')) ?>">
        <input type="hidden" name="csrf_token" value="<?= e($csrfToken ?? '') ?>">

        <label class="honeypot" aria-hidden="true">
            <span>No completar</span>
            <input type="text" name="<?= e($honeypotName) ?>" tabindex="-1" autocomplete="off">
        </label>

        <label>
            <span>Nombre</span>
            <input type="text" name="nombre" value="<?= e($field('nombre')) ?>" required maxlength="120" autocomplete="name">
            <?php if ($error('nombre') !== ''): ?><small><?= e($error('nombre')) ?></small><?php endif; ?>
        </label>

        <label>
            <span>Email</span>
            <input type="email" name="email" value="<?= e($field('email')) ?>" required maxlength="180" autocomplete="email">
            <?php if ($error('email') !== ''): ?><small><?= e($error('email')) ?></small><?php endif; ?>
        </label>

        <label>
            <span>Teléfono <em>opcional</em></span>
            <input type="tel" name="telefono" value="<?= e($field('telefono')) ?>" maxlength="40" autocomplete="tel">
            <?php if ($error('telefono') !== ''): ?><small><?= e($error('telefono')) ?></small><?php endif; ?>
        </label>

        <label>
            <span>Asunto</span>
            <input type="text" name="asunto" value="<?= e($field('asunto') !== '' ? $field('asunto') : 'Contacto desde AlmaDesign') ?>" required maxlength="160">
            <?php if ($error('asunto') !== ''): ?><small><?= e($error('asunto')) ?></small><?php endif; ?>
        </label>

        <label class="full-span">
            <span>Mensaje</span>
            <textarea name="mensaje" required maxlength="3000"><?= e($field('mensaje')) ?></textarea>
            <?php if ($error('mensaje') !== ''): ?><small><?= e($error('mensaje')) ?></small><?php endif; ?>
        </label>

        <div class="form-actions full-span">
            <button class="button button-primary" type="submit">Enviar solicitud</button>
            <p>Responderemos a la brevedad.</p>
        </div>
    </form>
</section>
