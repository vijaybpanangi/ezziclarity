# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this is

Static marketing site for **Ezzi Clarity**, an educational consulting business based in Southern Ontario. Fully localized into three languages: English (`/en/`), French (`/fr/`), Arabic (`/ar/`). Five pages per language: home, about, services, resources, contact. A root `/index.html` is a language gateway.

Originally a WordPress theme (visible in `style.css` header: `Theme Name: Ezzi Clarity, Version: 8.5.0`). PHP and the WP runtime are gone — this is plain HTML, one stylesheet, static assets, and a small inline mobile-nav script duplicated on each page.

## Build, run, deploy

There is no build system. No `package.json`, no bundler, no test framework. Edits are made directly to HTML/CSS files.

- **Preview locally:** `python3 -m http.server 8000` from the repo root, open `http://localhost:8000/`.
- **Deploy:** upload the entire repo to a static host. The `_redirects` file uses Netlify/Cloudflare-Pages syntax (e.g. `/about /en/about/ 301`) — the deploy target is one of those platforms.
- **Verification:** visual, in a browser. There are no automated tests.

## The single thing to internalize: triplicate maintenance

The same page exists in three language trees, and any markup change usually needs to be applied to all three.

```
/index.html                <- language gateway (3 buttons)
/en/index.html             /fr/index.html               /ar/index.html
/en/about/                 /fr/a-propos/                /ar/about/
/en/services/              /fr/services/                /ar/services/
/en/resources/             /fr/ressources/              /ar/resources/
/en/contact/               /fr/contact/                 /ar/contact/
```

### Per-language URL slugs

- **English and Arabic** use English directory names (`about`, `resources`).
- **French** uses translated slugs: `a-propos` (not `about`), `ressources` (not `resources`). `services` and `contact` happen to be identical.
- The `.lang-switch` block in every page hard-codes cross-language hrefs — when adding or renaming a page, every cross-language link in every parallel page needs updating.

### Per-language HTML attributes

- `<html lang="en">` / `<html lang="fr">` / `<html lang="ar" dir="rtl">`.
- Inside Arabic pages, the `.lang-switch` container has `dir="ltr"` so the EN/FR/AR pills stay LTR even within the RTL page.
- Brand-name `aria-label`/`alt` text is translated per language (e.g. `"Ezzi Clarity — Home"`, `"… — Accueil"`, `"إيزي كلاريتي — الرئيسية"`). Preserve that pattern.

### Relative paths shift with depth

One global `style.css` and one shared `assets/images/` directory at the repo root. Pages reach them with different `../` counts:

- Root `/index.html` → `style.css`, `assets/images/…`
- `/en/index.html` → `../style.css`, `../assets/images/…`
- `/en/about/index.html` → `../../style.css`, `../../assets/images/…`

When moving a page or creating a new subpage, recompute every `href`/`src`.

## Stylesheet (`style.css`, ~1650 lines)

Single source of styling. Defines a token palette in `:root`:

- Primary — Sky Blue: `--sky`, `--sky-mid`, `--sky-dark`, `--sky-light`, `--sky-pale`, `--sky-xpale`
- Accent — Warm Peach: `--peach`, `--peach-mid`, `--peach-light`, `--peach-pale`, `--peach-xpale`
- Neutrals — Cream: `--cream`, `--cream-mid`, `--cream-dark`, `--white`
- Ink scale: `--ink`, `--ink-mid`, `--ink-soft`, `--ink-muted`, `--ink-pale`
- Borders + shadow tokens

Typeface: **Plus Jakarta Sans** (Google Fonts, loaded by `@import` at the top of `style.css`).

Sections are delimited by banner comments (`/* ============= */`). Search for the banner of the area you're editing rather than scrolling.

## Mobile navigation

Each page contains its own inline `<script>` that toggles the `.mobile-nav` drawer (hamburger click, Escape closes). The script is duplicated rather than externalized — when behavior changes, change it in every file.

## Maintenance notes grounded in this repo

- **No string-extraction system.** Translations live inline in the HTML. Editing a sentence means finding it in all three language trees.
- **`sitemap.xml` and `_redirects` are hand-maintained.** They enumerate every URL; update them when adding/removing/renaming pages.
- **Compliance disclaimer recurs across pages:** *"Academic and career focused only. No immigration or visa advice provided."* (also rendered translated in `fr/` and `ar/`). Keep wording consistent — it's there for a reason.
- **The CSS header still carries WordPress theme metadata** (`Theme Name`, `Version: 8.5.0`, `Text Domain`). Harmless leftover; don't remove unless asked.
- **Accessibility scaffolding is in place** — `skip-link`, `aria-label`, `aria-expanded`, `aria-hidden`, `aria-current`. Preserve them on edits; `<img alt="">` is intentionally empty on decorative images and descriptive on content-bearing ones.

## Project documentation conventions

- `docs/superpowers/specs/` holds design specs (the *what* and *why*) — `YYYY-MM-DD-<topic>-design.md`.
- `docs/superpowers/plans/` holds implementation plans (the *how*) — `YYYY-MM-DD-<topic>.md`.
- See `docs/superpowers/README.md` for the brainstorm → spec → plan → execute workflow.
