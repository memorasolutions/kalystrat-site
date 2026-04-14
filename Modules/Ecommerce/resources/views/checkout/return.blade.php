{{-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca --}}
@extends('auth::layouts.app')

@section('title', __('Confirmation de paiement'))

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(($status['status'] ?? '') === 'complete')
                <div class="card text-center border-success">
                    <div class="card-body py-5">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width:80px;height:80px">
                            <i data-lucide="check" class="text-success" style="width:40px;height:40px"></i>
                        </div>
                        <h3 class="fw-bold mb-3">{{ __('Paiement reussi') }}</h3>
                        <p class="text-body-secondary">{{ __('Merci pour votre achat.') }}</p>
                        @if(!empty($status['customer_email']))
                            <p class="text-body-secondary">{{ __('Confirmation envoyee a') }} <strong>{{ $status['customer_email'] }}</strong></p>
                        @endif
                        @if(!empty($status['amount_total']))
                            <p class="fs-4 fw-bold text-success">${{ number_format($status['amount_total'] / 100, 2) }} {{ strtoupper($status['currency'] ?? 'cad') }}</p>
                        @endif
                        <a href="{{ url('/') }}" class="btn btn-primary mt-3">{{ __('Retour a l\'accueil') }}</a>
                    </div>
                </div>
            @elseif(($status['status'] ?? '') === 'open')
                <div class="card text-center border-warning">
                    <div class="card-body py-5">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width:80px;height:80px">
                            <i data-lucide="clock" class="text-warning" style="width:40px;height:40px"></i>
                        </div>
                        <h3 class="fw-bold mb-3">{{ __('Paiement en cours') }}</h3>
                        <p class="text-body-secondary">{{ __('Votre paiement est en cours de traitement. Vous recevrez une confirmation par courriel.') }}</p>
                    </div>
                </div>
            @else
                <div class="card text-center border-danger">
                    <div class="card-body py-5">
                        <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width:80px;height:80px">
                            <i data-lucide="x" class="text-danger" style="width:40px;height:40px"></i>
                        </div>
                        <h3 class="fw-bold mb-3">{{ __('Session expiree') }}</h3>
                        <p class="text-body-secondary">{{ __('La session de paiement a expire. Veuillez reessayer.') }}</p>
                        <a href="{{ route('checkout.show') }}" class="btn btn-primary mt-3">{{ __('Retour au paiement') }}</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
