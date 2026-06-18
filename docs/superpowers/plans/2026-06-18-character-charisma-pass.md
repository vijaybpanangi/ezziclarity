# Character & Charisma Pass — Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Add a CSS-only motion + micro-interaction layer ("character & charisma") to ezziclarity.ca — signature drawn swash, living background, tactile cards/buttons, staggered hero entrance, animated checklist ticks, and a logo touch.

**Architecture:** Every change lives in the single `style.css`. New continuous motion is authored inside `@media (prefers-reduced-motion: no-preference)`; the `reduce` neutralisations extend the existing `/* MOTION */` block. The pass rides existing hooks — `h1 em`/`h2 em` accents, `.checklist li::before`, the `.brand-logo` `<img>`, and the per-page scroll-reveal observer that adds `.is-visible`. **No HTML files are edited**, so the change reaches `/en/`, `/fr/`, and `/ar/` at once.

**Tech Stack:** Plain CSS (no build, no bundler, no test framework). Verification is structural (`grep`) + visual (local `python3 -m http.server`), checked in all three languages, under RTL (`/ar/`), and with reduced-motion forced.

## Global Constraints

- **CSS-only.** No HTML/copy/page/URL/IA changes; `sitemap.xml` / `_redirects` untouched. Edits confined to `style.css` (+ governance docs in the release task).
- **Reduced-motion is the master switch.** Every continuous/entrance animation is applied only inside `@media (prefers-reduced-motion: no-preference)`, or neutralised in `@media (prefers-reduced-motion: reduce)`. Default (un-animated) state of every element MUST be fully visible and legible — never hidden-until-animated.
- **Trilingual + RTL.** Site is `en`/`fr` (LTR) and `ar` (`dir="rtl"`). New directional motion (swash stroke + wipe, logo tilt) mirrors under `html[dir="rtl"]`; directional offsets use logical properties.
- **GPU-cheap only.** Animate `transform` / `opacity` (and `clip-path` for the swash wipe). No animated `filter`, `background-position`, or layout properties.
- **Compose, don't duplicate.** Several target rules already exist — `.card:hover` (line ~821), `.chapter-card:hover` (~884), `img:hover` + `.brand-logo:hover` neutraliser (~1496–1499), `html[dir="rtl"] img { transform: none }` (~1601), checklist RTL overrides (~1594–1595), and the `reduce` block (~1923–1929). Modify those in place or place new rules later in the file so source order wins.
- **Brand:** Sky `#5B8FA8` / Peach `#E8835A` palette; tokens `--ease-smooth: cubic-bezier(.22,.61,.36,1)` already defined (~line 1698). Keep motion small, slow, reversible.
- **Release:** `v3.6.0` (minor). Ship via squash-merge PR as `vijaybpanangi` + annotated tag + CHANGELOG/README/CLAUDE updates.

---

### Task 1: Tokens, keyframes & section scaffolding

**Files:**
- Modify: `style.css` — add `--ease-back` near `--ease-smooth` (~line 1698); append a new `/* CHARACTER & CHARISMA */` section at end of file (~line 1929, after the MOTION block).

**Interfaces:**
- Produces: token `--ease-back`; top-level keyframes `heroRise`, `bgDrift`, `bgDriftAlt`, `logoSettle`, `swashDraw`, `swashDrawRtl`, `tickPop` (consumed by Tasks 2–7). Keyframes are defined unconditionally (inert until referenced); only their *application* is gated.

- [ ] **Step 1: Add the easing token**

Find the existing `--ease-smooth` declaration (~line 1698) and add `--ease-back` immediately after it:

```css
  --ease-smooth: cubic-bezier(.22,.61,.36,1);
  --ease-back:   cubic-bezier(.34,1.56,.64,1); /* gentle overshoot for playful pops */
```

- [ ] **Step 2: Append the new section banner + keyframes at the end of the file**

After the final `}` of the existing `@media (prefers-reduced-motion: reduce)` block (~line 1929), append:

```css

/* =============================================
   CHARACTER & CHARISMA (v3.6.0)
   Ambient + entrance motion and micro-interactions.
   Keyframes are defined here unconditionally; every
   *application* of them is gated behind
   prefers-reduced-motion: no-preference (below and in
   the per-feature blocks), and neutralised in the
   MOTION reduce block above. Default states are always
   fully visible so reduced-motion users lose nothing.
   ============================================= */
@keyframes heroRise {
  from { opacity: 0; transform: translateY(16px); }
  to   { opacity: 1; transform: translateY(0); }
}
@keyframes bgDrift {
  from { transform: translate3d(0, 0, 0) scale(1); }
  to   { transform: translate3d(-3%, 2%, 0) scale(1.08); }
}
@keyframes bgDriftAlt {
  from { transform: translate3d(0, 0, 0) scale(1.06); opacity: 0.9; }
  to   { transform: translate3d(2.5%, -2%, 0) scale(1); opacity: 1; }
}
@keyframes logoSettle {
  from { opacity: 0; transform: translateY(-4px) rotate(-6deg) scale(0.92); }
  to   { opacity: 1; transform: translateY(0) rotate(0) scale(1); }
}
@keyframes swashDraw    { from { clip-path: inset(0 100% 0 0); } to { clip-path: inset(0 0 0 0); } }
@keyframes swashDrawRtl { from { clip-path: inset(0 0 0 100%); } to { clip-path: inset(0 0 0 0); } }
@keyframes tickPop      { from { transform: rotate(45deg) scale(0); } to { transform: rotate(45deg) scale(1); } }
```

- [ ] **Step 3: Verify it parses well-formed**

Run:
```bash
cd /home/vpanangipally/workshop/ezziclarity
grep -n '\-\-ease-back\|@keyframes \(heroRise\|bgDrift\|logoSettle\|swashDraw\|tickPop\)' style.css
# Balanced braces sanity check (count should match):
echo "open:  $(grep -o '{' style.css | wc -l)"; echo "close: $(grep -o '}' style.css | wc -l)"
python3 -m http.server 8000 >/dev/null 2>&1 &  # then open http://localhost:8000/en/ and confirm the page still renders normally
```
Expected: the token + all 7 keyframes are found; open/close brace counts are equal; the site still renders (no visual change yet — keyframes are inert until applied).

- [ ] **Step 4: Commit**

```bash
git add style.css
git commit -m "feat(motion): add --ease-back token + character/charisma keyframes (scaffold)"
```

---

### Task 2: Living background

**Files:**
- Modify: `style.css` — the `body` background rule (~lines 102–114); add `body::before`/`body::after` layers + their gated animation in the CHARACTER section.

**Interfaces:**
- Consumes: `bgDrift`, `bgDriftAlt`, `--ease-smooth`.
- Produces: two fixed colour-pool layers behind all content.

- [ ] **Step 1: Move the colour pools off `body` onto fixed layers**

Replace the existing `body { … }` background block (currently three radial-gradients + `--wash`, `background-attachment: fixed`) with just the base wash:

```css
body {
  background-color: #FFFFFF;
  background: var(--wash);
  background-attachment: fixed;
  overflow-x: hidden;
  overflow-x: clip;
}
```

- [ ] **Step 2: Add the drifting pool layers in the CHARACTER section**

Append to the CHARACTER section:

```css
/* --- Living background: colour pools drift on fixed layers behind content --- */
body::before,
body::after {
  content: '';
  position: fixed;
  inset: 0;
  z-index: -1;
  pointer-events: none;
}
body::before {
  background:
    radial-gradient(38rem 30rem at 8% 4%,  rgba(91,143,168,0.20), transparent 60%),
    radial-gradient(34rem 26rem at 94% 18%, rgba(232,131,90,0.16), transparent 58%);
}
body::after {
  background:
    radial-gradient(42rem 32rem at 74% 98%, rgba(91,143,168,0.16), transparent 60%);
}
@media (prefers-reduced-motion: no-preference) {
  body::before { animation: bgDrift    56s var(--ease-smooth) infinite alternate; }
  body::after  { animation: bgDriftAlt 72s var(--ease-smooth) infinite alternate; }
}
```

- [ ] **Step 3: Verify the pools still show and now drift**

Run:
```bash
grep -n 'body::before\|body::after\|bgDrift' style.css
```
Visual (http://localhost:8000/en/): the same soft sky/peach tints are present behind the glass; over ~30–60s they drift/breathe gently. Confirm content/header sit *above* the layers (nothing washes over text). **Check `/ar/` too** (layers are direction-agnostic but confirm no clipping from `overflow-x: clip`). Force reduced-motion (DevTools → Rendering → "Emulate prefers-reduced-motion: reduce") and confirm the pools are present but static.

- [ ] **Step 4: Commit**

```bash
git add style.css
git commit -m "feat(motion): living background — drifting colour-pool layers (reduced-motion static)"
```

---

### Task 3: Signature swash under heading accents

**Files:**
- Modify: `style.css` — add swash rules in the CHARACTER section.

**Interfaces:**
- Consumes: `swashDraw`, `swashDrawRtl`, `--ease-smooth`, `--peach`.
- Produces: a peach brush-stroke `::after` under `h1 em` (draws on load) and `h2 em` (draws on scroll-reveal); default state fully drawn.

- [ ] **Step 1: Add the swash (default = fully drawn, so reduced-motion keeps it)**

Append to the CHARACTER section:

```css
/* --- Signature swash under italic heading accents --- */
h1 em, h2 em { position: relative; }
h1 em::after, h2 em::after {
  content: '';
  position: absolute;
  left: 0; right: 0;
  bottom: -0.16em;
  height: 0.36em;
  pointer-events: none;
  background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 14' preserveAspectRatio='none'%3E%3Cpath d='M4,9 C45,3 80,12 118,7 C150,3 178,10 196,6' fill='none' stroke='%23E8835A' stroke-width='4.5' stroke-linecap='round'/%3E%3C/svg%3E") no-repeat center / 100% 100%;
  clip-path: inset(0 0 0 0); /* drawn by default → reduced-motion shows it */
}
html[dir="rtl"] h1 em::after, html[dir="rtl"] h2 em::after { transform: scaleX(-1); }
```

- [ ] **Step 2: Gate the draw-in animation behind no-preference**

Append (still in CHARACTER section):

```css
@media (prefers-reduced-motion: no-preference) {
  /* Hero accent draws on load, just after the headline settles */
  h1 em::after            { animation: swashDraw    .9s var(--ease-smooth) .55s both; }
  html[dir="rtl"] h1 em::after { animation: swashDrawRtl .9s var(--ease-smooth) .55s both; }

  /* Section accents start hidden and draw when their section reveals */
  h2 em::after {
    clip-path: inset(0 100% 0 0);
    transition: clip-path .8s var(--ease-smooth);
  }
  html[dir="rtl"] h2 em::after { clip-path: inset(0 0 0 100%); }
  .is-visible h2 em::after { clip-path: inset(0 0 0 0); }
}
```

- [ ] **Step 3: Verify across languages + reduced-motion**

Run:
```bash
grep -n "swashDraw\|h1 em::after\|h2 em::after" style.css
grep -c '<h1>.*<em>' en/index.html fr/index.html ar/index.html   # confirm the accent exists in all three
```
Visual: on `/en/`, `/fr/`, `/ar/` the hero italic accent gets a peach underline that draws in on load (right-to-left on `/ar/`). Reduced-motion: the underline is present and fully drawn immediately. Scroll to any section heading with an `<em>` and confirm its swash draws on entry.

- [ ] **Step 4: Commit**

```bash
git add style.css
git commit -m "feat(motion): signature drawn swash under h1/h2 italic accents (RTL-mirrored)"
```

---

### Task 4: Staggered hero entrance

**Files:**
- Modify: `style.css` — add hero entrance block in the CHARACTER section.

**Interfaces:**
- Consumes: `heroRise`, `--ease-smooth`.
- Produces: on-load staggered rise of homepage hero children. Default state visible (animation only under no-preference).

- [ ] **Step 1: Add the gated staggered entrance**

Append to the CHARACTER section:

```css
/* --- Hero entrance: staggered rise on load (homepage hero) --- */
@media (prefers-reduced-motion: no-preference) {
  .hero .eyebrow  { animation: heroRise .6s var(--ease-smooth) .05s both; }
  .hero h1        { animation: heroRise .6s var(--ease-smooth) .15s both; }
  .hero-copy > p  { animation: heroRise .6s var(--ease-smooth) .28s both; }
  .hero-actions   { animation: heroRise .6s var(--ease-smooth) .40s both; }
  .hero-footnote  { animation: heroRise .6s var(--ease-smooth) .46s both; }
  .hero-panel     { animation: heroRise .7s var(--ease-smooth) .35s both; }
}
```

- [ ] **Step 2: Verify entrance + reduced-motion safety**

Run:
```bash
grep -n 'hero .eyebrow\|hero-panel.*heroRise\|heroRise' style.css
```
Visual (`/en/`): on a fresh load the hero pieces ease up in sequence (eyebrow → h1 → text → buttons → panel), and the swash draws as the headline settles. **Critical reduced-motion check:** force reduce and reload — the hero must appear instantly and fully (no blank-then-pop). Confirm the same on `/ar/`.

- [ ] **Step 3: Commit**

```bash
git add style.css
git commit -m "feat(motion): staggered hero entrance on load (reduced-motion shows instantly)"
```

---

### Task 5: Tactile cards & buttons

**Files:**
- Modify: `style.css` — enhance `.card:hover` (~821), `.chapter-card:hover` (~884); add button `:active` press in CHARACTER section; extend the `reduce` block (~1925–1928).

**Interfaces:**
- Consumes: `--shadow-glass-lg`, `--glass-highlight`, `--peach-light`.
- Produces: warmer hover lift + peach edge-glow on cards; springy button press.

- [ ] **Step 1: Enhance the card hover (warmer lift + peach glow)**

Replace the existing `.card:hover, .service-card:hover, .quote-card:hover { … }` rule (~821–827) with:

```css
.card:hover,
.service-card:hover,
.quote-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-glass-lg), var(--glass-highlight),
              0 10px 34px -12px rgba(232,131,90,0.28);
  border-color: var(--peach-light);
}
```

- [ ] **Step 2: Enhance the chapter-card hover**

Replace the existing `.chapter-card:hover { … }` rule (~884) with:

```css
.chapter-card:hover {
  transform: translateY(-5px);
  box-shadow: var(--shadow-glass-lg), 0 12px 36px -14px rgba(232,131,90,0.26);
}
```

- [ ] **Step 3: Add the springy button press in the CHARACTER section**

```css
/* --- Tactile buttons: springy press --- */
.btn-primary:active,
.btn-secondary:active,
.header-cta:active { transform: translateY(0) scale(0.97); }
```

- [ ] **Step 4: Extend the reduce neutraliser to cover the press**

In the `@media (prefers-reduced-motion: reduce)` block (~1925–1928), add the `:active` selectors so reduced-motion gets no transform:

```css
  .card:hover, .service-card:hover, .quote-card:hover,
  .process-step:hover, .faq:hover, .chapter-card:hover,
  .btn-primary:hover, .btn-secondary:hover, .header-cta:hover,
  .btn-primary:active, .btn-secondary:active, .header-cta:active,
  .mobile-cta:hover, .nav-link:hover { transform: none; }
```

- [ ] **Step 5: Verify**

Run:
```bash
grep -n 'peach.*0.28\|translateY(-5px)\|:active { transform' style.css
```
Visual: hover a value card and a chapter card — they lift a touch more and gain a faint warm (peach) glow + warm border; the existing sheen sweep still plays. Press a button — it springs in slightly. Reduced-motion: no lift, no press (shadow/border state may still change — acceptable, not motion).

- [ ] **Step 6: Commit**

```bash
git add style.css
git commit -m "feat(motion): tactile cards (peach edge-glow lift) + springy button press"
```

---

### Task 6: Animated checklist ticks

**Files:**
- Modify: `style.css` — `.checklist li` + `.checklist li::before` (~1151–1167); remove redundant RTL overrides (~1594–1595); add reveal/hero pop in CHARACTER section.

**Interfaces:**
- Consumes: `tickPop`, `--ease-back`, `--peach`.
- Produces: a checkmark tick that pops in on reveal; logical-property offsets (RTL-correct).

- [ ] **Step 1: Convert the dot to a checkmark, on logical offsets**

Replace `.checklist li { … }` (~1153–1158) and `.checklist li::before { … }` (~1160–1167) with:

```css
.checklist li {
  padding-inline-start: 1.45rem;
  position: relative;
  margin-bottom: 0.35rem;
  font-size: 0.9rem;
}
.checklist li::before {
  content: '';
  position: absolute;
  inset-inline-start: 0.05rem;
  top: 0.30em;
  width: 0.40em;
  height: 0.70em;
  border: solid var(--peach);
  border-width: 0 2.5px 2.5px 0;
  border-radius: 1px;
  transform: rotate(45deg);          /* checkmark; fully shown by default */
  transform-origin: center;
  background: none;                  /* override the old dot fill */
}
```

- [ ] **Step 2: Remove the now-redundant checklist RTL overrides**

Delete these two lines (~1594–1595), since `padding-inline-start` / `inset-inline-start` now flip automatically (leave the `.hero-card li` lines ~1596–1597 untouched):

```css
html[dir="rtl"] .checklist li { padding-left: 0; padding-right: 1.3rem; }
html[dir="rtl"] .checklist li::before { left: auto; right: 0; }
```

- [ ] **Step 3: Add the gated pop (reveal for sections, load for hero card)**

Append to the CHARACTER section:

```css
/* --- Checklist ticks: pop in --- */
@media (prefers-reduced-motion: no-preference) {
  .checklist li::before {
    transform: rotate(45deg) scale(0);
    transition: transform .4s var(--ease-back);
  }
  .is-visible .checklist li:nth-child(1)::before { transition-delay: .05s; }
  .is-visible .checklist li:nth-child(2)::before { transition-delay: .13s; }
  .is-visible .checklist li:nth-child(3)::before { transition-delay: .21s; }
  .is-visible .checklist li:nth-child(4)::before { transition-delay: .29s; }
  .is-visible .checklist li::before { transform: rotate(45deg) scale(1); }

  /* Hero card isn't in the reveal set → pop on load instead */
  .hero-card .checklist li::before { animation: tickPop .4s var(--ease-back) both; }
  .hero-card .checklist li:nth-child(1)::before { animation-delay: .55s; }
  .hero-card .checklist li:nth-child(2)::before { animation-delay: .65s; }
  .hero-card .checklist li:nth-child(3)::before { animation-delay: .75s; }
}
```

- [ ] **Step 4: Verify across languages + RTL + reduced-motion**

Run:
```bash
grep -n 'padding-inline-start\|inset-inline-start\|tickPop\|checklist li::before' style.css
grep -n 'rtl. .checklist' style.css   # expect: no matches (overrides removed)
```
Visual: the "Who we help" hero list and the chapter checklists now show peach checkmarks that pop in (on load for the hero card, on scroll for sections). **On `/ar/` confirm the tick sits on the right (start) edge** and text isn't overlapping it. Reduced-motion: checks are present and static.

- [ ] **Step 5: Commit**

```bash
git add style.css
git commit -m "feat(motion): checklist dots become popping checkmarks; logical RTL offsets"
```

---

### Task 7: Logo touch

**Files:**
- Modify: `style.css` — add logo rules in the CHARACTER section (must override `.brand-logo:hover { transform: none }` ~1499 and `html[dir="rtl"] img { transform: none }` ~1601 by source order); add `.brand-logo:hover` to the `reduce` block.

**Interfaces:**
- Consumes: `logoSettle`, `--ease-smooth`.
- Produces: one-time settle on load + playful hover tilt on the header logo.

- [ ] **Step 1: Add the logo settle + hover tilt (placed late so it wins source order)**

Append to the CHARACTER section (this is near the end of the file, after the neutralisers at ~1499 and ~1601, so it overrides them):

```css
/* --- Logo touch: settle on load, playful tilt on hover --- */
.brand-logo { transition: transform .35s var(--ease-smooth); }
.brand-logo:hover               { transform: rotate(-5deg) scale(1.06); }
html[dir="rtl"] .brand-logo:hover { transform: rotate(5deg)  scale(1.06); }
@media (prefers-reduced-motion: no-preference) {
  .brand-logo { animation: logoSettle .7s var(--ease-smooth) both; }
}
```

- [ ] **Step 2: Neutralise the hover tilt under reduce**

In the `@media (prefers-reduced-motion: reduce)` block, append `.brand-logo:hover` to the `transform: none` list (the same rule edited in Task 5 Step 4):

```css
  .btn-primary:active, .btn-secondary:active, .header-cta:active,
  .brand-logo:hover,
  .mobile-cta:hover, .nav-link:hover { transform: none; }
```

- [ ] **Step 3: Verify**

Run:
```bash
grep -n 'brand-logo:hover\|logoSettle' style.css
```
Visual (`/en/`): on load the header logo settles in (slight fade + un-rotate); on hover it tilts playfully. **On `/ar/` confirm the tilt still happens** (overriding `html[dir="rtl"] img { transform: none }`) and tilts the mirrored direction. Reduced-motion: no settle, no tilt.

- [ ] **Step 4: Commit**

```bash
git add style.css
git commit -m "feat(motion): logo settle-on-load + playful hover tilt (RTL-aware, reduced-motion off)"
```

---

### Task 8: Adversarial verification sweep

**Files:** none (review only).

- [ ] **Step 1: Full structural + cross-cutting check**

Run:
```bash
cd /home/vpanangipally/workshop/ezziclarity
echo "brace balance:"; echo "open $(grep -o '{' style.css | wc -l) / close $(grep -o '}' style.css | wc -l)"
echo "no-preference vs reduce guards present:"; grep -c 'prefers-reduced-motion: no-preference' style.css; grep -c 'prefers-reduced-motion: reduce' style.css
echo "every keyframe referenced:"; for k in heroRise bgDrift bgDriftAlt logoSettle swashDraw swashDrawRtl tickPop; do echo -n "$k: "; grep -c "animation:.*$k\b\|animation-name:.*$k" style.css; done
```
Expected: braces balanced; both guards present; each keyframe referenced ≥1 time (heroRise multiple).

- [ ] **Step 2: Three-language × three-mode visual matrix**

For each of `/en/`, `/fr/`, `/ar/` × {normal, reduced-motion, no-`backdrop-filter` (older engine or DevTools)} confirm: page renders, text legible, swash present, hero assembles (or shows instantly under reduce), ticks present, no element stuck invisible, no horizontal scroll, logo behaves. Pay special attention to **`/ar/` RTL** (swash mirrored, tick on start edge, logo tilt mirrored).

- [ ] **Step 3: Spot-check interior pages**

Open `/en/about/`, `/en/consulting/`, `/en/books/`, `/en/contact/`, `/en/resources/` — confirm each hero `h1 em` has a swash, cards lift with the warm glow, nothing regressed.

---

### Task 9: Release v3.6.0

**Files:**
- Modify: `CHANGELOG.md` (new entry, newest-first), `README.md` (change-history row), `CLAUDE.md` (bump "Latest:" → `v3.6.0`; correct the stale `v3.4.1` baseline note), `ROADMAP.md` (if the item is tracked there, move it to done).

- [ ] **Step 1: Add the CHANGELOG entry (top of file, after the heading)**

```markdown
## v3.6.0 — Character & charisma pass (YYYY-MM-DD HH:MM UTC)

A CSS-only motion + micro-interaction layer that gives the site life without
spending its calm. Signature hand-drawn peach swash that draws itself under
italic heading accents; a living background whose colour pools gently drift;
tactile cards (warm peach edge-glow lift) and springy buttons; a staggered
hero entrance on load; checklist dots that become popping checkmarks; and a
logo that settles in and tilts on hover. All continuous motion is gated behind
`prefers-reduced-motion` and mirrored for RTL Arabic. Zero HTML changes — one
stylesheet, all three languages. Spec: `docs/superpowers/specs/2026-06-18-character-charisma-design.md`.
```
(Fill the timestamp from the merge commit at tag time.)

- [ ] **Step 2: Add the README change-history row and bump CLAUDE.md**

Add a row to the README release table for `v3.6.0` (PR # + one-line summary). In `CLAUDE.md`, change `Latest: v3.4.1` to `Latest: v3.6.0` and note the Liquid Glass section is current through `v3.5.x` (correcting the stale baseline).

- [ ] **Step 3: Commit docs**

```bash
git add CHANGELOG.md README.md CLAUDE.md ROADMAP.md
git commit -m "docs: v3.6.0 release notes — character & charisma pass"
```

- [ ] **Step 4: Open the PR as `vijaybpanangi`, squash-merge, tag**

```bash
git push -u origin feat/character-charisma
gh auth switch --user vijaybpanangi
gh pr create --title "feat: character & charisma motion pass (v3.6.0)" --body "<summary + 🤖 trailer>"
# after review/merge:
gh pr merge --squash
gh auth switch --user vpanangipally
git checkout main && git pull
git tag -a v3.6.0 -m "Character & charisma pass" && git push origin v3.6.0
```

- [ ] **Step 5: Verify the live deploy**

After merge, Cloudflare Pages rebuilds from `main` (~30s). Load https://ezziclarity.ca/en/ , /fr/ , /ar/ and confirm the pass is live and reduced-motion still degrades cleanly.

---

## Self-Review

**Spec coverage:** All six elements have tasks — swash (T3), living background (T2), tactile cards/buttons (T5), hero entrance (T4), checklist ticks (T6), logo (T7); scaffolding (T1); RTL logical-property fix (T6); adversarial verification (T8); release governance + CLAUDE staleness correction (T9). The spec's "consciously out" items (wavy dividers, repaint) are correctly absent.

**Placeholder scan:** No TBD/TODO; every code step shows full CSS. The only deferred value is the CHANGELOG timestamp (filled from the merge commit), which is intentional.

**Type/selector consistency:** Keyframe names (`heroRise`, `bgDrift`, `bgDriftAlt`, `logoSettle`, `swashDraw`, `swashDrawRtl`, `tickPop`) and the `--ease-back` token are defined in T1 and referenced verbatim in T2–T7. Reduced-motion defaults are visible-by-default in every animated rule. Pre-existing rules to override (`.brand-logo:hover`, `html[dir="rtl"] img`, `.card:hover`, checklist RTL, reduce block) are each addressed by line.
