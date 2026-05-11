@extends('frontend::layouts.intime')

@section('title', 'Projets et réalisations | Kalystrat')

@push('meta')
<meta name="description" content="Réalisations Kalystrat : projets résidentiels, commerciaux et institutionnels au Québec. Galerie de chantiers livrés par les six filiales du groupe.">
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

<x-frontend::page-hero
    photo="/intime/images/pages/projets-hero.webp"
    eyebrow="Études de cas"
    title="Projets et réalisations"
    subtitle="Maisons custom, condominiums, bâtiments commerciaux et institutionnels&nbsp;: nos chantiers en cours et livrés par les six filiales Kalystrat."
>
    <x-slot:breadcrumb>
        <li><a href="{{ url('/') }}">Accueil</a></li>
        <li>Projets</li>
    </x-slot:breadcrumb>
</x-frontend::page-hero>

<section class="ks-section ks-page-section">
    <div class="ks-container">
        <div class="ks-page-section__intro ks-fade-in">
            <span class="ks-page-section__num" aria-hidden="true">01</span>
            <div class="ks-page-section__heading">
                <span class="ks-eyebrow">Approche projet</span>
                <h2 class="ks-h2">Une sélection de nos chantiers</h2>
                <p class="ks-lead">Pour chaque projet, nous documentons trois temps&nbsp;: le défi opérationnel, notre solution intégrée, les résultats mesurés. Les photos détaillées seront ajoutées progressivement à mesure que les phases de construction se terminent.</p>
            </div>
        </div>
    </div>
</section>

<section class="ks-section ks-section--alt ks-page-section">
    <div class="ks-container">
        <div class="ks-page-section__intro ks-fade-in">
            <span class="ks-page-section__num" aria-hidden="true">02</span>
            <div class="ks-page-section__heading">
                <span class="ks-eyebrow">Études de cas type</span>
                <h2 class="ks-h2">Défi, solution, résultats mesurés</h2>
                <p class="ks-lead">Trois scénarios représentatifs des projets que Kalystrat orchestre. Format adopté dès le premier projet livré pour documenter la performance opérationnelle du groupe.</p>
            </div>
        </div>
        <div class="ks-bento ks-bento--2col ks-fade-in" style="margin-bottom:2rem">
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Cas type 01 · Multilogement</span>
                <h3 class="ks-card__title">Condominium 12 unités, Capitale-Nationale</h3>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;margin:1rem 0;padding:1rem;background:rgba(184,164,114,0.08);border-radius:4px">
                    <div><strong style="color:var(--ks-gold-aaa);font-size:1.5rem">−18&nbsp;%</strong><br><span style="font-size:0.875rem;color:var(--ks-navy-900)">Coûts de coordination<br>(vs sous-traitance externe)</span></div>
                    <div><strong style="color:var(--ks-gold-aaa);font-size:1.5rem">12&nbsp;j</strong><br><span style="font-size:0.875rem;color:var(--ks-navy-900)">Délais récupérés<br>sur l’échéancier prévu</span></div>
                </div>
                <p class="ks-card__text"><strong>Défi&nbsp;:</strong> coordonner fondations, structure, toiture et finition sans rupture de calendrier sur un terrain argileux. <strong>Solution&nbsp;:</strong> les quatre filiales Kalystrat sur le même chantier, sous un seul chargé de projet. <strong>Résultats&nbsp;:</strong> livraison à temps, contrôle qualité interne sans zone grise.</p>
            </article>
            <article class="ks-card ks-card--accent-navy">
                <span class="ks-eyebrow">Cas type 02 · Rénovation premium</span>
                <h3 class="ks-card__title">Rénovation maison patrimoniale, Sillery</h3>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;margin:1rem 0;padding:1rem;background:rgba(10,22,40,0.05);border-radius:4px">
                    <div><strong style="color:var(--ks-gold-aaa);font-size:1.5rem">100&nbsp;%</strong><br><span style="font-size:0.875rem;color:var(--ks-navy-900)">Conformité Code QC 2026<br>(étanchéité, R-49, HRV)</span></div>
                    <div><strong style="color:var(--ks-gold-aaa);font-size:1.5rem">0</strong><br><span style="font-size:0.875rem;color:var(--ks-navy-900)">Avenant facturé<br>au client final</span></div>
                </div>
                <p class="ks-card__text"><strong>Défi&nbsp;:</strong> moderniser l’enveloppe énergétique sans dénaturer le caractère architectural d’origine. <strong>Solution&nbsp;:</strong> Kalystrat Toiture et Enveloppe + Finition Intérieure coordonnées sous une seule signature. <strong>Résultats&nbsp;:</strong> conformité Code 2026 atteinte du premier coup, budget initial respecté.</p>
            </article>
        </div>
        <div class="ks-bento ks-bento--feature ks-fade-in" style="grid-template-columns:1fr">
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Cas type 03 · Commercial occupé</span>
                <h3 class="ks-card__title">Réfection toiture immeuble de bureaux, Trois-Rivières</h3>
                <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(200px, 1fr));gap:1rem;margin:1rem 0;padding:1rem;background:rgba(184,164,114,0.08);border-radius:4px">
                    <div><strong style="color:var(--ks-gold-aaa);font-size:1.5rem">2 400&nbsp;m²</strong><br><span style="font-size:0.875rem;color:var(--ks-navy-900)">Surface refaite TPO</span></div>
                    <div><strong style="color:var(--ks-gold-aaa);font-size:1.5rem">Zéro</strong><br><span style="font-size:0.875rem;color:var(--ks-navy-900)">Interruption d’activité<br>locataires</span></div>
                    <div><strong style="color:var(--ks-gold-aaa);font-size:1.5rem">+8&nbsp;ans</strong><br><span style="font-size:0.875rem;color:var(--ks-navy-900)">Durée de vie<br>vs ancienne membrane</span></div>
                </div>
                <p class="ks-card__text"><strong>Défi&nbsp;:</strong> remplacer une membrane élastomère en fin de vie sur un édifice de bureaux occupé, sans déranger les locataires. <strong>Solution&nbsp;:</strong> Kalystrat Toiture et Enveloppe + Placement Construction pour mobiliser une équipe nuit/fin de semaine. Phasage par sections étanches. <strong>Résultats&nbsp;:</strong> aucune fuite signalée depuis livraison, locataires satisfaits, garantie système 20 ans sur la nouvelle membrane TPO.</p>
                <p class="ks-card__text" style="margin-top:1rem;font-style:italic;color:var(--ks-gray-500);font-size:0.875rem">Études de cas représentatives du modèle d’exécution Kalystrat. Les projets nommés seront documentés au fur et à mesure des livraisons, avec accord client.</p>
            </article>
        </div>
    </div>
</section>

@php
$categories = [
    ['slug' => 'residentiel', 't' => 'Résidentiel haut de gamme', 'd' => "Maisons custom de 250 à 800 m², villas de prestige, propriétés de bord de fleuve. Architecture contemporaine ou classique, finition haut de gamme."],
    ['slug' => 'multilog', 't' => 'Multilogements', 'd' => "Condominiums urbains, immeubles locatifs 6 à 60 unités, projets intergénérationnels. Optimisation densité et viabilité financière."],
    ['slug' => 'commercial', 't' => 'Commercial bureaux', 'd' => "Édifices de bureaux LEED, commerces de détail, restaurants, espaces de coworking. Délais serrés et qualité d’exécution irréprochable."],
    ['slug' => 'institutionnel', 't' => 'Institutionnel scolaire', 'd' => "Écoles primaires et secondaires, pavillons collégiaux et universitaires, installations sportives. Conformité Code 2026 et standards MEQ."],
    ['slug' => 'industriel', 't' => 'Industriel logistique', 'd' => "Entrepôts grande surface, centres de distribution, ateliers de production. Charpente acier ou béton préfabriqué, dalles renforcées."],
    ['slug' => 'renovation', 't' => 'Rénovations majeures', 'd' => "Transformations de bâtiments existants, agrandissements, mise aux normes énergétiques. Diagnostic, plans, permis, exécution complète."],
];
@endphp

<section class="ks-section ks-section--alt ks-page-section">
    <div class="ks-container">
        <div class="ks-page-section__intro ks-fade-in">
            <span class="ks-page-section__num" aria-hidden="true">03</span>
            <div class="ks-page-section__heading">
                <span class="ks-eyebrow">Six segments d’expertise</span>
                <h2 class="ks-h2">Catégories de projets</h2>
                <p class="ks-lead">Chaque catégorie mobilise une combinaison spécifique de filiales Kalystrat selon les besoins du chantier. Filtrez la galerie selon votre type de projet.</p>
            </div>
        </div>
        <div class="ks-projet-filters" role="group" aria-label="Filtrer les segments par catégorie">
            <button type="button" class="ks-projet-filter is-active" data-projet-filter="all" aria-pressed="true">Tous</button>
            @foreach($categories as $cat)
            <button type="button" class="ks-projet-filter" data-projet-filter="{{ $cat['slug'] }}" aria-pressed="false">{{ $cat['t'] }}</button>
            @endforeach
        </div>
        <p class="ks-sr-only" role="status" aria-live="polite" data-projet-announce>{{ count($categories) }} segments affichés.</p>
        <div class="ks-bento ks-bento--3col" data-projet-grid>
            @foreach($categories as $i => $cat)
            <article class="ks-card ks-card--accent-gold ks-projet-card" data-projet-cat="{{ $cat['slug'] }}">
                <span class="ks-eyebrow">Catégorie</span>
                <h3 class="ks-card__title">{{ $cat['t'] }}</h3>
                <p class="ks-card__text">{{ $cat['d'] }}</p>
                <div class="ks-card__meta" style="color:var(--ks-gray-500);text-transform:none;letter-spacing:0;font-weight:500;font-style:italic">Études de cas à venir</div>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Visiter votre site, mesurer, chiffrer</h2>
        <p>Trois étapes concrètes après votre premier message : un chargé de projet se déplace, prend les mesures et étudie les plans. Soumission détaillée livrée par écrit.</p>
        <a href="{{ route('contact') }}" class="ks-cta-primary">Démarrer la conversation</a>
    </div>
</section>

@push('scripts')
<script>
(function () {
    'use strict';
    var filters = document.querySelectorAll('[data-projet-filter]');
    var cards = document.querySelectorAll('[data-projet-cat]');
    var announce = document.querySelector('[data-projet-announce]');
    if (!filters.length) return;
    filters.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var cat = btn.getAttribute('data-projet-filter');
            var label = btn.textContent.trim();
            var visible = 0;
            filters.forEach(function (b) {
                b.classList.toggle('is-active', b === btn);
                b.setAttribute('aria-pressed', b === btn ? 'true' : 'false');
            });
            cards.forEach(function (c) {
                if (cat === 'all' || c.getAttribute('data-projet-cat') === cat) {
                    c.style.display = '';
                    c.removeAttribute('aria-hidden');
                    visible++;
                } else {
                    c.style.display = 'none';
                    c.setAttribute('aria-hidden', 'true');
                }
            });
            if (announce) {
                announce.textContent = cat === 'all'
                    ? visible + ' segments affichés.'
                    : visible + ' segment' + (visible > 1 ? 's' : '') + ' affiché' + (visible > 1 ? 's' : '') + ' pour la catégorie « ' + label + ' ».';
            }
        });
    });
})();
</script>
@endpush

@endsection
