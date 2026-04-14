{{-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca --}}
@extends('auth::layouts.app')

@section('title', __('Confidentialite'))

@section('content')
<div class="container-fluid">
    <h1 class="h3 fw-semibold mb-4">{{ __('Mes preferences de confidentialite') }}</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('Fermer') }}"></button>
        </div>
    @endif

    {{-- Preferences cookies actuelles --}}
    <div class="card mb-4">
        <div class="card-header py-3 d-flex align-items-center gap-2">
            <i data-lucide="cookie" style="width:18px;height:18px;" class="text-primary"></i>
            <h5 class="fw-bold mb-0">{{ __('Preferences cookies') }}</h5>
        </div>
        <div class="card-body">
            @if ($currentConsent)
                <div class="row mb-3">
                    <div class="col-md-4 fw-semibold">{{ __('Essentiels') }}</div>
                    <div class="col-md-8">
                        <span class="badge bg-success">{{ __('Toujours actif') }}</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-semibold">{{ __('Analytics') }}</div>
                    <div class="col-md-8">
                        <span class="badge bg-{{ ($currentConsent['analytics'] ?? false) ? 'info' : 'secondary' }}">
                            {{ ($currentConsent['analytics'] ?? false) ? __('Active') : __('Desactive') }}
                        </span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-semibold">{{ __('Marketing') }}</div>
                    <div class="col-md-8">
                        <span class="badge bg-{{ ($currentConsent['marketing'] ?? false) ? 'warning' : 'secondary' }}">
                            {{ ($currentConsent['marketing'] ?? false) ? __('Active') : __('Desactive') }}
                        </span>
                    </div>
                </div>

                <hr>

                <form method="POST" action="{{ route('user.privacy.update') }}">
                    @csrf
                    @method('PUT')
                    <h6 class="fw-bold mb-3">{{ __('Modifier vos preferences') }}</h6>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="analytics" value="1" id="updateAnalytics" {{ ($currentConsent['analytics'] ?? false) ? 'checked' : '' }}>
                        <label class="form-check-label" for="updateAnalytics">{{ __('Autoriser les cookies d\'analyse') }}</label>
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="marketing" value="1" id="updateMarketing" {{ ($currentConsent['marketing'] ?? false) ? 'checked' : '' }}>
                        <label class="form-check-label" for="updateMarketing">{{ __('Autoriser les cookies de marketing') }}</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i data-lucide="save" class="me-1"></i> {{ __('Enregistrer') }}
                    </button>
                </form>
            @else
                <p class="text-body-secondary mb-0">{{ __('Aucun consentement enregistre. Utilisez la banniere cookies pour definir vos preferences.') }}</p>
            @endif
        </div>
    </div>

    {{-- Historique des consentements --}}
    <div class="card mb-4">
        <div class="card-header py-3 d-flex align-items-center gap-2">
            <i data-lucide="history" style="width:18px;height:18px;" class="text-primary"></i>
            <h5 class="fw-bold mb-0">{{ __('Historique des consentements') }}</h5>
        </div>
        <div class="card-body p-0">
            @if ($consents->isNotEmpty())
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Action') }}</th>
                                <th>{{ __('Juridiction') }}</th>
                                <th>{{ __('Choix') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($consents->take(10) as $consent)
                                <tr>
                                    <td>{{ $consent->created_at->format('Y-m-d H:i') }}</td>
                                    <td><span class="badge bg-primary bg-opacity-10 text-primary">{{ $consent->action ?? '-' }}</span></td>
                                    <td>{{ strtoupper($consent->jurisdiction ?? '-') }}</td>
                                    <td>
                                        @php $choices = $consent->choices ?? []; @endphp
                                        @if (!empty($choices['essential']))
                                            <span class="badge bg-success me-1">{{ __('Essentiels') }}</span>
                                        @endif
                                        @if (!empty($choices['analytics']))
                                            <span class="badge bg-info me-1">{{ __('Analytics') }}</span>
                                        @endif
                                        @if (!empty($choices['marketing']))
                                            <span class="badge bg-warning me-1">{{ __('Marketing') }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-4">
                    <p class="text-body-secondary mb-0">{{ __('Aucun historique de consentement.') }}</p>
                </div>
            @endif
        </div>
    </div>

    {{-- Export RGPD --}}
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('user.privacy.export') }}" class="btn btn-outline-secondary btn-sm">
            <i data-lucide="download" class="me-1"></i> {{ __('Exporter mes donnees (JSON)') }}
        </a>
    </div>
</div>
@endsection
