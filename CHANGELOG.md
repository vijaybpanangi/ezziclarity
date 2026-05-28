# Changelog

Notable changes to the website, deployment configuration, and project documentation. The detailed history lives in git; this file curates the highlights so a casual reader can scan what's happened over time without scrolling commit logs.

Releases on this project use semver-style tags (`v1.0.0`, `v1.1.0`, etc.) cut as deliberate milestones, not per-commit. See [GitHub Releases](https://github.com/vijaybpanangi/ezziclarity/releases) for the formal release notes.

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
