<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin', ['title' => __('Traductions')])

@section('page-actions')
    <x-backoffice::help-modal id="helpTranslationsModal" :title="__('Traductions')" icon="languages" :buttonLabel="__('Aide')">
            @include('backoffice::themes.backend.translations._help')
        </x-backoffice::help-modal>
@endsection

@section('content')


@livewire('backoffice-translations-manager')
@endsection
