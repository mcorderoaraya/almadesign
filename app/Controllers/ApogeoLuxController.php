<?php
declare(strict_types=1);

namespace App\Controllers;

final class ApogeoLuxController extends BaseController
{
    public function index(): void
    {
        $this->view('pages/apogeo-lux', [
            'title' => 'Apogeo Lux | IA jurídica gobernada y GraphRAG sobre normas BCN | AlmaDesign',
            'metaDescription' => 'Apogeo Lux es un producto de AlmaDesign que demuestra un MVP GraphRAG local funcional para demo sobre normas públicas BCN, con respuestas extractivas citadas, source_ref verificable y trazabilidad auditable.',
            'ogTitle' => 'Apogeo Lux | IA jurídica gobernada | AlmaDesign',
            'ogDescription' => 'MVP GraphRAG local funcional para demo sobre normas públicas BCN, con respuestas extractivas citadas, source_ref verificable y trazabilidad auditable.',
            'ogType' => 'website',
        ]);
    }
}
