# Dec 28, 2025 — WordPress "Liquid Glass" theme, staging v4

These are the PHP template files for an **early WordPress theme iteration** of `ezziclarity.ca`. By December 28, 2025 — roughly 3–4 weeks after the [Dec 2025 stand-in](../2025-12-static-standin/) went live — a substantial WordPress theme was already at its fourth staging iteration, hosted on WordPress.com.

This archive captures that v4 staging state.

## Theme metadata

From `functions.php`:

- **Enqueue handle:** `ezzi-clarity-liquid-glass-staging-v4-style`
- **Theme name (implied):** Ezzi Clarity Liquid Glass
- **Stage:** staging v4 (at least four iterations had happened by this point)
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

**Not preserved (the user did not provide these):** the theme stylesheet (`style.css` — would have carried the "Liquid Glass" visual treatment in the form of translucency effects, dark accents, and aggressive backdrop-blur usage per the earlier ChatGPT collaboration log), and the theme's `/assets/images/` directory (`hero-ecosystem.png`, `services-{institution,student,employer}.png`, `arva-portrait.png`, `contact-advisor-student.png`, `section-feels-ezzi.png`, the `resources-{academic,experiential,earlycareer}-{1,2,3}.png` set, and `logo-ec.svg`). Most of these images were carried into subsequent eras and still exist in the current site's `assets/images/`.

## What this era reveals

Several details that contradict or correct the prior history reconstruction:

### Compared to the [Dec 2025 stand-in](../2025-12-static-standin/) (a few weeks earlier)

| Dimension | Dec 2025 stand-in | Dec 28, 2025 WordPress |
|---|---|---|
| **Platform** | Plain static HTML | WordPress on WordPress.com |
| **Tagline** | "Less Noise. More Signal." (same) | "Less Noise. More Signal." |
| **Audiences** | Students / Parents & Families / Adult Learners (B2C) | **Students / Institutions / Employers (B2B + B2C)** |
| **Service tiers** | Clarity Session / Pathway Planning / Application Support / Workshops (family-services) | Institutional Services / Student Services / Employer Services (consultancy) |
| **Typography** | Inter (body) + Playfair Display (headings) | **Roboto** (single family) |
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
| **Typography** | Roboto | **Plus Jakarta Sans** |
| **Palette** | "Liquid Glass" direction (translucency / dark / backdrop-blur per ChatGPT log) | **Sky Blue + Warm Peach + Cream tokens** (warm, light, structured) |
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
