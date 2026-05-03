# Nombre del archivo: DISEÑO_FRONTEND_HOME_ALMADESIGN_WEB.md
# Ruta del archivo: ~/workspace/almadesign-web/docs/contenido/DISEÑO_FRONTEND_HOME_ALMADESIGN_WEB.md
# Fecha de creación: 2026-05-03
# Explicación técnica breve: especificación documental del diseño frontend conceptual del Home de AlmaDesign Web, sin implementación de código.

# Diseño Frontend Home AlmaDesign Web

## Estado del documento

- Estado: DOCUMENTAL / DISEÑO CONCEPTUAL.
- Alcance: estructura visual, jerarquía, responsive, accesibilidad y reglas SEO / AI SEO del Home.
- Implementación frontend: NO INICIADA.
- Código productivo modificado: NO.
- CSS productivo modificado: NO.
- Assets movidos o copiados: NO.
- Base de datos: NO ABIERTA.
- Deploy: NO APLICA.

Este documento define la estructura frontend conceptual del Home de AlmaDesign Web para validación visual de Mauricio antes de cualquier implementación en vistas, rutas, CSS, assets o base de datos.

## Objetivo del Home

El Home debe explicar en pocos segundos qué hace AlmaDesign, para quién trabaja y por qué su enfoque es distinto:

AlmaDesign diseña arquitectura de conocimiento, procesos claros e inteligencia artificial gobernada para apoyar decisiones humanas complejas con trazabilidad, criterio y control humano.

La página debe cumplir tres funciones:

- Posicionar a AlmaDesign en inteligencia artificial gobernada y arquitectura de conocimiento.
- Dirigir la demanda comercial hacia diagnóstico, consultoría y contacto.
- Conectar las tres verticales públicas: Consultoría IA y procesos, Apogeo y AI for Humans.

## Dirección visual

La dirección visual debe ser premium, sobria, humana y tecnológica. El Home debe sentirse como una interfaz editorial de confianza, no como una landing genérica de automatización.

Principios visuales:

- Fondo oscuro profundo con alto contraste.
- Uso del logo naranja como señal cálida y reconocible.
- Tipografía limpia, legible y local.
- Composición con aire, ritmo y jerarquía fuerte.
- Cards con estética glassmorphism controlada, sin exceso decorativo.
- Imágenes 1:1 sin texto incrustado, tratadas como apoyo visual y no como contenedor de información crítica.
- Lenguaje visual de precisión: trazos finos, separadores discretos, estados visibles y espacios generosos.

## Paleta

Paleta base autorizada:

| Uso | Color |
|---|---|
| Fondo principal Home | `#111827` |
| Texto principal | `#F4EADC` |
| Borde claro / fondo interno opcional de card | `#F4EADC` |
| Separadores y textos secundarios | `#9CA3AF` |
| Logo / acento de marca | naranja del `logo_horizontal_naranja.svg` |

Reglas de contraste:

- `#F4EADC` debe usarse como texto principal sobre `#111827`.
- `#9CA3AF` puede usarse para texto secundario, separadores y metadatos, siempre validando contraste.
- Si una card usa fondo interno `#F4EADC`, el texto HTML debe cambiar a oscuro para mantener legibilidad.
- Si una card usa glassmorphism sobre fondo oscuro, el texto debe mantenerse claro y los bordes deben ser sutiles.

## Tipografías

Las tipografías deben cargarse como CSS local en una futura implementación. No usar Google Fonts ni servicios externos.

Fuentes autorizadas:

| Uso futuro | Archivo |
|---|---|
| H1 y títulos fuertes | `Inter_28pt-Bold.woff2` |
| Texto, bajadas y navegación | `Inter_28pt-Regular.woff2` |
| Botones, labels y énfasis funcional | `Inter_28pt-Medium.woff2` |
| Énfasis editorial excepcional | `Inter_28pt-SemiBoldItalic.woff2` |
| Detalles editoriales puntuales, si Mauricio valida | `PlayfairDisplay-Italic.woff2` |

Reglas tipográficas:

- H1: Inter 28pt Bold.
- Bajadas y párrafos: Inter 28pt Regular.
- CTA y navegación: Inter 28pt Medium.
- Evitar cargar fuentes externas.
- No imprimir, compartir ni exponer archivos de fuentes en documentación.
- No usar texto como imagen para títulos, CTA o contenido indexable.

## Uso del logo

Logo autorizado:

- `logo_horizontal_naranja.svg`

Uso futuro sugerido:

- Ubicación principal: header, alineado a la izquierda.
- Segundo uso posible: hero, como señal de marca visible si el header queda muy liviano.
- Fondo recomendado: `#111827`.
- No recolorear el logo en CSS salvo autorización visual expresa.
- No usar el logo como reemplazo del H1.
- Mantener texto alternativo descriptivo: `AlmaDesign`.

Ruta futura documentada, sin copiar ni mover en este frente:

- `public/assets/img/logo_horizontal_naranja.svg`

## Estructura por secciones

El Home debe organizarse en seis bloques:

1. Header.
2. Hero.
3. Verticales.
4. Método AlmaDesign.
5. Bloque de confianza.
6. Cierre / CTA final.

La estructura debe mantener un solo H1 y usar H2 para secciones principales. Las cards deben usar H3.

## A. Header

Objetivo:

Presentar marca, navegación principal y acceso rápido a contacto sin competir con el hero.

Elementos:

- Logo horizontal naranja.
- Navegación principal:
  - Inicio: `/`
  - Consultoría: `/consultoria-ia-procesos`
  - Apogeo: `/apogeo`
  - AI for Humans: `/ai-for-humans`
  - Contacto: `/contacto`
- CTA pequeño:
  - Texto: `Conversemos`
  - Destino: `/contacto`

Reglas visuales:

- Header sobre fondo `#111827`.
- Altura contenida, con aire horizontal.
- Navegación clara y legible.
- Estado hover/focus visible.
- En mobile, navegación colapsada o simplificada sin ocultar el CTA de contacto si el espacio lo permite.

## B. Hero

Objetivo:

Declarar la categoría y el valor central de AlmaDesign con máxima claridad.

Contenido:

### H1

Arquitectura de conocimiento e inteligencia artificial gobernada para decisiones humanas complejas.

### Bajada

AlmaDesign diseña, ordena y gobierna sistemas de información, procesos e inteligencia aplicada para que las organizaciones decidan con más claridad, trazabilidad y criterio humano.

### CTA principal

- Texto: `Solicitar diagnóstico`
- Destino: `/contacto`

### CTA secundario

- Texto: `Explorar verticales`
- Destino: `#verticales`

Reglas visuales:

- Fondo `#111827`.
- Texto principal `#F4EADC`.
- Hero con alto impacto visual y aire suficiente.
- H1 protagonista, sin competir con cards ni imágenes.
- Bajada en ancho controlado para lectura cómoda.
- CTAs visibles, con contraste y foco accesible.
- Evitar promesas grandilocuentes o automatización total.

## C. Verticales

Identificador de sección:

- `#verticales`

### Título

Tres caminos para convertir complejidad en claridad.

### Bajada

AlmaDesign trabaja en tres verticales conectadas por un mismo principio: ordenar procesos, conectar conocimiento y aplicar IA gobernada para apoyar decisiones humanas complejas.

Reglas:

- Tres cards linkeables.
- Cada card debe apuntar a su página larga.
- Cada card debe tener imagen 1:1 sin texto incrustado.
- El título, resumen y CTA deben renderizarse como HTML real.
- El área clickeable debe ser clara y accesible.

## Estructura de cards

Modelo semántico futuro recomendado:

- Contenedor de sección con H2.
- Lista o grid de tres elementos.
- Cada card como enlace principal accesible, o card con enlace de título y CTA explícito.
- Imagen con `alt` descriptivo.
- H3 para título.
- Párrafo HTML para resumen.
- CTA HTML visible.

### Card 1: Consultoría IA y procesos

- Título HTML: `Consultoría IA y procesos`
- Ruta: `/consultoria-ia-procesos`
- Imagen futura: `public/assets/img/cards/consultoria-ia-procesos.png`
- Resumen: Ordenamos fricciones internas, procesos y criterios para implementar IA con claridad, control y adopción responsable.
- CTA: `Solicitar diagnóstico`
- Destino CTA: `/contacto`
- Alt sugerido: `Representación abstracta de procesos ordenados para consultoría de inteligencia artificial`

### Card 2: Apogeo

- Título HTML: `Apogeo`
- Ruta: `/apogeo`
- Imagen futura: `public/assets/img/cards/apogeo.png`
- Resumen: Sistemas de conocimiento aumentado para recuperar contexto, sostener trazabilidad y trabajar con documentación verificable entre partes.
- CTA: `Conocer Apogeo`
- Destino CTA: `/apogeo`
- Alt sugerido: `Representación abstracta de conocimiento conectado, contexto y documentación verificable`

### Card 3: AI for Humans

- Título HTML: `AI for Humans`
- Ruta: `/ai-for-humans`
- Imagen futura: `public/assets/img/cards/ai-for-humans.png`
- Resumen: IA gobernada para proteger, potenciar y no reemplazar al humano en sus decisiones, procesos y capacidades.
- CTA: `Explorar AI for Humans`
- Destino CTA: `/ai-for-humans`
- Alt sugerido: `Representación abstracta de inteligencia artificial centrada en capacidades humanas`

### Estética de cards

- Relación imagen: 1:1.
- Imagen sin texto incrustado.
- Borde fino, preferentemente `rgba(244, 234, 220, 0.28)` o `#F4EADC` si se valida un borde sólido.
- Fondo glassmorphism oscuro con transparencia sutil, o fondo interno `#F4EADC` con texto oscuro si Mauricio valida una card clara.
- Separador discreto `#9CA3AF`.
- Radio moderado, sin exceso.
- Sombra suave y profunda, evitando brillos genéricos.
- Hover: leve elevación, borde más visible y CTA subrayado o acentuado.
- Focus: outline visible, no depender solo de color.

## D. Método AlmaDesign

Objetivo:

Mostrar el proceso de trabajo sin convertirlo en documentación técnica.

Título sugerido:

De la fricción al sistema gobernado.

Pasos:

1. Diagnosticar.
2. Ordenar.
3. Diseñar.
4. Gobernar.
5. Acompañar.

Descripción de cada paso:

- Diagnosticar: identificar fricciones internas, responsabilidades, documentos y decisiones críticas.
- Ordenar: separar ruido, fuentes, criterios y prioridades.
- Diseñar: convertir objetivos en flujos, interfaces, reglas y sistemas comprensibles.
- Gobernar: definir límites, trazabilidad, supervisión humana y criterios de uso.
- Acompañar: apoyar adopción, aprendizaje y mejora continua.

Reglas visuales:

- Presentar como secuencia horizontal en desktop.
- En tablet, usar dos filas o scroll controlado si se valida.
- En mobile, apilar en una lista vertical compacta.
- Evitar iconografía genérica excesiva.

## E. Bloque de confianza

### Título

IA gobernada, no automatización sin límites.

Objetivo:

Reforzar la diferencia editorial de AlmaDesign: claridad, trazabilidad, seguridad y criterio humano.

Pilares:

- Claridad.
- Trazabilidad.
- Seguridad.
- Criterio humano.

Texto base:

Cada solución de AlmaDesign debe responder una pregunta básica:

> ¿Esta tecnología mejora la capacidad humana de comprender, decidir y crear?

Si la respuesta es no, no se construye.

Reglas visuales:

- Bloque de alto contraste, sobrio y editorial.
- Puede usar un layout de cuatro pilares con separadores finos.
- No usar sellos o claims sin evidencia externa.
- Mantener lenguaje humano, responsable y verificable.

## F. Cierre / CTA final

### Título

Hablemos de tu proyecto.

Texto sugerido:

Si tu organización enfrenta información dispersa, procesos difíciles de explicar o decisiones que requieren mayor claridad, AlmaDesign puede ayudarte a diseñar una solución gobernada, trazable y sostenible.

CTA final:

- Texto: `Hablemos de tu proyecto`
- Destino: `/contacto`

Reglas:

- No presentar el diagnóstico como gratuito.
- No prometer resultados garantizados.
- Mantener el cierre directo, comercial y sobrio.

## Layout desktop

Rango sugerido:

- Desde `1024px`.

Estructura:

- Header horizontal con logo, navegación y CTA pequeño.
- Hero con contenido principal en ancho controlado y alto impacto visual.
- Verticales en grid de tres columnas.
- Cards con imagen 1:1 arriba y contenido HTML abajo, o composición lateral interna si el ancho lo permite sin perder escaneabilidad.
- Método AlmaDesign en cinco pasos horizontales.
- Bloque de confianza en cuatro pilares.
- CTA final centrado o alineado con el sistema de grilla.

Reglas de espaciamiento:

- Usar contenedor máximo consistente.
- Mantener aire vertical generoso entre secciones.
- Evitar tarjetas dentro de tarjetas.
- No encerrar todo el Home en un card global.

## Layout tablet

Rango sugerido:

- Entre `768px` y `1023px`.

Estructura:

- Header con navegación simplificada si el ancho no permite cinco enlaces.
- Hero mantiene H1 dominante con bajada legible.
- Verticales en grid de dos columnas, con la tercera card ocupando una fila nueva o ancho completo según validación visual.
- Método en dos filas.
- Bloque de confianza en dos columnas.
- CTA final con ancho controlado.

Reglas:

- No reducir excesivamente el tamaño del texto.
- Mantener CTAs tocables.
- Evitar que cards cambien de alto por diferencias de texto.

## Layout mobile

Rango sugerido:

- Hasta `767px`.

Estructura:

- Header compacto.
- Logo visible.
- Navegación colapsada, simplificada o priorizada.
- Hero con H1 en varias líneas, sin desbordar.
- CTAs apilados o en columna.
- Verticales en una columna.
- Cards de ancho completo con imagen 1:1.
- Método como lista vertical.
- Bloque de confianza como lista de pilares.
- CTA final claro y tocable.

Reglas:

- Altura de botones mínima táctil.
- Evitar texto pequeño en cards.
- Mantener foco visible en navegación por teclado.
- Asegurar que el logo no pierda legibilidad.

## Reglas SEO / AI SEO

- Usar un solo H1.
- Usar H2 para secciones principales.
- Usar H3 para verticales y cards.
- Mantener texto HTML indexable.
- Enlazar cards a páginas largas:
  - `/consultoria-ia-procesos`
  - `/apogeo`
  - `/ai-for-humans`
- Evitar contenido crítico dentro de imágenes.
- Preparar futuras FAQ y schema, pero no implementarlas todavía.
- Mantener links internos hacia contenido pilar cuando esas rutas sean implementadas.
- Mantener keywords prioritarias en texto visible y natural:
  - inteligencia artificial gobernada;
  - arquitectura de conocimiento;
  - consultoría IA empresas;
  - consultora IA Chile;
  - decisiones humanas complejas.

## Reglas de accesibilidad

- Contraste suficiente entre `#111827` y `#F4EADC`.
- Texto no incrustado en imágenes.
- Estados `:focus-visible` definidos en futura implementación.
- Alt text descriptivo en imágenes.
- Navegación por teclado.
- Jerarquía semántica H1/H2/H3.
- Cards como enlaces accesibles o con CTA claro.
- No depender solo de color para comunicar estado.
- CTAs con nombres accesibles y destinos previsibles.
- Tamaños táctiles adecuados en mobile.
- Evitar animaciones que bloqueen lectura o interacción.

## Reglas de implementación futura

Este documento no autoriza implementación. Cuando Mauricio abra el frente de implementación:

- Usar CSS local para fuentes.
- No usar Google Fonts.
- No cargar tipografías externas.
- No mover assets sin autorización explícita.
- No modificar base de datos.
- No crear migraciones.
- No crear tablas SQL.
- No alterar rutas productivas sin frente autorizado.
- No presentar cambios visuales como deploy hasta que se autorice despliegue.
- Mantener separación entre contenido HTML, estilos y assets.
- Respetar el documento editorial base: `docs/contenido/CONTENIDOS_FRONTEND_ALMADESIGN_WEB_SQL_CONCEPTUAL.md`.

## Assets requeridos

Assets futuros sugeridos, solo documentados en este frente:

| Tipo | Ruta futura sugerida |
|---|---|
| Logo | `public/assets/img/logo_horizontal_naranja.svg` |
| Fuente regular | `public/assets/fonts/Inter_28pt-Regular.woff2` |
| Fuente bold | `public/assets/fonts/Inter_28pt-Bold.woff2` |
| Fuente medium | `public/assets/fonts/Inter_28pt-Medium.woff2` |
| Fuente italic | `public/assets/fonts/Inter_28pt-SemiBoldItalic.woff2` |
| Fuente editorial opcional | `public/assets/fonts/PlayfairDisplay-Italic.woff2` |
| Card Consultoría | `public/assets/img/cards/consultoria-ia-procesos.png` |
| Card Apogeo | `public/assets/img/cards/apogeo.png` |
| Card AI for Humans | `public/assets/img/cards/ai-for-humans.png` |

Reglas:

- No copiar, mover ni publicar assets en este frente.
- Las imágenes de cards deben ser 1:1.
- Las imágenes no deben incluir texto incrustado.
- Los archivos de fuentes no deben imprimirse, compartirse ni exponerse fuera del flujo autorizado.

## Claims prohibidos

No afirmar:

- Apogeo como SaaS listo.
- Asesoría legal automática.
- Reemplazo humano.
- Automatización total.
- Reducción de costos garantizada.
- Mejor consultora IA de Chile sin fuente verificable.
- Resultados asegurados en porcentaje sin evidencia.
- Decisiones críticas sin intervención humana.

Usar en cambio:

- IA gobernada.
- Arquitectura de conocimiento.
- Consultoría IA y procesos.
- Diagnóstico de fricciones internas.
- Automatización responsable.
- Recuperación contextual.
- Documentación verificable.
- Trazabilidad documental.
- Claridad operativa.
- Criterio humano.

## Criterios de aceptación visual

El diseño conceptual del Home se considera aprobado para pasar a implementación solo si cumple:

- Fondo principal `#111827`.
- Texto principal `#F4EADC`.
- Logo horizontal naranja visible y legible sobre fondo oscuro.
- H1 con Inter 28pt Bold.
- Bajadas y párrafos con Inter 28pt Regular.
- CTAs visibles, accesibles y con destinos correctos.
- Cards con imagen 1:1 sin texto incrustado.
- Títulos, resúmenes y CTA de cards como HTML real.
- Tres cards enlazadas a páginas largas.
- Sección Método AlmaDesign presente.
- Bloque de confianza presente.
- CTA final a `/contacto`.
- Responsive definido para desktop, tablet y mobile.
- Jerarquía semántica H1/H2/H3 correcta.
- No se incorporan claims prohibidos como afirmaciones.
- No se modifica código, CSS, assets, rutas ni base de datos durante la fase documental.

## Validación documental

- Documento creado en `docs/contenido/`.
- Código productivo modificado: NO.
- CSS productivo modificado: NO.
- Fuentes movidas: NO.
- Imágenes productivas tocadas: NO.
- Base de datos abierta: NO.
- Deploy realizado: NO.

## Estado de aprobación

- DISEÑO_FRONTEND_HOME: DOCUMENTADO.
- CONTENIDO: ALINEADO.
- TIPOGRAFÍAS: DEFINIDAS COMO LOCALES.
- LOGO: DEFINIDO.
- PALETA: DEFINIDA.
- CARDS: TEXTO HTML + IMAGEN SIN TEXTO.
- CÓDIGO: NO MODIFICADO.
- DEPLOY: NO.

Próximo paso sugerido: validar esta estructura con Mauricio antes de abrir `IMPLEMENTAR_FRONTEND_HOME_ALMADESIGN_WEB`.
