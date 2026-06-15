# Roadmap

Future updates and deferred items for ezziclarity.ca. Items here have no fixed timeline — they're surfaced so any future session (Vijay's, mine, or another Claude's) sees the gaps and can pick them up at the right moment. Once an item ships, it moves to [`CHANGELOG.md`](CHANGELOG.md).

## Email setup for the domain — DONE (2026-06-15)

Live on **iCloud+ Custom Email Domain** (see [`CHANGELOG.md`](CHANGELOG.md)). Set up under Vijay's iCloud+ family subscription; addresses `info@ezziclarity.ca` (Vijay) and `arva@ezziclarity.ca` (Arva Ezzi, Family). Records: MX → `mx01`/`mx02.mail.icloud.com`; iCloud DKIM CNAME at `sig1._domainkey`; `apple-domain` verification TXT (keep permanently).

The 2026-06-15 housekeeping pass cleaned the two TXT records the iCloud onboarding had left mixed with legacy values:

- **SPF** trimmed to `v=spf1 include:spf.titan.email include:icloud.com ~all`. The WordPress.com-era `include:_spf.wpcloud.com` was removed (the site is fully on Cloudflare Pages now — nothing sends from WordPress.com). **Titan was deliberately kept** because Titan booking (`book.titan.email/ezziclarity/intro`, still linked on the contact pages in all three languages) is still in active use and Titan has its own live DKIM key published at `titan1._domainkey.ezziclarity.ca`. So there are two legitimate senders (iCloud mailbox + Titan booking) and two DKIM selectors (`sig1` iCloud, `titan1` Titan).
- **DMARC** upgraded from the inert `v=DMARC1;p=none;` to `v=DMARC1; p=none; rua=mailto:info@ezziclarity.ca; fo=1`, so aggregate reports now actually arrive at `info@` (an address that exists and is read). Still monitor-only.

Verified via `bash docs/superpowers/tools/check-email-dns.sh ezziclarity.ca` (the helper lives in the awonderfullife repo; it takes a domain arg) cross-checked against the Cloudflare 1.1.1.1 resolver.

**Remaining:**

- **DMARC ladder.** After ~1–2 weeks of clean `rua` reports at `info@`, tighten `p=none → quarantine → reject`. Keep `~all` (not `-all`) — the recipient-side Proofpoint relay on Vijay's work inbox softfails the relay hop, and DKIM (not SPF) carries DMARC through; `-all` would only add deliverability risk.
- **When Titan booking is retired** (the booking feature is still in use as of 2026-06-15; a better-fit replacement is still TBD), drop **both** `include:spf.titan.email` from the SPF **and** the `titan1._domainkey` TXT in the same change, leaving the apex SPF iCloud-only.
- **Newsletter foresight.** If a bulk sender (e.g. Resend) is ever added, send from a subdomain (e.g. `send.ezziclarity.ca`) with its own SPF/DKIM/DMARC, keeping the apex SPF for the mailbox + booking senders only.

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
- **Cloudflare prepends a managed `robots.txt`.** The live `robots.txt` is not byte-identical to the repo file. Cloudflare's AI Crawl Control feature injects a managed block ahead of our content: a `Content-Signal: search=yes,ai-train=no` header plus `Disallow: /` groups for AI crawlers (GPTBot, ClaudeBot, Google-Extended, Bytespider, CCBot, and others). Our `User-agent: * / Allow: /` and the `Sitemap:` directive are still served at the end, so search crawlers (Googlebot, Bingbot) are allowed and the sitemap is advertised. The SEO outcome is correct, but the managed prepend produces a second `User-agent: *` group and is not visible in the repo. To serve exactly the committed file instead, turn off the managed robots.txt / AI Crawl Control toggle in the Cloudflare dashboard (`ezziclarity.ca` → AI Crawl Control / Bots). Left on by default for now since it usefully blocks AI training crawlers without harming search indexing.
- **Off-site actions (manual, off-repo).** These cannot be done from the repo and need Vijay:
  - **Google Business Profile.** Create and verify the business listing so the brand can appear in Maps and the local knowledge panel.
  - **Search Console + Bing Webmaster Tools.** Verify domain ownership in both, then submit `https://ezziclarity.ca/sitemap.xml` so the new sitemap is picked up and indexing can be monitored.

---

## Design follow-ups (post Soft Modern redesign, 2026-06-11)

Deferred consciously during the redesign (spec: `docs/superpowers/specs/2026-06-11-soft-modern-redesign-design.md`):

- **Founder portrait — swap for a professional headshot.** Opted in on 2026-06-15: the `.founder-frame` on all three About pages now shows a founder portrait (`assets/images/arva-founder.jpg` — an optimized, EXIF-stripped 900×1200 derivative of the existing casual `arva-portrait.png`, which is kept as the high-res source). This is an interim image used as-is (no on-page "placeholder" labelling, by Vijay's call); the intent is to **swap in a proper professional headshot** when one exists. To swap: replace `arva-founder.jpg` (or point the three `<img src>`s at the new file) — `.founder-frame img` styling and the translated `alt` are already in place. The conflict-of-interest/visibility angle (Arva's full-time UofT role) was weighed and accepted.
- **Books cover art.** The Books pages' "Coming soon / In development" cards are designed to take real cover images (`.service-card-img` + tint-overlay pattern) without redesign, once artwork exists.
- **Resources reveal stagger.** The design spec mentioned a gentle stagger on the nine resources cards; reveals currently fire per section container. A small `transition-delay` ladder would close it. Cosmetic.
- **Real-device visual pass.** The redesign was verified by automated sweep + desktop browser; a quick pass on a real phone/tablet (especially the AR pages) would be good diligence.

---

## Done

See [`CHANGELOG.md`](CHANGELOG.md) for items that have shipped (the Soft Modern redesign, the two-pillar Consulting + Books restructure, the www custom domain, the WordPress cleanup, the project documentation).
