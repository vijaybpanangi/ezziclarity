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
/en/  /fr/  /ar/        Localized site trees, 6 pages each
                        (home, about, consulting, books, resources, contact)
/style.css              All styling, one file (~1734 lines)
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
- **`ROADMAP.md`** — future updates and deferred items (email migration to iCloud+ Custom Domain, canonical-URL redirect).

## Release history

One row per release — every release is a semver git tag on its merge commit. Full notes in [`CHANGELOG.md`](CHANGELOG.md); all tags at [github.com/vijaybpanangi/ezziclarity/tags](https://github.com/vijaybpanangi/ezziclarity/tags). Newest first.

| Version | When (UTC) | PR | Summary |
|---|---|---|---|
| `v3.5.0` | 2026-06-15 18:59 | [#13](https://github.com/vijaybpanangi/ezziclarity/pull/13) | Maximal Liquid Glass — glassy nav/buttons + hover light-sweep |
| `v3.4.1` | 2026-06-15 17:46 | [#12](https://github.com/vijaybpanangi/ezziclarity/pull/12) | Release governance — semver tags + versioned/timestamped CHANGELOG + doc currency |
| `v3.4.0` | 2026-06-15 16:56 | [#11](https://github.com/vijaybpanangi/ezziclarity/pull/11) | Liquid Glass — site-wide frosted-glass ramp-up |
| `v3.3.3` | 2026-06-15 16:37 | [#10](https://github.com/vijaybpanangi/ezziclarity/pull/10) | Founder portrait resized to a small avatar |
| `v3.3.2` | 2026-06-15 16:30 | [#9](https://github.com/vijaybpanangi/ezziclarity/pull/9) | About hero "at a glance" card + tightened founder layout |
| `v3.3.1` | 2026-06-15 16:10 | [#8](https://github.com/vijaybpanangi/ezziclarity/pull/8) | About symmetry pass + founder portrait halo |
| `v3.3.0` | 2026-06-15 15:37 | [#7](https://github.com/vijaybpanangi/ezziclarity/pull/7) | Founder portrait added to About pages (EN/FR/AR) |
| `v3.2.1` | 2026-06-15 15:07 | [#6](https://github.com/vijaybpanangi/ezziclarity/pull/6) | Contact emails surfaced (`info@` in JSON-LD, `arva@` on founder) |
| `v3.2.0` | 2026-06-15 14:48 | [#5](https://github.com/vijaybpanangi/ezziclarity/pull/5) | Email housekeeping — clean SPF, DMARC `rua` |
| `v3.1.1` | 2026-06-15 03:59 | [`2026c52`](https://github.com/vijaybpanangi/ezziclarity/commit/2026c52) | ROADMAP: Cloudflare-managed robots.txt note (direct) |
| `v3.1.0` | 2026-06-15 03:54 | [`88f8800`](https://github.com/vijaybpanangi/ezziclarity/commit/88f8800) | Technical SEO foundation — canonical, hreflang, JSON-LD, og:locale, sitemap, robots (direct) |
| `v3.0.1` | 2026-06-11 15:20 | [#4](https://github.com/vijaybpanangi/ezziclarity/pull/4) | ROADMAP follow-ups from the Soft Modern redesign |
| `v3.0.0` | 2026-06-11 15:01 | [#3](https://github.com/vijaybpanangi/ezziclarity/pull/3) | Soft Modern redesign (glass, gradient wash, Fraunces accents) |
| `v2.0.1` | 2026-06-08 17:36 | [#2](https://github.com/vijaybpanangi/ezziclarity/pull/2) | Reorder `_redirects` for Cloudflare perf hint |
| `v2.0.0` | 2026-06-08 17:30 | [#1](https://github.com/vijaybpanangi/ezziclarity/pull/1) | Two-pillar restructure — Consulting + Books (student-only) |
| `v1.0.0` | 2026-05-28 17:53 | [tag](https://github.com/vijaybpanangi/ezziclarity/releases/tag/v1.0.0) | Trilingual marketing site live |

Pre-launch history (the WordPress-era archives in `docs/archive/`, the Wiki, and the initial docs/infra setup) is detailed in [`CHANGELOG.md`](CHANGELOG.md). Planned work lives in [`ROADMAP.md`](ROADMAP.md).

## Styling notes

`style.css` (~1734 lines) defines the design system as CSS custom properties in `:root`:

- Sky Blue primary (`--sky*`)
- Warm Peach accent (`--peach*`)
- Cream neutrals (`--cream*`)
- Ink text scale (`--ink*`)
- Glass surfaces (`--glass`, `--glass-border`, `--shadow-glass-*`)
- Gradient page wash (`--wash`)

Three font families, all loaded via `@import` at the top of the file (valid placement):
- **Plus Jakarta Sans** — workhorse body and UI text
- **Fraunces** — italic serif accents on Latin pages (EN/FR H1s and chapter labels)
- **IBM Plex Sans Arabic** — Arabic headings and buttons

Section banner comments (`/* ============= */`) inside the file group related rules — search for the banner of the area you're editing rather than scrolling.
