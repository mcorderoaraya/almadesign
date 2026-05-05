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
            'sections' => [],
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
            'sections' => [],
            'architectureSection' => [
                'eyebrow' => 'Arquitecturas Apogeo',
                'title' => 'Tres formas de estructurar contexto y conocimiento.',
                'body' => 'Apogeo aborda distintos niveles de madurez en recuperación, relación y gobernanza del conocimiento. Estas tres aproximaciones permiten avanzar desde la consulta contextual hasta sistemas de conocimiento más conectados, trazables y coordinados.',
                'cards' => [
                    [
                        'title' => 'RAG',
                        'body' => 'Recuperación contextual de información relevante a partir de documentos y fuentes disponibles, para responder mejor una consulta sin depender de búsqueda manual dispersa.',
                        'micro' => 'Primer nivel de conocimiento aumentado.',
                        'image' => 'img/apogeo/apogeo-rag-card.webp',
                        'alt' => 'Diagrama abstracto de búsqueda contextual conectando una pregunta con documentos recuperados.',
                    ],
                    [
                        'title' => 'GraphRAG',
                        'body' => 'Expande la recuperación incorporando relaciones entre conceptos, documentos, eventos y entidades, para construir respuestas con mayor profundidad de contexto y conexión entre antecedentes.',
                        'micro' => 'Contexto enriquecido por relaciones.',
                        'image' => 'img/apogeo/apogeo-graphrag-card.webp',
                        'alt' => 'Diagrama abstracto de nodos y relaciones entre piezas de información.',
                    ],
                    [
                        'title' => 'RAGK',
                        'body' => 'Integra recuperación, conocimiento conectado, trazabilidad y flujo gobernado de información para sostener respuestas compuestas, validables y útiles en decisiones humanas complejas.',
                        'micro' => 'Conocimiento confiable para decisiones complejas.',
                        'image' => 'img/apogeo/apogeo-ragk-card.webp',
                        'alt' => 'Diagrama abstracto de un flujo gobernado con recuperación, relaciones, validación y respuesta trazable.',
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
            'infographicSection' => [
                'eyebrow' => 'Arquitectura RAGK',
                'title' => 'Cómo Apogeo organiza el contexto para decisiones complejas.',
                'body' => 'Desde una consulta inicial hasta la construcción de una respuesta compuesta con trazabilidad, relaciones documentales y validación contextual.',
                'image' => 'img/apogeo/infografia-ragk.webp',
                'alt' => 'Proceso RAGK desde la pregunta hasta una respuesta compuesta con trazabilidad y validación humana.',
                'caption' => 'La arquitectura articula recuperación contextual, relaciones documentales, flujo gobernado de información y evidencia verificable para sostener respuestas compuestas con criterio humano.',
                'concept' => [
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
            'postSections' => [],
            'limitsSection' => [
                'eyebrow' => 'Límites y alcance',
                'title' => 'Qué no hace Apogeo',
                'lead' => 'Apogeo está diseñado para ordenar conocimiento, conectar evidencia y mejorar la trazabilidad de información crítica. Su valor está en apoyar decisiones humanas mejor informadas, no en sustituir el criterio profesional ni automatizar responsabilidades que deben permanecer bajo control humano.',
                'body' => [
                    'En contextos empresariales complejos, una respuesta rápida no siempre es una buena respuesta. Por eso Apogeo no debe entenderse como una herramienta que decide por la organización, sino como una arquitectura que ayuda a reunir contexto, relacionar antecedentes, identificar fuentes y hacer visible la evidencia disponible.',
                    'La decisión final sigue perteneciendo a las personas responsables: gerencias, equipos técnicos, asesores, analistas, abogados, comités o cualquier rol humano encargado de evaluar el contexto y asumir responsabilidad sobre una acción.',
                ],
                'items' => [
                    [
                        'title' => 'Apogeo no reemplaza criterio profesional',
                        'body' => 'Apogeo no reemplaza a gerentes, abogados, analistas, equipos técnicos ni profesionales responsables. Puede ayudar a ordenar información, recuperar antecedentes y mostrar relaciones relevantes, pero no sustituye experiencia, responsabilidad, juicio experto ni deliberación humana.',
                    ],
                    [
                        'title' => 'Apogeo no entrega asesoría legal automática',
                        'body' => 'Cuando Apogeo se aplica a información normativa, contractual o documental sensible, su función es apoyar búsqueda, trazabilidad y comprensión de fuentes. No debe presentarse como asesoría legal automática, dictamen jurídico ni reemplazo de revisión profesional especializada.',
                    ],
                    [
                        'title' => 'Apogeo no promete decisiones perfectas',
                        'body' => 'Ningún sistema de conocimiento elimina la incertidumbre por completo. Apogeo reduce desorden, mejora acceso a evidencia y permite revisar contexto con mayor claridad, pero no garantiza resultados perfectos ni transforma información incompleta en certeza absoluta.',
                    ],
                    [
                        'title' => 'Apogeo no convierte información incompleta en verdad',
                        'body' => 'Si una organización trabaja con documentos desactualizados, criterios ambiguos o fuentes incompletas, Apogeo puede ayudar a hacer visible esa brecha. Pero no debe ocultarla ni presentar como concluyente aquello que requiere validación, revisión o actualización humana.',
                    ],
                    [
                        'title' => 'Apogeo no elimina la responsabilidad humana',
                        'body' => 'La trazabilidad existe precisamente para que las decisiones puedan ser revisadas, explicadas y asumidas por personas. Apogeo ayuda a construir una base de conocimiento más clara, pero la responsabilidad sobre decisiones críticas debe permanecer en manos humanas.',
                    ],
                ],
                'closing' => 'En síntesis, Apogeo organiza, conecta y hace trazable el conocimiento para que las personas puedan decidir mejor. Su propósito no es reemplazar el juicio humano, sino fortalecerlo con contexto, evidencia y gobernanza.',
            ],
            'guardrails' => [],
            'cta' => 'Conversar sobre Apogeo',
            'finalCta' => [
                'eyebrow' => 'Conversemos',
                'title' => 'Conversar sobre Apogeo',
                'body' => 'Si tu organización necesita ordenar información crítica, conectar evidencia y mejorar trazabilidad entre áreas o partes relacionadas, Apogeo puede ser una base para diseñar un sistema de conocimiento aumentado con foco gerencial.',
                'label' => 'Conversar sobre Apogeo',
                'href' => url('/contacto'),
                'variant' => 'apogeo',
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
