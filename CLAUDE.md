# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this is

Static marketing site for **Ezzi Clarity**, an educational consulting business based in Southern Ontario. Fully localized into three languages: English (`/en/`), French (`/fr/`), Arabic (`/ar/`). Six pages per language: home, about, consulting, books, resources, contact. A root `/index.html` is a language gateway.

The codebase was originally produced as a WordPress theme and then converted to plain HTML + CSS — that origin is now history (no PHP, no WP runtime, no leftover theme metadata in the stylesheet, no `static-site` body class marker). What's left is the structure: plain HTML, one stylesheet, static assets, and a small inline mobile-nav script duplicated on each page.

## Build, run, deploy

There is no build system. No `package.json`, no bundler, no test framework. Edits are made directly to HTML/CSS files.

- **Live site:** <https://ezziclarity.ca> — Cloudflare Pages auto-deploys from `main` on every push. The `_redirects` file (Netlify / Cloudflare Pages syntax) handles short paths like `/about → /en/about/`.
- **Preview locally:** `python3 -m http.server 8000` from the repo root, open `http://localhost:8000/`.
- **Verify a deploy:** after pushing, the Cloudflare Pages dashboard shows the build, and the live site updates within ~30s. There are no automated tests; verification is visual.

## The single thing to internalize: triplicate maintenance

The same page exists in three language trees, and any markup change usually needs to be applied to all three.

```
/index.html                <- language gateway (3 buttons)
/en/index.html             /fr/index.html               /ar/index.html
/en/about/                 /fr/a-propos/                /ar/about/
/en/consulting/            /fr/conseil/                 /ar/consulting/
/en/books/                 /fr/livres/                  /ar/books/
/en/resources/             /fr/ressources/              /ar/resources/
/en/contact/               /fr/contact/                 /ar/contact/
```

### Per-language URL slugs

- **English and Arabic** use English directory names (`about`, `consulting`, `books`, `resources`).
- **French** uses translated slugs: `a-propos` (not `about`), `conseil` (not `consulting`), `livres` (not `books`), `ressources` (not `resources`). `contact` is identical across all three.
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

## Stylesheet (`style.css`, ~1734 lines)

Single source of styling. Defines a token palette in `:root`:

- Primary — Sky Blue: `--sky`, `--sky-mid`, `--sky-dark`, `--sky-light`, `--sky-pale`, `--sky-xpale`
- Accent — Warm Peach: `--peach`, `--peach-mid`, `--peach-light`, `--peach-pale`, `--peach-xpale`
- Neutrals — Cream: `--cream`, `--cream-mid`, `--cream-dark`, `--white`
- Ink scale: `--ink`, `--ink-mid`, `--ink-soft`, `--ink-muted`, `--ink-pale`
- Borders + shadow tokens
- Glass surfaces: `--glass`, `--glass-border`, `--shadow-glass-*`
- Gradient page wash: `--wash`
- **Liquid Glass (`v3.4.0`):** the glass is now genuinely frosted, not faux. `--glass` is ~55% white; `--glass-blur` (`blur(20px) saturate(1.6)`) + `--glass-highlight` (specular top edge + inner 1px ring) are applied to every glass surface (`.card`, `.quote-card`, `.service-card`, `.contact-form`, `.timeline-item`, `.faq`, `.chapter-card`, `.about-col`, `.hero-card`, `.process-step`) via a consolidated rule placed after the base card rules. The `<body>` background layers soft sky/peach colour pools over `--wash` (with `background-attachment: fixed`) so the frost refracts colour. An `@supports not (backdrop-filter)` block keeps those surfaces near-opaque where unsupported.

Three font families, all loaded via `@import` at the very top of the file (valid placement — mid-file `@import` is ignored by browsers):
- **Plus Jakarta Sans** — workhorse body and UI text
- **Fraunces** — italic serif accents on Latin pages (EN/FR H1s and chapter labels; not applied on AR)
- **IBM Plex Sans Arabic** — Arabic headings and buttons

Sections are delimited by banner comments (`/* ============= */`). The file includes a `/* MOTION */` section that houses the `@media (prefers-reduced-motion: reduce)` overrides. Search for the banner of the area you're editing rather than scrolling.

## Mobile navigation

Each page contains its own inline `<script>` that toggles the `.mobile-nav` drawer (hamburger click, Escape closes). The script is duplicated rather than externalized — when behavior changes, change it in every file. Each page's inline script also contains the scroll-reveal IntersectionObserver block (adds `.is-visible` to elements with `.reveal` as they enter the viewport, gated behind `prefers-reduced-motion`); it is duplicated per page by the same convention.

## Maintenance notes grounded in this repo

- **No string-extraction system.** Translations live inline in the HTML. Editing a sentence means finding it in all three language trees.
- **`sitemap.xml` and `_redirects` are hand-maintained.** They enumerate every URL; update them when adding/removing/renaming pages.
- **Compliance disclaimer recurs across pages:** *"Academic and career focused only. No immigration or visa advice provided."* (also rendered translated in `fr/` and `ar/`). Keep wording consistent — it's there for a reason.
- **WordPress provenance.** Pre-2026-05-28 the codebase carried leftover artifacts from its WP theme origin: a `Theme Name` / `Version` / `Text Domain` block at the top of `style.css`, a vestigial `class="static-site"` body marker on most HTML files, and a few orphaned `.page-en-services` / `.page-fr-services` / `.page-ar-services` CSS selectors. All were removed during cleanup; the codebase is now WP-free at the file level. The apex DNS still has SPF and DMARC TXT records that reference `_spf.wpcloud.com` — those live in Cloudflare DNS, not the repo, and have not been touched.
- **Accessibility scaffolding is in place** — `skip-link`, `aria-label`, `aria-expanded`, `aria-hidden`, `aria-current`. Preserve them on edits; `<img alt="">` is intentionally empty on decorative images and descriptive on content-bearing ones.

## Project documentation conventions

- `docs/superpowers/specs/` holds design specs (the *what* and *why*) — `YYYY-MM-DD-<topic>-design.md`.
- `docs/superpowers/plans/` holds implementation plans (the *how*) — `YYYY-MM-DD-<topic>.md`.
- `ROADMAP.md` at the root tracks **future** work and deferred items; `CHANGELOG.md` tracks **past** changes. Always check both before proposing work — the answer to "is this on the radar?" is in one or the other.
- **Releases & versioning.** Every release gets a semver git tag on its merge commit — **major** = redesign / identity shift, **minor** = new feature or notable enhancement, **patch** = fix / content / docs. When you ship, add a versioned, timestamped `CHANGELOG.md` entry (`## vX.Y.Z — Title (YYYY-MM-DD HH:MM UTC)`, time from the merge commit) and create + push the matching tag (`git tag -a vX.Y.Z -m "…" && git push origin vX.Y.Z`). Latest: `v3.4.1`.
- See `docs/superpowers/README.md` for the brainstorm → spec → plan → execute workflow.
