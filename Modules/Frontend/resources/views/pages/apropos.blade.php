@extends('frontend::layouts.intime')

@section('title', 'À propos | Kalystrat — Holding québécois de construction')

@push('meta')
<meta name="description" content="Gestion Kalystrat Inc., holding québécois de construction à intégration verticale. Six filiales spécialisées sous une marque unifiée. Fondateur Ali Salomon.">
<meta name="keywords" content="Kalystrat, holding construction Québec, intégration verticale, Ali Salomon, six filiales construction">
<link rel="canonical" href="{{ url('/a-propos') }}">
<meta property="og:title" content="À propos de Gestion Kalystrat Inc.">
<meta property="og:description" content="Holding québécois à intégration verticale. Six filiales spécialisées, une marque unifiée.">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url('/a-propos') }}">
@endpush

@push('schema')
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'AboutPage',
    'name' => 'À propos de Gestion Kalystrat Inc.',
    'description' => 'Holding québécois de construction à intégration verticale.',
    'url' => 'https://kalystrat.ca/a-propos',
    'mainEntity' => [
        '@type' => 'Organization',
        'name' => 'Gestion Kalystrat Inc.',
        'alternateName' => 'Kalystrat',
        'url' => 'https://kalystrat.ca',
        'founder' => ['@type' => 'Person', 'name' => 'Ali Salomon', 'jobTitle' => 'Président et Directeur Général'],
        'address' => ['@type' => 'PostalAddress', 'addressLocality' => 'Québec', 'addressRegion' => 'QC', 'addressCountry' => 'CA'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'À propos', 'item' => 'https://kalystrat.ca/a-propos'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush


@section('content')

<!-- Page Title -->
<section class="page-title" style="background-image:url(/intime/images/background/2.jpg)">
    <div class="auto-container">
        <h1>À propos de Gestion Kalystrat Inc.</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>À propos</li>
        </ul>
    </div>
</section>

<!-- Notre vision -->
<section class="about-section-two">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 content-column">
                <div class="sec-title">
                    <h2>Notre vision</h2>
                </div>
                <div class="text">
                    <p>Gestion Kalystrat Inc. est un holding québécois de construction à intégration verticale, fondé sur une ambition claire&nbsp;: devenir, d’ici huit ans, un groupe de référence dans l’industrie de la construction au Québec. Nous exerçons un contrôle complet sur la chaîne de valeur - de l’excavation aux finitions - tout en développant des projets immobiliers et en assurant le placement stratégique de main-d’œuvre qualifiée.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Notre fondateur -->
<section class="about-section">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-6 image-column">
                <div class="image-box">
                    <figure class="image"><img src="/intime/images/resource/about-1.jpg" alt="Ali Salomon, Président et Directeur Général de Gestion Kalystrat Inc."></figure>
                </div>
            </div>
            <div class="col-lg-6 content-column">
                <div class="inner-column">
                    <div class="sec-title">
                        <h2>Notre fondateur - Ali Salomon</h2>
                    </div>
                    <div class="text">
                        <p>Visionnaire et entrepreneur chevronné, Ali Salomon incarne l’ADN de Kalystrat. En tant que Président et Directeur Général, il a conçu un modèle d’affaires unique, centré sur la maîtrise intégrale des métiers de la construction. Son expertise opérationnelle, combinée à une rigueur de gestion à la québécoise, positionne Kalystrat comme un acteur structurant dans un secteur en constante évolution.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 6 filiales, 1 marque -->
<section class="feature-section-four" style="background-color:#f7f7f7;padding:80px 0">
    <div class="auto-container">
        <div class="sec-title centered">
            <span class="sub-title">Structure du groupe</span>
            <h2>6 filiales, 1 marque</h2>
        </div>
        <div class="row clearfix">
            @foreach($filiales as $slug => $f)
            <div class="feature-block_four col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <h4><a href="{{ route('filiale', $slug) }}">{{ $f['nom_court'] }}</a></h4>
                    <div class="text">{{ $f['specialite'] }}</div>
                    <a href="{{ route('filiale', $slug) }}" class="theme-btn btn-style-ten" style="margin-top:18px"><span class="text-one">En savoir plus</span><span class="text-two">En savoir plus</span></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Avantage concurrentiel - 6 piliers -->
<section class="about-section-two alternate">
    <div class="auto-container">
        <div class="sec-title centered">
            <span class="sub-title">Pourquoi Kalystrat</span>
            <h2>Notre avantage concurrentiel</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-6 col-sm-12" style="margin-bottom:30px">
                <div class="inner-box" style="background:#fff;padding:30px;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,0.06)">
                    <h5>01. Intégration verticale</h5>
                    <p>De l’excavation à la finition, chaque étape est exécutée en interne - éliminant les marges des sous-traitants et les délais de coordination.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12" style="margin-bottom:30px">
                <div class="inner-box" style="background:#fff;padding:30px;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,0.06)">
                    <h5>02. Main-d’œuvre interne</h5>
                    <p>Kalystrat Placement Construction fournit la main-d’œuvre à toutes les filiales, garantissant disponibilité et cohérence de formation.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12" style="margin-bottom:30px">
                <div class="inner-box" style="background:#fff;padding:30px;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,0.06)">
                    <h5>03. Demande captive</h5>
                    <p>Kalystrat Immobilier développe ses propres projets, générant un flux de travail constant pour les cinq autres filiales.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12" style="margin-bottom:30px">
                <div class="inner-box" style="background:#fff;padding:30px;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,0.06)">
                    <h5>04. Synergies opérationnelles</h5>
                    <p>Immobilier → Fondations → Structure → Toiture-Enveloppe → Finition → Placement : la chaîne complète fonctionne en boucle.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12" style="margin-bottom:30px">
                <div class="inner-box" style="background:#fff;padding:30px;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,0.06)">
                    <h5>05. Cohérence de marque</h5>
                    <p>La convention « Kalystrat + Spécialité » construit la reconnaissance et inspire confiance auprès des clients et partenaires.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12" style="margin-bottom:30px">
                <div class="inner-box" style="background:#fff;padding:30px;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,0.06)">
                    <h5>06. Gestion centralisée</h5>
                    <p>Comptabilité, RH, juridique, marketing et TI centralisés au niveau du holding réduisent les frais généraux par filiale.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Conseil consultatif -->
<section class="team-section">
    <div class="auto-container">
        <div class="sec-title centered">
            <span class="sub-title">Gouvernance</span>
            <h2>Conseil consultatif</h2>
        </div>
        <div class="row clearfix">
            <div class="team-block col-lg-6 col-md-6 col-sm-12">
                <div class="inner-box">
                    <figure class="image"><img src="/intime/images/resource/team-1.jpg" alt="Jacques Jobidon, expert droit de la construction"></figure>
                    <div class="content">
                        <h4>Jacques Jobidon</h4>
                        <span>Expert en droit de la construction</span>
                    </div>
                </div>
            </div>
            <div class="team-block col-lg-6 col-md-6 col-sm-12">
                <div class="inner-box">
                    <figure class="image"><img src="/intime/images/resource/team-2.jpg" alt="Perry Wong, spécialiste immobilier québécois"></figure>
                    <div class="content">
                        <h4>Perry Wong</h4>
                        <span>Spécialiste en immobilier québécois</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA finale -->
<section class="call-to-action" style="background:#f7f7f7;padding:60px 0;text-align:center">
    <div class="auto-container">
        <h2 style="margin-bottom:20px">Discutons de votre projet</h2>
        <a href="{{ url('/contact') }}" class="theme-btn btn-style-ten"><div class="btn-wrap"><span class="text-one">Nous contacter</span><span class="text-two">Nous contacter</span></div></a>
    </div>
</section>

@endsection
