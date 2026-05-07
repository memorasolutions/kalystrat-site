<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin', ['title' => __('Médias'), 'subtitle' => __('Bibliothèque')])

@section('content')

<div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
    <h4 class="fw-bold mb-0 d-flex align-items-center gap-2"><i data-lucide="image" class="icon-md text-primary"></i>{{ __('Médiathèque') }}</h4>
    <x-backoffice::help-modal id="helpMediaModal" :title="__('Médiathèque')" icon="image" :buttonLabel="__('Aide')">
        @include('backoffice::themes.backend.media._help')
    </x-backoffice::help-modal>
</div>

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
