@extends('frontend::layout')

@push('head')
<meta name="dateModified" content="2026-05-01">

@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "ContactPage",
    "name": "Contact Kalystrat",
    "url": "https://kalystrat.ca/contact",
    "dateModified": "2026-05-01",
    "mainEntity": {
        "@type": "Organization",
        "name": "Kalystrat",
        "url": "https://kalystrat.ca",
        "telephone": "+14184760987",
        "email": "info@kalystrat.ca",
        "address": {"@type": "PostalAddress", "addressLocality": "Québec", "addressRegion": "QC", "addressCountry": "CA"},
        "openingHoursSpecification": [{"@type": "OpeningHoursSpecification", "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday"], "opens": "08:00", "closes": "17:00"}],
        "contactPoint": {"@type": "ContactPoint", "telephone": "+14184760987", "contactType": "customer service", "areaServed": "CA-QC", "availableLanguage": ["French", "English"]}
    }
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Accueil", "item": "https://kalystrat.ca/" },
        { "@type": "ListItem", "position": 2, "name": "Contact", "item": "https://kalystrat.ca/contact" }
    ]
}
</script>
@endverbatim
@endpush

@section('content')

{{-- Bannière --}}
@include('frontend::partials.page-banner', [
    'title' => 'Contact',
    'breadcrumbs' => [
        ['label' => 'Accueil', 'url' => route('index')],
        ['label' => 'Contact', 'url' => null],
    ],
])

{{-- Cartes de contact (téléphone, courriel, adresse) --}}
<div class="contact-area space-top" style="padding: 5rem 0 2rem;">
    <div class="container">
        <div class="title-area text-center mb-5">
            <span class="sub-title text-theme">Parlons-nous</span>
            <h2 class="sec-title" style="color: var(--ks-navy); font-size: 2.25rem; font-weight: 700;">Trois canaux pour nous joindre</h2>
            <p class="sec-text" style="max-width: 760px; margin: 1rem auto 0;">Téléphone, courriel ou formulaire&nbsp;: choisissez le canal qui vous convient. Réponse sous 48&nbsp;h ouvrables, sans engagement.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <article class="ks-card ks-card--centered ks-card--accent" style="--card-accent: #B8A472;">
                    <span class="ks-card__icon ks-card__icon--circle" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg></span>
                    <h3 class="ks-card__title">Téléphone</h3>
                    <p class="ks-card__text">Lun&nbsp;– Ven, 8&nbsp;h à 17&nbsp;h</p>
                    <a href="tel:+14184760987" style="color: #0A1628; font-weight: 700; font-size: 1.125rem; text-decoration: underline; text-underline-offset: 4px; text-decoration-color: #B8A472; min-height: 44px; display: inline-flex; align-items: center; align-self: center; margin-top: auto;">418-476-0987</a>
                </article>
            </div>
            <div class="col-md-4">
                <article class="ks-card ks-card--centered ks-card--accent" style="--card-accent: #B8A472;">
                    <span class="ks-card__icon ks-card__icon--circle" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></span>
                    <h3 class="ks-card__title">Courriel</h3>
                    <p class="ks-card__text">Réponse sous 48&nbsp;h ouvrables</p>
                    <a href="mailto:info@kalystrat.ca" style="color: #0A1628; font-weight: 700; font-size: 1.05rem; text-decoration: underline; text-underline-offset: 4px; text-decoration-color: #B8A472; min-height: 44px; display: inline-flex; align-items: center; align-self: center; margin-top: auto;">info@kalystrat.ca</a>
                </article>
            </div>
            <div class="col-md-4">
                <article class="ks-card ks-card--centered ks-card--accent" style="--card-accent: #B8A472;">
                    <span class="ks-card__icon ks-card__icon--circle" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></span>
                    <h3 class="ks-card__title">Siège social</h3>
                    <p class="ks-card__text">Rendez-vous sur invitation</p>
                    <p style="color: #0A1628; font-weight: 700; font-size: 1.05rem; margin: auto 0 0; align-self: center;">Québec, QC, Canada</p>
                </article>
            </div>
        </div>
    </div>
</div>

{{-- Formulaire de contact --}}
<div class="space-top space-bottom" style="padding: 4rem 0 5rem;">
    <div class="container">
        <div class="row g-5 align-items-start">
            <div class="col-lg-5">
                <div class="title-area">
                    <span class="sub-title text-theme">Demande de soumission</span>
                    <h2 class="sec-title" style="color: var(--ks-navy); font-size: 2rem; font-weight: 700;">Décrivez-nous votre projet</h2>
                    <p class="sec-text">Précisez la filiale concernée, votre budget approximatif et l'échéance souhaitée. Plus le contexte est clair, plus la réponse est précise. Tous les champs marqués <span aria-hidden="true">*</span> sont obligatoires.</p>
                </div>
                <div class="mt-4" style="background: var(--ks-navy); color: #FFFFFF; padding: 2rem; border-radius: 0.5rem;">
                    <h3 style="color: #FFFFFF; font-size: 1.125rem; font-weight: 700; margin-bottom: 1rem;">Coordonnées</h3>
                    <p style="margin-bottom: 0.5rem; color: #FFFFFF;"><i class="ri-phone-line" aria-hidden="true" style="color: var(--ks-gold);"></i> <a href="tel:+14184760987" style="color: var(--ks-gold);">418-476-0987</a></p>
                    <p style="margin-bottom: 0.5rem; color: #FFFFFF;"><i class="ri-mail-line" aria-hidden="true" style="color: var(--ks-gold);"></i> <a href="mailto:info@kalystrat.ca" style="color: var(--ks-gold);">info@kalystrat.ca</a></p>
                    <p style="margin-bottom: 0.5rem; color: #FFFFFF;"><i class="ri-map-pin-line" aria-hidden="true" style="color: var(--ks-gold);"></i> Québec, QC, Canada</p>
                    <p style="margin-bottom: 0; color: #FFFFFF;"><i class="ri-time-line" aria-hidden="true" style="color: var(--ks-gold);"></i> Lun – Ven 8&nbsp;h à 17&nbsp;h</p>
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

                <form action="{{ route('contact.store') }}" method="POST" novalidate class="contact-form" style="background: #F8F8F6; padding: 2rem; border-radius: 0.5rem;">
                    @csrf
                    <div class="mb-3">
                        <label for="nom" class="form-label" style="font-weight: 600; color: var(--ks-navy);">Nom complet <span aria-hidden="true">*</span><span class="visually-hidden">obligatoire</span></label>
                        <input type="text" id="nom" name="nom" class="form-control" required maxlength="120" autocomplete="name" value="{{ old('nom') }}">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label" style="font-weight: 600; color: var(--ks-navy);">Courriel <span aria-hidden="true">*</span></label>
                            <input type="email" id="email" name="email" class="form-control" required maxlength="180" autocomplete="email" value="{{ old('email') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telephone" class="form-label" style="font-weight: 600; color: var(--ks-navy);">Téléphone</label>
                            <input type="tel" id="telephone" name="telephone" class="form-control" maxlength="30" autocomplete="tel" value="{{ old('telephone') }}">
                        </div>
                    </div>
                    @php
                        $villesMap = [
                            'quebec' => 'Québec',
                            'levis' => 'Lévis',
                            'sainte-foy' => 'Sainte-Foy',
                            'beauport' => 'Beauport',
                            'sillery' => 'Sillery',
                            'autre' => 'Autre (à préciser dans le message)',
                        ];
                        $villePreset = old('ville') ?: ($villesMap[request('ville')] ?? request('ville') ?? '');
                    @endphp
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="ville" class="form-label" style="font-weight: 600; color: var(--ks-navy);">Ville du projet</label>
                            <input type="text" id="ville" name="ville" class="form-control" maxlength="80" autocomplete="address-level2" value="{{ $villePreset }}" list="villes-suggestions" placeholder="Ex&nbsp;: Québec, Lévis, Montréal, Sherbrooke…">
                            <datalist id="villes-suggestions">
                                <option value="Québec">
                                <option value="Lévis">
                                <option value="Sainte-Foy">
                                <option value="Beauport">
                                <option value="Sillery">
                                <option value="Charlesbourg">
                                <option value="Cap-Rouge">
                                <option value="Montréal">
                                <option value="Laval">
                                <option value="Longueuil">
                                <option value="Sherbrooke">
                                <option value="Trois-Rivières">
                                <option value="Gatineau">
                                <option value="Saguenay">
                            </datalist>
                            <small class="form-text" style="color: rgba(10, 22, 40, 0.6); font-size: 0.8125rem; margin-top: 0.25rem; display: block;">Hors Capitale-Nationale&nbsp;? Indiquez votre ville — nous évaluons la faisabilité pour les projets d'envergure partout au Québec.</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="filiale" class="form-label" style="font-weight: 600; color: var(--ks-navy);">Filiale concernée</label>
                            <select id="filiale" name="filiale" class="form-select">
                                <option value="general" @selected(old('filiale')==='general' || (!old('filiale') && !request('filiale')))>Demande générale</option>
                                <option value="fondations" @selected(old('filiale')==='fondations' || request('filiale')==='fondations')>Kalystrat Fondations</option>
                                <option value="structure" @selected(old('filiale')==='structure' || request('filiale')==='structure')>Kalystrat Structure</option>
                                <option value="toiture" @selected(old('filiale')==='toiture' || request('filiale')==='toiture')>Kalystrat Toiture et Enveloppe</option>
                                <option value="finition" @selected(old('filiale')==='finition' || request('filiale')==='finition')>Kalystrat Finition Intérieure</option>
                                <option value="immobilier" @selected(old('filiale')==='immobilier' || request('filiale')==='immobilier')>Kalystrat Immobilier</option>
                                <option value="placement" @selected(old('filiale')==='placement' || request('filiale')==='placement')>Kalystrat Placement Construction</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="budget" class="form-label" style="font-weight: 600; color: var(--ks-navy);">Budget approximatif</label>
                            <select id="budget" name="budget" class="form-select">
                                <option value="">Sélectionner</option>
                                <option value="<50k" @selected(old('budget')==='<50k')>Moins de 50&nbsp;000&nbsp;$</option>
                                <option value="50-200k" @selected(old('budget')==='50-200k')>50&nbsp;000 – 200&nbsp;000&nbsp;$</option>
                                <option value="200-500k" @selected(old('budget')==='200-500k')>200&nbsp;000 – 500&nbsp;000&nbsp;$</option>
                                <option value="500k-1M" @selected(old('budget')==='500k-1M')>500&nbsp;000&nbsp;$ – 1&nbsp;M&nbsp;$</option>
                                <option value=">1M" @selected(old('budget')==='>1M')>Plus de 1&nbsp;M&nbsp;$</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="echeance" class="form-label" style="font-weight: 600; color: var(--ks-navy);">Échéance souhaitée</label>
                        <select id="echeance" name="echeance" class="form-select">
                            <option value="">Sélectionner</option>
                            <option value="immediat" @selected(old('echeance')==='immediat')>Dès que possible</option>
                            <option value="3-mois" @selected(old('echeance')==='3-mois')>Dans 3 mois</option>
                            <option value="6-mois" @selected(old('echeance')==='6-mois')>Dans 6 mois</option>
                            <option value="1-an" @selected(old('echeance')==='1-an')>Dans 1 an ou plus</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label" style="font-weight: 600; color: var(--ks-navy);">Décrivez votre projet <span aria-hidden="true">*</span></label>
                        <textarea id="message" name="message" class="form-control" rows="5" required minlength="10" maxlength="3000">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="btn style2">Envoyer ma demande <i class="ri-arrow-right-line" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
