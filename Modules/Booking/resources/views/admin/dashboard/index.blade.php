<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin', ['title' => __('Tableau de bord - Réservations'), 'subtitle' => __('Réservations')])

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.booking.appointments.index') }}">{{ __('Réservations') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Tableau de bord') }}</li>
        </ol>
    </nav>

    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="text-muted text-uppercase small fw-bold mb-1">{{ __('Aujourd\'hui') }}</div>
                        <div class="h3 mb-0 fw-bold">{{ $todayCount }}</div>
                    </div>
                    <i data-lucide="calendar" class="text-primary" style="width:2rem;height:2rem;"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="text-muted text-uppercase small fw-bold mb-1">{{ __('Cette semaine') }}</div>
                        <div class="h3 mb-0 fw-bold">{{ $weekCount }}</div>
                    </div>
                    <i data-lucide="calendar-days" class="text-success" style="width:2rem;height:2rem;"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="text-muted text-uppercase small fw-bold mb-1">{{ __('Approbation') }}</div>
                        <div class="h3 mb-0 fw-bold">{{ $pendingApprovalCount }}</div>
                    </div>
                    <i data-lucide="clock" class="text-warning" style="width:2rem;height:2rem;"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="text-muted text-uppercase small fw-bold mb-1">{{ __('Taux no-show') }}</div>
                        <div class="h3 mb-0 fw-bold {{ $noShowRate > 10 ? 'text-danger' : '' }}">{{ $noShowRate }}%</div>
                    </div>
                    <i data-lucide="user-x" class="text-danger" style="width:2rem;height:2rem;"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="text-muted text-uppercase small fw-bold mb-1">{{ __('Revenus du mois') }}</div>
                        <div class="h3 mb-0 fw-bold">{{ number_format($monthRevenue, 2, ',', ' ') }} $</div>
                    </div>
                    <i data-lucide="dollar-sign" class="text-info" style="width:2rem;height:2rem;"></i>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="text-muted text-uppercase small fw-bold mb-1">{{ __('RV du mois') }}</div>
                        <div class="h3 mb-0 fw-bold">{{ $monthCount }}</div>
                    </div>
                    <i data-lucide="bar-chart" class="text-secondary" style="width:2rem;height:2rem;"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header"><h5 class="mb-0">{{ __('Prochains rendez-vous') }}</h5></div>
        <div class="card-body p-0">
            @if($upcoming->count())
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead><tr><th>{{ __('Date') }}</th><th>{{ __('Service') }}</th><th>{{ __('Client') }}</th><th>{{ __('Statut') }}</th></tr></thead>
                    <tbody>
                        @foreach($upcoming as $appt)
                        <tr>
                            <td>{{ $appt->start_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $appt->service->name }}</td>
                            <td>{{ $appt->customer->full_name }}</td>
                            <td><span class="badge bg-success">{{ __('Confirmé') }}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-center py-5 text-muted">{{ __('Aucun rendez-vous à venir') }}</div>
            @endif
        </div>
    </div>
</div>
@endsection
