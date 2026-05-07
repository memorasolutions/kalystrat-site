<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin', ['title' => __('Rôles'), 'subtitle' => __('Liste')])

@section('page-actions')
    <x-backoffice::help-modal id="helpRolesModal" :title="__('Rôles et permissions')" icon="shield-check" :buttonLabel="__('Aide')">
                @include('backoffice::themes.backend.roles._help')
            </x-backoffice::help-modal>
@endsection

@section('content')

</div>

<div class="card">
    <div class="card-body">
        @livewire('backoffice-roles-table')
    </div>
</div>

@endsection
