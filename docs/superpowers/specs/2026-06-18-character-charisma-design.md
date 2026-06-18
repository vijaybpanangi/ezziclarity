# Character & Charisma Pass — Design Spec (ezziclarity.ca)

**Date:** 2026-06-18
**Status:** Approved design, not yet built. Target release `v3.6.0` (minor — notable enhancement).
**Scope type:** Motion + micro-interaction layer for the trilingual marketing site. **CSS-only** — copy, pages, URLs, IA, imagery, and all HTML markup unchanged.

## Goal

The site already reads as calm, warm, and professional — Soft Modern with a site-wide Liquid Glass material (`v3.0.0` → `v3.5.0`). What it lacks is **life**: all current motion is *reactive* (the hover light-sweep, scroll-reveal fade-ups) and the background colour pools sit perfectly still. The brief is to add **character and charisma** — to make the site feel alive and crafted — without spending the brand's calm.

Direction chosen with the user: build a restrained "signature" foundation (formerly "Approach A") and fold in two-to-three playful, warmth-forward touches that lean into the children's-books pillar. Consciously *out*: wavy section dividers, a palette repaint, and anything as aggressive as the blog's comet motion. Those would read as decoration; this pass is meant to read as personality.

## Design principle: zero HTML churn

This repo's defining hazard is **triplicate maintenance** — the same page exists in `/en/`, `/fr/`, and `/ar/`, and any markup change must be applied three times (and the per-page inline scripts, once each). The whole pass is therefore designed to live **entirely in the single `style.css`**, hooking only elements that already exist in all three trees:

- `h1 em` / `h2 em` accents — present on every hero, including Arabic (`<h1>اكتشاف طريقك في <em>مكان جديد.</em></h1>`).
- `.checklist li::before` — already a styled pseudo-element (a 5px dot today).
- `.brand-logo` / `.footer-logo` `<img>` — the logo is an external SVG `<img>`, so it animates by transform/opacity/filter only.
- The existing per-page scroll-reveal observer that adds `.is-visible` to `.section > .container`, `.section-alt > .container`, `.section-cta-inner`, `.trust-bar-inner`.

**No HTML files are edited.** One stylesheet change ships to all three languages at once.

## The six elements

### 1. Signature swash ✍️
A warm-peach hand-drawn brush-stroke underline beneath the Fraunces italic accent (`h1 em`, and `h2 em` where one exists), that **draws itself in** rather than appearing all at once. This is the signature charisma move — editorial, warm, memorable.

- **Mechanism:** `h1 em, h2 em { position: relative }` + an `::after` pseudo-element carrying an inline-SVG brush stroke as a `background-image` data-URI, tinted with `--peach`, sized ~100% width × ~0.35em tall, sitting just below the text baseline. The "draw" is a `clip-path: inset(...)` wipe from the start edge (undistorted, unlike a `scaleX` stretch).
- **Trigger:** the **hero** `h1 em` draws as the final beat of the on-load hero entrance (element 4). **Section** `h2 em` swashes ride scroll-reveal — `.is-visible … em::after` flips the clip-path open via transition as the section enters view.
- **Arabic:** the `<em>` box exists on AR too (rendered in IBM Plex Arabic, not Fraunces — the swash is a decorative underline, font-independent), so AR keeps the signature. The stroke and its wipe direction **mirror under `html[dir="rtl"]`** (start edge on the right).
- **Reduced-motion / fallback:** under `prefers-reduced-motion: reduce` the swash is shown fully drawn (no wipe). Where `clip-path` or data-URIs are unsupported, the underline simply renders statically.

### 2. Living background 🌤️
The static sky/peach colour pools become a slow, low-amplitude **drift and breathe** — the calm-marketing analogue of the blog's ambient layer, dialled way down (no comets).

- **Mechanism:** move the three radial colour pools off `body`'s `background` onto a dedicated fixed full-viewport layer (`body::before { position: fixed; inset: 0; z-index: -1; pointer-events: none }`); `--wash` stays as `body`'s base. Animate that single layer with a long keyframe (~50–60s, `ease-in-out`, `infinite alternate`) using **transform + opacity only** (GPU-composited, cheap). An optional second layer (`body::after`) drifting on a different timing adds gentle parallax. No animated `filter`/`background-position` (expensive).
- **Brand fit:** amplitude is small and the period long, so it reads as "the room is breathing," not "things are moving."
- **Reduced-motion:** under `reduce` the layer is static — visually identical to today's site.

### 3. Tactile cards & buttons ✨
Hover/press feedback that makes surfaces feel physical, layered on top of the existing sheen sweep.

- **Cards** (`.card, .quote-card, .service-card, .chapter-card, .hero-card`, etc.): on hover, `translateY(-4px)` + deepen to `--shadow-glass-lg` + a faint **peach edge-glow** (an added outer shadow, e.g. `0 10px 34px -12px rgba(232,131,90,0.28)`). Eased with `--ease-smooth`. The current `::before` light-sweep is untouched and composes.
- **Buttons** (`.btn-primary, .btn-secondary`): a springy `:active` press (`scale(0.97)`) and a slightly stronger hover lift; sweep retained.
- **Reduced-motion:** the `translateY`/`scale` transforms are dropped under `reduce`; the colour/shadow hover state remains (state change, not motion).

### 4. Hero entrance 🎬
On load, the homepage hero assembles itself: eyebrow → headline → body copy → action buttons → hero card each ease up and fade in, staggered.

- **Mechanism:** a `heroRise` keyframe (`opacity 0→1`, `translateY(16px→0)`, ~0.6s, `--ease-smooth`, `both`) applied to `.hero .eyebrow, .hero h1, .hero p, .hero-actions, .hero-card` with staggered `animation-delay` (~0.05 / 0.15 / 0.28 / 0.40 / 0.50s). The swash (element 1) sequences after the headline (~0.5s).
- **Reduced-motion-safe by construction:** the default (no-animation) state is fully visible; the `heroRise` animation is applied **only inside `@media (prefers-reduced-motion: no-preference)`**, so reduced-motion users see the hero instantly, fully rendered — never a blank-then-pop.
- **Scope:** the homepage `.hero`. Interior pages keep their current reveal behaviour; their `h1 em` still gets the swash. (The plan verifies each page type.)

### 5. Animated checklist ticks ✅
The plain dot on `.checklist li` becomes a small **checkmark that pops/draws in** when its card reveals — a child-friendly beat that suits the books pillar.

- **Mechanism:** restyle `.checklist li::before` from a 5px dot into a checkmark (CSS border-based check, or an inline-SVG mask) in a brand tint. Default state `transform: scale(0)`; on reveal (`.is-visible … li::before`) it pops to `scale(1)` with a slight overshoot (a `--ease-back` cubic-bezier), staggered per `:nth-child` for a cascade. Hero-card checklist items (not in the reveal set) animate with the hero entrance instead.
- **RTL correctness (targeted fix):** the checklist currently uses physical `padding-left` / `left: 0`. While here, convert to **logical properties** (`padding-inline-start`, `inset-inline-start`) so the tick sits on the start edge in Arabic too, and mirror the checkmark under RTL.
- **Reduced-motion:** the tick is shown statically (final state), no pop.

### 6. Logo touch 🪶
A small amount of life on the brand mark.

- **Mechanism:** a one-time `logoSettle` on load (gentle fade + slight scale/rotate settle) on `.brand-logo`, and a playful hover tilt (`rotate` + small `scale`, eased with `--ease-smooth`). External `<img>`, so transform/opacity/filter only — no SVG-path animation, no inlining, no markup change.
- **RTL:** the hover tilt direction mirrors under `html[dir="rtl"]`.
- **Reduced-motion:** no settle and no tilt under `reduce` (optionally a subtle non-motion `filter: brightness` hover).

## New tokens & keyframes

Added to `:root` and a new `/* CHARACTER & CHARISMA */` banner section in `style.css`:

- `--ease-back: cubic-bezier(.34, 1.56, .64, 1)` — gentle overshoot for the playful pops (ticks, logo settle). (`--ease-smooth: cubic-bezier(.22,.61,.36,1)` already exists.)
- Keyframes (the file currently has **none**): `heroRise`, `bgDrift` (and optional `bgDriftAlt`), `logoSettle`. The swash, tick pop, and card/button feedback are transition-driven and need no keyframes.
- **Placement:** all continuous/ambient motion sits inside `@media (prefers-reduced-motion: no-preference)`; the corresponding `reduce` neutralisations extend the existing `/* MOTION */` section.

## Brand fit

Ezzi Clarity is Soft Modern — warm, kind, story-driven, built on air and gradient washes. Character here means *warmth and craft*, not noise: a drawn underline that feels handmade, a background that breathes, surfaces that respond to touch, a hero that arrives with intent, a checkmark that winks at the children's-books work. Each beat is small, slow, and reversible. The pass deliberately stops short of the playful-maximal option (wavy dividers, bolder palette) to keep the consulting side credible.

## Accessibility & i18n

- **`prefers-reduced-motion` is the master switch.** Every continuous animation (living background, hero entrance, swash wipe, tick pop, logo settle/tilt) is authored *inside* `@media (prefers-reduced-motion: no-preference)` or neutralised in the `reduce` block, so reduced-motion users get a fully static, fully legible site that looks like today's — never a hidden-until-animated element.
- **RTL (Arabic).** Trilingual: `en`/`fr` LTR, `ar` `dir="rtl"`. The swash stroke + wipe, the checklist tick + offsets (moved to logical properties), and the logo hover tilt all mirror under `html[dir="rtl"]`. The living background and vertical card/button transforms are direction-agnostic.
- **No legibility dependence on motion.** Text contrast (Ink scale over ~55–70% glass) and all content are unchanged; motion is purely decorative and additive.
- **Performance.** Transform/opacity only, GPU-composited; one (optionally two) fixed background layer; no layout thrash, no animated blur/filter on scroll.

## Out of scope

- Wavy section dividers, palette repaint / bolder peach, animated illustrations (the playful-maximal option) — explicitly not pursued this pass.
- Any HTML/copy/page/URL/IA change; `sitemap.xml` / `_redirects` untouched.
- New imagery; dark mode; JS changes (rides the existing reveal observer).
- True edge-refraction / lensing (documented as the pure-CSS ceiling in the Liquid Glass spec).

## Release

Minor bump → **`v3.6.0`**. Shipped via PR (squash-merge as `vijaybpanangi`) + annotated semver tag on the merge commit, with a versioned/timestamped `CHANGELOG.md` entry, a README change-history row, and a `CLAUDE.md` "Latest:" bump (also correcting the stale `v3.4.1` there to the true current `v3.5.1` baseline). `ROADMAP.md` updated if the item is tracked there.
