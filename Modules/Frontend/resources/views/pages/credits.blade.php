@extends('frontend::layout')

@push('head')
<meta name="dateModified" content="2026-05-02">
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "Crédits photographiques Kalystrat",
    "url": "https://kalystrat.ca/credits",
    "dateModified": "2026-05-02"
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Accueil", "item": "https://kalystrat.ca/" },
        { "@type": "ListItem", "position": 2, "name": "Crédits", "item": "https://kalystrat.ca/credits" }
    ]
}
</script>
@endverbatim
@endpush

@section('content')

@include('frontend::partials.page-banner', [
    'title' => 'Crédits photographiques',
    'breadcrumbs' => [
        ['label' => 'Accueil', 'url' => route('index')],
        ['label' => 'Crédits', 'url' => null],
    ],
])

<div class="space-top space-bottom" style="padding: 5rem 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="title-area mb-4">
                    <span class="sub-title text-theme">Transparence</span>
                    <h2 class="sec-title" style="color: var(--ks-navy); font-size: 2rem; font-weight: 700;">Photographes et sources d'images</h2>
                    <p class="sec-text">En attendant les premières séances photo professionnelles dédiées aux chantiers Kalystrat (prévues à compter du troisième trimestre&nbsp;2026), notre site utilise des images libres de droits commerciaux issues de banques d'images publiques. Nous tenons à reconnaître le travail des photographes dont les œuvres habillent actuellement notre site.</p>
                </div>

                @php
                    $credits = [
                        ['name' => 'Braeson Holland', 'source' => 'Pexels', 'url' => 'https://www.pexels.com/photo/drone-shot-of-a-construction-site-14822653/', 'usage' => 'about-bg.webp – section À propos accueil + page À propos – vue aérienne drone d\'un chantier'],
                        ['name' => 'Thirdman', 'source' => 'Pexels', 'url' => 'https://www.pexels.com/photo/pen-and-ruler-on-top-of-drawing-pad-5582585/', 'usage' => 'about-strategy.webp – section présentation accueil – plans architecturaux et outils de design'],
                        ['name' => 'Mike van Schoonderwalt', 'source' => 'Pexels', 'url' => 'https://www.pexels.com/photo/photo-of-a-construction-site-5511075/', 'usage' => 'team-coordination.webp – section bénéfices accueil – grue de construction sous ciel bleu'],
                        ['name' => 'Phil Evenden', 'source' => 'Pexels', 'url' => 'https://www.pexels.com/photo/modern-geometric-building-facade-in-black-and-white-36245156/', 'usage' => 'Vignette signature fondateur – détail architectural géométrique (asset retiré, conservé pour mémoire historique)'],
                        ['name' => 'SÀI GÒN CÔNG TY CP SẢN XUẤT - THƯƠNG MẠI', 'source' => 'Pexels', 'url' => 'https://www.pexels.com/photo/construction-workers-smoothing-fresh-concrete-outdoors-37121405/', 'usage' => 'filiale-fondations.webp – page filiale Fondations + onglet accueil – équipe nivelle béton frais coulé sur chantier'],
                        ['name' => 'Serhii Barkanov', 'source' => 'Pexels', 'url' => 'https://www.pexels.com/photo/close-up-of-textured-rusty-steel-rebars-35598611/', 'usage' => 'Carte carrière coffreur (cards style5 home) – armature acier texture rebar (fichier distinct de filiale-fondations.webp)'],
                        ['name' => 'D Goug', 'source' => 'Pexels', 'url' => 'https://www.pexels.com/photo/new-home-construction-in-elk-grove-california-37176018/', 'usage' => 'filiale-structure.webp – page filiale Structure + onglet accueil + carte carrière charpentier – charpente bois neuve (Elk Grove, Californie — assimilable Amérique du Nord)'],
                        ['name' => 'Clément Proust', 'source' => 'Pexels', 'url' => 'https://www.pexels.com/photo/roofer-working-on-new-house-roof-installation-31771166/', 'usage' => 'filiale-toiture.webp – page filiale Toiture + onglet accueil – couvreur installant tuiles sur toit résidentiel neuf'],
                        ['name' => 'morgan', 'source' => 'Pexels', 'url' => 'https://www.pexels.com/photo/selective-focus-of-black-and-brown-rocks-237907/', 'usage' => 'Carte carrière couvreur + carte projet réfection – bardeaux d\'asphalte texture (fichier distinct de filiale-toiture.webp)'],
                        ['name' => 'Max Vakhtbovych', 'source' => 'Pexels', 'url' => 'https://www.pexels.com/photo/modern-large-and-spacious-kitchen-and-dining-room-8082304/', 'usage' => 'filiale-finition.webp – page filiale Finition Intérieure + carte projet cuisine — référence visuelle générique haut de gamme'],
                        ['name' => 'apertur 2.8', 'source' => 'Pexels', 'url' => 'https://www.pexels.com/photo/apartment-balconies-of-a-high-rise-building-14590388/', 'usage' => 'filiale-immobilier.webp – page filiale Immobilier + carte projet vedette accueil – bâtiment résidentiel à balcons (Québec City)'],
                        ['name' => 'Tito Zzzz', 'source' => 'Pexels', 'url' => 'https://www.pexels.com/photo/yellow-construction-helmet-on-industrial-site-34965713/', 'usage' => 'filiale-placement.webp – page filiale Placement + carte carrière chargé de projet – casque sécurité chantier'],
                        ['name' => 'Karolina Grabowska', 'source' => 'Pexels', 'url' => 'https://www.pexels.com/photo/paper-in-neutral-colors-fabric-and-other-craft-materials-4968690/', 'usage' => 'carriere-designer.webp – carte carrière designer d\'intérieur – échantillons matériaux et palette couleurs'],
                        ['name' => 'Atlantic Ambience', 'source' => 'Pexels', 'url' => 'https://www.pexels.com/photo/wooden-house-moder-keys-and-contract-on-table-12955837/', 'usage' => 'carriere-courtier.webp – carte carrière courtier immobilier OACIQ – clés et contrat de propriété'],
                        ['name' => 'Pavel Danilyuk', 'source' => 'Pexels', 'url' => 'https://www.pexels.com/photo/helmet-level-and-sketches-7937319/', 'usage' => 'contact-bg.webp – section CTA contact accueil – plans architecturaux, casque et clés sur sol ensoleillé'],
                        ['name' => 'Felix-Antoine Coutu', 'source' => 'Pexels', 'url' => 'https://www.pexels.com/photo/aerial-view-of-quebec-city-skyline-by-st-lawrence-river-29591291/', 'usage' => 'hero-skyline.jpg – bannière toutes pages secondaires – vue aérienne Québec et fleuve Saint-Laurent'],
                        ['name' => 'Tischa Francis', 'source' => 'Pexels', 'url' => 'https://www.pexels.com/photo/urban-building-in-montreal-with-green-facade-28792404/', 'usage' => 'projet-commercial-montreal.webp – carte projet bâtiment commercial à Montréal (vedette accueil)'],
                        ['name' => 'Stock Pexels (slug d\'origine non conservé lors du téléchargement initial)', 'source' => 'Pexels', 'url' => 'https://www.pexels.com', 'usage' => 'hero/slide-1-montreal-chantier.webp – slide hero accueil 1 – chantier urbain. À retracer ou remplacer par production interne lors de la séance photo Q3 2026.'],
                        ['name' => 'Stock Pexels (slug d\'origine non conservé lors du téléchargement initial)', 'source' => 'Pexels', 'url' => 'https://www.pexels.com', 'usage' => 'hero/slide-2-vieux-quebec.webp – slide hero accueil 2 – Vieux-Québec, repère identitaire. À retracer ou remplacer par production interne Q3 2026.'],
                        ['name' => 'Stock Pexels (slug d\'origine non conservé lors du téléchargement initial)', 'source' => 'Pexels', 'url' => 'https://www.pexels.com', 'usage' => 'hero/slide-3-excavator.webp – slide hero accueil 3 – excavation chantier. À retracer ou remplacer par production interne Q3 2026.'],
                        ['name' => 'Stock Pexels (slug d\'origine non conservé lors du téléchargement initial)', 'source' => 'Pexels', 'url' => 'https://www.pexels.com', 'usage' => 'cta-quebec-1280w.webp – section CTA finale accueil – vue drone Québec présumée. À retracer ou remplacer par production interne Q3 2026.'],
                        ['name' => 'Stock Pexels (slug d\'origine non conservé lors du téléchargement initial)', 'source' => 'Pexels', 'url' => 'https://www.pexels.com', 'usage' => 'project-residential.webp – carte projet maison neuve accueil. À retracer ou remplacer par production interne Q3 2026.'],
                        ['name' => 'Thème Construz (template HTML acheté, licence commerciale)', 'source' => 'Construz Theme', 'url' => 'https://themeforest.net', 'usage' => 'Icônes décoratives SVG/PNG du dossier assets/construz-new/img/ (icon, shape, bg) – éléments graphiques inclus dans la licence du template'],
                    ];
                @endphp

                <div class="table-responsive">
                    <table style="width: 100%; border-collapse: collapse; background: #FFFFFF; border: 1px solid #E9E9E6; border-radius: 0.5rem; overflow: hidden;">
                        <thead>
                            <tr style="background: var(--ks-navy); color: #FFFFFF;">
                                <th scope="col" style="text-align: left; padding: 1rem 1.25rem; font-size: 0.875rem; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; color: #FFFFFF;">Photographe</th>
                                <th scope="col" style="text-align: left; padding: 1rem 1.25rem; font-size: 0.875rem; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; color: #FFFFFF;">Source</th>
                                <th scope="col" style="text-align: left; padding: 1rem 1.25rem; font-size: 0.875rem; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; color: #FFFFFF;">Utilisation sur le site</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($credits as $c)
                            <tr style="border-top: 1px solid #E9E9E6;">
                                <td style="padding: 1rem 1.25rem; color: var(--ks-navy); font-weight: 600; font-size: 0.9375rem;">
                                    <a href="{{ $c['url'] }}" target="_blank" rel="noopener noreferrer" style="color: #8C2E00; text-decoration: underline; text-underline-offset: 3px;">{{ $c['name'] }}</a>
                                </td>
                                <td style="padding: 1rem 1.25rem; color: #2C3340; font-size: 0.9375rem;">{{ $c['source'] }}</td>
                                <td style="padding: 1rem 1.25rem; color: #2C3340; font-size: 0.9375rem;">{{ $c['usage'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-5" style="background: #F8F8F6; border-left: 4px solid var(--ks-gold); padding: 1.5rem 1.75rem; border-radius: 0.375rem;">
                    <h3 style="color: var(--ks-navy); font-size: 1.125rem; font-weight: 700; margin-bottom: 0.75rem;">Licences utilisées</h3>
                    <p style="color: #2C3340; margin-bottom: 0.5rem; font-size: 0.9375rem;">Toutes les images proviennent de la banque <a href="https://www.pexels.com/fr-fr/licence-libre-de-droits/" target="_blank" rel="noopener noreferrer" style="color: #8C2E00; text-decoration: underline;">Pexels (licence Pexels)</a>, qui autorise l'usage commercial sans attribution obligatoire. Kalystrat choisit néanmoins d'attribuer chaque photographe par éthique et reconnaissance du travail créatif.</p>
                    <p style="color: #2C3340; margin-bottom: 0; font-size: 0.9375rem;">Pour toute question concernant l'usage d'une image ou pour signaler un crédit manquant&nbsp;: <a href="mailto:info@kalystrat.ca" style="color: #8C2E00; text-decoration: underline; font-weight: 600;">info@kalystrat.ca</a></p>
                </div>

                <div class="mt-4" style="font-size: 0.875rem;">
                    <p style="color: #4A4A4A;">Logos Kalystrat (favicon, en-tête, pied de page) et signature « Conçu. Réalisé. Livré.&nbsp;» sont la propriété exclusive de Gestion Kalystrat&nbsp;Inc.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
