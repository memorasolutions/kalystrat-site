@extends('frontend::layouts.intime')

@section('title', 'FAQ — Questions fréquentes en construction | Kalystrat')

@php
$faqs = [
    ['q' => "Qu’est-ce que Gestion Kalystrat Inc.&nbsp;?", 'r' => "Gestion Kalystrat Inc. est un groupe québécois de construction à intégration verticale, basé à Québec. Le groupe regroupe six filiales spécialisées qui couvrent l’ensemble du cycle de construction, de l’excavation à la finition, incluant le développement immobilier et le placement de main-d’œuvre."],
    ['q' => "Quelles sont les six filiales du groupe Kalystrat&nbsp;?", 'r' => "Les six filiales sont&nbsp;: Kalystrat Fondations (excavation, coffrage, béton), Kalystrat Structure (charpente bois et acier), Kalystrat Toiture et Enveloppe (toiture, isolation, revêtement), Kalystrat Finition Intérieure (gypse, peinture, ébénisterie), Kalystrat Immobilier (développement résidentiel) et Kalystrat Placement Construction (main-d’œuvre CCQ)."],
    ['q' => "Qu’est-ce qu’une intégration verticale en construction&nbsp;?", 'r' => "L’intégration verticale signifie que Kalystrat exécute en interne toutes les étapes d’un projet de construction, sans dépendre de sous-traitants externes. Cette approche élimine les marges en cascade, réduit les délais de coordination et garantit une cohérence de qualité du début à la fin du chantier."],
    ['q' => "Dans quelles régions du Québec Kalystrat opère-t-elle&nbsp;?", 'r' => "Kalystrat dessert principalement la région de Québec et ses environs (Lévis, Sainte-Foy, Beauport, Sillery), avec une expansion graduelle vers Trois-Rivières, le Saguenay, Montréal et Laval pour les projets d’envergure."],
    ['q' => "Kalystrat travaille-t-elle pour le résidentiel et le commercial&nbsp;?", 'r' => "Oui. Le groupe sert quatre verticaux&nbsp;: résidentiel (maisons unifamiliales, condos, multilogements), commercial (bureaux, centres commerciaux), institutionnel (écoles, hôpitaux) et industriel/municipal (entrepôts, infrastructures publiques)."],
    ['q' => "Comment obtenir une soumission&nbsp;?", 'r' => "Vous pouvez remplir le formulaire de la page Contact ou nous écrire directement à info@kalystrat.ca. Une équipe vous rappelle sous 24 heures ouvrables pour évaluer la portée du projet et planifier une rencontre."],
    ['q' => "Combien de temps prend une soumission&nbsp;?", 'r' => "Pour un projet résidentiel standard, comptez 5 à 10 jours ouvrables après la rencontre initiale. Pour un projet commercial ou institutionnel complexe, le délai est de 2 à 4 semaines selon le niveau de détail des plans fournis."],
    ['q' => "Kalystrat fournit-elle de la main-d’œuvre à d’autres entrepreneurs&nbsp;?", 'r' => "Oui, via Kalystrat Placement Construction, qui place des travailleurs qualifiés et semi-qualifiés (CCQ) chez d’autres entrepreneurs généraux, sous-traitants et promoteurs immobiliers. Le placement peut être temporaire ou permanent."],
    ['q' => "Qui est le fondateur de Kalystrat&nbsp;?", 'r' => "Ali Salomon est le fondateur, président et directeur général de Gestion Kalystrat Inc. Il a conçu le modèle d’affaires intégré sur lequel repose le groupe et supervise la gouvernance globale appuyé d’un conseil consultatif."],
    ['q' => "Qui siège au conseil consultatif&nbsp;?", 'r' => "Le conseil consultatif compte deux experts externes&nbsp;: Jacques Jobidon, expert en droit de la construction, et Perry Wong, spécialiste en immobilier québécois. Leur rôle est d’apporter un regard externe sur les décisions stratégiques."],
    ['q' => "Pourquoi le nom « Kalystrat » + spécialité&nbsp;?", 'r' => "Cette convention de marque renforce la reconnaissance du groupe sur tous les chantiers&nbsp;: un client, un partenaire ou un travailleur qui voit « Kalystrat Toiture » reconnaît immédiatement l’appartenance à un groupe structuré et fiable, plutôt que six entreprises sans lien apparent."],
    ['q' => "Kalystrat est-elle membre de l’APCHQ ou de la CCQ&nbsp;?", 'r' => "Oui. Toutes les filiales actives détiennent les licences RBQ requises et sont membres des associations professionnelles pertinentes selon leur domaine&nbsp;: APCHQ pour l’habitation, ACQ pour le commercial, et CCQ pour la main-d’œuvre."],
    ['q' => "Comment Kalystrat assure-t-elle la qualité&nbsp;?", 'r' => "Trois leviers&nbsp;: exécution interne (pas de sous-traitance hors groupe), équipes formées en continu via Kalystrat Placement Construction, et contrôle qualité centralisé à l'échelle du groupe (un même standard pour les six filiales)."],
    ['q' => "Kalystrat développe-t-elle ses propres projets immobiliers&nbsp;?", 'r' => "Oui, via Kalystrat Immobilier qui acquiert des terrains, conçoit, construit et revend (ou loue) des projets résidentiels. Cette filiale crée également une demande captive pour les cinq autres divisions du groupe."],
    ['q' => "Comment recruter chez Kalystrat&nbsp;?", 'r' => "Toutes les opportunités passent par Kalystrat Placement Construction. Consultez la page Carrières pour les postes ouverts ou envoyez votre CV à carrieres@kalystrat.ca avec mention de la filiale qui vous intéresse."],
    ['q' => "Quelles sont les catégories de licence RBQ requises pour un entrepreneur en construction résidentielle&nbsp;?", 'r' => "La RBQ exige principalement la licence de catégorie 1.1 (entrepreneur général en bâtiments résidentiels) ou 1.2 (entrepreneur en gros œuvre) pour les travaux structuraux. Les travaux spécialisés (électricité, plomberie) requièrent des licences 2.x distinctes. La licence doit correspondre exactement à la nature des travaux entrepris, sous peine d’infraction à la Loi sur le bâtiment."],
    ['q' => "Qu’est-ce qu’une hypothèque légale de construction et comment protège-t-elle les sous-traitants&nbsp;?", 'r' => "L’hypothèque légale, prévue à l’article 2724 du Code civil du Québec, permet aux entrepreneurs, sous-traitants et fournisseurs non payés d’inscrire un droit sur l’immeuble construit ou rénové. Elle doit être publiée au registre foncier dans les 30 jours suivant la fin des travaux pour être opposable, garantissant un recours prioritaire en cas de défaut de paiement."],
    ['q' => "Comment fonctionne la retenue de garantie de 5&nbsp;% dans un contrat de construction&nbsp;?", 'r' => "Prévue à l’article 2118 du Code civil du Québec, cette retenue consiste à conserver 5&nbsp;% du montant des travaux jusqu’à la fin de la période de garantie (généralement un an). La somme est libérée si aucun vice majeur n’est constaté. Elle protège le client contre les défauts de conformité ou de solidité après la réception des travaux."],
    ['q' => "Quelle différence entre un entrepreneur général et un entrepreneur spécialisé&nbsp;?", 'r' => "L’entrepreneur général (RBQ 1.1 ou 1.2) coordonne l’ensemble du projet et peut exécuter ou sous-traiter tous les corps de métier. L’entrepreneur spécialisé (par exemple licence 2.4 plomberie) ne peut réaliser que les travaux correspondant à sa catégorie. Seul l’entrepreneur général peut signer un contrat global avec un propriétaire pour une construction neuve résidentielle."],
    ['q' => "Faut-il prévoir une borne de recharge pour véhicule électrique dans une nouvelle construction&nbsp;?", 'r' => "Oui. Depuis 2023, le Code de construction du Québec (Chapitre III - Électricité, article 8-204) exige l’installation d’une infrastructure prête pour borne de recharge (câblage, disjoncteur, conduit) dans toute nouvelle construction résidentielle de 2 logements ou plus. L’obligation persiste en 2026."],
    ['q' => "Cellulose ou polyuréthane : quel isolant choisir pour ma maison&nbsp;?", 'r' => "La cellulose offre une excellente performance acoustique et une faible empreinte carbone, mais demande plus d’épaisseur pour la même valeur R. Le polyuréthane pulvérisé fournit une étanchéité à l’air supérieure et R-6 à R-7 par pouce, mais coûte plus cher. Les deux doivent respecter les exigences du Code de l’énergie du Québec (R-49 toiture, R-24 murs)."],
    ['q' => "Pourquoi opter pour des fenêtres triple vitrage&nbsp;?", 'r' => "Le triple vitrage améliore l’isolation thermique (facteur U &le; 1,4 W/m²·K), réduit les pertes de chaleur en hiver et limite la condensation. Le Code de l’énergie du Québec rend ce niveau de performance quasi obligatoire dans les zones climatiques 6 et 7 (Québec, Saguenay, Mauricie)."],
    ['q' => "La ventilation HRV/ERV est-elle obligatoire dans les maisons neuves&nbsp;?", 'r' => "Oui. Depuis l’entrée en vigueur du Code de l’énergie du Québec en 2022, toute maison neuve doit être équipée d’un système de ventilation mécanique contrôlée avec récupérateur de chaleur (HRV) ou d’énergie (ERV). Le système doit assurer un renouvellement d’air conforme à la norme CSA F326, exigence renforcée dans les révisions de 2025."],
];

$faqsRaw = array_map(fn($f) => ['q' => str_replace('&nbsp;', ' ', $f['q']), 'r' => str_replace('&nbsp;', ' ', $f['r'])], $faqs);
@endphp

@push('meta')
<meta name="description" content="FAQ Kalystrat construction au Québec : filiales, intégration verticale, RBQ, CCQ, soumissions, garanties. 23 questions réponses claires.">
<link rel="canonical" href="{{ url('/faq') }}">
<meta property="og:title" content="FAQ — Kalystrat construction Québec">
<meta property="og:type" content="website">
@endpush

@push('schema')
<script type="application/ld+json">@php
$mainEntity = array_map(fn($f) => [
    '@type' => 'Question',
    'name' => $f['q'],
    'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['r']],
], $faqsRaw);
echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => $mainEntity,
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
@endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'FAQ', 'item' => 'https://kalystrat.ca/faq'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<header class="ks-page-hero">
    <div class="ks-container">
        <ul class="ks-page-hero__breadcrumb">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>FAQ</li>
        </ul>
        <h1>Questions fréquentes</h1>
        <p class="ks-page-hero__subtitle">Vingt-trois réponses aux questions les plus posées par nos clients, partenaires et candidats. Si la vôtre n’y figure pas, écrivez-nous.</p>
    </div>
</header>

<section class="ks-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left">
            <span class="ks-eyebrow">Tout savoir sur Kalystrat</span>
            <h2 class="ks-h2">Vos questions, nos réponses</h2>
            <p class="ks-lead">Cette page rassemble les questions les plus posées par nos clients, partenaires et candidats. Si votre question ne s’y trouve pas, écrivez-nous via la <a href="{{ route('contact') }}">page Contact</a>.</p>
        </div>
    </div>
</section>

<section class="ks-section ks-section--alt">
    <div class="ks-container">
        <div style="display:flex;flex-direction:column;gap:14px;max-width:920px;margin:0 auto">
            @foreach($faqs as $i => $f)
            <details style="background:var(--ks-white);padding:24px 28px;border-radius:var(--ks-radius-md);box-shadow:var(--ks-shadow-card);border-left:4px solid var(--ks-gold-500)" {{ $i === 0 ? 'open' : '' }}>
                <summary style="font-family:var(--ks-font-display);font-weight:700;font-size:1.125rem;cursor:pointer;color:var(--ks-navy-900);list-style:none;display:flex;justify-content:space-between;align-items:center;gap:1rem">
                    <span>{!! $f['q'] !!}</span>
                    <span style="color:var(--ks-gold-700);font-size:1.5rem;flex-shrink:0">+</span>
                </summary>
                <div style="margin-top:1rem;line-height:var(--ks-line-height);color:var(--ks-gray-700);font-size:var(--ks-body-size)">{!! $f['r'] !!}</div>
            </details>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Une question qui n’apparaît pas ici&nbsp;?</h2>
        <p>L’équipe Kalystrat répond sous 24 heures ouvrables pour les sujets techniques, commerciaux ou administratifs.</p>
        <a href="{{ route('contact') }}" class="ks-cta-primary">Nous écrire</a>
    </div>
</section>

@endsection
