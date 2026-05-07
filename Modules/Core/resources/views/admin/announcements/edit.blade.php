<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin')

@section('breadcrumbs')
@endsection

@section('title', __('Modifier une annonce'))

@section('content')
    <div class="card">
        <div class="card-header"><h5 class="mb-0">{{ __("Modifier l'annonce") }}</h5></div>
        <div class="card-body">
            <form action="{{ route('admin.announcements.update', $announcement) }}" method="POST">
                @csrf
                @method('PUT')
                @include('core::admin.announcements._form', ['announcement' => $announcement])
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.announcements.index') }}" class="btn btn-secondary">{{ __('Annuler') }}</a>
                    <button type="submit" class="btn btn-primary">{{ __('Mettre à jour') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
