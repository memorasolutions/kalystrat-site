@php
    $filiales_side = require module_path('Frontend', 'config/filiales.php');
@endphp
<div class="sidemenu-wrapper">
    <div class="sidemenu-content">
        <button class="closeButton sideMenuCls" aria-label="Fermer le menu latéral"><i class="ri-close-line" aria-hidden="true"></i></button>

        <div class="widget widget-about footer-widget">
            <div class="footer-logo">
                <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/img/kalystrat/logo-white.svg') }}" alt="Kalystrat — Holding québécois en construction"></a>
            </div>
            <p class="about-text mb-4">Gestion Kalystrat Inc. est un holding québécois regroupant six filiales spécialisées en construction, immobilier et placement de personnel. Conçu. Réalisé. Livré.</p>

            <p class="footer-text">
                <a href="tel:+15815786145"><i class="ri-phone-line me-2" aria-hidden="true"></i>1-581-578-6145</a>
            </p>
            <p class="contact-text"><i class="ri-map-pin-line me-2" aria-hidden="true"></i> Québec, QC, Canada</p>
            <p class="footer-text"><a href="mailto:info@kalystrat.ca"><i class="ri-mail-line me-2" aria-hidden="true"></i>info@kalystrat.ca</a></p>

            <div class="social-btn style3 mt-30">
                <a href="https://facebook.com/kalystrat" target="_blank" rel="noopener noreferrer" aria-label="Facebook Kalystrat"><i class="ri-facebook-fill" aria-hidden="true"></i></a>
                <a href="https://linkedin.com/company/kalystrat" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn Kalystrat"><i class="ri-linkedin-fill" aria-hidden="true"></i></a>
                <a href="https://instagram.com/kalystrat" target="_blank" rel="noopener noreferrer" aria-label="Instagram Kalystrat"><i class="ri-instagram-line" aria-hidden="true"></i></a>
            </div>

            <div class="widget mt-40">
                <h4 class="widget_title">Nos 6 filiales</h4>
                <ul class="sidemenu-links">
                    @foreach($filiales_side as $slug => $f)
                        <li><a href="{{ route('frontend.filiale', $slug) }}">{{ $f['nom_court'] }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
