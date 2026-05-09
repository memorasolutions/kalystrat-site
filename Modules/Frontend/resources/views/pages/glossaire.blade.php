@extends('frontend::layouts.intime')

@section('title', 'Glossaire de la construction au Québec | Kalystrat')

@php
$termes = [
    ['t' => 'CCQ', 'd' => "Commission de la construction du Québec. Organisme paritaire qui régit l'industrie de la construction (relations de travail, formation, qualification, assurances, retraite)."],
    ['t' => 'RBQ', 'd' => "Régie du bâtiment du Québec. Organisme provincial qui délivre les licences obligatoires aux entrepreneurs et constructeurs-propriétaires, et qui veille à la conformité des travaux au Code de construction."],
    ['t' => 'CNESST', 'd' => "Commission des normes, de l'équité, de la santé et de la sécurité du travail. Encadre la santé-sécurité sur les chantiers et indemnise les accidents de travail."],
    ['t' => 'Code de construction du Québec', 'd' => "Règlement provincial qui établit les exigences minimales de conception, construction et rénovation des bâtiments. Chapitre Bâtiment, chapitre Plomberie, chapitre Énergie, etc."],
    ['t' => 'Cautionnement', 'd' => "Garantie financière fournie par l'entrepreneur (souvent via une compagnie de cautionnement) pour assurer l'exécution des travaux et le paiement des sous-traitants et fournisseurs."],
    ['t' => 'Hypothèque légale', 'd' => "Garantie automatique qu'un fournisseur ou sous-traitant impayé peut faire publier sur l'immeuble pour sécuriser sa créance. Délais de péremption : 30 jours après fin des travaux."],
    ['t' => 'BIM', 'd' => "Building Information Modeling. Modélisation 3D paramétrée d'un bâtiment intégrant géométrie, matériaux, systèmes mécaniques et planning. Permet la coordination des disciplines avant chantier."],
    ['t' => 'Pare-air et pare-vapeur', 'd' => "Membranes de l'enveloppe du bâtiment. Le pare-air contrôle l'infiltration d'air, le pare-vapeur contrôle le passage de l'humidité. Critiques pour l'efficacité énergétique."],
    ['t' => 'Coffrage', 'd' => "Structure temporaire (bois, acier, aluminium) qui maintient le béton frais en position le temps qu'il durcisse. Spécialité de Kalystrat Fondations."],
    ['t' => 'Drain français', 'd' => "Système de drainage périphérique installé au pied des fondations pour évacuer l'eau du sol et éviter l'humidité dans le sous-sol. Obligatoire au Québec pour les bâtiments avec sous-sol."],
    ['t' => 'Charpente', 'd' => "Structure portante d'un bâtiment (poutres, colonnes, fermes, solives). Peut être en bois (résidentiel, commercial léger), en acier (commercial, industriel) ou hybride."],
    ['t' => 'Membrane élastomère', 'd' => "Type de toiture moderne, souple, soudée à chaud. Excellente longévité (25-30 ans) et adaptée aux toits plats commerciaux et institutionnels."],
    ['t' => 'EPDM / TPO', 'd' => "Matériaux de toiture synthétiques pour toits plats. EPDM (caoutchouc) noir et durable; TPO (thermoplastique) blanc et réfléchissant pour réduire le coût de climatisation."],
    ['t' => 'LEED', 'd' => "Leadership in Energy and Environmental Design. Certification internationale de bâtiments écologiques. 4 niveaux : Certifié, Argent, Or, Platine."],
    ['t' => 'Novoclimat', 'd' => "Programme québécois de certification de maisons à haute performance énergétique. Exigences supérieures au Code et incitatifs financiers pour les acheteurs."],
    ['t' => 'Plan de garantie GCR', 'd' => "Garantie de Construction Résidentielle. Plan obligatoire pour neuf résidentiel au Québec, couvre vices et défauts pendant 5 ans."],
    ['t' => 'Lotissement', 'd' => "Division d'un terrain en plusieurs lots constructibles. Nécessite approbation municipale, plan d'arpentage et installation des services (eau, égout, électricité, voirie)."],
    ['t' => 'CPE', 'd' => "Centre de la petite enfance. Garderies subventionnées au Québec. Construction réglementée par le ministère de la Famille."],
    ['t' => 'EPI', 'd' => "Équipement de protection individuelle. Casque, lunettes, gants, harnais, chaussures de sécurité — exigés sur tout chantier de construction."],
    ['t' => 'Compagnon', 'd' => "Travailleur certifié dans un métier de la construction (charpentier, briqueteur, etc.) après avoir complété un nombre d'heures requis comme apprenti."],
];
@endphp

@push('meta')
<meta name="description" content="Glossaire de la construction au Québec : CCQ, RBQ, BIM, charpente, coffrage, LEED, Novoclimat, EPI, hypothèque légale, et plus de 20 termes techniques expliqués.">
<link rel="canonical" href="{{ url('/glossaire') }}">
@endpush

@push('schema')
<script type="application/ld+json">@php
$defs = array_map(fn($t) => ['@type' => 'DefinedTerm', 'name' => $t['t'], 'description' => $t['d']], $termes);
echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'DefinedTermSet',
    'name' => 'Glossaire de la construction au Québec',
    'url' => url('/glossaire'),
    'hasDefinedTerm' => $defs,
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
@endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Glossaire', 'item' => 'https://kalystrat.ca/glossaire'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<section class="page-title" style="background-image:url(/intime/images/background/2.jpg)">
    <div class="auto-container">
        <h1>Glossaire de la construction</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>Glossaire</li>
        </ul>
    </div>
</section>

<section class="about-section-two">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 content-column">
                <div class="sec-title">
                    <span class="sub-title">Termes techniques</span>
                    <h2>Le vocabulaire de la construction au Québec</h2>
                </div>
                <div class="text">
                    <p>La construction utilise un vocabulaire technique spécifique. Ce glossaire explique les termes que vous rencontrerez sur un contrat, un devis, un plan ou pendant les rencontres de chantier. Définitions adaptées au contexte québécois.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="feature-section-four" style="background-color:#f7f7f7;padding:60px 0">
    <div class="auto-container">
        @foreach($termes as $term)
        <div style="background:#fff;padding:20px 25px;margin-bottom:12px;border-radius:6px;border-left:4px solid #FFA000">
            <h5 style="margin:0 0 8px 0;color:#222">{{ $term['t'] }}</h5>
            <div style="color:#555;line-height:1.6">{{ $term['d'] }}</div>
        </div>
        @endforeach
    </div>
</section>

@endsection
