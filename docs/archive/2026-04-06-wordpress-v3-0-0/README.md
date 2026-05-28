# Archive — WordPress theme **Ezzi Clarity v3.0.0** (April 6, 2026)

> Snapshot of the production WordPress theme that ran on `ezziclarity.ca` after the Liquid Glass staging era was retired but before the v8.5.0 → static conversion. **Published to WordPress on 2026-04-06.** Preserved here verbatim (with one documented exception, noted below).

This archive is the **third pre-Claude era** captured in `docs/archive/`. See [Project History on the Wiki](https://github.com/vijaybpanangi/ezziclarity/wiki/Project-History) for the integrated long-form narrative.

## Provenance

User-supplied source. Vijay (the site owner) pasted the full theme file-by-file on **2026-05-28**, stating: *"This is a much more recent release from Q2 2026 beginning in April. This was published to wp on 6th April, 2026."*

- **Source format:** plain text paste, file-by-file, 26 PHP/CSS files total
- **Encoding note:** the EN/FR templates and the stylesheet arrived clean. The AR (Arabic) templates and the AR portions of `header-ar.php` / `footer-ar.php` arrived as **mojibake** — UTF-8 bytes reinterpreted as Latin-1 during the paste round-trip. The Arabic strings in this archive's AR templates have been **reconstructed** from the parallel EN/FR templates and from the current static `/ar/` tree; CSS classes, PHP routing, `dir` attributes, link targets, image references, and overall page structure are verbatim from the paste. See per-file `NOTE:` blocks at the top of each AR template.

## What this theme is

A clean, custom WordPress theme. Single self-contained directory (no parent theme, no child theme relationship). WordPress.com-safe — `functions.php` has the `if (!defined('ABSPATH')) { exit; }` guard and does nothing exotic (just enqueues the stylesheet, adds `title-tag` and `post-thumbnails` support).

### Theme identification

| Field | Value |
|---|---|
| **Theme Name** | `Ezzi Clarity` |
| **Version** | `3.0.0` |
| **Text Domain** | `ezzi-clarity` |
| **Published to WP** | 2026-04-06 |

This is a **different theme identity** from the [Dec 28, 2025 Liquid Glass v1.3.0 archive](../2025-12-28-wordpress-liquid-glass-staging-v4/), which had text domain `ezzi-clarity-liquid-glass-staging-v4`. By April 6, 2026 the staging-era nomenclature was gone — the production theme is now plainly `ezzi-clarity`. The relationship between the two theme identities (whether the Liquid Glass theme was renamed/renumbered, or whether a new theme replaced it) is not recoverable from the preserved sources.

## Files

```
2026-04-06-wordpress-v3-0-0/
├── functions.php            (WP-safe enqueue + theme supports)
├── header.php               (minimal: opens HTML, calls wp_head, body_class)
├── footer.php               (minimal: calls wp_footer, closes HTML)
├── index.php                (fallback template — points to the language gateway)
│
├── header-en.php            (per-language nav + drawer + skip link)
├── header-fr.php
├── header-ar.php            (RTL — AR strings reconstructed)
├── footer-en.php            (3-column footer — brand, nav, contact)
├── footer-fr.php
├── footer-ar.php            (RTL — AR strings reconstructed)
│
├── page-language-gateway.php   (root /, 3 buttons: English / Français / العربية)
│
├── page-en-index.php           ┐
├── page-en-about.php           │  English page templates
├── page-en-services.php        │  (5 pages: home, about, services, resources, contact)
├── page-en-resources.php       │
├── page-en-contact.php         ┘
│
├── page-fr-index.php           ┐
├── page-fr-about.php           │  French page templates
├── page-fr-services.php        │  (slugs: /, a-propos, services, ressources, contact)
├── page-fr-resources.php       │
├── page-fr-contact.php         ┘
│
├── page-ar-index.php           ┐
├── page-ar-about.php           │  Arabic page templates (RTL)
├── page-ar-services.php        │  AR prose reconstructed; structure verbatim
├── page-ar-resources.php       │
├── page-ar-contact.php         ┘
│
└── style.css                   (Plus Jakarta Sans, Sky/Peach/Cream tokens, ~870 lines)
```

## Decoded findings — what v3.0.0 tells us about the project's evolution

This is the **most informative single artifact in the archive** because it bridges the Dec 28, 2025 Liquid Glass era and the current static site. Everything below is observation from the code itself, not inference.

### Already established by v3.0.0 (so the change happened **before** April 6, 2026)

- **Typography swap is complete: Plus Jakarta Sans throughout.** The Roboto + SF Pro effective typography of the Dec 28 Liquid Glass era is gone. Loaded via `@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@...&display=swap');` at the top of `style.css` — same import line that's still in the current static site.
- **Palette pivot is complete: Sky + Peach + Cream tokens.** `--sky: #5B8FA8`, `--peach: #E8835A`, `--cream: #F7F4EE`. The royal-blue `#2563eb` of the Liquid Glass era is gone. Same exact palette as the current static site.
- **Trilingual expansion is complete.** EN, FR, AR all present as full page trees. French uses translated slugs (`a-propos`, `ressources`). Arabic uses `<html lang="ar" dir="rtl">` and a sophisticated mixed-direction header (nav LTR for visual stability, prose RTL). Language gateway at root.
- **Liquid Glass aesthetic is largely retired.** `backdrop-filter: blur(...)` survives **only on the sticky `.site-header`** (a 16px blur over a 97%-opaque cream background — basically just frosted-glass header polish). No translucent radial gradients, no glass meniscus `::before` highlights on cards, no `backdrop-blur` on cards or modals or footers. The "Liquid Glass design language" is functionally over.
- **Theme name dropped the "Liquid Glass" suffix.** Just `Ezzi Clarity` now.
- **Founder portrait was removed from the About page.** No reference to `arva-portrait.png` or `founder-arva.png` in `page-en-about.php`. The Dec 28 era had it; v3.0.0 doesn't. (Those PNGs remain in the current static site's `assets/images/` as orphans.)
- **Three-tier service framing is locked in: Students / Institutions / Employers.** Same as current. The B2C family-services framing of early-Dec 2025 is long gone.
- **Compliance disclaimer is hardened.** Footer carries *"All services are academic and career focused. No immigration or visa consulting is provided."* (with parallel translations in FR/AR). Services page has a dedicated FAQ entry repeating it. Same as current.

### Still in flux at v3.0.0 (so the change happened **after** April 6, 2026)

- **Tagline is still `"Less Noise. More Signal."`** Visible in `page-en-index.php`: hero `<h1>Less Noise.<br>More Signal.</h1>` and `<meta property="og:title" content="Ezzi Clarity — Less Noise. More Signal.">`. The current static site has *"Clear paths. Confident decisions."* — that swap happened *after* April 6, 2026.
- **Phone numbers + Titan Email booking link are still surfaced on Contact.** Mobile `+1 (647) 505-9487`, Office `+1 (226) 336-8100`, `info@ezziclarity.ca`, and a prominent `https://book.titan.email/ezziclarity/intro` button. The current static `/en/contact/` retains the Titan link but the phone numbers are different (matches the current README; not surfaced as prominently).
- **Theme version is `3.0.0`.** Six minor/major bumps still to go before the eventual `8.5.0` that became the static-conversion source. Whatever happened in those bumps (April 6 → ~late May 2026) is the last remaining gap in the historical record.

### What stayed unchanged from v3.0.0 → current static site

- **Container width `1140px`** (`--container: 1140px;`). Same exact value in the current `style.css`.
- **Cream background `#F7F4EE`** (`--cream`).
- **All four image system tones** (Sky blue, Peach, Cream, Ink scale).
- **Mobile-nav inline `<script>` pattern** — duplicated per-page in v3.0.0 (in the header partials) and still duplicated per-page in the current static site (now inside each HTML file directly).
- **`section-cta` block on every page**, identical structure.
- **`.process-two-column` 4-step process** on Services pages.
- **9-card Resources page** with the same 3 categories (Academic Transition / Experiential Learning / Early Career Development).
- **Google Maps embed of 180 Northfield Drive West** on Contact.
- **Disclaimer pattern** — same wording, same placement.

## Design system as decoded from the v3.0.0 CSS

### Typography
- **Family:** `'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif`
- **Loading:** `@import` from Google Fonts (`@0,400;0,500;0,600;0,700;0,800;1,400;1,600`)
- **Body:** 15px / 1.65 line-height, color `--ink`
- **Headings:** 800 weight, `-0.03em` letter-spacing, color `--ink`
- **H1:** `clamp(2.2rem, 4.5vw, 3rem)`
- **H2:** `clamp(1.6rem, 3vw, 2.1rem)`
- **`h1 em, h2 em`** rule: italic emphasis spans inside headings are de-italicized and recolored to `--sky` — a deliberate accent pattern (visible in the FR/AR hero where `<em>` wraps the tagline's emphasized phrase)
- **Eyebrows:** 0.7rem, weight 700, uppercase, 0.14em letter-spacing, color `--peach`

### Color tokens (CSS custom properties on `:root`)

| Token | Value | Role |
|---|---|---|
| `--sky` | `#5B8FA8` | Primary brand color (buttons, links, accents) |
| `--sky-mid` | `#4A7A93` | Primary button hover |
| `--sky-dark` | `#3A6478` | Heading accents, focused text |
| `--sky-light` | `#A8D4E6` | Decorative bullets, soft borders |
| `--sky-pale` | `#E8F4FA` | Card backgrounds, badge backgrounds |
| `--sky-xpale` | `#F2FAFD` | Gradient stops |
| `--peach` | `#E8835A` | Accent (eyebrow text, secondary buttons) |
| `--peach-mid` | `#D4704A` | Pill text on student cards |
| `--peach-pale` | `#FAE8DF` | Pill background |
| `--peach-xpale` | `#FEF5F1` | Student service card image background |
| `--cream` | `#F7F4EE` | Page body background |
| `--cream-mid` | `#EDE9E0` | Nav hover, employer card image background |
| `--ink` | `#1e1c18` | Primary text |
| `--ink-soft` | `#5e5c54` | Body paragraph |
| `--ink-muted` | `#7a7870` | Muted text, nav inactive |
| `--ink-pale` | `#9e9b94` | Footnotes |

### Spatial system
- **Container:** 1140px max-width, 1.5rem padding
- **Sticky header height:** 68px
- **Radii:** `--r-sm: 6px`, `--r-md: 10px`, `--r-lg: 16px`, `--r-xl: 22px`, `--r-pill: 999px`
- **Shadows:** four tokens — sm/md/lg neutral, plus `--shadow-btn` (sky-tinted glow) and `--shadow-peach`

### Layout idioms
- **Hero:** two-column flex (`hero-copy` + `hero-panel`), gap 3.5rem, collapses below 900px
- **Hero panel:** vertical stack of `.hero-visual` (4:3 aspect-ratio image card) + `.hero-card` ("Who we work with" checklist)
- **Trust bar:** full-width sky-blue band, 4 dot-separated items
- **Section rhythm:** `.section` (cream bg) and `.section-alt` (white bg) alternate, each 4.5rem vertical padding
- **Service cards:** image-top with tinted bg per type (`.card-inst` sky-pale, `.card-stud` peach-xpale, `.card-empl` cream), pill, h3, paragraph, checklist
- **Process:** 2-column grid of numbered steps
- **CTA banner:** sky-blue band, left text + right button, stacks on mobile

### RTL handling
Substantial. Body text right-aligns. Header keeps `dir="ltr"` for visual stability (so the brand stays on the left, nav reads naturally). Card content rebalances padding for right-anchored bullets. Tel/mailto links forced LTR with `direction: ltr; unicode-bidi: bidi-override` so phone numbers render correctly inside RTL paragraphs.

## How v3.0.0 fits in the history

```
Early-Dec 2025          Late-Dec 2025               April 6, 2026          ~Late-May 2026
"Stand-in" static  →   WP "Liquid Glass" v1.3.0  →  WP v3.0.0          →  WP v8.5.0
B2C family advisory    B2B+B2C pivot complete       Stripped-down,        ↓
Inter + Playfair       Royal-blue glass theme       calm, mature          Static conversion
Sky→Indigo gradient    SF Pro / Roboto              Plus Jakarta Sans     (current site)
EN-only                EN-only                      EN/FR/AR              EN/FR/AR
"Less Noise.           "Less Noise.                 "Less Noise.          "Clear paths.
 More Signal."          More Signal."                More Signal."         Confident decisions."
                       text domain:                 text domain:          text domain:
                       ezzi-clarity-liquid-glass-   ezzi-clarity          ezzi-clarity
                       staging-v4
```

The v3.0.0 artifact closes most of what was previously tagged ≈ approximate in the Wiki Project History. The remaining gap is narrow: ~7 weeks (April 6 → ~late May 2026) during which the theme bumped from 3.0.0 to 8.5.0, the tagline was replaced, and the Contact page was streamlined. None of that intermediate state is preserved.

## Certainty key

For any factual claim about this era, use these markers:

- 🟢 **Primary source** — directly observable in this archive's code
- ✅ **Verified** — corroborated by an independent source (e.g., current static site, public DNS)
- ≈ **Approximate** — bracketed by archived evidence on both sides but not directly recorded
- ⚠ **Inferred** — single-source or transitive reasoning, no corroboration

See the [Wiki Project History page](https://github.com/vijaybpanangi/ezziclarity/wiki/Project-History) for the integrated narrative tagged throughout with these markers.
