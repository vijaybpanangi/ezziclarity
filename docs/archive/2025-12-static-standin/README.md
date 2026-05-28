# Dec 2025 — Static stand-in site (archived)

These are the source files for the **first production version** of `ezziclarity.ca` — a single-language English-only static site deployed in **December 2025** as an explicit "temporary stand-in" while the larger WordPress theme build was happening in parallel. This is the very first thing visitors saw when they typed in the domain.

## What's preserved here

| File | Purpose |
|---|---|
| `index.html` | Homepage — hero with the *"Less Noise. More Signal."* tagline, three pillars, four-step process, two testimonials, CTA |
| `about.html` | About page — story, approach, three values (Clarity / Honesty / Partnership), three audiences |
| `services.html` | Services — Clarity Session, Pathway Planning Package, Application & Documentation Support, Workshops & Group Sessions |
| `resources.html` | FAQs + planning prompts + how to prepare for a Clarity Session |
| `contact.html` | Contact form + email + addresses + meeting prep checklist |
| `styles.css` | Single global stylesheet (~600 lines), Inter + Playfair Display, sky/indigo gradient, dark-mode-aware |
| `favicon.svg` | EC monogram in circular sky→indigo gradient, with a small "clarity spark" highlight |
| `logo-ec.svg` | Identical SVG to `favicon.svg` (the favicon doubled as the header logo) |
| `robots.txt` | Standard allow-all + sitemap pointer |

**Files not preserved** (not in the source paste): `site.webmanifest`, `sitemap.xml`. These can be reconstructed if ever needed — the webmanifest is referenced from each HTML page, and the sitemap would list these 5 pages.

## Why this matters historically

The Dec 2025 version is **substantially different from what runs on `ezziclarity.ca` today**:

| Dimension | Dec 2025 (this archive) | Current production |
|---|---|---|
| **Tagline** | *"Less Noise. More Signal."* | *"Clear paths. Confident decisions."* |
| **Audiences** | Students · Parents & Families · Adult Learners (B2C) | Students · Institutions · Employers (B2B + B2C) |
| **Languages** | English only | English / Français / العربية |
| **Typography** | Inter (body) + Playfair Display (headings) | Plus Jakarta Sans (everything) |
| **Palette** | Sky blue → Indigo gradient (`#0ea5e9` → `#6366f1`) | Sky Blue + Warm Peach + Cream tokens |
| **Dark mode** | Yes (`prefers-color-scheme: dark`) | No |
| **Theme color** | `#0ea5e9` | Same family, different exact tokens |
| **Notice banner** | "Temporary stand-in" yellow strip on every page | None |
| **Architecture** | Flat root files, one stylesheet, sticky header | Trilingual directory structure, language gateway, mobile-nav drawer |

The Dec 2025 stand-in deliberately framed itself as transitional — the banner read *"This is a temporary stand in site while our full Ezzi Clarity website is being built."* The full WordPress-built version that eventually replaced it carries a different brand positioning entirely (B2B-leaning, trilingual, premium-warm palette).

## How visitors can see it

These files **deploy with the rest of the site**. Once committed, the archive is publicly reachable at:

- https://ezziclarity.ca/docs/archive/2025-12-static-standin/index.html
- https://ezziclarity.ca/docs/archive/2025-12-static-standin/about.html
- (etc.)

That's intentional — historical context worth keeping accessible. If you don't want it public, add this directory to `.assetsignore` (or migrate ezziclarity to Cloudflare Workers, since Pages doesn't have asset filtering — see [sibling project awonderfullife](https://github.com/vijaybpanangi/awonderfullife) for the pattern).

## Encoding artifacts

A few characters in the HTML/CSS files render as `Â·`, `â`, etc. — these are mojibake artifacts from a UTF-8/Latin-1 encoding hiccup somewhere in the original source's history. The legacy site presumably displayed them correctly at runtime (modern browsers tolerate this), or the source had been displayed/copied through an encoding-mangling step. They've been preserved verbatim rather than "fixed" so the archive remains a faithful copy of the original.

## Provenance

These files were provided by Vijay Panangipally on 2026-05-28 as raw HTML/CSS/SVG content. They were the actual production source of `ezziclarity.ca` from approximately December 2025 until the WordPress-built version replaced them sometime in Q1–Q2 2026.

See [`docs/superpowers/`](../../superpowers/) and the Wiki's [Project History](https://github.com/vijaybpanangi/ezziclarity/wiki/Project-History) page for the full timeline of how the site evolved from this stand-in to the current state.
