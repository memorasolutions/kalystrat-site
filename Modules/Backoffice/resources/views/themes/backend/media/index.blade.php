<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin', ['title' => __('Médias'), 'subtitle' => __('Bibliothèque')])

@section('page-actions')
    <x-backoffice::help-modal id="helpMediaModal" :title="__('Médiathèque')" icon="image" :buttonLabel="__('Aide')">
            @include('backoffice::themes.backend.media._help')
        </x-backoffice::help-modal>
@endsection

@section('content')


<div class="card">
    <div class="p-4">
        @livewire('backoffice-media-table')
    </div>
</div>

@endsection

@push('plugin-styles')
<link href="{{ asset('build/nobleui/plugins/cropperjs/cropper.css') }}" rel="stylesheet">
@endpush

@push('custom-scripts')
<script src="{{ asset('build/nobleui/plugins/cropperjs/cropper.min.js') }}"></script>
@endpush
