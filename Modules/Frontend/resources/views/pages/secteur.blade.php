@extends('frontend::layouts.intime')

@php
$secteurs = [
    'residentiel' => [
        'nom' => 'Résidentiel',
        'tagline' => 'Maisons, condos, multilogements, rénovations',
        'desc' => "Le secteur résidentiel représente le cœur historique de Kalystrat. De la maison unifamiliale custom au projet de condominiums multilogements, nous accompagnons promoteurs, particuliers et investisseurs immobiliers.",
        'projets' => ['Maisons unifamiliales custom', 'Multilogements 4 à 50 unités', 'Condos prestige', 'Rénovations majeures', 'Agrandissements et extensions', 'Garages et abris d\'auto'],
    ],
    'commercial' => [
        'nom' => 'Commercial',
        'tagline' => 'Bureaux, commerces, restaurants, centres commerciaux',
        'desc' => "Pour les espaces commerciaux, Kalystrat allie respect des délais (chaque jour de retard coûte) et qualité d'exécution irréprochable. Nous gérons les enjeux opérationnels (chantier en bâtiment occupé, livraisons fractionnées) avec rigueur.",
        'projets' => ['Immeubles à bureaux', 'Espaces de vente au détail', 'Centres commerciaux', 'Restaurants et hôtellerie', 'Aménagements d\'espaces locatifs', 'Rénovations commerciales'],
    ],
    'institutionnel' => [
        'nom' => 'Institutionnel',
        'tagline' => 'Écoles, hôpitaux, garderies, bâtiments publics',
        'desc' => "Le secteur institutionnel exige conformité réglementaire stricte, normes de sécurité élevées et processus d'appel d'offres maîtrisés. Notre expertise des contrats publics garantit transparence et respect des cahiers de charges.",
        'projets' => ['Écoles primaires et secondaires', 'Pavillons universitaires', 'Cliniques et hôpitaux', 'Garderies (CPE)', 'Centres communautaires', 'Bibliothèques publiques'],
    ],
    'industriel' => [
        'nom' => 'Industriel',
        'tagline' => 'Entrepôts, usines, ateliers, parcs logistiques',
        'desc' => "Construction industrielle : grandes portées, hauteurs élevées, charges importantes, contraintes opérationnelles spécifiques. Kalystrat maîtrise les structures préfabriquées, les enveloppes étanches et les systèmes de levage.",
        'projets' => ['Entrepôts logistiques', 'Usines de transformation', 'Ateliers manufacturiers', 'Centres de distribution', 'Bâtiments agroalimentaires', 'Hangars et stockages'],
    ],
    'municipal' => [
        'nom' => 'Municipal',
        'tagline' => 'Infrastructures publiques, garages municipaux, casernes',
        'desc' => "Les infrastructures municipales servent les citoyens 24/7. Kalystrat construit avec des standards de durabilité élevés, en tenant compte des contraintes budgétaires des municipalités et des cycles d'entretien longs.",
        'projets' => ['Garages municipaux', 'Casernes de pompiers', 'Centres de services aux citoyens', 'Bâtiments d\'usine de filtration', 'Aréna et complexes sportifs', 'Bâtiments des travaux publics'],
    ],
];
abort_unless(isset($secteurs[$slug]), 404);
$s = $secteurs[$slug];
@endphp

@section('title', $s['nom'] . ' — Construction au Québec | Kalystrat')

@push('meta')
<meta name="description" content="Kalystrat construction {{ strtolower($s['nom']) }} au Québec. {{ $s['tagline'] }}. Six filiales spécialisées au service de votre projet.">
<link rel="canonical" href="{{ url('/secteurs/' . $slug) }}">
@endpush

@push('schema')
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'serviceType' => 'Construction ' . strtolower($s['nom']),
    'name' => 'Construction ' . $s['nom'] . ' Kalystrat',
    'description' => $s['desc'],
    'provider' => ['@type' => 'GeneralContractor', 'name' => 'Gestion Kalystrat Inc.', 'url' => 'https://kalystrat.ca'],
    'areaServed' => ['@type' => 'AdministrativeArea', 'name' => 'Québec, Canada'],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Secteurs', 'item' => 'https://kalystrat.ca/secteurs'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => $s['nom'], 'item' => url('/secteurs/' . $slug)],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<section class="page-title" style="background-image:url(/intime/images/background/2.jpg)">
    <div class="auto-container">
        <h1>{{ $s['nom'] }}</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li><a href="{{ route('secteurs.index') }}">Secteurs</a></li>
            <li>{{ $s['nom'] }}</li>
        </ul>
    </div>
</section>

<section class="about-section-two">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 content-column">
                <div class="sec-title">
                    <span class="sub-title">{{ $s['tagline'] }}</span>
                    <h2>Construction {{ strtolower($s['nom']) }}</h2>
                </div>
                <div class="text">
                    <p>{{ $s['desc'] }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="feature-section-four" style="background-color:#f7f7f7;padding:60px 0">
    <div class="auto-container">
        <div class="sec-title centered">
            <span class="sub-title">Types de projets</span>
            <h2>Ce que nous construisons</h2>
        </div>
        <div class="row clearfix">
            @foreach($s['projets'] as $p)
            <div class="feature-block_four col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box" style="background:#fff;padding:25px;border-radius:8px;margin-bottom:20px;border-left:3px solid #FFA000">
                    <h5>{{ $p }}</h5>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="call-to-action" style="background:#f7f7f7;padding:60px 0;text-align:center">
    <div class="auto-container">
        <h2 style="margin-bottom:20px">Un projet {{ strtolower($s['nom']) }} ?</h2>
        <a href="{{ route('contact') }}" class="theme-btn btn-style-ten"><div class="btn-wrap"><span class="text-one">Obtenir une soumission</span><span class="text-two">Soumission</span></div></a>
    </div>
</section>

@endsection
