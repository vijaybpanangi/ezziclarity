# Ezzi Clarity — Website

> *Clear paths. Confident decisions.*

**Live:** <https://ezziclarity.ca>

Static marketing site for **Ezzi Clarity**, an educational consulting practice based in Southern Ontario. The site introduces the practice, names the audiences served, lays out the core service areas, and provides a way to book an intro call.

The practice itself focuses on student success and experiential learning — helping **students**, **institutions**, and **employers** navigate Canadian academic systems with clarity, structure, and practical insight. Founded and led by Arva (MEd, OISE — University of Toronto).

*Academic and career focused only. No immigration or visa advice provided.*

## Languages

The site is fully localized in three languages, each with its own complete page tree:

- **English** (`/en/`) — default
- **Français** (`/fr/`) — uses translated URL slugs (e.g. `a-propos`, `ressources`)
- **العربية** (`/ar/`) — right-to-left layout (`<html dir="rtl">`)

A small language-gateway page at `/index.html` lets first-time visitors choose. Inside every page the header has a language switcher to move between localizations.

## What's in the box

```
/                       Language gateway
/en/  /fr/  /ar/        Localized site trees, 5 pages each
                        (home, about, services, resources, contact)
/style.css              All styling, one file (Plus Jakarta Sans)
/assets/images/         Shared image assets
/404.html               Static 404 page
/_redirects             Host-level path redirects
/sitemap.xml            Static sitemap
```

No frameworks, no build system, no JavaScript bundle. Each page is a hand-written HTML file with a small inline `<script>` for the mobile-nav drawer.

## Working with the site

### Preview locally

From the repo root:

```bash
python3 -m http.server 8000
```

Then open <http://localhost:8000/>. No install step, no watcher — refresh the browser after each edit.

### Deploy

Upload the entire repo to a static host. The `_redirects` file uses Netlify / Cloudflare Pages syntax (e.g. `/about /en/about/ 301`), so those are the natural deploy targets. Visual verification in a browser after each deploy.

## Editing content

Two things are worth knowing before opening any HTML file:

1. **Translations live inline in the HTML.** There is no string-extraction layer. Changing a sentence usually means making the same change in three files (`en/`, `fr/`, `ar/`).
2. **Relative path depth varies.** `style.css` is reached as `style.css` from the root, `../style.css` from a language home, and `../../style.css` from a language subpage. Recompute when moving or adding pages.

Anything more substantial than copy edits should go through a brainstorm → spec → plan workflow before code changes; see `docs/superpowers/README.md` for that convention.

## Project documentation

- **`CLAUDE.md`** — repo guidance for Claude Code sessions (architecture, conventions, gotchas).
- **`docs/superpowers/specs/`** — design specs for non-trivial changes (`YYYY-MM-DD-<topic>-design.md`).
- **`docs/superpowers/plans/`** — implementation plans matched to specs (`YYYY-MM-DD-<topic>.md`).
- **`CHANGELOG.md`** — curated trail of notable changes (infrastructure, documentation, deployment).

## Recent updates

- **2026-05-28** — WordPress theme leftovers scrubbed (`style.css` header, vestigial `static-site` body class, orphan `.page-*-services` selectors, `README_STATIC.txt`); `www.ezziclarity.ca` added as a Custom Domain on Cloudflare Pages (was returning 522); project documentation added (this README, `CLAUDE.md`, `docs/superpowers/` scaffold, `.gitignore`); GitHub About panel filled in with description, website, and topics.

Full chronological log: [`CHANGELOG.md`](CHANGELOG.md).

## Styling notes

`style.css` defines the design system as CSS custom properties in `:root`:

- Sky Blue primary (`--sky*`)
- Warm Peach accent (`--peach*`)
- Cream neutrals (`--cream*`)
- Ink text scale (`--ink*`)
- Plus Jakarta Sans throughout (loaded via Google Fonts `@import`)

Section banner comments (`/* ============= */`) inside the file group related rules — search for the banner of the area you're editing rather than scrolling.
