# Frontend Base Layout Specification
## TASK-040 – Set up Tailwind CSS and Base Frontend Layout

[ES] Este documento define la estructura base del frontend.
[ES] Implementa HTML + Tailwind bajo las reglas UX/UI aprobadas.
[ES] No define contenido final ni diseño visual detallado.

================================================================================
1. PURPOSE OF THIS DOCUMENT
================================================================================

This document specifies the base frontend layout architecture,
including global layout regions, reusable structural components,
and Tailwind usage rules.

[ES] Este documento sirve como contrato técnico para Frontend.
[ES] No autoriza creatividad fuera del marco definido.

================================================================================
2. GLOBAL LAYOUT STRUCTURE
================================================================================

The frontend layout is composed of the following global regions:

- Header
- Main Content Area
- Footer

These regions must be present on all public pages.

[ES] No se permiten layouts alternativos por página.
[ES] La consistencia es obligatoria.

--------------------------------------------------------------------------------
2.1 Header
--------------------------------------------------------------------------------

Purpose:
- Brand identification
- Primary navigation

Mandatory Elements:
- Logo
- Primary navigation menu
- Contact access (direct or indirect)

Constraints:
- No secondary navigation
- No promotional banners

[ES] El header no es un espacio publicitario.
[ES] Es orientación y contexto.

--------------------------------------------------------------------------------
2.2 Main Content Area
--------------------------------------------------------------------------------

Purpose:
- Display page-specific content blocks

Rules:
- Content is injected dynamically per page.
- Blocks are rendered in backend-defined order.
- No fixed heights or visual tricks.

[ES] El frontend no decide el orden del contenido.
[ES] Renderiza lo que el backend define.

--------------------------------------------------------------------------------
2.3 Footer
--------------------------------------------------------------------------------

Purpose:
- Secondary navigation
- Legal or corporate information

Mandatory Elements:
- Copyright
- Secondary navigation links (if defined)

Constraints:
- No primary CTAs
- No complex interactions

[ES] El footer cierra, no compite.

================================================================================
3. BASE HTML STRUCTURE
================================================================================

All public pages must follow this structure:

- `<header>`
- `<main>`
- `<footer>`

No additional root-level wrappers are allowed.

[ES] Evita wrappers innecesarios.
[ES] Simplifica DOM y accesibilidad.

================================================================================
4. TAILWIND USAGE RULES
================================================================================

--------------------------------------------------------------------------------
4.1 Allowed Tailwind Classes
--------------------------------------------------------------------------------

Frontend must use only semantic Tailwind tokens:

- bg-background
- text-foreground
- bg-inverse
- text-inverse-foreground
- border-border
- text-muted-foreground
- bg-cta
- text-danger

[ES] No se permiten colores hardcodeados.
[ES] No se permiten clases cromáticas (`bg-orange-500`, etc).

--------------------------------------------------------------------------------
4.2 Typography Rules
--------------------------------------------------------------------------------

- All text must use the primary font token.
- No inline font declarations.
- Font sizes must follow a clear hierarchy.

[ES] La tipografía es sistémica, no decorativa.

--------------------------------------------------------------------------------
4.3 Spacing and Layout
--------------------------------------------------------------------------------

- Use Tailwind spacing scale consistently.
- Avoid arbitrary spacing values.
- Layout must be responsive by default.

[ES] Espaciado inconsistente es deuda técnica.

================================================================================
5. RESPONSIVE STRATEGY
================================================================================

- Mobile-first approach is mandatory.
- Layout must degrade gracefully on small screens.
- No desktop-only assumptions are allowed.

[ES] El diseño debe funcionar primero en móvil,
[ES] no adaptarse después.

================================================================================
6. ACCESSIBILITY BASELINE
================================================================================

- Semantic HTML is mandatory.
- Interactive elements must be accessible.
- Focus states must be visible.

[ES] Accesibilidad no es opcional ni estética.

================================================================================
7. FORBIDDEN PRACTICES
================================================================================

The following are strictly forbidden:

- Inline styles
- Custom CSS outside the design system
- Decorative animations
- JavaScript-driven layout behavior

[ES] Si algo requiere JS para verse bien, está mal planteado.

================================================================================
8. VALIDATION CRITERIA (QA)
================================================================================

The base frontend layout is valid if:

- Header, main, and footer exist on all pages.
- Tailwind semantic tokens are used consistently.
- No forbidden classes or practices are detected.
- Layout is responsive and accessible.

[ES] QA valida estructura y uso de tokens,
[ES] no “si se ve bonito”.

================================================================================
9. GOVERNANCE
================================================================================

Derived From:
- TASK-021 – JP Translation
- TASK-022 – UX/UI Specification

Task Status:
- Completed

Next Task Dependency:
- TASK-041 – Create almadesign.css with corporate identity

[ES] A partir de aquí, se habilita la identidad visual,
[ES] pero la estructura ya no se toca.

================================================================================
END OF DOCUMENT
================================================================================
