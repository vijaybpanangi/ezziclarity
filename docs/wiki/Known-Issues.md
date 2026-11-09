[Home](Home) › Past and future › **Known Issues**

# Known Issues

> [!NOTE]
> **At a glance.** Problems found on the live site and in the code during the wiki review on 2026-11-09. None stops a visitor from reading or booking, but two are visible: the **Books pages still say the books are not out yet** in their closing call to action, and the **Amazon Associates disclosure** is missing. The unstyled nested 404 page and the off-centre gateway heading found in the same review were fixed in v3.9.4. Each item says where it lives and how to fix it. When one is fixed, remove it here and record it in `CHANGELOG.md`.

```mermaid
flowchart LR
    subgraph Visible[Visible to visitors]
      I2[Stale books copy<br/>three languages]:::ours
      I3[No Associates<br/>disclosure]:::thirdparty
    end
    subgraph Hidden[Behind the scenes]
      I5[Relative og:image]:::visitor
      I6[Offer currency USD<br/>on amazon.ca]:::visitor
      I7[Sitemap lastmod<br/>all 2026-06-15]:::visitor
      I8[Undefined colour<br/>token on gateway]:::ours
      I9[3px sideways scroll<br/>home pages on phones]:::ours
    end

    style Visible fill:#FFFFFF,stroke:#DDD8CC,color:#5e5c54
    style Hidden fill:#FFFFFF,stroke:#DDD8CC,color:#5e5c54

    classDef ours fill:#FDE7DC,stroke:#E8835A,color:#1e1c18
    classDef thirdparty fill:#EEE9F7,stroke:#7C6BB0,color:#1e1c18
    classDef visitor fill:#E5F4EA,stroke:#3F8F5A,color:#1e1c18
```

## Visible to visitors

| Issue | Where | Fix |
|---|---|---|
| **Books copy still says the books are not out.** The closing call to action reads "The books aren't out yet... We'll let you know the moment the first title is available", while three titles are live above it. The gateway, the footer and several meta descriptions also say "children's books and guides in the works". | `en/books/`, `fr/livres/`, `ar/books/` (closing section); `index.html`; the footer brand line on every page in all three languages | Reword to invite readers to hear about the *next* title; update the gateway, footer and descriptions in all three languages; get the Arabic checked. |
| **No Amazon Associates disclosure.** Associates rules ask for a clear statement such as "As an Amazon Associate we earn from qualifying purchases." | Books pages, three languages | Add a short translated line near the book grid or in the footer of the Books pages. |

## Behind the scenes

| Issue | Where | Fix |
|---|---|---|
| **Relative `og:image`.** Link previews need an absolute image URL; some apps ignore relative ones. | `<head>` of all 19 pages | `https://ezziclarity.ca/assets/images/og-ezzi-clarity.png` |
| **Offer currency.** Each `Book` offer says `"priceCurrency": "USD"` with an amazon.ca link. | JSON-LD on the Books pages | Confirm the Amazon.ca price and use `CAD`, or drop the price fields. |
| **Sitemap dates.** All 19 `<lastmod>` values are 2026-06-15, though the Books pages changed in July and August. | `sitemap.xml` | Update `lastmod` for pages that changed. |
| **Undefined token.** The gateway's small print uses `var(--text-soft)`, which is not defined; it falls back to the inherited colour. | `index.html` | Use `var(--ink-soft)`. |
| **Slight sideways scroll on phones.** At 390px the home pages are 393px wide, most likely from the hero's decorative blob. | `en/`, `fr/`, `ar/` home | Clip the blob (`overflow-x: clip` on the hero) and recheck. |
| **Arabic native review pending.** The checklist from June 2026 still says "awaiting native-speaker review". | `docs/superpowers/specs/arabic-review-checklist.md` | Ask a native speaker; record the outcome in the checklist. |
| **`www` serves a copy.** `www.ezziclarity.ca` returns 200 instead of a 301 to the apex. | Cloudflare dashboard | See [Runbooks](Runbooks#add-the-www-to-apex-redirect). |

## Fixed

| Issue | Fixed in |
|---|---|
| 404 page unstyled on nested paths (relative `style.css` and logo); now root-relative | v3.9.4 |
| Gateway and 404 heading about 62px off centre (global `h1` max width without auto margins) | v3.9.4 |

## Related pages

- [Roadmap](Roadmap): planned work, including these fixes
- [Runbooks](Runbooks)
- [Books and Buy Links](Books-and-Buy-Links)

**Last checked:** 2026-11-09, against the live site (headless Chromium at 1280px and 390px) and `main` at `6c632f0`.

<details>
<summary>Sources</summary>

- `grep -rln "in the works"` across the HTML; Books pages' `section-cta` blocks in all three languages
- `grep -i "associate\|commission\|affiliate"` on the Books pages: no matches
- `og:image` values in each `<head>`; JSON-LD `Book` offers; `sitemap.xml` `lastmod` values
- `document.documentElement.scrollWidth` of 393 at a 390px viewport on `/en/` and `/ar/`

</details>
