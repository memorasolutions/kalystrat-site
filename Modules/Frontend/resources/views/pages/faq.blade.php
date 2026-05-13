@extends('frontend::layouts.intime')

@section('title', 'FAQ — Questions fréquentes en construction | Kalystrat')

@php
$faqs = [
    ['q' => "Qu’est-ce que Gestion Kalystrat Inc.&nbsp;?", 'r' => "Gestion Kalystrat Inc. est un groupe québécois de construction à intégration verticale, basé à Québec. Le groupe regroupe six filiales spécialisées qui couvrent l’ensemble du cycle de construction, de l’excavation à la finition, incluant le développement immobilier et le placement de main-d’œuvre."],
    ['q' => "Quelles sont les six filiales du groupe Kalystrat&nbsp;?", 'r' => "Les six filiales sont&nbsp;: Kalystrat Fondations (excavation, coffrage, béton), Kalystrat Structure (charpente bois et acier), Kalystrat Toiture et Enveloppe (toiture, isolation, revêtement), Kalystrat Finition Intérieure (gypse, peinture, ébénisterie), Kalystrat Immobilier (développement résidentiel) et Kalystrat Placement Construction (main-d’œuvre CCQ)."],
    ['q' => "Qu’est-ce qu’une intégration verticale en construction&nbsp;?", 'r' => "L’intégration verticale signifie que Kalystrat exécute en interne toutes les étapes d’un projet de construction, sans dépendre de sous-traitants externes. Cette approche élimine les marges en cascade, réduit les délais de coordination et garantit une cohérence de qualité du début à la fin du chantier."],
    ['q' => "Dans quelles régions du Québec Kalystrat opère-t-elle&nbsp;?", 'r' => "Kalystrat dessert principalement la région de Québec et ses environs (Lévis, Sainte-Foy, Beauport, Sillery), avec une expansion graduelle vers Trois-Rivières, le Saguenay, Montréal et Laval pour les projets d’envergure."],
    ['q' => "Kalystrat travaille-t-elle pour le résidentiel et le commercial&nbsp;?", 'r' => "Oui. Le groupe sert quatre verticaux&nbsp;: résidentiel (maisons unifamiliales, condos, multilogements), commercial (bureaux, centres commerciaux), institutionnel (écoles, hôpitaux) et industriel/municipal (entrepôts, infrastructures publiques)."],
    ['q' => "Comment obtenir une soumission&nbsp;?", 'r' => "Vous pouvez remplir le formulaire de la page Contact ou nous écrire directement à info@kalystrat.ca. Une équipe vous rappelle sous 72 heures ouvrables pour évaluer la portée du projet et planifier une rencontre."],
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

// T193-D — Glossaire fusionné depuis /glossaire (supprimée, 301 → /faq#glossaire)
$termes = [
    ['t' => 'RBQ', 'd' => "Régie du bâtiment du Québec. Organisme provincial qui régule la construction au Québec : licences entrepreneurs, qualifications, conformité au Code."],
    ['t' => 'CCQ', 'd' => "Commission de la construction du Québec. Organisme qui gère la formation, la certification et les relations de travail dans l'industrie."],
    ['t' => 'Code de construction du Québec', 'd' => "Règlement provincial qui établit les exigences minimales de conception, construction et rénovation des bâtiments. Chapitre Bâtiment, Plomberie, Énergie, etc."],
    ['t' => 'Cautionnement', 'd' => "Garantie financière fournie par l'entrepreneur (souvent via une compagnie de cautionnement) pour assurer l'exécution des travaux et le paiement des sous-traitants et fournisseurs."],
    ['t' => 'Hypothèque légale', 'd' => "Garantie automatique qu'un fournisseur ou sous-traitant impayé peut faire publier sur l'immeuble pour sécuriser sa créance. Délais de péremption : 30 jours après fin des travaux."],
    ['t' => 'BIM', 'd' => "Building Information Modeling. Modélisation 3D paramétrée d'un bâtiment intégrant géométrie, matériaux, systèmes mécaniques et planning. Permet la coordination des disciplines avant chantier."],
    ['t' => 'Pare-air et pare-vapeur', 'd' => "Membranes de l'enveloppe du bâtiment. Le pare-air contrôle l'infiltration d'air, le pare-vapeur contrôle le passage de l'humidité. Critiques pour l'efficacité énergétique."],
    ['t' => 'Coffrage', 'd' => "Structure temporaire (bois, acier, aluminium) qui maintient le béton frais en position le temps qu'il durcisse. Spécialité de Kalystrat Fondations."],
    ['t' => 'Drain français', 'd' => "Système de drainage périphérique installé au pied des fondations pour évacuer l'eau du sol et éviter l'humidité dans le sous-sol. Obligatoire au Québec pour les bâtiments avec sous-sol."],
    ['t' => 'Charpente', 'd' => "Structure portante d'un bâtiment (poutres, colonnes, fermes, solives). Peut être en bois (résidentiel, commercial léger), en acier (commercial, industriel) ou hybride."],
    ['t' => 'Membrane élastomère', 'd' => "Type de toiture moderne, souple, soudée à chaud. Excellente longévité (25-30 ans) et adaptée aux toits plats commerciaux et institutionnels."],
    ['t' => 'EPDM / TPO', 'd' => "Matériaux de toiture synthétiques pour toits plats. EPDM (caoutchouc) noir et durable ; TPO (thermoplastique) blanc et réfléchissant pour réduire le coût de climatisation."],
    ['t' => 'LEED', 'd' => "Leadership in Energy and Environmental Design. Certification internationale de bâtiments écologiques. 4 niveaux : Certifié, Argent, Or, Platine."],
    ['t' => 'Novoclimat', 'd' => "Programme québécois de certification de maisons à haute performance énergétique. Exigences supérieures au Code et incitatifs financiers pour les acheteurs."],
    ['t' => 'Plan de garantie GCR', 'd' => "Garantie de Construction Résidentielle. Plan obligatoire pour neuf résidentiel au Québec, couvre vices et défauts pendant 5 ans."],
    ['t' => 'Lotissement', 'd' => "Division d'un terrain en plusieurs lots constructibles. Nécessite approbation municipale, plan d'arpentage et installation des services (eau, égout, électricité, voirie)."],
    ['t' => 'EPI', 'd' => "Équipement de protection individuelle. Casque, lunettes, gants, harnais, chaussures de sécurité — exigés sur tout chantier de construction."],
    ['t' => 'Compagnon CCQ', 'd' => "Travailleur certifié dans un métier de la construction (charpentier, briqueteur, etc.) après avoir complété 1500 à 8000 heures d'apprentissage et l'examen provincial."],
    ['t' => 'Tirage de joints', 'd' => "Technique de finition consistant à combler et lisser les joints entre panneaux de gypse à l'aide de pâte et de ruban. La norme niveau 5 exige une surface parfaitement lisse, même sous éclairage rasant."],
    ['t' => 'Solive', 'd' => "Pièce horizontale en bois ou en acier soutenant le plancher ou le plafond, posée perpendiculairement aux poutres porteuses. Espacement standard 16 pouces centre à centre en résidentiel."],
    ['t' => 'Solage', 'd' => "Fondation périphérique en béton armé située sous le niveau du sol, supportant les murs porteurs d'un bâtiment et transférant les charges au sol stable. Profondeur minimale 1,5 m au QC pour passer sous la ligne de gel."],
    ['t' => 'Vice caché vs apparent', 'd' => "Un vice caché est un défaut non visible lors de la réception des travaux, rendant l'ouvrage impropre à son usage (article 1726 C.c.Q.). Un vice apparent est observable par un propriétaire diligent et doit être signalé immédiatement."],
    ['t' => 'Bardage métallique', 'd' => "Revêtement extérieur en tôle d'acier ou d'aluminium, souvent utilisé en construction commerciale ou industrielle au Québec pour sa durabilité et sa résistance aux intempéries. Durée de vie 40-50 ans."],
    ['t' => 'HRV / ERV', 'd' => "Heat Recovery Ventilator (HRV) ou Energy Recovery Ventilator (ERV) : ventilateur récupérateur de chaleur ou d'énergie. Obligatoire dans toute maison neuve au QC depuis 2022 (norme CSA F326)."],
];
$termesRaw = array_map(fn($t) => ['t' => $t['t'], 'd' => str_replace('&nbsp;', ' ', $t['d'])], $termes);
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
    'name' => 'Questions fréquentes — Kalystrat',
    'inLanguage' => 'fr-CA',
    'speakable' => [
        '@type' => 'SpeakableSpecification',
        'cssSelector' => ['.ks-faq-question', '.ks-faq-answer'],
    ],
    'mainEntity' => $mainEntity,
    'publisher' => [
        '@type' => 'Organization',
        'name' => 'Gestion Kalystrat Inc.',
        'url' => 'https://kalystrat.ca',
    ],
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
{{-- T193-D — Schema.org DefinedTermSet pour le glossaire fusionné (#glossaire ancre) --}}
<script type="application/ld+json">@php
$defs = array_map(fn($t) => ['@type' => 'DefinedTerm', 'name' => $t['t'], 'description' => $t['d']], $termesRaw);
echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'DefinedTermSet',
    'name' => 'Glossaire de la construction au Québec',
    'url' => url('/faq#glossaire'),
    'hasDefinedTerm' => $defs,
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
@endphp</script>
@endpush

@section('content')

<x-frontend::page-hero
    photo="/intime/images/pages/faq-hero.webp"
    eyebrow="Tout savoir sur Kalystrat"
    title="Questions fréquentes"
    subtitle="Vingt-trois réponses aux questions les plus posées par nos clients, partenaires et candidats. Si la vôtre n’y figure pas, écrivez-nous."
>
    <x-slot:breadcrumb>
        <li><a href="{{ url('/') }}">Accueil</a></li>
        <li>FAQ</li>
    </x-slot:breadcrumb>
</x-frontend::page-hero>

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
            <details class="ks-faq-item" style="background:var(--ks-white);padding:24px 28px;border-radius:var(--ks-radius-md);box-shadow:var(--ks-shadow-card);border-left:4px solid var(--ks-gold-500)" {{ $i === 0 ? 'open' : '' }}>
                <summary class="ks-faq-question" style="font-family:var(--ks-font-display);font-weight:700;font-size:1.125rem;cursor:pointer;color:var(--ks-navy-900);list-style:none;display:flex;justify-content:space-between;align-items:center;gap:1rem">
                    <span>{!! $f['q'] !!}</span>
                    <span style="color:var(--ks-gold-700);font-size:1.5rem;flex-shrink:0" aria-hidden="true">+</span>
                </summary>
                <div class="ks-faq-answer" style="margin-top:1rem;line-height:var(--ks-line-height);color:var(--ks-gray-700);font-size:var(--ks-body-size)">{!! $f['r'] !!}</div>
            </details>
            @endforeach
        </div>
    </div>
</section>

{{-- T193-D — Glossaire fusionné depuis /glossaire (301 → /faq#glossaire) --}}
<section id="glossaire" class="ks-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left">
            <span class="ks-eyebrow">Vocabulaire technique</span>
            <h2 class="ks-h2">Glossaire de la construction au Québec</h2>
            <p class="ks-lead">Vingt-quatre termes techniques que vous rencontrerez sur un contrat, un devis, un plan ou pendant les rencontres de chantier. Définitions adaptées au contexte québécois et mises à jour avec le Code 2026.</p>
        </div>
    </div>
</section>

<section class="ks-section ks-section--alt">
    <div class="ks-container">
        <div class="ks-bento ks-bento--3col">
            @foreach($termes as $term)
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow" style="color:var(--ks-gold-aaa)">Terme</span>
                <h3 class="ks-card__title">{{ $term['t'] }}</h3>
                <p class="ks-card__text">{!! $term['d'] !!}</p>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Une question ou un terme qui n'apparaît pas ici&nbsp;?</h2>
        <p>L'équipe Kalystrat répond sous 72 heures ouvrables pour les sujets techniques, commerciaux ou administratifs.</p>
        <a href="{{ route('contact') }}" class="ks-cta-primary">Nous écrire</a>
    </div>
</section>

@endsection
