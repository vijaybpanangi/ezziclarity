// Renders every ```mermaid block in docs/wiki/*.md in headless Chromium
// and reports any diagram that fails to parse. Optional: writes PNGs.
//
//   node .github/scripts/render_mermaid.js docs/wiki [out-dir]
//
// Needs Playwright with Chromium, and network access to cdn.jsdelivr.net.
const fs = require('fs');
const path = require('path');
const { chromium } = require('playwright');

const dir = process.argv[2] || 'docs/wiki';
const outDir = process.argv[3];
const MERMAID = 'https://cdn.jsdelivr.net/npm/mermaid@11.4.1/dist/mermaid.min.js';

(async () => {
  const blocks = [];
  for (const f of fs.readdirSync(dir).filter((f) => f.endsWith('.md')).sort()) {
    const text = fs.readFileSync(path.join(dir, f), 'utf8');
    const re = /```mermaid\n([\s\S]*?)```/g;
    let m, i = 0;
    while ((m = re.exec(text))) blocks.push({ name: `${f.replace('.md', '')}-${++i}`, code: m[1] });
  }
  const browser = await chromium.launch();
  const page = await browser.newPage({ viewport: { width: 1200, height: 900 }, deviceScaleFactor: 1 });
  await page.setContent('<html><body style="background:#fff"><div id="o"></div></body></html>');
  await page.addScriptTag({ url: MERMAID });
  await page.evaluate(() => mermaid.initialize({ startOnLoad: false, theme: 'default', securityLevel: 'loose' }));
  let failed = 0;
  if (outDir) fs.mkdirSync(outDir, { recursive: true });
  for (const b of blocks) {
    const res = await page.evaluate(async ({ id, code }) => {
      try {
        const { svg } = await mermaid.render(id, code);
        document.getElementById('o').innerHTML = svg;
        return { ok: true };
      } catch (e) {
        return { ok: false, err: String(e && e.message ? e.message : e) };
      }
    }, { id: 'd' + b.name.replace(/[^a-z0-9]/gi, ''), code: b.code });
    if (!res.ok) { failed++; console.log(`FAIL ${b.name}: ${res.err.split('\n')[0]}`); continue; }
    console.log(`ok   ${b.name}`);
    if (outDir) await (await page.$('#o svg')).screenshot({ path: path.join(outDir, b.name + '.png') });
  }
  await browser.close();
  console.log(`${blocks.length - failed} of ${blocks.length} diagrams rendered.`);
  process.exit(failed ? 1 : 0);
})();
