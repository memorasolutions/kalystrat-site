<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('backoffice::themes.backend.layouts.admin', ['title' => __('Modifier l\'exception'), 'subtitle' => __('Réservations')])

@section('content')
<div class="card">
    <div class="card-header"><h5 class="mb-0">{{ __('Modifier l\'exception') }}</h5></div>
    <div class="card-body">
        <form action="{{ route('admin.booking.date-overrides.update', $dateOverride) }}" method="POST">
            @csrf @method('PUT')
            @include('booking::admin.date-overrides._form', ['override' => $dateOverride])
            <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
            <a href="{{ route('admin.booking.date-overrides.index') }}" class="btn btn-secondary">{{ __('Annuler') }}</a>
        </form>
    </div>
</div>
@endsection
