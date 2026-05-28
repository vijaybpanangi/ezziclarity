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

The project began in **Q4 2025** with the incorporation of **Ezzi Clarity Educational Consulting Services Inc.** under the laws of British Columbia (Ontario Corporation Number 1001423284; head office Vancouver, principal place of business Waterloo).

### December 2025 — The static stand-in (`docs/archive/2025-12-static-standin/`)

The first production version of `ezziclarity.ca` went live in December 2025 as an explicitly transitional **single-language English-only** static site. Every page carried a yellow banner reading *"This is a temporary stand in site while our full Ezzi Clarity website is being built."*

The Dec 2025 site is preserved verbatim in [`docs/archive/2025-12-static-standin/`](docs/archive/2025-12-static-standin/) — all five HTML pages, the stylesheet, the EC monogram SVG, the robots.txt, plus a README explaining the differences from the current site. Notable for being substantially different in framing from what runs today:

- **Tagline:** *"Less Noise. More Signal."* (the current site uses *"Clear paths. Confident decisions."*)
- **Audiences:** Students / Parents & Families / Adult Learners — a **B2C family-services framing**, not the current Students / Institutions / Employers triangle.
- **Typography:** Inter (body) + Playfair Display (headings) — replaced later by Plus Jakarta Sans.
- **Palette:** Sky → Indigo gradient (`#0ea5e9 → #6366f1`) — replaced later by the warmer Sky / Peach / Cream tokens.
- **Dark mode** via `prefers-color-scheme: dark` — not carried forward to the current site.

### Q1–Q2 2026 — WordPress theme build (in parallel)

While the Dec 2025 stand-in was live, a separate **WordPress theme** build was underway (theme name `Ezzi Clarity`, text domain `ezzi-clarity`, eventually reaching `Version: 8.5.0`). Across ~6 months and many iterations, the brand and design system shifted substantially:

- Audience pivot **from B2C to B2B + B2C** (the Students/Institutions/Employers triangle is a WordPress-era invention, not original).
- Typography swapped to **Plus Jakarta Sans** site-wide.
- Palette evolved to **Sky Blue + Warm Peach + Cream**.
- Tagline reframed from *"Less Noise. More Signal."* to *"Clear paths. Confident decisions."*
- **Trilingual expansion** added French and Arabic with the trilingual URL conventions and RTL handling that exist today.
- Compliance language hardened to the explicit *"No immigration or visa advice provided."*
- About page acquired (and later lost) a portrait of the founder — two byte-identical orphan PNGs survive in `assets/images/`.

The WordPress build eventually **replaced** the Dec 2025 stand-in (rather than evolving from it). The static conversion happened in Q2 2026, and the result was committed to this repo as `Initial upload`.

### DNS provenance

The `_spf.wpcloud.com` SPF and `_dmarc` records still at Cloudflare DNS are legacy from the WordPress.com hosting era — slated for replacement during the iCloud+ Custom Email Domain migration on the [ROADMAP](ROADMAP.md).

### Full narrative

The Wiki's **[Project History](https://github.com/vijaybpanangi/ezziclarity/wiki/Project-History)** page is the long-form integrated history. It's tagged throughout with four certainty levels (🟢 primary source, ✅ verified, ≈ approximate, ⚠ inferred) so readers can tell which claims are grounded in what evidence.
