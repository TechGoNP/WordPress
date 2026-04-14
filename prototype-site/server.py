#!/usr/bin/env python3
import json
from datetime import datetime, timezone
from http.server import BaseHTTPRequestHandler, HTTPServer
from pathlib import Path

ROOT = Path(__file__).resolve().parent
DATA_DIR = ROOT / "data"
DATA_DIR.mkdir(parents=True, exist_ok=True)

ROUTE_TO_FILE = {
    "/submit/host-intake": "host_intake.jsonl",
    "/submit/trip-request": "trip_request.jsonl",
    "/submit/chapter-request": "chapter_request.jsonl",
    "/submit/scholarship": "scholarship.jsonl",
}

class Handler(BaseHTTPRequestHandler):
    def _json(self, code, body):
        self.send_response(code)
        self.send_header("Content-Type", "application/json")
        self.send_header("Access-Control-Allow-Origin", "*")
        self.send_header("Access-Control-Allow-Headers", "Content-Type")
        self.send_header("Access-Control-Allow-Methods", "POST, OPTIONS")
        self.end_headers()
        self.wfile.write(json.dumps(body).encode("utf-8"))

    def do_OPTIONS(self):
        self._json(200, {"ok": True})

    def do_POST(self):
        if self.path not in ROUTE_TO_FILE:
            self._json(404, {"error": "Unknown endpoint"})
            return

        length = int(self.headers.get("Content-Length", "0"))
        if length == 0:
            self._json(400, {"error": "Missing body"})
            return

        try:
            payload = json.loads(self.rfile.read(length).decode("utf-8"))
            if not isinstance(payload, dict):
                raise ValueError("Body must be object")
        except Exception as e:
            self._json(400, {"error": f"Invalid JSON: {e}"})
            return

        record = {
            "submitted_at": datetime.now(timezone.utc).isoformat(),
            "payload": payload,
        }

        out_file = DATA_DIR / ROUTE_TO_FILE[self.path]
        with out_file.open("a", encoding="utf-8") as f:
            f.write(json.dumps(record, ensure_ascii=False) + "\n")

        self._json(201, {"ok": True})

if __name__ == "__main__":
    server = HTTPServer(("0.0.0.0", 8787), Handler)
    print("Prototype API listening on http://localhost:8787")
    server.serve_forever()
