<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('backoffice::themes.backend.layouts.admin', ['title' => __('Paiement annulé'), 'subtitle' => __('Abonnement')])

@section('content')

<div class="card border-warning">
    <div class="card-body text-center py-5">
        <div class="d-flex justify-content-center mb-4">
            <i data-lucide="x-circle" class="text-danger" style="width:64px;height:64px;"></i>
        </div>
        <h2 class="fw-bold">{{ __('Paiement annulé') }}</h2>
        <p class="mt-3 text-muted">
            {{ __('Aucun montant n\'a été débité. Votre abonnement n\'a pas été activé.') }}
        </p>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary mt-4">
            {{ __('Retour au tableau de bord') }}
        </a>
    </div>
</div>

@endsection
