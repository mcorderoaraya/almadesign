<?php
declare(strict_types=1);

namespace App\Controllers;

final class HomeController extends BaseController
{
    public function index(): void
    {
        $this->view('pages/home', [
            'title' => 'AlmaDesign | Charlas, software a medida y asistentes IA',
            'metaDescription' => 'AlmaDesign crea charlas, gestión documental, asistentes personales 24/7, software a medida y soluciones de orquestación con IA para ordenar procesos y decisiones.',
        ]);
    }
}
