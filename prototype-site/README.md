# Prototype: LGBT IRL Connection Platform (Milestone 0)

This is a **prototype-first** implementation of the first major chunk described in `INITIAL_PLAN.md`.

## What's included
- Public website scaffold with key MVP pages.
- Working intake forms (host intake, trip request, chapter request, scholarship application).
- Lightweight local persistence to JSON files for submissions.
- Foundation docs for data model, RBAC, and policy baselines.

## Run locally
```bash
python3 -m http.server 8080 -d prototype-site/public
```
Then open: `http://localhost:8080`

> Note: Forms submit to `/submit/*` via POST and require running the helper API:

```bash
python3 prototype-site/server.py
```

API runs at `http://localhost:8787`.

## Prototype constraints
- No auth yet.
- No payment integration yet.
- No moderation queue UI yet.
- Intended for validating structure and flows rapidly.
