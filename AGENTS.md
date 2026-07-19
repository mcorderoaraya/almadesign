# AGENTS.md — AlmaDesign Web

Este repositorio es operado principalmente con Codex. Este archivo es la guía obligatoria para cualquier agente de desarrollo.

## Identidad del proyecto

AlmaDesign Web es el sitio público de AlmaDesign:

```text
https://almadesign.cl
```

Incluye páginas comerciales, verticales públicas, formulario de contacto, dashboard interno de contenido y la integración visual/HTTP con el RAG de AlmaDesign.

## Separación obligatoria entre repos

Este repo y el RAG son proyectos separados:

```text
almadesign              → sitio público PHP/MVC
rack-core-rag-semantic  → backend RAG semántico FastAPI / BGE-M3 / pgvector
apogeopulsar            → documentación estratégica / Obsidian / decisiones
```

No mezclar responsabilidades:

- Cambios de UI, copy, rutas públicas, formulario, assets y dashboard del sitio pertenecen a este repo.
- Cambios de retrieval, corpus RAG, embeddings, prompts RAG backend y API `/chat` pertenecen a `rack-core-rag-semantic`.
- Decisiones estratégicas y stack cerrado pertenecen a `apogeopulsar`.

## Stack técnico cerrado

| Capa | Decisión |
|---|---|
| Lenguaje | PHP 8.3+ |
| Arquitectura | MVC liviano sin framework pesado |
| Dependencias | Composer |
| Email | PHPMailer + SMTP Zoho por `.env` |
| Frontend | PHP views + CSS/JS estático |
| Assets públicos | `public/assets/` |
| Rutas | `routes/web.php` |
| Entrada HTTP | `public/index.php` |
| Configuración | `.env`, nunca secretos hardcodeados |
| DB sitio | PostgreSQL solo para contenido/dashboard cuando aplique |
| RAG externo | `RAG_BASE_URL` hacia servicio interno loopback |

No introducir Laravel, Symfony, React, Next, Tailwind ni otro framework grande sin autorización explícita de Mauricio.

## Comandos base

### Instalar dependencias

```bash
composer install
```

### Levantar servidor local PHP

```bash
php -S 127.0.0.1:8080 -t public public/local-router.php
```

### Validar sintaxis PHP

```bash
find app config public routes scripts -name '*.php' -print0 | xargs -0 -n1 php -l
```

### Validar estado Git

```bash
git status --short --branch
git diff --check
```

## Reglas de seguridad

Nunca commitear:

```text
.env
credenciales SMTP
passwords Zoho
tokens
claves privadas
logs sensibles
storage generado
backups productivos
dumps de base de datos
```

`.env.example` solo puede contener placeholders.

No imprimir secretos completos en consola ni en reportes.

## Reglas de producción

El VPS productivo validado usa:

```text
Hostinger KVM 2
Ubuntu 24.04
Nginx
PHP 8.3
Cloudflare proxy
Zoho Mail
App root: /var/www/almadesign
Backup root: /var/backups/almadesign
```

No desplegar a producción sin instrucción explícita.

No modificar Nginx, Cloudflare, DNS, SSL, Zoho ni systemd salvo que la tarea lo pida claramente.

Antes de cualquier deploy controlado:

1. Verificar git limpio.
2. Crear backup.
3. Validar sintaxis PHP.
4. Validar rutas críticas por HTTP.
5. Confirmar rollback disponible.
6. Reportar evidencia real.

## Rutas públicas críticas

No romper estas rutas:

```text
/
/consultoria-ia-procesos
/apogeo
/ai-for-humans
/apogeo-lux
/contacto
/contacto/enviar
/contacto/gracias
```

Si se cambia una ruta pública, justificar impacto SEO y navegación.

## Reglas de formulario/contacto

El formulario debe mantener:

```text
CSRF
honeypot
validación server-side
sanitización
rate limit por IP/sesión
Reply-To correcto
logs mínimos sin cuerpo completo del mensaje
```

No pedir datos innecesarios.

No guardar contenido sensible completo en logs.

## Integración con RAG AlmaDesign

El sitio consume el RAG mediante `RAG_BASE_URL`.

Reglas:

```text
El navegador no debe llamar directamente al backend RAG si eso expone infraestructura interna.
El sitio debe actuar como proxy o capa controlada cuando aplique.
RAG_BASE_URL en producción debe apuntar a loopback / servicio interno.
```

No cambiar prompt, embeddings o retrieval desde este repo. Eso pertenece a `rack-core-rag-semantic`.

## Criterio editorial AlmaDesign

El sitio debe sonar:

- humano;
- cercano;
- claro;
- inspiracional;
- ligeramente poético;
- estratégicamente útil;
- no puramente técnico.

Idea central:

```text
AI FOR HUMANS: la IA expande capacidad humana, no reemplaza criterio, dignidad ni vínculo.
```

Frase guía permitida:

```text
La IA no viene a apagar lo humano: viene a abrir espacio para pensar mejor, decidir con más claridad y crear con más dignidad.
```

## Reglas para cambios de contenido

Al modificar copy:

1. Mantener precisión comercial.
2. No inventar clientes, certificaciones, métricas ni promesas.
3. No sobredimensionar capacidades de IA.
4. Mantener tono humano y responsable.
5. Cuidar consentimiento y privacidad cuando haya contacto.
6. Revisar H1 único por página cuando aplique.
7. Agregar `alt` descriptivo a imágenes.

## Reglas para assets

Assets públicos van en:

```text
public/assets/
```

Mantener cache busting con `asset()` / `filemtime()` cuando aplique.

Preferir WebP/PNG optimizados.

No subir archivos pesados, crudos o privados sin autorización.

## Reglas para agentes Codex

Antes de tocar archivos:

```bash
git status --short --branch
git log --oneline -5
```

Luego:

1. Leer README y este AGENTS.md.
2. Identificar archivos exactos a modificar.
3. Hacer cambios pequeños.
4. Validar sintaxis PHP.
5. Ejecutar pruebas o checks disponibles.
6. Reportar archivos modificados y salida real.

No hacer refactors grandes si la tarea es de copy, QA, accesibilidad o bug puntual.

No tocar `composer.lock` salvo que se cambien dependencias intencionalmente.

## Validación mínima antes de entregar

Ejecutar:

```bash
git diff --check
find app config public routes scripts -name '*.php' -print0 | xargs -0 -n1 php -l
```

Si se cambian assets o vistas públicas, levantar localmente y revisar al menos rutas afectadas:

```bash
php -S 127.0.0.1:8080 -t public public/local-router.php
```

Luego probar con `curl` o navegador:

```bash
curl -I http://127.0.0.1:8080/
curl -I http://127.0.0.1:8080/contacto
```

## Cuándo documentar

Documentar si el cambio afecta:

```text
rutas públicas
formulario/contacto
SMTP
RAG_BASE_URL
dashboard de contenido
deploy/operación
seguridad
privacidad
SEO
estructura MVC
```

Usar `docs/` para documentación técnica versionable.

## Regla final

```text
Menos deuda técnica.
Más claridad operativa.
Más producto real.
Más AI FOR HUMANS.
```
