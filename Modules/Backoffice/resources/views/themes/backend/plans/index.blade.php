<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin', ['title' => __('Plans SaaS'), 'subtitle' => __('Gestion')])

@section('page-actions')
    <x-backoffice::help-modal id="helpPlansModal" :title="__('Plans d\'abonnement')" icon="credit-card" :buttonLabel="__('Aide')">
                @include('backoffice::themes.backend.plans._help')
            </x-backoffice::help-modal>
@endsection

@section('content')

</div>

<div class="card">
    <div class="card-body">
        @livewire('backoffice-plans-table')
    </div>
</div>

@endsection
