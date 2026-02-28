<?php
declare(strict_types=1);

/**
 * Golden path CLI test
 * Ejecutar desde la raíz del worktree:
 *   php cline/golden_path_test.php
 */

$tests = [
    ['GET', '/',          true,  'Root: servicio operativo'],
    ['GET', '/health',    true,  'Health: sistema saludable'],
    ['GET', '/notfound',  false, 'NotFound: 404 esperado'],
    ['GET', '/users/abc', false, 'Users/abc: constraint \d+ rechaza letras → 404'],
];

$pass = 0;
$fail = 0;

foreach ($tests as [$method, $path, $expectSuccess, $label]) {
    $_SERVER['REQUEST_METHOD'] = $method;
    $_SERVER['REQUEST_URI']    = $path;
    $_SERVER['HTTP_HOST']      = 'almadesign.local';
    $_GET  = [];
    $_POST = [];

    ob_start();
    try {
        include __DIR__ . '/../public/index.php';
    } catch (Throwable $e) {
        ob_end_clean();
        printf("[FAIL] %s %s — EXCEPCIÓN: %s\n", $method, $path, $e->getMessage());
        $fail++;
        continue;
    }

    $output = ob_get_clean();
    $data   = json_decode($output, true);

    $actualSuccess = is_array($data) ? (bool)($data['success'] ?? false) : null;

    if ($actualSuccess === $expectSuccess) {
        printf("[PASS] %s %s → success=%s  (%s)\n", $method, $path, $expectSuccess ? 'true' : 'false', $label);
        $pass++;
    } else {
        $actual = is_null($actualSuccess) ? 'JSON_INVÁLIDO' : ($actualSuccess ? 'true' : 'false');
        printf("[FAIL] %s %s → esperado success=%s, obtenido=%s  output: %s\n",
            $method, $path,
            $expectSuccess ? 'true' : 'false',
            $actual,
            substr($output, 0, 100)
        );
        $fail++;
    }
}

echo PHP_EOL;
printf("Resultado: %d/%d pasados\n", $pass, $pass + $fail);
exit($fail > 0 ? 1 : 0);
