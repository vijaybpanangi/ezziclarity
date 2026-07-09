# Books Gallery Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Turn the three Books pages' placeholder cards into a proper gallery/library of book cards — cover · status · meta · blurb · a "Buy on Amazon" CTA — shipping as a framework (branded placeholders + "Coming soon") that flips to live per card.

**Architecture:** Convert each existing `.card card--accent` text card into the site's `.service-card` › `.service-card-img` (cover frame + tint overlay) + `.service-card-body` component, adding a `.book-cta` row. All styling is one CSS block; content is authored per-language in the three Books pages. No build system, no client-side rendering, no JS.

**Tech Stack:** Plain HTML + CSS on Cloudflare Pages. No test framework — verification is structural (`grep`) + local `python3 -m http.server` preview, checked in EN/FR/AR incl. RTL.

## Global Constraints

- **CSS-only + per-language HTML content.** Edits confined to `style.css` and the three Books pages (`en/books/`, `fr/livres/`, `ar/books/`), plus `ROADMAP.md` and release docs. No JS, no build step, no client-side render (catalog stays in HTML for SEO + no-JS).
- **Trilingual triplicate.** Every card lands in all three trees; titles/blurbs stay in each language; the compliance line ("Academic and career focused only…") is untouched.
- **Framework now, flip-to-live later.** Cards ship "Coming soon" with branded placeholder covers + "Notify me" → contact, and a commented-in buy-button block for the per-card flip. No real covers or Amazon links exist yet.
- **Preserve existing copy.** Keep each card's current `<h3>` title and `<p>` blurb text verbatim; only re-house them in the new structure and add pill/meta/cover/CTA.
- **On-brand + reduced-motion/RTL safe.** Reuse `.service-card` (already frosted-glass + `v3.6` hover: lift + peach glow), Sky/Peach palette, logical properties for RTL. No new motion.
- **Amazon links (flip-time):** `target="_blank" rel="noopener sponsored"` (Amazon Associates).
- **Release:** `v3.7.0` (minor), squash-merge PR as `vijaybpanangi` + tag + CHANGELOG/README/CLAUDE + ROADMAP.

---

### Task 1: Book-card CSS component

**Files:**
- Modify: `style.css` — append a `/* BOOK GALLERY */` block after the service-card section (~after line 1146, the `.svc-pill` variants).

**Interfaces:**
- Consumes: existing `.service-card`, `.service-card-img`, `.service-card-body`, `.svc-pill`, `--sky-pale`, `--peach-pale`, `--ease-smooth`.
- Produces: `.book-card`, `.book-cover`, `.book-cover--placeholder`, `.book-cover-mark`, `.book-meta`, `.book-cta`, `.book-cta-notify` (consumed by Tasks 2–4).

- [ ] **Step 1: Add the component CSS**

Append to `style.css`:

```css
/* =============================================
   BOOK GALLERY (v3.7.0)
   Book cards extend .service-card: a portrait cover
   frame (real image later, branded placeholder now)
   + the existing body, plus a CTA row built to hold
   the "Buy on Amazon" and a later "Buy hardcover" button.
   ============================================= */
.book-cover { aspect-ratio: 3 / 4; }
.book-cover img { width: 100%; height: 100%; object-fit: cover; }

/* Branded placeholder shown until real cover art exists */
.book-cover--placeholder {
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(150deg, var(--sky-pale), var(--peach-pale));
}
.book-cover--placeholder .book-cover-mark {
  width: 46%;
  height: auto;
  opacity: 0.38;
}

.book-meta {
  font-size: 0.8rem;
  font-weight: 600;
  color: var(--ink-muted);
  margin: 0.15rem 0 0.55rem;
}

/* CTA row: holds up to two buttons; logical gap so it orders correctly under RTL */
.book-cta {
  display: flex;
  flex-wrap: wrap;
  gap: 0.6rem;
  margin-top: 1rem;
}
.book-cta .btn-primary,
.book-cta .btn-secondary { padding: 0.55rem 1.15rem; font-size: 0.85rem; }

/* Pre-launch soft CTA */
.book-cta-notify {
  font-weight: 700;
  color: var(--sky-dark);
  font-size: 0.85rem;
  align-self: center;
}
```

- [ ] **Step 2: Verify it parses and doesn't regress**

Run:
```bash
cd /home/vpanangipally/workshop/ezziclarity
echo "braces: open $(grep -o '{' style.css | wc -l) / close $(grep -o '}' style.css | wc -l)"
grep -n 'BOOK GALLERY\|.book-cover\|.book-cta' style.css | head
```
Expected: balanced braces; the new selectors present. (No visual change yet — nothing uses them until Task 2.)

- [ ] **Step 3: Commit**

```bash
git add style.css
git commit -m "feat(books): book-card CSS component (cover frame + CTA row)"
```

---

### Task 2: EN Books gallery (reference conversion)

**Files:**
- Modify: `en/books/index.html` — the "Children's Books" grid (~lines 240–276) and the "Educational Guides" grid.

**Interfaces:**
- Consumes: Task 1's `.book-card`/`.book-cover`/`.book-meta`/`.book-cta` classes.
- Produces: the reference card markup that Tasks 3–4 mirror in FR/AR.

- [ ] **Step 1: Convert each children's card to a book card**

For each `<article class="card card--accent">` in the Children's Books grid, replace the wrapper with the structure below — **keeping the existing `<h3>` and blurb `<p>` text verbatim**, moving the age/format out of the `<h3>` into `.book-meta`. Example for the first (picture book) card:

```html
<article class="service-card book-card">
  <div class="service-card-img book-cover book-cover--placeholder" aria-hidden="true">
    <img class="book-cover-mark" src="../../assets/images/logo-ec.svg" alt="">
  </div>
  <div class="service-card-body">
    <span class="svc-pill stud">Coming soon</span>
    <h3>Picture book</h3>
    <p class="book-meta">Picture book · ages 3–6</p>
    <p>A gentle, illustrated story for the very youngest new arrivals. Perfect for reading aloud at bedtime, built around belonging and small moments of courage.</p>
    <div class="book-cta">
      <a class="book-cta-notify" href="../contact/index.html">Notify me →</a>
      <!-- FLIP TO LIVE: replace the Notify link with the buy button(s) + real URL:
      <a class="btn-primary" href="AMAZON_CA_URL" target="_blank" rel="noopener sponsored">Buy on Amazon</a>
      later (Lulu Direct hardcover): <a class="btn-secondary" href="LULU_OR_SHOPIFY_URL" target="_blank" rel="noopener">Buy hardcover</a>
      -->
    </div>
  </div>
</article>
```

Second children's card: same structure, `<h3>Early reader</h3>`, `.book-meta` = "Early reader · ages 5–8", blurb verbatim ("Short, simple sentences for children just beginning to read on their own, following a young character settling into a new home and school.").

- [ ] **Step 2: Convert the Educational Guides card the same way**

`<h3>Arriving & adapting: the international student's guide</h3>`, `.book-meta` = "Student guide", `svc-pill` label "In development", blurb verbatim ("A plain-language guide to navigating Canadian academic expectations, study habits, and early-career steps with confidence."), same `.book-cta` with "Notify me →".

- [ ] **Step 3: Verify EN renders as a gallery**

Run:
```bash
cd /home/vpanangipally/workshop/ezziclarity
grep -c 'service-card book-card' en/books/index.html   # expect 3
(python3 -m http.server 8040 >/dev/null 2>&1 & echo $! > /tmp/bg.pid); sleep 1
curl -s -o /dev/null -w 'en/books %{http_code}\n' http://localhost:8040/en/books/
kill $(cat /tmp/bg.pid) 2>/dev/null
```
Visual (http://localhost:8040/en/books/): three book cards with portrait placeholder covers (brand gradient + faint logo), a status pill, title, meta line, blurb, and a "Notify me →" link. Cards lift + glow on hover (existing v3.6 behavior). No `.card--accent` remnants.

- [ ] **Step 4: Commit**

```bash
git add en/books/index.html
git commit -m "feat(books): EN Books page — gallery of book cards (framework state)"
```

---

### Task 3: FR Books gallery

**Files:**
- Modify: `fr/livres/index.html` — the two grids (~lines 250–276).

**Interfaces:**
- Consumes: Task 1 classes; mirrors Task 2's structure.

- [ ] **Step 1: Mirror Task 2's structure with the existing FR content**

Replace each `<article class="card card--accent">` with the `service-card book-card` structure from Task 2, **preserving the existing FR `<h3>` and blurb `<p>` text verbatim**, using these FR labels:
- Cover: identical placeholder (`src="../../assets/images/logo-ec.svg"`).
- Pills: children's = `Bientôt disponible`; guide = `En développement`.
- `.book-meta`: card 1 = "Album illustré · 3–6 ans", card 2 = "Premiers lecteurs · 5–8 ans", guide = "Guide étudiant". Move the age/format text currently in the `<h3>` into `.book-meta`, and set the `<h3>` to the short title ("Album illustré", "Premiers lecteurs", and the guide's existing title).
- CTA: `<a class="book-cta-notify" href="../contact/index.html">Prévenez-moi →</a>` + the same commented flip-to-live block.

- [ ] **Step 2: Verify**

Run:
```bash
grep -c 'service-card book-card' fr/livres/index.html   # expect 3
```
Visual (http://localhost:8040/fr/livres/): three FR book cards, same layout as EN, French labels intact.

- [ ] **Step 3: Commit**

```bash
git add fr/livres/index.html
git commit -m "feat(books): FR Livres page — gallery of book cards"
```

---

### Task 4: AR Books gallery (RTL)

**Files:**
- Modify: `ar/books/index.html` — the two grids (~lines 251–277).

**Interfaces:**
- Consumes: Task 1 classes; mirrors Task 2's structure.

- [ ] **Step 1: Mirror the structure with the existing AR content**

Replace each `<article class="card card--accent">` with the `service-card book-card` structure, **preserving the existing AR `<h3>` and blurb text verbatim**, using these AR labels:
- Cover: identical placeholder.
- Pills: children's = `قريبًا`; guide = `قيد التطوير`.
- `.book-meta`: card 1 = "كتاب مصوّر · ٣–٦ سنوات", card 2 = "قارئ مبتدئ · ٥–٨ سنوات", guide = "دليل الطالب". Move the age/format into `.book-meta`; set `<h3>` to the short title.
- CTA: `<a class="book-cta-notify" href="../contact/index.html">أعلمني ←</a>` + the same commented flip-to-live block. (Note the RTL arrow `←`.)

- [ ] **Step 2: Verify RTL**

Run:
```bash
grep -c 'service-card book-card' ar/books/index.html   # expect 3
```
Visual (http://localhost:8040/ar/books/): three cards render right-to-left; the pill, meta, and "Notify me" arrow sit on the correct (right/start) side; cover + body stack correctly. Confirm no LTR leakage.

- [ ] **Step 3: Commit**

```bash
git add ar/books/index.html
git commit -m "feat(books): AR Books page — gallery of book cards (RTL)"
```

---

### Task 5: ROADMAP future-channel entry

**Files:**
- Modify: `ROADMAP.md` — update the existing "Books cover art" note; add the Lulu Direct channel entry.

- [ ] **Step 1: Update ROADMAP**

Update the "Books cover art" item to note the gallery is now built and awaits real covers + Amazon links (flip-to-live per card, instructions live in each card's HTML comment). Add a new entry:

```markdown
- **Direct hardcover sales (future).** Sell signed/premium hardcover editions direct via **Lulu Direct** — print-on-demand, **printed in Ontario**, automated white-labeled dropship (no inventory; per-order = print + shipping + a $1.75 fulfillment fee; author sets retail, keeps the margin + customer email). **Shape TBD:** on-site **Shopify Buy Button** (~$5/mo Starter — embeds a "Buy hardcover" button + hosted checkout + tax on the static site; requires allowing Shopify domains in `_headers`/CSP) vs. a **link-out to the lulu.com** retail page ($0, Lulu takes a royalty cut, off-site). The book-card `.book-cta` row already reserves the second-button slot. Amazon (paperback) + direct hardcover coexist — print is never KDP-Select-exclusive. Spec: `docs/superpowers/specs/2026-06-25-books-gallery-design.md`.
```

- [ ] **Step 2: Commit**

```bash
git add ROADMAP.md
git commit -m "docs: ROADMAP — books cover-art status + Lulu Direct future channel"
```

---

### Task 6: Verification sweep

**Files:** none (review only).

- [ ] **Step 1: Structural + cross-cutting checks**

Run:
```bash
cd /home/vpanangipally/workshop/ezziclarity
echo "braces: open $(grep -o '{' style.css | wc -l) / close $(grep -o '}' style.css | wc -l)"
for f in en/books fr/livres ar/books; do echo -n "$f book-cards: "; grep -c 'service-card book-card' "$f/index.html"; done   # each 3
echo "no leftover card--accent on Books pages:"; grep -c 'card--accent' en/books/index.html fr/livres/index.html ar/books/index.html   # each 0
echo "flip-to-live hint present:"; grep -c 'FLIP TO LIVE' en/books/index.html   # 3
```
Expected: braces balanced; 3 book cards per page; zero `card--accent` left on Books pages; flip hints present.

- [ ] **Step 2: Three-language visual pass**

Serve locally; for `/en/books/`, `/fr/livres/`, `/ar/books/` confirm: gallery grid of 3 cards, portrait placeholder covers, pill/title/meta/blurb/CTA all present and legible, hover lift+glow works, `/ar/` reads RTL correctly, no horizontal scroll, mobile (narrow) collapses the grid to 1 column.

- [ ] **Step 3: Reduced-motion check**

With `prefers-reduced-motion: reduce` forced, confirm the Books pages are fully static and the cards/covers/CTAs are all visible (the only motion is the existing gated card hover).

---

### Task 7: Release v3.7.0

**Files:**
- Modify: `CHANGELOG.md` (new entry, newest-first), `README.md` (release-history row), `CLAUDE.md` ("Latest:" → `v3.7.0`; note the Books gallery + BOOK GALLERY CSS section).

- [ ] **Step 1: CHANGELOG entry (top, after intro)**

```markdown
## v3.7.0 — Books gallery (YYYY-MM-DD HH:MM UTC)

The Books pages become a proper gallery/library. Each title is now a book card — portrait cover, status pill, format/age, blurb, and a call to action — built on the existing `.service-card` component. Ships as a framework: branded placeholder covers + "Coming soon / Notify me" now, flipping to a real cover + "Buy on Amazon" per card when titles go live (flip instructions live in each card's HTML comment). CSS-only, trilingual (EN/FR/AR incl. RTL), no build/JS. Records the future direct-hardcover channel (Lulu Direct, Ontario-printed) as a reserved CTA slot + ROADMAP item. Spec: `docs/superpowers/specs/2026-06-25-books-gallery-design.md`.
```
(Fill timestamp from the merge commit at tag time.)

- [ ] **Step 2: README row + CLAUDE bump**

Add a `v3.7.0` row to the README release-history table (PR # + summary). In `CLAUDE.md`, bump `Latest: v3.6.1` → `v3.7.0` and add a line to the stylesheet section noting the `/* BOOK GALLERY */` component (book cards extend `.service-card` with a cover frame + CTA row).

- [ ] **Step 3: Commit docs**

```bash
git add CHANGELOG.md README.md CLAUDE.md
git commit -m "docs: v3.7.0 release notes — books gallery"
```

- [ ] **Step 4: PR as `vijaybpanangi`, merge, tag**

```bash
git push -u origin feat/books-gallery
gh auth switch --user vijaybpanangi
gh pr create --title "feat: books gallery (v3.7.0)" --body "<summary + 🤖 trailer>"
# after review: gh pr merge --squash --delete-branch
gh auth switch --user vpanangipally
git checkout main && git pull --ff-only
git tag -a v3.7.0 -m "Books gallery" && git push origin v3.7.0
```

- [ ] **Step 5: Verify live**

After merge, Cloudflare Pages rebuilds from `main` (~30s + CDN propagation). Poll `https://ezziclarity.ca/en/books/` (and /fr/livres/, /ar/books/) until the gallery is live.

---

## Self-Review

**Spec coverage:** authoring model (per-language HTML, no JS) → Tasks 2–4; book-card component on `.service-card` → Task 1; states + flip-to-live (placeholder + Notify + commented buy block) → Tasks 1–4; Amazon `rel="noopener sponsored"` → documented in Global Constraints + flip comment; page structure (keep story/guides, convert grids) → Tasks 2–4; SEO Book JSON-LD → intentionally deferred per spec ("omitted until a real offer"), noted in flip comment; design/motion/RTL → Task 1 + Task 6; future Lulu channel → Task 5. No gaps.

**Placeholder scan:** No TBD/TODO. `AMAZON_CA_URL`/`LULU_OR_SHOPIFY_URL` appear only inside the flip-to-live HTML comment (intentional — filled per title at flip time, not now). "Preserve existing blurb verbatim" is a precise instruction, not a placeholder. The CHANGELOG timestamp is filled from the merge commit (intentional).

**Type/selector consistency:** `.book-card`, `.book-cover`, `.book-cover--placeholder`, `.book-cover-mark`, `.book-meta`, `.book-cta`, `.book-cta-notify` defined in Task 1 and used verbatim in Tasks 2–4. Cover placeholder uses the existing `logo-ec.svg` asset. `.svc-pill` reused from the existing component.
