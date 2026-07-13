<?php declare(strict_types=1); ?>
<section class="dashboard-auth" aria-labelledby="dashboard-login-title">
    <div class="dashboard-auth__panel">
        <p class="eyebrow">AlmaDesign Admin</p>
        <h1 id="dashboard-login-title">Acceso seguro.</h1>
        <?php if (isset($error) && is_string($error)): ?>
            <p class="dashboard-alert"><?= e($error) ?></p>
        <?php endif; ?>
        <form class="dashboard-form" method="post" action="<?= e(url('/dashboard/login')) ?>">
            <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
            <label>
                Email
                <input type="email" name="email" autocomplete="username" required>
            </label>
            <label>
                Contraseña
                <input type="password" name="password" autocomplete="current-password" required>
            </label>
            <button class="button button-primary" type="submit">Continuar</button>
        </form>
    </div>
</section>
