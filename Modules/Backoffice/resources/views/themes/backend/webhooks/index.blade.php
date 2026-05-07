<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin', ['title' => __('Webhooks'), 'subtitle' => __('Intégrations')])

@section('page-actions')
    <x-backoffice::help-modal id="helpWebhooksModal" :title="__('Webhooks')" icon="webhook" :buttonLabel="__('Aide')">
            @include('backoffice::themes.backend.webhooks._help')
        </x-backoffice::help-modal>
@endsection

@section('content')


<div class="card">
    <div class="card-header d-flex align-items-center gap-2">
        <i data-lucide="webhook" class="text-primary"></i>
        <h5 class="mb-0 fw-semibold">{{ __('Webhooks') }}</h5>
    </div>
    <div class="card-body">
        @livewire('backoffice-webhooks-manager')
    </div>
</div>

@endsection
