<footer class="footer-wrapper footer-layout4">
    <div class="container">
        <div class="footer-top-1">
            <div class="footer-logo">
                <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/img/kalystrat/logo-white.svg') }}" alt="Kalystrat — Holding québécois en construction"></a>
            </div>
            <div class="subscribe-box">
                <p class="subscribe-box_text">Recevez nos nouvelles et chantiers récents.</p>
                <form class="newsletter-form" action="#" method="POST" aria-label="Inscription infolettre">
                    @csrf
                    <input class="form-control" type="email" name="email" placeholder="Votre adresse courriel" aria-label="Adresse courriel infolettre" autocomplete="email" required>
                    <button type="submit" class="btn style2" aria-label="S'abonner à l'infolettre">S'INSCRIRE<i class="ri-arrow-right-up-line" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>

        <div class="widget-area">
            <div class="row justify-content-between">
                <div class="col-md-6 col-xl-3">
                    <div class="widget widget-about footer-widget">
                        <h3 class="widget_title">À propos</h3>
                        <p class="about-text">Gestion Kalystrat Inc. est un holding québécois regroupant six filiales spécialisées en construction, immobilier et placement de personnel.</p>
                        <h4 class="about-year">Depuis 2026</h4>
                        <h5 class="about-subtitle">NOUS SOMMES DISPONIBLES</h5>
                        <p class="about-text"><span class="text-theme">Lun-Ven :</span> 8 h à 17 h</p>
                    </div>
                </div>

                <div class="col-md-6 col-xl-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Liens utiles</h3>
                        <div class="menu-all-pages-container grid-style">
                            <ul class="menu">
                                <li><a href="{{ route('frontend.home') }}">Accueil</a></li>
                                <li><a href="{{ route('frontend.about') }}">À propos</a></li>
                                <li><a href="{{ route('frontend.services') }}">Nos filiales</a></li>
                                <li><a href="{{ route('frontend.portfolio') }}">Projets</a></li>
                                <li><a href="{{ route('frontend.contact') }}">Nous joindre</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-auto">
                    <div class="widget footer-widget widget-contact">
                        <h3 class="widget_title">Adresse</h3>
                        <p class="contact-text">Québec, QC, Canada</p>
                        <h3 class="widget_title">Courriel</h3>
                        <p class="text-white footer-text">Une question ?</p>
                        <p class="footer-text"><a href="mailto:info@kalystrat.ca">info@kalystrat.ca</a></p>
                    </div>
                </div>

                <div class="col-md-6 col-xl-auto">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">Téléphone</h3>
                        <p class="footer-text">
                            <a href="tel:+15815786145">1-581-578-6145</a>
                        </p>
                        <h3 class="widget_title">Suivez-nous</h3>
                        <div class="social-btn style2">
                            <a href="https://facebook.com/kalystrat" target="_blank" rel="noopener noreferrer" aria-label="Facebook Kalystrat"><i class="ri-facebook-fill" aria-hidden="true"></i></a>
                            <a href="https://linkedin.com/company/kalystrat" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn Kalystrat"><i class="ri-linkedin-fill" aria-hidden="true"></i></a>
                            <a href="https://instagram.com/kalystrat" target="_blank" rel="noopener noreferrer" aria-label="Instagram Kalystrat"><i class="ri-instagram-line" aria-hidden="true"></i></a>
                        </div>
                        <h4 class="widget_title mt-4">Certifications</h4>
                        <p class="footer-text"><i class="ri-shield-check-line me-1" aria-hidden="true"></i> Licence RBQ : à venir</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright-wrap">
            <div class="row gy-3 justify-content-md-between justify-content-center">
                <div class="col-auto align-self-center"><p class="copyright-text text-center">&copy; {{ date('Y') }} Gestion Kalystrat Inc. | Tous droits réservés</p></div>
                <div class="col-auto">
                    <div class="footer-links">
                        <a href="{{ route('frontend.contact') }}">Politique de confidentialité</a>
                        <a href="{{ route('frontend.contact') }}">Conditions d'utilisation</a>
                        <a href="{{ route('frontend.contact') }}">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
