@extends('frontend::layout')

@push('head')
<meta name="dateModified" content="2026-05-01">

@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Accueil", "item": "https://kalystrat.ca/" },
        { "@type": "ListItem", "position": 2, "name": "Carrières", "item": "https://kalystrat.ca/carrieres" }
    ]
}
</script>
@endverbatim

@php
    $metiers = [
        ['title' => 'Charpentier-menuisier', 'description' => 'Charpentier-menuisier qualifié pour chantiers résidentiels et commerciaux. Pose de structure bois, ossature, finition. Carte de compétence CCQ requise.', 'salaryMin' => 32, 'salaryMax' => 42, 'qualifications' => 'Carte CCQ valide, 3+ ans d\'expérience, lecture de plans, autonomie sur chantier.', 'filiale' => 'Structure'],
        ['title' => 'Couvreur', 'description' => 'Couvreur résidentiel pour la filiale Toiture et Enveloppe. Pose de bardeaux, membrane élastomère, ventilation, isolation toiture.', 'salaryMin' => 30, 'salaryMax' => 40, 'qualifications' => 'Carte CCQ couvreur, expérience bardeaux et membrane, travail en hauteur.', 'filiale' => 'Toiture et Enveloppe'],
        ['title' => 'Coffreur-bétonneur', 'description' => 'Coffreur-bétonneur pour la filiale Fondations. Coffrage de fondations résidentielles, semelles, dalles, finition béton.', 'salaryMin' => 31, 'salaryMax' => 41, 'qualifications' => 'Carte CCQ coffreur, expérience coffrage résidentiel, lecture de plans.', 'filiale' => 'Fondations'],
        ['title' => 'Finisseur de béton', 'description' => 'Finisseur de béton pour dalles, planchers, allées et fondations. Expertise truelle mécanique et finition lissée.', 'salaryMin' => 30, 'salaryMax' => 40, 'qualifications' => 'Carte CCQ cimentier-applicateur, expérience finition lisse et balayée.', 'filiale' => 'Fondations'],
        ['title' => 'Plâtrier-peintre', 'description' => 'Plâtrier et peintre pour la filiale Finition Intérieure. Pose de gypse, jointoyage, sablage, peinture résidentielle haut de gamme.', 'salaryMin' => 28, 'salaryMax' => 38, 'qualifications' => 'Carte CCQ plâtrier ou peintre, finition niveau 5, soin du détail.', 'filiale' => 'Finition Intérieure'],
        ['title' => 'Ébéniste', 'description' => 'Ébéniste pour armoires, mobilier intégré et finitions sur mesure. Atelier et installation chantier.', 'salaryMin' => 30, 'salaryMax' => 42, 'qualifications' => 'DEP ébénisterie ou expérience équivalente, lecture de plans, machinerie d\'atelier.', 'filiale' => 'Finition Intérieure'],
        ['title' => 'Chef d\'équipe (chargé de projet chantier)', 'description' => 'Chef d\'équipe pour coordonner 5-15 ouvriers sur chantiers résidentiels. Planification, qualité, sécurité, relation client.', 'salaryMin' => 40, 'salaryMax' => 55, 'qualifications' => 'Carte CCQ d\'un métier de la construction, 5+ ans d\'expérience, leadership, francophone.', 'filiale' => 'Toutes filiales'],
        ['title' => 'Apprenti construction (programme PAMT)', 'description' => 'Apprenti pour le Programme d\'apprentissage en milieu de travail (PAMT) de la CCQ. Formation rémunérée encadrée par compagnons Kalystrat.', 'salaryMin' => 22, 'salaryMax' => 28, 'qualifications' => 'Aucune expérience requise, motivation, secondaire 5 ou équivalent, intérêt construction.', 'filiale' => 'Placement Construction'],
    ];

    $jobPostings = array_map(function($m) {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'JobPosting',
            'title' => $m['title'],
            'description' => $m['description'] . ' ' . $m['qualifications'],
            'datePosted' => '2026-05-01',
            'validThrough' => '2026-12-31',
            'employmentType' => 'FULL_TIME',
            'directApply' => true,
            'hiringOrganization' => ['@type' => 'Organization', 'name' => 'Kalystrat', 'sameAs' => 'https://kalystrat.ca'],
            'jobLocation' => ['@type' => 'Place', 'address' => ['@type' => 'PostalAddress', 'addressLocality' => 'Québec', 'addressRegion' => 'QC', 'addressCountry' => 'CA']],
            'baseSalary' => ['@type' => 'MonetaryAmount', 'currency' => 'CAD', 'value' => ['@type' => 'QuantitativeValue', 'minValue' => $m['salaryMin'], 'maxValue' => $m['salaryMax'], 'unitText' => 'HOUR']],
            'qualifications' => $m['qualifications'],
            'industry' => 'Construction',
            'url' => 'https://kalystrat.ca/carrieres',
        ];
    }, $metiers);
@endphp

@foreach($jobPostings as $jp)
<script type="application/ld+json">
{!! json_encode($jp, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endforeach
@endpush

@section('content')

{{-- Bannière --}}
@include('frontend::partials.page-banner', [
    'title' => 'Carrières chez Kalystrat',
    'breadcrumbs' => [
        ['label' => 'Accueil', 'url' => route('index')],
        ['label' => 'Carrières', 'url' => null],
    ],
])

{{-- Intro carrières --}}
<div class="space-top" style="padding: 5rem 0 2rem;">
    <div class="container">
        <div class="title-area text-center mb-5">
            <span class="sub-title text-theme">Bâtir avec nous</span>
            <h2 class="sec-title" style="color: var(--ks-navy); font-size: 2.25rem; font-weight: 700;">Rejoindre les six filiales du groupe Kalystrat</h2>
            <p class="sec-text" style="max-width: 780px; margin: 1rem auto 0;">Kalystrat Placement Construction recrute en continu pour les six filiales du groupe&nbsp;: main-d'œuvre <abbr title="Commission de la construction du Québec">CCQ</abbr> qualifiée, formation continue, salaires compétitifs, chantiers variés.</p>
        </div>
    </div>
</div>

{{-- Liste des métiers en cards style blog Construz --}}
<div class="space-bottom" style="padding-bottom: 5rem;">
    <div class="container">
        <div class="row g-4">
            @foreach($metiers as $m)
            <div class="col-md-6 col-lg-6">
                <article class="blog-card style5" style="background: #FFFFFF; border-radius: 0.5rem; padding: 1.75rem; height: 100%; box-shadow: 0 2px 12px rgba(10,22,40,0.06); border-left: 4px solid var(--ks-gold);">
                    <div class="blog-meta" style="display: flex; gap: 0.75rem; margin-bottom: 1rem; flex-wrap: wrap; font-size: 0.85rem;">
                        <a href="#" style="color: #2C3340; text-decoration: none;"><x-frontend::icon name="building"/> Kalystrat {{ $m['filiale'] }}</a>
                        <span aria-hidden="true" style="color: #595959;">·</span>
                        <a href="#" style="color: #2C3340; text-decoration: none;"><x-frontend::icon name="time"/> Temps plein</a>
                        <span aria-hidden="true" style="color: #595959;">·</span>
                        <a href="#" style="color: #2C3340; text-decoration: none;"><x-frontend::icon name="map-pin"/> Québec, QC</a>
                    </div>
                    <h3 class="blog-title" style="color: var(--ks-navy); font-size: 1.25rem; font-weight: 700; margin-bottom: 0.5rem;">
                        <a href="#postuler" style="color: var(--ks-navy); text-decoration: none;">{{ $m['title'] }}</a>
                    </h3>
                    <p style="color: #2C3340; font-size: 0.9375rem;">{{ $m['description'] }}</p>
                    <div style="background: #F8F8F6; padding: 0.75rem 1rem; border-radius: 0.375rem; margin: 1rem 0; font-size: 0.875rem; color: #2C3340;">
                        <strong style="color: var(--ks-navy);">Exigences&nbsp;:</strong> {{ $m['qualifications'] }}
                    </div>
                    <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem; margin-top: 1rem;">
                        <span style="color: var(--ks-navy); font-weight: 700; font-size: 1.05rem;">{{ $m['salaryMin'] }}&nbsp;$ – {{ $m['salaryMax'] }}&nbsp;$/h</span>
                        <a href="#postuler" class="btn style-border4" style="font-size: 0.9rem;">Postuler <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Avantages --}}
<div class="space-top space-bottom" style="background-color: #F8F8F6; padding: 5rem 0;">
    <div class="container">
        <div class="title-area text-center mb-5">
            <span class="sub-title text-theme">Pourquoi Kalystrat</span>
            <h2 class="sec-title" style="color: var(--ks-navy); font-size: 2rem; font-weight: 700;">Les avantages de notre équipe</h2>
        </div>
        <div class="row g-4">
            @php
                $avantages = [
                    ['icon' => 'money-dollar-circle', 'titre' => 'Salaires compétitifs', 'texte' => 'Échelles CCQ respectées, primes pour chefs d\'équipe, paye aux deux semaines.'],
                    ['icon' => 'shield-cross', 'titre' => 'Avantages sociaux CCQ', 'texte' => 'Régime de retraite, assurances collectives, fonds de vacances.'],
                    ['icon' => 'graduation-cap', 'titre' => 'Formation continue', 'texte' => 'PAMT, perfectionnement, certifications santé-sécurité défrayés.'],
                    ['icon' => 'roadster', 'titre' => 'Projets variés', 'texte' => 'Six filiales = chantiers résidentiels, commerciaux et institutionnels.'],
                ];
            @endphp
            @foreach($avantages as $a)
            <div class="col-md-6 col-lg-3">
                <article class="ks-card ks-card--centered ks-card--sober">
                    <span class="ks-card__icon ks-card__icon--circle" aria-hidden="true"><x-frontend::icon :name="$a['icon']"/></span>
                    <h3 class="ks-card__title">{{ $a['titre'] }}</h3>
                    <p class="ks-card__text">{{ $a['texte'] }}</p>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Formulaire candidature --}}
<div class="contact-area space-top space-bottom" style="padding: 5rem 0;">
    <div class="container">
        <div class="row g-5 align-items-start">
            <div class="col-lg-5">
                <div class="title-area">
                    <span class="sub-title text-theme">Candidature</span>
                    <h2 class="sec-title" id="postuler" style="color: var(--ks-navy); font-size: 2rem; font-weight: 700;">Postuler maintenant</h2>
                    <p class="sec-text">Remplissez ce formulaire ou envoyez-nous votre CV directement par courriel. Notre équipe RH vous répond sous 5&nbsp;jours ouvrables.</p>
                </div>
                <div class="mt-4" style="background: var(--ks-navy); color: #FFFFFF; padding: 1.5rem; border-radius: 0.5rem;">
                    <p style="color: #FFFFFF; margin-bottom: 0.5rem;"><strong>Téléphone&nbsp;:</strong> <a href="tel:+14184760987" style="color: var(--ks-gold);">418-476-0987</a></p>
                    <p style="color: #FFFFFF; margin-bottom: 0;"><strong>Courriel RH&nbsp;:</strong> <a href="mailto:info@kalystrat.ca" style="color: var(--ks-gold);">info@kalystrat.ca</a></p>
                </div>
            </div>

            <div class="col-lg-7">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>@foreach ($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul>
                    </div>
                @endif

                <form action="{{ route('carrieres.store') }}" method="POST" novalidate class="contact-form" style="background: #F8F8F6; padding: 2rem; border-radius: 0.5rem;">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nom" class="form-label" style="font-weight: 600; color: var(--ks-navy);">Nom complet <span aria-hidden="true">*</span><span class="visually-hidden">obligatoire</span></label>
                            <input type="text" id="nom" name="nom" class="form-control" required maxlength="120" autocomplete="name" value="{{ old('nom') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="courriel" class="form-label" style="font-weight: 600; color: var(--ks-navy);">Courriel <span aria-hidden="true">*</span></label>
                            <input type="email" id="courriel" name="courriel" class="form-control" required maxlength="180" autocomplete="email" value="{{ old('courriel') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="telephone" class="form-label" style="font-weight: 600; color: var(--ks-navy);">Téléphone <span aria-hidden="true">*</span></label>
                            <input type="tel" id="telephone" name="telephone" class="form-control" required maxlength="30" autocomplete="tel" value="{{ old('telephone') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="metier" class="form-label" style="font-weight: 600; color: var(--ks-navy);">Métier souhaité <span aria-hidden="true">*</span></label>
                            <select id="metier" name="metier" class="form-select" required>
                                <option value="">Sélectionner</option>
                                @foreach(['Charpentier-menuisier','Couvreur','Coffreur-bétonneur','Finisseur de béton','Plâtrier-peintre','Ébéniste','Chef d\'équipe','Apprenti (programme PAMT)','Autre'] as $m)
                                    <option value="{{ $m }}" @selected(old('metier')===$m)>{{ $m }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="experience" class="form-label" style="font-weight: 600; color: var(--ks-navy);">Expérience <span aria-hidden="true">*</span></label>
                            <select id="experience" name="experience" class="form-select" required>
                                <option value="">Sélectionner</option>
                                @foreach(['Apprenti / sans expérience','1-3 ans','4-10 ans','10+ ans'] as $e)
                                    <option value="{{ $e }}" @selected(old('experience')===$e)>{{ $e }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="disponibilite" class="form-label" style="font-weight: 600; color: var(--ks-navy);">Disponibilité <span aria-hidden="true">*</span></label>
                            <select id="disponibilite" name="disponibilite" class="form-select" required>
                                <option value="">Sélectionner</option>
                                @foreach(['Immédiate','Sous 2 semaines','Sous 1 mois','Plus tard'] as $d)
                                    <option value="{{ $d }}" @selected(old('disponibilite')===$d)>{{ $d }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label" style="font-weight: 600; color: var(--ks-navy);">Présentez-vous <span aria-hidden="true">*</span></label>
                        <textarea id="message" name="message" class="form-control" rows="5" required minlength="10" maxlength="3000">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="btn style2">Envoyer ma candidature <i class="ri-arrow-right-line" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
