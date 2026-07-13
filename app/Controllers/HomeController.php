<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Services\ContentRepository;
use App\Services\Database;
use Throwable;

final class HomeController extends BaseController
{
    public function index(): void
    {
        try {
            $content = (new ContentRepository(Database::pdo($this->config)))
                ->publishedPageBySlug('home');

            if ($content !== null) {
                $this->view('pages/home', [
                    'title' => (string) $content['page']['title'],
                    'metaDescription' => (string) $content['page']['meta_description'],
                    'page' => $content['page'],
                    'sections' => $content['sections'],
                    'contentSource' => 'postgresql',
                ]);
                return;
            }
        } catch (Throwable) {
            // Si la DB no está disponible, el home público mantiene el render PHP original.
        }

        $this->view('pages/home', [
            'title' => 'AlmaDesign | Charlas, software a medida y asistentes IA',
            'metaDescription' => 'AlmaDesign crea charlas, gestión documental, asistentes personales 24/7, software a medida y soluciones de orquestación con IA para ordenar procesos y decisiones.',
        ]);
    }
}
