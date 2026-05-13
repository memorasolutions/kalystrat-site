{{-- T198-D1 — Pilote refonte design 2026 : Hero magazine + Timeline + photo + Trust badges --}}

{{-- Pourquoi Kalystrat : Bento split photo + texte --}}
<section class="ks-section ks-page-section">
    <div class="ks-container">
        <div class="ks-bento ks-bento--split-photo ks-fade-in" style="display:grid;grid-template-columns:1fr 1fr;gap:clamp(24px, 3vw, 48px);align-items:center">
            <figure style="margin:0;overflow:hidden;border-radius:var(--ks-radius-lg);box-shadow:var(--ks-shadow-card)">
                <img src="/intime/images/filiales/fondations-method.webp" alt="Coulée de béton sur fondations résidentielles avec armature en acier visible" loading="lazy" width="940" height="650" style="width:100%;height:auto;display:block;object-fit:cover;aspect-ratio:940/650">
            </figure>
            <div>
                <span class="ks-eyebrow" style="color:var(--ks-gold-aaa)">Pourquoi Kalystrat</span>
                <h2 class="ks-h2" style="margin-top:0.5rem">Les fondations conditionnent toute la durée de vie du bâtiment</h2>
                <p class="ks-lead">Au Québec, les cycles de gel-dégel et la prévalence de sols argileux exigent une expertise géotechnique pointue. Une fondation mal exécutée fissure, s'affaisse ou laisse infiltrer l'eau dans les 5 premières années.</p>
                <p class="ks-card__text">Chez Kalystrat Fondations, nous gardons le contrôle total sur chaque étape&nbsp;: aucun sous-traitant hors groupe. Notre équipe interne — techniciens, contremaîtres, superviseurs — maîtrise les spécificités du sol québécois et coule selon les normes du Code de construction 2026.</p>
            </div>
        </div>
    </div>
</section>

{{-- Méthode en 5 étapes — Timeline horizontale 2026 --}}
<section class="ks-section ks-section--alt ks-page-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left ks-fade-in">
            <span class="ks-eyebrow">Notre méthode</span>
            <h2 class="ks-h2">Cinq étapes pour une fondation durable</h2>
            <p class="ks-lead">Chaque chantier suit un protocole établi pour garantir la qualité, peu importe la complexité du sol ou la saison.</p>
        </div>

        <ol class="ks-timeline ks-fade-in" style="list-style:none;padding:0;margin-top:clamp(32px, 4vw, 56px);display:grid;grid-template-columns:repeat(auto-fit, minmax(220px, 1fr));gap:clamp(16px, 1.6vw, 24px);counter-reset:step">
            @php
            $etapes = [
                ['titre' => 'Évaluation du sol', 'desc' => 'Analyse géotechnique du site, capacité portante et risque de gonflement argileux.'],
                ['titre' => 'Excavation', 'desc' => 'Profondeur précise sous la ligne de gel (1,5 m min), stabilité des parois en milieu urbain.'],
                ['titre' => 'Coffrage', 'desc' => 'Coffrages robustes et étanches, géométrie exacte selon plans d\'ingénierie.'],
                ['titre' => 'Coulée', 'desc' => 'Béton 35 MPa, contrôle de la consistance, protocoles spécifiques pour coulage hivernal.'],
                ['titre' => 'Imperméabilisation', 'desc' => 'Membranes haute performance + drains français + dalle isolante.'],
            ];
            @endphp
            @foreach($etapes as $i => $etape)
            <li style="position:relative;padding:clamp(20px, 2.4vw, 28px);background:var(--ks-white);border-radius:var(--ks-radius-lg);border-top:3px solid var(--ks-gold-500);box-shadow:var(--ks-shadow-card)">
                <div style="font-size:clamp(2rem, 4vw, 2.75rem);font-weight:800;color:var(--ks-gold-aaa);line-height:1;letter-spacing:-0.02em">{{ str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) }}</div>
                <h3 class="ks-card__title" style="margin-top:0.75rem;margin-bottom:0.5rem">{{ $etape['titre'] }}</h3>
                <p class="ks-card__text" style="font-size:0.9375rem">{{ $etape['desc'] }}</p>
            </li>
            @endforeach
        </ol>
    </div>
</section>

{{-- Climat québécois : 3 contraintes techniques (Bento 3col) --}}
<section class="ks-section ks-page-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left ks-fade-in">
            <span class="ks-eyebrow">Climat québécois</span>
            <h2 class="ks-h2">Trois contraintes que toute fondation doit affronter</h2>
        </div>
        <div class="ks-bento ks-bento--3col ks-fade-in" style="margin-top:clamp(24px, 3vw, 40px)">
            <article class="ks-card ks-card--accent-navy">
                <div class="ks-stat__number" style="color:var(--ks-navy-900);font-size:clamp(2rem, 3.5vw, 2.75rem);font-weight:800">−25°C</div>
                <h3 class="ks-card__title" style="margin-top:0.75rem">Cycles de gel-dégel</h3>
                <p class="ks-card__text">Mouvements de sol agressifs entre novembre et avril. Semelles obligatoires sous 1,5 m de profondeur (Code de construction du Québec).</p>
            </article>
            <article class="ks-card ks-card--accent-navy">
                <div class="ks-stat__number" style="color:var(--ks-navy-900);font-size:clamp(2rem, 3.5vw, 2.75rem);font-weight:800">Argile</div>
                <h3 class="ks-card__title" style="margin-top:0.75rem">Sols sensibles</h3>
                <p class="ks-card__text">Rive-sud du Saint-Laurent et certains secteurs de la Capitale-Nationale. Gonflement à l'eau&nbsp;: drains français obligatoires.</p>
            </article>
            <article class="ks-card ks-card--accent-navy">
                <div class="ks-stat__number" style="color:var(--ks-navy-900);font-size:clamp(2rem, 3.5vw, 2.75rem);font-weight:800">35 MPa</div>
                <h3 class="ks-card__title" style="margin-top:0.75rem">Béton structural</h3>
                <p class="ks-card__text">Résistance minimale aux charges et agressions environnementales. Additifs antigel pour coulage hivernal.</p>
            </article>
        </div>
    </div>
</section>

{{-- Garanties et conformité : Trust badges row --}}
<section class="ks-section ks-section--alt ks-page-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left ks-fade-in">
            <span class="ks-eyebrow">Garanties et conformité</span>
            <h2 class="ks-h2">Un partenaire de confiance pour vos projets</h2>
            <p class="ks-lead">Kalystrat Fondations Inc. opère sous licence RBQ et couvre chaque chantier neuf résidentiel par le Plan de garantie GCR. Solidité administrative, technique et financière.</p>
        </div>
        <div class="ks-bento ks-bento--3col ks-fade-in" style="margin-top:clamp(24px, 3vw, 40px)">
            <article class="ks-card ks-card--accent-gold" style="text-align:center;padding:clamp(20px, 2.4vw, 32px)">
                <div style="font-family:var(--ks-font-display);font-size:1.5rem;font-weight:800;color:var(--ks-navy-900);letter-spacing:0.04em">RBQ</div>
                <p class="ks-card__text" style="margin-top:0.5rem;font-size:0.9375rem">Licence active Régie du bâtiment du Québec</p>
            </article>
            <article class="ks-card ks-card--accent-gold" style="text-align:center;padding:clamp(20px, 2.4vw, 32px)">
                <div style="font-family:var(--ks-font-display);font-size:1.5rem;font-weight:800;color:var(--ks-navy-900);letter-spacing:0.04em">GCR</div>
                <p class="ks-card__text" style="margin-top:0.5rem;font-size:0.9375rem">Plan de garantie des maisons neuves résidentielles</p>
            </article>
            <article class="ks-card ks-card--accent-gold" style="text-align:center;padding:clamp(20px, 2.4vw, 32px)">
                <div style="font-family:var(--ks-font-display);font-size:1.5rem;font-weight:800;color:var(--ks-navy-900);letter-spacing:0.04em">CCQ</div>
                <p class="ks-card__text" style="margin-top:0.5rem;font-size:0.9375rem">Compagnons et apprentis formés selon protocoles</p>
            </article>
        </div>
        <p class="ks-card__text ks-fade-in" style="text-align:center;margin-top:clamp(24px, 3vw, 40px);max-width:780px;margin-left:auto;margin-right:auto;color:var(--ks-gray-700)">Assurances responsabilité civile et professionnelle plusieurs millions $. Cautionnement de soumission, d'exécution et de paiement disponible pour projets publics ou à gros budget.</p>
    </div>
</section>
