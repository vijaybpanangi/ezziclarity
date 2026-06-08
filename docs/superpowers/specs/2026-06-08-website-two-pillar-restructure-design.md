# Website Restructure — Two-Pillar (Consulting + Books)

**Date:** 2026-06-08
**Status:** Design — awaiting approval
**Scope:** Website content & structure only. Book production, the KDP/Amazon distribution pipeline, real cover art, and the educational-guide content itself are explicitly out of scope (separate, later phases).

---

## 1. Background & intent

Ezzi Clarity began as a feasibility hedge during an immigration-status window. That pressure has now lifted (BOWP/SOWP approved; founder Arva Ezzi back at UofT/Rotman full-time as an Area Administrator). The entity is otherwise dormant, and the goal is to make it **meaningful and active again**, in this priority order:

1. **Keep the entity meaningful & active** — build a credible body of work and brand under Arva's name (primary).
2. **Use it as an AI sandbox** — see how far one-person-plus-agents can go (secondary).
3. **Revenue** — welcome, not the driver (last).

This spec covers the **first** of four sequenced pieces: the website restructure. (The others — book-production pipeline, the first book, and the educational guide — follow later.)

### Hard constraints

- **No rebrand.** The legal entity stays *Ezzi Clarity Educational Consulting Services Inc.* All new work lives under that one name. No imprint, no sub-brand. The name already accommodates the direction: "Educational Consulting" spans both educational guides and *educational* children's books.
- **Founder authorship is clean.** Arva's Rotman role is administrative; academic external authoring has no visible conflict of interest and no shared time/resources. She can be the named author/expert.
- **Compliance line stays.** "Academic and career focused only. No immigration or visa advice provided." remains wherever it currently appears (EN/FR/AR).
- **Trilingual, hand-maintained, no build system.** Every change is triplicated across `/en/`, `/fr/`, `/ar/`, plus the mobile drawer and footer on each page. French uses translated slugs; Arabic is RTL with an `dir="ltr"` language switcher.

---

## 2. The unifying idea

The site grows from **one pillar (consulting)** to **two pillars (consulting + publishing)**, tied together by a single human theme:

> **Transition and belonging** — helping people find their footing in a new place.

The same practice that helps **students** settle into a new academic culture also **writes** for **immigrant children** settling into a new home. Both chapters are about *individuals* finding their footing — which is why the B2B audiences are being dropped (see §3.3): they were organizations, not people, and sat outside this narrative.

---

## 3. Scope of changes

### 3.1 Navigation (every page × 3 languages + mobile drawer + footer)

From: `Home · About · Services · Resources · Contact`
To:   `Home · About · Consulting · Books · Resources · Contact`

- Rename **Services → Consulting**.
- Add new **Books** item.
- Update the `.lang-switch` cross-language hrefs and the footer navigation list on every page.

### 3.2 Consulting page — full URL rename

- `/en/services/ → /en/consulting/`
- `/fr/services/ → /fr/conseil/`
- `/ar/services/ → /ar/consulting/` (Arabic keeps English directory names, per existing convention)
- Add **301 redirects** from the old paths (`_redirects`).
- Update `sitemap.xml`, every `<link rel="canonical">`, and every cross-language `.lang-switch` href across all pages.

### 3.3 Drop B2B — Consulting becomes student-only

The current three-audience framing (Institutions / Students / Employers) collapses to **Students only**. Institutions and Employers offerings are **fully removed** from the live site (recoverable via git history; "as of now," not necessarily forever).

Touched everywhere the trio appears:
- **Consulting page:** three service cards → one focused student offering (academic & career transition coaching, professional communication workshops, study strategy & learning skills). The FAQ item about working with institutions is removed/revised. "How we work" process is retained, reworded to a student context.
- **Home page:** the "Core Service Areas" 3-card grid and the hero "Who We Work With" list collapse to students.
- **Trust bar:** remove the "Students · Institutions · Employers" trio item.
- **Footer brand description + all `<meta name="description">` / `og:description`:** rewrite "students, institutions, and employers" / "student–institution–employer ecosystem" language to a student focus.
- **Images:** `services-institution.png` and `services-employer.png` become unreferenced. Keep the files; just stop linking them.

### 3.4 Books page — NEW (passion-first editorial layout)

New directories: `/en/books/`, `/fr/livres/`, `/ar/books/`.

Page structure (top to bottom):
1. **Page header** — "Books" intro framing the publishing pillar under the Ezzi Clarity name.
2. **Feature block — the immigrant-family series story.** Story-led, the emotional centerpiece: little children from immigrant families adjusting to a new country and culture, with threads of nostalgia for what was left behind. Grounded in Arva's 10+ years teaching this age range.
3. **Children's Books (Passion Project)** — the lead category. First formats: **picture books (ages ~3–6)** and **early readers (ages ~5–8)**. Shown as honest **"In development / Coming soon"** states with a soft "tell us you're interested" prompt. **No fake covers.**
4. **Educational Guides** — supporting category below. E.g. the international-student academic-transition guide. Also "in development."
5. **CTA** — consistent with the site's existing CTA pattern.

All under the single brand; no imprint. French heading/slug `livres`; Arabic RTL.

### 3.5 Home page — "two chapters" reframe

- **Hero** reframed around *transition & belonging* (replacing the consulting-only framing), keeping brand voice and the compliance footnote.
- **Chapter One — "We advise":** the consulting pillar, now student-focused (reuses the strong existing student content).
- **Chapter Two — "We write":** the publishing pillar — guides + children's passion project — linking to the Books page.
- **Keep** "What working with us feels like" (now spanning both pillars) and the closing CTA.

### 3.6 About page — light touch

Add a brief acknowledgment of Arva as a 10-year educator and author, and the publishing direction. No structural overhaul.

### 3.7 Cross-cutting / infrastructure

- `sitemap.xml` and `_redirects` are hand-maintained — update for the renamed Consulting paths and the new Books pages (× 3 languages).
- Each page carries its own duplicated mobile-nav `<script>` — unaffected logically, but the nav markup it toggles changes, so verify on each.
- Preserve all accessibility scaffolding (`skip-link`, `aria-*`, `aria-current`, intentional `alt=""` on decorative images).

---

## 4. Languages & translation

- All new and changed copy is drafted in **English first**, then translated to **French** and **Arabic**.
- French translated slugs: `conseil` (consulting), `livres` (books).
- **Arabic copy is a known risk area** in this project's history (prior mojibake). All new Arabic strings will be drafted carefully and **flagged for a human/native-speaker check** before the work is considered done.

---

## 5. Out of scope (sequenced for later)

- Children's-book **production pipeline** (AI authoring + consistent illustration workflow) — *with Amazon KDP / Kindle distribution set up early so reach is ready for every book produced.*
- The **first actual book(s)**.
- The **educational guide** content itself.
- Real cover art and any monetization decisions.

---

## 6. Success criteria

- Nav reads `Home · About · Consulting · Books · Resources · Contact` on all 15 pages + mobile drawers + footers.
- Old `/services/` URLs 301-redirect to the new `/consulting/` (resp. `/conseil/`) paths; `sitemap.xml` and `_redirects` are consistent; no broken internal or cross-language links.
- No Institutions/Employers offerings remain on the live site; no orphaned references to the trio in copy, meta, or trust bar.
- A Books page exists in all three languages, leading with the children's-book passion-project story, with honest "in development" states and no fake covers.
- The home page tells the two-chapter (advise / write) story under the transition-and-belonging theme.
- Compliance footnote present wherever it was before; accessibility scaffolding intact.
- Arabic strings flagged for native review.
