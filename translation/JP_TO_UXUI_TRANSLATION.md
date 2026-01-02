# JP to UX/UI Translation Document
## TASK-021 – Translate Client Requirements into UX/UI Structure

[ES] Este documento es el resultado de la TASK-021.
[ES] Traduce los requerimientos del cliente (CRB) a una estructura ejecutable para UX/UI y Frontend.
[ES] No contiene diseño visual, HTML, CSS ni decisiones técnicas de backend.

================================================================================
1. DOCUMENT PURPOSE
================================================================================

This document defines the required page types, content blocks, hierarchy,
and interaction intent derived from the Client Requirements Brief.

[ES] Aquí el Jefe de Proyecto transforma intención de negocio en estructura.
[ES] UX/UI y Frontend NO deben inferir ni inventar nada fuera de este documento.

================================================================================
2. SOURCE DOCUMENTS AND AUTHORITY
================================================================================

Primary Source:
- CLIENT_REQUIREMENTS_BRIEF.md

Active Documentation Snapshot:
- docs-v1.2.md

Governance References:
- governance_boundary.md
- frontend_governance.md

Authority Rule:
- In case of conflict, this document prevails over visual or creative decisions.

[ES] Este documento tiene autoridad estructural.
[ES] “Se ve mejor así” NO es argumento válido contra esto.

================================================================================
3. GLOBAL STRUCTURAL RULES
================================================================================

- The website is conversion-oriented, not editorial.
- All pages must have a clear primary intent.
- Content hierarchy must prioritize clarity and business value.
- Decorative or experimental sections are forbidden.

[ES] Estas reglas aplican a TODAS las páginas, sin excepción.

================================================================================
4. PAGE TYPES DEFINITION
================================================================================

--------------------------------------------------------------------------------
PAGE-01: Home
--------------------------------------------------------------------------------

Business Intent:
- Present the value proposition immediately.
- Drive the user to initiate contact.

Primary User Action:
- Request contact / proposal.

Secondary Actions:
- Navigate to Services.
- Navigate to About.

Mandatory Content Blocks:
- Value proposition block.
- Services summary block.
- Credibility indicators block.
- Primary call-to-action block.

Forbidden:
- Editorial storytelling.
- Non-business inspirational content.

[ES] La Home NO es narrativa. Es decisión rápida.
[ES] Si no se entiende en el primer bloque, falla.

--------------------------------------------------------------------------------
PAGE-02: About
--------------------------------------------------------------------------------

Business Intent:
- Establish credibility and trust.
- Explain approach and values.

Primary User Action:
- Continue to Services or Contact.

Mandatory Content Blocks:
- Company description block.
- Approach / methodology block.
- Values or principles block.

Forbidden:
- Personal biographies.
- Informal tone.

[ES] “About” no es autobiografía.
[ES] Es reducción de riesgo percibido.

--------------------------------------------------------------------------------
PAGE-03: Services
--------------------------------------------------------------------------------

Business Intent:
- Explain offerings in business outcomes.
- Reduce uncertainty before contact.

Primary User Action:
- Initiate contact.

Mandatory Content Blocks:
- Services overview block.
- Individual service description blocks.
- Expected outcomes block.

Optional Blocks:
- Process overview (high-level).

Forbidden:
- Technical deep dives.
- Implementation details.

[ES] Servicios se explican en impacto, no en tecnología.

--------------------------------------------------------------------------------
PAGE-04: Case Studies / Portfolio (Optional)
--------------------------------------------------------------------------------

Business Intent:
- Provide evidence of execution capability.

Condition:
- This page only exists if real, verifiable cases are provided.

Mandatory Content Blocks (if enabled):
- Case summary block.
- Problem → solution → outcome structure.

Forbidden:
- Hypothetical or fictional cases.

[ES] Si no hay evidencia real, esta página NO se crea.

--------------------------------------------------------------------------------
PAGE-05: Contact
--------------------------------------------------------------------------------

Business Intent:
- Capture qualified inbound leads.

Primary User Action:
- Submit contact request.

Mandatory Content Blocks:
- Contact introduction block.
- Contact form block.
- Contact confirmation block.

Forbidden:
- Multiple competing actions.
- Excessive required fields.

[ES] El contacto debe ser simple.
[ES] Fricción innecesaria es rechazo automático.

================================================================================
5. CONTENT BLOCK DEFINITION (GENERIC)
================================================================================

Block Types Allowed:
- Text
- Image
- Mixed (text + image)
- Form

Block Rules:
- Each block has a single purpose.
- Blocks must be reorderable by backend definition.
- Blocks must not infer missing data.

[ES] Los bloques existen para servir contenido, no para decorar.

================================================================================
6. INTERACTION RULES
================================================================================

Allowed Interactions:
- Navigation
- Scroll
- Form submission

Forbidden Interactions:
- Gamification
- Complex animations
- Hidden interactions

[ES] Si una interacción no está aquí, no se implementa.

================================================================================
7. CTA RULES
================================================================================

- Each page has ONE primary CTA.
- The primary CTA must be visually and structurally clear.
- Secondary CTAs must not compete with the primary one.

[ES] Si hay más de un CTA principal, no hay ninguno.

================================================================================
8. SEO STRUCTURAL RULES
================================================================================

- Each page must have a single dominant topic.
- Content hierarchy must follow logical heading structure.
- No keyword stuffing or decorative text.

[ES] SEO aquí es claridad estructural, no trucos.

================================================================================
9. OUT OF SCOPE (EXPLICIT)
================================================================================

The following are explicitly out of scope for UX/UI and Frontend:

- Backend logic decisions.
- Data validation rules.
- Security mechanisms.
- Analytics strategy.

[ES] Esto protege a UX/UI de responsabilidades indebidas.

================================================================================
10. VALIDATION CRITERIA
================================================================================

The UX/UI structure is considered valid if:

- All defined page types exist.
- All mandatory blocks are present.
- No forbidden content or interactions are included.
- No additional pages or blocks are created.

[ES] QA valida contra esta lista, no contra opiniones.

================================================================================
11. APPROVAL
================================================================================

Translated by:
- Project Manager

QA Validation:
- REQUIRED

Status:
- Pending QA approval

================================================================================
12. NON-NEGOTIABLE RULE
================================================================================

If frontend implementation deviates from this document,
the work must be rejected and corrected.

[ES] Este documento no es sugerencia. Es contrato estructural.
