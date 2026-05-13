{{-- T198-D5 — Refonte design 2026 : Hero magazine + Timeline + 3 contraintes + Trust --}}

<section class="ks-section ks-page-section">
    <div class="ks-container">
        <div class="ks-bento ks-bento--split-photo ks-fade-in" style="display:grid;grid-template-columns:1fr 1fr;gap:clamp(24px, 3vw, 48px);align-items:center">
            <figure style="margin:0;overflow:hidden;border-radius:var(--ks-radius-lg);box-shadow:var(--ks-shadow-card)">
                <img src="/intime/images/filiales/immobilier-method.webp" alt="Immeuble résidentiel multilogements moderne, façade contemporaine" loading="lazy" width="940" height="650" style="width:100%;height:auto;display:block;object-fit:cover;aspect-ratio:940/650">
            </figure>
            <div>
                <span class="ks-eyebrow" style="color:var(--ks-gold-aaa)">Pourquoi Kalystrat</span>
                <h2 class="ks-h2" style="margin-top:0.5rem">Le bras développement qui crée la demande captive du groupe</h2>
                <p class="ks-lead">La région de Québec fait face à une pénurie persistante de logements neufs. Le marché de la rénovation représente 19 G$ selon l'APCHQ. La demande multilogements explose, portée par l'urbanisation et les politiques de densification.</p>
                <p class="ks-card__text">Kalystrat Immobilier privilégie la densification urbaine, revitalise les quartiers sous-utilisés et développe des multilogements de qualité conçus pour durer. Chaque projet lancé déclenche une chaîne intégrée pour les cinq autres filiales&nbsp;: fondations, structure, toiture, finition, placement.</p>
            </div>
        </div>
    </div>
</section>

<section class="ks-section ks-section--alt ks-page-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left ks-fade-in">
            <span class="ks-eyebrow">Notre méthode</span>
            <h2 class="ks-h2">Cinq étapes du terrain à la livraison</h2>
            <p class="ks-lead">Acquisition, conception, construction, commercialisation&nbsp;: pilotage intégré pour maximiser rendement et qualité.</p>
        </div>

        <ol class="ks-timeline ks-fade-in" style="list-style:none;padding:0;margin-top:clamp(32px, 4vw, 56px);display:grid;grid-template-columns:repeat(auto-fit, minmax(220px, 1fr));gap:clamp(16px, 1.6vw, 24px);counter-reset:step">
            @php
            $etapes = [
                ['titre' => 'Acquisition terrain', 'desc' => 'Étude de marché, zonage, géotechnique. Cibles 4-12 unités dans Capitale-Nationale.'],
                ['titre' => 'Montage financier', 'desc' => 'Subventions SCHL, programme rénovation, prêts construction, période grâce 2 ans.'],
                ['titre' => 'Construction intégrée', 'desc' => 'Exécution par les 5 filiales sœurs. Coordination centralisée, calendrier maîtrisé.'],
                ['titre' => 'Commercialisation', 'desc' => 'Vente unités neuves ou constitution portefeuille locatif. Marketing premium.'],
                ['titre' => 'Livraison et suivi', 'desc' => 'Inspection finale, transfert, garantie GCR, suivi locataires ou propriétaires.'],
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
            <span class="ks-eyebrow">Marché immobilier 2026</span>
            <h2 class="ks-h2">Trois chiffres qui structurent la stratégie</h2>
        </div>
        <div class="ks-bento ks-bento--3col ks-fade-in" style="margin-top:clamp(24px, 3vw, 40px)">
            <article class="ks-card ks-card--accent-navy">
                <div class="ks-stat__number" style="color:var(--ks-navy-900);font-size:clamp(2rem, 3.5vw, 2.75rem);font-weight:800">19 G$</div>
                <h3 class="ks-card__title" style="margin-top:0.75rem">Marché rénovation QC</h3>
                <p class="ks-card__text">Estimation APCHQ 2026. Rénovation résidentielle + multilogements + commercial. Croissance soutenue.</p>
            </article>
            <article class="ks-card ks-card--accent-navy">
                <div class="ks-stat__number" style="color:var(--ks-navy-900);font-size:clamp(2rem, 3.5vw, 2.75rem);font-weight:800">4-12</div>
                <h3 class="ks-card__title" style="margin-top:0.75rem">Unités par projet</h3>
                <p class="ks-card__text">Focus multilogements. Densification urbaine&nbsp;: créneau idéal pour incitatifs SCHL et programmes provinciaux.</p>
            </article>
            <article class="ks-card ks-card--accent-navy">
                <div class="ks-stat__number" style="color:var(--ks-navy-900);font-size:clamp(2rem, 3.5vw, 2.75rem);font-weight:800">6</div>
                <h3 class="ks-card__title" style="margin-top:0.75rem">Filiales en synergie</h3>
                <p class="ks-card__text">Demande captive interne&nbsp;: chaque projet alimente fondations, structure, toiture, finition, placement.</p>
            </article>
        </div>
    </div>
</section>

<section class="ks-section ks-section--alt ks-page-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left ks-fade-in">
            <span class="ks-eyebrow">Garanties et accompagnement</span>
            <h2 class="ks-h2">Programmes et garanties bonifiés</h2>
            <p class="ks-lead">Acheteurs propriétés neuves, locataires, investisseurs immobiliers&nbsp;: chaque profil bénéficie de garanties solides et d'un accompagnement personnalisé.</p>
        </div>
        <div class="ks-bento ks-bento--3col ks-fade-in" style="margin-top:clamp(24px, 3vw, 40px)">
            <article class="ks-card ks-card--accent-gold" style="text-align:center;padding:clamp(20px, 2.4vw, 32px)">
                <div style="font-family:var(--ks-font-display);font-size:1.5rem;font-weight:800;color:var(--ks-navy-900);letter-spacing:0.04em">GCR</div>
                <p class="ks-card__text" style="margin-top:0.5rem;font-size:0.9375rem">Plan de garantie résidentielle obligatoire neufs Québec</p>
            </article>
            <article class="ks-card ks-card--accent-gold" style="text-align:center;padding:clamp(20px, 2.4vw, 32px)">
                <div style="font-family:var(--ks-font-display);font-size:1.5rem;font-weight:800;color:var(--ks-navy-900);letter-spacing:0.04em">SCHL</div>
                <p class="ks-card__text" style="margin-top:0.5rem;font-size:0.9375rem">Programmes prêt construction logements locatifs (taux préférentiels)</p>
            </article>
            <article class="ks-card ks-card--accent-gold" style="text-align:center;padding:clamp(20px, 2.4vw, 32px)">
                <div style="font-family:var(--ks-font-display);font-size:1.5rem;font-weight:800;color:var(--ks-navy-900);letter-spacing:0.04em">APCHQ</div>
                <p class="ks-card__text" style="margin-top:0.5rem;font-size:0.9375rem">Membre Association professionnelle des constructeurs d'habitations</p>
            </article>
        </div>
    </div>
</section>
