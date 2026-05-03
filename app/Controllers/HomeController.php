<?php
declare(strict_types=1);

namespace App\Controllers;

final class HomeController extends BaseController
{
    public function index(): void
    {
        $this->view('pages/home', [
            'title' => 'AlmaDesign | Arquitectura de conocimiento e IA gobernada',
            'metaDescription' => 'AlmaDesign diseña arquitectura de conocimiento, procesos e inteligencia artificial gobernada para decisiones humanas complejas con trazabilidad y criterio humano.',
        ]);
    }
}
