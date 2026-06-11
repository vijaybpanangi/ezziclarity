# Soft Modern Redesign Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Modernize ezziclarity.ca to the approved "Soft Modern + serif accents" design (spec: `docs/superpowers/specs/2026-06-11-soft-modern-redesign-design.md`) — glass surfaces, gradient washes, floating pill header, Fraunces italic accents — with copy, pages, and URLs unchanged.

**Architecture:** One global `style.css` reworked in place section-by-section (the stylesheet's banner comments organize the work). HTML edits are small and mechanical: `<em>` accents in H1s, a `chapter-label` class, the home pages' two chapter sections merged into a side-by-side pair, the About founder block split into two columns, and a scroll-reveal JS snippet appended to each page's existing inline script. The stale "V8.5 REVAMP OVERRIDES" block (navy/teal look + broken mid-file `@import`) is **removed first** — the approved design supersedes it.

**Tech Stack:** Plain HTML + CSS (no build system), Google Fonts (`Plus Jakarta Sans` + `Fraunces` italic + `IBM Plex Sans Arabic`), vanilla JS IntersectionObserver, Cloudflare Pages deploy from `main` (work happens on branch `redesign/soft-modern`, PR at the end — merging is Vijay's call).

**Verification model:** No test framework exists (repo convention). Every task ends with a concrete visual/grep verification step against a local server. Run once at the start and keep running:

```bash
cd /home/vpanangipally/workshop/ezziclarity && python3 -m http.server 8000
```

**Repo root for all paths below:** `/home/vpanangipally/workshop/ezziclarity`

---

## Reference: page inventory (20 pages)

| Tree | Pages |
|---|---|
| Root | `index.html` (gateway), `404.html` |
| EN | `en/index.html`, `en/about/`, `en/consulting/`, `en/books/`, `en/resources/`, `en/contact/` |
| FR | `fr/index.html`, `fr/a-propos/`, `fr/conseil/`, `fr/livres/`, `fr/ressources/`, `fr/contact/` |
| AR (RTL) | `ar/index.html`, `ar/about/`, `ar/consulting/`, `ar/books/`, `ar/resources/`, `ar/contact/` |

Structural facts (verified by grep): trust bar exists **only** on the 3 home pages. Process steps exist **only** on the 3 consulting pages. Chapter sections exist **only** on the 3 home pages. Every page has the same inline mobile-nav `<script>` after the `.mobile-nav` div.

---

### Task 1: Branch + baseline screenshot sanity

**Files:** none modified.

- [ ] **Step 1: Confirm branch and clean tree**

Run: `git -C /home/vpanangipally/workshop/ezziclarity status --short --branch`
Expected: `## redesign/soft-modern` and no unstaged changes (the spec commit `1037b5b` is already on this branch).

- [ ] **Step 2: Start the preview server (leave running)**

Run: `cd /home/vpanangipally/workshop/ezziclarity && python3 -m http.server 8000` (background)
Expected: `Serving HTTP on 0.0.0.0 port 8000`. Open `http://localhost:8000/en/` — note the CURRENT look (navy/teal buttons, sand background) for before/after comparison.

---

### Task 2: Remove the V8.5 override layer, fix font loading

The stylesheet ends with a `V8.5 REVAMP OVERRIDES` section (navy/teal/coral palette, Sora font via an **invalid mid-file `@import`** that browsers ignore). The approved design supersedes it. Its one keeper — a proper Arabic font — moves to a valid top-of-file import and the RTL section (Task 8).

**Files:**
- Modify: `style.css:1-8` (imports) and `style.css:1470-1647` (delete section)

- [ ] **Step 1: Replace the single top `@import` (line 8) with three valid imports**

```css
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,600&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@1,9..144,400;1,9..144,600&display=swap');
@import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&display=swap');
```

- [ ] **Step 2: Delete the entire `V8.5 REVAMP OVERRIDES` section**

Delete from the line `/* =============================================\n   V8.5 REVAMP OVERRIDES\n   ============================================= */` (line ~1470) through end of file (line 1647). Nothing from it survives in place — the Arabic `font-family` rule is re-added properly in Task 8; the `riseIn` entrance animation is replaced by scroll reveals in Task 8.

- [ ] **Step 3: Verify**

Run: `grep -n 'Sora\|navy-900\|teal-500\|coral-400\|riseIn' style.css`
Expected: no output.
Visual: reload `http://localhost:8000/en/` — site reverts to the Sky/Peach/Cream baseline (sky-blue buttons, cream background, near-black footer).

- [ ] **Step 4: Commit**

```bash
git add style.css && git commit -m "Remove stale V8.5 navy/teal override layer; load Fraunces + IBM Plex Sans Arabic correctly"
```

---

### Task 3: Tokens, base scale, gradient wash, serif accent rules

**Files:**
- Modify: `style.css` — `ROOT TOKENS` section (~line 20), `BASE` section (~line 77), and the `TYPOGRAPHY POLISH` h1 rule (~line 1276)

- [ ] **Step 1: Add new tokens inside the existing `:root` block (after the Radii lines)**

```css
  /* Soft Modern additions (2026-06 redesign) */
  --font-serif:      'Fraunces', Georgia, serif;
  --font-arabic:     'IBM Plex Sans Arabic', 'Plus Jakarta Sans', sans-serif;
  --glass:           rgba(255,255,255,0.85);
  --glass-strong:    rgba(255,255,255,0.92);
  --glass-border:    rgba(227,221,208,0.8);
  --shadow-glass:    0 14px 34px -18px rgba(58,100,120,0.30);
  --shadow-glass-lg: 0 24px 56px -24px rgba(58,100,120,0.35);
  --r-xxl:           28px;
  --wash: linear-gradient(165deg, #FFFFFF 0%, var(--sky-xpale) 38%, #FFFFFF 68%, var(--peach-xpale) 100%);
```

Also in `:root`: change `--r-xl: 22px;` → `--r-xl: 24px;` and `--header-h: 68px;` → `--header-h: 88px;` (the floating pill needs drawer clearance, Task 4).

- [ ] **Step 2: In the `BASE` section — bump scale and apply the wash**

Change `html, body { ... font-size: 15px; ... background: var(--cream); }` to `font-size: 16px;` and `background: var(--wash);` plus add `background-color: #FFFFFF;` (fallback) on the same rule. Replace the heading-accent rule at ~line 110:

```css
/* Serif literary accent on italic spans inside headings */
h1 em, h2 em {
  font-family: var(--font-serif);
  font-style: italic;
  font-weight: 600;
  color: var(--sky-dark);
  letter-spacing: -0.01em;
}
```

- [ ] **Step 3: Add the two serif utility classes right after the `.eyebrow` rule (~line 123)**

```css
/* Serif chapter label — replaces uppercase eyebrow styling when paired */
.eyebrow.chapter-label {
  font-family: var(--font-serif);
  font-style: italic;
  font-weight: 400;
  font-size: 1.05rem;
  text-transform: none;
  letter-spacing: 0;
  color: var(--peach-mid);
}

/* Serif lead paragraph (Books page intro) */
.serif-lead {
  font-family: var(--font-serif);
  font-style: italic;
  font-size: 1.15rem;
  line-height: 1.7;
  color: var(--ink-mid);
}
```

- [ ] **Step 4: In `TYPOGRAPHY POLISH` (~line 1276), update the h1 rule to spec scale**

```css
h1 {
  font-size: clamp(2.6rem, 5vw, 3.6rem);
  letter-spacing: -0.045em;
  line-height: 1.04;
  max-width: 14ch;
}
```

(Was `clamp(2.4rem, 4.8vw, 3.35rem)` / `max-width: 11ch` — the wider `14ch` prevents awkward wraps at the larger size.)

- [ ] **Step 5: Verify + commit**

Visual: `http://localhost:8000/en/` — page background is a soft white→sky→peach diagonal wash; H1 noticeably larger; no `<em>` effects visible yet (markup comes in Task 9).
Run: `grep -c 'font-serif' style.css` → Expected: `4` or more.

```bash
git add style.css && git commit -m "Tokens, 16px base, gradient wash, serif accent rules"
```

---

### Task 4: Floating pill header

**Files:**
- Modify: `style.css` — `HEADER` section (~line 153) and `HAMBURGER + MOBILE NAV` section (~line 319)

- [ ] **Step 1: Replace `.site-header` and `.header-inner` rules**

```css
.site-header {
  position: sticky;
  top: 0.9rem;
  z-index: 100;
  height: auto;
  background: transparent;
  border-bottom: none;
  box-shadow: none;
  padding: 0 1rem;
}

.header-inner {
  display: flex;
  align-items: center;
  height: 60px;
  gap: 1rem;
  background: rgba(255,255,255,0.78);
  -webkit-backdrop-filter: blur(14px) saturate(1.4);
  backdrop-filter: blur(14px) saturate(1.4);
  border: 1px solid rgba(91,143,168,0.16);
  border-radius: var(--r-pill);
  box-shadow: 0 8px 28px -14px rgba(58,100,120,0.28);
  padding: 0 0.6rem 0 1.2rem;
}

/* Solid fallback when backdrop-filter is unsupported */
@supports not ((backdrop-filter: blur(1px)) or (-webkit-backdrop-filter: blur(1px))) {
  .header-inner { background: rgba(255,255,255,0.96); }
}
```

Note: `.header-inner` also carries `.container` (max-width 1140px centered) — that stays; the pill is the container itself.

- [ ] **Step 2: Round the header CTA into the pill language**

In the `.header-cta` rule change `border-radius: var(--r-md);` → `border-radius: var(--r-pill);`.

- [ ] **Step 3: Adjust the mobile drawer to clear the floating pill**

In `.mobile-nav` change `top: var(--header-h);` stays (token now 88px) and add `border-radius: 0 0 var(--r-lg) var(--r-lg); margin: 0 0.75rem;` to the same rule.

- [ ] **Step 4: Verify + commit**

Visual: desktop `http://localhost:8000/en/` — header floats detached from the top edge, frosted, fully rounded; scrolling keeps it pinned with content blurring underneath. Mobile width (≤900px): hamburger opens the drawer below the pill with rounded bottom corners; Escape closes it.

```bash
git add style.css && git commit -m "Floating frosted pill header with mobile drawer clearance"
```

---

### Task 5: Buttons, glass cards, gateway card

**Files:**
- Modify: `style.css` — `BUTTONS` (~line 392), `CARDS` (~line 654), `LANGUAGE GATEWAY` (~line 1043)

- [ ] **Step 1: Button radii + glass secondary**

In `.btn-primary, .btn-secondary, .btn` change `border-radius: var(--r-md);` → `border-radius: 14px;`. Replace `.btn-secondary`:

```css
.btn-secondary {
  background: rgba(255,255,255,0.7);
  color: var(--ink);
  border: 1px solid var(--glass-border);
  -webkit-backdrop-filter: blur(6px);
  backdrop-filter: blur(6px);
  box-shadow: var(--shadow-sm);
}
.btn-secondary:hover {
  background: rgba(255,255,255,0.95);
  border-color: var(--border-mid);
  transform: translateY(-1px);
  text-decoration: none;
  color: var(--ink);
}
```

- [ ] **Step 2: Glass card base**

In the shared rule `.card, .quote-card, .service-card, .contact-form, .timeline-item, .faq` change:
`background: var(--white);` → `background: var(--glass);`
`border: 1px solid var(--border);` → `border: 1px solid var(--glass-border);`
`border-radius: var(--r-lg);` → `border-radius: var(--r-xl);`
`box-shadow: var(--shadow-sm);` → `box-shadow: var(--shadow-glass);`

And in the hover rule change `box-shadow: var(--shadow-md);` → `box-shadow: var(--shadow-glass-lg);`.

- [ ] **Step 3: Gateway card joins the glass system**

In `.gateway-card` change `background: var(--white);` → `background: var(--glass-strong);`, `border: 1px solid var(--border);` → `border: 1px solid var(--glass-border);`, `border-radius: var(--r-xl);` → `border-radius: var(--r-xxl);`.

- [ ] **Step 4: Verify + commit**

Visual: `http://localhost:8000/en/consulting/` — service/FAQ cards read as soft translucent panels with bigger radii; secondary buttons look glassy. `http://localhost:8000/` — gateway card softer, rounder.

```bash
git add style.css && git commit -m "Glass treatment for buttons, cards, gateway"
```

---

### Task 6: Trust chips, hero atmosphere, page headers, image tints

**Files:**
- Modify: `style.css` — `HERO` (~line 462), `TRUST BAR` (~line 571), `SECTIONS` (~line 602), `IMAGE SYSTEM` (~line 1084)

- [ ] **Step 1: Trust bar → floating chips (CSS only, no markup change)**

Replace the `TRUST BAR` section rules:

```css
.trust-bar { background: transparent; padding: 1.5rem 0 0.5rem; }

.trust-bar-inner {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.6rem;
  flex-wrap: wrap;
}

.trust-item {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  font-size: 0.8rem;
  font-weight: 600;
  color: var(--sky-dark);
  white-space: nowrap;
  background: rgba(255,255,255,0.75);
  border: 1px solid var(--glass-border);
  border-radius: var(--r-pill);
  padding: 0.5rem 1.05rem;
  box-shadow: var(--shadow-sm);
}

.trust-item::before {
  content: '';
  width: 6px; height: 6px;
  border-radius: 50%;
  background: var(--peach);
  flex-shrink: 0;
}
```

- [ ] **Step 2: Hero — transparent over the wash, blob backdrop, glass panel**

In `.hero` change `background: var(--white);` → `background: transparent;` and delete the `border-bottom: 1px solid var(--border);` line. Add after the `.hero-panel` rule:

```css
.hero-panel { position: relative; }

.hero-panel::before {
  content: '';
  position: absolute;
  inset: -10% -8%;
  background:
    radial-gradient(circle at 35% 30%, rgba(168,212,230,0.50), transparent 58%),
    radial-gradient(circle at 72% 75%, rgba(242,168,130,0.38), transparent 55%);
  filter: blur(10px);
  border-radius: 50%;
  z-index: -1;
}
```

In `.hero-visual` change `border: 1px solid var(--sky-light);` → `border: 1px solid var(--glass-border);` and `box-shadow: var(--shadow-lg);` → `box-shadow: var(--shadow-glass-lg);`. In `.hero-card` change `background: var(--cream);` → `background: var(--glass);`, `border: 1px solid var(--border);` → `border: 1px solid var(--glass-border);`, `box-shadow: var(--shadow-sm);` → `box-shadow: var(--shadow-glass);`.

- [ ] **Step 3: Pill-style eyebrows in hero + page headers (CSS only)**

Add at the end of the `SECTIONS` section:

```css
/* Chip-style eyebrows in page-opening positions */
.hero .eyebrow,
.page-header .eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  background: var(--sky-pale);
  color: var(--sky-dark);
  padding: 0.45rem 0.95rem;
  border-radius: var(--r-pill);
  font-size: 0.72rem;
}

.hero .eyebrow::before,
.page-header .eyebrow::before {
  content: '';
  width: 7px; height: 7px;
  border-radius: 50%;
  background: var(--peach);
}
```

And update `.page-header`: `background: var(--white);` → `background: rgba(255,255,255,0.55);`, `border-bottom: 1px solid var(--border);` → `border-bottom: 1px solid rgba(227,221,208,0.6);`. Update `.section-alt`: `background: var(--white);` → `background: rgba(255,255,255,0.55);`.

- [ ] **Step 4: Palette-tint overlay on every framed image (CSS only, no wrappers)**

Add at the end of the `IMAGE SYSTEM` section:

```css
/* Brand-tint wash over framed imagery (multiply pulls any PNG into the palette) */
.hero-visual, .section-visual, .service-card-img,
.contact-photo-card, .founder-photo-card { position: relative; }

.hero-visual::after, .section-visual::after, .service-card-img::after,
.contact-photo-card::after, .founder-photo-card::after {
  content: '';
  position: absolute;
  inset: 0;
  border-radius: inherit;
  background: linear-gradient(140deg, rgba(91,143,168,0.16), rgba(232,131,90,0.09));
  mix-blend-mode: multiply;
  pointer-events: none;
}
```

- [ ] **Step 5: Verify + commit**

Visual: `http://localhost:8000/en/` — trust band is now a row of chips (no solid blue bar); hero floats on the wash with a soft blob glow behind the illustration; eyebrow renders as a chip; every illustration has a subtle blue-peach tint. Check `en/resources/` for tinted card images.

```bash
git add style.css && git commit -m "Trust chips, hero blob atmosphere, chip eyebrows, image tint overlays"
```

---

### Task 7: CTA panel, chapter pair, process timeline, About columns

**Files:**
- Modify: `style.css` — `SECTION CTA BANNER` (~line 897), `PROCESS STEPS` (~line 850), plus new rules; delete dead `.page-*-about .grid-2` tuning rules (~lines 1247-1248)

- [ ] **Step 1: CTA → inset gradient panel (no markup change — `.container` wraps `.section-cta-inner` already)**

Replace the `SECTION CTA BANNER` section's first two rules:

```css
.section-cta { padding: 2.5rem 0 4rem; background: transparent; }

.section-cta-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 2.5rem;
  background: linear-gradient(120deg, var(--sky-dark) 0%, var(--sky) 62%, #6E9FB5 100%);
  border-radius: var(--r-xxl);
  padding: 2.75rem 3rem;
  box-shadow: var(--shadow-glass-lg);
  position: relative;
  overflow: hidden;
}

.section-cta-inner::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(circle at 85% 18%, rgba(242,168,130,0.35), transparent 45%);
  pointer-events: none;
}
```

(The existing `.section-cta .eyebrow`, h2/p color rules, and white `.btn-primary` rules below stay unchanged.)

- [ ] **Step 2: New chapter-pair component (used by home pages in Tasks 9-11)**

Add a new banner section after `CARDS`:

```css
/* =============================================
   CHAPTER PAIR (home: We advise / We write)
   ============================================= */
.chapter-pair {
  display: grid;
  grid-template-columns: repeat(2, minmax(0,1fr));
  gap: 1.25rem;
}

.chapter-card {
  background: var(--glass);
  border: 1px solid var(--glass-border);
  border-radius: var(--r-xl);
  padding: 2.1rem 2.2rem;
  box-shadow: var(--shadow-glass);
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  transition: transform 0.24s var(--ease-smooth), box-shadow 0.24s var(--ease-smooth);
}

.chapter-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-glass-lg); }

.chapter-card h2 { font-size: clamp(1.5rem, 2.4vw, 1.9rem); margin-bottom: 0.5em; }
.chapter-card .checklist { margin-bottom: 1.25rem; }
.chapter-card .btn-secondary { margin-top: auto; }

@media (max-width: 900px) {
  .chapter-pair { grid-template-columns: 1fr; }
}
```

- [ ] **Step 3: Process → vertical timeline**

In `PROCESS STEPS`: change `.process-two-column { grid-template-columns: repeat(2, minmax(0,1fr)); }` → `.process-two-column { grid-template-columns: 1fr; max-width: 720px; }` and `.process-step` `border-radius: var(--r-lg)` → `border-radius: 20px`, `background: var(--white)` → `background: var(--glass)`. Add:

```css
/* Timeline connector between steps (desktop) */
@media (min-width: 901px) {
  .process { gap: 0.9rem; }
  .process-step { position: relative; }
  .process-step::after {
    content: '';
    position: absolute;
    left: 2.5rem;
    top: 100%;
    height: 0.9rem;
    width: 2px;
    background: var(--sky-light);
  }
  .process-step:last-child::after { display: none; }
}
```

- [ ] **Step 4: About two-column layout (used by about pages in Tasks 9-11)**

Add after the chapter-pair section. Also DELETE the two dead rules `.page-en-about .grid-2, ...` and `.page-en-about .grid-2 > div:last-child, ...` near line 1247 (no about page uses `.grid-2` today).

```css
/* =============================================
   ABOUT — story / founder columns
   ============================================= */
.about-story-grid {
  display: grid;
  grid-template-columns: 1.05fr 0.95fr;
  gap: 1.5rem;
  align-items: start;
}

.about-col {
  background: var(--glass);
  border: 1px solid var(--glass-border);
  border-radius: var(--r-xl);
  padding: 2.1rem 2.2rem;
  box-shadow: var(--shadow-glass);
}

.founder-frame {
  aspect-ratio: 4 / 3;
  border-radius: 18px;
  margin-bottom: 1.5rem;
  background:
    radial-gradient(circle at 70% 25%, rgba(242,168,130,0.55), transparent 52%),
    linear-gradient(140deg, var(--sky-light), var(--sky));
  position: relative;
  overflow: hidden;
}

.founder-frame img {
  width: 100%; height: 100%;
  object-fit: cover;
  border-radius: inherit;
  box-shadow: none;
}

@media (max-width: 900px) {
  .about-story-grid { grid-template-columns: 1fr; }
}
```

- [ ] **Step 5: Verify + commit**

Visual: `http://localhost:8000/en/` CTA renders as a rounded inset gradient panel with a peach glow corner. `en/consulting/` process steps stack as a single connected timeline column. (Chapter pair and About columns render after markup Tasks 9-11.)
Run: `grep -c 'page-en-about .grid-2' style.css` → Expected: `0`.

```bash
git add style.css && git commit -m "Inset gradient CTA panel, chapter-pair + about-column components, process timeline"
```

---

### Task 8: Motion (scroll reveals), RTL extensions, reduced-motion

**Files:**
- Modify: `style.css` — `RTL SUPPORT` section (~line 1154) and new `MOTION` section at end of file

- [ ] **Step 1: Append a `MOTION` banner section at the end of `style.css`**

```css
/* =============================================
   MOTION — scroll reveals (JS adds .reveal)
   ============================================= */
@media (prefers-reduced-motion: no-preference) {
  .reveal {
    opacity: 0;
    transform: translateY(18px);
    transition: opacity 0.65s var(--ease-smooth), transform 0.65s var(--ease-smooth);
  }
  .reveal.is-visible { opacity: 1; transform: translateY(0); }
}

@media (prefers-reduced-motion: reduce) {
  html { scroll-behavior: auto; }
  .card:hover, .service-card:hover, .quote-card:hover,
  .process-step:hover, .faq:hover, .chapter-card:hover,
  .btn-primary:hover, .btn-secondary:hover, .header-cta:hover,
  .mobile-cta:hover, .nav-link:hover { transform: none; }
}
```

(The `.reveal` class is added only by JS — pages render fully without JS.)

- [ ] **Step 2: Extend the `RTL SUPPORT` section**

Append inside that section:

```css
/* 2026-06 Soft Modern additions */
html[lang="ar"] body { font-family: var(--font-arabic); }
html[lang="ar"] h1, html[lang="ar"] h2,
html[lang="ar"] h3, html[lang="ar"] h4 { letter-spacing: 0; font-family: var(--font-arabic); }
html[lang="ar"] h1 { max-width: none; }

/* Arabic has no italic-serif equivalent — accent via colour only */
html[lang="ar"] h1 em, html[lang="ar"] h2 em {
  font-family: inherit; font-style: normal; font-weight: 800; color: var(--sky-dark);
}
html[lang="ar"] .eyebrow.chapter-label { font-family: inherit; font-style: normal; font-weight: 700; font-size: 0.95rem; }
html[lang="ar"] .serif-lead { font-family: inherit; font-style: normal; }

html[dir="rtl"] .process-step::after { left: auto; right: 2.5rem; }
html[dir="rtl"] .chapter-card,
html[dir="rtl"] .about-col { text-align: right; }
```

- [ ] **Step 3: Verify + commit**

Run: `grep -c 'prefers-reduced-motion' style.css` → Expected: `2`.
Visual: `http://localhost:8000/ar/` — Arabic renders in IBM Plex Sans Arabic (letterforms visibly differ from before), no negative letter-spacing artifacts.

```bash
git add style.css && git commit -m "Scroll-reveal motion gated by prefers-reduced-motion; RTL + Arabic font extensions"
```

---

### Task 9: EN markup (6 pages)

**Files:**
- Modify: `en/index.html`, `en/about/index.html`, `en/consulting/index.html`, `en/books/index.html`, `en/resources/index.html`, `en/contact/index.html`

- [ ] **Step 1: H1 serif accents — wrap the closing phrase of each H1 in `<em>` (copy unchanged)**

| File | New H1 inner HTML |
|---|---|
| `en/index.html` | `Finding your footing in a <em>new place.</em>` |
| `en/about/index.html` | `A clear, structured approach to student success and <em>experiential learning.</em>` |
| `en/consulting/index.html` | `Practical support.<br><em>Clear direction.</em>` |
| `en/books/index.html` | `Stories and guides<br>for <em>finding your way.</em>` |
| `en/resources/index.html` | `Practical insights for<br><em>real decisions.</em>` |
| `en/contact/index.html` | `Start with a<br><em>clear conversation.</em>` |

- [ ] **Step 2: `en/index.html` — merge the two chapter sections into a chapter pair**

Replace the two sections (`<!-- ── CHAPTER ONE: WE ADVISE ───────────────── -->` through the close of the `CHAPTER TWO` section, currently lines ~181-212) with:

```html
  <!-- ── CHAPTERS: WE ADVISE / WE WRITE ───────── -->
  <section class="section">
    <div class="container">
      <div class="chapter-pair">
        <div class="chapter-card">
          <p class="eyebrow chapter-label">Chapter one</p>
          <h2>We advise</h2>
          <p>Most of our consulting is one-on-one with students. We help you make sense of what's expected, build skills you'll actually use, and feel steadier about the decisions in front of you.</p>
          <ul class="checklist">
            <li>Academic and career transition coaching</li>
            <li>Professional communication workshops</li>
            <li>Study strategy and learning skills</li>
          </ul>
          <a href="consulting/index.html" class="btn-secondary">Explore consulting</a>
        </div>
        <div class="chapter-card">
          <p class="eyebrow chapter-label">Chapter two</p>
          <h2>We write</h2>
          <p>We're also writing books. The first is a series of children's picture books and early readers about kids from immigrant families settling into a new country, drawn from more than ten years of teaching that age group. Alongside them, we're working on plain-language guides for students. The first titles are still in development.</p>
          <a href="books/index.html" class="btn-secondary">Visit the Books page</a>
        </div>
      </div>
    </div>
  </section>
```

- [ ] **Step 3: `en/books/index.html` — serif lead**

In the `page-header` section, add the class to the intro paragraph: `<p>` → `<p class="serif-lead">` (the paragraph beginning "Ezzi Clarity is beginning to write as well as advise…"). Text unchanged.

Note (spec trace, no edit needed): the page's "Coming soon / In development" entries are `.card.card--accent` articles — they get the glass skin automatically (Task 5), and when real cover art exists it slots in as a `.service-card-img` image block with the tint overlay (Task 6) without any redesign. That satisfies the spec's "placeholder designed to later hold real cover art".

- [ ] **Step 4: `en/about/index.html` — split the founder card into two columns**

Replace `<div class="about-founder-card">` … `</div>` (the single long card, lines ~115-163) with two columns inside a grid. **All inner copy is carried over verbatim** — only the wrapper structure changes:

```html
      <div class="about-story-grid">
        <div class="about-col">
          <p class="eyebrow">Our Story</p>
          <h2>Why Ezzi Clarity Exists</h2>
          [the four "Our Story" paragraphs, verbatim]
        </div>
        <div class="about-col">
          <div class="founder-frame" aria-hidden="true"></div>
          <p class="eyebrow">Our Founder</p>
          <h2>Arva Ezzi, MEd</h2>
          [the five "Our Founder" paragraphs, verbatim, including the Books-page link]
          <div class="about-founder-divider"></div>
          <p class="eyebrow">Language Capability</p>
          <h2>Multilingual, with depth and cultural fluency</h2>
          [the two language paragraphs, verbatim]
          <div style="margin-top:1.25rem;">
            <a href="../contact/index.html" class="btn-primary">Get in Touch</a>
          </div>
        </div>
      </div>
```

(The `.founder-frame` ships empty per spec — a gradient placeholder. Optional opt-in: `<img class="founder-photo" src="../../assets/images/arva-portrait.png" alt="Arva Ezzi">` inside it — ask Vijay at review.)

- [ ] **Step 5: All 6 EN pages — append the reveal script**

Inside each page's existing inline `<script>` (after the mobile-nav IIFE's closing `})();`), append:

```js
document.addEventListener('DOMContentLoaded', function(){
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
  if (!('IntersectionObserver' in window)) return;
  var io = new IntersectionObserver(function(entries){
    entries.forEach(function(en){
      if (en.isIntersecting) { en.target.classList.add('is-visible'); io.unobserve(en.target); }
    });
  }, { rootMargin: '0px 0px -8% 0px' });
  document.querySelectorAll('.section > .container, .section-alt > .container, .section-cta-inner, .trust-bar-inner').forEach(function(el){
    el.classList.add('reveal'); io.observe(el);
  });
});
```

- [ ] **Step 6: Verify + commit**

Visual pass over all 6 EN pages at `http://localhost:8000/en/…`: serif italic accents in every H1; home shows the side-by-side chapter cards with italic serif "Chapter one/two"; Books intro is serif; About is two columns with gradient founder frame; sections fade up on scroll; with DevTools "Emulate prefers-reduced-motion: reduce" nothing animates and all content is visible.
Run: `grep -l 'chapter-pair' en/index.html && grep -l 'serif-lead' en/books/index.html && grep -l 'about-story-grid' en/about/index.html && grep -lc 'IntersectionObserver' en/index.html en/about/index.html en/consulting/index.html en/books/index.html en/resources/index.html en/contact/index.html`
Expected: every file listed.

```bash
git add en/ && git commit -m "EN: serif H1 accents, chapter pair, serif lead, about columns, scroll reveals"
```

---

### Task 10: FR markup (6 pages)

**Files:**
- Modify: `fr/index.html`, `fr/a-propos/index.html`, `fr/conseil/index.html`, `fr/livres/index.html`, `fr/ressources/index.html`, `fr/contact/index.html`

- [ ] **Step 1: H1 serif accents**

| File | New H1 inner HTML |
|---|---|
| `fr/index.html` | `Trouver ses repères dans un <em>nouvel endroit.</em>` |
| `fr/a-propos/index.html` | `Une approche claire et structurée pour aider les étudiants à <em>réussir.</em>` |
| `fr/conseil/index.html` | `Un accompagnement concret.<br><em>Une direction claire.</em>` |
| `fr/livres/index.html` | `Des histoires et des guides<br>pour <em>trouver votre voie.</em>` |
| `fr/ressources/index.html` | `Des perspectives concrètes pour<br><em>des décisions éclairées.</em>` |
| `fr/contact/index.html` | `Commencez par une<br><em>conversation claire.</em>` |

- [ ] **Step 2: `fr/index.html` — chapter pair (copy verbatim from the existing two sections)**

Same structure as Task 9 Step 2, with the FR content:

```html
  <section class="section">
    <div class="container">
      <div class="chapter-pair">
        <div class="chapter-card">
          <p class="eyebrow chapter-label">Chapitre un</p>
          <h2>Nous accompagnons</h2>
          <p>La grande majorité de notre travail de conseil se fait en individuel avec des étudiants. Nous vous aidons à comprendre ce qu'on attend de vous, à développer des compétences que vous utiliserez vraiment, et à vous sentir plus solide face aux décisions qui s'offrent à vous.</p>
          <ul class="checklist">
            <li>Coaching de transition académique et professionnelle</li>
            <li>Ateliers de communication professionnelle</li>
            <li>Stratégies d'étude et compétences d'apprentissage</li>
          </ul>
          <a href="conseil/index.html" class="btn-secondary">Explorer le conseil</a>
        </div>
        <div class="chapter-card">
          <p class="eyebrow chapter-label">Chapitre deux</p>
          <h2>Nous écrivons</h2>
          <p>Nous écrivons aussi des livres. Le premier volet est une série d'albums illustrés et de premières lectures sur des enfants de familles immigrantes qui s'installent dans un nouveau pays, inspirée de plus de dix ans d'enseignement auprès de ce groupe d'âge. En parallèle, nous travaillons sur des guides en langage simple pour les étudiants. Les premiers titres sont encore en développement.</p>
          <a href="livres/index.html" class="btn-secondary">Voir la page Livres</a>
        </div>
      </div>
    </div>
  </section>
```

- [ ] **Step 3: `fr/livres/index.html` — add `class="serif-lead"` to the page-header intro paragraph (text unchanged). `fr/a-propos/index.html` — apply the same two-column split as Task 9 Step 4, carrying all FR copy verbatim into `.about-story-grid` / `.about-col` / `.founder-frame` structure.**

- [ ] **Step 4: All 6 FR pages — append the same reveal script as Task 9 Step 5 (identical JS).**

- [ ] **Step 5: Verify + commit**

Visual pass over all 6 FR pages; same checks as EN.
Run: `grep -lc 'IntersectionObserver' fr/index.html fr/a-propos/index.html fr/conseil/index.html fr/livres/index.html fr/ressources/index.html fr/contact/index.html` → all listed.

```bash
git add fr/ && git commit -m "FR: serif H1 accents, chapter pair, serif lead, about columns, scroll reveals"
```

---

### Task 11: AR markup (6 pages, RTL)

**Files:**
- Modify: `ar/index.html`, `ar/about/index.html`, `ar/consulting/index.html`, `ar/books/index.html`, `ar/resources/index.html`, `ar/contact/index.html`

Reminder: in AR pages `em` renders as a **colour accent only** (Task 8 CSS) — adding `<em>` is still correct markup.

- [ ] **Step 1: H1 accents**

| File | New H1 inner HTML |
|---|---|
| `ar/index.html` | `اكتشاف طريقك في <em>مكان جديد.</em>` |
| `ar/about/index.html` | `نهج واضح ومنظّم لنجاح الطلاب في <em>الحياة الأكاديمية.</em>` |
| `ar/consulting/index.html` | `دعم عملي.<br><em>اتجاه واضح.</em>` |
| `ar/books/index.html` | `قصص وأدلة<br><em>لإيجاد طريقك.</em>` |
| `ar/resources/index.html` | `رؤى عملية من أجل<br><em>قرارات واقعية.</em>` |
| `ar/contact/index.html` | `ابدأ بـ<br><em>محادثة واضحة.</em>` |

- [ ] **Step 2: `ar/index.html` — chapter pair (copy verbatim, currently at lines ~181-213)**

```html
  <section class="section">
    <div class="container">
      <div class="chapter-pair">
        <div class="chapter-card">
          <p class="eyebrow chapter-label">الفصل الأول</p>
          <h2>ننصح</h2>
          <p>معظم استشاراتنا تكون فردية مع الطلاب. نساعدك على فهم ما هو متوقع منك، وبناء مهارات ستستخدمها فعلاً، والشعور بثبات أكبر أمام القرارات التي تواجهك.</p>
          <ul class="checklist">
            <li>توجيه الانتقال الأكاديمي والمهني</li>
            <li>ورش التواصل الاحترافي</li>
            <li>استراتيجيات الدراسة ومهارات التعلّم</li>
          </ul>
          <a href="consulting/index.html" class="btn-secondary">اكتشف الاستشارات</a>
        </div>
        <div class="chapter-card">
          <p class="eyebrow chapter-label">الفصل الثاني</p>
          <h2>نكتب</h2>
          <p>نحن نكتب كتبًا أيضًا. الأول سلسلة من كتب الصور والقراءات المبكّرة للأطفال عن صغار من عائلات مهاجرة يجدون موطئ قدم في بلد جديد، مستوحاة من أكثر من عشر سنوات من التدريس لتلك الفئة العمرية. إلى جانبها، نعمل على أدلة بلغة واضحة للطلاب. العناوين الأولى لا تزال قيد التطوير.</p>
          <a href="books/index.html" class="btn-secondary">تصفّح صفحة الكتب</a>
        </div>
      </div>
    </div>
  </section>
```

- [ ] **Step 3: `ar/books/index.html` — `class="serif-lead"` on the page-header intro paragraph. `ar/about/index.html` — same two-column split as Task 9 Step 4, AR copy verbatim.**

- [ ] **Step 4: All 6 AR pages — append the same reveal script (identical JS).**

- [ ] **Step 5: Verify + commit**

Visual pass over all 6 AR pages: layout right-aligned; chapter cards right-aligned with chips/bullets on the right; `em` phrases render bold + sky-dark (NOT italic serif); header pill still LTR; tel/email links still LTR; Arabic renders in IBM Plex Sans Arabic.

```bash
git add ar/ && git commit -m "AR: colour H1 accents, chapter pair, about columns, scroll reveals (RTL-checked)"
```

---

### Task 12: Full verification matrix + fixes

**Files:** possible small fixes to `style.css` / HTML from findings.

- [ ] **Step 1: Run the matrix.** For each of the 20 pages (inventory table above) check at 375px, 768px, 1280px widths:
  - Pill header floats, doesn't overlap content; mobile drawer opens below it.
  - No horizontal scrollbar at any width.
  - Glass cards readable (contrast) over the wash.
  - Images tinted; no broken layout from `::after` overlays.
  - Footer renders (unchanged near-black).
- [ ] **Step 2: DevTools → Rendering → Emulate `prefers-reduced-motion: reduce`** on `en/`, `fr/`, `ar/` home: zero animation, all sections visible immediately.
- [ ] **Step 3: Fallback probe** — in DevTools, toggle off `backdrop-filter` on `.header-inner` (or test in a browser without support): header pill shows a near-solid white background, still legible.
- [ ] **Step 4: Fix anything found, then commit**

```bash
git add -A && git commit -m "Verification pass fixes (viewports, RTL, reduced-motion, fallbacks)"
```

---

### Task 13: Docs, push, PR

**Files:**
- Modify: `CHANGELOG.md`, `README.md`, `CLAUDE.md`

- [ ] **Step 1: `CHANGELOG.md`** — add a dated `2026-06-11` section at the top describing: Soft Modern redesign (direction chosen via visual-companion brainstorm), V8.5 override layer removed (incl. the invalid mid-file `@import` bug), Fraunces + IBM Plex Sans Arabic added, component-by-component summary, spec/plan paths.
- [ ] **Step 2: `README.md`** — add a Recent Updates row: `| 2026-06-11 | Design | Soft Modern redesign — glass surfaces, gradient wash, floating pill header, Fraunces serif accents; spec + plan in docs/superpowers/ |`. Update the Styling notes section (16px base, glass tokens, Fraunces accent, IBM Plex Sans Arabic).
- [ ] **Step 3: `CLAUDE.md`** — fix the stale parts while there: six pages per language (home, about, consulting, books, resources, contact; FR slugs `a-propos`, `conseil`, `livres`, `ressources`), updated stylesheet description (tokens incl. glass/serif vars, three font families, motion section, ~line count), note that the reveal JS lives in each page's inline script.
- [ ] **Step 4: Push branch + open PR (merge is Vijay's call)**

```bash
git add CHANGELOG.md README.md CLAUDE.md && git commit -m "Docs: log Soft Modern redesign in CHANGELOG/README; refresh CLAUDE.md"
git push -u origin redesign/soft-modern
gh pr create --title "Soft Modern redesign: glass + gradient wash + serif accents" --body "$(cat <<'EOF'
## Summary
- Implements the approved Soft Modern design (spec: docs/superpowers/specs/2026-06-11-soft-modern-redesign-design.md)
- Removes the stale V8.5 navy/teal override layer (incl. an invalid mid-file @import that never loaded Sora)
- Floating frosted pill header, glass cards, gradient page wash, trust chips, inset gradient CTA
- Fraunces italic serif accents (Latin pages); IBM Plex Sans Arabic properly loaded for AR
- Home chapter sections recomposed into a side-by-side pair; About split into story/founder columns
- Scroll reveals gated behind prefers-reduced-motion
- Copy, pages, and URLs unchanged; EN/FR/AR updated in the same pass

## Verification
- 20 pages x 3 viewports visually checked; AR RTL pass; reduced-motion pass; backdrop-filter fallback pass

🤖 Generated with [Claude Code](https://claude.com/claude-code)
EOF
)"
```

Expected: PR URL printed. Cloudflare Pages will build a preview for the branch (visible in the Pages dashboard) — share the preview URL with Vijay for sign-off before merge.

---

## Plan self-review notes

- **Spec coverage:** typography (T3), color redistribution (T3/T6), header (T4), buttons/cards (T5), trust chips (T6), imagery tint (T6), CTA panel (T7), chapter pair (T7/T9-11), About columns (T7/T9-11), consulting timeline (T7), Books serif lead (T9-11), motion + reduced-motion (T8/T9-11), RTL/Arabic (T8/T11), degradation (T4/T8/T12), verification (each task + T12), out-of-scope respected (no copy/URL changes). The spec's "founder portrait opt-in" is surfaced at Task 9 Step 4 for Vijay's decision at review.
- **Discovery handled:** the V8.5 override layer (not mentioned in CLAUDE.md) is removed in Task 2 with its Arabic-font idea preserved properly.
- **Type consistency:** class names used in HTML tasks (`chapter-pair`, `chapter-card`, `chapter-label`, `serif-lead`, `about-story-grid`, `about-col`, `founder-frame`, `reveal`, `is-visible`) are all defined in CSS tasks 3/7/8.
- **Verbatim-move convention:** Tasks 9-11 instruct moving existing translated copy into new wrappers rather than reprinting every paragraph (15+ paragraphs × 3 languages). This is deliberate: the copy already lives in the file being edited, and a cut-and-paste move is safer than retyping (zero transcription risk, especially for Arabic). The bracketed notes name exactly which paragraphs move where.
