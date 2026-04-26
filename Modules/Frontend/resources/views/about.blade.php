@extends('frontend::layout')

@section('title', 'Qui nous sommes - Kalystrat')
@section('meta_description', 'Découvrez Kalystrat, plateforme de développement stratégique et d\'investissement immobilier à Québec. Vision, équipe et approche.')
@section('breadcrumb_title', 'Qui nous sommes')
@section('breadcrumb')
    <li>Qui nous sommes</li>
@endsection

@section('content')
    {{-- Notre vision --}}
    <section class="space-top space-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 wow fadeInLeft">
                    <div class="img-box1">
                        <img src="{{ asset('assets/img/kalystrat/about-strategy.jpg') }}" alt="Réunion stratégique Kalystrat" loading="lazy" style="width: 100%; object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight">
                    <div class="title-area">
                        <span class="sub-title"><i class="ri-focus-2-line" aria-hidden="true"></i> HOLDING CONSTRUCTION QUÉBÉCOIS</span>
                        <h2 class="sec-title">Notre vision</h2>
                    </div>
                    <p>Gestion Kalystrat Inc. est un holding québécois de construction à intégration verticale, fondé par Ali Salomon. Notre mission : offrir l'excellence en construction grâce à six filiales spécialisées opérant en synergie sous une marque unifiée, afin de réduire les coûts, raccourcir les délais et garantir une qualité supérieure à chaque projet.</p>
                    <p>Notre ambition : devenir un groupe intégré de référence au Québec dans un horizon de huit ans, en tirant parti de la demande record en habitation, de la pénurie de main-d'œuvre et de la croissance soutenue du marché de la rénovation.</p>
                    <div class="row mt-4 g-2">
                        <div class="col-6"><span class="text-theme"><i class="ri-check-double-line" aria-hidden="true"></i></span> Rigueur</div>
                        <div class="col-6"><span class="text-theme"><i class="ri-check-double-line" aria-hidden="true"></i></span> Vision</div>
                        <div class="col-6"><span class="text-theme"><i class="ri-check-double-line" aria-hidden="true"></i></span> Performance</div>
                        <div class="col-6"><span class="text-theme"><i class="ri-check-double-line" aria-hidden="true"></i></span> Intégrité</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Direction et gouvernance --}}
    <section class="space-top space-bottom bg-smoke">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title"><i class="ri-focus-2-line" aria-hidden="true"></i> DIRECTION ET GOUVERNANCE</span>
                <h2 class="sec-title">Une direction structurée</h2>
                <p>Gestion Kalystrat Inc. est dirigée par son fondateur, soutenu par un conseil consultatif composé d'experts reconnus dans la construction, le droit et l'immobilier.</p>
            </div>
            <div class="row gx-30 gy-30 justify-content-center">
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-card text-center p-4" style="background: var(--ks-white); border: 1px solid rgba(10,22,40,0.08);">
                        <h3 class="team-title">Ali Salomon</h3>
                        <span class="team-desig">Fondateur, président et directeur général</span>
                        <p class="mt-3" style="color: var(--ks-navy);">Pilote la stratégie globale du groupe, supervise les six filiales et oriente les acquisitions et le développement immobilier.</p>
                    </div>
                </div>
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="team-card text-center p-4" style="background: var(--ks-white); border: 1px solid rgba(10,22,40,0.08);">
                        <h3 class="team-title">Conseil consultatif</h3>
                        <span class="team-desig">En constitution</span>
                        <p class="mt-3" style="color: var(--ks-navy);">Composé d'experts en construction, droit des affaires (M<sup>e</sup> Jacques Jobidon) et immobilier (Perry Wong). Trois sièges supplémentaires à pourvoir : ingénierie, financement, ressources humaines.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 6 piliers concurrentiels --}}
    <section class="space-top space-bottom">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title"><i class="ri-focus-2-line" aria-hidden="true"></i> SIX PILIERS CONCURRENTIELS</span>
                <h2 class="sec-title">L'avantage de l'intégration verticale</h2>
            </div>
            <div class="row gx-30 gy-30">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="feature-box text-center p-4">
                        <i class="ri-stack-line" aria-hidden="true" style="font-size: 3rem; color: var(--ks-gold);"></i>
                        <h3 class="mt-3 mb-2 h5">Intégration verticale</h3>
                        <p>De l'excavation à la finition finale, chaque étape est exécutée en interne, éliminant les marges des sous-traitants et les délais de coordination.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-box text-center p-4">
                        <i class="ri-team-line" aria-hidden="true" style="font-size: 3rem; color: var(--ks-gold);"></i>
                        <h3 class="mt-3 mb-2 h5">Main-d'œuvre interne</h3>
                        <p>Kalystrat Placement Construction fournit la main-d'œuvre à toutes les filiales, garantissant disponibilité et cohérence de formation.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="feature-box text-center p-4">
                        <i class="ri-arrow-right-up-line" aria-hidden="true" style="font-size: 3rem; color: var(--ks-gold);"></i>
                        <h3 class="mt-3 mb-2 h5">Demande captive</h3>
                        <p>Kalystrat Immobilier développe ses propres projets, générant un flux de travail constant pour les cinq autres filiales.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="feature-box text-center p-4">
                        <i class="ri-links-line" aria-hidden="true" style="font-size: 3rem; color: var(--ks-gold);"></i>
                        <h3 class="mt-3 mb-2 h5">Synergies opérationnelles</h3>
                        <p>La chaîne complète fonctionne en boucle : Immobilier → Fondations → Structure → Toiture → Finition, avec Placement transverse.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="feature-box text-center p-4">
                        <i class="ri-shield-star-line" aria-hidden="true" style="font-size: 3rem; color: var(--ks-gold);"></i>
                        <h3 class="mt-3 mb-2 h5">Cohérence de marque</h3>
                        <p>La convention « Kalystrat + Spécialité » construit la reconnaissance de marque et inspire la confiance auprès de nos partenaires.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="feature-box text-center p-4">
                        <i class="ri-organization-chart" aria-hidden="true" style="font-size: 3rem; color: var(--ks-gold);"></i>
                        <h3 class="mt-3 mb-2 h5">Gestion centralisée</h3>
                        <p>Comptabilité, ressources humaines, juridique, marketing et technologies de l'information centralisés au niveau de la holding.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
