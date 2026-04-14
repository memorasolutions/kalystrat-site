<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('backoffice::themes.backend.layouts.admin', ['title' => __('Nouvelle exception'), 'subtitle' => __('Réservations')])

@section('content')
<div class="card">
    <div class="card-header"><h5 class="mb-0">{{ __('Nouvelle exception de date') }}</h5></div>
    <div class="card-body">
        <form action="{{ route('admin.booking.date-overrides.store') }}" method="POST">
            @csrf
            @include('booking::admin.date-overrides._form')
            <button type="submit" class="btn btn-primary">{{ __('Créer') }}</button>
            <a href="{{ route('admin.booking.date-overrides.index') }}" class="btn btn-secondary">{{ __('Annuler') }}</a>
        </form>
    </div>
</div>
@endsection
