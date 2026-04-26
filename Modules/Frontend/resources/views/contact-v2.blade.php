@extends('frontend::layout-v2')

@section('title', 'Nous joindre — Soumission gratuite | Kalystrat')
@section('meta_description', 'Contactez Kalystrat pour vos projets de construction au Québec. Téléphone, courriel, formulaire de soumission gratuite.')

@section('content')

@include('frontend::partials-v2.page-hero', [
    'heroTitle' => 'Nous joindre',
    'heroSubtitle' => 'Soumission gratuite',
    'heroBg' => 'assets/img/kalystrat/hero-skyline.jpg',
    'heroBreadcrumb' => [
        ['label' => 'Accueil', 'url' => route('frontend.home')],
        ['label' => 'Nous joindre'],
    ],
])

<section class="space">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="contact-info-card text-center p-4">
                    <i class="ri-map-pin-line" aria-hidden="true" style="font-size: 3rem; color: #B8A472;"></i>
                    <h3 class="mt-3">Notre adresse</h3>
                    <p class="mt-2">Québec, QC<br>Canada</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="contact-info-card text-center p-4">
                    <i class="ri-phone-line" aria-hidden="true" style="font-size: 3rem; color: #B8A472;"></i>
                    <h3 class="mt-3">Téléphone</h3>
                    <p class="mt-2"><a href="tel:+15815786145">1-581-578-6145</a></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="contact-info-card text-center p-4">
                    <i class="ri-mail-line" aria-hidden="true" style="font-size: 3rem; color: #B8A472;"></i>
                    <h3 class="mt-3">Courriel</h3>
                    <p class="mt-2"><a href="mailto:info@kalystrat.ca">info@kalystrat.ca</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="space-bottom">
    <div class="container">
        <div class="col-lg-10 mx-auto">
            <div class="title-area text-center">
                <h6 class="text-gold">FORMULAIRE</h6>
                <h2>Envoyez-nous un message</h2>
                <p class="mt-2">Remplissez le formulaire ci-dessous et nous vous répondrons dans les plus brefs délais.</p>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                </div>
            @endif

            <form action="{{ route('frontend.contact.submit') }}" method="POST" class="mt-4">
                @csrf
                <div class="row g-3">
                    <div class="col-lg-6">
                        <label for="name" class="form-label">Nom complet <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required aria-required="true" autocomplete="name">
                    </div>
                    <div class="col-lg-6">
                        <label for="email" class="form-label">Courriel <span class="text-danger">*</span></label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required aria-required="true" autocomplete="email">
                    </div>
                    <div class="col-lg-6">
                        <label for="phone" class="form-label">Téléphone</label>
                        <input type="tel" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" autocomplete="tel">
                    </div>
                    <div class="col-lg-6">
                        <label for="subject" class="form-label">Sujet <span class="text-danger">*</span></label>
                        <select id="subject" name="subject" class="form-select" required aria-required="true">
                            <option value="" disabled {{ old('subject') ? '' : 'selected' }}>Sélectionnez un sujet</option>
                            <option value="Soumission" {{ old('subject') == 'Soumission' ? 'selected' : '' }}>Soumission</option>
                            <option value="Information" {{ old('subject') == 'Information' ? 'selected' : '' }}>Information</option>
                            <option value="Partenariat" {{ old('subject') == 'Partenariat' ? 'selected' : '' }}>Partenariat</option>
                            <option value="Autre" {{ old('subject') == 'Autre' ? 'selected' : '' }}>Autre</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                        <textarea id="message" name="message" class="form-control" rows="6" required aria-required="true">{{ old('message') }}</textarea>
                    </div>
                    <div class="col-12 text-center mt-3">
                        <button type="submit" class="btn">ENVOYER LE MESSAGE <i class="ri-send-plane-line" aria-hidden="true"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<section style="padding: 0;">
    <div class="container-fluid p-0">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d86847.5!2d-71.31!3d46.81!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cb8968a05db8893%3A0x8fc52d8f4f5bef9c!2sQu%C3%A9bec%2C%20QC%2C%20Canada!5e0!3m2!1sfr!2sca" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Localisation Kalystrat - Québec"></iframe>
    </div>
</section>

@endsection
