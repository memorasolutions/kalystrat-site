<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin', ['title' => __('Articles')])

@section('page-actions')
    <x-backoffice::help-modal id="helpArticlesModal" :title="__('Articles du blog')" icon="newspaper" :buttonLabel="__('Aide')">
            @include('blog::themes.backend.admin.articles._help')
        </x-backoffice::help-modal>
@endsection

@section('content')

<x-backoffice::driver-tour
    storage-key="driver_tour_articles_{{ auth()->id() }}"
    :steps="[
        ['element' => '.page-content', 'popover' => ['title' => __('Gestion des articles'), 'description' => __('Gérez votre blog : articles, catégories et commentaires.'), 'side' => 'bottom']],
        ['element' => 'table.table', 'popover' => ['title' => __('Liste des articles'), 'description' => __('Tous les articles avec statut, catégorie et auteur.'), 'side' => 'bottom']],
        ['element' => '.btn-primary', 'popover' => ['title' => __('Nouvel article'), 'description' => __('Rédigez un nouvel article avec l\'éditeur TipTap.'), 'side' => 'left']],
    ]"
/>


<div class="card">
    <div class="card-header py-3 px-4 border-bottom">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
            <h4 class="fw-bold mb-0">{{ __('Articles') }}</h4>
            <a href="{{ route('admin.blog.articles.create') }}"
               class="btn btn-sm btn-primary d-inline-flex align-items-center gap-2">
                <i data-lucide="plus" class="icon-sm"></i>
                {{ __('Nouvel article') }}
            </a>
        </div>
    </div>
    <div class="card-body p-4">
        @livewire('backoffice-articles-table')
    </div>
</div>

@endsection
