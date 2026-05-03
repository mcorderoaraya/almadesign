<?php
declare(strict_types=1);

namespace App\Controllers;

final class ContentController extends BaseController
{
    public function consulting(): void
    {
        $this->view('pages/vertical-detail', [
            'title' => 'Consultoría de inteligencia artificial y procesos | AlmaDesign',
            'metaDescription' => 'Consultoría IA para empresas que necesitan ordenar procesos, diagnosticar fricciones internas e implementar inteligencia artificial con gobernanza y trazabilidad.',
            'eyebrow' => 'Consultoría IA y procesos',
            'heading' => 'Consultoría de inteligencia artificial y procesos para empresas.',
            'lead' => 'Antes de automatizar, ordenamos procesos, fricciones, criterios y responsabilidades. AlmaDesign ayuda a organizaciones a identificar dónde la IA puede aportar valor real y cómo implementarla con trazabilidad, gobernanza y control humano.',
            'sections' => [
                [
                    'title' => 'El problema',
                    'body' => 'Muchas organizaciones quieren usar IA, pero sus procesos, documentos, responsabilidades y criterios de decisión están dispersos. En ese contexto, automatizar puede aumentar el desorden en vez de resolverlo.',
                ],
                [
                    'title' => 'Enfoque AlmaDesign',
                    'items' => [
                        'Diagnóstico de fricciones internas.',
                        'Levantamiento de procesos reales.',
                        'Priorización de casos de uso.',
                        'Diseño de guardrails y criterios humanos.',
                        'Roadmap de implementación.',
                        'Acompañamiento en adopción responsable.',
                    ],
                ],
                [
                    'title' => 'Qué se entrega',
                    'items' => [
                        'Mapa de procesos y fricciones.',
                        'Priorización de oportunidades IA.',
                        'Riesgos, límites y guardrails.',
                        'Recomendaciones de implementación.',
                        'Roadmap técnico-operativo.',
                        'Criterios de adopción y supervisión humana.',
                    ],
                ],
            ],
            'guardrails' => [
                'No se promete automatización sin validación humana.',
                'No se prometen diagnósticos profundos como gratuitos.',
                'No se promete reducción de costos sin evidencia ni evaluación.',
            ],
            'cta' => 'Solicitar diagnóstico',
        ]);
    }

    public function apogeo(): void
    {
        $this->view('pages/vertical-detail', [
            'title' => 'Apogeo | Conocimiento aumentado y documentación verificable',
            'metaDescription' => 'Apogeo desarrolla sistemas de conocimiento aumentado para recuperar contexto, conectar información crítica y sostener decisiones con trazabilidad documental.',
            'eyebrow' => 'Apogeo',
            'heading' => 'Apogeo para conocimiento aumentado y decisiones mejor informadas.',
            'lead' => 'Apogeo organiza información crítica para que equipos humanos puedan recuperar contexto, entender trazabilidad y trabajar con documentación verificable bajo reglas de gobernanza.',
            'sections' => [
                [
                    'title' => 'Qué es Apogeo',
                    'body' => 'Apogeo es la línea de productos de AlmaDesign orientada a sistemas de conocimiento aumentado para contextos donde la información es extensa, sensible, cambiante o compartida entre organizaciones relacionadas bajo un mismo propósito.',
                ],
                [
                    'title' => 'Qué resuelve',
                    'items' => [
                        'Información consultada con contexto.',
                        'Fuentes conectadas y trazables.',
                        'Intercambio protegido de información entre partes.',
                        'Documentación verificable.',
                        'Trazabilidad documental para decisiones humanas complejas.',
                    ],
                ],
                [
                    'title' => 'Capacidades conceptuales',
                    'items' => [
                        'Recuperación contextual.',
                        'Conocimiento conectado.',
                        'Búsqueda inteligente empresarial.',
                        'Mensajería segura.',
                        'Orquestación de información.',
                        'Documentación verificable.',
                    ],
                ],
            ],
            'guardrails' => [
                'No se presenta como entrega de decisiones profesionales automatizadas.',
                'No se presenta como reemplazo de profesionales.',
                'No se presenta como plataforma SaaS lista para venta masiva.',
                'No se promete asesoría legal automática.',
            ],
            'cta' => 'Conversar sobre Apogeo',
        ]);
    }

    public function aiForHumans(): void
    {
        $this->view('pages/vertical-detail', [
            'title' => 'AI for Humans | IA gobernada para proteger y potenciar al humano',
            'metaDescription' => 'AI for Humans es la visión de AlmaDesign para diseñar inteligencia artificial gobernada que protege, potencia y no reemplaza el criterio humano.',
            'eyebrow' => 'AI for Humans',
            'heading' => 'AI for Humans: IA gobernada para proteger y potenciar al humano.',
            'lead' => 'AI for Humans es nuestra forma de diseñar inteligencia artificial: sistemas que protegen, potencian y no reemplazan al humano.',
            'sections' => [
                [
                    'title' => 'Principio',
                    'body' => 'IA gobernada para proteger, potenciar y no reemplazar al humano. Cada palabra funciona como restricción de diseño.',
                ],
                [
                    'title' => 'Proteger',
                    'body' => 'Proteger significa resguardar privacidad, tiempo, criterio profesional, dignidad y límites humanos.',
                ],
                [
                    'title' => 'Potenciar',
                    'body' => 'Potenciar significa aumentar la capacidad humana de comprender, crear, decidir y actuar con mayor claridad.',
                ],
                [
                    'title' => 'Aplicaciones posibles',
                    'items' => [
                        'Asistentes personales gobernados.',
                        'Sistemas de apoyo a decisiones.',
                        'Organización de conocimiento personal.',
                        'Productividad consciente.',
                        'Gobernanza previa a la automatización.',
                    ],
                ],
            ],
            'guardrails' => [
                'No se delegan decisiones críticas al modelo.',
                'No se diseña reemplazo humano.',
                'No se prometen resultados de productividad sin evidencia.',
            ],
            'cta' => 'Explorar AI for Humans',
        ]);
    }
}
