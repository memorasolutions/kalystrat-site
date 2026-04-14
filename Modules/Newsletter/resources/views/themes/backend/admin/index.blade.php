<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('backoffice::themes.backend.layouts.admin', ['title' => 'Newsletter', 'subtitle' => 'Abonnés'])

@section('content')

<div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
    <h4 class="fw-bold mb-0 d-flex align-items-center gap-2"><i data-lucide="mail" class="icon-md text-primary"></i>{{ __('Abonnés newsletter') }}</h4>
    <x-backoffice::help-modal id="helpNewsletterSubscribersModal" :title="__('Abonnés newsletter')" icon="mail" :buttonLabel="__('Aide')">
        @include('newsletter::admin._help')
    </x-backoffice::help-modal>
</div>

<div class="card">
    <div class="card-header d-block py-3 px-4 border-bottom">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
            <h4 class="fw-bold mb-0 fs-5 d-flex align-items-center gap-2">
                <i data-lucide="mail" class="icon-sm text-primary"></i>
                {{ __('Liste des abonnés') }}
            </h4>
            <a href="{{ route('admin.newsletter.export') }}"
               class="btn btn-sm btn-outline-secondary d-inline-flex align-items-center gap-2">
                <i data-lucide="download" class="icon-sm"></i>
                {{ __('Export CSV') }}
            </a>
        </div>
    </div>
    <div class="p-4">
        @livewire('backoffice-subscribers-table')
    </div>
</div>

@endsection
