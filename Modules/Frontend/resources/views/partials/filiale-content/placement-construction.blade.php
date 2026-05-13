{{-- T198-D6 — Refonte design 2026 : Hero magazine + Timeline + 3 contraintes + Trust --}}

<section class="ks-section ks-page-section">
    <div class="ks-container">
        <div class="ks-bento ks-bento--split-photo ks-fade-in" style="display:grid;grid-template-columns:1fr 1fr;gap:clamp(24px, 3vw, 48px);align-items:center">
            <figure style="margin:0;overflow:hidden;border-radius:var(--ks-radius-lg);box-shadow:var(--ks-shadow-card)">
                <img src="/intime/images/filiales/placement-construction-method.webp" alt="Équipe de chantier coordonnée par contremaître, machinerie et travailleurs en action" loading="lazy" width="940" height="650" style="width:100%;height:auto;display:block;object-fit:cover;aspect-ratio:940/650">
            </figure>
            <div>
                <span class="ks-eyebrow" style="color:var(--ks-gold-aaa)">Pourquoi Kalystrat</span>
                <h2 class="ks-h2" style="margin-top:0.5rem">La pénurie de main-d'œuvre construction au Québec se résout par le bassin captif</h2>
                <p class="ks-lead">La CCQ identifie 17 000 personnes par année à recruter pour les 5 prochaines années (Perspectives professionnelles 2024-2028). Pénurie qui ralentit les chantiers, gonfle les coûts, fragilise les calendriers. Notre modèle unique répond à cette urgence.</p>
                <p class="ks-card__text">Kalystrat Placement construction maintient un bassin permanent de travailleurs CCQ qualifiés prêts à intervenir. Formations PAMT internes, programme d'intégration apprentis, relations long terme avec compagnons certifiés. Dépannage chantier urgent en 24 à 48 heures.</p>
            </div>
        </div>
    </div>
</section>

<section class="ks-section ks-section--alt ks-page-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left ks-fade-in">
            <span class="ks-eyebrow">Notre méthode</span>
            <h2 class="ks-h2">Cinq étapes du recrutement au suivi chantier</h2>
            <p class="ks-lead">Recrutement, formation, placement, suivi&nbsp;: chaque étape contribue à la qualité et la sécurité des équipes déployées.</p>
        </div>

        <ol class="ks-timeline ks-fade-in" style="list-style:none;padding:0;margin-top:clamp(32px, 4vw, 56px);display:grid;grid-template-columns:repeat(auto-fit, minmax(220px, 1fr));gap:clamp(16px, 1.6vw, 24px);counter-reset:step">
            @php
            $etapes = [
                ['titre' => 'Recrutement', 'desc' => 'Sourcing compagnons et apprentis certifiés CCQ. Vérification antécédents.'],
                ['titre' => 'Screening technique', 'desc' => 'Validation compétences sur site test. Conformité cartes CCQ + CNESST.'],
                ['titre' => 'Formation PAMT', 'desc' => 'Programme apprentissage métier travail. Intégration et mentorat apprentis.'],
                ['titre' => 'Placement chantier', 'desc' => 'Affectation interne (6 filiales) ou externe (entrepreneurs, promoteurs).'],
                ['titre' => 'Suivi continu', 'desc' => 'Gestion paie, assurances, CCQ. Évaluation, rétention, montée en compétences.'],
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
            <span class="ks-eyebrow">Engagements de service</span>
            <h2 class="ks-h2">Trois garanties opérationnelles</h2>
        </div>
        <div class="ks-bento ks-bento--3col ks-fade-in" style="margin-top:clamp(24px, 3vw, 40px)">
            <article class="ks-card ks-card--accent-navy">
                <div class="ks-stat__number" style="color:var(--ks-navy-900);font-size:clamp(2rem, 3.5vw, 2.75rem);font-weight:800">17 000</div>
                <h3 class="ks-card__title" style="margin-top:0.75rem">Travailleurs CCQ/an</h3>
                <p class="ks-card__text">Demande annuelle recensée par la Commission de la construction du Québec. Pénurie structurelle.</p>
            </article>
            <article class="ks-card ks-card--accent-navy">
                <div class="ks-stat__number" style="color:var(--ks-navy-900);font-size:clamp(2rem, 3.5vw, 2.75rem);font-weight:800">24-48 h</div>
                <h3 class="ks-card__title" style="margin-top:0.75rem">Dépannage urgent</h3>
                <p class="ks-card__text">Mobilisation d'équipes qualifiées sur chantier en moins de 48 heures. Bassin permanent disponible.</p>
            </article>
            <article class="ks-card ks-card--accent-navy">
                <div class="ks-stat__number" style="color:var(--ks-navy-900);font-size:clamp(2rem, 3.5vw, 2.75rem);font-weight:800">100&nbsp;%</div>
                <h3 class="ks-card__title" style="margin-top:0.75rem">Main-d'œuvre certifiée</h3>
                <p class="ks-card__text">Compagnons et apprentis certifiés CCQ. Cartes valides, formations à jour, conformité CNESST.</p>
            </article>
        </div>
    </div>
</section>

<section class="ks-section ks-section--alt ks-page-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left ks-fade-in">
            <span class="ks-eyebrow">Certifications et conformité</span>
            <h2 class="ks-h2">Une agence régulée et certifiée</h2>
            <p class="ks-lead">Toutes les opérations sont conformes aux exigences CCQ, CNESST et programme PAMT. Cinq filiales sœurs internes + clientèle externe (entrepreneurs généraux, sous-traitants, promoteurs).</p>
        </div>
        <div class="ks-bento ks-bento--3col ks-fade-in" style="margin-top:clamp(24px, 3vw, 40px)">
            <article class="ks-card ks-card--accent-gold" style="text-align:center;padding:clamp(20px, 2.4vw, 32px)">
                <div style="font-family:var(--ks-font-display);font-size:1.5rem;font-weight:800;color:var(--ks-navy-900);letter-spacing:0.04em">CCQ</div>
                <p class="ks-card__text" style="margin-top:0.5rem;font-size:0.9375rem">Conformité Commission de la construction du Québec</p>
            </article>
            <article class="ks-card ks-card--accent-gold" style="text-align:center;padding:clamp(20px, 2.4vw, 32px)">
                <div style="font-family:var(--ks-font-display);font-size:1.5rem;font-weight:800;color:var(--ks-navy-900);letter-spacing:0.04em">CNESST</div>
                <p class="ks-card__text" style="margin-top:0.5rem;font-size:0.9375rem">Santé sécurité travail conformité totale chantiers</p>
            </article>
            <article class="ks-card ks-card--accent-gold" style="text-align:center;padding:clamp(20px, 2.4vw, 32px)">
                <div style="font-family:var(--ks-font-display);font-size:1.5rem;font-weight:800;color:var(--ks-navy-900);letter-spacing:0.04em">PAMT</div>
                <p class="ks-card__text" style="margin-top:0.5rem;font-size:0.9375rem">Programme d'apprentissage en milieu de travail interne</p>
            </article>
        </div>
    </div>
</section>
