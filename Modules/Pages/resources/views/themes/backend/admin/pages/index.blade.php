<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin', ['title' => 'Pages statiques', 'subtitle' => 'CMS'])

@section('page-actions')
    <x-backoffice::help-modal id="helpPagesModal" :title="__('Pages statiques')" icon="file" :buttonLabel="__('Aide')">
            @include('pages::admin.pages._help')
        </x-backoffice::help-modal>
@endsection

@section('content')


<div class="card">
    <div class="card-header d-block py-3 px-4 border-bottom">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
            <h4 class="fw-bold mb-0 fs-5">{{ __('Pages statiques') }}</h4>
            <a href="{{ route('admin.pages.create') }}" class="btn btn-sm btn-primary d-inline-flex align-items-center gap-2">
                <i data-lucide="plus" class="icon-sm"></i>
                {{ __('Nouvelle page') }}
            </a>
        </div>
    </div>
    <div class="p-4">
        @livewire('static-pages-table')
    </div>
</div>

@endsection
