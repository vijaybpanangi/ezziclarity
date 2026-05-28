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

The site began as a WordPress theme around Q4 2025, founded for **Arva Ezzi**'s educational-consulting practice. Across roughly six months of iteration with ChatGPT as the primary collaborator, the theme went through ~8 major versions (final WP theme header: `Theme Name: Ezzi Clarity, Version: 8.5.0`), with a typography selection process (Inter / Poppins / Roboto rejected before settling on Plus Jakarta Sans), a palette stabilization toward Sky Blue + Warm Peach + Cream, a trilingual expansion (English + French + Arabic, with French translated slugs and Arabic RTL), and a voice refinement that replaced the earlier *"Less Noise. More Signal."* tagline with the current *"Clear paths. Confident decisions."* The About page initially featured a portrait of Arva that was later removed; two byte-identical orphan PNGs in `assets/images/` are the only trace.

The WP-to-static migration happened in Q2 2026, before this git repo was created. The static build was committed as `Initial upload`. The `_spf.wpcloud.com` SPF and `_dmarc` records that still sit at Cloudflare DNS are legacy from the WordPress.com hosting era — slated for replacement during the iCloud+ Custom Email Domain migration on the [ROADMAP](https://github.com/vijaybpanangi/ezziclarity/blob/main/ROADMAP.md).

**Full narrative** — including the rejected design directions (the "Liquid Glass" dark experiment, the too-sparse minimalist phase, the generic-educational-institution look), the imagery overhaul era, and the founder-positioning decisions — lives on the Wiki at **[Project History](https://github.com/vijaybpanangi/ezziclarity/wiki/Project-History)**. The pre-May-2026 section there is reconstructed from a ChatGPT collaboration log produced 2026-05-28 and is marked ≈ approximate, ⚠ inferred, or ✅ verified per claim.
