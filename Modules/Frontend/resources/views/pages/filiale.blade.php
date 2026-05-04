@extends('frontend::layout')

@push('head')
@php
    $schemaTypes = [
        'fondations' => 'GeneralContractor',
        'structure'  => 'GeneralContractor',
        'toiture'    => 'RoofingContractor',
        'finition'   => 'HomeAndConstructionBusiness',
        'immobilier' => 'RealEstateAgent',
        'placement'  => 'EmploymentAgency',
    ];
    $schemaType = $schemaTypes[$slug] ?? 'LocalBusiness';
    $filialeName = $filiale['nom_court'] ?? ucfirst($slug);
    $filialeDesc = $filiale['specialite'] ?? '';

    $jsonLdFiliale = [
        '@context' => 'https://schema.org',
        '@type' => $schemaType,
        'name' => $filialeName,
        'url' => 'https://kalystrat.ca/filiales/' . $slug,
        'description' => $filialeDesc,
        'parentOrganization' => ['@type' => 'Organization', 'name' => 'Kalystrat', 'url' => 'https://kalystrat.ca'],
        'areaServed' => ['@type' => 'AdministrativeArea', 'name' => 'Québec, Canada'],
        'address' => ['@type' => 'PostalAddress', 'addressLocality' => 'Québec', 'addressRegion' => 'QC', 'addressCountry' => 'CA'],
        'telephone' => '+14184760987',
    ];

    $jsonLdBreadcrumb = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => 'https://kalystrat.ca/services'],
            ['@type' => 'ListItem', 'position' => 3, 'name' => $filialeName, 'item' => 'https://kalystrat.ca/filiales/' . $slug],
        ],
    ];
@endphp
<meta name="dateModified" content="2026-05-01">
<script type="application/ld+json">
{!! json_encode($jsonLdFiliale, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
<script type="application/ld+json">
{!! json_encode($jsonLdBreadcrumb, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')

{{-- Bannière --}}
@include('frontend::partials.page-banner', [
    'title' => $filialeName,
    'breadcrumbs' => [
        ['label' => 'Accueil', 'url' => route('index')],
        ['label' => 'Services', 'url' => route('services')],
        ['label' => $filialeName, 'url' => null],
    ],
])

{{-- Service details : sidebar (autres filiales) + contenu principal --}}
<div class="service-details-area space-top space-bottom" style="padding: 5rem 0;">
    <div class="container">
        <div class="row g-5">

            {{-- Sidebar gauche --}}
            <aside class="col-lg-4" aria-label="Navigation des filiales et contact">
                <h2 class="visually-hidden">Navigation et contact</h2>
                <div class="service-widget" style="background: #FFFFFF; padding: 1.5rem; border-radius: 0.875rem; margin-bottom: 1.5rem; border: 1px solid rgba(10, 22, 40, 0.10); box-shadow: 0 8px 24px rgba(10, 22, 40, 0.08), 0 2px 6px rgba(10, 22, 40, 0.04);">
                    <h3 style="color: var(--ks-navy); font-size: 1.125rem; font-weight: 700; margin-bottom: 1rem; padding-bottom: 0.75rem; border-bottom: 1px solid #E0DDD3;">Toutes nos filiales</h3>
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        @foreach($filiales as $sl => $f)
                        <li>
                            <a href="{{ route('filiale', ['slug' => $sl]) }}"
                               style="display: flex; align-items: center; justify-content: space-between; min-height: 44px; padding: 0.75rem 1rem; margin-bottom: 0.5rem; background: {{ $sl === $slug ? '#0A1628' : '#FFFFFF' }}; color: {{ $sl === $slug ? '#FFFFFF' : '#0A1628' }}; border-radius: 0.375rem; text-decoration: none; font-weight: 600; font-size: 0.9375rem; transition: background 0.2s;"
                               aria-current="{{ $sl === $slug ? 'page' : 'false' }}">
                                <span>{{ $f['nom_court'] ?? ucfirst($sl) }}</span>
                                <i class="ri-arrow-right-line" aria-hidden="true"></i>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="service-widget" style="background: var(--ks-navy); color: #FFFFFF; padding: 2rem 1.5rem; border-radius: 0.5rem; text-align: center;">
                    <i class="ri-customer-service-2-fill" aria-hidden="true" style="color: var(--ks-gold); font-size: 2.5rem;"></i>
                    <h3 style="color: #FFFFFF; font-size: 1.125rem; font-weight: 700; margin: 1rem 0 0.5rem;">Besoin d'aide&nbsp;?</h3>
                    <p style="color: #C2C5C9; font-size: 0.9rem; margin-bottom: 1rem;">Notre équipe répond sous 48&nbsp;h ouvrables.</p>
                    <a href="tel:+14184760987" style="display: block; color: var(--ks-gold); font-size: 1.25rem; font-weight: 700; text-decoration: none; min-height: 44px;">418-476-0987</a>
                    <a href="mailto:info@kalystrat.ca" style="display: inline-block; color: #C2C5C9; text-decoration: underline; font-size: 0.9rem; min-height: 44px; padding: 0.5rem 0;">info@kalystrat.ca</a>
                </div>
            </aside>

            {{-- Contenu principal --}}
            <div class="col-lg-8">
                <div class="service-img mb-4">
                    @php
                        $filialeImageMap = [
                            'fondations' => 'photos/filiale-fondations.webp',
                            'structure'  => 'photos/filiale-structure.webp',
                            'toiture'    => 'photos/filiale-toiture.webp',
                            'finition'   => 'photos/filiale-finition.webp',
                            'immobilier' => 'photos/filiale-immobilier.webp',
                            'placement'  => 'photos/filiale-placement.webp',
                        ];
                        $filialeImage = $filialeImageMap[$slug] ?? 'project-blueprint.webp';
                    @endphp
                    <img src="{{ asset('assets/img/kalystrat/' . $filialeImage) }}" alt="{{ $filialeName }} – Kalystrat Québec" style="width: 100%; border-radius: 0.5rem;" loading="lazy">
                </div>

                <div class="service-content">
                    <span class="sub-title text-theme">Filiale Kalystrat</span>
                    <h2 class="sec-title" style="color: var(--ks-navy); font-size: 2rem; font-weight: 700; margin-bottom: 1rem;">{{ $filiale['nom_complet'] ?? $filialeName }}</h2>
                    <p class="sec-text" style="font-size: 1.05rem; color: #2C3340;">{{ $filialeDesc }}</p>

                    @if(!empty($filiale['intro_paragraph']))
                    <p style="font-size: 1rem; color: #2C3340; line-height: 1.7; margin-top: 1.25rem;">{{ $filiale['intro_paragraph'] }}</p>
                    @endif

                    @if(!empty($filiale['services']))
                    <h3 style="color: var(--ks-navy); font-size: 1.5rem; font-weight: 700; margin-top: 2rem;">Nos services</h3>
                    <div class="row g-3 mt-2">
                        @foreach($filiale['services'] as $s)
                        <div class="col-md-6">
                            <div style="display: flex; align-items: flex-start; gap: 0.75rem; padding: 0.75rem 0;">
                                <i class="ri-checkbox-circle-fill" aria-hidden="true" style="color: var(--ks-gold); font-size: 1.5rem; flex-shrink: 0; margin-top: 0.125rem;"></i>
                                <span style="color: #2C3340;">{{ $s }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    @if(!empty($filiale['process']))
                    <h3 style="color: var(--ks-navy); font-size: 1.5rem; font-weight: 700; margin-top: 2rem;">Notre méthodologie</h3>
                    <ol style="padding-left: 0; list-style: none; counter-reset: ks-step; margin-top: 1rem;">
                        @foreach($filiale['process'] as $stepName => $stepDesc)
                        <li style="display: flex; gap: 1rem; padding: 1rem 0; border-bottom: 1px solid rgba(184, 164, 114, 0.2); counter-increment: ks-step;">
                            <span aria-hidden="true" style="flex-shrink: 0; width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center; background: var(--ks-navy); color: var(--ks-gold); border-radius: 50%; font-weight: 700; font-size: 0.9375rem;">{{ $loop->iteration }}</span>
                            <div>
                                <strong style="display: block; color: var(--ks-navy); font-size: 1rem; margin-bottom: 0.25rem;">{{ $stepName }}</strong>
                                <span style="color: #2C3340; font-size: 0.9375rem; line-height: 1.6;">{{ $stepDesc }}</span>
                            </div>
                        </li>
                        @endforeach
                    </ol>
                    @endif

                    @if(!empty($filiale['certifications']))
                    <h3 style="color: var(--ks-navy); font-size: 1.5rem; font-weight: 700; margin-top: 2rem;">Conformité et certifications</h3>
                    <ul style="padding-left: 0; list-style: none; margin-top: 1rem;">
                        @foreach($filiale['certifications'] as $cert)
                        <li style="display: flex; align-items: flex-start; gap: 0.75rem; padding: 0.5rem 0;">
                            <i class="ri-shield-check-fill" aria-hidden="true" style="color: var(--ks-gold); font-size: 1.25rem; flex-shrink: 0; margin-top: 0.125rem;"></i>
                            <span style="color: #2C3340; font-size: 0.9375rem;">{{ $cert }}</span>
                        </li>
                        @endforeach
                    </ul>
                    @endif

                    @if(!empty($filiale['cibles']))
                    <h3 style="color: var(--ks-navy); font-size: 1.5rem; font-weight: 700; margin-top: 2rem;">Pour qui&nbsp;?</h3>
                    <ul style="padding-left: 1.25rem; color: #2C3340; line-height: 2;">
                        @foreach($filiale['cibles'] as $c)
                            <li>{{ $c }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <div class="cta-grid-wrap mt-5" style="background: #F8F8F6; padding: 2rem; border-left: 4px solid var(--ks-gold); border-radius: 0.5rem;">
                        <h3 class="title" style="color: var(--ks-navy); font-size: 1.375rem; font-weight: 700; margin-bottom: 0.75rem;">Demande de soumission – {{ $filialeName }}</h3>
                        <p style="color: #2C3340; margin-bottom: 1.25rem;">Pour un projet en lien avec cette filiale, contactez-nous par téléphone ou via le formulaire. Réponse sous 48&nbsp;h ouvrables.</p>
                        <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                            <a href="{{ route('contact') }}?filiale={{ $slug }}" class="btn style2">Formulaire de contact <i class="ri-arrow-right-up-line" aria-hidden="true"></i></a>
                            <a href="tel:+14184760987" class="btn style-border4"><i class="ri-phone-line" aria-hidden="true"></i> 418-476-0987</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
