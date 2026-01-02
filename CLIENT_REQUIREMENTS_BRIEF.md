# Client Requirements Brief (CRB)
## Corporate Website Platform – Client Requirements Input

[ES] Este documento es el input oficial del cliente final.
[ES] Está escrito en inglés (contenido contractual) y cada sección incluye explicación en español punto por punto.
[ES] Importante: este CRB NO define HTML, NO define layout, NO define componentes, NO define arquitectura técnica. Eso lo traduce el JP en el documento JP → UX/UI.

================================================================================
1. CLIENT CONTEXT
================================================================================

Client Name:
- AlmaDesign (AI Consulting Agency)

Business Domain:
- Artificial Intelligence Consulting / AI Solutions for businesses

Primary Business Goal:
- Generate qualified leads and sales opportunities for AI consulting and AI implementation services.

Secondary Business Goals:
- Establish credibility and authority in AI consulting.
- Explain services in a way that reduces buyer uncertainty.
- Enable potential clients to contact and request a proposal.

[ES] Explicación punto por punto:
- “Client Name”: nombre del cliente, sin interpretación.
- “Business Domain”: industria real. No es branding, es clasificación.
- “Primary Business Goal”: objetivo principal medible (leads, oportunidades). No frases retóricas.
- “Secondary Business Goals”: objetivos de soporte, pero siguen siendo de negocio, no diseño.

================================================================================
2. TARGET AUDIENCE
================================================================================

Primary Audience:
- Decision makers (CEOs, founders, general managers, directors) in SMEs and mid-sized companies.
- Motivations:
  - Reduce operational cost or increase productivity using AI.
  - Close AI capability gaps (they do not have internal expertise).
- Expected outcome:
  - Clear understanding of value and ROI-oriented benefits.
  - A direct path to contacting the agency for next steps.

Secondary Audience:
- Operational and technical stakeholders who influence the decision (team leads, product managers, IT managers).
- Motivations:
  - Validate feasibility and credibility.
  - Understand the service scope and engagement model.
- Expected outcome:
  - Confidence that the agency can execute safely and professionally.

[ES] Explicación punto por punto:
- Primary Audience: el sitio se optimiza para este grupo. Si ellos no entienden, el sitio fracasa.
- Secondary Audience: apoya la decisión, pero NO define la estructura del sitio.
- NO se incluyen aquí: menú, secciones, cards, formularios, footer, asistentes por voz. Eso es traducción JP → UX/UI.

================================================================================
3. REQUIRED PAGE TYPES
================================================================================

Required Page Types:
- Home
- About
- Services
- Case Studies / Portfolio (optional, if evidence is available)
- Contact

Page Intent (what each page must achieve):
- Home:
  - Communicate value proposition within the first screen.
  - Provide a clear primary action to contact/request a proposal.
- About:
  - Establish credibility (experience, approach, values).
- Services:
  - Explain offerings and expected outcomes in business terms.
- Case Studies / Portfolio (optional):
  - Provide evidence and examples of outcomes (only if real evidence exists).
- Contact:
  - Capture qualified inbound leads with minimal friction.

[ES] Explicación punto por punto:
- “Page Types”: define cuántas páginas existen. No define HTML específico todavía.
- “Page Intent”: define propósito verificable. QA puede validar si la intención se cumple.
- “Optional”: si no hay evidencia real, se excluye. No inventar casos.

================================================================================
4. CONTENT REQUIREMENTS
================================================================================

Content Types Required:
- Text (mandatory)
- Images (mandatory: brand assets and illustrative images)
- Video (optional)
- Audio / Podcast (optional)
- Contact form submissions (mandatory for lead capture)

Content Ownership and Source:
- Text:
  - Provided by client or written based on client-approved messaging.
- Images:
  - Client provides logos and brand assets.
  - Additional images must respect brand constraints and licensing.
- Video/Audio:
  - Only included if client provides content or approves production plan.

Content Update Frequency:
- Core pages (Home, About, Services): low frequency (monthly/quarterly).
- Case studies (if used): medium frequency (monthly).
- Contact information: as needed.

[ES] Explicación punto por punto:
- Aquí defines QUÉ contenido existe, no cómo se muestra.
- “Mandatory vs optional” evita que el equipo construya features vacías.
- “Ownership/source” evita el caos de “¿quién escribe esto?”.
- “Update frequency” ayuda a definir el admin y el Page Builder sin suposiciones.

================================================================================
5. BRAND AND IDENTITY CONSTRAINTS
================================================================================

Brand Guidelines Availability:
- YES (client will provide brand assets and preferred style)

Mandatory Brand Elements:
- Logo(s): provided by client
- Color palette: corporate colors defined by client
- Typography: corporate fonts defined by client
- Tone of voice:
  - Professional, direct, business-oriented
  - Avoid poetic or inspirational editorial tone
  - Avoid slang or informal language

Visual Constraints (high-level, not layout):
- Use a clean corporate aesthetic.
- Prioritize clarity, readability, and credibility cues.

[ES] Explicación punto por punto:
- Esta sección define RESTRICCIONES, no diseño final.
- No se define “cómo va el header” o “cards”; solo límites y lineamientos.
- “Tone of voice” es crítico: afecta copy y SEO. No es decoración.

================================================================================
6. SEO AND LEGAL REQUIREMENTS
================================================================================

SEO Requirements:
- The site must be SEO-ready:
  - Semantic HTML structure (headings and content hierarchy)
  - Indexable pages (unless otherwise stated)
  - Clear page metadata strategy (titles/descriptions)
- Primary language:
  - Spanish (Chile), with professional neutral Spanish tone

Legal / Compliance Requirements:
- Privacy policy page required (content provided by client or legal counsel).
- Cookie notice:
  - Required if analytics or tracking cookies are used.
- Terms of service:
  - Optional unless the client requires it.

[ES] Explicación punto por punto:
- SEO-ready no significa “posicionar primero”, significa que la base no impida SEO.
- Legal: si el cliente no provee contenido legal, no se inventa. Se marca como dependencia.

================================================================================
7. PRIORITIES AND EXPLICIT NON-GOALS
================================================================================

High Priority Requirements:
- Lead generation (contact/proposal request) must be the primary conversion path.
- The messaging must be ROI-oriented and business-driven.
- The website must communicate credibility quickly.
- The design must be responsive and readable on mobile and desktop.

Explicit Non-Goals:
- The site will NOT include poetic, inspirational, or editorial content that lacks direct business value.
- The site will NOT include e-commerce, checkout, or payment processing.
- The site will NOT include public user accounts or public user authentication.
- The site will NOT include a blog unless explicitly approved in a future snapshot.
- The site will NOT include features that are not tied to measurable business outcomes.

[ES] Explicación punto por punto:
- “High Priority”: define qué gana cuando hay conflictos.
- “Explicit Non-Goals”: define qué NO se hace aunque alguien lo sugiera.
- Los non-goals deben ser rechazables por QA: claros, accionables, verificables.

================================================================================
8. ACCEPTANCE CRITERIA (CLIENT VIEW)
================================================================================

The client will consider the website acceptable if:

- The value proposition is clearly understood within the first screen on Home.
- Services are explained in business outcomes, not technical jargon.
- The contact path is obvious and works reliably.
- The website looks professional and consistent with corporate identity.
- The site is responsive and readable on mobile and desktop.
- No informal tone, slang, or “inspirational” messaging is present.

[ES] Explicación punto por punto:
- Esto NO es QA técnico. Es criterio de aceptación del cliente.
- Debe ser verificable: “obvio” se traduce a “presente y visible sin fricción”.

================================================================================
9. DEPENDENCIES AND OPEN QUESTIONS
================================================================================

Dependencies:
- Client must provide:
  - Logo files (preferred formats: SVG/PNG/WEBP)
  - Brand color palette and typography guidance
  - Approved service descriptions (or raw inputs to create them)
  - Legal text for privacy policy (or legal contact)

Open Questions (to be resolved by Project Manager):
- Are there real case studies/portfolio items that can be published?
- Is multilingual support required now or later?
- What is the preferred contact method:
  - email only, form only, or both?
- Is analytics required (and which platform)?

[ES] Explicación punto por punto:
- Dependencias: lo que bloquea al equipo si falta.
- Open questions: lo que el JP debe cerrar antes de UX/UI final.
- Esto evita que el frontend invente respuestas.

================================================================================
10. FINAL STATEMENT
================================================================================

This document defines WHAT the client needs and what is explicitly excluded.
It does not define HOW the system is implemented or how pages are visually structured.

[ES] Explicación punto por punto:
- El CRB alimenta al JP.
- El JP produce la traducción JP → UX/UI y luego los documentos UX/UI.
- Si alguien mete HTML aquí, está rompiendo el workflow.
