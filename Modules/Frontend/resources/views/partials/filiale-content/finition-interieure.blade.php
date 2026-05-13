{{-- T198-D4 — Refonte design 2026 : Hero magazine + Timeline + 3 contraintes + Trust --}}

<section class="ks-section ks-page-section">
    <div class="ks-container">
        <div class="ks-bento ks-bento--split-photo ks-fade-in" style="display:grid;grid-template-columns:1fr 1fr;gap:clamp(24px, 3vw, 48px);align-items:center">
            <figure style="margin:0;overflow:hidden;border-radius:var(--ks-radius-lg);box-shadow:var(--ks-shadow-card)">
                <img src="/intime/images/filiales/finition-interieure-method.webp" alt="Espace intérieur en cours de rénovation avec peinture, planchers et finitions" loading="lazy" width="940" height="650" style="width:100%;height:auto;display:block;object-fit:cover;aspect-ratio:940/650">
            </figure>
            <div>
                <span class="ks-eyebrow" style="color:var(--ks-gold-aaa)">Pourquoi Kalystrat</span>
                <h2 class="ks-h2" style="margin-top:0.5rem">Les détails déterminent la valeur perçue de l'espace</h2>
                <p class="ks-lead">Une finition soignée n'est pas qu'une question d'esthétique&nbsp;: elle détermine le confort d'usage quotidien et la longévité. Chaque joint, chaque surface, chaque angle est traité avec rigueur artisanale.</p>
                <p class="ks-card__text">Chez Kalystrat Finition intérieure, nous coordonnons en interne 7 corps de métier — gypse, peinture, moulures, planchers, ébénisterie, comptoirs, portes — sans sous-traitance hors groupe. Plans des designers et architectes respectés, besoins réels des occupants anticipés.</p>
            </div>
        </div>
    </div>
</section>

<section class="ks-section ks-section--alt ks-page-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left ks-fade-in">
            <span class="ks-eyebrow">Notre méthode</span>
            <h2 class="ks-h2">Cinq étapes pour une finition impeccable</h2>
            <p class="ks-lead">De la prise de mesures à la livraison clé en main, chaque chantier suit un protocole calibré pour zéro reprise.</p>
        </div>

        <ol class="ks-timeline ks-fade-in" style="list-style:none;padding:0;margin-top:clamp(32px, 4vw, 56px);display:grid;grid-template-columns:repeat(auto-fit, minmax(220px, 1fr));gap:clamp(16px, 1.6vw, 24px);counter-reset:step">
            @php
            $etapes = [
                ['titre' => 'Mesures et plans', 'desc' => 'Relevé précis, choix finitions, échantillons, échéancier détaillé.'],
                ['titre' => 'Gypse et joints', 'desc' => 'Pose, tirage de joints, sablage. Surfaces prêtes pour peinture.'],
                ['titre' => 'Peinture et moulures', 'desc' => 'Apprêt + 2 couches finition. Moulures, cimaises, plinthes installées.'],
                ['titre' => 'Planchers et comptoirs', 'desc' => 'Bois franc, céramique, vinyle de luxe, béton poli. Quartz, granit, stratifié.'],
                ['titre' => 'Ébénisterie et quincaillerie', 'desc' => 'Cuisines, salles de bain, portes, quincaillerie sur mesure.'],
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
            <span class="ks-eyebrow">Différenciateurs Kalystrat</span>
            <h2 class="ks-h2">Trois engagements qui font la différence</h2>
        </div>
        <div class="ks-bento ks-bento--3col ks-fade-in" style="margin-top:clamp(24px, 3vw, 40px)">
            <article class="ks-card ks-card--accent-navy">
                <div class="ks-stat__number" style="color:var(--ks-navy-900);font-size:clamp(2rem, 3.5vw, 2.75rem);font-weight:800">7</div>
                <h3 class="ks-card__title" style="margin-top:0.75rem">Corps de métier coordonnés</h3>
                <p class="ks-card__text">Gypse, peinture, moulures, planchers, ébénisterie, comptoirs, portes&nbsp;: équipe interne, séquence optimisée.</p>
            </article>
            <article class="ks-card ks-card--accent-navy">
                <div class="ks-stat__number" style="color:var(--ks-navy-900);font-size:clamp(2rem, 3.5vw, 2.75rem);font-weight:800">0</div>
                <h3 class="ks-card__title" style="margin-top:0.75rem">Sous-traitance hors groupe</h3>
                <p class="ks-card__text">Aucune intervention extérieure. Standard qualité uniforme, traçabilité totale, responsabilité claire.</p>
            </article>
            <article class="ks-card ks-card--accent-navy">
                <div class="ks-stat__number" style="color:var(--ks-navy-900);font-size:clamp(2rem, 3.5vw, 2.75rem);font-weight:800">Sur mesure</div>
                <h3 class="ks-card__title" style="margin-top:0.75rem">Ébénisterie et comptoirs</h3>
                <p class="ks-card__text">Cuisines, salles de bain, comptoirs quartz/granit/stratifié&nbsp;: dimensions et finitions adaptées au projet.</p>
            </article>
        </div>
    </div>
</section>

<section class="ks-section ks-section--alt ks-page-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left ks-fade-in">
            <span class="ks-eyebrow">Garanties et conformité</span>
            <h2 class="ks-h2">Standards et garanties haut de gamme</h2>
            <p class="ks-lead">Kalystrat Finition intérieure Inc. opère sous licence RBQ. Adhésion APCHQ pour habitation, conformité Code QC 2026, garantie main-d'œuvre standard sur chaque chantier.</p>
        </div>
        <div class="ks-bento ks-bento--3col ks-fade-in" style="margin-top:clamp(24px, 3vw, 40px)">
            <article class="ks-card ks-card--accent-gold" style="text-align:center;padding:clamp(20px, 2.4vw, 32px)">
                <div style="font-family:var(--ks-font-display);font-size:1.5rem;font-weight:800;color:var(--ks-navy-900);letter-spacing:0.04em">RBQ</div>
                <p class="ks-card__text" style="margin-top:0.5rem;font-size:0.9375rem">Licence catégories finition résidentielle et commerciale</p>
            </article>
            <article class="ks-card ks-card--accent-gold" style="text-align:center;padding:clamp(20px, 2.4vw, 32px)">
                <div style="font-family:var(--ks-font-display);font-size:1.5rem;font-weight:800;color:var(--ks-navy-900);letter-spacing:0.04em">APCHQ</div>
                <p class="ks-card__text" style="margin-top:0.5rem;font-size:0.9375rem">Membre de l'Association professionnelle des constructeurs d'habitations</p>
            </article>
            <article class="ks-card ks-card--accent-gold" style="text-align:center;padding:clamp(20px, 2.4vw, 32px)">
                <div style="font-family:var(--ks-font-display);font-size:1.5rem;font-weight:800;color:var(--ks-navy-900);letter-spacing:0.04em">GCR</div>
                <p class="ks-card__text" style="margin-top:0.5rem;font-size:0.9375rem">Plan de garantie des bâtiments résidentiels neufs</p>
            </article>
        </div>
    </div>
</section>
