# Changelog

Notable changes to the website, deployment configuration, and project documentation. The detailed history lives in git; this file curates the highlights so a casual reader can scan what's happened over time without scrolling commit logs.

Releases on this project use semver-style tags (`v1.0.0`, `v1.1.0`, etc.) cut as deliberate milestones, not per-commit. See [GitHub Releases](https://github.com/vijaybpanangi/ezziclarity/releases) for the formal release notes.

## 2026-06-15

### About page — symmetry pass + founder portrait halo

Reworked the About page layout for visual balance (EN/FR/AR). The old "Our Story" block was a two-card grid where one card held only the company story while the other crammed the portrait + full founder bio + language section + contact + CTA — leaving the two columns badly mismatched in height. Now:

- **"Why Ezzi Clarity Exists"** is its own section with the company story in a constrained, left-aligned narrative measure (matching the page-header intro).
- **"Meet Arva Ezzi"** is a balanced two-column split: a compact identity card (portrait, name, role, language chips, contact + CTA) beside the founder bio, forced to equal height (`align-items: stretch`) with the identity card's content vertically centred, so the two sides read symmetrically. Languages are now `.lang-chip` pills (native + a peach "working" chip for French) instead of a prose paragraph.
- The founder portrait frame gained a **feathered warm halo** (peach glow + faint cool undertone) so its edge dissolves into the page wash instead of ending at a hard rectangle; the earlier inset hairline was removed.

CSS-only structure (`.about-narrative`, `.about-founder-grid`, `.founder-card`, `.lang-chip`); no new claims authored — existing copy was rearranged, with one minimal rephrase per language to re-thread the multilingual sentence now that languages render as chips.

### Founder portrait added to the About pages (EN/FR/AR)

The About founder column shipped since the Soft Modern redesign with an empty gradient placeholder (`.founder-frame`); it now shows a portrait of founder Arva Ezzi. Added `assets/images/arva-founder.jpg` — an optimized, EXIF-stripped 900×1200 / ~120 KB JPEG derived from the existing high-res `arva-portrait.png` (the 2 MB source is retained; its exact byte-duplicate `founder-arva.png` was removed). The `<img>` was placed inside `.founder-frame` on `en/about/`, `fr/a-propos/`, and `ar/about/` with a translated `alt` per language, `loading="lazy"`, and `object-position: center 25%` to keep the face framed in the 4:3 slot. The frame's `aria-hidden="true"` was removed so the portrait is exposed to assistive tech via its `alt`. No layout/CSS changes (the existing `.founder-frame img` rule styles it); other pages unaffected.

### Email housekeeping — SPF cleaned, DMARC reporting enabled

The iCloud+ Custom Email Domain mailbox for `@ezziclarity.ca` (`info@` for Vijay, `arva@` for Arva Ezzi) was already live; this pass cleaned up the two TXT records the onboarding had left holding legacy values. DNS-only change, no repo/site impact.

- **SPF** trimmed from `v=spf1 include:_spf.wpcloud.com include:spf.titan.email include:icloud.com ~all` to **`v=spf1 include:spf.titan.email include:icloud.com ~all`**. The WordPress.com-era `_spf.wpcloud.com` include was removed (the site has been fully on Cloudflare Pages for some time — nothing sends from WordPress.com). `spf.titan.email` was **kept on purpose**: Titan booking (`book.titan.email/ezziclarity/intro`) is still in active use, and Titan publishes its own live DKIM key at `titan1._domainkey.ezziclarity.ca`. Two legitimate senders, two DKIM selectors (`sig1` iCloud + `titan1` Titan), one SPF record.
- **DMARC** upgraded from the inert `v=DMARC1;p=none;` to **`v=DMARC1; p=none; rua=mailto:info@ezziclarity.ca; fo=1`**, so aggregate reports now arrive at `info@` rather than going nowhere. Still monitor-only (`p=none`); the `none → quarantine → reject` ladder is deferred until ~1–2 weeks of clean reports (see [`ROADMAP.md`](ROADMAP.md)).

**Verification.** `check-email-dns.sh ezziclarity.ca` (the helper in the awonderfullife repo, domain-arg form) confirmed MX → iCloud, the clean single SPF, the `sig1` iCloud DKIM CNAME, the `apple-domain` verification TXT, and the new DMARC `rua`; cross-checked against the Cloudflare 1.1.1.1 resolver to rule out resolver cache lag on the 1-hour-TTL SPF record. `~all` was retained deliberately (not `-all`).

### Technical SEO foundation (no copy, design, or URL changes)

A metadata-only pass across the language gateway and all 18 language pages, plus the sitemap and a new robots.txt. No visible copy, design, or URLs changed, and no new translated text was authored: the JSON-LD reuses each page's own existing title and meta description verbatim, so the Arabic pages stay byte-for-byte unchanged outside the injected markup (the only line removed from each Arabic file was its old relative canonical). Applied to all three trees (EN/FR/AR) in a single idempotent pass via a generator script that was run once and then deleted, so it is not committed and does not deploy.

- **Absolute self-canonical.** Every language page carried `<link rel="canonical" href="index.html">`, which resolves ambiguously. Each now points to its own absolute apex URL (for example `https://ezziclarity.ca/fr/a-propos/`). The gateway, which had no canonical, now self-canonicals to `https://ezziclarity.ca/`.
- **hreflang cluster.** Every page and the gateway now carry four `<link rel="alternate" hreflang>` entries (en, fr, ar, x-default). The three language alternates point to that page's equivalents across the trees; x-default points to the apex root. Reciprocity was verified: the three pages in each slot share an identical four-href cluster.
- **JSON-LD structured data.** A `schema.org` `@graph` was injected before `</head>` on all 19 pages, with stable @ids: a WebSite (`#website`), a ProfessionalService organization (`#organization`, including legalName, telephone, areaServed, postal address, languages, and a contactPoint, with no invented email), a Person founder (`#founder`, Arva Ezzi, MEd from OISE), and a per-page WebPage node whose name and description are the page's own title and meta description verbatim. Serialized with non-ASCII preserved so Arabic survives intact.
- **og:locale.** Each page now declares its primary `og:locale` (en_CA / fr_CA / ar) plus `og:locale:alternate` for the other two.
- **sitemap.xml rewritten.** The old file used relative `<loc>` paths, which are invalid per the sitemaps protocol and effectively ignored. It now uses the sitemaps + xhtml namespaces, one `<url>` per page (gateway + 18), each with an absolute `<loc>`, a `<lastmod>` of 2026-06-15, and four `<xhtml:link rel="alternate" hreflang>` entries.
- **robots.txt added.** Allows all crawlers and points to `https://ezziclarity.ca/sitemap.xml`.

**Verification.** All 19 pages contain valid, parseable JSON-LD; zero relative canonical or hreflang hrefs (every one starts with https://); sitemap.xml is well-formed XML with 19 absolute locs; Arabic content is byte-for-byte unchanged outside the new markup; the generator is idempotent (a second run is a byte-identical no-op); and a local HTTP sweep returned 200 for all 19 pages plus /sitemap.xml, /robots.txt, and /404.html. Cross-checked by three independent validation passes (structured data, hreflang/canonical/locale reciprocity, and sitemap/robots/byte-integrity/idempotency), all green.

## 2026-06-11

### Soft Modern redesign (visual refresh + layout rework)

The visual direction was chosen through a structured visual-companion brainstorm — "Soft Modern" beat out the other candidates — with Fraunces italic serif accents added as a signature detail on Latin pages (EN/FR). Copy, pages, and URLs are completely unchanged; this is a pure design-layer change applied across all 18 language pages, the gateway, and the 404 in a single pass (EN/FR/AR done together). Shipped via PR from branch `redesign/soft-modern`.

- **V8.5 override layer removed.** The stale `/* V8.5 REVAMP OVERRIDES */` CSS block (navy/teal/coral palette) was carrying an `@import` for Sora font in the middle of the file — an invalid placement that browsers silently ignore, meaning Sora never actually loaded. The entire block was removed; the valid top-of-file `@import` declarations now govern all font loading.
- **Fonts / typography.** Three font families, all loaded via valid top-of-file `@import`: **Plus Jakarta Sans** (workhorse body/UI), **Fraunces** (italic serif accents on Latin H1s and chapter labels; not applied on AR pages where it would be jarring), **IBM Plex Sans Arabic** (Arabic headings and buttons — previously missing, so AR buttons were falling back to the Latin font).
- **Design system additions.** 16px base size; glass surface tokens (`--glass`, `--glass-border`, `--shadow-glass-*`); gradient page wash (`--wash`); new radius steps `--r-xl` (24px) and `--r-xxl` (28px).
- **Floating frosted pill header.** The sticky header became a floating frosted pill with `backdrop-filter: blur(…)`. A `@supports` fallback provides a solid surface on browsers without backdrop-filter support. Mobile drawer alignment was corrected while applying the new header shape.
- **Glass cards and buttons.** All primary cards and CTA buttons now use the glass-surface tokens.
- **Trust bar → floating chips.** The horizontal trust bar was replaced with a floating-chip layout.
- **Hero blob + chip eyebrows.** A soft ambient blob was added behind the hero, and section eyebrows are now rendered as chips rather than plain text.
- **Palette-tint overlays.** All framed imagery now carries a palette-tint color overlay.
- **Inset gradient CTA panel.** The bottom-of-page call-to-action area is now an inset panel with a gradient fill.
- **Home chapter pair (`.chapter-pair` / `.chapter-card`).** The "We advise / We write" home sections are composed as a side-by-side pair at wider viewports.
- **About columns (`.about-story-grid` / `.about-col` / `.founder-frame`).** The About page splits into story and founder columns; the founder column contains a gradient placeholder frame (empty for now; `arva-portrait.png` can be dropped in as an opt-in later).
- **Consulting process → vertical timeline.** The process / how-it-works block on Consulting was redesigned as a stepped vertical timeline.
- **Scroll reveals + reduced-motion gating.** An IntersectionObserver scroll-reveal snippet was added to every page's inline script, fully gated behind `prefers-reduced-motion: reduce` so users who prefer no motion get a static experience.
- **RTL / Arabic improvements.** All new components have RTL extension rules. Arabic typography fixes: `letter-spacing: 0` (Latin letter-spacing is wrong on Arabic text), IBM Plex Sans Arabic applied to headings and buttons (previously missing).
- **`.serif-lead` component.** A serif lead paragraph style for the Books intro.
- **Verification sweep.** Automated 20-page sweep confirmed: HTTP 200 on all pages, structural element greps, CSS brace balance, and all new class names defined before use — all green.

**Spec:** `docs/superpowers/specs/2026-06-11-soft-modern-redesign-design.md`
**Plan:** `docs/superpowers/plans/2026-06-11-soft-modern-redesign.md`

## 2026-06-08

### Two-pillar restructure — Consulting + Books, student-only focus

The site grew from a single consulting pillar into two pillars under the same brand (no rebrand), unified by a "transition and belonging" theme. Done on branch `restructure/two-pillar-consulting-books` (heading to a PR). Design spec and implementation plan live in `docs/superpowers/specs/` and `docs/superpowers/plans/`.

- **Navigation** is now `Home · About · Consulting · Books · Resources · Contact` across all 18 pages (desktop, mobile drawer, footer) in EN/FR/AR.
- **Services → Consulting rename.** `/en/services/ → /en/consulting/`, `/fr/services/ → /fr/conseil/`, `/ar/services/ → /ar/consulting/`, with 301 redirects in `_redirects`, updated `sitemap.xml`, canonicals, and every cross-language `lang-switch` link.
- **B2B dropped entirely.** The Institutions and Employers offerings were removed; Consulting is now student-only. The home, Resources, and Contact pages were reframed to a student focus, and the footer brand copy and meta descriptions were rewritten to drop the student–institution–employer trio. (`services-institution.png` / `services-employer.png` are now unreferenced but kept on disk.)
- **New Books pillar** (`/en/books/`, `/fr/livres/`, `/ar/books/`) — a passion-first page led by the children's-book series for immigrant families, with an Educational Guides section. Honest "in development / coming soon" states; no placeholder covers.
- **Home reframed** into "two chapters": *We advise* (student consulting) and *We write* (books), under the transition-and-belonging theme.
- **About** now notes Arva as a long-time educator and author and links to Books; the principles were lightly reframed away from B2B positioning.
- **Copy humanized** across all new and changed content, with unnecessary em dashes removed.
- **Arabic** strings on the restructured pages await native-speaker review (`docs/superpowers/specs/arabic-review-checklist.md`) before deploy.

## 2026-05-28

### 🏷 Release: `v1.0.0` — Trilingual marketing site live

First formal release. Marks the current state of the project as a stable milestone after the WordPress-to-static cleanup, the www custom domain setup, and the full documentation surface (README, CLAUDE.md, CHANGELOG, ROADMAP, 9-page Wiki). Full release notes at <https://github.com/vijaybpanangi/ezziclarity/releases/tag/v1.0.0>.

### GitHub Wiki

- **Initial signpost page added.** A minimal `Home` page was created on the repo's GitHub Wiki tab as a way-finder pointing visitors back to the canonical in-repo docs (`README.md`, `CLAUDE.md`, `CHANGELOG.md`, `ROADMAP.md`, `docs/superpowers/`).
- **Full multi-page Wiki built out.** Expanded into a navigable nine-page wiki with a sidebar. Pages: [Home](https://github.com/vijaybpanangi/ezziclarity/wiki), [About Ezzi Clarity](https://github.com/vijaybpanangi/ezziclarity/wiki/About-Ezzi-Clarity), [Site Architecture](https://github.com/vijaybpanangi/ezziclarity/wiki/Site-Architecture), [Design System](https://github.com/vijaybpanangi/ezziclarity/wiki/Design-System), [Editing Workflow](https://github.com/vijaybpanangi/ezziclarity/wiki/Editing-Workflow), [Deployment](https://github.com/vijaybpanangi/ezziclarity/wiki/Deployment), [Project History](https://github.com/vijaybpanangi/ezziclarity/wiki/Project-History), [Roadmap](https://github.com/vijaybpanangi/ezziclarity/wiki/Roadmap), [AI-Assisted Development](https://github.com/vijaybpanangi/ezziclarity/wiki/AI-Assisted-Development). Repo files remain canonical; the Wiki is long-form commentary that wouldn't fit in the repo without bloating it.

### Cleanup — removed WordPress leftovers

The codebase was originally a WordPress theme; the static-HTML conversion left a few cosmetic artifacts behind. All scrubbed:

- **`style.css` header** — deleted the `Theme Name: Ezzi Clarity / Version: 8.5.0 / Text Domain: ezzi-clarity` block. Pure WP-theme convention with zero CSS value.
- **`class="static-site"` on `<body>`** — removed from all 14 HTML files (root index, 404, three language indices, and ten language subpages). Was a vestigial "this is the static build" marker; never referenced by any CSS or JS.
- **Orphan CSS selectors** — `.page-en-services`, `.page-fr-services`, and `.page-ar-services` had a rule reserving min-height in `style.css`, but those class names never appeared on any `<body>`. Selectors removed; the `.page-resources` portion of the same rule is preserved (that one is active).
- **`README_STATIC.txt`** — deleted. README.md and CHANGELOG.md now cover the same provenance.

The apex DNS still has `SPF` and `DMARC` TXT records referencing `_spf.wpcloud.com` from the WordPress.com hosting era. Those live in Cloudflare DNS (not in this repo) and were intentionally not touched — removing them could affect email deliverability if anyone is sending mail from the domain.

### Infrastructure

- **`www.ezziclarity.ca` now resolves.** Added as a second Custom Domain on the Cloudflare Pages project. Previously the `www` subdomain returned HTTP 522 (Cloudflare reached an origin that wasn't responding); now both apex and `www` serve identical content from the same Pages deployment.

### Documentation

- **`README.md`** — public-facing project overview for anyone landing on the GitHub repo home (tagline, live URL, the three languages, what's in the box, how to preview and deploy, the two editing gotchas).
- **`CLAUDE.md`** — operator's manual for Claude Code sessions working in this repo: the WordPress-to-static origin, the triplicate en/fr/ar maintenance reality, French translated URL slugs (`a-propos`, `ressources`), Arabic RTL handling, the relative-path depth gotcha, the design system, and the per-page mobile-nav script duplication.
- **`docs/superpowers/` scaffold** with `specs/`, `plans/`, and a README explaining the brainstorm → spec → plan → execute workflow used on this project.
- **`.gitignore`** added — covers OS metadata, editor scratch, env files, and `.superpowers/` brainstorming-session artifacts.
- **GitHub About panel filled in** — description (`Trilingual (EN / FR / AR) marketing site for Ezzi Clarity, an Ontario educational consulting practice. Plain HTML + CSS, deployed on Cloudflare Pages.`), live website link (`ezziclarity.ca`), and topics tags (`multilingual-websites`, `marketing-site`, `static-site`, `canada`, `rtl`, `html-css`, `ontario`, `cloudflare-pages`, `educational-consulting`).
- **README and CLAUDE updated** to name `https://ezziclarity.ca` as the live URL and document the Cloudflare Pages auto-deploy from `main`.

### Deferred / known follow-ups

- **`www → apex` canonical redirect.** Both variants serve identical content, but no single canonical URL is chosen yet. A Cloudflare Redirect Rule (match `Hostname equals www.ezziclarity.ca`, static target `https://ezziclarity.ca`, preserve path + query, status 301) would close this. Polish, not a fix.

---

## Earlier (Q4 2025 – Q2 2026)

The project began in **Q4 2025** with the incorporation of **Ezzi Clarity Educational Consulting Services Inc.** under the laws of British Columbia (Ontario Corporation Number 1001423284; head office Vancouver, principal place of business Waterloo). Founded by **Arva Yusuf Ezzi**, MEd from OISE (University of Toronto), with prior institutional roles at the University of Toronto and York University.

### Early December 2025 — The static stand-in

[`docs/archive/2025-12-static-standin/`](docs/archive/2025-12-static-standin/) — preserved verbatim.

The first production version of `ezziclarity.ca` was an explicitly transitional **single-language English-only** static site with a B2C family-services framing (Students / Parents & Families / Adult Learners). Inter + Playfair Display typography, sky→indigo gradient palette, full dark-mode support. Banner on every page read *"This is a temporary stand in site while our full Ezzi Clarity website is being built."*

### Late December 2025 — WordPress "Liquid Glass" theme (v1.3.0)

[`docs/archive/2025-12-28-wordpress-liquid-glass-staging-v4/`](docs/archive/2025-12-28-wordpress-liquid-glass-staging-v4/) — preserved verbatim, including the full ~870-line theme stylesheet.

Within ~3 weeks of the stand-in's launch, a substantial WordPress theme on WordPress.com was at **`Version: 1.3.0`** (theme name *"Ezzi Clarity – Liquid Glass (Staging v4)"*, text domain `ezzi-clarity-liquid-glass-staging-v4`). The CSS itself reveals the design language in detail:

- **Light-mode glass design**, not dark — confirmed by the CSS. Bluish-white page background, semi-transparent radial-gradient surfaces, `backdrop-filter: blur(14-20px)` on every glass surface.
- **Royal-blue palette** — `--accent: #2563eb`, `--accent-strong: #1d4ed8`. A third distinct palette in the project's history.
- **Apple system fonts (SF Pro) effective typography** — the CSS opens with a Roboto declaration that's overridden later by `-apple-system, BlinkMacSystemFont, "SF Pro Text", ...`. Roboto loaded as fallback only.
- **Glass meniscus detail** — every card has a top-edge `::before` highlight mimicking light reflecting off glass.
- **Hover micro-animations** — cards lift 4px, nav pills 1px, images get saturation boost.
- **Container width 1120px** (widest of any era).
- **Late CSS comments document polish work** — *"reduce the squished feel"*, *"CONTACT PAGE POLISH (v3)"*.

The audience pivot is already complete at this point: Students / Institutions / Employers (B2B+B2C), three dedicated service tiers. The compliance disclaimer is hardened (*"No immigration or visa consulting is provided"* in the footer + a dedicated Services FAQ entry). The tagline is still *"Less Noise. More Signal."* The portrait of Arva is on the About page. Phone numbers (mobile +1 647 505-9487, office +1 226 336-8100) and a Titan Email booking link are surfaced on Contact.

The complete contact / founder / language details from this era: mobile +1 (647) 505-9487, office +1 (226) 336-8100; **Arva Yusuf Ezzi**, MEd OISE U of T, prior roles at U of T and York U, fluent in English, Arabic, Hindi, Urdu, Gujarati. *(Earlier reconstructions had erroneously included French; that was wrong.)*

### Jan – early April 2026 — Liquid Glass v1.3.0 retired, theme renamed to `ezzi-clarity`

The text-domain transition: from `ezzi-clarity-liquid-glass-staging-v4` (v1.3.0) to `ezzi-clarity` (v3.0.0). The staging-era nomenclature is gone by April 6. Whether the staging theme was renamed and renumbered, or whether a separate `ezzi-clarity` theme line replaced it, isn't recoverable from the preserved sources.

### April 6, 2026 — WordPress theme `Ezzi Clarity v3.0.0` published

[`docs/archive/2026-04-06-wordpress-v3-0-0/`](docs/archive/2026-04-06-wordpress-v3-0-0/) — preserved verbatim, 26 files (25 PHP templates + the ~870-line `style.css`).

A clean post-Liquid-Glass production theme. The version progression from `1.3.0` to `3.0.0` spans the Jan–early-Apr 2026 window during which the design language was substantially overhauled. By the time this snapshot was taken, **most of what the current static site looks like was already in place**:

- 🟢 **Plus Jakarta Sans typography** — loaded via Google Fonts `@import`, used throughout.
- 🟢 **Sky + Peach + Cream palette** — `--sky: #5B8FA8`, `--peach: #E8835A`, `--cream: #F7F4EE`. Same exact tokens as current.
- 🟢 **Liquid Glass aesthetic largely retired** — `backdrop-filter: blur(...)` survives only on the sticky header (16px blur). No card-level backdrop-blur, no glass meniscus highlights, no translucent radial gradients on surfaces.
- 🟢 **Trilingual structure** — EN, FR, AR all present as full page trees. French uses translated slugs (`a-propos`, `ressources`). Arabic uses `<html lang="ar" dir="rtl">`.
- 🟢 **Founder portrait removed** from About page (`arva-portrait.png` no longer referenced).
- 🟢 **Three-tier framing locked in** — Students / Institutions / Employers.
- 🟢 **Container 1140px** — same as current static site.

But the tagline was still *"Less Noise. More Signal."* and the Contact page still surfaced phone numbers and the Titan Email booking link prominently. Those changes happened in the v3.0.0 → v8.5.0 window (April 6 → ~late May 2026).

### April 6 – ~late May 2026 (≈) — From v3.0.0 to v8.5.0

The theme version bumped from `3.0.0` to `8.5.0` over ~7 weeks. The most visible changes in this window were copy-level rather than design-level:

- Tagline replacement: **"Less Noise. More Signal." → "Clear paths. Confident decisions."**
- Phone numbers and Titan Email booking link no longer prominently surfaced on the Contact page.
- Theme version reached `8.5.0`.

Container width (1140px), typography (Plus Jakarta Sans), palette (Sky/Peach/Cream), trilingual structure, and component vocabulary remained stable from v3.0.0 through v8.5.0 — confirmed by direct diff between the April 6 archive and the current static site.

### Q2 2026 — WordPress-to-static migration

The final WordPress theme (`Version: 8.5.0`) was converted to plain static HTML and committed to this git repo as `Initial upload`. The conversion preserved the design system, typography, multilingual structure, CSS class vocabulary, and imagery; it discarded the PHP runtime, plugin dependencies, and database coupling.

### DNS provenance

The `_spf.wpcloud.com` SPF and `_dmarc` records still at Cloudflare DNS are legacy from the WordPress.com hosting era — slated for replacement during the iCloud+ Custom Email Domain migration on the [ROADMAP](ROADMAP.md).

### Full narrative

The Wiki's **[Project History](https://github.com/vijaybpanangi/ezziclarity/wiki/Project-History)** page is the long-form integrated history. It's tagged throughout with four certainty levels (🟢 primary source, ✅ verified, ≈ approximate, ⚠ inferred) so readers can tell which claims are grounded in what evidence.
