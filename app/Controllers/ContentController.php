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
            ],
            'cardSections' => [
                [
                    'title' => 'Enfoque AlmaDesign',
                    'intro' => 'No partimos por la herramienta. Partimos por la realidad de la organización. Nuestro enfoque busca ordenar procesos, criterios y decisiones antes de automatizar, para que la inteligencia artificial se integre con claridad, trazabilidad y sentido humano.',
                    'items' => [
                        [
                            'title' => 'Diagnóstico de fricciones internas',
                            'body' => 'Identificamos los puntos donde la organización pierde claridad, tiempo o capacidad de decisión: tareas duplicadas, información dispersa, cuellos de botella, responsabilidades ambiguas y procesos que dependen de memoria informal o coordinación manual.',
                            'key' => 'Ver la fricción antes de escalarla.',
                        ],
                        [
                            'title' => 'Levantamiento de procesos reales',
                            'body' => 'Observamos cómo funciona la organización en la práctica, no solo cómo aparece en un organigrama o procedimiento formal. Levantamos el recorrido real de la información, las decisiones, los actores involucrados y los documentos que sostienen el trabajo cotidiano.',
                            'key' => 'Trabajar sobre la operación real, no sobre la versión idealizada.',
                        ],
                        [
                            'title' => 'Priorización de casos de uso',
                            'body' => 'No todo debe automatizarse al mismo tiempo ni con la misma profundidad. Priorizamos los casos de uso según impacto, factibilidad, riesgo, costo de adopción y valor para la organización.',
                            'key' => 'Elegir mejor antes de implementar más.',
                        ],
                        [
                            'title' => 'Diseño de guardrails y criterios humanos',
                            'body' => 'Definimos límites, reglas de uso y puntos de supervisión para que la tecnología opere dentro de un marco claro. Esto incluye criterios de validación, decisiones que deben seguir bajo control humano, manejo de excepciones y resguardo de la trazabilidad.',
                            'key' => 'Gobernar antes de delegar.',
                        ],
                        [
                            'title' => 'Roadmap de implementación',
                            'body' => 'Traducimos el diagnóstico en una hoja de ruta clara: etapas, dependencias, prioridades, responsables y secuencia de avance. El roadmap ordena qué se hace primero, qué condiciones deben existir y cómo se articula el proceso sin improvisación.',
                            'key' => 'Pasar de la intención a una secuencia ejecutable.',
                        ],
                        [
                            'title' => 'Acompañamiento en adopción responsable',
                            'body' => 'La implementación no termina cuando una herramienta queda disponible. Acompañamos la adopción para que las personas comprendan el sistema, integren nuevos criterios de trabajo y desarrollen confianza en el uso responsable de la tecnología.',
                            'key' => 'Adoptar con sentido, no solo activar herramientas.',
                        ],
                    ],
                ],
                [
                    'title' => 'Qué se entrega',
                    'intro' => 'El resultado de una consultoría no debe ser una promesa abstracta. Debe dejar claridad accionable: procesos entendidos, oportunidades priorizadas, riesgos visibles y un camino de implementación que la organización pueda evaluar, gobernar y ejecutar.',
                    'items' => [
                        [
                            'title' => 'Mapa de procesos y fricciones',
                            'body' => 'Documento estructurado que muestra cómo fluye realmente el trabajo: procesos, actores, documentos, decisiones, dependencias y puntos donde se genera fricción operativa. Permite ver con claridad dónde se pierde tiempo, trazabilidad o capacidad de decisión.',
                            'key' => 'Convertir operación dispersa en mapa comprensible.',
                        ],
                        [
                            'title' => 'Priorización de oportunidades IA',
                            'body' => 'Matriz de oportunidades que ordena posibles casos de uso según impacto, factibilidad, riesgo, costo de adopción y valor estratégico. Ayuda a decidir qué iniciativas conviene abordar primero y cuáles deben esperar.',
                            'key' => 'No todo lo posible es prioritario.',
                        ],
                        [
                            'title' => 'Riesgos, límites y guardrails',
                            'body' => 'Identificación de riesgos operativos, humanos, técnicos y de gobernanza asociados a cada caso de uso. Incluye límites de automatización, controles mínimos, criterios de validación y puntos donde la supervisión humana debe permanecer activa.',
                            'key' => 'La IA necesita bordes antes de operar.',
                        ],
                        [
                            'title' => 'Recomendaciones de implementación',
                            'body' => 'Conjunto de recomendaciones prácticas para avanzar desde el diagnóstico hacia soluciones viables. Incluye criterios técnicos, organizacionales y humanos para reducir improvisación y evitar adoptar herramientas que no resuelven el problema real.',
                            'key' => 'Implementar con criterio, no por impulso.',
                        ],
                        [
                            'title' => 'Roadmap técnico-operativo',
                            'body' => 'Plan de avance por etapas que ordena prioridades, dependencias, responsables, decisiones pendientes y condiciones mínimas para implementar. Permite pasar de una intención general a una secuencia concreta y gobernable.',
                            'key' => 'Una ruta clara reduce fricción y riesgo.',
                        ],
                        [
                            'title' => 'Criterios de adopción y supervisión humana',
                            'body' => 'Marco de criterios para que la organización sepa cómo usar, validar y supervisar soluciones con IA. Define cuándo la tecnología puede asistir, cuándo debe escalar a revisión humana y qué evidencia debe conservarse.',
                            'key' => 'La decisión crítica sigue siendo humana.',
                        ],
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
