# Books Gallery — Design Spec (ezziclarity.ca)

**Date:** 2026-06-25
**Status:** Approved design, not yet built. Target release `v3.7.0` (minor — notable enhancement).
**Scope type:** Content + presentation upgrade to the trilingual Books pages. HTML (per-language book cards) + CSS + per-title SEO. **No build system, no client-side rendering, no commerce backend.**

## Goal

Turn the Books page from three "Coming soon / In development" placeholder cards into a proper **gallery/library** of Arva's books — each title presented with cover art, a status, a short blurb, age/format, and a clear **"Buy on Amazon"** call to action once it's live. Amazon is the sales engine (fulfillment, trust, discovery, tax); ezziclarity.ca is the books' beautiful home. The gallery ships as a **framework** (real layout + states now, since titles are imminent-not-live) and each title "flips to live" with a per-card content edit when its cover and Amazon link exist.

This is **Approach A** from the 2026-06-25 brainstorm. A direct hardcover sales channel (Lulu Direct, printed in Ontario) is a **recorded future step**, not built here — but the card is designed to accept it without a redesign (see Future channel).

## Design principles

1. **Authoring model: per-language HTML cards, no build/JS-render.** Each book is a self-contained HTML **book card** authored in each language tree (`en/books/`, `fr/livres/`, `ar/books/`), matching the repo's standing convention ("translations live inline in the HTML; no string-extraction system"). Blurbs/titles differ per language anyway. The catalog stays in HTML so it is **SEO-indexed and works with no JS** — rendering the catalog from a JSON via client JS would degrade SEO and no-JS visitors, so it is deliberately not done. Adding a title = the documented **triplicate edit** (3 files); the card CSS is written once.
2. **Extend the existing component, don't invent one.** The book card is the site's existing `.service-card` › `.service-card-img` (image frame with the brand tint `::after` overlay) + `.service-card-body` (pill + `<h3>` + copy) pattern — the same one the ROADMAP already earmarked for cover art — plus a small CTA row. No new component system.
3. **Framework now, flip-to-live later.** Ships with branded placeholder covers + "Coming soon" + "Notify me". Going live = swapping the cover image, status pill, and CTA on that one card. No rebuild.
4. **CSS-only, on-brand, reduced-motion + RTL safe.** Reuses Liquid Glass surfaces, the Sky/Peach palette, Fraunces accents, and the `v3.6` card hover (lift + peach edge-glow). No new JavaScript.

## The book-card component

Grounded in the real markup (from `en/resources/index.html`), a book card is:

```html
<article class="service-card book-card">
  <div class="service-card-img book-cover">
    <img src="../../assets/images/books/<slug>-cover.jpg" alt="Cover of “<Title>”" loading="lazy">
  </div>
  <div class="service-card-body">
    <span class="svc-pill">Coming soon</span>            <!-- status -->
    <h3><Title></h3>
    <p class="book-meta">Picture book · ages 3–6</p>       <!-- format · audience -->
    <p><Blurb, 1–2 sentences></p>
    <div class="book-cta">
      <!-- when live: -->
      <a class="btn-primary" href="<AMAZON_AFFILIATE_URL>" target="_blank" rel="noopener sponsored">Buy on Amazon</a>
      <!-- dormant second slot, added later for the direct hardcover channel:
      <a class="btn-secondary" href="<LULU_OR_SHOPIFY_URL>" target="_blank" rel="noopener">Buy hardcover</a> -->
    </div>
  </div>
</article>
```

- **Cover frame** (`.book-cover`, on top of `.service-card-img`): a fixed aspect box (handles square/portrait children's-book covers) with the existing tint overlay. Until real art exists, it shows a **branded placeholder** (the page `--wash` + a centered title/monogram) so the grid reads as intentional, not broken.
- **Status pill** (`.svc-pill`): `Coming soon` → `New` / `Available`.
- **Title** (`<h3>`), **meta** line (`.book-meta`: format · age range), **blurb** (1–2 sentences, per language).
- **CTA row** (`.book-cta`): built to hold **up to two buttons** — the primary "Buy on Amazon" (live), and a **dormant slot** for "Buy hardcover (direct)" later. Pre-launch it instead shows a soft "Notify me" linking to the contact page.

## States & flip-to-live

| State | Cover | Pill | CTA |
|---|---|---|---|
| Coming soon (now) | branded placeholder | "Coming soon" | "Notify me" → contact |
| Available (later) | real cover image | "New" / "Available" | "Buy on Amazon" (affiliate) |

Flipping a title live is a **single-card content edit** in each language file — no structural change.

## Amazon links

"Buy on Amazon" uses Arva's **Amazon Associates** affiliate link (small commission + click analytics), `target="_blank" rel="noopener sponsored"` (honest affiliate `rel`, good practice). Per-region links (amazon.ca primary for the Canadian audience) can be set per card.

## Page structure (keep the soul, upgrade the shell)

Preserve the current narrative and compliance framing:
- **Page header** + the **"Passion Project"** series story (unchanged).
- Convert the **"Children's Books"** and **"Educational Guides"** placeholder blocks into **gallery grids** (`.grid grid-3`) of book cards.
- Keep the closing **"follow the series"** CTA (the existing `.section-cta`).
- The recurring compliance disclaimer ("Academic and career focused only…") stays.

## SEO

When a title goes live, add a schema.org **`Book`** node per title to the page's existing JSON-LD `@graph`: `name`, `author` (→ the shared `#founder` Arva Ezzi node), `image` (cover), `inLanguage`, and `offers` (→ the Amazon URL, `availability`). Consistent with the site's existing structured-data layer; improves book rich-results. Coming-soon titles are omitted from structured data until they have a real offer.

## Accessibility & i18n

- **Trilingual triplicate:** every card lands in `en/books/`, `fr/livres/`, `ar/books/`; blurbs/titles translated; the compliance line already exists translated per tree.
- **RTL (Arabic):** cards use the existing RTL-safe card styling; the CTA row uses logical properties so buttons order correctly under `dir="rtl"`. Cover `alt` text and pill labels are translated per language.
- **Covers:** real content covers get descriptive `alt` ("Cover of ‘<Title>’"); the placeholder is decorative.
- **No motion dependency:** the gallery is fully static content; the only motion is the existing `v3.6` card hover, already reduced-motion gated.

## Out of scope

- **The direct hardcover commerce channel** (Lulu Direct / Shopify) — recorded as a future step (below), not built here. No cart, no checkout, no payment, no build system, no client-side rendering.
- **Homepage "We write" teaser** with a cover — deferred until real art exists (the homepage chapter already links to Books).
- New copy beyond per-card book blurbs; no IA/URL/sitemap changes (the Books pages already exist).

## Future channel (recorded, not built)

Add a `ROADMAP.md` entry: **Direct hardcover sales via Lulu Direct** — print-on-demand, **printed in Ontario**, automated white-labeled dropship (no inventory; per-order cost = print + shipping + a $1.75 fulfillment fee; author sets retail and keeps the margin + customer email). **Shape TBD:** an on-site **Shopify Buy Button** (Starter plan ~$5/mo — embeds a "Buy hardcover" button + hosted checkout + tax on the existing static site; requires allowing Shopify domains in `_headers`/CSP) **vs.** a **link-out to the lulu.com** retail page ($0, Lulu takes a royalty cut, sale is off-site). The book-card `.book-cta` row's dormant second slot accepts that "Buy hardcover" button when the channel is built. Amazon (paperback) and a direct hardcover edition **coexist** — print is never subject to KDP Select exclusivity.

## Release

Minor bump → **`v3.7.0`**. Shipped via squash-merge PR (as `vijaybpanangi`) + annotated tag, with a versioned/timestamped `CHANGELOG.md` entry, a README release-history row, a `CLAUDE.md` "Latest:" bump, and the ROADMAP future-channel entry.
