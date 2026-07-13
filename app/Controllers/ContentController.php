<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Services\ContentRepository;
use App\Services\Database;
use Throwable;

final class ContentController extends BaseController
{
    public function policy(): void
    {
        try {
            $content = (new ContentRepository(Database::pdo($this->config)))
                ->publishedPageBySlug('politica-almadesign');

            if ($content !== null) {
                $this->view('pages/content-db', [
                    'title' => (string) $content['page']['title'],
                    'metaDescription' => (string) $content['page']['meta_description'],
                    'bodyClass' => 'policy-page',
                    'showFinalCta' => false,
                    'page' => $content['page'],
                    'sections' => $content['sections'],
                    'viewClass' => 'ai-for-humans-manifest policy-page',
                    'ariaLabel' => 'Política AlmaDesign',
                ]);
                return;
            }
        } catch (Throwable) {
            // Si la DB no está disponible, la página pública mantiene el render PHP original.
        }

        $this->view('pages/politica-almadesign', [
            'title' => 'Política AlmaDesign | IA para humanos',
            'metaDescription' => 'Política de AlmaDesign sobre protección de datos personales, consentimiento, sistemas RAG e inteligencia artificial responsable.',
            'bodyClass' => 'policy-page',
            'showFinalCta' => false,
        ]);
    }

    public function consulting(): void
    {
        try {
            $content = (new ContentRepository(Database::pdo($this->config)))
                ->publishedPageBySlug('consultoria-ia-procesos');

            if ($content !== null) {
                $this->view('pages/layout-object-db', [
                    'title' => (string) $content['page']['title'],
                    'metaDescription' => (string) $content['page']['meta_description'],
                    'showFinalCta' => false,
                    'page' => $content['page'],
                    'sections' => $content['sections'],
                ]);
                return;
            }
        } catch (Throwable) {
            // Si la DB no está disponible, la página pública mantiene el render PHP original.
        }

        $this->view('pages/vertical-detail', [
            'title' => 'Consultoría de inteligencia artificial y procesos | AlmaDesign',
            'metaDescription' => 'Consultoría IA para empresas que necesitan ordenar procesos, diagnosticar fricciones internas e implementar inteligencia artificial con gobernanza y trazabilidad.',
            'pageClass' => 'consulting-page',
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
                            'title' => 'Diseño de límites explícitos y criterios humanos',
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
                            'title' => 'Riesgos y límites explícitos',
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
            'cta' => 'Solicitar diagnóstico',
            'ctaHref' => url('/contacto?producto=consultoria'),
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
            'cta' => 'Conversar sobre Apogeo',
        ]);
    }

    public function talksAiForHumans(): void
    {
        try {
            $content = (new ContentRepository(Database::pdo($this->config)))
                ->publishedPageBySlug('charlas-ai-for-humans');

            if ($content !== null) {
                $this->view('pages/talks-db', [
                    'title' => (string) $content['page']['title'],
                    'metaDescription' => (string) $content['page']['meta_description'],
                    'showFinalCta' => false,
                    'page' => $content['page'],
                    'sections' => $content['sections'],
                ]);
                return;
            }
        } catch (Throwable) {
            // Si la DB no está disponible, la página pública mantiene el render PHP original.
        }

        $this->view('pages/charlas-ai-for-humans', [
            'title' => 'Charlas AlmaDesign | Inteligencia artificial para personas y equipos',
            'metaDescription' => 'Charlas AlmaDesign sobre inteligencia artificial para personas, equipos y organizaciones: comprender la IA sin miedo, sin humo y sin tecnicismos innecesarios.',
        ]);
    }

    public function documentManagement(): void
    {
        try {
            $content = (new ContentRepository(Database::pdo($this->config)))
                ->publishedPageBySlug('gestion-documental');

            if ($content !== null) {
                $this->view('pages/layout-object-db', [
                    'title' => (string) $content['page']['title'],
                    'metaDescription' => (string) $content['page']['meta_description'],
                    'showFinalCta' => false,
                    'page' => $content['page'],
                    'sections' => $content['sections'],
                ]);
                return;
            }
        } catch (Throwable) {
            // Si la DB no está disponible, la página pública mantiene el render PHP original.
        }

        $this->view('pages/vertical-detail', [
            'title' => 'Gestión Documental Gobernada | AlmaDesign',
            'metaDescription' => 'Gestión documental gobernada para ordenar documentos críticos, habilitar asistentes IA con evidencia, trazabilidad y límites claros de uso.',
            'pageClass' => 'document-management-page',
            'eyebrow' => 'Gestión Documental',
            'heading' => 'Gestión Documental Gobernada',
            'lead' => 'Ordenamos documentos críticos para que una IA pueda asistir a las personas con evidencia, trazabilidad y límites claros de uso, aumentando la capacidad humana para encontrar información, responder con mayor eficiencia y tomar mejores decisiones.',
            'heroAnchor' => 'gestion-documental',
            'featureBlock' => [
                'left' => [
                    'anchor' => 'coherencia-documental',
                    'eyebrow' => 'Diagnóstico documental',
                    'title' => 'El problema no es la falta de información. Es la coherencia.',
                    'body' => [
                        'Muchas organizaciones no tienen un problema de falta de información. Tienen un problema de coherencia.',
                        'Los documentos existen, pero están dispersos en carpetas, correos, sistemas internos, unidades compartidas, versiones antiguas, archivos personales y plataformas que no conversan entre sí. El resultado es una operación lenta: las personas pierden tiempo buscando antecedentes, validando cuál es la versión correcta y preguntando una y otra vez por información que ya existe.',
                    ],
                ],
                'right' => [
                    'anchor' => 'ia-con-fuentes-confiables',
                    'eyebrow' => 'IA con evidencia',
                    'title' => 'Una IA útil necesita fuentes confiables.',
                    'body' => [
                        'Esa fricción aumenta cuando se incorpora inteligencia artificial sin una gestión documental gobernada. Un asistente de IA puede ser muy útil, pero necesita fuentes confiables, permisos claros, documentos vigentes y trazabilidad. Si la base documental está desordenada, la IA puede entregar respuestas incompletas, poco verificables o basadas en documentos que no deberían ser usados.',
                        'Aquí entra la gestión documental gobernada: ordenar la información para que pueda ser encontrada, entendida, consultada y auditada.',
                    ],
                ],
            ],
            'ragGraphSection' => [
                'anchor' => 'centralizar-documentacion',
                'eyebrow' => 'Documentación centralizada',
                'title' => 'Centralizar la documentación transforma información dispersa en capacidad operativa.',
                'body' => 'Centralizar no significa guardar todo en una misma carpeta. Significa ordenar fuentes, versiones, permisos y vigencia para que las personas y los asistentes de IA puedan trabajar con evidencia confiable.',
                'columns' => [
                    [
                        'anchor' => 'beneficios-centralizar-documentacion',
                        'label' => 'Beneficios',
                        'title' => 'Qué gana una organización al centralizar su documentación.',
                        'body' => 'Cuando la documentación se vuelve confiable, las personas dejan de perder tiempo buscando, validando versiones o preguntando por antecedentes que ya existen.',
                        'items' => [
                            'Menos tiempo perdido buscando documentos o confirmando versiones.',
                            'Respuestas más consistentes entre áreas, equipos y canales.',
                            'Mejor trazabilidad para decisiones, auditorías, soporte y cumplimiento.',
                            'Menor dependencia de personas clave para acceder al conocimiento interno.',
                        ],
                    ],
                    [
                        'anchor' => 'como-centralizar-documentacion',
                        'label' => 'Cómo',
                        'title' => 'Cómo lo resolvemos con gestión documental gobernada.',
                        'body' => 'Primero ordenamos el corpus documental. Después definimos fuentes autorizadas, permisos, metadatos y criterios de uso. Recién entonces una IA puede asistir con respuestas citadas, límites claros y revisión humana.',
                        'items' => [
                            'RAG para recuperar documentos relevantes y responder con evidencia.',
                            'GraphRAG cuando importan relaciones entre normas, contratos, áreas o procesos.',
                            'Gobernanza para controlar qué se usa, quién puede verlo y cuándo escalar a una persona.',
                        ],
                    ],
                ],
                'decisionRows' => [
                    ['Beneficio operativo', 'Las personas encuentran información vigente sin recorrer carpetas, correos o versiones antiguas.'],
                    ['Beneficio para IA', 'El asistente responde desde documentos autorizados, con fuentes citables y menor riesgo de inventar.'],
                    ['Beneficio de gobierno', 'La organización define permisos, límites de uso, responsables, vigencia y trazabilidad antes de automatizar.'],
                ],
                'flow' => [
                    'Inventariar',
                    'Depurar versiones',
                    'Definir permisos',
                    'Indexar',
                    'Responder con evidencia',
                    'Auditar',
                ],
            ],
            'sections' => [
                [
                    'anchor' => 'casos-uso-rag-empresa',
                    'title' => 'Casos de uso empresariales concretos',
                    'body' => [
                        'La evidencia más útil para decidir no son las demos, sino los resultados operativos. En la muestra revisada, RAG y sus variantes ya muestran impacto en banca, automoción, salud, inteligencia, cumplimiento y research automation.',
                    ],
                    'table' => [
                        'headers' => ['Sector', 'Problema', 'Solución', 'Resultado medible'],
                        'rows' => [
                            ['Automoción', 'Sistemas RAG fragmentados por departamento, con dificultad para colaboración segura.', 'Toyota construyó una infraestructura RAG compartida en AWS con autenticación interna y control centralizado de acceso a archivos.', 'Reducción aproximada del 20% en tiempo de investigación y 50% en esfuerzo de investigación en una iniciativa interna.'],
                            ['Banca minorista', 'Tellers necesitaban consultar políticas y procedimientos durante interacciones con clientes.', 'Wells Fargo desplegó una herramienta RAG para recuperar políticas y procedimientos en tiempo real.', 'Reducción aproximada del 20% del flujo de resolución de consultas.'],
                            ['Banca digital', 'Chatbot con base de conocimiento estática, lentitud y baja precisión.', 'Hong Leong Bank migró a RAG dinámico con Gemini 2.5 Flash.', 'Precisión del chatbot subió de 75% a 99% y las transacciones mensuales de chat crecieron 3x.'],
                            ['Salud digital', 'Conocimiento interno en seis silos; baja velocidad de resolución y pérdida de tiempo en soporte.', 'Orion Health creó Oribot, chatbot interno con Amazon Bedrock y RAG sobre más de 500.000 registros.', 'Recupera respuestas en menos de 1 minuto, ahorra 50 horas/día y resultó 10x más costo-efectivo que alternativas comerciales.'],
                            ['Cumplimiento bancario', 'Revisiones manuales de proveedores y quejas con alta carga operativa.', 'Coastal Community Bank usó una aplicación RAG para acelerar procesamiento documental y prellenado.', 'Revisión de quejas al 100% con 94% de precisión y ahorro equivalente a 1 FTE/año; el detalle exacto del ahorro de la app RAG de vendor reviews no está especificado.'],
                            ['Investigación e innovación', 'Elaboración manual de reportes demasiado lenta.', 'Cypris integró búsqueda vectorial y RAG con Elasticsearch para investigación asistida.', 'Generación de reportes pasó de semanas a 15 minutos.'],
                            ['Inteligencia y seguridad', 'Tiempo excesivo para producir briefings accionables.', 'MAX Security y BigData Boutique desarrollaron SCOUT AI con RAG.', 'Briefings bajaron de 2 horas a 25 minutos y se redujo la carga de investigación en 7 horas por analista por semana.'],
                            ['IA empresarial', 'Exactitud insuficiente para usos de alto valor con grandes volúmenes documentales.', 'Contextual AI construyó una plataforma avanzada de RAG sobre Elastic con búsqueda híbrida.', '90%+ de precisión RAG y operación sobre repositorios de hasta 22 millones de chunks.'],
                        ],
                    ],
                ],
            ],
            'insightBlock' => [
                'left' => [
                    'anchor' => 'lectura-transversal-rag-empresa',
                    'eyebrow' => 'Síntesis operativa',
                    'title' => 'La lectura transversal',
                    'body' => [
                        'La primera ola de valor aparece en knowledge access, customer support, document QA, compliance y research workflows.',
                        'Los resultados medibles más frecuentes son reducción de tiempo, más precisión, más cobertura operativa y menor dependencia de expertos humanos para búsquedas repetitivas.',
                        'Los casos que más justifican GraphRAG son aquellos donde la semántica sola no basta: citas legales, trazabilidad contractual, causalidad de incidentes, jerarquías organizativas o relaciones entre eventos.',
                    ],
                ],
                'right' => [
                    'anchor' => 'gobernanza-documental',
                    'eyebrow' => 'Gobernanza',
                    'title' => 'Gobernanza antes de tecnología.',
                    'body' => [
                        'Por eso, la gestión documental gobernada no debe partir por la tecnología, sino por una pregunta operativa: ¿qué decisiones queremos asistir con evidencia confiable?',
                        'Desde ahí se definen las fuentes autorizadas, los permisos, la vigencia documental, los criterios de calidad, la trazabilidad de respuestas y los límites de uso de la IA.',
                        'El objetivo no es reemplazar el criterio profesional. Es reducir la fricción documental, acelerar la búsqueda de evidencia y permitir que las personas decidan mejor, con menos ruido y más trazabilidad.',
                    ],
                ],
            ],
            'guardrails' => [],
            'cta' => 'Conversar sobre Gestión Documental',
            'ctaHref' => url('/contacto?producto=gestion-documental-gobernada'),
        ]);
    }

    public function assistantOrchestration(): void
    {
        try {
            $content = (new ContentRepository(Database::pdo($this->config)))
                ->publishedPageBySlug('orquestacion-asistentes-ia');

            if ($content !== null) {
                $this->view('pages/layout-object-db', [
                    'title' => (string) $content['page']['title'],
                    'metaDescription' => (string) $content['page']['meta_description'],
                    'showFinalCta' => false,
                    'page' => $content['page'],
                    'sections' => $content['sections'],
                ]);
                return;
            }
        } catch (Throwable) {
            // Si la DB no está disponible, la página pública mantiene el render PHP original.
        }

        $this->view('pages/vertical-detail', [
            'title' => 'Orquestación con Asistentes IA | AlmaDesign',
            'metaDescription' => 'Automatización con criterio humano: asistentes IA, procesos y aplicaciones a medida que aumentan eficiencia sin borrar responsabilidad, validación ni juicio humano.',
            'pageClass' => 'assistant-orchestration-page',
            'eyebrow' => 'Orquestación con Asistentes IA',
            'heading' => 'Orquestación con Asistentes IA',
            'lead' => 'Automatizamos con criterio humano: asistentes IA, procesos y aplicaciones a medida que aumentan la eficiencia sin borrar la responsabilidad, la validación y el juicio de las personas.',
            'heroAnchor' => 'orquestacion-asistentes-ia',
            'featureBlock' => [
                'ariaLabel' => 'Diagnóstico de automatización con asistentes IA',
                'left' => [
                    'anchor' => 'automatizacion-con-limites',
                    'eyebrow' => 'Diagnóstico operativo',
                    'title' => 'La IA puede resolver más rápido que la empresa puede operar.',
                    'body' => [
                        'Automatizamos procesos, desarrollamos asistentes y construimos aplicaciones a medida, pero no creemos que todo deba ser automatizado.',
                        'Un asistente IA puede clasificar tickets, responder consultas, preparar documentos, sugerir decisiones y acelerar flujos completos. Eso aumenta capacidad, pero también cambia la presión sobre las áreas que deben ejecutar el trabajo real.',
                    ],
                ],
                'right' => [
                    'anchor' => 'capacidad-operativa',
                    'eyebrow' => 'Riesgo',
                    'title' => 'La fricción aparece cuando la velocidad digital choca con la capacidad física.',
                    'body' => [
                        'La IA no elimina automáticamente el trabajo: muchas veces lo desplaza hacia bodega, reparto, soporte, validación, cumplimiento o supervisión humana.',
                        'Por eso AlmaDesign diseña automatizaciones con criterio operativo: primero comprender el proceso completo, luego definir límites, después automatizar solo donde la organización puede absorber esa velocidad.',
                    ],
                ],
            ],
            'ragGraphSection' => [
                'anchor' => 'orquestar-con-capacidad',
                'eyebrow' => 'Orquestación',
                'title' => 'Orquestar es equilibrar velocidad, capacidad y responsabilidad.',
                'body' => 'Un asistente útil no solo responde rápido. Debe saber cuándo preparar, cuándo sugerir, cuándo ejecutar una tarea repetitiva y cuándo escalar a una persona. La orquestación conecta IA, sistemas, procesos y validación humana para que la automatización no rompa la operación.',
                'comparisonLabel' => 'Beneficios y forma de gobernar asistentes IA',
                'decisionLabel' => 'Criterios operativos de orquestación IA',
                'flowLabel' => 'Flujo operativo para automatizar con criterio humano',
                'columns' => [
                    [
                        'anchor' => 'beneficios-orquestacion-ia',
                        'label' => 'Beneficios',
                        'title' => 'Dónde la IA sí aumenta capacidad.',
                        'body' => 'La IA aporta valor cuando reduce fricción repetitiva y deja mejor preparado el trabajo que una persona debe validar o ejecutar.',
                        'items' => [
                            'Clasificación de tickets, solicitudes y casos recurrentes.',
                            'Respuestas sugeridas basadas en conocimiento gobernado.',
                            'Recuperación de evidencia documental antes de decidir.',
                            'Derivación más clara entre soporte, ventas, operaciones y administración.',
                        ],
                    ],
                    [
                        'anchor' => 'como-gobernar-orquestacion-ia',
                        'label' => 'Cómo',
                        'title' => 'Cómo evitamos la sobreautomatización.',
                        'body' => 'Antes de escalar, medimos qué pasa aguas abajo: quién ejecuta, qué capacidad existe, qué costo aparece y qué decisiones requieren responsabilidad humana.',
                        'items' => [
                            'Definir límites explícitos para cada asistente.',
                            'Medir impacto sobre personas, tiempos físicos y costos reales.',
                            'Mantener revisión humana en decisiones sensibles.',
                            'Escalar por pilotos, no por entusiasmo tecnológico.',
                        ],
                    ],
                ],
                'decisionRows' => [
                    ['Beneficio operativo', 'La IA prepara, ordena y acelera tareas repetitivas sin exigir que todo el proceso sea automático.'],
                    ['Punto crítico', 'Si una etapa se acelera sin mirar la capacidad del resto del proceso, el cuello de botella solo cambia de lugar.'],
                    ['Regla de diseño', 'Automatizar solo cuando la organización puede sostener la velocidad con personas, sistemas, costos y responsabilidad claros.'],
                ],
                'flow' => [
                    'Diagnosticar',
                    'Priorizar',
                    'Pilotear',
                    'Medir capacidad',
                    'Escalar',
                    'Gobernar',
                ],
            ],
            'sections' => [
                [
                    'anchor' => 'caso-distribucion-ia',
                    'title' => 'Caso de uso: cuando la IA acelera más que la operación.',
                    'body' => [
                        'Una empresa de distribución implementa un asistente IA para su mesa de tickets. El sistema clasifica solicitudes, responde en segundos y resuelve casos frecuentes como devoluciones, reposición de productos, cambios de entrega o nuevos despachos.',
                        'El asistente funciona bien, pero aparece una fricción que no estaba en el cálculo inicial: la operación física no se mueve a la misma velocidad que la IA. Si el sistema aprueba más devoluciones, alguien debe retirar esos productos. Si genera más entregas, alguien debe despacharlas. Si ordena más solicitudes por hora, bodega, repartidores, camiones y coordinación reciben más carga en menos tiempo.',
                        'La IA no eliminó el trabajo: lo desplazó hacia otra parte del proceso. La empresa descubre que el cuello de botella no estaba solo en la atención al cliente, sino en la capacidad real de reparto, logística y cumplimiento.',
                        'El retorno esperado por automatizar tickets puede demorarse o incluso volverse en contra si la organización debe contratar más repartidores, ampliar turnos, aumentar flota o reforzar áreas que no estaban preparadas para absorber ese volumen.',
                        'Por eso, antes de acelerar una etapa, hay que mirar la cadena completa: personas, tiempos físicos, costos, capacidad instalada, experiencia del cliente y responsabilidad operacional.',
                    ],
                    'quote' => 'La IA puede acelerar una decisión, pero no puede ignorar la capacidad humana y operativa que debe sostenerla.',
                ],
                [
                    'anchor' => 'knowledge-desk-copilot',
                    'title' => 'Producto destacado: Knowledge Desk Copilot',
                    'body' => [
                        'Mesa de ayuda inteligente basada en conocimiento gobernado, donde la IA sugiere respuestas, clasifica solicitudes y recupera evidencia documental, pero cada decisión relevante mantiene validación humana.',
                        'Un sistema de asistencia operativa para reducir fricción interna sin perder control humano.',
                    ],
                ],
                [
                    'anchor' => 'productos-de-automatizacion',
                    'title' => 'La IA prepara, ordena, sugiere y ejecuta tareas repetitivas; el humano valida, decide y responde por el resultado.',
                    'table' => [
                        'headers' => ['Producto', 'Qué resuelve', 'Base técnica'],
                        'rows' => [
                            ['Knowledge Desk Copilot', 'Mesa de ayuda interna con tickets, respuestas sugeridas y base de conocimiento gobernada', 'RAG + ticketing'],
                            ['CRM Copilot', 'Seguimiento comercial, historial de clientes, próximas acciones y respuestas asistidas', 'CRM + RAG'],
                            ['Policy & Procedure Assistant', 'Consulta de políticas internas, procedimientos, manuales y normativa interna', 'RAG documental'],
                            ['Bid / Proposal Copilot', 'Apoyo para licitaciones, propuestas técnicas y documentos repetitivos', 'RAG + trazabilidad'],
                            ['Compliance Document Copilot', 'Revisión asistida de documentos frente a políticas, privacidad, contratos o requisitos', 'RAG + reglas'],
                            ['Onboarding Assistant', 'Asistente para nuevos colaboradores con preguntas frecuentes, procesos y documentos internos', 'RAG + flujo guiado'],
                            ['Operations Ticketing Copilot', 'Registro, clasificación y derivación de solicitudes internas: TI, RRHH, legal, finanzas, operaciones', 'Ticketing + IA'],
                            ['Graph Knowledge Navigator', 'Para organizaciones con documentos complejos, relaciones entre áreas, normas, contratos, personas y procesos', 'GraphRAG'],
                        ],
                    ],
                ],
            ],
            'insightBlock' => [
                'ariaLabel' => 'Síntesis y gobernanza de asistentes IA',
                'left' => [
                    'anchor' => 'gobernanza-operativa',
                    'eyebrow' => 'Gobernanza',
                    'title' => 'Gobernanza antes de automatización.',
                    'body' => [
                        'Definimos reglas claras para que la inteligencia artificial opere con límites, trazabilidad y responsabilidad humana.',
                        'La gobernanza permite establecer qué información puede usar un asistente IA, qué tipo de respuestas puede entregar, cuándo debe pedir revisión humana y cuáles son los límites explícitos frente a clientes, equipos internos o procesos sensibles.',
                        'Gobernar es poner reglas claras para que la IA sea útil, segura y revisable por humanos.',
                    ],
                ],
                'right' => [
                    'anchor' => 'criterio-humano',
                    'eyebrow' => 'Criterio humano',
                    'title' => 'Más rápido no siempre significa más inteligente.',
                    'body' => [
                        'Un asistente IA puede ordenar información, guiar flujos, responder preguntas, generar documentos, conectar sistemas y acelerar tareas repetitivas. Pero su valor depende de límites claros: qué puede hacer, qué debe escalar, qué datos puede usar y quién revisa sus respuestas.',
                        'La eficiencia útil no consiste en sacar personas del proceso, sino en liberar tiempo y reducir fricción para que las personas puedan revisar mejor, decidir mejor y dedicar energía a tareas de mayor sentido.',
                        'Una organización sin humanos revisando sus procesos no es más inteligente: solo es más rápida para equivocarse.',
                    ],
                ],
            ],
            'guardrails' => [],
            'cta' => 'Conversar sobre Orquestación IA',
            'ctaHref' => url('/contacto?producto=orquestacion-asistentes-ia'),
        ]);
    }

    public function softwareFactory(): void
    {
        try {
            $content = (new ContentRepository(Database::pdo($this->config)))
                ->publishedPageBySlug('software-factory');

            if ($content !== null) {
                $this->view('pages/layout-object-db', [
                    'title' => (string) $content['page']['title'],
                    'metaDescription' => (string) $content['page']['meta_description'],
                    'showFinalCta' => false,
                    'page' => $content['page'],
                    'sections' => $content['sections'],
                ]);
                return;
            }
        } catch (Throwable) {
            // Si la DB no está disponible, la página pública mantiene el render PHP original.
        }

        $this->view('pages/vertical-detail', [
            'title' => 'Software Factory | AlmaDesign',
            'metaDescription' => 'Construimos sistemas a medida para organizaciones que necesitan aplicaciones robustas, integraciones confiables y datos bien gobernados.',
            'pageClass' => 'software-factory-page',
            'eyebrow' => 'Software Factory',
            'heading' => 'Software Factory',
            'lead' => 'Construimos sistemas a medida para organizaciones que necesitan aplicaciones robustas, integraciones confiables y datos bien gobernados.',
            'heroAnchor' => 'software-factory',
            'featureBlock' => [
                'ariaLabel' => 'Patrón de diseño de Software Factory',
                'left' => [
                    'anchor' => 'patron-diseno-software',
                    'eyebrow' => 'Patrón de diseño',
                    'title' => 'La IA no reemplaza la arquitectura de software.',
                    'body' => [
                        'La IA acelera y ordena la aplicación de buenas prácticas que ya existen.',
                        'Los patrones clásicos siguen siendo la base: requerimientos, análisis funcional, arquitectura, orientación a objetos coherente, separación de responsabilidades, patrones de diseño, documentación técnica, QA, feedback con cliente, entregas incrementales y mantenimiento.',
                    ],
                ],
                'right' => [
                    'anchor' => 'ia-asistente-tecnico',
                    'eyebrow' => 'IA asistiva',
                    'title' => 'La IA entra como asistente técnico, no como arquitecto soberano.',
                    'body' => [
                        'Su rol es ordenar requerimientos, detectar inconsistencias, evitar duplicación de clases, sugerir patrones adecuados, mantener coherencia entre módulos, generar código base, revisar smells, crear tests, actualizar documentación y preparar entregables técnicos.',
                        'Pero siempre bajo arquitectura humana.',
                    ],
                ],
            ],
            'ragGraphSection' => [
                'anchor' => 'codigo-defendible-asistido-ia',
                'eyebrow' => 'Código defendible',
                'title' => 'Arquitectura clásica + IA asistiva + código defendible.',
                'body' => 'En AlmaDesign usamos IA para acelerar la construcción de sistemas, pero siempre sobre fundamentos clásicos de ingeniería: arquitectura clara, orientación a objetos coherente, patrones de diseño, documentación técnica, feedback del cliente, código limpio y QA exigente.',
                'comparisonLabel' => 'Principios de construcción y riesgos de deuda técnica',
                'decisionLabel' => 'Criterios de calidad de Software Factory',
                'flowLabel' => 'Flujo de construcción de software asistido por IA',
                'columns' => [
                    [
                        'anchor' => 'fundamentos-software-factory',
                        'label' => 'Fundamentos',
                        'title' => 'El oficio técnico sigue siendo la base.',
                        'body' => 'La IA puede ayudar a producir más rápido, pero el sistema debe nacer desde un brief claro, una arquitectura defendible y decisiones técnicas coherentes.',
                        'items' => [
                            'Brief del cliente y análisis funcional.',
                            'Arquitectura, capas y responsabilidades claras.',
                            'Patrones del lenguaje y orientación a objetos coherente.',
                            'Documentación técnica, feedback, QA y mantenimiento.',
                        ],
                    ],
                    [
                        'anchor' => 'riesgos-software-ia',
                        'label' => 'Riesgos',
                        'title' => 'IA rápida + sin arquitectura = deuda técnica acelerada.',
                        'body' => 'La IA puede generar mucho código, pero si no hay criterio puede duplicar lógica, inventar clases innecesarias, mezclar responsabilidades, romper capas e introducir dependencias difíciles de defender.',
                        'items' => [
                            'Código que pasa visualmente, pero falla en QA real.',
                            'Módulos difíciles de mantener o escalar.',
                            'Dependencias mal elegidas y responsabilidades mezcladas.',
                            'Entregas rápidas que encarecen el producto después.',
                        ],
                    ],
                ],
                'decisionRows' => [
                    ['¿Se entiende?', 'El código, la arquitectura y los módulos pueden ser explicados por otro equipo técnico.'],
                    ['¿Se mantiene?', 'Las responsabilidades están separadas y los cambios no rompen capas innecesariamente.'],
                    ['¿Se prueba?', 'El sistema incorpora QA interno, pruebas y revisión antes de entrega.'],
                    ['¿Se escala?', 'Las decisiones técnicas permiten crecimiento, integración y mantenimiento.'],
                    ['¿Cumple el brief?', 'La solución responde al problema del cliente, no solo a una generación rápida de código.'],
                ],
                'flow' => [
                    'Brief',
                    'Análisis',
                    'Arquitectura',
                    'Desarrollo IA',
                    'QA',
                    'Entrega',
                ],
            ],
            'sections' => [],
            'insightBlock' => [
                'ariaLabel' => 'Síntesis técnica de Software Factory',
                'left' => [
                    'anchor' => 'principio-tecnico-almadesign',
                    'eyebrow' => 'Principio técnico',
                    'title' => 'No usamos IA para improvisar software.',
                    'body' => [
                        'Usamos IA para construir mejor, más rápido y con más control sobre bases sólidas de ingeniería.',
                        'Todo sistema debe nacer desde el brief, pasar por arquitectura, respetar los patrones del lenguaje, mantener código limpio, recibir feedback del cliente y superar QA interno y externo.',
                    ],
                ],
                'right' => [
                    'anchor' => 'oficio-amplificado',
                    'eyebrow' => 'Oficio',
                    'title' => 'La IA no reemplaza el oficio.',
                    'body' => [
                        'Lo amplifica cuando existe arquitectura, criterio y responsabilidad humana.',
                        'El resultado esperado no es solo más velocidad: es software que se entiende, se mantiene, se prueba, se escala y se puede defender ante otro equipo técnico.',
                    ],
                ],
            ],
            'guardrails' => [],
            'cta' => 'Conversar sobre Software Factory',
            'ctaHref' => url('/contacto?producto=software-factory'),
        ]);
    }

    public function aiForHumans(): void
    {
        try {
            $content = (new ContentRepository(Database::pdo($this->config)))
                ->publishedPageBySlug('ai-for-humans');

            if ($content !== null) {
                $this->view('pages/content-db', [
                    'title' => (string) $content['page']['title'],
                    'metaDescription' => (string) $content['page']['meta_description'],
                    'showFinalCta' => false,
                    'page' => $content['page'],
                    'sections' => $content['sections'],
                    'viewClass' => 'ai-for-humans-manifest',
                    'ariaLabel' => 'Manifiesto AI for Humans',
                    'showSignature' => true,
                ]);
                return;
            }
        } catch (Throwable) {
            // Si la DB no está disponible, la página pública mantiene el render PHP original.
        }

        $this->view('pages/vertical-detail', [
            'title' => 'AI for Humans | Manifiesto público de AlmaDesign',
            'metaDescription' => 'AI for Humans es el manifiesto público de AlmaDesign: inteligencia artificial gobernada para proteger, potenciar y no reemplazar al humano.',
            'pageClass' => 'ai-for-humans-manifest',
            'eyebrow' => 'Manifiesto de AlmaDesign',
            'heading' => 'AI for Humans',
            'lead' => 'La inteligencia artificial no debe reemplazar el criterio humano, sino ampliar nuestra capacidad para decidir mejor, trabajar con más claridad y construir organizaciones más justas, eficientes y responsables.',
            'leadParagraphs' => [
                'La inteligencia artificial no debe reemplazar el criterio humano, sino ampliar nuestra capacidad para decidir mejor, trabajar con más claridad y construir organizaciones más justas, eficientes y responsables.',
                'AI for Humans es un llamado a empresas, instituciones y gobiernos a adoptar la inteligencia artificial con propósito: ordenando procesos, protegiendo datos, reduciendo fricciones y manteniendo siempre a las personas en el centro de cada decisión.',
                'No todo debe automatizarse. No todo puede delegarse. La tecnología debe estar al servicio de quienes trabajan, gobiernan, cuidan, educan, emprenden y toman decisiones que afectan la vida de otros.',
                'Construyamos una IA útil, verificable y humana. Una IA con arquitectura, gobernanza mínima viable, evidencia y responsabilidad. Una IA que no borre al ser humano del proceso, sino que lo ayude a pensar, crear y actuar mejor.',
            ],
            'heroAnchor' => 'manifiesto',
            'sections' => [],
            'manifestSections' => [
                [
                    'title' => 'La IA debe estar al servicio del ser humano.',
                    'subtitle' => 'AI for Humans',
                    'body' => [
                        'AI for Humans es la postura fundacional de AlmaDesign: la tecnología solo tiene sentido cuando amplía la capacidad humana de crear, comprender, decidir y vivir con mayor dignidad.',
                    ],
                ],
                [
                    'anchor' => 'tecnologia-correcta',
                    'title' => 'La tecnología correcta devuelve capacidad.',
                    'body' => [
                        'Muchas personas no dejan de crear, aprender o avanzar por falta de talento, sino por falta de instrumentos, medios u oportunidades. La IA bien gobernada puede restituir acceso, lenguaje, claridad y herramientas.',
                    ],
                ],
                [
                    'anchor' => 'humano-al-centro',
                    'title' => 'La IA no debe ocupar el centro.',
                    'body' => [
                        'El centro sigue siendo humano: imaginación, interpretación, error, aprendizaje, cuidado, decisión y responsabilidad. Antes de automatizar hay que comprender; antes de escalar, gobernar; antes de delegar, definir límites.',
                    ],
                ],
                [
                    'anchor' => 'proteger',
                    'title' => 'Proteger es la primera obligación.',
                    'body' => [
                        'Una IA humana no debe invadir, vigilar, extraer datos sin control ni exigir productividad permanente. Debe respetar privacidad, tiempo, descanso, foco, dignidad, criterio profesional y salud mental.',
                    ],
                ],
                [
                    'anchor' => 'potenciar',
                    'title' => 'Potenciar no es explotar más.',
                    'body' => [
                        'Potenciar significa entregar mejores instrumentos para pensar, crear, ordenar información, decidir y liberar energía hacia tareas con mayor sentido humano. La IA debe dar margen, no aumentar la presión.',
                    ],
                ],
                [
                    'anchor' => 'no-reemplazar',
                    'title' => 'No reemplazar es una frontera ética.',
                    'body' => [
                        'La IA puede asistir, sugerir, clasificar, redactar, resumir y conectar, pero no debe apropiarse de decisiones que requieren juicio, sensibilidad, experiencia, contexto y responsabilidad humana.',
                    ],
                ],
                [
                    'anchor' => 'gobernanza-antes-de-automatizacion',
                    'title' => 'Gobernanza antes de automatización',
                    'body' => [
                        'AI for Humans no es anti-tecnología ni una certificación externa: es una brújula de diseño. AlmaDesign se compromete a construir IA con propósito, límites, trazabilidad, supervisión humana y responsabilidad, para que la tecnología no borre el alma humana, sino que la ayude a desarrollarse.',
                    ],
                ],
            ],
            'guardrails' => [],
            'signatureAnchor' => 'firma-fundacional',
            'cta' => 'Hablemos de tu proyecto',
        ]);
    }
}
