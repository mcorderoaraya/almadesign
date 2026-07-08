<?php
declare(strict_types=1);

namespace App\Controllers;

final class ApogeoLuxController extends BaseController
{
    public function index(): void
    {
        $this->view('pages/apogeo-lux', [
            'title' => 'Apogeo Lux | Consulta jurídica confiable y arquitectura GraphRAG | AlmaDesign',
            'metaDescription' => 'Apogeo Lux es la visión de AlmaDesign para una solución de consulta jurídica confiable sobre normas, leyes chilenas, jurisprudencia, fuentes verificables y trazabilidad avanzada.',
            'ogTitle' => 'Apogeo Lux | Consulta jurídica confiable | AlmaDesign',
            'ogDescription' => 'Nuestra visión es reunir consulta normativa, relaciones entre fuentes, contexto jurídico, trazabilidad, jurisprudencia y criterio humano en una arquitectura GraphRAG gobernada.',
            'ogType' => 'website',
        ]);
    }
}
