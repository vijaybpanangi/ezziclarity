# Roadmap

Future updates and deferred items for ezziclarity.ca. Items here have no fixed timeline — they're surfaced so any future session (Vijay's, mine, or another Claude's) sees the gaps and can pick them up at the right moment. Once an item ships, it moves to [`CHANGELOG.md`](CHANGELOG.md).

## Email setup for the domain

The site has moved from WordPress.com hosting → Cloudflare Pages, but the **email path for `@ezziclarity.ca` was never updated**. The current DNS still carries the original WordPress-era records:

```
ezziclarity.ca       TXT   "v=spf1 include:_spf.wpcloud.com ~all"
_dmarc.ezziclarity.ca TXT  "v=DMARC1;p=none;"
```

The SPF authorizes WordPress.com mail servers to send as `@ezziclarity.ca`; DMARC is in monitor-only mode (`p=none`). If WordPress.com no longer serves the domain's mail, the SPF is misleading and DMARC is doing nothing useful.

### Plan

**Step 1 — Verify the current state.**
Find out whether email is actually flowing right now:
- Is there an existing mail server that receives `@ezziclarity.ca`? (Check MX records at `https://dash.cloudflare.com → ezziclarity.ca → DNS → Records`.)
- Has anyone sent or received mail from the domain recently?
- Are there forwarding rules pointing `@ezziclarity.ca` addresses anywhere?

If nothing is configured, the legacy SPF/DMARC TXT records can be removed without breaking anything. If something *is* flowing, capture what it points at before changing anything.

**Step 2 — Migrate to iCloud+ Custom Email Domain.**
Vijay has an existing **iCloud+ family subscription** (which includes Custom Email Domain support — up to 5 domains, 3 addresses per domain). Plan:

1. In **Apple iCloud Settings → iCloud+ → Custom Email Domain**, add `ezziclarity.ca` and follow Apple's verification flow.
2. Apple will provide the records to add at Cloudflare DNS:
   - **MX** records pointing to `mx01.mail.icloud.com` and `mx02.mail.icloud.com`
   - **TXT** verification record (a string Apple generates)
   - **SPF** record (`v=spf1 include:icloud.com ~all`) — replaces the wpcloud entry
   - **DKIM** TXT record (a `selector._domainkey.ezziclarity.ca` CNAME or TXT, per Apple's instructions)
3. **Update DMARC** to something stricter once mail is flowing cleanly — `v=DMARC1; p=quarantine; rua=mailto:postmaster@ezziclarity.ca` is a reasonable next step (or stay at `p=none` until you've watched traffic for a week).
4. Configure the per-address aliases inside iCloud Custom Email Domain (e.g., `arva@ezziclarity.ca`, `info@ezziclarity.ca`) and route them to the right family member's iCloud inbox.
5. Test: send to `arva@ezziclarity.ca` from an external account; send from `arva@ezziclarity.ca` to an external account; confirm both work.

### Risks / things to know

- **iCloud Custom Email Domain has a 5-domain / 3-address-per-domain cap** on the family plan. Worth a quick check that there's headroom.
- Apple's setup flow assumes you can edit DNS — since Cloudflare manages the apex DNS, that part is fine.
- DKIM is required for good deliverability. Don't skip it.
- DMARC at `p=reject` should be the eventual goal, but only after monitoring at `p=quarantine` for a week or two.

---

## `www → apex` canonical redirect

Both `ezziclarity.ca` and `www.ezziclarity.ca` resolve and serve identical content. No canonical URL is chosen yet, so search engines could in principle index both versions and split signal.

A Cloudflare Redirect Rule closes this in ~30 seconds:

- Cloudflare dashboard → `ezziclarity.ca` → **Rules → Redirect Rules → Create rule**
- Match: `Hostname equals www.ezziclarity.ca`
- Then: Static target `https://ezziclarity.ca`, preserve path + query, status `301`

Polish, not a fix. As of 2026-06-15 the on-page canonicals, hreflang cluster, and sitemap all elect the bare apex (`https://ezziclarity.ca/`), so search engines already have an unambiguous preferred host. The redirect rule is now belt-and-suspenders: it stops `www` from serving a 200 at all, rather than relying on crawlers to honour the canonical signal.

---

## Deferred SEO (post technical-foundation, 2026-06-15)

The technical SEO foundation shipped on 2026-06-15 (see [`CHANGELOG.md`](CHANGELOG.md)): absolute canonicals, a trilingual hreflang cluster, JSON-LD (`WebSite` / `ProfessionalService` / `Person` / `WebPage`), `og:locale`, an absolute `sitemap.xml`, and `robots.txt`. The following were consciously left for later:

- **BreadcrumbList schema.** Add a `BreadcrumbList` node to inner pages (Home > Section) once the navigation hierarchy is worth surfacing as rich results. Low effort, deferred only because the site is shallow.
- **`sameAs` links.** The `ProfessionalService` node has no `sameAs` yet because there are no real social or directory profiles to point at. Add them (LinkedIn, Instagram, Google Business Profile URL, etc.) once those accounts actually exist. Do not invent placeholder URLs.
- **Per-page Open Graph images.** Every page currently shares the one `og-ezzi-clarity.png`. Per-page or per-section OG images would improve link previews; deferred until there is art worth differentiating (pairs naturally with the Books cover art item above).
- **Off-site actions (manual, off-repo).** These cannot be done from the repo and need Vijay:
  - **Google Business Profile.** Create and verify the business listing so the brand can appear in Maps and the local knowledge panel.
  - **Search Console + Bing Webmaster Tools.** Verify domain ownership in both, then submit `https://ezziclarity.ca/sitemap.xml` so the new sitemap is picked up and indexing can be monitored.

---

## Design follow-ups (post Soft Modern redesign, 2026-06-11)

Deferred consciously during the redesign (spec: `docs/superpowers/specs/2026-06-11-soft-modern-redesign-design.md`):

- **Founder portrait opt-in.** The About pages' `.founder-frame` ships as a gradient placeholder. `assets/images/arva-portrait.png` already exists in the repo; dropping it in is a one-line edit per language (an `<img>` inside the frame — `.founder-frame img` styling is already in place). Waiting on Vijay's call.
- **Books cover art.** The Books pages' "Coming soon / In development" cards are designed to take real cover images (`.service-card-img` + tint-overlay pattern) without redesign, once artwork exists.
- **Resources reveal stagger.** The design spec mentioned a gentle stagger on the nine resources cards; reveals currently fire per section container. A small `transition-delay` ladder would close it. Cosmetic.
- **Real-device visual pass.** The redesign was verified by automated sweep + desktop browser; a quick pass on a real phone/tablet (especially the AR pages) would be good diligence.

---

## Done

See [`CHANGELOG.md`](CHANGELOG.md) for items that have shipped (the Soft Modern redesign, the two-pillar Consulting + Books restructure, the www custom domain, the WordPress cleanup, the project documentation).
