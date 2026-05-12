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
    eyebrow="Réponse sous 24 h ouvrables"
    title="Parlons de votre projet"
    subtitle="Une équipe basée à Québec, six filiales spécialisées, un chargé de projet dédié à votre dossier. Écrivez-nous ci-dessous ou appelez directement."
>
    <x-slot:breadcrumb>
        <li><a href="{{ url('/') }}">Accueil</a></li>
        <li>Contact</li>
    </x-slot:breadcrumb>
</x-frontend::page-hero>

<section class="ks-section">
    <div class="ks-container">
        <div class="ks-contact-grid">

            {{-- Colonne formulaire (gauche, large) --}}
            <div class="ks-contact-form-wrap">
                @if(session('status'))
                    <div class="ks-contact-success" role="status" aria-live="polite">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.submit') }}" class="ks-contact-form" novalidate>
                    @csrf
                    <div class="ks-contact-form__field">
                        <label for="nom" class="ks-contact-form__label">Nom complet <span aria-hidden="true">*</span></label>
                        <input type="text" id="nom" name="nom" autocomplete="name" required class="ks-contact-form__input">
                    </div>

                    <div class="ks-contact-form__field">
                        <label for="email" class="ks-contact-form__label">Courriel <span aria-hidden="true">*</span></label>
                        <input type="email" id="email" name="email" autocomplete="email" required class="ks-contact-form__input">
                    </div>

                    <div class="ks-contact-form__field">
                        <label for="entreprise" class="ks-contact-form__label">Entreprise <span class="ks-contact-form__hint">(optionnel)</span></label>
                        <input type="text" id="entreprise" name="entreprise" autocomplete="organization" class="ks-contact-form__input">
                    </div>

                    <div class="ks-contact-form__field">
                        <label for="message" class="ks-contact-form__label">Votre projet en quelques mots <span aria-hidden="true">*</span></label>
                        <textarea id="message" name="message" rows="5" required class="ks-contact-form__input ks-contact-form__textarea" placeholder="Type, surface approximative, échéance, ville. Aucun détail technique requis — on s'occupe du reste."></textarea>
                    </div>

                    <div class="ks-contact-form__option">
                        <label class="ks-contact-form__checkbox">
                            <input type="checkbox" id="rappel" name="rappel" value="1" data-toggle-phone>
                            <span>Je préfère un rappel téléphonique</span>
                        </label>
                    </div>

                    <div class="ks-contact-form__field ks-contact-form__field--phone" hidden data-phone-field>
                        <label for="telephone" class="ks-contact-form__label">Téléphone <span class="ks-contact-form__hint">(pour vous rappeler)</span></label>
                        <input type="tel" id="telephone" name="telephone" autocomplete="tel" class="ks-contact-form__input">
                    </div>

                    <button type="submit" class="ks-contact-form__submit">
                        <span>Demander un rappel</span>
                        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false" width="20" height="20"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 6l6 6-6 6"/></svg>
                    </button>

                    <p class="ks-contact-form__note">Réponse sous <strong>24 heures ouvrables</strong>. Aucune obligation, aucun frais. Vos informations restent confidentielles (<a href="{{ url('/politique-confidentialite') }}">Loi 25</a>).</p>
                </form>
            </div>

            {{-- Colonne coordonnées (droite, condensée) --}}
            <aside class="ks-contact-sidebar">
                <div class="ks-contact-card">
                    <span class="ks-eyebrow">Téléphone direct</span>
                    <a href="tel:+14184760987" class="ks-contact-card__phone" aria-label="Appeler Kalystrat au 418 476 0987">418&nbsp;476-0987</a>
                    <p class="ks-contact-card__meta">Lundi au vendredi, 8&nbsp;h à 17&nbsp;h (heure de l'Est)</p>
                </div>

                <div class="ks-contact-card">
                    <span class="ks-eyebrow">Courriel</span>
                    <a href="mailto:info@kalystrat.ca" class="ks-contact-card__email">info@kalystrat.ca</a>
                    <p class="ks-contact-card__meta">Plans, devis, documents techniques. Réponse sous 24&nbsp;h ouvrables.</p>
                </div>

                <div class="ks-contact-card">
                    <span class="ks-eyebrow">Bureau</span>
                    <p class="ks-contact-card__address">Québec, QC, Canada</p>
                    <p class="ks-contact-card__meta">Siège social Capitale-Nationale. Couverture provinciale (<a href="{{ route('zones.index') }}">9 régions desservies</a>).</p>
                </div>
            </aside>

        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
(function () {
    'use strict';
    var toggle = document.querySelector('[data-toggle-phone]');
    var field  = document.querySelector('[data-phone-field]');
    if (!toggle || !field) return;
    toggle.addEventListener('change', function () {
        field.hidden = !toggle.checked;
        if (toggle.checked) {
            var input = field.querySelector('input');
            if (input) input.focus();
        }
    });
})();
</script>
@endpush
