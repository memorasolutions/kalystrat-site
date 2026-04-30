{{-- P22-S7 [C] Trust badges RBQ/CCQ + témoignages. Désactivable en commentant @include('kalystrat::partials.trust-badges') --}}
<section class="py-5" role="region" aria-labelledby="trust-badges-heading">
    <div class="container-fluid">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 id="trust-badges-heading" class="text-primary fw-bold">Certifications et accréditations</h2>
                <p class="text-muted mt-2">Conformité réglementaire et professionnalisme garantis</p>
            </div>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-3 col-sm-6">
                <div class="h-100 border border-2 rounded-3 p-3 p-md-4 d-flex flex-column justify-content-center align-items-center text-center ks-trust-badge" style="border-color: #0A1628 !important;">
                    <h3 class="mb-2" style="color: #0A1628;">RBQ</h3>
                    <p class="text-muted mb-1 fw-medium">RBQ #XXXX-XXXX-XX</p>
                    <p class="text-muted small mb-0">Régie du bâtiment du Québec</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="h-100 border border-2 rounded-3 p-3 p-md-4 d-flex flex-column justify-content-center align-items-center text-center ks-trust-badge" style="border-color: #0A1628 !important;">
                    <h3 class="mb-2" style="color: #0A1628;">CCQ</h3>
                    <p class="text-muted mb-1 fw-medium">CCQ #XXX-XXXX</p>
                    <p class="text-muted small mb-0">Commission de la construction du Québec</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="h-100 border border-2 rounded-3 p-3 p-md-4 d-flex flex-column justify-content-center align-items-center text-center ks-trust-badge" style="border-color: #0A1628 !important;">
                    <h3 class="mb-2" style="color: #0A1628;">ACQ</h3>
                    <p class="text-muted mb-1 fw-medium">Membre</p>
                    <p class="text-muted small mb-0">Association de la construction du Québec</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="h-100 border border-2 rounded-3 p-3 p-md-4 d-flex flex-column justify-content-center align-items-center text-center ks-trust-badge" style="border-color: #0A1628 !important;">
                    <h3 class="mb-2" style="color: #0A1628;">ACRGTQ</h3>
                    <p class="text-muted mb-1 fw-medium">Partenaire</p>
                    <p class="text-muted small mb-0">Association des constructeurs de routes et grands travaux du Québec</p>
                </div>
            </div>
        </div>
        {{-- TODO: remplacer par vrais numéros licence Kalystrat (RBQ + CCQ) --}}
    </div>
</section>

<section class="py-5 bg-white" role="region" aria-labelledby="testimonials-heading">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 id="testimonials-heading" class="text-primary fw-bold">Ce que disent nos clients</h2>
                <p class="text-muted mt-2">Six filiales, un seul engagement : livrer ce qu'on promet</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="bg-light p-4 p-md-5 rounded-4 shadow-sm h-100">
                    <p class="fst-italic mb-4">« Kalystrat a livré notre projet commercial dans les délais, avec une rigueur technique exemplaire. Leur équipe maîtrise parfaitement les normes québécoises. »</p>
                    <p class="mb-0"><strong>Jean Tremblay</strong><br><small class="text-muted">Entrepreneur général</small></p>
                </div>
                {{-- TODO: remplacer par vrai témoignage --}}
            </div>
            <div class="col-md-4">
                <div class="bg-light p-4 p-md-5 rounded-4 shadow-sm h-100">
                    <p class="fst-italic mb-4">« Grâce à leur expertise en gestion de projets complexes, nous avons pu livrer un développement résidentiel haut de gamme sans imprévus majeurs. »</p>
                    <p class="mb-0"><strong>Marie Bouchard</strong><br><small class="text-muted">Promoteur résidentiel</small></p>
                </div>
                {{-- TODO: remplacer par vrai témoignage --}}
            </div>
            <div class="col-md-4">
                <div class="bg-light p-4 p-md-5 rounded-4 shadow-sm h-100">
                    <p class="fst-italic mb-4">« Leur approche collaborative et leur respect des échéanciers ont fait toute la différence dans la réalisation de nos infrastructures municipales. »</p>
                    <p class="mb-0"><strong>Philippe Lavoie</strong><br><small class="text-muted">Municipalité du Québec</small></p>
                </div>
                {{-- TODO: remplacer par vrai témoignage --}}
            </div>
        </div>
    </div>
</section>
