@extends('frontend::layout')

@section('title', 'Contact - Kalystrat')
@section('meta_description', 'Contactez Kalystrat pour vos projets de construction et développement immobilier à Québec. Soumission gratuite.')
@section('breadcrumb_title', 'Contact')
@section('breadcrumb')
    <li>Contact</li>
@endsection

@section('content')
    {{-- Contact info --}}
    <section class="space-top space-bottom">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title"><i class="ri-focus-2-line"></i> NOUS JOINDRE</span>
                <h2 class="sec-title">Restons en contact</h2>
                <p>N'hésitez pas à nous contacter pour toute question concernant nos services. Notre équipe est à votre disposition.</p>
            </div>
            <div class="row gx-30 gy-30">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="contact-info-card text-center p-4">
                        <div class="mb-3">
                            <i class="ri-map-pin-line" style="font-size: 3rem; color: var(--ks-gold);"></i>
                        </div>
                        <h3>Notre adresse</h3>
                        <p>Québec, QC<br>Canada</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="contact-info-card text-center p-4">
                        <div class="mb-3">
                            <i class="ri-phone-line" style="font-size: 3rem; color: var(--ks-gold);"></i>
                        </div>
                        <h3>Téléphone</h3>
                        <p><a href="tel:4184760987">418-476-0987</a></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="contact-info-card text-center p-4">
                        <div class="mb-3">
                            <i class="ri-mail-line" style="font-size: 3rem; color: var(--ks-gold);"></i>
                        </div>
                        <h3>Courriel</h3>
                        <p><a href="mailto:info@kalystrat.ca">info@kalystrat.ca</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact form --}}
    <section class="space-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="title-area text-center">
                        <h2 class="sec-title">Envoyez-nous un message</h2>
                        <p>Remplissez le formulaire ci-dessous et nous vous répondrons dans les plus brefs délais.</p>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                        </div>
                    @endif

                    <form action="#" method="POST">
                        @csrf
                        <div class="row gx-30">
                            <div class="col-lg-6 col-md-6 mb-3">
                                <label for="name" class="form-label">Nom complet <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Votre nom complet" value="{{ old('name') }}" required autocomplete="name" aria-required="true">
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                <label for="email" class="form-label">Courriel <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Votre adresse courriel" value="{{ old('email') }}" required autocomplete="email" aria-required="true">
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                <label for="phone" class="form-label">Téléphone</label>
                                <input type="tel" name="phone" id="phone" class="form-control" placeholder="Votre numéro de téléphone" value="{{ old('phone') }}" autocomplete="tel">
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                <label for="subject" class="form-label">Sujet <span class="text-danger">*</span></label>
                                <select name="subject" id="subject" class="form-select" required>
                                    <option value="" disabled {{ old('subject') ? '' : 'selected' }}>Sélectionnez un sujet</option>
                                    <option value="Soumission" {{ old('subject') == 'Soumission' ? 'selected' : '' }}>Soumission</option>
                                    <option value="Information" {{ old('subject') == 'Information' ? 'selected' : '' }}>Information</option>
                                    <option value="Partenariat" {{ old('subject') == 'Partenariat' ? 'selected' : '' }}>Partenariat</option>
                                    <option value="Autre" {{ old('subject') == 'Autre' ? 'selected' : '' }}>Autre</option>
                                </select>
                            </div>
                            <div class="col-12 mb-4">
                                <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                                <textarea name="message" id="message" class="form-control" rows="6" placeholder="Décrivez votre projet ou votre demande..." required>{{ old('message') }}</textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn">ENVOYER LE MESSAGE <i class="ri-send-plane-line"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- Map --}}
    <section>
        <div class="container-fluid p-0">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d86847.5!2d-71.31!3d46.81!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cb8968a05db8893%3A0x8fc52d8f4f5bef9c!2sQu%C3%A9bec%2C%20QC%2C%20Canada!5e0!3m2!1sfr!2sca"
                width="100%"
                height="400"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                title="Localisation Kalystrat - Québec">
            </iframe>
        </div>
    </section>
@endsection
