#!/usr/bin/env python3
"""
T37-S30 — Batch migration <i class="ri-X-(line|fill)"> → <x-frontend::icon name="X"/>

Élimine définitivement le pattern régression "icône mal centrée" causé par la
police custom kalystrat-icons (subset 43 glyphes S27 mal centrés dans em-box).

EXCLUSION : ri-arrow-right-line est PRÉSERVÉ pour respecter les compensations
CSS .btn i transforms (layout.blade.php:1564-1573).
"""
import os
import re
import sys
from pathlib import Path

CLASS_TO_NAME = {
    "ri-line-chart-line": "line-chart",
    "ri-checkbox-circle-fill": "checkbox-circle",
    "ri-shield-check-fill": "shield-check",
    "ri-shield-star-fill": "shield-star",
    "ri-home-heart-fill": "home-heart",
    "ri-customer-service-2-fill": "customer-service",
    "ri-star-fill": "star",
    "ri-play-fill": "play",
    "ri-phone-line": "phone",
    "ri-time-line": "time",
    "ri-team-line": "team",
    "ri-mail-line": "mail",
    "ri-map-pin-line": "map-pin",
    "ri-building-line": "building",
    "ri-building-2-line": "building-2",
    "ri-building-3-line": "building-3",
    "ri-paint-brush-line": "paint-brush",
    "ri-compass-3-line": "compass",
    "ri-dashboard-3-line": "dashboard",
    "ri-refresh-line": "refresh",
    "ri-links-line": "links",
    "ri-award-line": "award",
    "ri-git-merge-line": "git-merge",
    "ri-home-4-line": "home",
}

EXCLUDED_CLASSES = {"ri-arrow-right-line"}


def should_exclude(filepath: str) -> bool:
    if ".bak" in filepath or "before-img-cleanup" in filepath:
        return True
    if filepath.endswith("components/icon.blade.php"):
        return True
    return False


def replace_icons_in_file(filepath: str) -> None:
    with open(filepath, "r", encoding="utf-8") as f:
        content = f.read()

    original_content = content
    touched_classes = set()
    count = 0

    pattern = r'<i\s+([^>]*?\bclass\s*=\s*["\'])([^"\']*?\b(ri-[a-z0-9-]+-(?:line|fill))[^"\']*?)["\']([^>]*?)>(\s*</i>)?'

    def replace_match(match):
        nonlocal count
        full_class_attr = match.group(2)
        icon_class = match.group(3)
        other_attrs = match.group(4) or ""

        if icon_class in EXCLUDED_CLASSES:
            return match.group(0)
        if icon_class not in CLASS_TO_NAME:
            return match.group(0)

        name = CLASS_TO_NAME[icon_class]
        touched_classes.add(icon_class)
        count += 1

        style_match = re.search(r'style\s*=\s*["\']([^"\']*)["\']', other_attrs)
        style_comment = ""
        if style_match:
            style_value = style_match.group(1)
            if style_value.strip():
                style_comment = f" {{{{-- TODO T37 style: {style_value} --}}}}"

        return f'<x-frontend::icon name="{name}"/>{style_comment}'

    content = re.sub(pattern, replace_match, content, flags=re.IGNORECASE)

    if content != original_content:
        with open(filepath, "w", encoding="utf-8") as f:
            f.write(content)
        print(f"{filepath}: {count} replacement(s) - classes: {', '.join(sorted(touched_classes))}")
    return count


def main():
    base_dir = Path("Modules/Frontend/resources/views")
    if not base_dir.exists():
        print("Error: Base directory not found", file=sys.stderr)
        sys.exit(1)

    total = 0
    blade_files = sorted(base_dir.rglob("*.blade.php"))
    for filepath in blade_files:
        filepath_str = str(filepath)
        if should_exclude(filepath_str):
            continue
        total += replace_icons_in_file(filepath_str) or 0

    print(f"\n=== TOTAL : {total} substitution(s) ===")


if __name__ == "__main__":
    main()
