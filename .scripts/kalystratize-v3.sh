#!/bin/bash
# v3 = v2 + S3 (service titles) + S4 (photos paths) + S8 (FAQ menu)
INPUT=$1
OUTPUT=$2

bash .scripts/kalystratize-v2.sh "$INPUT" /tmp/_kalystrat_step1.tmp

sed \
  -e 's|>General construction <|>Kalystrat Fondations <|g' \
  -e 's|>General construction</h5>|>Kalystrat Fondations</h5>|g' \
  -e 's|>General construction<|>Kalystrat Fondations<|g' \
  -e 's|>Property maintenance <|>Kalystrat Structure <|g' \
  -e 's|>Property maintenance</h5>|>Kalystrat Structure</h5>|g' \
  -e 's|>Property maintenance<|>Kalystrat Structure<|g' \
  -e 's|>Project management <|>Kalystrat Toiture <|g' \
  -e 's|>Project management</h5>|>Kalystrat Toiture et Enveloppe</h5>|g' \
  -e 's|>Project management<|>Kalystrat Toiture<|g' \
  -e 's|>Renovation & Remodeling <|>Kalystrat Finition <|g' \
  -e 's|>Renovation & Remodeling</h5>|>Kalystrat Finition Intérieure</h5>|g' \
  -e 's|>Renovation & Remodeling<|>Kalystrat Finition<|g' \
  -e 's|>Preconstruction <|>Kalystrat Immobilier <|g' \
  -e 's|>Preconstruction</h5>|>Kalystrat Immobilier</h5>|g' \
  -e 's|>Preconstruction<|>Kalystrat Immobilier<|g' \
  -e "s|construz-new/img/hero/hero_bg_5_1\\.png|kalystrat/hero-skyline.jpg|g" \
  -e "s|construz-new/img/hero/hero_bg_5_2\\.png|kalystrat/hero-bg.jpg|g" \
  -e "s|construz-new/img/hero/hero_bg_5_3\\.png|kalystrat/about-bg.jpg|g" \
  -e "s|construz-new/img/normal/about_5-1\\.png|kalystrat/about-strategy.jpg|g" \
  -e "s|construz-new/img/normal/about_5-2\\.png|kalystrat/about-meeting.jpg|g" \
  -e "s|construz-new/img/normal/benefit-thumb5-1\\.png|kalystrat/about-meeting.jpg|g" \
  -e "s|construz-new/img/project/project5_1\\.png|kalystrat/project-residential.jpg|g" \
  -e "s|construz-new/img/project/project5_2\\.png|kalystrat/project-blueprint.jpg|g" \
  -e "s|construz-new/img/project/project5_3\\.png|kalystrat/project-commercial.jpg|g" \
  -e "s|construz-new/img/project/project5_4\\.png|kalystrat/project-apartments.jpg|g" \
  -e "s|construz-new/img/project/project5_5\\.png|kalystrat/about-meeting.jpg|g" \
  -e "s|construz-new/img/normal/about_2-1\\.png|kalystrat/about-strategy.jpg|g" \
  -e "s|<li>$|<li>|g" \
  -e 's|<li><a href="{{ route('"'"'frontend.contact'"'"') }}">NOUS JOINDRE</a></li>|<li><a href="{{ route('"'"'frontend.faq'"'"') }}">FAQ</a></li><li><a href="{{ route('"'"'frontend.contact'"'"') }}">NOUS JOINDRE</a></li>|' \
  /tmp/_kalystrat_step1.tmp > "$OUTPUT"

rm -f /tmp/_kalystrat_step1.tmp
echo "OK v3: $INPUT → $OUTPUT ($(wc -l < $OUTPUT) lignes)"
