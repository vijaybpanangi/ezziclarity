# Project documentation

This folder holds design specs and implementation plans produced through the **superpowers** workflow Claude uses on this project.

- `specs/` — design specs (the *what* and *why*). One markdown file per project, named `YYYY-MM-DD-<topic>-design.md`. Each spec captures the locked-in decisions from a brainstorming session before any code is written.
- `plans/` — implementation plans (the *how*). One markdown file per project, named `YYYY-MM-DD-<topic>.md`. Each plan decomposes a spec into bite-sized, sequenced tasks with exact code, file paths, and verification commands.

The convention is: brainstorm → spec → plan → execute. Specs and plans are committed to git so the reasoning travels with the code.
