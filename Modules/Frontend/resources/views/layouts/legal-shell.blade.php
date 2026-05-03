{{-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca --}}
{{--
    Layout Shell pour les 4 pages légales du module Privacy.
    Pattern : Layout Slot config-driven (Option D, recherche UX 2026).
    Hérite du layout principal Frontend (header/footer/typo Kalystrat),
    expose @section('content') pour le contenu légal du module Privacy.
    Charge tailwind.css pour les utilitaires prose hérités du module.
--}}
@extends('frontend::layout')

@push('head')
{{-- Tailwind CSS pour les utilitaires prose / form (préservés du module Privacy) --}}
<link rel="stylesheet" href="{{ asset('auth/css/tailwind.css') }}">
<style>
    /* Wrapper prose Kalystrat-themed pour pages légales */
    .ks-legal-wrapper {
        background: #FAFAF8;
        padding: 4rem 0 5rem;
    }
    .ks-legal-container {
        max-width: 920px;
        margin: 0 auto;
        padding: 2.5rem 2rem;
        background: #FFFFFF;
        border-radius: 0.5rem;
        box-shadow: 0 1px 3px rgba(10, 22, 40, 0.05), 0 8px 24px rgba(10, 22, 40, 0.06);
        border: 1px solid #E8E2D0;
    }
    .ks-legal-container h1,
    .ks-legal-container h2.ks-legal-title {
        color: #0A1628;
        font-size: 2.25rem;
        font-weight: 700;
        line-height: 1.2;
        margin-bottom: 0.75rem;
        padding-bottom: 1rem;
        border-bottom: 3px solid #B8A472;
        margin-top: 0;
        padding-left: 0;
        border-left: 0;
    }
    .ks-legal-container h2 {
        color: #0A1628;
        font-size: 1.5rem;
        font-weight: 700;
        margin-top: 2.25rem;
        margin-bottom: 0.75rem;
        padding-left: 0.75rem;
        border-left: 4px solid #B8A472;
    }
    .ks-legal-container h3 {
        color: #1F2937;
        font-size: 1.15rem;
        font-weight: 600;
        margin-top: 1.5rem;
        margin-bottom: 0.5rem;
    }
    .ks-legal-container p,
    .ks-legal-container li {
        color: #2C3340;
        font-size: 1rem;
        line-height: 1.7;
    }
    .ks-legal-container a:not(.btn) {
        color: #075985;
        text-decoration: underline;
        text-underline-offset: 2px;
    }
    .ks-legal-container a:not(.btn):hover,
    .ks-legal-container a:not(.btn):focus-visible {
        color: #0A1628;
        text-decoration-thickness: 2px;
        outline: 3px solid #B8A472;
        outline-offset: 2px;
    }
    .ks-legal-container ul,
    .ks-legal-container ol {
        padding-left: 1.5rem;
        margin: 0.75rem 0 1.25rem;
    }
    .ks-legal-container ul li::marker { color: #B8A472; }
    .ks-legal-container .text-sm,
    .ks-legal-container .text-xs {
        color: #4A4A4A;
    }
    /* Forms (pour rights-request.blade.php) */
    .ks-legal-container input[type="text"],
    .ks-legal-container input[type="email"],
    .ks-legal-container input[type="file"],
    .ks-legal-container select,
    .ks-legal-container textarea {
        min-height: 44px !important;
        padding: 0.75rem 0.85rem !important;
        border: 1px solid #B8A472 !important;
        border-radius: 0.375rem !important;
        background: #FFFFFF !important;
        color: #0A1628 !important;
        width: 100%;
        font-size: 1rem;
        box-sizing: border-box;
    }
    .ks-legal-container input:focus,
    .ks-legal-container select:focus,
    .ks-legal-container textarea:focus {
        outline: 3px solid #075985 !important;
        outline-offset: 2px !important;
        border-color: #075985 !important;
    }
    .ks-legal-container label {
        font-weight: 600;
        color: #0A1628;
        margin-bottom: 0.35rem;
        display: block;
    }
    /* Override des bg-blue-50 / bg-green-50 du module Privacy pour cohérence Kalystrat */
    .ks-legal-container .bg-blue-50 {
        background-color: rgba(7, 89, 133, 0.06) !important;
        border-left-color: #075985 !important;
    }
    .ks-legal-container .bg-green-50 {
        background-color: rgba(184, 164, 114, 0.10) !important;
        border-left-color: #B8A472 !important;
    }
    .ks-legal-container .text-blue-800,
    .ks-legal-container .text-blue-700 { color: #075985 !important; }
    .ks-legal-container .text-green-800 { color: #0A1628 !important; }
</style>
@endpush

@section('content')
@php
    $legalBannerTitle = htmlspecialchars_decode($__env->yieldContent('banner-title', 'Documents légaux'), ENT_QUOTES);
    $legalBannerCrumb = htmlspecialchars_decode($__env->yieldContent('banner-crumb', $legalBannerTitle), ENT_QUOTES);
@endphp
@include('frontend::partials.page-banner', [
    'title' => $legalBannerTitle,
    'breadcrumbs' => [
        ['label' => 'Accueil', 'url' => route('index')],
        ['label' => $legalBannerCrumb, 'url' => null],
    ],
])

<div class="ks-legal-wrapper">
    <div class="container">
        <div class="ks-legal-container">
            @yield('legal-content')
        </div>
    </div>
</div>
@endsection
