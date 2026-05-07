<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin', ['title' => __('Paramètres'), 'subtitle' => __('Configuration')])

@section('page-actions')
    <x-backoffice::help-modal id="helpSettingsModal" :title="__('Paramètres')" icon="settings" :buttonLabel="__('Aide')">
                @include('backoffice::themes.backend.settings._help')
            </x-backoffice::help-modal>
@endsection

@section('content')

<x-backoffice::driver-tour
    storage-key="driver_tour_settings_{{ auth()->id() }}"
    :steps="[
        ['element' => '.page-content', 'popover' => ['title' => __('Paramètres'), 'description' => __('Configurez votre application : général, SEO, courriel, IA.'), 'side' => 'bottom']],
        ['element' => '.nav-tabs', 'popover' => ['title' => __('Onglets'), 'description' => __('Naviguez entre les groupes de paramètres.'), 'side' => 'bottom']],
    ]"
/>

</div>

<div class="card">
    <div class="card-body">
        @livewire('backoffice-settings-manager')
    </div>
</div>

@endsection
