{{-- T198-D3 — Refonte design 2026 : Hero magazine + Timeline + 3 contraintes + Trust --}}

<section class="ks-section ks-page-section">
    <div class="ks-container">
        <div class="ks-bento ks-bento--split-photo ks-fade-in" style="display:grid;grid-template-columns:1fr 1fr;gap:clamp(24px, 3vw, 48px);align-items:center">
            <figure style="margin:0;overflow:hidden;border-radius:var(--ks-radius-lg);box-shadow:var(--ks-shadow-card)">
                <img src="/intime/images/filiales/toiture-enveloppe-method.webp" alt="Vue aérienne de toiture commerciale avec membrane et drainage" loading="lazy" width="940" height="650" style="width:100%;height:auto;display:block;object-fit:cover;aspect-ratio:940/650">
            </figure>
            <div>
                <span class="ks-eyebrow" style="color:var(--ks-gold-aaa)">Pourquoi Kalystrat</span>
                <h2 class="ks-h2" style="margin-top:0.5rem">L'enveloppe protège votre bâtiment 25 à 30 ans</h2>
                <p class="ks-lead">Pluie, vent, chaleur, froid, humidité&nbsp;: l'enveloppe est le bouclier. Avec la réglementation RVNRG 2026, l'étanchéité à l'air et à l'eau devient une obligation légale, pas juste une exigence technique.</p>
                <p class="ks-card__text">Chez Kalystrat Toiture et enveloppe, nous concevons chaque système comme un tout intégré&nbsp;: pare-air continu + pare-vapeur stratégique + isolation R-49 toiture + revêtement durable. Membranes TPO/EPDM/élastomère certifiées, garantie manufacturier 25-30 ans, garantie installation 5-10 ans.</p>
            </div>
        </div>
    </div>
</section>

<section class="ks-section ks-section--alt ks-page-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left ks-fade-in">
            <span class="ks-eyebrow">Notre méthode</span>
            <h2 class="ks-h2">Cinq étapes pour une enveloppe durable</h2>
            <p class="ks-lead">Du diagnostic à l'entretien préventif, chaque chantier suit un protocole calibré pour zéro infiltration.</p>
        </div>

        <ol class="ks-timeline ks-fade-in" style="list-style:none;padding:0;margin-top:clamp(32px, 4vw, 56px);display:grid;grid-template-columns:repeat(auto-fit, minmax(220px, 1fr));gap:clamp(16px, 1.6vw, 24px);counter-reset:step">
            @php
            $etapes = [
                ['titre' => 'Inspection technique', 'desc' => 'Diagnostic complet&nbsp;: membrane, drains, solins, isolation, ponts thermiques.'],
                ['titre' => 'Dépose et préparation', 'desc' => 'Retrait des matériaux usés. Préparation du support, ragréage, séchage.'],
                ['titre' => 'Pare-air et isolation', 'desc' => 'Pare-air continu, pare-vapeur, isolation R-49 toiture / R-24 murs sans ponts thermiques.'],
                ['titre' => 'Membrane et revêtement', 'desc' => 'Pose membrane TPO/EPDM/élastomère. Revêtements extérieurs durables.'],
                ['titre' => 'Test blower door', 'desc' => 'Test étanchéité à l\'air ≤ 1,5 ach@50Pa. Conformité Novoclimat 2.0.'],
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
            <span class="ks-eyebrow">Spécificités climat</span>
            <h2 class="ks-h2">Trois performances Code QC 2026</h2>
        </div>
        <div class="ks-bento ks-bento--3col ks-fade-in" style="margin-top:clamp(24px, 3vw, 40px)">
            <article class="ks-card ks-card--accent-navy">
                <div class="ks-stat__number" style="color:var(--ks-navy-900);font-size:clamp(2rem, 3.5vw, 2.75rem);font-weight:800">R-49</div>
                <h3 class="ks-card__title" style="margin-top:0.75rem">Isolation toiture</h3>
                <p class="ks-card__text">Valeur minimale Code 2026. R-24 sur murs. Pare-air continu obligatoire, élimination ponts thermiques.</p>
            </article>
            <article class="ks-card ks-card--accent-navy">
                <div class="ks-stat__number" style="color:var(--ks-navy-900);font-size:clamp(2rem, 3.5vw, 2.75rem);font-weight:800">1,5 ach</div>
                <h3 class="ks-card__title" style="margin-top:0.75rem">Étanchéité Novoclimat</h3>
                <p class="ks-card__text">Test blower door à 50&nbsp;Pa. Seuil Novoclimat 2.0. Étiquette énergétique nationale obligatoire 2026.</p>
            </article>
            <article class="ks-card ks-card--accent-navy">
                <div class="ks-stat__number" style="color:var(--ks-navy-900);font-size:clamp(2rem, 3.5vw, 2.75rem);font-weight:800">25-30&nbsp;ans</div>
                <h3 class="ks-card__title" style="margin-top:0.75rem">Garantie membrane</h3>
                <p class="ks-card__text">Membranes TPO blanche, EPDM noire, élastomère APP/SBS. Garantie manufacturier prolongée.</p>
            </article>
        </div>
    </div>
</section>

<section class="ks-section ks-section--alt ks-page-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left ks-fade-in">
            <span class="ks-eyebrow">Garanties et subventions</span>
            <h2 class="ks-h2">Entretien préventif et subventions accessibles</h2>
            <p class="ks-lead">Au-delà de la garantie manufacturier 25-30 ans et garantie installation 5-10 ans, nous accompagnons le montage des dossiers RénoVert et RénoClimat pour maximiser vos retours.</p>
        </div>
        <div class="ks-bento ks-bento--3col ks-fade-in" style="margin-top:clamp(24px, 3vw, 40px)">
            <article class="ks-card ks-card--accent-gold" style="text-align:center;padding:clamp(20px, 2.4vw, 32px)">
                <div style="font-family:var(--ks-font-display);font-size:1.5rem;font-weight:800;color:var(--ks-navy-900);letter-spacing:0.04em">RBQ</div>
                <p class="ks-card__text" style="margin-top:0.5rem;font-size:0.9375rem">Licence active toiture résidentielle, commerciale et institutionnelle</p>
            </article>
            <article class="ks-card ks-card--accent-gold" style="text-align:center;padding:clamp(20px, 2.4vw, 32px)">
                <div style="font-family:var(--ks-font-display);font-size:1.5rem;font-weight:800;color:var(--ks-navy-900);letter-spacing:0.04em">RénoVert</div>
                <p class="ks-card__text" style="margin-top:0.5rem;font-size:0.9375rem">Subventions toits verts et matériaux durables certifiés</p>
            </article>
            <article class="ks-card ks-card--accent-gold" style="text-align:center;padding:clamp(20px, 2.4vw, 32px)">
                <div style="font-family:var(--ks-font-display);font-size:1.5rem;font-weight:800;color:var(--ks-navy-900);letter-spacing:0.04em">Novoclimat</div>
                <p class="ks-card__text" style="margin-top:0.5rem;font-size:0.9375rem">Programme efficacité énergétique 2.0&nbsp;: conformité totale</p>
            </article>
        </div>
    </div>
</section>
