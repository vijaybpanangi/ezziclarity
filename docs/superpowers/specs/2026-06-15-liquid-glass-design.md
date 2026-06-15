# Liquid Glass — Design Spec (ezziclarity.ca)

**Date:** 2026-06-15
**Status:** Documents the shipped Liquid Glass system (`v3.0.0` Soft Modern foundation → `v3.4.0` real frost → `v3.5.0` maximal) and states the honest ceiling.
**Scope type:** Design-language note for the trilingual marketing site. CSS-only material; copy, pages, URLs, and IA unchanged.

## Goal & inspiration

Make Ezzi Clarity's surfaces read as Apple's **Liquid Glass** material (introduced iOS 26, refined in 27) — translucent panes that frost, brighten, and refract the warm gradient wash behind them, edged with a thin specular highlight and lit by a soft hover sheen.

Unlike the blog, where glass is a selective accent, **here glass is the system**: every card and panel surface across the site is frosted (see Brand fit). The Soft Modern redesign (`v3.0.0`) chose "air, softness, gradient washes, glass surfaces, floating pill header" as its direction; `v3.4.0` made that glass *genuinely* frosted (it had been faux — 85%-opaque white panels with no blur), and `v3.5.0` pushed it to a "maximal" tier with glassy nav/buttons and a hover light-sweep.

### The honest pure-CSS ceiling

Real Liquid Glass performs **real-time edge refraction / lensing** — the rim bends and warps the content directly behind it, like a physical lens. That is a GPU-shader effect, and pure CSS cannot do it:

- `backdrop-filter` blurs and recolours what is behind a box but **cannot displace or warp** it — there is no per-pixel lensing along the edge.
- The one browser primitive that *can* displace pixels is SVG `feDisplacementMap` driving `backdrop-filter: url(#…)`, which is **Chromium-only, experimental**, costly, and artefact-prone. We deliberately do **not** ship it.

What we ship **emulates** the material with cheap, broadly-supported ingredients:

1. **Frost** — `backdrop-filter: blur() saturate()` blurs and saturates the wash behind each pane.
2. **A specular highlight** — an inset top-edge sheen + a 1px inner light ring so panes read as *lit* glass.
3. **A coloured wash to refract** — soft sky/peach colour pools behind the glass, so the frost picks up gentle tints instead of frosting flat white.
4. **A hover light-sweep** — a soft diagonal sheen that glides across glass on hover (a *suggestion* of moving light, not true refraction).

No lensing, no animated edge-refraction — a convincing static-plus-sheen *impression* of glass that runs wherever `backdrop-filter` is supported and degrades to near-opaque panels where it isn't.

## Tokens

Defined in `:root` in `style.css` (Soft Modern additions block), quoted exactly:

```css
--glass:           rgba(255,255,255,0.55);
--glass-strong:    rgba(255,255,255,0.70);
--glass-border:    rgba(227,221,208,0.8);
--shadow-glass:    0 14px 34px -18px rgba(58,100,120,0.30);
--shadow-glass-lg: 0 24px 56px -24px rgba(58,100,120,0.35);
/* Liquid Glass (bold) — real frosting + specular rim/glow */
--glass-blur:      blur(20px) saturate(1.6);
--glass-highlight: inset 0 1px 0 rgba(255,255,255,0.8), inset 0 0 0 1px rgba(255,255,255,0.16);
--r-xxl:           28px;
--wash: linear-gradient(165deg, #FFFFFF 0%, var(--sky-xpale) 38%, #FFFFFF 68%, var(--peach-xpale) 100%);
```

- `--glass` — ~55% white pane fill (`v3.4.0` dropped it from ~85% so the frost actually shows); `--glass-strong` ~70% for surfaces wanting more body.
- `--glass-blur` — the frost recipe: 20px blur + 1.6 saturation, so the wash behind blooms through.
- `--glass-highlight` — the specular treatment: a bright top inset edge + a 1px inner light ring.
- `--shadow-glass` / `--shadow-glass-lg` — the cool-toned floating shadows (sky-tinted) that lift panes off the wash.
- `--glass-border` — a warm hairline (cream-tinted) around each pane.

The body provides the colour the frost refracts — soft sky/peach **colour pools** layered over `--wash`:

```css
body {
  background-color: #FFFFFF;
  /* Richer wash: soft sky/peach colour pools give the frosted glass something
     to refract, so the Liquid Glass surfaces pick up gentle tints. */
  background:
    radial-gradient(38rem 30rem at 8% 4%, rgba(91,143,168,0.20), transparent 60%),
    radial-gradient(34rem 26rem at 94% 18%, rgba(232,131,90,0.16), transparent 58%),
    radial-gradient(42rem 32rem at 74% 98%, rgba(91,143,168,0.16), transparent 60%),
    var(--wash);
  background-attachment: fixed;
  …
}
```

The colour pools draw on the existing brand palette — Sky (`--sky` ≈ `rgba(91,143,168,…)`) and Peach (`--peach` ≈ `rgba(232,131,90,…)`) — kept low-opacity so panes pick up *gentle* tints, with `background-attachment: fixed` so the pools stay put as content scrolls past the glass.

## Where glass is applied

Glass is system-wide, not a single accent:

1. **Every card / panel surface** (`v3.4.0`). One consolidated rule, placed after the base glass rules so it composes their shadow with the highlight, frosts:
   `.card, .quote-card, .service-card, .contact-form, .timeline-item, .faq, .chapter-card, .about-col, .hero-card, .process-step` — each gets `backdrop-filter: var(--glass-blur)` + `box-shadow: var(--shadow-glass), var(--glass-highlight)`. (`.process-step` keeps a lighter `--shadow-sm` base.)

2. **The floating pill header** (`v3.0.0`, blur bumped to `blur(18px) saturate(1.5)` in `v3.4.0`) — a detached, rounded-full frosted nav bar inset from the top edge, with a soft shadow.

3. **Glassy nav + buttons** (`v3.5.0`):
   - `.nav-link:hover` / `.nav-link.nav-active` become **frosted glass pills** — `background: linear-gradient(160deg, rgba(255,255,255,0.62), rgba(255,255,255,0.34))`, `backdrop-filter: blur(10px) saturate(1.5)`, plus a specular rim and soft drop.
   - `.btn-primary` / `.btn-secondary` gain a **glass-lit finish** (translucent/gradient surface + top specular sheen + soft inner glow), with text contrast kept AA-legible.

4. **Hover light-sweep** (`v3.5.0`) — a soft diagonal sheen glides across `.card, .quote-card, .service-card, .chapter-card, .hero-card, .btn-primary, .btn-secondary` on hover. GPU-cheap: a single `::before` gradient driven by `transform` + `opacity`, clipped by the host's `overflow: hidden`. (See Accessibility & i18n for its motion + RTL gating.)

## Brand fit

Ezzi Clarity is **Soft Modern** — warm, kind, story-driven ("finding your footing in a new place"), built on air, softness, and gradient washes. Here **glass *is* the system**, not an accent: it is the default skin for every surface, the unifying material that makes the whole site feel like one calm, lit atmosphere. This is the deliberate opposite of the crisp-editorial blog, where glass is one selective accent ("crispness over decoration"). The brand can carry pervasive glass precisely because its foundation is soft and warm, not white-paper crisp.

## Accessibility & i18n

- **No-`backdrop-filter` fallback.** `@supports not ((backdrop-filter: blur(1px)) or (-webkit-backdrop-filter: blur(1px)))` blocks make the glass surfaces near-opaque where blur is unsupported — so panes never turn see-through and unreadable. Covered: the card/panel set, the frosted nav pill (`.nav-link` → `var(--cream-mid)`), and the header. Glass is decorative; legibility never depends on it.
- **Legibility over translucency.** Panes are ~55–70% white over a low-opacity wash, so body text stays well-contrasted against the Ink scale. Glass-lit buttons explicitly keep text AA-legible despite the translucent/gradient fill.
- **`prefers-reduced-motion` gating of the light-sweep.** The entire sweep lives inside `@media (prefers-reduced-motion: no-preference)` — reduced-motion users get **no** sweep at all (the host elements aren't even given `position: relative; overflow: hidden` outside the guard). This sits alongside the site's existing `/* MOTION */` `prefers-reduced-motion: reduce` overrides for scroll-reveals.
- **RTL (Arabic) — logical properties.** The site is trilingual (`en` / `fr` LTR, `ar` `dir="rtl"`). The light-sweep uses **logical insets** (`inset-block`, `inset-inline-start`) so its start edge is correct under RTL, with an `html[dir="rtl"]` mirror so the sheen sweeps the correct direction in Arabic. Every glass component must land in all three trees in the same pass (the repo's triplicate-maintenance rule), and `--font-arabic` (IBM Plex Sans Arabic) governs Arabic headings/buttons — Fraunces serif accents are Latin-only.

## Versions

- **`v3.0.0`** — Soft Modern redesign: established the direction (gradient washes, glass surfaces, floating pill header) and the first `--glass*` tokens — but the panes were *faux* (≈85%-opaque white, no blur).
- **`v3.4.0`** — Liquid Glass site-wide frosted-glass ramp-up: `--glass` → ~55%, new `--glass-blur` + `--glass-highlight` applied to every glass surface; body colour pools added so the frost refracts; header blur bumped; `@supports` fallback made near-opaque.
- **`v3.5.0`** — Maximal Liquid Glass: glassy `.nav-link` pills, glass-lit `.btn-primary` / `.btn-secondary`, and the hover light-sweep (transform/opacity, `prefers-reduced-motion`-gated, RTL-mirrored).

## Out of scope

- **Real edge-refraction / lensing** (GPU shaders; Chromium-only experimental SVG `feDisplacementMap`) — explicitly *not* pursued; documented above as the ceiling.
- Copy, page, URL, or IA changes (`sitemap.xml` / `_redirects` untouched).
- New imagery; the image system stays "clean, no heavy glass."
- Dark mode.
