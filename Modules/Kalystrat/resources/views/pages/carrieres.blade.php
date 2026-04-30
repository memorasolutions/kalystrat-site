@extends('frontend::layout.layout')

@php
    $title = 'Carrières';
    $subTitle = 'Carrières';
@endphp

@section('content')
    {{-- P22-S20d Page Carrières Kalystrat. Désactivable via git checkout. --}}
    {{-- P22-S20e JobPosting JSON-LD pour Google Jobs / ChatGPT / Perplexity --}}
    @include('frontend::partials.jobposting-jsonld')
    <div class="container py-5">
        <header role="region" aria-labelledby="carrieres-hero" class="mb-5 text-center">
            <h1 id="carrieres-hero" style="color: #0A1628;">Carrières chez Kalystrat</h1>
            <p class="lead mt-3">Rejoignez 6 filiales spécialisées qui construisent l'avenir du Québec. Filiale Placement Construction recrute en continu : main-d'œuvre CCQ qualifiée, formation continue, salaires compétitifs.</p>
        </header>

        <section role="region" aria-labelledby="avantages-heading" class="mb-5">
            <h2 id="avantages-heading" class="text-center mb-4" style="color: #0A1628;">Pourquoi rejoindre Kalystrat</h2>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body d-flex flex-column align-items-center text-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; background-color: rgba(184, 164, 114, 0.15);">
                                <i class="ri-building-line" aria-hidden="true" style="color: #B8A472; font-size: 24px;"></i>
                            </div>
                            <h3 class="h5 mb-2" style="color: #0A1628;">Diversité</h3>
                            <p class="mb-0">Travaillez sur fondations, charpente, toiture, finition selon vos compétences</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body d-flex flex-column align-items-center text-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; background-color: rgba(184, 164, 114, 0.15);">
                                <i class="ri-graduation-cap-line" aria-hidden="true" style="color: #B8A472; font-size: 24px;"></i>
                            </div>
                            <h3 class="h5 mb-2" style="color: #0A1628;">Formation CCQ</h3>
                            <p class="mb-0">Apprentissage encadré, perfectionnement continu, certifications</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body d-flex flex-column align-items-center text-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; background-color: rgba(184, 164, 114, 0.15);">
                                <i class="ri-shield-check-line" aria-hidden="true" style="color: #B8A472; font-size: 24px;"></i>
                            </div>
                            <h3 class="h5 mb-2" style="color: #0A1628;">Stabilité</h3>
                            <p class="mb-0">Holding diversifié, projets garantis par Kalystrat Immobilier (demande captive)</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body d-flex flex-column align-items-center text-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; background-color: rgba(184, 164, 114, 0.15);">
                                <i class="ri-money-dollar-circle-line" aria-hidden="true" style="color: #B8A472; font-size: 24px;"></i>
                            </div>
                            <h3 class="h5 mb-2" style="color: #0A1628;">Salaire compétitif</h3>
                            <p class="mb-0">Taux CCQ + primes performance + heures supplémentaires</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body d-flex flex-column align-items-center text-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; background-color: rgba(184, 164, 114, 0.15);">
                                <i class="ri-tools-line" aria-hidden="true" style="color: #B8A472; font-size: 24px;"></i>
                            </div>
                            <h3 class="h5 mb-2" style="color: #0A1628;">Équipement fourni</h3>
                            <p class="mb-0">Outillage professionnel, EPI complet, véhicules de chantier</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body d-flex flex-column align-items-center text-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; background-color: rgba(184, 164, 114, 0.15);">
                                <i class="ri-line-chart-line" aria-hidden="true" style="color: #B8A472; font-size: 24px;"></i>
                            </div>
                            <h3 class="h5 mb-2" style="color: #0A1628;">Avancement</h3>
                            <p class="mb-0">Chef d'équipe, contremaître, gestionnaire : parcours interne valorisé</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section role="region" aria-labelledby="metiers-heading" class="mb-5">
            <h2 id="metiers-heading" class="text-center mb-4" style="color: #0A1628;">Métiers recherchés</h2>
            <p class="text-center mb-4">Filiale Placement Construction recrute pour les chantiers Kalystrat et nos partenaires.</p>
            <div class="row g-3 justify-content-center">
                @foreach(['Charpentier-menuisier','Couvreur','Coffreur-bétonneur','Finisseur de béton','Plâtrier-peintre','Ébéniste','Chef d\'équipe','Apprenti (programme PAMT)'] as $metier)
                    <div class="col-md-6 col-lg-3">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <span class="badge bg-light text-dark w-100 py-3" style="font-size: 1rem;">{{ $metier }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section role="region" aria-labelledby="form-heading" class="mb-5">
            <h2 id="form-heading" class="text-center mb-4" style="color: #0A1628;">Postuler maintenant</h2>
            <form action="mail.php" method="POST" class="contact-form ajax-contact" novalidate>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nom" class="form-label visually-hidden">Nom complet</label>
                        <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom complet" required autocomplete="name" aria-label="Nom complet">
                    </div>
                    <div class="col-md-6">
                        <label for="courriel" class="form-label visually-hidden">Courriel</label>
                        <input type="email" id="courriel" name="courriel" class="form-control" placeholder="Courriel" required autocomplete="email" aria-label="Courriel">
                    </div>
                    <div class="col-md-6">
                        <label for="telephone" class="form-label visually-hidden">Téléphone</label>
                        <input type="tel" id="telephone" name="telephone" class="form-control" placeholder="Téléphone" required autocomplete="tel" aria-label="Téléphone">
                    </div>
                    <div class="col-md-6">
                        <label for="metier" class="form-label visually-hidden">Métier</label>
                        <select id="metier" name="metier" class="form-select" required aria-label="Métier">
                            <option value="" disabled selected hidden>Métier souhaité</option>
                            <option value="Charpentier-menuisier">Charpentier-menuisier</option>
                            <option value="Couvreur">Couvreur</option>
                            <option value="Coffreur-bétonneur">Coffreur-bétonneur</option>
                            <option value="Finisseur de béton">Finisseur de béton</option>
                            <option value="Plâtrier-peintre">Plâtrier-peintre</option>
                            <option value="Ébéniste">Ébéniste</option>
                            <option value="Chef d'équipe">Chef d'équipe</option>
                            <option value="Apprenti (programme PAMT)">Apprenti (programme PAMT)</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="experience" class="form-label visually-hidden">Expérience</label>
                        <select id="experience" name="experience" class="form-select" required aria-label="Expérience">
                            <option value="" disabled selected hidden>Niveau d'expérience</option>
                            <option value="Apprenti / sans expérience">Apprenti / sans expérience</option>
                            <option value="1-3 ans">1-3 ans</option>
                            <option value="4-10 ans">4-10 ans</option>
                            <option value="10+ ans">10+ ans</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="disponibilite" class="form-label visually-hidden">Disponibilité</label>
                        <select id="disponibilite" name="disponibilite" class="form-select" required aria-label="Disponibilité">
                            <option value="" disabled selected hidden>Disponibilité</option>
                            <option value="Immédiate">Immédiate</option>
                            <option value="Sous 2 semaines">Sous 2 semaines</option>
                            <option value="Sous 1 mois">Sous 1 mois</option>
                            <option value="Plus tard">Plus tard</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="message" class="form-label visually-hidden">Message</label>
                        <textarea id="message" name="message" class="form-control" rows="4" placeholder="Votre message..." required aria-label="Message"></textarea>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-lg px-5 py-3" style="background-color: #B8A472; border-color: #B8A472; color: #0A1628;">Envoyer ma candidature <i class="ri-arrow-right-up-line" aria-hidden="true"></i></button>
                    </div>
                </div>
                <p class="form-messages mb-0 mt-3"></p>
            </form>
        </section>

        <section role="region" aria-labelledby="cta-placement" class="text-center py-5">
            <h2 id="cta-placement" class="h3 fw-bold mb-3" style="color: #0A1628;">Vous êtes entrepreneur général ?</h2>
            <p class="lead text-muted mb-4">Filiale Placement Construction fournit aussi de la main-d'œuvre qualifiée à des entrepreneurs généraux et promoteurs partenaires.</p>
            <a href="{{ route('kalystrat.filiale', ['slug' => 'placement']) }}" class="btn btn-lg px-5 py-3" style="background-color: #B8A472; border-color: #B8A472; color: #0A1628;" aria-label="En savoir plus sur la filiale Kalystrat Placement Construction">En savoir plus sur Placement Construction <i class="ri-arrow-right-up-line" aria-hidden="true"></i></a>
        </section>
    </div>
@endsection
