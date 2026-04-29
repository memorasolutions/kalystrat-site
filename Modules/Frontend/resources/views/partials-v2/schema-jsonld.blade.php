@php
    $appUrl = config('app.url');
    $filiales = require module_path('Frontend', 'config/filiales.php');
@endphp
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@graph": [
        {
            "@@type": "WebSite",
            "@@id": "{{ $appUrl }}/#website",
            "url": "{{ $appUrl }}",
            "name": "Kalystrat",
            "description": "Holding québécois en construction — Conçu. Réalisé. Livré.",
            "inLanguage": "fr-CA",
            "publisher": { "@@id": "{{ $appUrl }}/#organization" }
        },
        {
            "@@type": ["Organization", "LocalBusiness", "GeneralContractor"],
            "@@id": "{{ $appUrl }}/#organization",
            "name": "Gestion Kalystrat Inc.",
            "alternateName": "Kalystrat",
            "url": "{{ $appUrl }}",
            "logo": "{{ asset('assets/img/kalystrat/logo-header.svg') }}",
            "image": "{{ asset('assets/img/kalystrat/logo-header.svg') }}",
            "description": "Holding québécois regroupant 6 filiales spécialisées en construction, immobilier et placement de personnel.",
            "slogan": "Conçu. Réalisé. Livré.",
            "foundingDate": "2026",
            "founder": {
                "@@type": "Person",
                "name": "Ali Salomon",
                "jobTitle": "Fondateur, président et directeur général"
            },
            "telephone": "+1-581-578-6145",
            "email": "info@kalystrat.ca",
            "address": {
                "@@type": "PostalAddress",
                "addressLocality": "Québec",
                "addressRegion": "QC",
                "addressCountry": "CA"
            },
            "geo": {
                "@@type": "GeoCoordinates",
                "latitude": 46.8139,
                "longitude": -71.2080
            },
            "areaServed": [
                { "@@type": "City", "name": "Québec" },
                { "@@type": "City", "name": "Lévis" },
                { "@@type": "AdministrativeArea", "name": "Province de Québec" }
            ],
            "openingHoursSpecification": {
                "@@type": "OpeningHoursSpecification",
                "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday"],
                "opens": "08:00",
                "closes": "17:00"
            },
            "knowsLanguage": ["fr", "en"],
            "priceRange": "$$",
            "paymentAccepted": ["Cash", "Credit Card", "Bank Transfer", "Check"],
            "currenciesAccepted": "CAD",
            "sameAs": [
                "https://facebook.com/kalystrat",
                "https://linkedin.com/company/kalystrat",
                "https://instagram.com/kalystrat"
            ],
            "subOrganization": [
                @foreach($filiales as $slug => $f)
                {
                    "@@type": [
                        "Organization",
                        @if($slug === 'toiture')"RoofingContractor"@elseif($slug === 'immobilier')"RealEstateAgent"@elseif($slug === 'placement')"EmploymentAgency"@else"GeneralContractor"@endif
                    ],
                    "@@id": "{{ $appUrl }}/filiales/{{ $slug }}#org",
                    "name": "{{ $f['nom_complet'] }}",
                    "url": "{{ route('kalystrat.filiale', $slug) }}",
                    "description": "{{ $f['specialite'] }}",
                    "parentOrganization": { "@@id": "{{ $appUrl }}/#organization" }
                }@if(!$loop->last),@endif
                @endforeach
            ]
        },
        @foreach($filiales as $slug => $f)
        @php
            $serviceTypes = [
                'fondations' => 'Foundation Construction',
                'structure' => 'Building Structure Construction',
                'toiture' => 'Roofing and Building Envelope Service',
                'finition' => 'Interior Finishing Service',
                'immobilier' => 'Real Estate Development',
                'placement' => 'Construction Staffing Agency',
            ];
            $isB2B = in_array($slug, ['immobilier', 'placement']);
            $audienceType = $isB2B ? 'BusinessAudience' : 'Audience';
            $audienceLabel = $isB2B ? 'Business' : 'Consumer';
        @endphp
        {
            "@@type": "Service",
            "@@id": "{{ $appUrl }}/filiales/{{ $slug }}#service",
            "name": "{{ $f['nom_complet'] }} — {{ $f['specialite'] }}",
            "serviceType": "{{ $serviceTypes[$slug] ?? 'Construction Service' }}",
            "provider": { "@@id": "{{ $appUrl }}/filiales/{{ $slug }}#org" },
            "url": "{{ route('kalystrat.filiale', $slug) }}",
            "areaServed": [
                { "@@type": "City", "name": "Québec" },
                { "@@type": "City", "name": "Lévis" },
                { "@@type": "AdministrativeArea", "name": "Province de Québec" }
            ],
            "audience": {
                "@@type": "{{ $audienceType }}",
                "audienceType": "{{ $audienceLabel }}"
            },
            "availableChannel": {
                "@@type": "ServiceChannel",
                "serviceUrl": "{{ route('kalystrat.filiale', $slug) }}",
                "servicePhone": "+1-581-578-6145"
            },
            "description": "{{ implode(', ', $f['services']) }}"
        },
        @endforeach
        {
            "@@type": "HowTo",
            "@@id": "{{ $appUrl }}/#methodologie",
            "name": "Méthodologie Kalystrat",
            "description": "Notre approche en 4 étapes pour chaque projet de construction.",
            "step": [
                { "@@type": "HowToStep", "position": 1, "name": "Planification", "text": "Évaluation du terrain, étude des besoins, analyse réglementaire RBQ et estimation budgétaire intégrée par filiale." },
                { "@@type": "HowToStep", "position": 2, "name": "Conception", "text": "Plans architecturaux, ingénierie structurale et mécanique, choix des matériaux, validation conformité et permis de construction." },
                { "@@type": "HowToStep", "position": 3, "name": "Réalisation", "text": "Excavation, fondations, structure, toiture, finition. Six filiales coordonnées par notre équipe centrale, main-d'œuvre interne via Placement." },
                { "@@type": "HowToStep", "position": 4, "name": "Livraison", "text": "Inspection finale, mise en service, remise des clés et accompagnement post-livraison. Garanties prolongées sur les éléments structuraux." }
            ]
        }
    ]
}
</script>
