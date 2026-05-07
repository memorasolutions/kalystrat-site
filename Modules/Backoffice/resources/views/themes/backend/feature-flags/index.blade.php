<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin', ['title' => __('Feature Flags'), 'subtitle' => __('Gestion')])

@section('page-actions')
    <x-backoffice::help-modal id="helpFeatureFlagsModal" :title="__('Qu\'est-ce qu\'un Feature Flag ?')" icon="flag" :buttonLabel="__('Aide')">
            @include('backoffice::themes.backend.feature-flags._help')
        </x-backoffice::help-modal>
@endsection

@section('content')


<div class="card">
    <div class="card-body p-4">
        @livewire('backoffice-feature-flags-table')
    </div>
</div>

@endsection
