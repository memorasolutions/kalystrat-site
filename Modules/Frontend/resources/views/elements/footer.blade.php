    <footer class="footer-wrapper footer-layout1" data-bg-src="{{ asset('themes/construz/assets/img/bg/footer-bg1-1.png') }}">    
        <div class="container">
            <div class="footer-top-1">
                <div class="footer-logo">
                    <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/logo-white.svg') }}" alt="Kalystrat"></a>
                </div>
                <div class="subscribe-box">
                    <p class="subscribe-box_text">Recevez nos chantiers en cours et conseils construction du mois.</p>
                    <form class="newsletter-form">
                        <input class="form-control" type="email" placeholder="Votre courriel..." required="">
                        <button type="submit" class="btn style2">S'INSCRIRE<i class="ri-arrow-right-up-line"></i></button>
                    </form>
                </div>
            </div>
            <div class="widget-area">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-3">
                        <div class="widget widget-about footer-widget">
                            <h3 class="widget_title">À propos de Kalystrat</h3>
                            <p class="about-text">Holding québécois de construction à intégration verticale. Six filiales spécialisées qui livrent du concept aux clés en main, dans toute la province.</p>
                            <h4 class="about-year">Fondé en 2026</h4>
                            <h5 class="about-subtitle">DISPONIBLES</h5>
                            <p class="about-text"><span class="text-theme">Lun-Ven:</span> 8h00 à 17h00</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Liens utiles</h3>
                            <div class="menu-all-pages-container grid-style">
                                <ul class="menu">
                                    <li><a href="{{ route('about') }}">À propos</a></li>
                                    <li><a href="{{ route('service') }}">Nos services</a></li>
                                    <li><a href="{{ route('service') }}">Blogue</a></li>
                                    <li><a href="{{ route('service') }}">Réalisations</a></li>
                                    <li><a href="{{ route('service') }}">FAQ</a></li>
                                </ul>
                                <ul class="menu">
                                    <li><a href="{{ route('team') }}">Filiales</a></li>
                                    <li><a href="{{ route('service') }}">Carrières</a></li>
                                    <li><a href="{{ route('service') }}">Témoignages</a></li>
                                    <li><a href="{{ route('contact') }}">Politique de confidentialité</a></li>
                                    <li><a href="{{ route('contact') }}">Conditions d'utilisation</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget widget-contact">
                            <h3 class="widget_title">Siège social</h3>
                            <p class="contact-text">Québec, QC, Canada</p>
                            <h3 class="widget_title">Courriel</h3> 
                            <p class="text-white footer-text">Écrivez-nous</p>   
                            <p class="footer-text"><a href="mailto:info@kalystrat.ca">info@kalystrat.ca</a></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">Téléphone</h3>
                            <p class="footer-text">
                                <a href="tel:+15815786145">1-581-578-6145</a>
                            </p>
                            <p class="footer-text">
                                <a href="tel:+14184760987">1-418-476-0987</a>
                            </p>
                            <h3 class="widget_title">Suivez-nous</h3>
                            <div class="social-btn style2">
                                <a href="https://www.twitter.com/" aria-label="Suivez Kalystrat sur X" target="_blank" rel="noopener noreferrer"><i class="ri-twitter-x-line" aria-hidden="true"></i></a>
                                <a href="https://instagram.com/" aria-label="Suivez Kalystrat sur Instagram" target="_blank" rel="noopener noreferrer"><i class="ri-instagram-line" aria-hidden="true"></i></a>
                                <a href="https://facebook.com/" aria-label="Suivez Kalystrat sur Facebook" target="_blank" rel="noopener noreferrer"><i class="ri-facebook-fill" aria-hidden="true"></i></a>
                                <a href="https://linkedin.com/" aria-label="Suivez Kalystrat sur LinkedIn" target="_blank" rel="noopener noreferrer"><i class="ri-linkedin-fill" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright-wrap">
                <div class="row gy-3 justify-content-md-between justify-content-center">
                    <div class="col-auto align-self-center"><p class="copyright-text text-center">© 2026 <a href="#">Gestion Kalystrat Inc.</a>  |  Tous droits réservés</p></div>
                    <div class="col-auto">
                        <div class="footer-links">
                            <a href="{{ route('contact') }}">Terms & Condition</a>
                            <a href="{{ route('contact') }}">Politique de confidentialité</a>
                            <a href="{{ route('contact') }}">Communiquez avec nous</a>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </footer>