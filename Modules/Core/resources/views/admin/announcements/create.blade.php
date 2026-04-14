<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('backoffice::themes.backend.layouts.admin')

@section('breadcrumbs')
@endsection

@section('title', __('Créer une annonce'))

@section('content')
    <div class="card">
        <div class="card-header"><h5 class="mb-0">{{ __('Nouvelle annonce') }}</h5></div>
        <div class="card-body">
            <form action="{{ route('admin.announcements.store') }}" method="POST">
                @csrf
                @include('core::admin.announcements._form')
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.announcements.index') }}" class="btn btn-secondary">{{ __('Annuler') }}</a>
                    <button type="submit" class="btn btn-primary">{{ __('Créer') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
