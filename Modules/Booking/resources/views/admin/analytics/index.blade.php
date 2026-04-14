<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('backoffice::themes.backend.layouts.admin', ['title' => __('Statistiques rendez-vous'), 'subtitle' => __('Réservations')])

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">{{ __('Statistiques des rendez-vous') }}</h1>
    <div class="d-flex gap-2">
        <form method="GET" class="d-inline">
            <select name="period" class="form-select form-select-sm" onchange="this.form.submit()" style="width: auto;" aria-label="{{ __('Période d\'analyse') }}">
                <option value="7" {{ $period == 7 ? 'selected' : '' }}>{{ __('7 derniers jours') }}</option>
                <option value="30" {{ $period == 30 ? 'selected' : '' }}>{{ __('30 derniers jours') }}</option>
                <option value="90" {{ $period == 90 ? 'selected' : '' }}>{{ __('90 derniers jours') }}</option>
            </select>
        </form>
        <a href="{{ route('admin.booking.analytics.export') }}" class="btn btn-outline-secondary btn-sm" aria-label="{{ __('Télécharger') }}">
            <i data-lucide="download"></i> {{ __('Exporter CSV') }}
        </a>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                        <i data-lucide="calendar" class="text-primary"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">{{ __('Total RV') }}</h6>
                        <h3 class="mb-0">{{ number_format($stats['total_appointments'], 0, ',', ' ') }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="bg-success bg-opacity-10 p-3 rounded-circle me-3">
                        <i data-lucide="check-circle" class="text-success"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">{{ __('Confirmés') }}</h6>
                        <h3 class="mb-0">{{ number_format($stats['confirmed_count'], 0, ',', ' ') }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="bg-danger bg-opacity-10 p-3 rounded-circle me-3">
                        <i data-lucide="x-circle" class="text-danger"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">{{ __('Annulés') }}</h6>
                        <div class="d-flex align-items-baseline">
                            <h3 class="mb-0 me-2">{{ number_format($stats['cancelled_count'], 0, ',', ' ') }}</h3>
                            <span class="text-danger small">({{ number_format($stats['cancellation_rate'], 1, ',', ' ') }}%)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="bg-warning bg-opacity-10 p-3 rounded-circle me-3">
                        <i data-lucide="dollar-sign" class="text-warning"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">{{ __('Revenus') }}</h6>
                        <h3 class="mb-0">{{ number_format($stats['revenue'], 2, ',', ' ') }} $</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom">
        <h5 class="mb-0">{{ __('Top 5 services') }}</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th width="80">{{ __('Rang') }}</th>
                        <th>{{ __('Service') }}</th>
                        <th class="text-end">{{ __('Nombre de RV') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($topServices as $index => $service)
                        <tr>
                            <td><span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-1">#{{ $index + 1 }}</span></td>
                            <td>{{ $service->name }}</td>
                            <td class="text-end"><strong>{{ number_format($service->appointment_count, 0, ',', ' ') }}</strong></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">{{ __('Aucune donnée disponible pour cette période') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
