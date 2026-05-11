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
        'contactPoint' => ['@type' => 'ContactPoint', 'contactType' => 'customer service', 'areaServed' => 'CA', 'availableLanguage' => ['French', 'English']],
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

<header class="ks-page-hero">
    <div class="ks-container">
        <ul class="ks-page-hero__breadcrumb">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>Contact</li>
        </ul>
        <h1>Parlons de votre projet</h1>
        <p class="ks-page-hero__subtitle">Une équipe basée à Québec, six filiales spécialisées, un chargé de projet unique pour piloter votre dossier. Réponse sous 24 heures ouvrables.</p>
    </div>
</header>

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
                    <span class="ks-eyebrow">Coordonnées</span>
                    <h3 class="ks-card__title" style="font-size:1.25rem">Adresse</h3>
                    <p class="ks-card__text">Québec, QC, Canada</p>
                </article>

                <article class="ks-card ks-card--accent-gold">
                    <span class="ks-eyebrow">Courriel</span>
                    <h3 class="ks-card__title" style="font-size:1.25rem"><a href="mailto:info@kalystrat.ca">info@kalystrat.ca</a></h3>
                    <p class="ks-card__text">Réponse sous 24 heures ouvrables.</p>
                </article>

                <article class="ks-card ks-card--accent-gold">
                    <span class="ks-eyebrow">Heures d'ouverture</span>
                    <h3 class="ks-card__title" style="font-size:1.25rem">Lundi au vendredi</h3>
                    <p class="ks-card__text">8 h à 17 h, heure de l'Est.</p>
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

@endsection
