<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin', ['title' => __('Monitoring erreurs'), 'subtitle' => __('Système')])

@section('content')

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card bg-light">
            <div class="card-body text-center">
                <h3 class="fw-bold mb-0">{{ $stats['total'] }}</h3>
                <small class="text-muted">{{ __('Total erreurs') }}</small>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-warning bg-opacity-10">
            <div class="card-body text-center">
                <h3 class="fw-bold mb-0 text-warning">{{ $stats['unresolved'] }}</h3>
                <small class="text-muted">{{ __('Non résolues') }}</small>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-danger bg-opacity-10">
            <div class="card-body text-center">
                <h3 class="fw-bold mb-0 text-danger">{{ $stats['critical_7d'] }}</h3>
                <small class="text-muted">{{ __('Critiques (7j)') }}</small>
            </div>
        </div>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h6 class="fw-bold mb-3"><i data-lucide="trending-up" class="icon-sm me-1"></i> {{ __('Erreurs par jour (30 jours)') }}</h6>
                <div id="errorsPerDayChart"></div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h6 class="fw-bold mb-3"><i data-lucide="pie-chart" class="icon-sm me-1"></i> {{ __('Par sévérité') }}</h6>
                <div id="severityChart"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h6 class="fw-bold mb-3"><i data-lucide="link" class="icon-sm me-1"></i> {{ __('Top 5 URLs') }}</h6>
                <div id="topUrlsChart"></div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header py-3 px-4 border-bottom d-flex align-items-center justify-content-between">
        <h5 class="fw-bold mb-0">
            <i data-lucide="alert-triangle" class="icon-sm me-1"></i> {{ __('Erreurs récentes') }}
        </h5>
        <form method="GET" class="d-flex gap-2">
            <select name="severity" class="form-select form-select-sm" onchange="this.form.submit()">
                <option value="">{{ __('Toutes sévérités') }}</option>
                <option value="critical" {{ request('severity') == 'critical' ? 'selected' : '' }}>{{ __('Critique') }}</option>
                <option value="warning" {{ request('severity') == 'warning' ? 'selected' : '' }}>{{ __('Warning') }}</option>
                <option value="info" {{ request('severity') == 'info' ? 'selected' : '' }}>{{ __('Info') }}</option>
            </select>
            <select name="status_code" class="form-select form-select-sm" onchange="this.form.submit()">
                <option value="">{{ __('Tous codes') }}</option>
                <option value="500" {{ request('status_code') == '500' ? 'selected' : '' }}>500</option>
                <option value="404" {{ request('status_code') == '404' ? 'selected' : '' }}>404</option>
                <option value="403" {{ request('status_code') == '403' ? 'selected' : '' }}>403</option>
                <option value="429" {{ request('status_code') == '429' ? 'selected' : '' }}>429</option>
            </select>
        </form>
    </div>
    <div class="p-4">
        @if ($errors->isEmpty())
            <div class="text-center text-muted py-5">
                <i data-lucide="check-circle" style="width:48px;height:48px" class="mb-3 d-block mx-auto text-success"></i>
                <p>{{ __('Aucune erreur enregistrée.') }}</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>{{ __('Code') }}</th>
                            <th>{{ __('Sévérité') }}</th>
                            <th>{{ __('Message') }}</th>
                            <th>{{ __('URL') }}</th>
                            <th>{{ __('Occurrences') }}</th>
                            <th>{{ __('Dernière') }}</th>
                            <th class="text-end">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($errors as $error)
                            <tr class="{{ $error->resolved_at ? 'opacity-50' : '' }}">
                                <td><span class="badge {{ $error->status_code >= 500 ? 'bg-danger' : ($error->status_code >= 400 ? 'bg-warning' : 'bg-info') }}">{{ $error->status_code }}</span></td>
                                <td>
                                    @switch($error->severity)
                                        @case('critical') <span class="badge bg-danger">{{ __('Critique') }}</span> @break
                                        @case('warning') <span class="badge bg-warning">{{ __('Warning') }}</span> @break
                                        @default <span class="badge bg-info">{{ __('Info') }}</span>
                                    @endswitch
                                </td>
                                <td title="{{ $error->message }}">{{ Str::limit($error->message, 60) }}</td>
                                <td><code title="{{ $error->url }}">{{ Str::limit($error->url, 40) }}</code></td>
                                <td><span class="badge bg-secondary">{{ $error->occurrence_count }}</span></td>
                                <td title="{{ $error->last_occurred_at }}">{{ $error->last_occurred_at->diffForHumans() }}</td>
                                <td class="text-end">
                                    <div class="btn-group btn-group-sm">
                                        @if (!$error->resolved_at)
                                            <form action="{{ route('admin.error-monitoring.resolve', $error) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-success" title="{{ __('Résoudre') }}">
                                                    <i data-lucide="check" class="icon-sm"></i>
                                                </button>
                                            </form>
                                        @endif
                                        <form action="{{ route('admin.error-monitoring.destroy', $error) }}" method="POST"
                                              onsubmit="return confirm('{{ __('Supprimer cette erreur ?') }}')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="{{ __('Supprimer') }}">
                                                <i data-lucide="trash-2" class="icon-sm"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">{{ $errors->withQueryString()->links() }}</div>
        @endif
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    new ApexCharts(document.querySelector('#errorsPerDayChart'), {
        chart: { type: 'area', height: 250, toolbar: { show: false } },
        series: [{ name: '{{ __("Erreurs") }}', data: @json($errorsPerDay['data']) }],
        xaxis: { categories: @json($errorsPerDay['labels']) },
        colors: ['#ef4444'],
        stroke: { curve: 'smooth', width: 2 },
        fill: { type: 'gradient', gradient: { opacityFrom: 0.4, opacityTo: 0.1 } },
        dataLabels: { enabled: false }
    }).render();

    new ApexCharts(document.querySelector('#severityChart'), {
        chart: { type: 'donut', height: 250 },
        series: @json($errorsBySeverity['data']),
        labels: @json($errorsBySeverity['labels']),
        colors: ['#ef4444', '#f59e0b', '#3b82f6'],
        legend: { position: 'bottom' }
    }).render();

    new ApexCharts(document.querySelector('#topUrlsChart'), {
        chart: { type: 'bar', height: 250, toolbar: { show: false } },
        series: [{ name: '{{ __("Occurrences") }}', data: @json($topUrls['data']) }],
        xaxis: { categories: @json($topUrls['labels']) },
        colors: ['#6366f1'],
        plotOptions: { bar: { borderRadius: 4, horizontal: true } },
        dataLabels: { enabled: true }
    }).render();
});
</script>
@endpush
