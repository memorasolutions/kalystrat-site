#!/usr/bin/env bash
# Adaptation déterministe Kalystrat du thème InTime index-6.html.
# Source : public/intime/index-6.html (jamais modifié, lu seul).
# Cible : Modules/Frontend/resources/views/home.blade.php (généré).
#
# Usage : bash .scripts/kalystratize-intime.sh
# Idempotent : peut être relancé après modification du source.

set -euo pipefail

PROJECT_ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
SOURCE="$PROJECT_ROOT/public/intime/index-6.html"
TARGET="$PROJECT_ROOT/Modules/Frontend/resources/views/home.blade.php"

if [ ! -f "$SOURCE" ]; then
    echo "ERROR: source introuvable : $SOURCE" >&2
    exit 1
fi

cp "$SOURCE" "$TARGET"

# Adaptation chemins assets (relatifs → absolus /intime/)
sed -i.tmp \
    -e 's|href="css/|href="/intime/css/|g' \
    -e 's|href="js/|href="/intime/js/|g' \
    -e 's|src="js/|src="/intime/js/|g' \
    -e 's|src="images/|src="/intime/images/|g' \
    -e 's|href="images/|href="/intime/images/|g' \
    -e 's|url(images/|url(/intime/images/|g' \
    -e 's|url("images/|url("/intime/images/|g' \
    -e "s|url('images/|url('/intime/images/|g" \
    "$TARGET"

# Adaptation HTML lang + meta
sed -i.tmp \
    -e 's|<html>|<html lang="fr-CA">|' \
    -e 's|<title>In-Time Businees Consulting Businees HTML-5 Template \| Homepage 06</title>|<title>Kalystrat — Holding québécois de construction à intégration verticale</title>|' \
    "$TARGET"

# Adaptation liens internes (.html → routes Laravel)
sed -i.tmp \
    -e 's|href="index\.html"|href="/"|g' \
    -e 's|href="index-2\.html"|href="/"|g' \
    -e 's|href="index-3\.html"|href="/"|g' \
    -e 's|href="index-4\.html"|href="/"|g' \
    -e 's|href="index-5\.html"|href="/"|g' \
    -e 's|href="index-6\.html"|href="/"|g' \
    -e 's|href="index-7\.html"|href="/"|g' \
    -e 's|href="about\.html"|href="/a-propos"|g' \
    -e 's|href="team\.html"|href="/equipe"|g' \
    -e 's|href="testimonial\.html"|href="/projets"|g' \
    -e 's|href="services\.html"|href="/services"|g' \
    -e 's|href="service-detail\.html"|href="/services"|g' \
    -e 's|href="projects\.html"|href="/projets"|g' \
    -e 's|href="blog\.html"|href="/blog"|g' \
    -e 's|href="blog-classic\.html"|href="/blog"|g' \
    -e 's|href="blog-detail\.html"|href="/blog"|g' \
    -e 's|href="not-found\.html"|href="/"|g' \
    -e 's|href="contact\.html"|href="/contact"|g' \
    "$TARGET"

# Adaptation textes navigation principaux + CTAs (préserve la casse Construz)
sed -i.tmp \
    -e 's|>Home<|>Accueil<|g' \
    -e 's|>About<|>À propos<|g' \
    -e 's|>Services<|>Services<|g' \
    -e 's|>project<|>Réalisations<|g' \
    -e 's|>Project<|>Réalisations<|g' \
    -e 's|>Blog<|>Blog<|g' \
    -e 's|>Contact<|>Contact<|g' \
    -e 's|>Get A Quote<|>Obtenir une soumission<|g' \
    -e 's|>Learn more<|>Découvrir le groupe<|g' \
    -e 's|>Learn More<|>Découvrir le groupe<|g' \
    -e 's|>LEARN MORE<|>DÉCOUVRIR LE GROUPE<|g' \
    "$TARGET"

# Section 3-cols features (Business / Critical / Profit) → Kalystrat
sed -i.tmp \
    -e 's|>Business solution<|>Six filiales spécialisées<|g' \
    -e 's|>Critical Analysis<|>Intégration verticale<|g' \
    -e 's|>Profit Allocaton<|>Main-d\&apos;œuvre interne<|g' \
    -e 's|>Profit Allocation<|>Main-d\&apos;œuvre interne<|g' \
    "$TARGET"

# Lorem ipsum génériques → textes Kalystrat (à raffiner par section après visualisation)
# Note : on remplace seulement la 1ère occurrence de chaque pour ne pas casser les répétitions InTime.
# Les textes des cards 3-cols seront édités manuellement section par section au besoin.
sed -i.tmp \
    -e 's|>Duis aute irure dolor in reprehend in voluptate velit esse<|>Du chantier à la livraison, six métiers sous une seule marque<|' \
    "$TARGET"

# Adaptation hero textes (slogan + titre + description)
# Le H1 du thème InTime contient "We Make <br> Finance" (saut de ligne entre les 2 mots).
# On remplace le bloc complet pour passer au texte Kalystrat.
sed -i.tmp \
    -e 's|When You Make it|Conçu, réalisé, livré|g' \
    -e 's|When You Make It|Conçu, réalisé, livré|g' \
    -e 's|WHEN YOU MAKE IT|CONÇU, RÉALISÉ, LIVRÉ|g' \
    -e 's|<h1 class="slider-six_heading">We Make <br> Finance </h1>|<h1 class="slider-six_heading">Bâtir le Québec <br> sous une seule marque</h1>|g' \
    -e 's|Lorem ipsum dolor sit amet, consectetur <br> adip isicing elit, sed do eiusmod|Six filiales spécialisées, une marque unifiée. Du chantier à la livraison, Kalystrat orchestre votre projet de construction au Québec.|g' \
    "$TARGET"

# Cleanup tmp files
rm -f "$TARGET.tmp"

echo "✅ home.blade.php régénéré : $(wc -l < "$TARGET") lignes"
echo "Source intact : $(wc -l < "$SOURCE") lignes"
