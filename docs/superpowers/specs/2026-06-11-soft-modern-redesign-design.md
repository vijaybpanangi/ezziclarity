# Soft Modern Redesign — Design Spec

**Date:** 2026-06-11
**Status:** Approved (brainstorm with Vijay, visual companion session)
**Scope type:** Visual refresh + layout rework. Copy, page set, URLs, and information architecture unchanged.

## Goal

Modernize ezziclarity.ca's look and composition while preserving its soul — the warm, kind, story-driven voice ("finding your footing in a new place", the two-pillar Consulting + Books framing, the immigrant-family sentiment). The copy already carries the sentiment; the design should stop fighting it and start amplifying it.

## Decisions made (with the user, in order)

1. **Scope:** Option B — visual refresh + layout rework; copy and voice untouched.
2. **Direction:** "Soft Modern" (chosen over "Editorial Warmth" and "Crafted" mockups) — air, softness, gradient washes, glass surfaces, floating pill header.
3. **Refinement:** Soft Modern **plus Fraunces italic serif accents** — a literary signature on emphasized headline phrases and "Chapter" labels (chosen over pure single-voice Jakarta).
4. **Imagery:** **Keep the current illustration PNGs**, reframed — larger radii, soft shadows, palette-tint gradient overlay (multiply blend) to pull them into the brand atmosphere. (Chosen over abstract-shape replacement and hybrid.)

## Design system

### Typography

| Role | Treatment |
|---|---|
| Workhorse | Plus Jakarta Sans 400–800 (unchanged role) — body, UI, most headings |
| Accent voice | **Fraunces, italic only**, sparse and consistent: emphasized phrase inside each page H1, "Chapter one / Chapter two" labels, pull quotes, image captions. Never body text. |
| Scale | H1 `clamp(2.6rem, 5vw, 3.6rem)` (up from 2.2→3); body 15px → **16px**, looser leading |
| Loading | Fraunces added to the existing Google Fonts `@import` (italic axis only, subset weights) |

### Color

- **All existing tokens stay** (Sky / Peach / Cream / Ink scales). Redistribution, not replacement:
  - Page backgrounds: soft multi-stop gradient washes (white → sky-xpale → peach-xpale) replacing flat cream/white section alternation.
  - Peach promoted from eyebrow-only to true secondary accent: gradient text on emphasized words, chip dots, hover states.
  - Low-opacity sky/peach radial "blobs" behind hero visuals and section corners.

### Components

| Component | From → To |
|---|---|
| Header | Full-width bar → **floating frosted pill** (detached from top edge, `backdrop-filter: blur`, soft shadow, rounded-full). Nav links unchanged. |
| Buttons | Radius 10px → 12–14px; primary keeps sky glow shadow; secondary → translucent glass ghost |
| Cards | Bordered boxes → **soft glass cards**: `rgba(255,255,255,0.85)` fill, 20–24px radii, hairline border, layered soft shadows, gentler hover lift |
| Trust bar | Solid sky band → row of **floating chips** |
| Imagery | Existing PNGs wrapped: larger radii, soft shadow, subtle palette-tint gradient overlay (multiply blend) |

### Motion

Subtle only, all gated behind `prefers-reduced-motion`:
- Scroll-reveal fade-ups on section entry (IntersectionObserver, ~15 lines added to the existing per-page inline script).
- Soft hover lifts; smooth header transitions.
- No parallax, no autoplay.

## Page treatments (same copy, recomposed)

- **Home:** pill eyebrow; serif-accented H1; hero image panel with blob backdrop; "Who we help" as glass card; trust bar → chips; three approach cards get glass skin; **"Chapter one / We advise" + "Chapter two / We write" become a side-by-side glass-card pair with serif chapter numerals** (currently two stacked full-width sections); CTA banner → inset gradient panel with rounded corners.
- **About:** two-column "Our story / Our founder" with a tinted-portrait frame; values cards → glass. The frame ships **empty by default** (gradient placeholder) — `assets/images/arva-portrait.png` already exists in the repo as an orphan and can be slotted in at implementation time if Vijay opts in; that is a one-line decision deferred to the plan.
- **Consulting:** service cards reframed (tinted imagery, glass bodies); 4-step process → numbered vertical timeline on desktop; FAQ cards softened.
- **Books:** serif accents slightly louder (serif intro line); book-in-development placeholder designed to hold real cover art later without redesign.
- **Resources:** nine cards keep three-section grouping; tinted images, glass bodies, gentle reveal stagger.
- **Contact:** current layout, new component skins.
- **Gateway + 404:** gradient wash, glass card. Minimal work.

## Languages and RTL

- Every change lands in **all three trees (EN/FR/AR) in the same pass** — identical classes, translated content untouched.
- RTL overrides section in `style.css` extended for each new component (chips, timeline, chapter pair, pill header).
- **Fraunces applies to Latin scripts only.** Arabic headlines keep their current treatment; AR pages express the accent through color, not an italic Latin serif.

## Technical constraints

- Plain HTML + CSS, **no build system, no frameworks** — stays as-is on Cloudflare Pages.
- One `style.css`, **reworked in place, not rewritten**: tokens extended (gradient/glass/radius vars), component sections rewritten one at a time under existing banner-comment organization.
- Class vocabulary preserved wherever possible (`.card`, `.hero-card`, `.section-cta`, …) so HTML edits stay mostly additive (`<em>` in H1s, chip markup, image wrapper divs).
- `sitemap.xml` and `_redirects` untouched (no URL changes).

## Graceful degradation

- `backdrop-filter` → solid `rgba` fallback (declare solid first, blur after / `@supports`).
- Gradient text → solid ink fallback.
- Font failure → system stack holds layout.

## Verification (no test framework, per repo convention)

1. Local `python3 -m http.server` pass over all 20 pages (18 language pages + gateway + 404) × 3 viewports (mobile / tablet / desktop).
2. AR pages verified in RTL — every new component checked for direction correctness.
3. `prefers-reduced-motion` verified (motion fully disabled).
4. Fallback check with `backdrop-filter` disabled.
5. Push → Cloudflare Pages auto-deploy → live spot-check.

A page-by-page review checklist goes in the implementation plan.

## Out of scope

- Copy changes, page additions/removals, URL changes.
- New illustration/photography commissioning (the Books cover-art slot is *reserved*, not filled).
- Email migration, www→apex redirect, and other ROADMAP items.
- Dark mode.
