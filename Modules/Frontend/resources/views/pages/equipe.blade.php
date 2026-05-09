@extends('frontend::layouts.intime')

@section('title', 'Équipe et conseil consultatif | Kalystrat')

@php
$membres = [
    'ali-salomon' => ['nom' => 'Ali Salomon', 'titre' => 'Président et Directeur Général', 'role' => 'Fondateur', 'desc' => "Visionnaire et entrepreneur chevronné, Ali Salomon a conçu le modèle d'affaires intégré sur lequel repose Gestion Kalystrat Inc. Il supervise la stratégie globale, les acquisitions et la gouvernance du groupe."],
    'jacques-jobidon' => ['nom' => 'Jacques Jobidon', 'titre' => 'Conseiller — Droit de la construction', 'role' => 'Conseil consultatif', 'desc' => "Expert reconnu en droit de la construction au Québec, Jacques Jobidon apporte son expertise sur les contrats, la gestion des litiges et la conformité réglementaire des chantiers du groupe."],
    'perry-wong' => ['nom' => 'Perry Wong', 'titre' => 'Conseiller — Immobilier québécois', 'role' => 'Conseil consultatif', 'desc' => "Spécialiste en immobilier québécois, Perry Wong conseille Kalystrat Immobilier sur les acquisitions de terrains, les analyses de marché et le développement de projets résidentiels et locatifs."],
];
@endphp

@push('meta')
<meta name="description" content="Équipe Kalystrat : Ali Salomon (Président), six directions de filiales, conseil consultatif (Jacques Jobidon droit, Perry Wong immobilier).">
<link rel="canonical" href="{{ url('/equipe') }}">
@endpush

@push('schema')
<script type="application/ld+json">@php
$persons = [];
foreach($membres as $slug => $m) {
    $persons[] = ['@type' => 'Person', 'name' => $m['nom'], 'jobTitle' => $m['titre'], 'url' => url('/equipe/' . $slug), 'worksFor' => ['@type' => 'Organization', 'name' => 'Gestion Kalystrat Inc.']];
}
echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'Équipe Kalystrat',
    'url' => url('/equipe'),
    'mainEntity' => ['@type' => 'ItemList', 'itemListElement' => array_map(fn($i, $p) => ['@type' => 'ListItem', 'position' => $i + 1, 'item' => $p], array_keys($persons), $persons)],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
@endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Équipe', 'item' => 'https://kalystrat.ca/equipe'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<section class="page-title" style="background-image:url(/intime/images/background/2.jpg)">
    <div class="auto-container">
        <h1>Équipe et gouvernance</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>Équipe</li>
        </ul>
    </div>
</section>

<section class="about-section-two">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 content-column">
                <div class="sec-title">
                    <span class="sub-title">Direction et conseil</span>
                    <h2>Une gouvernance centralisée, une exécution décentralisée</h2>
                </div>
                <div class="text">
                    <p>Gestion Kalystrat Inc. est dirigée par son fondateur Ali Salomon, Président et Directeur Général, qui supervise l’ensemble de la stratégie et des opérations du groupe. Chaque filiale est pilotée par un directeur dédié relevant directement de la présidence. Cette structure permet une vision unifiée à l’échelle du holding et une exécution rigoureuse au niveau de chaque métier. En complément, un conseil consultatif d’experts indépendants éclaire les décisions stratégiques.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ks-content-section" style="padding:60px 0;background-color:#f7f7f7">
    <div class="auto-container">
        <div class="sec-title centered">
            <span class="sub-title">Direction</span>
            <h2>Présidence et direction des filiales</h2>
        </div>
        <div class="row clearfix">
            <div class="team-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box" style="background:#fff;padding:30px;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,0.06);margin-bottom:25px">
                    <div class="content">
                        <span style="font-size:13px;color:#8F3F00;font-weight:600;text-transform:uppercase;letter-spacing:1px">Fondateur</span>
                        <h4 style="margin:8px 0"><a href="{{ route('equipe.membre', 'ali-salomon') }}">Ali Salomon</a></h4>
                        <span style="color:#666">Président et Directeur Général</span>
                        <div style="margin-top:15px;line-height:1.6">Visionnaire et entrepreneur, Ali Salomon a conçu le modèle d’affaires intégré de Gestion Kalystrat Inc. Il supervise la stratégie globale, les acquisitions et la gouvernance du groupe.</div>
                        <div style="margin-top:20px"><a href="{{ route('equipe.membre', 'ali-salomon') }}" class="theme-btn btn-style-ten"><span class="text-one">Profil complet</span><span class="text-two">Profil</span></a></div>
                    </div>
                </div>
            </div>
            @foreach(\Modules\Frontend\Http\Controllers\FilialeController::FILIALES as $fslug => $f)
            <div class="team-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box" style="background:#fff;padding:30px;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,0.06);margin-bottom:25px">
                    <div class="content">
                        <span style="font-size:13px;color:#8F3F00;font-weight:600;text-transform:uppercase;letter-spacing:1px">Direction de filiale</span>
                        <h4 style="margin:8px 0">Directeur</h4>
                        <span style="color:#666">{{ $f['nom_court'] }}</span>
                        <div style="margin-top:15px;line-height:1.6">Pilote opérationnel de la filiale, responsable de l’exécution, de la qualité et du respect des échéanciers. Relève directement de la présidence. <em>Nomination à confirmer.</em></div>
                        <div style="margin-top:20px"><a href="{{ route('filiale', $fslug) }}" class="theme-btn btn-style-ten"><span class="text-one">Voir la filiale</span><span class="text-two">Filiale</span></a></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-content-section" style="padding:60px 0">
    <div class="auto-container">
        <div class="sec-title centered">
            <span class="sub-title">Conseil consultatif</span>
            <h2>Cinq sièges, deux conseillers nommés</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <p style="line-height:1.7;margin-bottom:25px">Le conseil consultatif de Kalystrat est conçu pour réunir cinq profils complémentaires : construction et ingénierie, financement et investissement, droit des affaires, ressources humaines, et immobilier. Deux sièges sont actuellement pourvus, trois autres sont en cours de recrutement.</p>
            </div>

            <div class="team-block col-lg-6 col-md-12 col-sm-12">
                <div class="inner-box" style="background:#fff;padding:30px;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,0.06);margin-bottom:25px;border-left:4px solid #8F3F00">
                    <div class="content">
                        <span style="font-size:13px;color:#8F3F00;font-weight:600;text-transform:uppercase;letter-spacing:1px">Conseiller - Droit des affaires</span>
                        <h4 style="margin:8px 0"><a href="{{ route('equipe.membre', 'jacques-jobidon') }}">Jacques Jobidon</a></h4>
                        <span style="color:#666">Avocat spécialisé en droit de la construction et des sociétés</span>
                        <div style="margin-top:15px;line-height:1.6">Apporte son expertise sur les contrats, les litiges et la conformité réglementaire des chantiers du groupe.</div>
                    </div>
                </div>
            </div>

            <div class="team-block col-lg-6 col-md-12 col-sm-12">
                <div class="inner-box" style="background:#fff;padding:30px;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,0.06);margin-bottom:25px;border-left:4px solid #8F3F00">
                    <div class="content">
                        <span style="font-size:13px;color:#8F3F00;font-weight:600;text-transform:uppercase;letter-spacing:1px">Conseiller - Immobilier</span>
                        <h4 style="margin:8px 0"><a href="{{ route('equipe.membre', 'perry-wong') }}">Perry Wong</a></h4>
                        <span style="color:#666">Spécialiste du marché immobilier québécois</span>
                        <div style="margin-top:15px;line-height:1.6">Conseille Kalystrat Immobilier sur les acquisitions, les analyses de marché et le développement de projets résidentiels et locatifs.</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12" style="margin-top:30px">
                <h4>Sièges en cours de recrutement</h4>
                <div class="row clearfix" style="margin-top:15px">
                    <div class="col-lg-4 col-md-12">
                        <div style="padding:25px;background:#f7f7f7;border-radius:8px;margin-bottom:15px">
                            <strong>Construction et ingénierie</strong><br>
                            <span style="color:#666;font-size:14px">Profil recherché : expert sénior de l’industrie de la construction au Québec.</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div style="padding:25px;background:#f7f7f7;border-radius:8px;margin-bottom:15px">
                            <strong>Financement et investissement</strong><br>
                            <span style="color:#666;font-size:14px">Profil recherché : professionnel en financement d’entreprise et structuration financière.</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div style="padding:25px;background:#f7f7f7;border-radius:8px;margin-bottom:15px">
                            <strong>Ressources humaines</strong><br>
                            <span style="color:#666;font-size:14px">Profil recherché : spécialiste du recrutement et de la gestion de la main-d’œuvre en construction.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ks-content-section" style="padding:60px 0;background:#f7f7f7">
    <div class="auto-container">
        <div class="sec-title centered">
            <span class="sub-title">Services centralisés</span>
            <h2>Les fonctions de soutien au niveau de la holding</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div style="padding:25px;background:#fff;border-radius:8px;margin-bottom:20px">
                    <h5>Comptabilité et finances</h5>
                    <p style="margin-top:10px;color:#555">Tenue de livres, états financiers consolidés, gestion de la trésorerie, planification fiscale, budgétisation.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div style="padding:25px;background:#fff;border-radius:8px;margin-bottom:20px">
                    <h5>Ressources humaines</h5>
                    <p style="margin-top:10px;color:#555">Recrutement de cadres, paie, avantages sociaux, santé-sécurité au travail, conformité CCQ.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div style="padding:25px;background:#fff;border-radius:8px;margin-bottom:20px">
                    <h5>Juridique</h5>
                    <p style="margin-top:10px;color:#555">Contrats, conformité réglementaire (RBQ, CCQ), propriété intellectuelle, gestion des litiges.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div style="padding:25px;background:#fff;border-radius:8px;margin-bottom:20px">
                    <h5>Marketing</h5>
                    <p style="margin-top:10px;color:#555">Stratégie de marque unifiée, site web, médias sociaux, publicité et relations publiques.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div style="padding:25px;background:#fff;border-radius:8px;margin-bottom:20px">
                    <h5>Technologies de l’information</h5>
                    <p style="margin-top:10px;color:#555">Infrastructure informatique, logiciels de gestion de projet, système ERP, cybersécurité.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div style="padding:25px;background:#fff;border-radius:8px;margin-bottom:20px">
                    <h5>Stratégie et acquisitions</h5>
                    <p style="margin-top:10px;color:#555">Direction stratégique du groupe, acquisitions, allocation des ressources entre filiales.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
