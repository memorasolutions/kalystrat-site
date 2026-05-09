@extends('frontend::layouts.intime')

@section('title', 'Crédits et mentions légales | Kalystrat')

@push('meta')
<meta name="description" content="Crédits photos, polices et thèmes utilisés sur le site Kalystrat. Mentions légales et tiers.">
<link rel="canonical" href="{{ url('/credits') }}">
<meta name="robots" content="index, follow">
@endpush

@section('content')

<section class="page-title" style="background-image:url(/intime/images/background/2.jpg)">
    <div class="auto-container">
        <h1>Crédits et mentions</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>Crédits</li>
        </ul>
    </div>
</section>

<section class="about-section-two">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 content-column">
                <div class="sec-title">
                    <h2>Crédits du site</h2>
                </div>
                <div class="text">
                    <h4 style="margin-top:30px">Thème et design</h4>
                    <p>Le site utilise comme base le thème HTML <strong>InTime</strong> (Bootstrap, jQuery, Owl Carousel) personnalisé pour Gestion Kalystrat Inc.</p>

                    <h4 style="margin-top:30px">Photographies</h4>
                    <p>Photos de placeholder fournies par le thème InTime. Les photos réelles des chantiers et de l’équipe Kalystrat seront ajoutées progressivement.</p>

                    <h4 style="margin-top:30px">Polices</h4>
                    <p>Akzidenz Grotesk (Adobe Fonts / Berthold), licence commerciale.</p>

                    <h4 style="margin-top:30px">Bibliothèques tierces</h4>
                    <ul style="margin-top:15px">
                        <li>Laravel 12 (MIT) - framework backend</li>
                        <li>Bootstrap (MIT) - grille responsive</li>
                        <li>jQuery (MIT) - interactions JavaScript</li>
                        <li>Owl Carousel (MIT) - carousels</li>
                    </ul>

                    <h4 style="margin-top:30px">Hébergement</h4>
                    <p>Hébergement web cPanel. CDN Cloudflare. Serveurs au Canada.</p>

                    <h4 style="margin-top:30px">Conception et développement</h4>
                    <p>Conception et développement par MEMORA solutions pour Gestion Kalystrat Inc.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
