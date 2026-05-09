@extends('frontend::layouts.intime')

@section('title', 'FAQ — Questions fréquentes en construction | Kalystrat')

@php
$faqs = [
    ['q' => "Qu'est-ce que Gestion Kalystrat Inc. ?", 'r' => "Gestion Kalystrat Inc. est un holding québécois de construction à intégration verticale, basé à Québec. Le groupe regroupe six filiales spécialisées qui couvrent l'ensemble du cycle de construction, de l'excavation à la finition, incluant le développement immobilier et le placement de main-d'œuvre."],
    ['q' => "Quelles sont les six filiales du groupe Kalystrat ?", 'r' => "Les six filiales sont : Kalystrat Fondations (excavation, coffrage, béton), Kalystrat Structure (charpente bois et acier), Kalystrat Toiture et Enveloppe (toiture, isolation, revêtement), Kalystrat Finition Intérieure (gypse, peinture, ébénisterie), Kalystrat Immobilier (développement résidentiel) et Kalystrat Placement Construction (main-d'œuvre CCQ)."],
    ['q' => "Qu'est-ce qu'une intégration verticale en construction ?", 'r' => "L'intégration verticale signifie que Kalystrat exécute en interne toutes les étapes d'un projet de construction, sans dépendre de sous-traitants externes. Cette approche élimine les marges en cascade, réduit les délais de coordination et garantit une cohérence de qualité du début à la fin du chantier."],
    ['q' => "Dans quelles régions du Québec Kalystrat opère-t-elle ?", 'r' => "Kalystrat dessert principalement la région de Québec et ses environs (Lévis, Sainte-Foy, Beauport, Sillery), avec une expansion graduelle vers Trois-Rivières, le Saguenay, Montréal et Laval pour les projets d'envergure."],
    ['q' => "Kalystrat travaille-t-elle pour le résidentiel et le commercial ?", 'r' => "Oui. Le groupe sert quatre verticaux : résidentiel (maisons unifamiliales, condos, multilogements), commercial (bureaux, centres commerciaux), institutionnel (écoles, hôpitaux) et industriel/municipal (entrepôts, infrastructures publiques)."],
    ['q' => "Comment obtenir une soumission ?", 'r' => "Vous pouvez remplir le formulaire de la page Contact ou nous écrire directement à info@kalystrat.ca. Une équipe vous rappelle sous 24 heures ouvrables pour évaluer la portée du projet et planifier une rencontre."],
    ['q' => "Combien de temps prend une soumission ?", 'r' => "Pour un projet résidentiel standard, comptez 5 à 10 jours ouvrables après la rencontre initiale. Pour un projet commercial ou institutionnel complexe, le délai est de 2 à 4 semaines selon le niveau de détail des plans fournis."],
    ['q' => "Kalystrat fournit-elle de la main-d'œuvre à d'autres entrepreneurs ?", 'r' => "Oui, via Kalystrat Placement Construction, qui place des travailleurs qualifiés et semi-qualifiés (CCQ) chez d'autres entrepreneurs généraux, sous-traitants et promoteurs immobiliers. Le placement peut être temporaire ou permanent."],
    ['q' => "Qui est le fondateur de Kalystrat ?", 'r' => "Ali Salomon est le fondateur, président et directeur général de Gestion Kalystrat Inc. Il a conçu le modèle d'affaires intégré sur lequel repose le groupe et supervise la gouvernance globale appuyé d'un conseil consultatif."],
    ['q' => "Qui siège au conseil consultatif ?", 'r' => "Le conseil consultatif compte deux experts externes : Jacques Jobidon, expert en droit de la construction, et Perry Wong, spécialiste en immobilier québécois. Leur rôle est d'apporter un regard externe sur les décisions stratégiques."],
    ['q' => "Pourquoi le nom \"Kalystrat\" + spécialité ?", 'r' => "Cette convention de marque renforce la reconnaissance du groupe sur tous les chantiers : un client, un partenaire ou un travailleur qui voit \"Kalystrat Toiture\" reconnaît immédiatement l'appartenance à un groupe structuré et fiable, plutôt que six entreprises sans lien apparent."],
    ['q' => "Kalystrat est-elle membre de l'APCHQ ou de la CCQ ?", 'r' => "Oui. Toutes les filiales actives détiennent les licences RBQ requises et sont membres des associations professionnelles pertinentes selon leur domaine : APCHQ pour l'habitation, ACQ pour le commercial, et CCQ pour la main-d'œuvre."],
    ['q' => "Comment Kalystrat assure-t-elle la qualité ?", 'r' => "Trois leviers : exécution interne (pas de sous-traitance hors groupe), équipes formées en continu via Kalystrat Placement Construction, et contrôle qualité centralisé au niveau du holding (un même standard pour les six filiales)."],
    ['q' => "Kalystrat développe-t-elle ses propres projets immobiliers ?", 'r' => "Oui, via Kalystrat Immobilier qui acquiert des terrains, conçoit, construit et revend (ou loue) des projets résidentiels. Cette filiale crée également une demande captive pour les cinq autres divisions du groupe."],
    ['q' => "Comment recruter chez Kalystrat ?", 'r' => "Toutes les opportunités passent par Kalystrat Placement Construction. Consultez la page Carrières pour les postes ouverts ou envoyez votre CV à carrieres@kalystrat.ca avec mention de la filiale qui vous intéresse."],
];
@endphp

@push('meta')
<meta name="description" content="Questions fréquentes sur Gestion Kalystrat Inc. : filiales, intégration verticale, soumissions, zones desservies, gouvernance, RBQ, CCQ. Réponses claires d'un holding québécois de construction.">
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
], $faqs);
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

<section class="page-title" style="background-image:url(/intime/images/background/2.jpg)">
    <div class="auto-container">
        <h1>Questions fréquentes</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>FAQ</li>
        </ul>
    </div>
</section>

<section class="about-section-two">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 content-column">
                <div class="sec-title">
                    <span class="sub-title">Tout savoir sur Kalystrat</span>
                    <h2>Vos questions, nos réponses</h2>
                </div>
                <div class="text">
                    <p>Cette page rassemble les questions les plus posées par nos clients, partenaires et candidats. Si votre question ne s'y trouve pas, écrivez-nous via la <a href="{{ route('contact') }}">page Contact</a>.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="feature-section-four" style="background-color:#f7f7f7;padding:60px 0">
    <div class="auto-container">
        @foreach($faqs as $i => $f)
        <details style="background:#fff;padding:20px 25px;margin-bottom:15px;border-radius:6px;box-shadow:0 2px 6px rgba(0,0,0,0.05)" {{ $i === 0 ? 'open' : '' }}>
            <summary style="font-weight:600;font-size:18px;cursor:pointer;color:#222">{{ $f['q'] }}</summary>
            <div style="margin-top:15px;line-height:1.7;color:#555">{{ $f['r'] }}</div>
        </details>
        @endforeach
    </div>
</section>

<section class="call-to-action" style="background:#f7f7f7;padding:60px 0;text-align:center">
    <div class="auto-container">
        <h2 style="margin-bottom:20px">Une question qui n'apparaît pas ici ?</h2>
        <a href="{{ route('contact') }}" class="theme-btn btn-style-ten"><div class="btn-wrap"><span class="text-one">Nous écrire</span><span class="text-two">Nous écrire</span></div></a>
    </div>
</section>

@endsection
