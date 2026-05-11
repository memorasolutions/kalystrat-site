@extends('frontend::layouts.intime')

@section('title', 'Contact — Demandez une soumission | Kalystrat')

@push('meta')
<meta name="description" content="Contactez Gestion Kalystrat Inc. pour votre projet de construction au Québec. Soumission gratuite, conseil intégré sur six métiers, équipe basée à Québec.">
<link rel="canonical" href="{{ url('/contact') }}">
<meta property="og:title" content="Contact — Kalystrat">
<meta property="og:description" content="Demandez une soumission gratuite. Groupe québécois de construction.">
<meta property="og:type" content="website">
@endpush

@push('schema')
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'ContactPage',
    'name' => 'Contact Kalystrat',
    'url' => url('/contact'),
    'mainEntity' => [
        '@type' => 'Organization',
        'name' => 'Gestion Kalystrat Inc.',
        'url' => 'https://kalystrat.ca',
        'address' => ['@type' => 'PostalAddress', 'addressLocality' => 'Québec', 'addressRegion' => 'QC', 'addressCountry' => 'CA'],
        'contactPoint' => [
            '@type' => 'ContactPoint',
            'contactType' => 'customer service',
            'telephone' => '+1-418-476-0987',
            'email' => 'info@kalystrat.ca',
            'areaServed' => 'CA-QC',
            'availableLanguage' => ['French', 'English'],
            'hoursAvailable' => [
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                'opens' => '08:00',
                'closes' => '17:00',
            ],
        ],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Contact', 'item' => 'https://kalystrat.ca/contact'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<x-frontend::page-hero
    photo="/intime/images/pages/contact-hero-meeting.webp"
    eyebrow="Démarrer un dossier"
    title="Parlons de votre projet"
    subtitle="Une équipe basée à Québec, six filiales spécialisées, un chargé de projet dédié à votre dossier. Réponse sous 24 heures ouvrables."
>
    <x-slot:breadcrumb>
        <li><a href="{{ url('/') }}">Accueil</a></li>
        <li>Contact</li>
    </x-slot:breadcrumb>
</x-frontend::page-hero>

<section class="ks-section ks-section--alt ks-page-section">
    <div class="ks-container">
        <div class="ks-page-section__intro ks-fade-in">
            <span class="ks-page-section__num" aria-hidden="true">01</span>
            <div class="ks-page-section__heading">
                <span class="ks-eyebrow">Estimateur express</span>
                <h2 class="ks-h2">Une fourchette budgétaire en 30 secondes</h2>
                <p class="ks-lead">Sélectionnez le type de projet, la surface et les filiales requises. L’outil retourne une fourchette indicative basée sur les coûts moyens du marché québécois. <em>Soumission détaillée toujours réalisée en visite après contact.</em></p>
            </div>
        </div>
        <div class="ks-estimator ks-fade-in" data-ks-estimator>
            <div class="ks-estimator__fields">
                <div class="ks-estimator__field">
                    <label for="est-type">Type de projet</label>
                    <select id="est-type" data-est-type>
                        <option value="residentiel" data-cost="2400">Résidentiel haut de gamme</option>
                        <option value="multilog" data-cost="1900">Multilogement (4-60 unités)</option>
                        <option value="commercial" data-cost="2100">Commercial / bureaux</option>
                        <option value="institutionnel" data-cost="2600">Institutionnel</option>
                        <option value="industriel" data-cost="1400">Industriel / entrepôt</option>
                        <option value="renovation" data-cost="1700">Rénovation majeure</option>
                    </select>
                </div>
                <div class="ks-estimator__field">
                    <label for="est-surface">Surface au sol (m²)</label>
                    <input id="est-surface" type="number" min="50" max="10000" step="50" value="200" data-est-surface>
                </div>
                <div class="ks-estimator__field ks-estimator__field--full">
                    <label>Filiales impliquées (cochez)</label>
                    <div class="ks-estimator__filiales">
                        <label><input type="checkbox" value="1.0" data-est-filiale checked> Fondations</label>
                        <label><input type="checkbox" value="1.0" data-est-filiale checked> Structure</label>
                        <label><input type="checkbox" value="1.0" data-est-filiale checked> Toiture-Enveloppe</label>
                        <label><input type="checkbox" value="1.0" data-est-filiale checked> Finition Intérieure</label>
                        <label><input type="checkbox" value="0.0" data-est-filiale> Immobilier (dév.)</label>
                        <label><input type="checkbox" value="0.0" data-est-filiale> Placement (main-d’œuvre)</label>
                    </div>
                </div>
            </div>
            <div class="ks-estimator__result" role="status" aria-live="polite">
                <div class="ks-estimator__result-block">
                    <span class="ks-eyebrow">Fourchette budgétaire estimée</span>
                    <div class="ks-estimator__result-value" data-est-budget>—</div>
                    <p class="ks-estimator__result-note">Indicatif, hors taxes. Variation ±25 % selon spécifications.</p>
                </div>
                <div class="ks-estimator__result-block">
                    <span class="ks-eyebrow">Délai indicatif</span>
                    <div class="ks-estimator__result-value" data-est-delai>—</div>
                    <p class="ks-estimator__result-note">Estimation grossière de la durée d’exécution sur chantier.</p>
                </div>
            </div>
            <p class="ks-estimator__cta-note">Pour une soumission précise et détaillée, complétez le formulaire ci-dessous. Visite incluse.</p>
        </div>
    </div>
</section>

<section class="ks-section">
    <div class="ks-container">
        <div class="ks-bento ks-bento--2col" style="align-items:start">
            <article>
                <span class="ks-eyebrow">Demande de soumission</span>
                <h2 class="ks-h2" style="font-size:clamp(1.5rem, 2.5vw, 2rem)">Décrivez-nous votre projet</h2>
                <p class="ks-lead" style="font-size:var(--ks-body-size);margin-bottom:1.5rem">Résidentiel, commercial, institutionnel, industriel ou municipal&nbsp;: nous évaluons votre projet et revenons vers vous avec un échéancier et une soumission détaillée.</p>

                @if(session('status'))
                    <div style="padding:16px 20px;background:#e8f5e9;border-left:4px solid #2e7d32;margin-bottom:24px;border-radius:8px">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('contact.submit') }}" style="display:flex;flex-direction:column;gap:18px">
                    @csrf
                    <div>
                        <label for="nom" style="display:block;margin-bottom:6px;font-weight:600;color:var(--ks-navy-900);font-size:0.9375rem">Nom complet *</label>
                        <input type="text" id="nom" name="nom" required style="width:100%;padding:14px 16px;border:1px solid var(--ks-gray-300);border-radius:var(--ks-radius-sm);font-size:1rem;font-family:var(--ks-font-body)">
                    </div>
                    <div>
                        <label for="email" style="display:block;margin-bottom:6px;font-weight:600;color:var(--ks-navy-900);font-size:0.9375rem">Courriel *</label>
                        <input type="email" id="email" name="email" required style="width:100%;padding:14px 16px;border:1px solid var(--ks-gray-300);border-radius:var(--ks-radius-sm);font-size:1rem;font-family:var(--ks-font-body)">
                    </div>
                    <div>
                        <label for="telephone" style="display:block;margin-bottom:6px;font-weight:600;color:var(--ks-navy-900);font-size:0.9375rem">Téléphone</label>
                        <input type="tel" id="telephone" name="telephone" style="width:100%;padding:14px 16px;border:1px solid var(--ks-gray-300);border-radius:var(--ks-radius-sm);font-size:1rem;font-family:var(--ks-font-body)">
                    </div>
                    <div>
                        <label for="filiale" style="display:block;margin-bottom:6px;font-weight:600;color:var(--ks-navy-900);font-size:0.9375rem">Filiale concernée</label>
                        <select id="filiale" name="filiale" style="width:100%;padding:14px 16px;border:1px solid var(--ks-gray-300);border-radius:var(--ks-radius-sm);font-size:1rem;font-family:var(--ks-font-body);background:#fff">
                            <option value="">Sélectionner</option>
                            <option value="multi">Plusieurs filiales — projet global</option>
                            <option value="fondations">Kalystrat Fondations</option>
                            <option value="structure">Kalystrat Structure</option>
                            <option value="toiture-enveloppe">Kalystrat Toiture et Enveloppe</option>
                            <option value="finition-interieure">Kalystrat Finition Intérieure</option>
                            <option value="immobilier">Kalystrat Immobilier</option>
                            <option value="placement-construction">Kalystrat Placement Construction</option>
                        </select>
                    </div>
                    <div>
                        <label for="message" style="display:block;margin-bottom:6px;font-weight:600;color:var(--ks-navy-900);font-size:0.9375rem">Décrivez votre projet *</label>
                        <textarea id="message" name="message" rows="6" required style="width:100%;padding:14px 16px;border:1px solid var(--ks-gray-300);border-radius:var(--ks-radius-sm);font-size:1rem;font-family:var(--ks-font-body);resize:vertical"></textarea>
                    </div>
                    <button type="submit" class="ks-cta-primary" style="border:0;cursor:pointer;align-self:flex-start;margin-top:8px">Envoyer la demande</button>
                </form>
            </article>

            <aside style="display:flex;flex-direction:column;gap:20px">
                <article class="ks-card ks-card--accent-gold">
                    <span class="ks-eyebrow">Téléphone</span>
                    <h3 class="ks-card__title" style="font-size:1.25rem"><a href="tel:+14184760987" aria-label="Appeler Kalystrat au 418 476 0987">418&nbsp;476-0987</a></h3>
                    <p class="ks-card__text">Lundi au vendredi, 8&nbsp;h à 17&nbsp;h. Service en français. Hors heures&nbsp;: message vocal redirigé sur courriel.</p>
                </article>

                <article class="ks-card ks-card--accent-gold">
                    <span class="ks-eyebrow">Bureau</span>
                    <h3 class="ks-card__title" style="font-size:1.25rem">Québec, QC, Canada</h3>
                    <p class="ks-card__text">Siège social Capitale-Nationale. Couverture provinciale jusqu’au Saguenay, Trois-Rivières, Montréal et Laval.</p>
                </article>

                <article class="ks-card ks-card--accent-gold">
                    <span class="ks-eyebrow">Courriel</span>
                    <h3 class="ks-card__title" style="font-size:1.25rem"><a href="mailto:info@kalystrat.ca">info@kalystrat.ca</a></h3>
                    <p class="ks-card__text">Réponse sous 24 heures ouvrables. Privilégier ce canal pour transmettre plans, devis ou documents techniques.</p>
                </article>

                <article class="ks-card ks-card--accent-navy">
                    <span class="ks-eyebrow">Soumission rapide</span>
                    <h3 class="ks-card__title" style="font-size:1.25rem">Délai garanti 5 à 10 jours ouvrables</h3>
                    <p class="ks-card__text">Visite des lieux, prise de mesures, étude technique et soumission détaillée. Délai contractuel pour le résidentiel.</p>
                </article>

                <article class="ks-card ks-card--accent-gold">
                    <span class="ks-eyebrow">Heures d’ouverture</span>
                    <h3 class="ks-card__title" style="font-size:1.25rem">Lundi au vendredi</h3>
                    <p class="ks-card__text">8 h à 17 h, heure de l’Est. Visites de chantier ou en bureau sur rendez-vous.</p>
                </article>

                <article class="ks-card ks-card--dark">
                    <span class="ks-eyebrow">Carrières</span>
                    <h3 class="ks-card__title" style="font-size:1.25rem">Vous voulez travailler avec nous&nbsp;?</h3>
                    <p class="ks-card__text">Consultez nos opportunités ouvertes via Kalystrat Placement Construction.</p>
                    <div class="ks-card__cta"><a href="{{ route('carrieres') }}" class="ks-cta-secondary" style="color:var(--ks-white);border-color:var(--ks-gold-500)">Voir les postes</a></div>
                </article>
            </aside>
        </div>
    </div>
</section>

@push('scripts')
<script>
(function () {
    'use strict';
    var root = document.querySelector('[data-ks-estimator]');
    if (!root) return;
    var typeSel = root.querySelector('[data-est-type]');
    var surfInput = root.querySelector('[data-est-surface]');
    var filiales = root.querySelectorAll('[data-est-filiale]');
    var budgetEl = root.querySelector('[data-est-budget]');
    var delaiEl = root.querySelector('[data-est-delai]');

    function fmt(n) {
        return new Intl.NumberFormat('fr-CA').format(Math.round(n));
    }

    function compute() {
        var opt = typeSel.options[typeSel.selectedIndex];
        var baseCost = parseFloat(opt.getAttribute('data-cost')) || 2000;
        var surface = Math.max(50, Math.min(10000, parseFloat(surfInput.value) || 200));
        var multiplier = 0;
        filiales.forEach(function (cb) {
            if (cb.checked) multiplier += parseFloat(cb.value) || 0;
        });
        // Si 4 filiales cochées (1+1+1+1 = 4) → multiplier = 4 → ratio normal 1.0
        // Moins = scope réduit, plus = scope augmenté
        var scopeRatio = multiplier / 4;
        if (scopeRatio < 0.5) scopeRatio = 0.5;
        var baseTotal = baseCost * surface * scopeRatio;
        var low = baseTotal * 0.85;
        var high = baseTotal * 1.25;
        budgetEl.textContent = fmt(low) + ' $ – ' + fmt(high) + ' $';

        // Délai : 1 mois pour 100 m², 0.4 multiplicateur par filiale active
        var weeks = Math.round((surface / 100) * 4 * Math.max(0.7, scopeRatio));
        var weeksLow = Math.max(2, weeks - 2);
        var weeksHigh = weeks + 4;
        delaiEl.textContent = weeksLow + ' à ' + weeksHigh + ' semaines';
    }

    typeSel.addEventListener('change', compute);
    surfInput.addEventListener('input', compute);
    filiales.forEach(function (cb) { cb.addEventListener('change', compute); });
    compute();
})();
</script>
@endpush

@endsection
