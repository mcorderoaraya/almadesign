<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;

abstract class BaseController
{
    /**
     * @param array<string, mixed> $config
     */
    public function __construct(protected readonly array $config)
    {
    }

    /**
     * @param array<string, mixed> $data
     */
    protected function view(string $view, array $data = []): void
    {
        View::render($view, array_merge([
            'config' => $this->config,
        ], $data));
    }
}
