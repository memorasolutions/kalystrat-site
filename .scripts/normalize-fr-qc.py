#!/usr/bin/env python3
"""Normalisation FR-QC des fichiers Blade Kalystrat.

Règles (decision user 2026-05-09) :
- Em-dash (U+2014) → tiret court avec espaces
- Apostrophe droite ' (U+0027) → typographique ' (U+2019), sauf dans attributs HTML
- Espace insécable avant : ; ! ? %
- Les acronymes restent en majuscules
- Préserve directives Blade @if @php @foreach et JSON-LD

Usage : python3 .scripts/normalize-fr-qc.py [<fichier>...]
Sans argument : applique sur Modules/Frontend/resources/views/partials/**/*.blade.php
"""
from __future__ import annotations

import re
import sys
from pathlib import Path

PROJECT_ROOT = Path(__file__).resolve().parent.parent

# Apostrophes droites dans le texte. Toutes remplacées dans les zones non-préservées.
APOSTROPHE_RE = re.compile(r"'")

# Em-dash
EM_DASH_RE = re.compile(r"\s*—\s*")

# Espace avant : ; ! ? % qui n'est pas déjà insécable
NBSP_PUNCT_RE = re.compile(r" ([:;!?%])")

# Régions à preserver : @php...@endphp, JSON-LD scripts, attributs HTML, classes CSS
PRESERVE_RE = re.compile(
    r"(@php.*?@endphp"
    r"|<script\b[^>]*?>.*?</script>"
    r"|<style\b[^>]*?>.*?</style>"
    r"|\{!!.*?!!\}"  # Blade non-échappé
    r"|\{\{.*?\}\}"  # Blade {{ }} avant les tags HTML (cas $loop->even)
    r"|@[a-zA-Z]+\([^)]*\)"
    r"|<[a-zA-Z][^>]*?>)"
    , re.DOTALL,
)


def normalize_text(text: str) -> str:
    """Applique les règles FR-QC en préservant les zones HTML/Blade."""
    parts: list[str] = []
    last = 0
    for match in PRESERVE_RE.finditer(text):
        # Texte hors balises : on normalise
        outside = text[last:match.start()]
        outside = APOSTROPHE_RE.sub("’", outside)
        outside = EM_DASH_RE.sub(" - ", outside)
        outside = NBSP_PUNCT_RE.sub(" \\1", outside)
        parts.append(outside)
        # Zone préservée : on garde tel quel
        parts.append(match.group(0))
        last = match.end()
    # Reste après dernière balise
    tail = text[last:]
    tail = APOSTROPHE_RE.sub("’", tail)
    tail = EM_DASH_RE.sub(" - ", tail)
    tail = NBSP_PUNCT_RE.sub(" \\1", tail)
    parts.append(tail)
    return "".join(parts)


def process_file(path: Path) -> bool:
    """Normalise un fichier. Retourne True si modifié."""
    original = path.read_text(encoding="utf-8")
    normalized = normalize_text(original)
    if normalized != original:
        path.write_text(normalized, encoding="utf-8")
        return True
    return False


def main() -> int:
    if len(sys.argv) > 1:
        targets = [Path(arg).resolve() for arg in sys.argv[1:]]
    else:
        partials = PROJECT_ROOT / "Modules/Frontend/resources/views/partials"
        targets = list(partials.rglob("*.blade.php"))

    modified = 0
    for target in targets:
        if not target.exists():
            print(f"SKIP {target} (introuvable)", file=sys.stderr)
            continue
        if process_file(target):
            modified += 1
            print(f"OK   {target.relative_to(PROJECT_ROOT)}")
        else:
            print(f"SAME {target.relative_to(PROJECT_ROOT)}")

    print(f"\nTotal : {modified}/{len(targets)} fichiers modifiés")
    return 0


if __name__ == "__main__":
    sys.exit(main())
