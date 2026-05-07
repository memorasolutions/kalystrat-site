<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin', ['title' => __('Paiement réussi'), 'subtitle' => __('Abonnement')])

@section('content')

<div class="card border-success">
    <div class="card-body text-center py-5">
        <div class="d-flex justify-content-center mb-4">
            <i data-lucide="check-circle" class="text-success" style="width:64px;height:64px;"></i>
        </div>
        <h2 class="fw-bold">{{ __('Paiement confirmé') }}</h2>
        <p class="mt-3 text-muted">
            {{ __('Votre abonnement a été activé avec succès. Vous pouvez désormais accéder à toutes les fonctionnalités de votre plan.') }}
        </p>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary mt-4">
            {{ __('Retour au tableau de bord') }}
        </a>
    </div>
</div>

@endsection
