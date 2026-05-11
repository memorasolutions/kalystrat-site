@extends('frontend::layouts.intime')

@section('title', 'Glossaire de la construction au Québec | Kalystrat')

@php
$termes = [
    ['t' => 'CCQ', 'd' => "Commission de la construction du Québec. Organisme paritaire qui régit l’industrie de la construction (relations de travail, formation, qualification, assurances, retraite)."],
    ['t' => 'RBQ', 'd' => "Régie du bâtiment du Québec. Organisme provincial qui délivre les licences obligatoires aux entrepreneurs et constructeurs-propriétaires, et qui veille à la conformité des travaux au Code de construction."],
    ['t' => 'CNESST', 'd' => "Commission des normes, de l’équité, de la santé et de la sécurité du travail. Encadre la santé-sécurité sur les chantiers et indemnise les accidents de travail."],
    ['t' => 'Code de construction du Québec', 'd' => "Règlement provincial qui établit les exigences minimales de conception, construction et rénovation des bâtiments. Chapitre Bâtiment, chapitre Plomberie, chapitre Énergie, etc."],
    ['t' => 'Cautionnement', 'd' => "Garantie financière fournie par l’entrepreneur (souvent via une compagnie de cautionnement) pour assurer l’exécution des travaux et le paiement des sous-traitants et fournisseurs."],
    ['t' => 'Hypothèque légale', 'd' => "Garantie automatique qu’un fournisseur ou sous-traitant impayé peut faire publier sur l’immeuble pour sécuriser sa créance. Délais de péremption&nbsp;: 30 jours après fin des travaux."],
    ['t' => 'BIM', 'd' => "Building Information Modeling. Modélisation 3D paramétrée d’un bâtiment intégrant géométrie, matériaux, systèmes mécaniques et planning. Permet la coordination des disciplines avant chantier."],
    ['t' => 'Pare-air et pare-vapeur', 'd' => "Membranes de l’enveloppe du bâtiment. Le pare-air contrôle l’infiltration d’air, le pare-vapeur contrôle le passage de l’humidité. Critiques pour l’efficacité énergétique."],
    ['t' => 'Coffrage', 'd' => "Structure temporaire (bois, acier, aluminium) qui maintient le béton frais en position le temps qu’il durcisse. Spécialité de Kalystrat Fondations."],
    ['t' => 'Drain français', 'd' => "Système de drainage périphérique installé au pied des fondations pour évacuer l’eau du sol et éviter l’humidité dans le sous-sol. Obligatoire au Québec pour les bâtiments avec sous-sol."],
    ['t' => 'Charpente', 'd' => "Structure portante d’un bâtiment (poutres, colonnes, fermes, solives). Peut être en bois (résidentiel, commercial léger), en acier (commercial, industriel) ou hybride."],
    ['t' => 'Membrane élastomère', 'd' => "Type de toiture moderne, souple, soudée à chaud. Excellente longévité (25-30 ans) et adaptée aux toits plats commerciaux et institutionnels."],
    ['t' => 'EPDM / TPO', 'd' => "Matériaux de toiture synthétiques pour toits plats. EPDM (caoutchouc) noir et durable&nbsp;; TPO (thermoplastique) blanc et réfléchissant pour réduire le coût de climatisation."],
    ['t' => 'LEED', 'd' => "Leadership in Energy and Environmental Design. Certification internationale de bâtiments écologiques. 4 niveaux&nbsp;: Certifié, Argent, Or, Platine."],
    ['t' => 'Novoclimat', 'd' => "Programme québécois de certification de maisons à haute performance énergétique. Exigences supérieures au Code et incitatifs financiers pour les acheteurs."],
    ['t' => 'Plan de garantie GCR', 'd' => "Garantie de Construction Résidentielle. Plan obligatoire pour neuf résidentiel au Québec, couvre vices et défauts pendant 5 ans."],
    ['t' => 'Lotissement', 'd' => "Division d’un terrain en plusieurs lots constructibles. Nécessite approbation municipale, plan d’arpentage et installation des services (eau, égout, électricité, voirie)."],
    ['t' => 'CPE', 'd' => "Centre de la petite enfance. Garderies subventionnées au Québec. Construction réglementée par le ministère de la Famille."],
    ['t' => 'EPI', 'd' => "Équipement de protection individuelle. Casque, lunettes, gants, harnais, chaussures de sécurité — exigés sur tout chantier de construction."],
    ['t' => 'Compagnon', 'd' => "Travailleur certifié dans un métier de la construction (charpentier, briqueteur, etc.) après avoir complété un nombre d’heures requis comme apprenti."],
    ['t' => 'Tirage de joints', 'd' => "Technique de finition consistant à combler et lisser les joints entre panneaux de gypse à l’aide de pâte et de ruban. La norme niveau 5 exige une surface parfaitement lisse, même sous éclairage rasant."],
    ['t' => 'Solive', 'd' => "Pièce horizontale en bois ou en acier soutenant le plancher ou le plafond, posée perpendiculairement aux poutres porteuses. Espacement standard 16 pouces centre à centre en résidentiel."],
    ['t' => 'Lambourde', 'd' => "Petite pièce de bois fixée perpendiculairement aux solives pour supporter un plancher fini (plancher flottant, carrelage). Assure une surface plane et régulière."],
    ['t' => 'Solage', 'd' => "Fondation périphérique en béton armé située sous le niveau du sol, supportant les murs porteurs d’un bâtiment et transférant les charges au sol stable. Profondeur minimale 1,5&nbsp;m au QC pour passer sous la ligne de gel."],
    ['t' => 'Soumission verbale', 'd' => "Offre orale d’un entrepreneur pour réaliser des travaux. Non contraignante ni recevable devant les tribunaux québécois&nbsp;: la Loi sur la protection du consommateur exige un contrat écrit pour tout chantier résidentiel de plus de 200&nbsp;$."],
    ['t' => 'Vice caché vs apparent', 'd' => "Un vice caché est un défaut non visible lors de la réception des travaux, rendant l’ouvrage impropre à son usage (article 1726 C.c.Q.). Un vice apparent est observable par un propriétaire diligent et doit être signalé immédiatement pour engager la responsabilité du constructeur."],
    ['t' => 'Hypothèque légale de construction', 'd' => "Garantie automatique permettant aux entrepreneurs, sous-traitants et fournisseurs non payés d’inscrire un droit sur l’immeuble (article 2724 C.c.Q.). Délai d’inscription&nbsp;: 30 jours après la fin des travaux."],
    ['t' => 'Bardage métallique', 'd' => "Revêtement extérieur en tôle d’acier ou d’aluminium, souvent utilisé en construction commerciale ou industrielle au Québec pour sa durabilité et sa résistance aux intempéries. Durée de vie 40-50 ans."],
    ['t' => 'HRV/ERV', 'd' => "Heat Recovery Ventilator (HRV) ou Energy Recovery Ventilator (ERV)&nbsp;: ventilateur récupérateur de chaleur ou d’énergie. Obligatoire dans toute maison neuve au QC depuis 2022 (norme CSA F326)."],
    ['t' => 'CCQ catégorie compagnon', 'd' => "Statut professionnel du travailleur qui a complété son apprentissage (1500 à 8000 heures selon le métier) et réussi l’examen de qualification provincial. Permet d’exercer en autonomie sur les chantiers."],
];
$termesRaw = array_map(fn($t) => ['t' => $t['t'], 'd' => str_replace('&nbsp;', ' ', $t['d'])], $termes);
@endphp

@push('meta')
<meta name="description" content="Glossaire de la construction au Québec : CCQ, RBQ, BIM, charpente, coffrage, LEED, Novoclimat, EPI, hypothèque légale, et plus de 20 termes techniques expliqués.">
<link rel="canonical" href="{{ url('/glossaire') }}">
@endpush

@push('schema')
<script type="application/ld+json">@php
$defs = array_map(fn($t) => ['@type' => 'DefinedTerm', 'name' => $t['t'], 'description' => $t['d']], $termesRaw);
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

<header class="ks-page-hero ks-page-hero--photo" style="--ks-hero-photo: url('/intime/images/pages/glossaire-hero.jpg')">
    <div class="ks-page-hero__overlay" aria-hidden="true"></div>
    <div class="ks-container ks-page-hero__inner">
        <ul class="ks-page-hero__breadcrumb">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>Glossaire</li>
        </ul>
        <span class="ks-eyebrow ks-page-hero__eyebrow">Termes techniques</span>
        <h1>Glossaire de la construction</h1>
        <p class="ks-page-hero__subtitle">Trente termes techniques que vous rencontrerez sur un contrat, un devis, un plan ou pendant les rencontres de chantier. Définitions adaptées au contexte québécois.</p>
    </div>
</header>

<section class="ks-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left">
            <span class="ks-eyebrow">Termes techniques</span>
            <h2 class="ks-h2">Le vocabulaire de la construction au Québec</h2>
            <p class="ks-lead">La construction utilise un vocabulaire technique spécifique. Ce glossaire est mis à jour régulièrement avec les termes du Code 2026 et de la jurisprudence québécoise. Pour toute clarification, contactez l’équipe.</p>
        </div>
    </div>
</section>

<section class="ks-section ks-section--alt">
    <div class="ks-container">
        <div class="ks-bento ks-bento--3col">
            @foreach($termes as $term)
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow" style="color:var(--ks-orange-700)">Terme</span>
                <h3 class="ks-card__title">{{ $term['t'] }}</h3>
                <p class="ks-card__text">{!! $term['d'] !!}</p>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Un terme manque&nbsp;?</h2>
        <p>Suggérez un nouveau terme à inclure ou demandez une définition plus détaillée à l’équipe Kalystrat.</p>
        <a href="{{ route('contact') }}" class="ks-cta-primary">Suggérer un terme</a>
    </div>
</section>

@endsection
