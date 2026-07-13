<?php declare(strict_types=1); ?>
<section class="dashboard-auth" aria-labelledby="dashboard-2fa-title">
    <div class="dashboard-auth__panel">
        <p class="eyebrow">Verificación en dos pasos</p>
        <h1 id="dashboard-2fa-title">Ingrese su código 2FA.</h1>
        <p class="dashboard-muted"><?= e($email ?? '') ?></p>
        <?php if (isset($error) && is_string($error)): ?>
            <p class="dashboard-alert"><?= e($error) ?></p>
        <?php endif; ?>
        <form class="dashboard-form" method="post" action="<?= e(url('/dashboard/2fa')) ?>">
            <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
            <label>
                Código de 6 dígitos
                <input type="text" name="code" inputmode="numeric" pattern="[0-9]{6}" autocomplete="one-time-code" maxlength="6" required>
            </label>
            <button class="button button-primary" type="submit">Verificar</button>
        </form>
    </div>
</section>
