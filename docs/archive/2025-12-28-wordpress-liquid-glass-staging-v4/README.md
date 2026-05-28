# Dec 28, 2025 — WordPress "Liquid Glass" theme, staging v4

These are the PHP template files for an **early WordPress theme iteration** of `ezziclarity.ca`. By December 28, 2025 — roughly 3–4 weeks after the [Dec 2025 stand-in](../2025-12-static-standin/) went live — a substantial WordPress theme was already at its fourth staging iteration, hosted on WordPress.com.

This archive captures that v4 staging state.

## Theme metadata

From the CSS header (in `style.css`, lines 28-34):

```
Theme Name: Ezzi Clarity – Liquid Glass (Staging v4)
Theme URI: https://ezziclarity.ca/
Author: Ezzi Clarity
Description: Liquid Glass staging theme packaged for WordPress.com compatibility.
Version: 1.3.0
Text Domain: ezzi-clarity-liquid-glass-staging-v4
```

So the actual theme `Version` is **`1.3.0`**. The "Staging v4" is a *branch label* in the theme name, not the version number. The text domain `ezzi-clarity-liquid-glass-staging-v4` is **different** from the `ezzi-clarity` text domain found in the legacy `style.css` header of the eventual static conversion — strong evidence that two text-domain identities existed in parallel (or sequentially). The eventual `Version: 8.5.0` recorded in the legacy static `style.css` came from the `ezzi-clarity` theme line, not from this `ezzi-clarity-liquid-glass-staging-v4` line.

- **Platform:** WordPress.com (the `functions.php` docblock explicitly says "WordPress.com-safe", and the avoidance of file_get_contents, write operations, and external services confirms this)

## What's preserved here

| File | Purpose |
|---|---|
| `functions.php` | Theme bootstrap — title-tag support, stylesheet enqueue, `ec_get_page_url()` helper for slug-fallback nav, `ec_body_classes()` filter that adds `.page-resources` to the resources page body |
| `header.php` | Site chrome — Roboto Google Fonts, EC monogram favicon, brand block with founder credit, main nav with five links |
| `footer.php` | Three-line footer — firm name, region/audience, immigration disclaimer |
| `index.php` | Fallback template for blog posts (just `the_content()` in a styled container) |
| `front-page.php` | Homepage — hero with "Less Noise. More Signal." tagline, "What Working With Us Feels Like" three-card section, "Our Core Service Areas" three-card section, CTA |
| `page-about.php` | About — story, founder portrait card (with credentials and 5-language fluency), why-we-exist, approach, three values, CTA |
| `page-services.php` | Services — three service tiers, four-step process, FAQ, CTA |
| `page-resources.php` | Resources — Academic Transition (3 cards), Experiential Learning (3 cards), Early Career Development (3 cards), CTA |
| `page-contact.php` | Contact — call-first card with mobile/office phone numbers, Titan Email booking link, advisor-student photo, Google Maps embed of Waterloo office |
| `style.css` | The full theme stylesheet (~870 lines) — design tokens, light-mode glass card system, hero, sections, cards, CTA, contact polish, image system, responsive rules. This is the definitive "Liquid Glass" visual treatment. |

**Not preserved (the user did not provide these):** the theme's `/assets/images/` directory (`hero-ecosystem.png`, `services-{institution,student,employer}.png`, `arva-portrait.png`, `contact-advisor-student.png`, `section-feels-ezzi.png`, the `resources-{academic,experiential,earlycareer}-{1,2,3}.png` set, and `logo-ec.svg`). Most of these images were carried into subsequent eras and still exist in the current site's `assets/images/`.

## The Liquid Glass design language, decoded from the CSS

With the stylesheet now preserved, the "Liquid Glass" direction is no longer a description in a collaboration log — it's a concrete design system you can read line by line. Key findings:

### It was light-mode, not dark

A common misconception (including in the original ChatGPT collaboration log) was that the Liquid Glass direction was a dark-mode experiment. **It wasn't.** The page background is `radial-gradient(circle at top left, #e5f0ff 0, #f3f4f6 40%, #e5e7eb 100%)` — a soft bluish white. All surfaces are light. The "glass" effect comes from translucency over light, not darkness.

### Backdrop blur is the defining technique

`backdrop-filter: blur(...)` appears on:

- The site header (`blur(20px)`)
- Every nav pill (`blur(14px)`)
- The hero card and hero visual (`blur(14-16px)`)
- All cards — `.card`, `.quote-card`, `.service-card`, `.contact-form`, `.timeline-item`, `.faq` (`blur(18px)`)
- The CTA section inner panel (`blur(18px)`)

Combined with semi-transparent radial-gradient backgrounds (`rgba(255, 255, 255, 0.96)` to `rgba(241, 245, 249, 0.96)`), the effect is materials that look like frosted glass with subtle bluish tinting.

### Effective typography was Apple system fonts, not Roboto

The CSS opens with a Roboto declaration (lines 1-22), but is **overridden later** by:

```css
html, body {
  font-family: -apple-system, BlinkMacSystemFont, "SF Pro Text",
               "Helvetica Neue", Arial, sans-serif;
}

h1, h2, h3, h4 {
  font-family: -apple-system, BlinkMacSystemFont, "SF Pro Display",
               "Helvetica Neue", Arial, sans-serif;
}
```

Because CSS cascades and the later rule wins for same specificity, **the effective typography on Apple devices was SF Pro Text / SF Pro Display** — Apple's system fonts. Roboto was loaded via `header.php` and stood as a fallback on non-Apple platforms (or when the Apple system fonts were missing).

This explains the "Apple keynote compositional influence" the ChatGPT log mentioned — it wasn't just visual; the typography was literally Apple's system fonts. The Roboto-at-top declaration appears to be a leftover from an earlier Roboto-first iteration that wasn't fully removed when the SF Pro stack was introduced.

### Color palette: blue-on-light

Distinct from both the Dec early stand-in (sky→indigo gradient) and the current site (Sky+Peach+Cream):

| Token | Hex | Use |
|---|---|---|
| `--accent` | `#2563eb` | Primary blue — links, nav-cta, button-primary background |
| `--accent-strong` | `#1d4ed8` | Eyebrow / kicker text |
| `--accent-soft` | `#dbeafe` | Focus outlines, soft backgrounds |
| `--bg-page` | `#f3f4f6` | Page background base |
| `--bg-surface` | `#ffffff` | Card surfaces |
| `--text-main` | `#111827` | Body text (near-black ink) |
| Heading color | `#020617` | Even darker than text-main; almost true black |

The button-primary uses a linear-gradient from `#4f46e5` (indigo) to `#2563eb` (blue) — a touch of the earlier Dec era's indigo lingers, but only as a gradient endpoint on CTAs.

### The "glass meniscus" detail

Every card has a `::before` pseudo-element with:

```css
background: linear-gradient(to bottom, rgba(255, 255, 255, 0.55), transparent 40%);
```

This creates a subtle highlight along the top edge of every card, mimicking how light reflects off the top of a piece of glass. Combined with the backdrop-blur, soft shadows, and rounded corners (`--radius-md: 18px`), the result is unmistakably glass-like.

### Hover micro-animations everywhere

- Cards lift on hover: `transform: translateY(-4px)`, with shifted shadows
- Nav pills lift: `transform: translateY(-1px)`
- Buttons lift on hover, with `filter: brightness(1.03)`
- Images lift and gain saturation: `transform: translateY(-2px) scale(1.01)`, `filter: saturate(1.06) contrast(1.05)`

The design rewarded mouse interaction with subtle physical response — another deliberate "feels like a real material" choice.

### Container is 1120px (wider than the others)

`--container-width: 1120px`. The Dec early stand-in was 980px; the current production site uses 800px in the awonderfullife sibling (different project, but for reference). The Liquid Glass theme used the widest container of any era, taking advantage of laptop / desktop viewports.

### Bug-fix comments at the bottom of the CSS

The last ~80 lines have explicit fix-comments calling out specific issues:

```css
/* Home page: "What Working With Us Feels Like" image should NOT look cropped. */
.section-visual.section-visual--feels { padding: 18px 16px 14px; }

/* Resources page: reduce the "squished" feel ... */
.page-resources .service-illustration { ... }

/* CONTACT PAGE POLISH (v3) */
.contact-layout { ... }
```

This is real iteration. The polish work was documented in code, not just in commit messages — comments that read like "we hit this problem and here's how we fixed it without affecting other pages."

## What this era reveals (compared to neighbors)

Several details that contradict or correct the prior history reconstruction:

### Compared to the [Dec 2025 stand-in](../2025-12-static-standin/) (a few weeks earlier)

| Dimension | Dec 2025 stand-in | Dec 28, 2025 WordPress |
|---|---|---|
| **Platform** | Plain static HTML | WordPress on WordPress.com |
| **Tagline** | "Less Noise. More Signal." (same) | "Less Noise. More Signal." |
| **Audiences** | Students / Parents & Families / Adult Learners (B2C) | **Students / Institutions / Employers (B2B + B2C)** |
| **Service tiers** | Clarity Session / Pathway Planning / Application Support / Workshops (family-services) | Institutional Services / Student Services / Employer Services (consultancy) |
| **Typography** | Inter (body) + Playfair Display (headings) | **Apple system fonts (SF Pro)** — Roboto loaded as fallback only |
| **Founder presence** | Implicit ("a small, hands-on education advisory") | **Explicit** — Arva Yusuf Ezzi named in header, with portrait + bio on About page |
| **Pages** | 5 flat HTML files at root | 5 PHP page templates + header/footer/index/functions |
| **Resources content** | FAQ + planning prompts | 9 themed resource cards across Academic / Experiential / Early Career |
| **Contact** | Form + email | Call-first with mobile+office phones, Titan Email booking, embedded map |
| **Compliance disclaimer** | Soft ("we don't guarantee outcomes") | **Hardened** — explicit "No immigration or visa advice" disclaimer in footer + as a dedicated FAQ entry |

**The audience pivot from B2C to B2B+B2C happened FAST** — within 3–4 weeks of the stand-in's launch. By Dec 28, the family-services framing was already retired and the institutional-consulting positioning was in place.

### Compared to the current production site (May 2026)

| Dimension | Dec 28, 2025 WordPress | Current production |
|---|---|---|
| **Tagline** | "Less Noise. More Signal." | "Clear paths. Confident decisions." |
| **Audiences** | Students / Institutions / Employers (same) | Same |
| **Typography** | Apple system fonts (SF Pro) | **Plus Jakarta Sans** |
| **Palette** | Light-mode glass: bluish-white surfaces with backdrop-blur, royal blue accent (`#2563eb`) | **Sky Blue + Warm Peach + Cream tokens** (warm, light, structured, no backdrop-blur) |
| **Languages** | English only | **English + French + Arabic** |
| **Founder portrait on About** | Yes — `arva-portrait.png` displayed in a quote-card | **Removed** (the PNG survives unreferenced in `assets/images/`) |
| **Phone numbers visible** | Yes — mobile + office numbers, Titan booking link | **Not surfaced** on the current static site |
| **Header founder credit** | Yes — "Founded by Arva Yusuf Ezzi, MEd (OISE, University of Toronto)" in nav | Not in the current header |

The path from Dec 28 to the current site involves at least: tagline reframing, typography swap (Roboto → Plus Jakarta Sans), palette pivot (away from "Liquid Glass" toward Sky/Peach/Cream), trilingual expansion, portrait removal, founder-credit relocation, and theme-version progression from `staging-v4` to final `Version: 8.5.0` — many iterations.

## Founder details newly confirmed

The Dec 28 source confirms biographical specifics that prior reconstructions had wrong or missing:

- **Full name:** Arva Yusuf Ezzi *(middle name confirmed; the Dec 2025 stand-in only referred to "Arva")*
- **Credentials:** MEd from OISE, University of Toronto
- **Previous institutional roles:** University of Toronto and York University — academic departments, student success units, experiential learning teams
- **Languages fluent:** English, Arabic, Hindi, Urdu, **Gujarati** *(five languages; an earlier ChatGPT log had claimed "Hindi, Gujarati, Arabic, intermediate French" — that was wrong. **Urdu was missed**, and **French was not in the list**.)*

## Notable structural patterns

- **WordPress.com-safe coding** — the `functions.php` avoids anything that would require admin/sudo on a self-hosted server. It assumes the WordPress.com runtime.
- **`ec_get_page_url($slug)` helper** — a clever resilience pattern: it tries `get_page_by_path($slug)`, and if the page doesn't exist (yet), falls back to constructing `home_url('/' . $slug . '/')`. Keeps the nav stable during initial setup when some pages haven't been created.
- **`ec_body_classes()` filter** — this is where the `.page-resources` body class came from. The CSS hook in the current `style.css` for `.page-resources .service-card-img` etc. is a survival from this filter.
- **Theme slug `ezzi-clarity-liquid-glass-staging-v4-style`** — by Dec 28, at least 4 staging iterations had happened. The "v4" naming convention persisted through the build.

## Why preserve it

The Dec 28 WordPress theme is the **missing middle** between the December 2025 stand-in and the current static site. Without it, the timeline jumps from a B2C family-services stand-in directly to a B2B+B2C trilingual institutional site — a leap that doesn't make sense narratively. With it, the evolution becomes clear: the B2B pivot happened on WordPress, the design language went through multiple stylistic phases (including the "Liquid Glass" direction that was later abandoned), and the static conversion preserved a specific late-state of that WordPress build.

## Encoding artifacts

A few characters in these files render as `Â·`, `â`, etc. — UTF-8/Latin-1 encoding mishaps in the original copy-paste. Preserved verbatim for archival fidelity; the live WordPress runtime presumably handled them correctly via WordPress's own output filters.

## Provenance

Provided by Vijay Panangipally on 2026-05-28 as raw PHP/HTML content. These were the actual template files of the WordPress.com-hosted version of `ezziclarity.ca` as of approximately December 28, 2025.
