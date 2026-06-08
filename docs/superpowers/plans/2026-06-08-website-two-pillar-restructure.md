# Two-Pillar Website Restructure — Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Restructure the Ezzi Clarity site from a single consulting pillar into two pillars — Consulting (now student-only) and Books (publishing) — unified by a "transition & belonging" theme, across all three language trees.

**Architecture:** Plain static HTML + one global `style.css`, no build system, no tests. The same page exists in `/en/`, `/fr/` (translated slugs), `/ar/` (RTL). Every markup change is triplicated; nav/footer/lang-switch are duplicated per page. Verification is visual + `grep`-based consistency checks against a local `python3 -m http.server`.

**Tech Stack:** HTML5, CSS (existing `style.css` token palette, Plus Jakarta Sans), Cloudflare Pages (`_redirects`, hand-maintained `sitemap.xml`). No JS framework; a small inline mobile-nav script is duplicated per page.

**Spec:** `docs/superpowers/specs/2026-06-08-website-two-pillar-restructure-design.md`

**Branch:** `restructure/two-pillar-consulting-books` (already created; spec already committed there).

---

## Conventions used throughout this plan

**Directory map (after this work):**

| Concept | EN | FR (translated slug) | AR (English dir, RTL) |
|---|---|---|---|
| Consulting | `/en/consulting/` | `/fr/conseil/` | `/ar/consulting/` |
| Books (new) | `/en/books/` | `/fr/livres/` | `/ar/books/` |

**The canonical navigation block** (main-nav) after this work, per language. Relative paths shown for a **section page** (depth `/xx/<section>/index.html`, i.e. `../`):

- **EN:** `Home → ../index.html` · `About → ../about/index.html` · `Consulting → ../consulting/index.html` · `Books → ../books/index.html` · `Resources → ../resources/index.html` · `Contact → ../contact/index.html`
- **FR:** `Accueil → ../index.html` · `À propos → ../a-propos/index.html` · `Conseil → ../conseil/index.html` · `Livres → ../livres/index.html` · `Ressources → ../ressources/index.html` · `Contact → ../contact/index.html`
- **AR:** (RTL, Arabic labels) `الرئيسية → ../index.html` · `من نحن → ../about/index.html` · `الاستشارات → ../consulting/index.html` · `الكتب → ../books/index.html` · `المصادر → ../resources/index.html` · `اتصل بنا → ../contact/index.html`

On the **home page** of each language (depth `/xx/index.html`, i.e. no `../`), the same links drop one `../` (e.g. `consulting/index.html`). The `.lang-switch` block links the *current* page across languages and changes only on pages whose slug changed (Consulting, Books).

**Verification commands** used repeatedly:

```bash
# Serve locally (run once, leave running in a separate shell)
cd /home/vpanangipally/workshop/ezziclarity && python3 -m http.server 8000

# Find any stale references to the old services path (should be empty when done)
grep -rn "services/index.html\|/services/\|services-institution\|services-employer" en fr ar sitemap.xml _redirects

# Find leftover B2B / trio language (should be empty in live pages when done)
grep -rni "institution\|employer\|institutionnel\|employeur" en fr ar | grep -v "consulting/index.html"

# Verify every page's nav has exactly the 6 expected items
grep -c "nav-link" en/index.html
```

**Commit discipline:** one commit per task. All commits end with the trailer:
`Co-Authored-By: Claude Opus 4.8 (1M context) <noreply@anthropic.com>`

---

## File structure

**Created:**
- `en/books/index.html`, `fr/livres/index.html`, `ar/books/index.html` — new Books pages.

**Renamed (git mv):**
- `en/services/index.html → en/consulting/index.html`
- `fr/services/index.html → fr/conseil/index.html`
- `ar/services/index.html → ar/consulting/index.html`

**Modified:**
- All 6 EN pages + 6 FR + 6 AR (15 existing → 15, plus 3 new Books) for nav/footer/lang-switch.
- `en/index.html`, `fr/index.html`, `ar/index.html` — home reframe + B2B drop.
- consulting pages — student-only rewrite.
- about pages — light touch.
- `_redirects`, `sitemap.xml` — paths.
- `CHANGELOG.md`, `README.md` — Change-History row.

---

## Phase 1 — Rename Consulting (structure + redirects)

### Task 1: git-mv the services directories to consulting

**Files:**
- Rename: `en/services/index.html → en/consulting/index.html`
- Rename: `fr/services/index.html → fr/conseil/index.html`
- Rename: `ar/services/index.html → ar/consulting/index.html`

- [ ] **Step 1: Move the three directories**

```bash
cd /home/vpanangipally/workshop/ezziclarity
git mv en/services en/consulting
git mv fr/services fr/conseil
git mv ar/services ar/consulting
```

- [ ] **Step 2: Verify the moves**

Run: `git status --short`
Expected: three `R` (rename) entries for the three index.html files.

- [ ] **Step 3: Commit**

```bash
git add -A
git commit -m "Rename services dirs to consulting (en/consulting, fr/conseil, ar/consulting)

Co-Authored-By: Claude Opus 4.8 (1M context) <noreply@anthropic.com>"
```

### Task 2: Add redirects for the old paths

**Files:**
- Modify: `_redirects`

- [ ] **Step 1: Read current `_redirects`**

Run: `cat _redirects` — note existing syntax/patterns (short-path redirects already present).

- [ ] **Step 2: Add 301 redirects from old service paths**

Append these lines (Cloudflare Pages / Netlify syntax — `from to status`):

```
/en/services/*   /en/consulting/:splat   301
/fr/services/*   /fr/conseil/:splat       301
/ar/services/*   /ar/consulting/:splat    301
/en/services     /en/consulting/          301
/fr/services     /fr/conseil/             301
/ar/services     /ar/consulting/          301
```

If a `/services → /en/consulting/` short path existed before, update its target too.

- [ ] **Step 3: Verify no contradictory rules remain**

Run: `grep -n "services" _redirects`
Expected: only the new 301 source rules above (no rule pointing *into* a now-nonexistent `/services/` target).

- [ ] **Step 4: Commit**

```bash
git add _redirects
git commit -m "Add 301 redirects from old /services/ paths to /consulting/

Co-Authored-By: Claude Opus 4.8 (1M context) <noreply@anthropic.com>"
```

### Task 3: Update sitemap.xml and canonical tags for renamed paths

**Files:**
- Modify: `sitemap.xml`
- Modify: `en/consulting/index.html`, `fr/conseil/index.html`, `ar/consulting/index.html` (canonical only)

- [ ] **Step 1: Update sitemap URLs**

In `sitemap.xml`, change the three consulting `<loc>` entries:
- `.../en/services/` → `.../en/consulting/`
- `.../fr/services/` → `.../fr/conseil/`
- `.../ar/services/` → `.../ar/consulting/`
(Add the three new Books URLs later in Task 9.)

- [ ] **Step 2: Confirm canonical tags**

The consulting pages use `<link rel="canonical" href="index.html">` (relative, self-referential) — confirm they still read `index.html` and need no change. If any uses an absolute URL, update `services` → the new slug.

- [ ] **Step 3: Verify**

Run: `grep -n "services" sitemap.xml`
Expected: empty.

- [ ] **Step 4: Commit**

```bash
git add sitemap.xml en/consulting/index.html fr/conseil/index.html ar/consulting/index.html
git commit -m "Point sitemap + canonicals at renamed consulting paths

Co-Authored-By: Claude Opus 4.8 (1M context) <noreply@anthropic.com>"
```

---

## Phase 2 — Create the Books pages

The Books page uses the site's existing section patterns (`page-header`, `section`/`section-alt`, `service-card`/`card` grids, `section-cta`). Layout (top→bottom): page header → **story-led feature** → **Children's Books (Passion Project)** category → **Educational Guides** category → CTA. No fake covers; use honest "In development / Coming soon" states.

### Task 4: Build the English Books page

**Files:**
- Create: `en/books/index.html`

- [ ] **Step 1: Scaffold from an existing EN section page**

Copy `en/consulting/index.html` to `en/books/index.html` as a structural starting point (same `<head>`, header, mobile-nav script, footer). This guarantees the shared chrome matches.

```bash
cp en/consulting/index.html en/books/index.html
```

- [ ] **Step 2: Set head/meta for Books**

- `<title>Books — Ezzi Clarity</title>`
- `<meta name="description" content="Children's books and educational guides from Ezzi Clarity — stories that help immigrant children feel at home, and practical guides for students navigating Canadian academic life.">`
- `og:title` = `Books — Ezzi Clarity Educational Consulting`
- `og:description` = same as description
- canonical stays `index.html`

- [ ] **Step 3: Mark Books active in nav (and Consulting inactive)**

In both the desktop `main-nav` and the mobile drawer, move `nav-active` onto the Books link. (Nav hrefs themselves are finalized site-wide in Phase 3; here just set this page's chrome.)

- [ ] **Step 4: Replace `<main>` with the Books content**

```html
<main id="main-content">

  <!-- PAGE HEADER -->
  <section class="page-header">
    <div class="container">
      <p class="eyebrow">Books</p>
      <h1>Stories and guides<br>for finding your way.</h1>
      <p>Ezzi Clarity is beginning to write as well as advise. Our books carry the same belief as our consulting work: that everyone deserves a clear, kind path into something new — whether that's a student arriving at a Canadian university, or a child arriving in a new country.</p>
      <p class="hero-footnote">Academic and career focused only. No immigration or visa advice provided.</p>
    </div>
  </section>

  <!-- FEATURE: the immigrant-family series story -->
  <section class="section-alt">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">Passion Project</p>
        <h2>A series for children making a new place home</h2>
      </div>
      <div style="max-width:760px;">
        <p>Our heart-led work is a series of children's books about little ones from immigrant families finding their footing in a new country and culture — learning a new language, a new school, new friends — while holding gently onto the memories and small nostalgias of the home they left behind.</p>
        <p>The stories are grounded in more than ten years of teaching children from early years through middle school. That means age-appropriate language, the right rhythm and length for each reader, and emotional beats that genuinely land — the kind of care that separates a book children return to from one they put down.</p>
      </div>
    </div>
  </section>

  <!-- CHILDREN'S BOOKS category -->
  <section class="section">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">Children's Books</p>
        <h2>In development</h2>
        <p>The first titles are taking shape now. We're starting with two formats well-suited to our youngest readers.</p>
      </div>
      <div class="grid grid-3">
        <article class="card card--accent">
          <p class="card-tag">Coming soon</p>
          <h3>Picture book · ages 3–6</h3>
          <p>A gentle, illustrated story for the very youngest new arrivals — read aloud at bedtime, built around belonging and small moments of courage.</p>
        </article>
        <article class="card card--accent">
          <p class="card-tag">Coming soon</p>
          <h3>Early reader · ages 5–8</h3>
          <p>Short, simple sentences for children just beginning to read on their own, following a young character settling into a new home and school.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- EDUCATIONAL GUIDES category -->
  <section class="section-alt">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">Educational Guides</p>
        <h2>Practical guides for students</h2>
        <p>Alongside the children's books, we're developing clear, practical guides drawn from years inside Canadian post-secondary environments.</p>
      </div>
      <div class="grid grid-3">
        <article class="card card--accent">
          <p class="card-tag">In development</p>
          <h3>Arriving &amp; adapting: the international student's guide</h3>
          <p>A plain-language guide to navigating Canadian academic expectations, study habits, and early-career steps with confidence.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="section-cta">
    <div class="container section-cta-inner">
      <div>
        <p class="eyebrow">Want to know when the first one is ready?</p>
        <h2>Be the first to hear.</h2>
        <p>The books aren't out yet — but if any of this resonates, tell us. We'll let you know the moment the first title is available.</p>
      </div>
      <div>
        <a href="../contact/index.html" class="btn-primary btn-lg">Tell us you're interested</a>
      </div>
    </div>
  </section>

</main>
```

- [ ] **Step 5: Verify rendering**

With the local server running, open `http://localhost:8000/en/books/`. Confirm: header chrome matches other pages, all sections render, Books shows active in nav, footer present, compliance footnote present, no broken images (the page uses no service images — good).

- [ ] **Step 6: Verify no broken internal links on the page**

Run: `grep -n 'href="' en/books/index.html` and eyeball that contact/nav links resolve to existing paths.

- [ ] **Step 7: Commit**

```bash
git add en/books/index.html
git commit -m "Add English Books page (passion-first layout, in-development states)

Co-Authored-By: Claude Opus 4.8 (1M context) <noreply@anthropic.com>"
```

### Task 5: Build the French Books page (`/fr/livres/`)

**Files:**
- Create: `fr/livres/index.html`

- [ ] **Step 1: Scaffold from the FR consulting page**

```bash
mkdir -p fr/livres && cp fr/conseil/index.html fr/livres/index.html
```

- [ ] **Step 2: Translate the Task 4 content into French**

Mirror the EN Books structure exactly (same sections, classes, image-free layout). Translate all prose to French. Set:
- `<title>Livres — Ezzi Clarity</title>`, FR `<meta name="description">` and `og:*`.
- Eyebrows: `Livres`, `Projet passion`, `Livres pour enfants`, `Guides éducatifs`.
- Headings translated (e.g. `Des histoires et des guides pour trouver votre voie.`).
- CTA button: `Dites-nous que cela vous intéresse`.
- Compliance footnote (FR): use the exact wording already present in other FR pages — copy it verbatim from `fr/index.html` rather than re-translating.
- Set `nav-active` on the Livres link.

- [ ] **Step 3: Verify**

Open `http://localhost:8000/fr/livres/`. Confirm rendering and that the compliance footnote text matches the existing FR wording exactly.

- [ ] **Step 4: Commit**

```bash
git add fr/livres/index.html
git commit -m "Add French Books page (fr/livres)

Co-Authored-By: Claude Opus 4.8 (1M context) <noreply@anthropic.com>"
```

### Task 6: Build the Arabic Books page (`/ar/books/`)

**Files:**
- Create: `ar/books/index.html`

- [ ] **Step 1: Scaffold from the AR consulting page**

```bash
mkdir -p ar/books && cp ar/consulting/index.html ar/books/index.html
```

- [ ] **Step 2: Translate into Arabic, preserving RTL scaffolding**

Mirror the EN Books structure. Keep `<html lang="ar" dir="rtl">`, keep the `.lang-switch` container's `dir="ltr"`. Translate all prose to Arabic. Set Arabic `<title>`, `<meta>`, `og:*`, eyebrows, headings, and CTA. Copy the Arabic compliance footnote **verbatim** from `ar/index.html`. Set `nav-active` on the Books link.

- [ ] **Step 3: Verify rendering + RTL**

Open `http://localhost:8000/ar/books/`. Confirm RTL layout, the EN/FR/AR pills stay LTR, footnote matches existing AR wording.

- [ ] **Step 4: FLAG for native review**

Add the page to the Arabic-review checklist (see Task 16). Per spec §4, new Arabic strings must get a human/native check before "done."

- [ ] **Step 5: Commit**

```bash
git add ar/books/index.html
git commit -m "Add Arabic Books page (ar/books, RTL) — flagged for native review

Co-Authored-By: Claude Opus 4.8 (1M context) <noreply@anthropic.com>"
```

---

## Phase 3 — Site-wide navigation update

Now that `/consulting/` and `/books/` exist in all three trees, update the **main-nav**, **mobile drawer**, **footer navigation**, and **`.lang-switch`** on every page so links resolve and labels read correctly. Do this one language tree at a time.

### Task 7: Update navigation across all EN pages

**Files (modify):** `en/index.html`, `en/about/index.html`, `en/consulting/index.html`, `en/resources/index.html`, `en/contact/index.html`, `en/books/index.html`

- [ ] **Step 1: In each EN page, replace the Services nav entry**

In both `main-nav` and the mobile drawer: change the `Services` link text to `Consulting` and its href from `services/index.html` (or `../services/index.html`) to the consulting path at the correct depth (`consulting/index.html` on home; `../consulting/index.html` on section pages).

- [ ] **Step 2: Insert the Books nav entry**

Add `Books` immediately after Consulting in both `main-nav` and mobile drawer, href `books/index.html` (home) or `../books/index.html` (section pages). Preserve the `nav-active` marker on whichever page is current.

- [ ] **Step 3: Update footer navigation list**

In each EN footer, change the `Services` `<li>` to `Consulting` (correct href) and add a `Books` `<li>`.

- [ ] **Step 4: Update `.lang-switch` on the consulting + books pages only**

- `en/consulting/index.html` lang-switch: FR → `../../fr/conseil/index.html`, AR → `../../ar/consulting/index.html`.
- `en/books/index.html` lang-switch: FR → `../../fr/livres/index.html`, AR → `../../ar/books/index.html`.
(Other EN pages' lang-switch is unchanged — their slugs didn't change.)

- [ ] **Step 5: Verify every EN page has 6 nav items and no stale services link**

```bash
for f in en/index.html en/about/index.html en/consulting/index.html en/resources/index.html en/contact/index.html en/books/index.html; do echo "$f: $(grep -c 'class="nav-link' $f) nav-links"; done
grep -rn "services/index.html" en
```
Expected: each page shows the expected nav-link count; the grep is empty.

- [ ] **Step 6: Visual check**

Open each EN page; click through Consulting and Books from the nav; confirm no 404s.

- [ ] **Step 7: Commit**

```bash
git add en
git commit -m "Update EN navigation: Services→Consulting, add Books, fix lang-switch

Co-Authored-By: Claude Opus 4.8 (1M context) <noreply@anthropic.com>"
```

### Task 8: Update navigation across all FR pages

**Files (modify):** `fr/index.html`, `fr/a-propos/index.html`, `fr/conseil/index.html`, `fr/ressources/index.html`, `fr/contact/index.html`, `fr/livres/index.html`

- [ ] **Step 1: Repeat Task 7 steps 1–4 for FR**, using FR labels/slugs:
- Nav label `Services` → `Conseil`, href `conseil/index.html` / `../conseil/index.html`.
- Add `Livres`, href `livres/index.html` / `../livres/index.html`.
- Footer nav: `Conseil` + `Livres`.
- lang-switch on `fr/conseil/`: EN → `../../en/consulting/index.html`, AR → `../../ar/consulting/index.html`. On `fr/livres/`: EN → `../../en/books/index.html`, AR → `../../ar/books/index.html`.

- [ ] **Step 2: Verify**

```bash
grep -rn "/services/\|services/index.html" fr
for f in fr/index.html fr/a-propos/index.html fr/conseil/index.html fr/ressources/index.html fr/contact/index.html fr/livres/index.html; do echo "$f: $(grep -c 'class="nav-link' $f)"; done
```
Expected: grep empty; consistent counts.

- [ ] **Step 3: Commit**

```bash
git add fr
git commit -m "Update FR navigation: Services→Conseil, add Livres, fix lang-switch

Co-Authored-By: Claude Opus 4.8 (1M context) <noreply@anthropic.com>"
```

### Task 9: Update navigation across all AR pages + add Books to sitemap

**Files (modify):** `ar/index.html`, `ar/about/index.html`, `ar/consulting/index.html`, `ar/resources/index.html`, `ar/contact/index.html`, `ar/books/index.html`, `sitemap.xml`

- [ ] **Step 1: Repeat Task 7 steps 1–4 for AR**, using Arabic labels and English dir slugs (`consulting`, `books`). Preserve RTL and the `dir="ltr"` on `.lang-switch`.
- lang-switch on `ar/consulting/`: EN → `../../en/consulting/index.html`, FR → `../../fr/conseil/index.html`. On `ar/books/`: EN → `../../en/books/index.html`, FR → `../../fr/livres/index.html`.

- [ ] **Step 2: Add the three Books URLs to `sitemap.xml`**

Add `<url><loc>https://ezziclarity.ca/en/books/</loc></url>`, `.../fr/livres/`, `.../ar/books/` (match the existing entry format).

- [ ] **Step 3: Verify**

```bash
grep -rn "/services/\|services/index.html" ar
grep -c "books\|livres" sitemap.xml
```
Expected: first grep empty; sitemap shows the 3 new entries.

- [ ] **Step 4: Commit**

```bash
git add ar sitemap.xml
git commit -m "Update AR navigation + add Books pages to sitemap

Co-Authored-By: Claude Opus 4.8 (1M context) <noreply@anthropic.com>"
```

---

## Phase 4 — Consulting page: student-only rewrite (drop B2B)

### Task 10: Rewrite the EN consulting page to student-only

**Files (modify):** `en/consulting/index.html`

- [ ] **Step 1: Reframe the page header**

Keep the `page-header` section; rewrite copy to a single-audience (student) focus. Suggested:
- eyebrow: `Consulting`
- h1: `Practical support.<br>Clear direction.` (retain)
- intro: `We work one-on-one and in small groups with students navigating Canadian academic life — making sense of expectations, building real skills, and moving forward with choices that are both ambitious and grounded.`

- [ ] **Step 2: Replace the three-card grid with the single student offering**

Remove the `card-inst` (Institutions) and `card-empl` (Employers) `article`s entirely. Keep and promote the student offering. Replace the `grid grid-3` with a focused presentation of the three **student sub-services** as a checklist or single feature block:
- Academic and career transition coaching
- Professional communication workshops
- Study strategy and learning skills support

- [ ] **Step 3: Keep "How we work", reword to student context**

Retain the 4-step process; adjust wording so it reads for an individual student rather than "institutional or organizational realities" (e.g. step 2 "matches your goals and circumstances").

- [ ] **Step 4: Revise the FAQ**

Remove the FAQ item "Can you work with institutions outside Ontario?". Keep the immigration-disclaimer Q, the one-on-one Q, and the engagement-length Q. Optionally add: "Who do you work with?" → "We focus on students — domestic and international — adapting to Canadian academic and professional settings."

- [ ] **Step 5: Verify no B2B remains on the page**

```bash
grep -ni "institution\|employer\|card-inst\|card-empl\|svc-pill inst\|svc-pill empl" en/consulting/index.html
```
Expected: empty (the immigration-disclaimer text mentioning "regulated immigration consulting" is fine; B2B audience terms are not).

- [ ] **Step 6: Visual check**

Open `http://localhost:8000/en/consulting/` — confirm one coherent student-focused page, images for institution/employer no longer referenced.

- [ ] **Step 7: Commit**

```bash
git add en/consulting/index.html
git commit -m "Rewrite EN consulting page to student-only focus (drop B2B)

Co-Authored-By: Claude Opus 4.8 (1M context) <noreply@anthropic.com>"
```

### Task 11: Apply the student-only rewrite to FR and AR consulting pages

**Files (modify):** `fr/conseil/index.html`, `ar/consulting/index.html`

- [ ] **Step 1: FR** — mirror Task 10 (remove Institutions/Employers cards, single student focus, reword process, revise FAQ) in French. Reuse existing FR phrasing where present; only the structure and the dropped cards change.

- [ ] **Step 2: AR** — mirror Task 10 in Arabic, preserving RTL. Flag for native review (Task 16).

- [ ] **Step 3: Verify**

```bash
grep -ni "card-inst\|card-empl" fr/conseil/index.html ar/consulting/index.html
```
Expected: empty.

- [ ] **Step 4: Commit**

```bash
git add fr/conseil/index.html ar/consulting/index.html
git commit -m "Rewrite FR + AR consulting pages to student-only (drop B2B)

Co-Authored-By: Claude Opus 4.8 (1M context) <noreply@anthropic.com>"
```

---

## Phase 5 — Home page: "two chapters" reframe + B2B drop

### Task 12: Reframe the EN home page

**Files (modify):** `en/index.html`

- [ ] **Step 1: Reframe the hero around transition & belonging**

Replace hero copy:
- eyebrow: `Educational Consulting & Publishing · Ontario`
- h1: `Finding your footing<br>in a new place.`
- lead paragraphs:
  - `Ezzi Clarity helps people settle into something new. For students, that means navigating Canadian academic life with clarity and confidence. For the youngest new arrivals, it means stories that help them feel at home.`
  - `Two kinds of work, one belief: everyone deserves a clear, kind path forward — practical, honest, and grounded in real experience.`
- hero-actions: keep `Book an Intro Call`; change the secondary button to `Explore Consulting` → `consulting/index.html`, and add a third link `See our Books` → `books/index.html` (or replace the secondary with two links as fits the existing button styles).
- Keep the compliance `hero-footnote`.

- [ ] **Step 2: Collapse the hero "Who We Work With" card to students**

In `hero-card`, replace the three-audience checklist with student-focused items (e.g. "Domestic and international students navigating Canadian academic expectations.", "Academic & career transition coaching and workshops.", "Study strategies and learning skills."). Retitle if desired ("Who we help").

- [ ] **Step 3: Fix the trust bar**

Replace the `Students · Institutions · Employers` trust-item with something non-trio, e.g. `Student-focused` or `Academic transition & early career`. Keep the other three items.

- [ ] **Step 4: Replace "Core Service Areas" 3-card grid with Chapter One ("We advise")**

Rework the `Core Services` section into **Chapter One — We advise**: a student-focused consulting summary (reuse the existing Student Services copy as the single offering), with the `View All Services` button relabeled `Explore Consulting` → `consulting/index.html`. Remove the Institutions and Employers service cards.

- [ ] **Step 5: Add Chapter Two ("We write")**

After Chapter One, add a new section — **Chapter Two — We write** — a story-led teaser of the publishing pillar (children's books + guides) with a button `Visit the Books page` → `books/index.html`. Reuse `section`/`section-alt` alternation and existing card/CTA classes.

- [ ] **Step 6: Keep "What working with us feels like" and the CTA**

Retain these; lightly adjust the "feels like" copy so it reads as spanning both pillars (advising and writing), and ensure the closing CTA wording isn't trio-specific.

- [ ] **Step 7: Update meta/OG descriptions (drop trio)**

Rewrite `<meta name="description">` and `og:description` to the two-pillar / student framing (no "students, institutions, and employers").

- [ ] **Step 8: Verify**

```bash
grep -ni "institution\|employer" en/index.html
```
Expected: empty. Then open `http://localhost:8000/en/` and confirm the two-chapter flow renders, Books and Consulting links work, no orphaned service images.

- [ ] **Step 9: Commit**

```bash
git add en/index.html
git commit -m "Reframe EN home: two-chapter (advise/write) + drop B2B trio

Co-Authored-By: Claude Opus 4.8 (1M context) <noreply@anthropic.com>"
```

### Task 13: Reframe the FR and AR home pages

**Files (modify):** `fr/index.html`, `ar/index.html`

- [ ] **Step 1: FR** — mirror Task 12 in French (hero reframe, student-only hero card, trust bar fix, Chapter One/Two, meta/OG). Reuse existing FR phrasing where possible; copy the FR compliance footnote verbatim.

- [ ] **Step 2: AR** — mirror Task 12 in Arabic, preserving RTL and `.lang-switch dir="ltr"`. Flag for native review (Task 16).

- [ ] **Step 3: Verify**

```bash
grep -ni "institution\|employer\|institutionnel\|employeur" fr/index.html ar/index.html
```
Expected: empty.

- [ ] **Step 4: Commit**

```bash
git add fr/index.html ar/index.html
git commit -m "Reframe FR + AR home pages: two-chapter + drop B2B trio

Co-Authored-By: Claude Opus 4.8 (1M context) <noreply@anthropic.com>"
```

---

## Phase 6 — About light touch + global cleanup

### Task 14: Add author/publishing acknowledgment to About (all 3 languages)

**Files (modify):** `en/about/index.html`, `fr/a-propos/index.html`, `ar/about/index.html`

- [ ] **Step 1: EN** — add a short block acknowledging Arva as a long-time educator and now author, and the publishing direction. Suggested paragraph:
`Alongside her consulting work, Arva is also writing — drawing on more than ten years of teaching children from the early years through middle school to create picture books and early readers for young new arrivals, and practical guides for students. You'll find this work on our Books page.`
Link "Books page" → `../books/index.html`.

- [ ] **Step 2: FR** — translate and add the same block; link to `../livres/index.html`.

- [ ] **Step 3: AR** — translate and add the same block (RTL); link to `../books/index.html`. Flag for native review (Task 16).

- [ ] **Step 4: Verify**

Open all three About pages; confirm the new block renders and the Books link resolves.

- [ ] **Step 5: Commit**

```bash
git add en/about/index.html fr/a-propos/index.html ar/about/index.html
git commit -m "About: acknowledge Arva as educator-author + link Books (EN/FR/AR)

Co-Authored-By: Claude Opus 4.8 (1M context) <noreply@anthropic.com>"
```

### Task 15: Global footer cleanup — drop trio language everywhere

**Files (modify):** all 18 pages' footers (`footer-desc` text)

- [ ] **Step 1: Rewrite the footer brand description**

The footer `footer-desc` currently reads "Student success and experiential learning advisory for students, institutions, and employers across Southern Ontario. Founded by Arva Ezzi, MEd (OISE, University of Toronto)." Rewrite to drop the trio and reflect both pillars, e.g.:
`Student success advisory and educational publishing — supporting students navigating Canadian academic life, and writing for young new arrivals. Founded by Arva Ezzi, MEd (OISE, University of Toronto).`
Apply the EN version to all EN pages; FR version to all FR pages; AR version to all AR pages (keep each language's existing compliance line beneath it).

- [ ] **Step 2: Final trio sweep across the whole site**

```bash
grep -rni "institutions, and employers\|institution\|employer\|employeur\|institutionnel" en fr ar | grep -vi "immigration"
```
Expected: empty (any remaining hit on the immigration-disclaimer line is acceptable; audience-trio language is not).

- [ ] **Step 3: Commit**

```bash
git add en fr ar
git commit -m "Footer: drop student-institution-employer trio, reflect two pillars

Co-Authored-By: Claude Opus 4.8 (1M context) <noreply@anthropic.com>"
```

---

## Phase 7 — Verification, Arabic review, changelog

### Task 16: Full-site link & consistency verification + Arabic review checklist

**Files:** none (verification) + create `docs/superpowers/specs/arabic-review-checklist.md`

- [ ] **Step 1: Stale-path + B2B sweeps (must all be empty)**

```bash
grep -rn "services/index.html\|/services/\|services-institution\|services-employer" en fr ar sitemap.xml
grep -rni "institution\|employer\|institutionnel\|employeur" en fr ar | grep -vi "immigration"
```

- [ ] **Step 2: Nav count check on all 18 pages**

```bash
for f in $(find en fr ar -name index.html); do echo "$f: $(grep -c 'class="nav-link' $f)"; done
```
Expected: consistent nav-link counts across all pages (6 nav items; the lang-switch adds its own — confirm the number matches a known-good page).

- [ ] **Step 3: Click-through every page locally**

With the server running, visit all 18 pages + use the redirect check: `curl -sI http://localhost:8000/en/services/` won't show the 301 locally (that's Cloudflare), so instead confirm `_redirects` syntax by inspection and that the new `/en/consulting/` etc. load.

- [ ] **Step 4: Write the Arabic review checklist**

Create `docs/superpowers/specs/arabic-review-checklist.md` listing every page with new/changed Arabic strings (ar/books, ar/consulting, ar/index, ar/about) and the note that a native speaker must verify before deploy (per spec §4 and the project's Arabic-mojibake history).

- [ ] **Step 5: Commit**

```bash
git add docs/superpowers/specs/arabic-review-checklist.md
git commit -m "Add Arabic native-review checklist for restructured pages

Co-Authored-By: Claude Opus 4.8 (1M context) <noreply@anthropic.com>"
```

### Task 17: Log the Change-History row (CHANGELOG + README)

**Files (modify):** `CHANGELOG.md`, `README.md`

- [ ] **Step 1: Add a CHANGELOG entry**

Add a dated entry under the appropriate version/section summarizing: two-pillar restructure (Consulting + Books), Services→Consulting rename with redirects, B2B dropped to student-only, new trilingual Books page, two-chapter home reframe, About light touch.

- [ ] **Step 2: Update the README "Recent Updates" table**

Per the project's established convention (README has a Recent Updates table), add a row pointing to this change.

- [ ] **Step 3: Commit**

```bash
git add CHANGELOG.md README.md
git commit -m "Log two-pillar restructure in CHANGELOG + README

Co-Authored-By: Claude Opus 4.8 (1M context) <noreply@anthropic.com>"
```

### Task 18: Open the PR

- [ ] **Step 1: Push the branch**

```bash
git push -u origin restructure/two-pillar-consulting-books
```

- [ ] **Step 2: Open a PR** (per the project's gh-CLI PR workflow) from `restructure/two-pillar-consulting-books` into `main`, summarizing the restructure and linking the spec. Note in the PR body that **Arabic strings await native review** (checklist file) before merge/deploy.

- [ ] **Step 3: Confirm** the Cloudflare Pages preview build (if PR previews are enabled) renders the new structure.

---

## Self-Review (completed)

**Spec coverage:** every spec section maps to tasks — nav (T7–9), consulting rename (T1–3), B2B drop (T10–13, T15), Books page (T4–6), home reframe (T12–13), About (T14), infra/sitemap/redirects (T2–3, T9), trilingual + Arabic review (T5–6, T11, T13, T14, T16), changelog (T17), PR per git policy (T18). No gaps.

**Placeholders:** new English copy is provided in full; FR/AR are explicit translation tasks referencing the EN source + verbatim-copy rules for the compliance footnote (intentional — translation is a craft step on this hand-maintained site, and inventing Arabic prose here would be lower-quality and unreviewable). No "TBD/handle edge cases" left.

**Consistency:** slugs (`consulting`/`conseil`, `books`/`livres`), the directory map, and lang-switch href targets are used identically across all tasks.
