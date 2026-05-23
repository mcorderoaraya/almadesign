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
                    'anchor' => 'enfoque-almadesign',
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
                            'anchor' => 'gobernanza',
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
                    'anchor' => 'que-se-entrega',
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
                [
                    'title' => 'No se promete automatización sin validación humana.',
                    'body' => 'Toda automatización debe tener un propósito claro, responsables definidos y criterios de revisión. La IA puede apoyar procesos, ordenar información y reducir carga operativa, pero las decisiones relevantes deben mantenerse bajo supervisión humana.',
                ],
                [
                    'title' => 'No se prometen diagnósticos profundos como gratuitos.',
                    'body' => 'Una conversación inicial puede ayudar a entender el problema. Un diagnóstico serio requiere revisar procesos reales, documentos, restricciones, responsabilidades y prioridades. AlmaDesign distingue claramente entre una orientación inicial y una evaluación técnica u organizacional profunda.',
                ],
                [
                    'title' => 'No se promete reducción de costos sin evidencia ni evaluación.',
                    'body' => 'La eficiencia debe demostrarse con datos, medición y análisis del impacto real. No se ofrecen porcentajes, ahorros ni resultados asegurados sin revisar antes el contexto operativo, los costos actuales, los riesgos y la capacidad de adopción de la organización.',
                ],
            ],
            'guardrailsAnchor' => 'que-no-se-promete',
            'guardrailsSecondaryAnchors' => [
                'limites-explicitos-de-comunicacion',
            ],
            'finalCtaAnchor' => 'conversemos',
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
            'heroAnchor' => 'que-es-apogeo',
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
                        'anchor' => 'rag',
                        'title' => 'RAG',
                        'body' => 'Recuperación contextual de información relevante a partir de documentos y fuentes disponibles, para responder mejor una consulta sin depender de búsqueda manual dispersa.',
                        'micro' => 'Primer nivel de conocimiento aumentado.',
                        'image' => 'img/apogeo/apogeo-rag-card.webp',
                        'alt' => 'Diagrama abstracto de búsqueda contextual conectando una pregunta con documentos recuperados.',
                    ],
                    [
                        'anchor' => 'graphrag',
                        'title' => 'GraphRAG',
                        'body' => 'Expande la recuperación incorporando relaciones entre conceptos, documentos, eventos y entidades, para construir respuestas con mayor profundidad de contexto y conexión entre antecedentes.',
                        'micro' => 'Contexto enriquecido por relaciones.',
                        'image' => 'img/apogeo/apogeo-graphrag-card.webp',
                        'alt' => 'Diagrama abstracto de nodos y relaciones entre piezas de información.',
                    ],
                    [
                        'anchor' => 'ragk',
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
                    'anchor' => 'que-resuelve',
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
                    'anchor' => 'ragk-como-concepto-gerencial',
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
                'anchor' => 'limites-explicitos',
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
            'finalCtaAnchor' => 'conversemos',
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
            'title' => 'AI for Humans | Manifiesto público de AlmaDesign',
            'metaDescription' => 'AI for Humans es el manifiesto público de AlmaDesign: inteligencia artificial gobernada para proteger, potenciar y no reemplazar al humano.',
            'pageClass' => 'ai-for-humans-manifest',
            'eyebrow' => 'AI for Humans',
            'heading' => 'AI for Humans',
            'lead' => 'Inteligencia artificial gobernada para proteger, potenciar y no reemplazar al humano.',
            'heroAnchor' => 'manifiesto',
            'sections' => [],
            'audioCard' => [
                'eyebrow' => 'Audio',
                'title' => 'IA que protege y no reemplaza',
                'body' => 'Audio creado con NotebookLM como resumen del manifiesto AI for Humans de AlmaDesign.',
                'file' => 'audio/ia-que-protege-y-no-reemplaza.m4a',
            ],
            'manifestSections' => [
                [
                    'title' => 'AI for Humans',
                    'subtitle' => 'Manifiesto público de AlmaDesign',
                    'body' => [
                        'AI for Humans es la postura fundacional de AlmaDesign frente a la inteligencia artificial.',
                        'No nace como una frase de moda, ni como una promesa técnica, ni como una declaración cómoda para acompañar una página web. Nace desde una convicción más profunda: la tecnología solo tiene verdadero sentido cuando amplía la capacidad humana de crear, comprender, decidir y vivir con mayor dignidad.',
                        'Durante demasiado tiempo, el acceso a la creación, al conocimiento, a la producción y al desarrollo dependió de recursos que no siempre estaban al alcance de todos. Una cámara, un estudio, un equipo, una red de contactos, una gran empresa, una formación técnica, una infraestructura costosa o una oportunidad precisa podían determinar quién podía crear y quién debía postergar su vocación.',
                        'La inteligencia artificial cambia esa frontera.',
                        'Cuando está bien diseñada, la IA puede devolver herramientas. Puede abrir caminos. Puede ampliar capacidades que antes dependían del capital, de la industria, de la ubicación, de la suerte o del acceso a tecnologías reservadas para pocos. Pero esa potencia no es neutra. También puede invadir, vigilar, reemplazar, acelerar sin sentido y reducir a las personas a métricas de eficiencia.',
                        'Por eso AlmaDesign adopta AI for Humans como manifiesto público: porque no toda inteligencia artificial merece ser construida, no toda automatización representa progreso y no toda eficiencia justifica el costo humano que puede producir.',
                    ],
                    'quote' => 'AI for Humans afirma una dirección: la IA debe estar al servicio del ser humano, no el ser humano al servicio de la IA.',
                ],
                [
                    'anchor' => 'origen',
                    'title' => 'El origen de una convicción',
                    'body' => [
                        'AlmaDesign nace desde una experiencia concreta: la tecnología puede devolver capacidad.',
                        'Hay personas que no dejaron de crear porque les faltara imaginación. Dejaron de crear porque les faltaban medios. Hay personas que no dejaron de aprender porque les faltara inteligencia. Dejaron de avanzar porque el entorno no ofrecía las herramientas, los espacios o las oportunidades necesarias. Hay personas que terminaron reinventándose no por elección ideal, sino porque el camino original se volvió inaccesible.',
                        'En esa tensión aparece una verdad profunda: el talento humano no siempre fracasa por falta de valor interior. Muchas veces queda detenido por falta de instrumentos.',
                        'AI for Humans nace desde esa herida y desde esa posibilidad. La inteligencia artificial, cuando se gobierna correctamente, puede convertirse en una herramienta de restitución. Puede devolver lenguaje visual a quien no tuvo estudio fotográfico. Puede devolver composición sonora a quien no tuvo instrumentos. Puede devolver capacidad técnica a quien aprendió por necesidad. Puede devolver claridad a quien lleva años acumulando experiencia sin una estructura que le permita convertirla en sistema.',
                        'Pero devolver capacidad no significa reemplazar al humano. Significa darle más superficie para actuar. Significa permitir que una persona piense, cree, diseñe, decida y exprese con mayor alcance.',
                    ],
                    'quote' => 'La tecnología correcta no borra la historia humana. La prolonga.',
                ],
                [
                    'anchor' => 'humano-al-centro',
                    'title' => 'La IA no debe ocupar el lugar del humano',
                    'body' => [
                        'La inteligencia artificial no debe ocupar el centro. El centro le pertenece al ser humano.',
                        'No al algoritmo. No al mercado. No a la plataforma. No a la automatización. No a la promesa de productividad infinita.',
                        'El ser humano es quien imagina, quien interpreta, quien se equivoca, quien aprende, quien cuida, quien decide y quien asume responsabilidad por las consecuencias de sus actos. La IA puede asistir muchos de esos procesos, pero no puede apropiarse del sentido que los sostiene.',
                        'Cuando una organización adopta IA sin esta claridad, corre el riesgo de confundir velocidad con avance. Puede automatizar procesos que todavía no comprende. Puede medir eficiencia mientras destruye criterio. Puede reducir tiempos mientras aumenta ansiedad. Puede delegar decisiones sin saber quién responde cuando algo falla.',
                        'AI for Humans plantea lo contrario. Antes de automatizar, hay que comprender. Antes de escalar, hay que gobernar. Antes de delegar, hay que definir límites. Antes de medir productividad, hay que preguntarse qué tipo de vida laboral, creativa y mental se está construyendo.',
                    ],
                    'quote' => 'La IA no debe ocupar el lugar del humano. Debe ampliar su campo de posibilidad.',
                ],
                [
                    'anchor' => 'proteger',
                    'title' => 'Proteger',
                    'body' => [
                        'Proteger es la primera palabra del manifiesto porque la potencia sin protección se transforma en riesgo.',
                        'Una inteligencia artificial verdaderamente humana no debe invadir todos los espacios disponibles. No debe convertir el trabajo en vigilancia permanente. No debe empujar a las personas a producir más sin preguntarse qué ocurre con su foco, su descanso, su salud mental o su dignidad. No debe transformar cada dato personal en materia prima disponible para optimizar sistemas que la persona no comprende ni controla.',
                        'Proteger significa diseñar con límites.',
                        'Significa respetar el tiempo humano, porque el tiempo no es solo una variable de productividad; es también vida, recuperación, vínculo, creatividad y silencio. Significa respetar el espacio personal, porque ninguna herramienta debería borrar la frontera entre trabajar, pensar, descansar y existir. Significa proteger el criterio profesional, porque una persona no debe ser desplazada por una recomendación automática que nadie puede explicar. Significa proteger la privacidad, porque la confianza no puede construirse sobre extracción invisible de datos.',
                        'Para AlmaDesign, proteger no es frenar la innovación. Es darle dirección.',
                        'Una tecnología que no protege termina exigiendo adaptación humana permanente. AI for Humans invierte esa lógica: la IA debe adaptarse al ser humano, a sus límites, a su contexto, a sus responsabilidades y a su necesidad de seguir siendo sujeto de decisión.',
                        'Proteger es reconocer que el progreso técnico no vale lo mismo si debilita a las personas que pretende ayudar.',
                    ],
                ],
                [
                    'anchor' => 'potenciar',
                    'title' => 'Potenciar',
                    'body' => [
                        'Potenciar no significa exigir más rendimiento hasta agotar a la persona.',
                        'Potenciar significa entregar mejores instrumentos para pensar, crear y decidir. Significa reducir ruido para que aparezca claridad. Significa ordenar información dispersa para que el criterio humano pueda actuar con mayor profundidad. Significa transformar tareas repetitivas en procesos asistidos, no para eliminar valor humano, sino para liberar energía hacia lo que realmente requiere presencia, interpretación y creatividad.',
                        'La IA puede ser un amplificador cognitivo. Puede ayudar a una persona a comparar alternativas, explorar ideas, resumir documentos, encontrar patrones, organizar proyectos, producir imágenes, escribir mejor, diseñar sistemas o traducir intuiciones en estructuras. Pero amplificar no es sustituir. Un amplificador aumenta una señal que ya existe. No inventa el alma de quien crea.',
                        'Por eso AI for Humans entiende la IA como instrumento de expansión humana.',
                        'Una persona potenciada por IA no es menos humana. Puede ser más libre frente a tareas que antes consumían su tiempo, más capaz de convertir ideas en obra, más rápida para aprender, más fuerte para enfrentar complejidad y más consciente de sus propias decisiones.',
                        'Potenciar es devolver margen.',
                        'Margen para crear. Margen para aprender. Margen para decidir. Margen para equivocarse menos por falta de información. Margen para trabajar con mayor profundidad y no solo con mayor velocidad.',
                    ],
                    'quote' => 'La IA bien diseñada no reemplaza la chispa humana. Le entrega oxígeno.',
                ],
                [
                    'anchor' => 'no-reemplazar',
                    'title' => 'No reemplazar',
                    'body' => [
                        'No reemplazar no es una frase defensiva. Es una frontera ética.',
                        'La IA puede asistir, sugerir, clasificar, ordenar, redactar, explicar, buscar, resumir, conectar y alertar. Pero no debe apropiarse de aquello que exige juicio, responsabilidad, sensibilidad, experiencia y contexto humano.',
                        'Hay decisiones que no pueden reducirse a una salida estadística. Hay momentos donde el dato no basta. Hay situaciones donde importa la historia, el tono, el impacto, la consecuencia y la persona que queda al otro lado de la decisión. La IA puede acompañar ese proceso, pero no debe convertirse en autoridad final por comodidad, presión económica o fascinación tecnológica.',
                        'No reemplazar significa que el criterio humano permanece vivo.',
                        'También significa rechazar una visión empobrecida del trabajo humano. Una persona no es solo una secuencia de tareas. Es memoria, oficio, intuición, aprendizaje, emociones, responsabilidad y sentido. Cuando una organización mira a las personas solo como funciones reemplazables, pierde una parte esencial de su inteligencia colectiva.',
                        'AI for Humans no niega que algunas tareas puedan automatizarse. Niega que el reemplazo humano deba ser el horizonte de la innovación.',
                        'El horizonte correcto es otro: que las personas tengan mejores herramientas para hacer mejor aquello que sigue requiriendo humanidad.',
                    ],
                ],
                [
                    'anchor' => 'creatividad',
                    'title' => 'Creatividad',
                    'body' => [
                        'La creatividad humana no es un lujo. Es una forma de existencia.',
                        'Crear no significa solamente producir arte, música, imágenes o palabras. Crear también es encontrar una solución donde antes había fricción. Es imaginar una ruta distinta. Es diseñar un proceso más claro. Es convertir una experiencia personal en empresa, una necesidad en sistema, una intuición en lenguaje, una dificultad en método.',
                        'La IA puede abrir puertas creativas que antes estaban cerradas por falta de medios. Puede permitir que alguien visualice una idea sin estudio, componga una atmósfera sin instrumentos, diseñe una interfaz sin un equipo completo o explore un concepto sin esperar permiso de una industria.',
                        'Pero la creatividad no debe ser uniformada por la máquina. Si todos los sistemas empujan hacia el mismo estilo, la misma respuesta y la misma optimización, la humanidad pierde diversidad expresiva. Por eso AI for Humans no busca que la IA cree por nosotros. Busca que amplíe nuestra capacidad de crear con identidad.',
                        'La IA debe ser herramienta, no molde.',
                        'Debe abrir posibilidades, no estandarizar el alma.',
                    ],
                ],
                [
                    'anchor' => 'toma-de-decision',
                    'title' => 'Toma de decisión',
                    'body' => [
                        'Decidir es uno de los actos más humanos que existen.',
                        'Una decisión no es solo elegir entre opciones. Es asumir responsabilidad frente a consecuencias. Es ponderar información, contexto, valores, riesgos, intuición, experiencia y propósito. La IA puede mejorar el acceso a información, ordenar evidencia, mostrar alternativas y advertir contradicciones. Pero la decisión relevante no debe desaparecer dentro de un sistema opaco.',
                        'Cuando una IA decide sin trazabilidad, la responsabilidad se diluye. Cuando una organización delega demasiado pronto, el juicio se debilita. Cuando las personas dejan de comprender por qué se tomó una decisión, aparece una forma silenciosa de dependencia.',
                        'AI for Humans defiende una inteligencia artificial que fortalece la decisión humana, no que la reemplaza.',
                        'La IA debe ayudar a ver mejor. Debe reducir confusión. Debe presentar contexto. Debe permitir revisar. Debe dejar huella. Pero la decisión final, especialmente cuando afecta personas, recursos, derechos, bienestar o dirección estratégica, debe permanecer bajo responsabilidad humana.',
                    ],
                    'quote' => 'Una IA correcta no decide por la persona. Le permite decidir con mayor claridad.',
                ],
                [
                    'anchor' => 'valor-cognitivo',
                    'title' => 'Valor cognitivo',
                    'body' => [
                        'El pensamiento humano no es un costo operativo a reducir.',
                        'En muchas organizaciones, la eficiencia se ha entendido como reducción de tiempo, reducción de pasos, reducción de personas, reducción de conversación. Pero no todo lo que parece lento es inútil. Pensar toma tiempo. Comprender toma tiempo. Crear toma tiempo. Cuidar toma tiempo. Decidir bien toma tiempo.',
                        'El valor cognitivo de una persona está en su capacidad de conectar lo que sabe con lo que vive, lo que observa con lo que intuye, lo que mide con lo que comprende. Esa forma de inteligencia no aparece completa en una base de datos. No se resume solo en productividad. No se captura plenamente en un indicador.',
                        'La IA puede ayudar a ordenar el entorno cognitivo. Puede reducir carga mental innecesaria, encontrar información, estructurar ideas y liberar espacio para pensar mejor. Pero si se usa para saturar más, exigir más y acelerar todo sin descanso, deja de potenciar y empieza a degradar.',
                        'AI for Humans afirma que la inteligencia artificial debe respetar el valor cognitivo humano.',
                        'No se trata de pensar menos. Se trata de pensar mejor.',
                        'No se trata de reemplazar criterio. Se trata de darle mejores condiciones para existir.',
                    ],
                ],
                [
                    'anchor' => 'salud-fisica-y-mental',
                    'title' => 'Salud física y mental',
                    'body' => [
                        'La eficiencia sin cuidado puede transformarse en una forma elegante de agotamiento.',
                        'Una empresa puede volverse más rápida y, al mismo tiempo, más inhumana. Puede responder más correos, cerrar más tickets, generar más reportes y aun así deteriorar la salud de las personas que la sostienen. Por eso AI for Humans no puede hablar de tecnología sin hablar de límites, ritmo, foco, descanso y bienestar.',
                        'La salud física y mental no es un adorno blando dentro de una estrategia tecnológica. Es una condición estructural para que exista creatividad, decisión y trabajo sostenible.',
                        'Una IA diseñada sin sensibilidad puede aumentar la presión invisible. Puede llenar cada espacio libre con nuevas tareas. Puede convertir la disponibilidad en obligación. Puede medir todo menos el cansancio. Puede confundir movimiento con avance.',
                        'Una IA diseñada para humanos debe hacer lo contrario. Debe ayudar a reducir fricción, no a multiplicarla. Debe proteger el foco, no fragmentarlo. Debe ordenar prioridades, no producir urgencias artificiales. Debe permitir que las personas trabajen mejor sin vivir permanentemente exigidas por sistemas que nunca se cansan.',
                        'La tecnología no tiene cuerpo. Las personas sí.',
                        'Por eso toda IA que pretenda servir al humano debe recordar que la mente necesita espacio y el cuerpo necesita límite.',
                    ],
                ],
                [
                    'anchor' => 'gobernanza-antes-de-automatizacion',
                    'title' => 'Gobernanza antes de automatización',
                    'body' => [
                        'Gobernar la IA no es burocracia. Es una forma de respeto.',
                        'Antes de automatizar, debe estar claro qué se automatiza, por qué, con qué límites, bajo qué responsabilidad y con qué posibilidad de revisión. Antes de entregar una tarea a un modelo, debe saberse qué datos usa, qué decisiones afecta, qué errores puede cometer y quién responde cuando algo falla.',
                        'La gobernanza no existe para frenar la inteligencia. Existe para evitar que la inteligencia se vuelva opaca, invasiva o irresponsable.',
                        'AI for Humans sostiene que la IA debe operar dentro de reglas explícitas. Debe existir trazabilidad. Debe existir consentimiento cuando corresponde. Debe existir supervisión humana. Deben existir límites frente a decisiones críticas. Deben existir criterios para saber cuándo no automatizar.',
                        'Una IA sin gobernanza puede ser rápida, impresionante y peligrosa.',
                        'Una gobernanza sin inteligencia puede ser rígida e inútil.',
                        'El desafío de AlmaDesign es unir ambas: inteligencia aplicada con dirección humana.',
                    ],
                    'quote' => 'Gobernanza, en este manifiesto, significa que la tecnología no avanza sola. Avanza con propósito, con límites y con responsabilidad.',
                ],
                [
                    'title' => 'Lo que AI for Humans no es',
                    'body' => [
                        'AI for Humans no es una promesa de automatización total. No nace para decir que todo proceso debe ser acelerado, reducido o entregado a una máquina. Esa mirada sería demasiado pobre para una tecnología tan poderosa y demasiado injusta para las personas que sostienen organizaciones reales con su experiencia, su creatividad y su juicio.',
                        'Tampoco es una norma externa, una certificación o un sello de cumplimiento. Es una postura filosófica pública de AlmaDesign. Una forma de declarar desde dónde se diseña, qué se acepta construir y qué se decide rechazar. Su valor no está en parecer una regulación, sino en actuar como brújula.',
                        'AI for Humans no es una postura anti-tecnología. Al contrario, nace del reconocimiento profundo de lo que la tecnología puede devolver cuando se pone al servicio correcto. La IA puede abrir posibilidades inmensas. Puede democratizar acceso creativo, acelerar aprendizaje, reducir fricción y permitir que personas con menos recursos construyan con herramientas que antes parecían imposibles.',
                        'Pero tampoco es una campaña de productividad sin límites. No se trata de hacer más por hacer más. No se trata de convertir cada minuto humano en una unidad optimizable. No se trata de borrar descanso, duda, pausa o conversación en nombre de la eficiencia.',
                        'AI for Humans es una decisión de diseño: afirmar que la inteligencia artificial solo tiene sentido cuando amplía la capacidad humana sin borrar el valor de la persona que piensa, crea, decide y vive las consecuencias del mundo real.',
                    ],
                ],
                [
                    'anchor' => 'compromiso-almadesign',
                    'title' => 'Compromiso AlmaDesign',
                    'body' => [
                        'AlmaDesign adopta AI for Humans como manifiesto fundacional.',
                        'Eso significa que la tecnología debe diseñarse con dirección humana. Que la IA debe ordenar información sin reemplazar criterio. Que debe reducir fricción sin invadir la vida. Que debe apoyar decisiones sin ocultar responsabilidad. Que debe potenciar creatividad sin uniformar expresión. Que debe mejorar productividad sin sacrificar salud física ni mental.',
                        'Este compromiso no busca negar la potencia de la inteligencia artificial. Busca ponerla en el lugar correcto.',
                        'AlmaDesign cree que el futuro no debe pertenecer a sistemas que hacen innecesarias a las personas, sino a sistemas que les devuelven capacidad para crear, decidir, aprender y construir con mayor libertad.',
                        'La inteligencia artificial no debe borrar el alma humana.',
                    ],
                    'quote' => 'Debe ayudarla a desarrollarse.',
                ],
            ],
            'guardrails' => [],
            'signatureAnchor' => 'firma-fundacional',
            'finalCtaAnchor' => 'conversemos',
            'cta' => 'Hablemos de tu proyecto',
        ]);
    }
}
