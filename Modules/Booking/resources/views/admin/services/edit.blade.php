<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin', ['title' => __('Modifier le service'), 'subtitle' => __('Réservations')])

@section('content')
<div class="card">
    <div class="card-header"><h5 class="mb-0">{{ __('Modifier le service') }}</h5></div>
    <div class="card-body">
        <form action="{{ route('admin.booking.services.update', $service) }}" method="POST">
            @csrf @method('PUT')
            @include('booking::admin.services._form', ['service' => $service])
            <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
            <a href="{{ route('admin.booking.services.index') }}" class="btn btn-secondary">{{ __('Annuler') }}</a>
        </form>
    </div>
</div>
@endsection
