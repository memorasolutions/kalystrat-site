<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('backoffice::themes.backend.layouts.admin', ['title' => __('Nouveau service'), 'subtitle' => __('Réservations')])

@section('content')
<div class="card">
    <div class="card-header"><h5 class="mb-0">{{ __('Nouveau service') }}</h5></div>
    <div class="card-body">
        <form action="{{ route('admin.booking.services.store') }}" method="POST">
            @csrf
            @include('booking::admin.services._form')
            <button type="submit" class="btn btn-primary">{{ __('Créer') }}</button>
            <a href="{{ route('admin.booking.services.index') }}" class="btn btn-secondary">{{ __('Annuler') }}</a>
        </form>
    </div>
</div>
@endsection
