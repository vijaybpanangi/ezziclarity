#!/usr/bin/env python3
"""Checks the wiki source in docs/wiki before it is published.

- no em dashes or en dashes anywhere (house rule)
- every [text](Page-Name) link points at a page that exists
- every image reference points at a file that exists
- every content page has a breadcrumb, an "At a glance" note,
  a "Last checked" line and a collapsible Sources block
"""
import pathlib
import re
import sys

root = pathlib.Path(sys.argv[1] if len(sys.argv) > 1 else "docs/wiki")
pages = {p.stem for p in root.glob("*.md")}
errors = []

link_re = re.compile(r"(?<!!)\[[^\]]*\]\(([^)\s]+)\)")
img_re = re.compile(r"!\[[^\]]*\]\(([^)\s]+)\)")

for md in sorted(root.glob("*.md")):
    text = md.read_text(encoding="utf-8")
    for n, line in enumerate(text.splitlines(), 1):
        if "\u2014" in line or "\u2013" in line:
            errors.append(f"{md.name}:{n}: em or en dash")
    for target in link_re.findall(text):
        if re.match(r"^(https?:|mailto:|#)", target):
            continue
        page = target.split("#", 1)[0]
        if page and page not in pages:
            errors.append(f"{md.name}: link to missing page '{page}'")
    for target in img_re.findall(text):
        if target.startswith("http"):
            continue
        if not (root / target).exists():
            errors.append(f"{md.name}: missing image '{target}'")
    if md.name.startswith("_"):
        continue
    for needle, label in [
        ("[!NOTE]", "At a glance note"),
        ("**At a glance.**", "At a glance note"),
        ("**Last checked:**", "Last checked line"),
        ("<summary>Sources</summary>", "Sources block"),
    ]:
        if needle not in text:
            errors.append(f"{md.name}: missing {label}")
    if md.stem != "Home" and not text.startswith("[Home](Home)"):
        errors.append(f"{md.name}: missing breadcrumb")

if errors:
    print("\n".join(errors))
    sys.exit(1)
print(f"{len(pages)} wiki pages checked, all good.")
