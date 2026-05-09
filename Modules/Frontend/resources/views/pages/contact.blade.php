@extends('frontend::layouts.intime')

@section('title', 'Contact — Demandez une soumission | Kalystrat')

@push('meta')
<meta name="description" content="Contactez Gestion Kalystrat Inc. pour votre projet de construction au Québec. Soumission gratuite, conseil intégré sur six métiers, équipe basée à Québec.">
<link rel="canonical" href="{{ url('/contact') }}">
<meta property="og:title" content="Contact — Kalystrat">
<meta property="og:description" content="Demandez une soumission gratuite. Holding québécois de construction.">
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

<section class="page-title" style="background-image:url(/intime/images/background/2.jpg)">
    <div class="auto-container">
        <h1>Contact</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>Contact</li>
        </ul>
    </div>
</section>

<section class="about-section-two">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-6 content-column">
                <div class="sec-title">
                    <span class="sub-title">Parlons de votre projet</span>
                    <h2>Demandez une soumission gratuite</h2>
                </div>
                <div class="text">
                    <p>Une équipe basée à Québec, six filiales spécialisées, un chargé de projet unique pour piloter votre dossier. Décrivez-nous votre projet (résidentiel, commercial ou institutionnel) et nous vous répondrons sous 24 heures ouvrables.</p>
                </div>

                <div style="margin-top:30px">
                    <h4 style="margin-bottom:15px">Coordonnées</h4>
                    <p><strong>Adresse</strong><br>Québec, QC, Canada</p>
                    <p><strong>Courriel</strong><br><a href="mailto:info@kalystrat.ca">info@kalystrat.ca</a></p>
                    <p><strong>Heures d’ouverture</strong><br>Lundi au vendredi, 8 h à 17 h</p>
                </div>
            </div>

            <div class="col-lg-6 content-column">
                <div class="inner-column">
                    @if(session('status'))
                        <div style="padding:15px;background:#d4edda;border-left:4px solid #28a745;margin-bottom:20px">{{ session('status') }}</div>
                    @endif

                    <form method="POST" action="{{ route('contact.submit') }}" style="background:#f7f7f7;padding:30px;border-radius:8px">
                        @csrf
                        <div class="form-group" style="margin-bottom:15px">
                            <label for="nom" style="display:block;margin-bottom:5px;font-weight:600">Nom complet *</label>
                            <input type="text" id="nom" name="nom" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:4px">
                        </div>
                        <div class="form-group" style="margin-bottom:15px">
                            <label for="email" style="display:block;margin-bottom:5px;font-weight:600">Courriel *</label>
                            <input type="email" id="email" name="email" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:4px">
                        </div>
                        <div class="form-group" style="margin-bottom:15px">
                            <label for="telephone" style="display:block;margin-bottom:5px;font-weight:600">Téléphone</label>
                            <input type="tel" id="telephone" name="telephone" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:4px">
                        </div>
                        <div class="form-group" style="margin-bottom:15px">
                            <label for="filiale" style="display:block;margin-bottom:5px;font-weight:600">Filiale concernée</label>
                            <select id="filiale" name="filiale" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:4px">
                                <option value=""> - Sélectionner - </option>
                                <option value="multi">Plusieurs filiales / projet global</option>
                                <option value="fondations">Kalystrat Fondations</option>
                                <option value="structure">Kalystrat Structure</option>
                                <option value="toiture-enveloppe">Kalystrat Toiture et Enveloppe</option>
                                <option value="finition-interieure">Kalystrat Finition Intérieure</option>
                                <option value="immobilier">Kalystrat Immobilier</option>
                                <option value="placement-construction">Kalystrat Placement Construction</option>
                            </select>
                        </div>
                        <div class="form-group" style="margin-bottom:15px">
                            <label for="message" style="display:block;margin-bottom:5px;font-weight:600">Décrivez votre projet *</label>
                            <textarea id="message" name="message" rows="5" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:4px"></textarea>
                        </div>
                        <button type="submit" class="theme-btn btn-style-ten" style="border:none;cursor:pointer"><div class="btn-wrap"><span class="text-one">Envoyer la demande</span><span class="text-two">Envoyer</span></div></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
