<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin', ['title' => __('Utilisateurs'), 'subtitle' => __('Liste')])

@section('page-actions')
    <x-backoffice::help-modal id="helpUsersModal" :title="__('Utilisateurs')" icon="users" :buttonLabel="__('Aide')">
                @include('backoffice::themes.backend.users._help')
            </x-backoffice::help-modal>
@endsection

@section('content')

<x-backoffice::driver-tour
    storage-key="driver_tour_users_{{ auth()->id() }}"
    :steps="[
        ['element' => '.page-content', 'popover' => ['title' => __('Gestion des utilisateurs'), 'description' => __('Gérez les comptes, rôles et accès de votre plateforme.'), 'side' => 'bottom']],
        ['element' => 'table.table', 'popover' => ['title' => __('Liste des utilisateurs'), 'description' => __('Tous les utilisateurs avec rôle, statut et actions.'), 'side' => 'bottom']],
        ['element' => '.btn-primary', 'popover' => ['title' => __('Nouvel utilisateur'), 'description' => __('Créez un compte utilisateur avec rôle et permissions.'), 'side' => 'left']],
    ]"
/>

</div>

<div class="card">
    <div class="card-body">
        @livewire('backoffice-users-table')
    </div>
</div>

@endsection
