#!/usr/bin/env bash
# Audit preventive : détecte les classes ri-* utilisées dans les Blades
# qui sont absentes du subset kalystrat-icons.css (43 glyphes optimisés S27).
#
# Usage : bash .scripts/audit-icons-vs-subset.sh
# Exit code : 0 = OK, 1 = classes manquantes détectées.
#
# Référence : T28-S30 — régression dormante 7 occurrences ri-*-line manquantes
# du subset (woff2 -98% poids vs RemixIcon natif 159 KB → 3.5 KB).
# Voir .handoffs/audit_visuel_S30_final/SYNTHESIS.md.

set -euo pipefail

PROJECT_ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
VIEWS_DIR="$PROJECT_ROOT/Modules/Frontend/resources/views"
SUBSET_FILE="$PROJECT_ROOT/public/assets/fonts/icons/kalystrat-icons.css"

if [ ! -f "$SUBSET_FILE" ]; then
    echo "ERROR: subset file introuvable : $SUBSET_FILE" >&2
    exit 2
fi

# Classes ri-* utilisées dans le markup (pas dans les règles CSS hostile).
# Cible : <i class="ri-..."> ou <i ... class="ri-...">.
USED=$(grep -rhoE '<i [^>]*class="[^"]*ri-[a-z0-9-]+' "$VIEWS_DIR" 2>/dev/null \
    | grep -oE 'ri-[a-z0-9-]+' \
    | sort -u)

# Classes ri-* définies dans le subset.
DEFINED=$(grep -E '^\.ri-' "$SUBSET_FILE" \
    | grep -oE '\.ri-[a-z0-9-]+' \
    | sed 's/^\.//' \
    | sort -u)

# Diff : classes utilisées non définies.
MISSING=$(comm -23 <(echo "$USED") <(echo "$DEFINED"))

if [ -z "$MISSING" ]; then
    USED_COUNT=$(echo "$USED" | wc -l | tr -d ' ')
    DEFINED_COUNT=$(echo "$DEFINED" | wc -l | tr -d ' ')
    echo "OK — toutes les $USED_COUNT classes ri-* utilisées sont définies dans le subset ($DEFINED_COUNT classes)."
    exit 0
fi

MISSING_COUNT=$(echo "$MISSING" | wc -l | tr -d ' ')
echo "FAIL — $MISSING_COUNT classe(s) ri-* manquante(s) du subset kalystrat-icons :"
echo ""
while IFS= read -r class; do
    if [ -n "$class" ]; then
        echo "  - $class"
        # Localiser l'occurrence pour debug rapide.
        grep -rln "class=\"[^\"]*${class}\b" "$VIEWS_DIR" 2>/dev/null | head -3 | sed 's|^|      |'
    fi
done <<< "$MISSING"

echo ""
echo "Solutions :"
echo "  1. Remplacer la classe par une version équivalente présente dans le subset"
echo "     (ex : ri-shield-check-line → ri-shield-check-fill)"
echo "  2. Ajouter la classe au subset + régénérer kalystrat-icons.woff2 (lourd)"
echo "  3. Importer remixicon natif en fallback (159 KB → revert gain S27)"
echo ""
echo "Subset référence : $SUBSET_FILE"
exit 1
