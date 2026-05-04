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
            'metaDescription' => 'Apogeo transforma información crítica, dispersa y cambiante en conocimiento consultable, trazable y verificable para decisiones gerenciales mejor informadas.',
            'eyebrow' => 'Apogeo',
            'heading' => 'Apogeo para conocimiento aumentado y decisiones mejor informadas.',
            'lead' => 'Apogeo es la línea de productos de AlmaDesign orientada a transformar información crítica, dispersa y cambiante en conocimiento consultable, trazable y verificable.',
            'leadParagraphs' => [
                'Apogeo es la línea de productos de AlmaDesign orientada a transformar información crítica, dispersa y cambiante en conocimiento consultable, trazable y verificable.',
                'Está diseñado para organizaciones que necesitan tomar decisiones complejas con mejor contexto, reducir dependencia de información fragmentada y mantener evidencia clara sobre documentos, acuerdos, criterios y flujos de trabajo entre equipos o partes relacionadas.',
                'Apogeo no busca reemplazar el criterio profesional. Busca entregar a la gerencia una base de conocimiento más clara, conectada y gobernada para decidir con mayor seguridad.',
            ],
            'sections' => [
                [
                    'title' => 'El problema gerencial',
                    'body' => [
                        'En muchas organizaciones, la información clave para decidir está distribuida entre correos, documentos, carpetas compartidas, actas, contratos, reportes, planillas, normativas internas, conversaciones y memoria informal de los equipos.',
                        'Eso genera problemas concretos para la gerencia:',
                    ],
                    'items' => [
                        'Decisiones tomadas con información incompleta.',
                        'Pérdida de contexto entre áreas.',
                        'Dificultad para saber qué documento respalda una afirmación.',
                        'Duplicidad de versiones.',
                        'Falta de trazabilidad sobre acuerdos y criterios.',
                        'Dependencia excesiva de personas específicas.',
                        'Baja velocidad para reconstruir evidencia cuando aparece una auditoría, conflicto, negociación o decisión crítica.',
                        'Cuando el conocimiento no está conectado, la organización no solo pierde eficiencia. Pierde capacidad de comprender su propia operación.',
                    ],
                ],
                [
                    'title' => 'Qué es Apogeo',
                    'body' => [
                        'Apogeo es una arquitectura de conocimiento aumentado para organizaciones que necesitan consultar, conectar, compartir y validar información crítica bajo reglas de gobernanza.',
                        'Su valor no está en “buscar documentos” de forma aislada. Su valor está en convertir información dispersa en contexto útil para decisiones empresariales.',
                        'Apogeo permite que una gerencia pueda preguntar, revisar, contrastar y entender información relevante sin perder de vista:',
                    ],
                    'items' => [
                        'De dónde proviene cada dato.',
                        'Qué documento lo respalda.',
                        'Qué relación tiene con otros antecedentes.',
                        'Qué versión está vigente.',
                        'Qué parte debe validarlo.',
                        'Qué decisión humana depende de esa información.',
                    ],
                ],
                [
                    'title' => 'RAGK como concepto gerencial',
                    'body' => [
                        'RAGK no debe explicarse públicamente como una lista de tecnologías.',
                        'Para una gerencia, RAGK debe entenderse como una arquitectura de conocimiento confiable: una forma de recuperar contexto, conectar documentos, coordinar información y sostener decisiones con evidencia verificable.',
                        'En términos simples: RAGK convierte conocimiento disperso en información consultable, conectada, trazable y validable entre partes.',
                        'Su valor está en unir cuatro dimensiones:',
                    ],
                    'items' => [
                        'Recuperación de información relevante.',
                        'Conexión de conocimiento.',
                        'Flujo gobernado de información.',
                        'Evidencia verificable para decisiones humanas.',
                    ],
                ],
            ],
            'cardSections' => [
                [
                    'eyebrow' => 'Capacidades gerenciales',
                    'title' => 'Capacidades gerenciales de Apogeo',
                    'intro' => 'Apogeo ordena la información crítica como una base de conocimiento gobernada: consultable, conectada y verificable para que equipos ejecutivos decidan con mayor contexto.',
                    'keyLabel' => 'Valor gerencial',
                    'variant' => 'executive',
                    'items' => [
                        [
                            'title' => 'Recuperación contextual',
                            'body' => [
                                'La recuperación contextual permite encontrar información relevante no solo por palabras clave, sino por intención, propósito y contexto de decisión.',
                                'Para una gerencia, esto significa poder consultar información crítica sin depender de recordar el nombre exacto de un archivo, la carpeta donde fue guardado o quién lo envió.',
                                'Apogeo ayuda a responder preguntas como:',
                            ],
                            'items' => [
                                '¿Qué antecedentes respaldan esta decisión?',
                                '¿Qué documentos hablan de este tema?',
                                '¿Qué acuerdos previos existen?',
                                '¿Qué información relevante estamos omitiendo?',
                                '¿Qué evidencia debería revisar antes de avanzar?',
                            ],
                            'key' => 'Reduce incertidumbre antes de decidir.',
                        ],
                        [
                            'title' => 'Conocimiento conectado',
                            'body' => [
                                'Las organizaciones no toman decisiones con documentos aislados. Toman decisiones con relaciones: contratos relacionados con acuerdos, actas relacionadas con compromisos, reportes relacionados con indicadores y normativas relacionadas con riesgos.',
                                'Apogeo conecta documentos, conceptos, eventos, entidades y criterios para que la información deje de estar fragmentada.',
                                'Esto permite ver no solo “qué dice” un documento, sino cómo se relaciona con otros antecedentes relevantes.',
                            ],
                            'key' => 'Convierte información dispersa en una red de conocimiento útil.',
                        ],
                        [
                            'title' => 'Búsqueda inteligente empresarial',
                            'body' => [
                                'La búsqueda tradicional responde a palabras. Una búsqueda empresarial bien gobernada debe responder a contexto, roles, filtros, criterios y propósito.',
                                'Apogeo permite pensar la búsqueda como una herramienta para la gestión, no solo como un buscador de archivos.',
                                'Esto ayuda a gerencias y equipos directivos a encontrar información por tema, área, fecha, tipo de documento, decisión asociada, fuente, estado o relación con otros antecedentes.',
                            ],
                            'key' => 'Permite consultar conocimiento organizacional con criterios de negocio.',
                        ],
                        [
                            'title' => 'Mensajería segura entre partes',
                            'body' => [
                                'En muchas decisiones empresariales participan varias áreas, proveedores, asesores, clientes, instituciones o unidades relacionadas bajo un mismo objetivo.',
                                'El problema no es solo compartir información. El problema es compartirla con contexto, control, evidencia y trazabilidad.',
                                'Apogeo incorpora el concepto de comunicación confiable entre partes: intercambio de información crítica bajo reglas claras, validación documentada y resguardo del propósito de uso.',
                                'Cuando corresponda al marco técnico y contractual definido, esta capacidad puede considerar intercambio protegido, documentación verificable y validación entre partes.',
                            ],
                            'key' => 'Reduce ambigüedad en traspasos críticos de información.',
                        ],
                        [
                            'title' => 'Orquestación de información',
                            'body' => [
                                'La información empresarial no es estática. Cambia, se actualiza, se revisa, se aprueba, se corrige y se comparte.',
                                'Apogeo permite pensar el conocimiento como un flujo gobernado:',
                            ],
                            'items' => [
                                'Qué información entra.',
                                'Quién la valida.',
                                'Qué estado tiene.',
                                'Qué versión está vigente.',
                                'Qué evento la modifica.',
                                'Qué decisión depende de ella.',
                                'Qué parte debe recibirla o revisarla.',
                            ],
                            'key' => 'Transforma información dispersa en flujo controlado.',
                        ],
                        [
                            'title' => 'Documentación verificable',
                            'body' => [
                                'Una decisión empresarial importante debe poder explicarse después.',
                                'Apogeo pone foco en documentación verificable: información que puede ser revisada, versionada, contrastada y asociada a fuentes claras.',
                                'Esto no significa prometer validez legal automática ni certificación externa. Significa diseñar sistemas donde la organización pueda conservar evidencia útil sobre fuentes, versiones, criterios, responsables, validaciones, acuerdos y cambios relevantes.',
                            ],
                            'key' => 'Permite sostener decisiones con evidencia, no solo con memoria.',
                        ],
                        [
                            'title' => 'Trazabilidad documental',
                            'body' => [
                                'La trazabilidad documental permite responder preguntas críticas:',
                            ],
                            'items' => [
                                '¿De dónde salió esta información?',
                                '¿Qué documento la respalda?',
                                '¿Qué versión fue usada?',
                                '¿Quién debía revisarla?',
                                '¿Qué decisión se tomó a partir de ella?',
                                '¿Qué cambió después?',
                            ],
                            'key' => 'Mejora control, auditoría interna y confianza en las decisiones.',
                        ],
                        [
                            'title' => 'Validación entre partes',
                            'body' => [
                                'Cuando varias partes trabajan sobre información común, no basta con enviar documentos. Es necesario saber si fueron recibidos, revisados, aceptados, observados o reemplazados.',
                                'Apogeo incorpora el concepto de validación entre partes como una forma de ordenar acuerdos, revisiones y responsabilidades.',
                                'Esto puede aplicarse a contextos como:',
                            ],
                            'items' => [
                                'Trabajo entre áreas internas.',
                                'Relación con proveedores.',
                                'Revisión documental.',
                                'Procesos de aprobación.',
                                'Traspasos de información.',
                                'Coordinación entre organizaciones relacionadas.',
                            ],
                            'key' => 'Reduce zonas grises en coordinación y responsabilidad.',
                        ],
                    ],
                ],
            ],
            'guardrailsEyebrow' => 'Límites',
            'guardrailsTitle' => 'Qué no hace Apogeo',
            'guardrailsIntro' => 'Apogeo organiza, conecta y hace trazable el conocimiento para que las personas puedan decidir mejor.',
            'guardrails' => [
                'Apogeo no debe presentarse como una herramienta que decide por la organización.',
                'No reemplaza a gerentes, abogados, analistas, equipos técnicos ni profesionales responsables.',
                'No entrega asesoría legal automática.',
                'No promete decisiones perfectas.',
                'No convierte información incompleta en verdad.',
            ],
            'cta' => 'Conversar sobre Apogeo',
            'finalCta' => [
                'eyebrow' => 'Conversemos',
                'title' => 'Conversar sobre Apogeo',
                'body' => 'Si tu organización necesita ordenar información crítica, conectar evidencia y mejorar trazabilidad entre áreas o partes relacionadas, Apogeo puede ser una base para diseñar un sistema de conocimiento aumentado con foco gerencial.',
                'label' => 'Conversar sobre Apogeo',
                'href' => url('/contacto'),
            ],
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
