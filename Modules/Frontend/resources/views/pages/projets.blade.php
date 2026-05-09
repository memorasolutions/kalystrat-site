@extends('frontend::layouts.intime')

@section('title', 'Projets et réalisations | Kalystrat')

@push('meta')
<meta name="description" content="Réalisations Kalystrat : projets résidentiels, commerciaux et institutionnels au Québec. Galerie de chantiers livrés par les six filiales du holding.">
<link rel="canonical" href="{{ url('/projets') }}">
@endpush

@push('schema')
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'Projets Kalystrat',
    'url' => url('/projets'),
    'description' => 'Études de cas et chantiers livrés par les filiales Kalystrat',
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Projets', 'item' => 'https://kalystrat.ca/projets'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<section class="page-title" style="background-image:url(/intime/images/background/2.jpg)">
    <div class="auto-container">
        <h1>Projets et réalisations</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>Projets</li>
        </ul>
    </div>
</section>

<section class="about-section-two">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 content-column">
                <div class="sec-title">
                    <span class="sub-title">Études de cas</span>
                    <h2>Une sélection de nos chantiers</h2>
                </div>
                <div class="text">
                    <p>Cette galerie présente quelques-uns de nos projets emblématiques : maisons custom, condominiums, bâtiments commerciaux et institutionnels. Les photos détaillées des chantiers Kalystrat seront ajoutées progressivement à mesure que les phases de construction se terminent.</p>
                    <p style="margin-top:20px"><em>Galerie en cours de constitution. Pour visualiser des projets en cours, contactez-nous.</em></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="feature-section-four" style="background-color:#f7f7f7;padding:60px 0">
    <div class="auto-container">
        <div class="sec-title centered">
            <span class="sub-title">Bientôt</span>
            <h2>Catégories de projets</h2>
        </div>
        <div class="row clearfix">
            @foreach(['Résidentiel haut de gamme', 'Multilogements', 'Commercial bureaux', 'Institutionnel scolaire', 'Industriel logistique', 'Rénovations majeures'] as $cat)
            <div class="feature-block_four col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box" style="background:#fff;padding:30px;border-radius:8px;margin-bottom:20px;text-align:center">
                    <h5>{{ $cat }}</h5>
                    <div class="text" style="margin-top:10px;color:#888"><em>Études de cas à venir</em></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="call-to-action" style="background:#f7f7f7;padding:60px 0;text-align:center">
    <div class="auto-container">
        <h2 style="margin-bottom:20px">Discutons de votre projet</h2>
        <a href="{{ route('contact') }}" class="theme-btn btn-style-ten"><div class="btn-wrap"><span class="text-one">Démarrer la conversation</span><span class="text-two">Démarrer</span></div></a>
    </div>
</section>

@endsection
