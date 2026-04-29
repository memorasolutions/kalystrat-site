@extends('frontend::layout-v2')

@section('title', 'Contact - Kalystrat')

@section('meta_description', 'Contactez Kalystrat — holding québécois construction 6 filiales. Tél 1-581-578-6145, info@kalystrat.ca, Québec QC.')

@section('content')

@include('frontend::partials-v2.breadcumb-v2', [
    'pageTitle' => 'Nous joindre',
    'breadcumbItems' => [
        ['label' => 'Accueil', 'url' => route('index')],
        ['label' => 'Contact', 'url' => null]
    ]
])

<section class="contact-page-area space">
    <div class="container">
        <div class="row gy-4 justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="contact-page-card bg-smoke">
                    <div class="contact-page-card-details">
                        <h4 class="contact-page-card_title">Siège social</h4>
                        <div class="contact-page-card-text"><i class="ri-phone-line"></i><a class="contact-page-card_link" href="tel:+15815786145">1-581-578-6145</a></div>
                        <div class="contact-page-card-text"><i class="ri-mail-line"></i><a class="contact-page-card_link" href="mailto:info@kalystrat.ca">info@kalystrat.ca</a></div>
                        <div class="contact-page-card-text"><i class="ri-time-line"></i>Lun - Ven 8h - 17h</div>
                    </div>
                    <div class="contact-page-card-thumb">
                        <img src="{{ asset('assets/construz-new/img/normal/contact_page1-1.png') }}" alt="img">
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="contact-page-card bg-smoke">
                    <div class="contact-page-card-details">
                        <h4 class="contact-page-card_title">Soumissions</h4>
                        <div class="contact-page-card-text"><i class="ri-phone-line"></i><a class="contact-page-card_link" href="tel:+15815786145">1-581-578-6145</a></div>
                        <div class="contact-page-card-text"><i class="ri-mail-line"></i><a class="contact-page-card_link" href="mailto:soumissions@kalystrat.ca">soumissions@kalystrat.ca</a></div>
                        <div class="contact-page-card-text"><i class="ri-time-line"></i>7j/7 — réponse 24 h</div>
                    </div>
                    <div class="contact-page-card-thumb">
                        <img src="{{ asset('assets/construz-new/img/normal/contact_page1-2.png') }}" alt="img">
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="contact-page-card bg-smoke">
                    <div class="contact-page-card-details">
                        <h4 class="contact-page-card_title">Service après-vente</h4>
                        <div class="contact-page-card-text"><i class="ri-phone-line"></i><a class="contact-page-card_link" href="tel:+15815786145">1-581-578-6145</a></div>
                        <div class="contact-page-card-text"><i class="ri-mail-line"></i><a class="contact-page-card_link" href="mailto:service@kalystrat.ca">service@kalystrat.ca</a></div>
                        <div class="contact-page-card-text"><i class="ri-time-line"></i>Lun - Ven 9h - 16h</div>
                    </div>
                    <div class="contact-page-card-thumb">
                        <img src="{{ asset('assets/construz-new/img/normal/contact_page1-3.png') }}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-area-2 space-bottom overflow-hidden">
    <div class="container">
        <div class="contact-wrap2 space overflow-hidden" data-bg-src="{{ asset('assets/construz-new/img/bg/contact-bg3-1.png') }}" style="background-image: url('{{ asset('assets/construz-new/img/bg/contact-bg3-1.png') }}');">
            <div class="section-animation-shape1-1 shape-mockup animation-infinite" data-top="0" data-left="0" data-bg-src="{{ asset('assets/construz-new/img/shape/global-line-shape1.png') }}" style="background-image: url('{{ asset('assets/construz-new/img/shape/global-line-shape1.png') }}');"></div>
            <div class="row gy-60 justify-content-lg-end justify-content-center">
                <div class="col-xl-7">
                    <div class="contact-form-wrap">
                        <div class="title-area">
                            <span class="sub-title text-theme">SOUMISSION GRATUITE <i class="ri-arrow-right-down-line"></i></span>
                            <h2 class="sec-title">Vous avez un projet ?</h2>
                        </div>
                        <form action="{{ route('frontend.contact.submit') }}" method="POST" class="contact-form ajax-contact">
                            @csrf
                            <div class="row gy-4">
                                <div class="col-md-6"><div class="form-group"><input type="text" class="form-control" name="name" id="name" placeholder="Nom complet *" required autocomplete="name" aria-label="Nom complet"></div></div>
                                <div class="col-md-6"><div class="form-group"><input type="email" class="form-control" name="email" id="email" placeholder="Courriel *" required autocomplete="email" aria-label="Courriel"></div></div>
                                <div class="col-md-6"><div class="form-group"><input type="tel" class="form-control" name="phone" id="phone" placeholder="Téléphone" autocomplete="tel" aria-label="Numéro de téléphone"></div></div>
                                <div class="col-md-6"><div class="form-group"><select name="subject" id="subject" class="single-select nice-select form-select" required aria-label="Sujet du message">
                                    <option value="" disabled selected hidden>Sujet *</option>
                                    <option value="Soumission">Soumission</option>
                                    <option value="Information">Information</option>
                                    <option value="Partenariat">Partenariat</option>
                                    <option value="Autre">Autre</option>
                                </select></div></div>
                                <div class="col-12"><div class="form-group"><textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Décrivez votre projet ou besoin..." required aria-label="Message décrivant votre projet"></textarea></div></div>
                                <div class="form-btn col-12"><button class="btn w-100">ENVOYER MA SOUMISSION <i class="ri-arrow-right-up-line"></i></button></div>
                            </div>
                            <p class="form-messages mb-0 mt-3"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="map-area overflow-hidden">
    <div class="map-sec">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d86847.5!2d-71.31!3d46.81!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cb8968a05db8893%3A0x8fc52d8f4f5bef9c!2sQu%C3%A9bec%2C%20QC%2C%20Canada!5e0!3m2!1sfr!2sca" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Localisation Kalystrat - Québec"></iframe>
    </div>
</div>

@endsection
