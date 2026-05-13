{{-- T198-D2 — Refonte design 2026 : Hero magazine + Timeline + 3 contraintes + Trust --}}

<section class="ks-section ks-page-section">
    <div class="ks-container">
        <div class="ks-bento ks-bento--split-photo ks-fade-in" style="display:grid;grid-template-columns:1fr 1fr;gap:clamp(24px, 3vw, 48px);align-items:center">
            <figure style="margin:0;overflow:hidden;border-radius:var(--ks-radius-lg);box-shadow:var(--ks-shadow-card)">
                <img src="/intime/images/filiales/structure-method.webp" alt="Charpente bois en cours d'assemblage, poutres et fermes de toit visibles" loading="lazy" width="940" height="650" style="width:100%;height:auto;display:block;object-fit:cover;aspect-ratio:940/650">
            </figure>
            <div>
                <span class="ks-eyebrow" style="color:var(--ks-gold-aaa)">Pourquoi Kalystrat</span>
                <h2 class="ks-h2" style="margin-top:0.5rem">La charpente est le squelette qui soutient toute la performance</h2>
                <p class="ks-lead">Le choix bois, acier ou hybride n'est pas une préférence&nbsp;: c'est une décision technique qui détermine portée, sécurité incendie et performance énergétique. Au Québec, la neige (60 à 90&nbsp;kg/m²) et les vents dominants imposent des marges de calcul strictes.</p>
                <p class="ks-card__text">Chez Kalystrat Structure, chaque projet débute par une étude structurale rigoureuse selon le Code de construction du Québec — Chapitre I, Bâtiment. Matériaux certifiés (épinette-sapin-pin de qualité #2+, acier ASTM), calculs ingénieur sur projets &gt; 600&nbsp;m².</p>
            </div>
        </div>
    </div>
</section>

<section class="ks-section ks-section--alt ks-page-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left ks-fade-in">
            <span class="ks-eyebrow">Notre méthode</span>
            <h2 class="ks-h2">Cinq étapes pour une charpente performante</h2>
            <p class="ks-lead">De l'étude initiale à l'assemblage final, chaque chantier suit un protocole calibré pour la précision et la rapidité.</p>
        </div>

        <ol class="ks-timeline ks-fade-in" style="list-style:none;padding:0;margin-top:clamp(32px, 4vw, 56px);display:grid;grid-template-columns:repeat(auto-fit, minmax(220px, 1fr));gap:clamp(16px, 1.6vw, 24px);counter-reset:step">
            @php
            $etapes = [
                ['titre' => 'Étude structurale', 'desc' => 'Analyse des charges, neige, vent. Choix du système&nbsp;: bois, acier ou hybride.'],
                ['titre' => 'Conception ingénieur', 'desc' => 'Plans techniques certifiés. Justification calculs pour projets &gt; 600&nbsp;m².'],
                ['titre' => 'Préfabrication', 'desc' => 'Fermes, poutrelles, panneaux muraux assemblés en atelier contrôlé.'],
                ['titre' => 'Assemblage', 'desc' => 'Levage et assemblage sur site. Gain calendrier 30-40&nbsp;% vs charpente traditionnelle.'],
                ['titre' => 'Inspection finale', 'desc' => 'Vérification dimensionnelle, ancrages, conformité plans. Documentation complète.'],
            ];
            @endphp
            @foreach($etapes as $i => $etape)
            <li style="position:relative;padding:clamp(20px, 2.4vw, 28px);background:var(--ks-white);border-radius:var(--ks-radius-lg);border-top:3px solid var(--ks-gold-500);box-shadow:var(--ks-shadow-card)">
                <div style="font-size:clamp(2rem, 4vw, 2.75rem);font-weight:800;color:var(--ks-gold-aaa);line-height:1;letter-spacing:-0.02em">{{ str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) }}</div>
                <h3 class="ks-card__title" style="margin-top:0.75rem;margin-bottom:0.5rem">{{ $etape['titre'] }}</h3>
                <p class="ks-card__text" style="font-size:0.9375rem">{!! $etape['desc'] !!}</p>
            </li>
            @endforeach
        </ol>
    </div>
</section>

<section class="ks-section ks-page-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left ks-fade-in">
            <span class="ks-eyebrow">Spécificités québécoises</span>
            <h2 class="ks-h2">Trois enjeux que toute charpente doit gérer</h2>
        </div>
        <div class="ks-bento ks-bento--3col ks-fade-in" style="margin-top:clamp(24px, 3vw, 40px)">
            <article class="ks-card ks-card--accent-navy">
                <div class="ks-stat__number" style="color:var(--ks-navy-900);font-size:clamp(2rem, 3.5vw, 2.75rem);font-weight:800">90&nbsp;kg/m²</div>
                <h3 class="ks-card__title" style="margin-top:0.75rem">Charge de neige</h3>
                <p class="ks-card__text">Variable selon région (60 à 90&nbsp;kg/m²). Calculs neige + vent obligatoires Code QC, marges de sécurité élevées.</p>
            </article>
            <article class="ks-card ks-card--accent-navy">
                <div class="ks-stat__number" style="color:var(--ks-navy-900);font-size:clamp(2rem, 3.5vw, 2.75rem);font-weight:800">R-49</div>
                <h3 class="ks-card__title" style="margin-top:0.75rem">Isolation toiture 2026</h3>
                <p class="ks-card__text">Code de construction QC 2026. Charpente conçue dès le départ pour accueillir l'isolation pleine épaisseur.</p>
            </article>
            <article class="ks-card ks-card--accent-navy">
                <div class="ks-stat__number" style="color:var(--ks-navy-900);font-size:clamp(2rem, 3.5vw, 2.75rem);font-weight:800">−20&nbsp;%</div>
                <h3 class="ks-card__title" style="margin-top:0.75rem">Pertes matériaux</h3>
                <p class="ks-card__text">Préfabrication en atelier&nbsp;: précision dimensionnelle supérieure, économie matériaux jusqu'à 20&nbsp;% vs chantier.</p>
            </article>
        </div>
    </div>
</section>

<section class="ks-section ks-section--alt ks-page-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left ks-fade-in">
            <span class="ks-eyebrow">Conformité et certifications</span>
            <h2 class="ks-h2">Une charpente certifiée et garantie</h2>
            <p class="ks-lead">Kalystrat Structure Inc. opère sous licence RBQ et collabore systématiquement avec ingénieurs accrédités pour les projets complexes. Conformité Code QC + avis techniques CCMC.</p>
        </div>
        <div class="ks-bento ks-bento--3col ks-fade-in" style="margin-top:clamp(24px, 3vw, 40px)">
            <article class="ks-card ks-card--accent-gold" style="text-align:center;padding:clamp(20px, 2.4vw, 32px)">
                <div style="font-family:var(--ks-font-display);font-size:1.5rem;font-weight:800;color:var(--ks-navy-900);letter-spacing:0.04em">RBQ</div>
                <p class="ks-card__text" style="margin-top:0.5rem;font-size:0.9375rem">Licence catégories charpenterie résidentielle et commerciale légère</p>
            </article>
            <article class="ks-card ks-card--accent-gold" style="text-align:center;padding:clamp(20px, 2.4vw, 32px)">
                <div style="font-family:var(--ks-font-display);font-size:1.5rem;font-weight:800;color:var(--ks-navy-900);letter-spacing:0.04em">CCMC</div>
                <p class="ks-card__text" style="margin-top:0.5rem;font-size:0.9375rem">Conseil canadien du bois — avis techniques et certification matériaux</p>
            </article>
            <article class="ks-card ks-card--accent-gold" style="text-align:center;padding:clamp(20px, 2.4vw, 32px)">
                <div style="font-family:var(--ks-font-display);font-size:1.5rem;font-weight:800;color:var(--ks-navy-900);letter-spacing:0.04em">GCR</div>
                <p class="ks-card__text" style="margin-top:0.5rem;font-size:0.9375rem">Plan de garantie des bâtiments résidentiels neufs</p>
            </article>
        </div>
    </div>
</section>
