@extends('frontend::layout-v2')

@section('title', 'À propos — Holding québécois construction | Kalystrat')
@section('meta_description', 'Kalystrat : holding québécois de construction à intégration verticale fondé par Ali Salomon. 6 filiales spécialisées, conseil consultatif, vision 8 ans.')

@section('content')

@include('frontend::partials-v2.page-hero', [
    'heroTitle' => 'Qui nous sommes',
    'heroSubtitle' => 'Holding construction Québec',
    'heroBg' => 'assets/img/kalystrat/about-bg.jpg',
    'heroBreadcrumb' => [
        ['label' => 'Accueil', 'url' => route('frontend.home')],
        ['label' => 'À propos'],
    ],
])

<section class="space">
    <div class="container">
        <div class="row align-items-center gy-4">
            <div class="col-lg-6">
                <img src="{{ asset('assets/img/kalystrat/about-strategy.jpg') }}" alt="Réunion stratégique Kalystrat" class="w-100" loading="lazy">
            </div>
            <div class="col-lg-6">
                <div class="title-area">
                    <h6 class="text-gold">HOLDING CONSTRUCTION QUÉBÉCOIS</h6>
                    <h2>Notre vision</h2>
                </div>
                <p>Gestion Kalystrat Inc. est un holding québécois de construction à intégration verticale, fondé par Ali Salomon. Notre mission : offrir l'excellence en construction grâce à six filiales spécialisées opérant en synergie sous une marque unifiée, afin de réduire les coûts, raccourcir les délais et garantir une qualité supérieure à chaque projet.</p>
                <p>Notre ambition : devenir un groupe intégré de référence au Québec dans un horizon de huit ans, en tirant parti de la demande record en habitation, de la pénurie de main-d'œuvre et de la croissance soutenue du marché de la rénovation.</p>
                <div class="row mt-4 g-2">
                    <div class="col-6"><div class="d-flex align-items-center"><i class="ri-check-double-line" aria-hidden="true" style="color: #B8A472; font-size: 1.25rem; margin-right: 0.5rem;"></i><span>Rigueur</span></div></div>
                    <div class="col-6"><div class="d-flex align-items-center"><i class="ri-check-double-line" aria-hidden="true" style="color: #B8A472; font-size: 1.25rem; margin-right: 0.5rem;"></i><span>Vision</span></div></div>
                    <div class="col-6"><div class="d-flex align-items-center"><i class="ri-check-double-line" aria-hidden="true" style="color: #B8A472; font-size: 1.25rem; margin-right: 0.5rem;"></i><span>Performance</span></div></div>
                    <div class="col-6"><div class="d-flex align-items-center"><i class="ri-check-double-line" aria-hidden="true" style="color: #B8A472; font-size: 1.25rem; margin-right: 0.5rem;"></i><span>Intégrité</span></div></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="space" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="title-area text-center mb-5">
            <h6 class="text-gold">DIRECTION ET GOUVERNANCE</h6>
            <h2>Une direction structurée</h2>
            <p>Gestion Kalystrat Inc. est dirigée par son fondateur, soutenu par un conseil consultatif composé d'experts reconnus dans la construction, le droit et l'immobilier.</p>
        </div>
        <div class="row gy-4 justify-content-center">
            <div class="col-lg-5">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body text-center p-4">
                        <h3>Ali Salomon</h3>
                        <span class="text-muted">Fondateur, président et directeur général</span>
                        <p class="mt-3">Pilote la stratégie globale du groupe, supervise les six filiales et oriente les acquisitions et le développement immobilier.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body text-center p-4">
                        <h3>Conseil consultatif</h3>
                        <span class="text-muted">En constitution</span>
                        <p class="mt-3">Composé d'experts en construction, droit des affaires (M<sup>e</sup> Jacques Jobidon) et immobilier (Perry Wong). Trois sièges supplémentaires à pourvoir : ingénierie, financement, ressources humaines.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="space">
    <div class="container">
        <div class="title-area text-center mb-5">
            <h6 class="text-gold">SIX PILIERS CONCURRENTIELS</h6>
            <h2>L'avantage de l'intégration verticale</h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="feature-box text-center p-4">
                    <i class="ri-stack-line" aria-hidden="true" style="font-size: 3rem; color: #B8A472;"></i>
                    <h3 class="mt-3">Intégration verticale</h3>
                    <p class="mt-2">De l'excavation à la finition finale, chaque étape est exécutée en interne, éliminant les marges des sous-traitants et les délais de coordination.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-box text-center p-4">
                    <i class="ri-team-line" aria-hidden="true" style="font-size: 3rem; color: #B8A472;"></i>
                    <h3 class="mt-3">Main-d'œuvre interne</h3>
                    <p class="mt-2">Kalystrat Placement Construction fournit la main-d'œuvre à toutes les filiales, garantissant disponibilité et cohérence de formation.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-box text-center p-4">
                    <i class="ri-arrow-right-up-line" aria-hidden="true" style="font-size: 3rem; color: #B8A472;"></i>
                    <h3 class="mt-3">Demande captive</h3>
                    <p class="mt-2">Kalystrat Immobilier développe ses propres projets, générant un flux de travail constant pour les cinq autres filiales.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-box text-center p-4">
                    <i class="ri-links-line" aria-hidden="true" style="font-size: 3rem; color: #B8A472;"></i>
                    <h3 class="mt-3">Synergies opérationnelles</h3>
                    <p class="mt-2">La chaîne complète fonctionne en boucle : Immobilier → Fondations → Structure → Toiture → Finition, avec Placement transverse.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-box text-center p-4">
                    <i class="ri-shield-star-line" aria-hidden="true" style="font-size: 3rem; color: #B8A472;"></i>
                    <h3 class="mt-3">Cohérence de marque</h3>
                    <p class="mt-2">La convention « Kalystrat + Spécialité » construit la reconnaissance de marque et inspire la confiance auprès de nos partenaires.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-box text-center p-4">
                    <i class="ri-organization-chart" aria-hidden="true" style="font-size: 3rem; color: #B8A472;"></i>
                    <h3 class="mt-3">Gestion centralisée</h3>
                    <p class="mt-2">Comptabilité, ressources humaines, juridique, marketing et technologies de l'information centralisés au niveau de la holding.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend::partials-v2.section-cta', [
    'ctaTitle' => 'Construisons ensemble votre projet',
    'ctaText' => 'Découvrez nos filiales et démarrez votre construction au Québec.',
    'ctaButtonText' => 'NOUS CONTACTER',
])

@endsection
