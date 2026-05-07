<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin', ['title' => __('Tableau de bord'), 'subtitle' => __('Administration')])

@section('content')
<x-backoffice::driver-tour
    storage-key="driver_tour_dashboard_{{ auth()->id() }}"
    :steps="[
        ['element' => '#dashboard-stats', 'popover' => ['title' => __('Statistiques clés'), 'description' => __('Vue rapide des métriques importantes : utilisateurs, articles, pages et modules actifs.'), 'side' => 'bottom']],
        ['element' => '#usersRegistrationChart', 'popover' => ['title' => __('Graphique d\'inscription'), 'description' => __('Évolution des inscriptions utilisateurs sur les 12 derniers mois.'), 'side' => 'bottom']],
        ['element' => '#dashboard-activity', 'popover' => ['title' => __('Activité récente'), 'description' => __('Consultez les dernières actions effectuées sur la plateforme.'), 'side' => 'bottom']],
        ['element' => '#dashboard-quick-actions', 'popover' => ['title' => __('Actions rapides'), 'description' => __('Raccourcis vers les opérations les plus fréquentes.'), 'side' => 'left']],
        ['element' => '#dashboard-system-info', 'popover' => ['title' => __('Informations système'), 'description' => __('Version Laravel, PHP, environnement et modules actifs.'), 'side' => 'top']],
        ['element' => 'nav.sidebar', 'popover' => ['title' => __('Menu principal'), 'description' => __('Naviguez entre les différents modules via la barre latérale.'), 'side' => 'right']],
    ]"
/>

<div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
    <h1 class="fw-semibold fs-5 mb-0">{{ __('Tableau de bord') }}</h1>
    <div class="d-flex align-items-center gap-3 flex-wrap">
        <button id="restartTour" class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-1" title="{{ __('Visite guidée') }}">
            <i data-lucide="compass" class="icon-sm"></i> {{ __('Visite guidée') }}
        </button>
        <x-backoffice::help-modal id="helpDashboardModal" :title="__('Tableau de bord')" icon="layout-dashboard" :buttonLabel="__('Aide')">
            @include('backoffice::themes.backend.dashboard._help')
        </x-backoffice::help-modal>
        <nav aria-label="Fil d'Ariane">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Administration') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Tableau de bord') }}</li>
            </ol>
        </nav>
    </div>
</div>

{{-- Module metrics (grouped by provider, hidden if all values are zero) --}}
@if(!empty($metricGroups))
@foreach($metricGroups as $groupName => $widgets)
<div class="mb-3">
    <h6 class="text-muted text-uppercase small fw-semibold mb-2" style="letter-spacing:.5px;">{{ $groupName }}</h6>
    <div class="row g-2">
        @foreach($widgets as $widget)
        <div class="col-xl-3 col-lg-4 col-md-6">
            @if($widget->route)
            <a href="{{ $widget->route }}" class="card shadow-none border p-3 text-decoration-none h-100">
            @else
            <div class="card shadow-none border p-3 h-100">
            @endif
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-3">
                        @if($widget->icon)
                        <i data-lucide="{{ $widget->icon }}" class="text-primary" style="width:28px;height:28px;"></i>
                        @endif
                    </div>
                    <div>
                        <div class="text-muted small">{{ $widget->name }}</div>
                        <div class="fw-bold fs-5">{{ $widget->value }}</div>
                        @if($widget->change)
                        <span class="badge {{ str_starts_with($widget->change, '+') ? 'bg-success' : 'bg-danger' }} bg-opacity-10 {{ str_starts_with($widget->change, '+') ? 'text-success' : 'text-danger' }} small">{{ $widget->change }}</span>
                        @endif
                    </div>
                </div>
            @if($widget->route)
            </a>
            @else
            </div>
            @endif
        </div>
        @endforeach
    </div>
</div>
@endforeach
@endif

{{-- Stat cards style Tabler navbar-overlap : Welcome + 2 cards stats avec sparklines + gauge donut --}}
@php
    $usersTotal = \App\Models\User::count();
    $usersNew = \App\Models\User::where('created_at', '>=', now()->subDays(30))->count();
    $articlesTotal = class_exists(\Modules\Blog\Models\Article::class) ? \Modules\Blog\Models\Article::count() : 0;
    $articlesPublished = class_exists(\Modules\Blog\Models\Article::class) ? \Modules\Blog\Models\Article::where('status', 'published')->count() : 0;
    $pagesTotal = class_exists(\Modules\Pages\Models\StaticPage::class) ? \Modules\Pages\Models\StaticPage::count() : 0;
    $pagesPublished = class_exists(\Modules\Pages\Models\StaticPage::class) ? \Modules\Pages\Models\StaticPage::where('status', 'published')->count() : 0;
    $modulesActive = count(\Nwidart\Modules\Facades\Module::allEnabled());
    $modulesTotal = count(\Nwidart\Modules\Facades\Module::all());
    $modulesPercent = $modulesTotal > 0 ? round(($modulesActive / $modulesTotal) * 100) : 0;
    $welcomeRatio = $usersTotal > 0 ? min(100, round(($usersNew / max($usersTotal, 1)) * 100)) : 0;
    $articleRatio = $articlesTotal > 0 ? min(100, round(($articlesPublished / max($articlesTotal, 1)) * 100)) : 0;
@endphp

<div class="row row-deck row-cards mb-3" id="dashboard-stats">
    {{-- Welcome card --}}
    <div class="col-sm-12 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-12 col-sm d-flex flex-column">
                        <h3 class="h2">{{ __('Bonjour') }}, {{ auth()->user()->name }}</h3>
                        <p class="text-muted">{{ __('Vue rapide de votre tableau de bord Kalystrat.') }}</p>
                        <div class="row g-5 mt-auto">
                            <div class="col-auto">
                                <div class="subheader">{{ __('Nouveaux utilisateurs') }}</div>
                                <div class="d-flex align-items-baseline">
                                    <div class="h3 me-2">+{{ $usersNew }}</div>
                                    <div class="me-auto">
                                        <span class="text-green d-inline-flex align-items-center lh-1">
                                            <i class="ti ti-trending-up icon ms-1 icon-2"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success" style="width: {{ max(5, $welcomeRatio) }}%" role="progressbar" aria-valuenow="{{ $welcomeRatio }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="subheader">{{ __('Articles publiés') }}</div>
                                <div class="d-flex align-items-baseline">
                                    <div class="h3 me-2">{{ $articlesPublished }}</div>
                                    <div class="me-auto">
                                        <span class="text-blue d-inline-flex align-items-center lh-1">
                                            <i class="ti ti-trending-up icon ms-1 icon-2"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: {{ max(5, $articleRatio) }}%" role="progressbar" aria-valuenow="{{ $articleRatio }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-auto d-flex justify-content-center align-items-center">
                        <i class="ti ti-building-skyscraper" style="font-size: 8rem; color: var(--tblr-primary); opacity: 0.9;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Card Total utilisateurs avec sparkline --}}
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="subheader">{{ __('Total utilisateurs') }}</div>
                <div class="h1 mb-3">{{ $usersTotal }}</div>
                <div id="kalystrat-sparkline-users" style="height: 40px;"></div>
                <small class="text-muted">{{ __('Tendance 12 derniers mois') }}</small>
            </div>
        </div>
    </div>

    {{-- Card Modules actifs avec gauge donut --}}
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body text-center">
                <div class="subheader mb-3">{{ __('Modules actifs') }}</div>
                <div id="kalystrat-gauge-modules" style="height: 130px;"></div>
                <div class="h3 mb-0 mt-2">{{ $modulesActive }} / {{ $modulesTotal }}</div>
            </div>
        </div>
    </div>
</div>

{{-- 4 mini-cards horizontales style Tabler --}}
<div class="row row-cards mb-3">
    <div class="col-6 col-sm-4 col-md-3">
        <div class="card card-sm">
            <div class="card-body d-flex align-items-center">
                <span class="bg-primary text-white avatar me-3"><i class="ti ti-file-text"></i></span>
                <div>
                    <div class="font-weight-medium">{{ $articlesTotal }} {{ __('Articles') }}</div>
                    <div class="text-muted">{{ $articlesPublished }} {{ __('publiés') }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-sm-4 col-md-3">
        <div class="card card-sm">
            <div class="card-body d-flex align-items-center">
                <span class="bg-success text-white avatar me-3"><i class="ti ti-layout"></i></span>
                <div>
                    <div class="font-weight-medium">{{ $pagesTotal }} {{ __('Pages') }}</div>
                    <div class="text-muted">{{ $pagesPublished }} {{ __('publiées') }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-sm-4 col-md-3">
        <div class="card card-sm">
            <div class="card-body d-flex align-items-center">
                <span class="bg-yellow text-white avatar me-3"><i class="ti ti-users"></i></span>
                <div>
                    <div class="font-weight-medium">{{ $usersTotal }} {{ __('Membres') }}</div>
                    <div class="text-muted">+{{ $usersNew }} {{ __('ce mois') }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-sm-4 col-md-3">
        <div class="card card-sm">
            <div class="card-body d-flex align-items-center">
                <span class="bg-purple text-white avatar me-3"><i class="ti ti-stack-2"></i></span>
                <div>
                    <div class="font-weight-medium">{{ $modulesActive }} {{ __('Modules') }}</div>
                    <div class="text-muted">{{ $modulesPercent }}% {{ __('actifs') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Chart: user registrations --}}
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                    <h6 class="card-title mb-0">{{ __('Inscriptions utilisateurs') }}</h6>
                </div>
                <p class="text-secondary fs-13px mb-3 mb-md-0">{{ __('Évolution des inscriptions sur les 12 derniers mois.') }}</p>
                <div id="usersRegistrationChart"></div>
            </div>
        </div>
    </div>
</div>

{{-- Recent activity + Quick actions --}}
<div class="row">
    <div class="col-lg-7 col-xl-8 grid-margin stretch-card" id="dashboard-activity">
        <div class="card">
            <div class="card-header py-3 px-4 border-bottom d-flex align-items-center gap-2">
                <i data-lucide="activity" class="text-primary icon-md"></i>
                <h6 class="card-title mb-0">{{ __('Activité récente') }}</h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th class="py-3 px-4 fw-semibold text-body">{{ __('Utilisateur') }}</th>
                                <th class="py-3 px-4 fw-semibold text-body">{{ __('Action') }}</th>
                                <th class="py-3 px-4 fw-semibold text-body d-none d-sm-table-cell">{{ __('Date') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(\Spatie\Activitylog\Models\Activity::latest()->limit(8)->get() as $log)
                            <tr>
                                <td class="py-3 px-4 small">{{ $log->causer?->name ?? __('Système') }}</td>
                                <td class="py-3 px-4"><span class="badge bg-primary bg-opacity-10 text-primary">{{ $log->description }}</span></td>
                                <td class="py-3 px-4 text-muted small d-none d-sm-table-cell">{{ $log->created_at->diffForHumans() }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-4">{{ __('Aucune activité récente') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-xl-4 grid-margin stretch-card" id="dashboard-quick-actions">
        <div class="card">
            <div class="card-header py-3 px-4 border-bottom d-flex align-items-center gap-2">
                <i data-lucide="zap" class="text-warning icon-md"></i>
                <h6 class="card-title mb-0">{{ __('Actions rapides') }}</h6>
            </div>
            <div class="card-body p-4">
                <div class="d-grid gap-2">
                    @can('create_users')
                    <a href="{{ route('admin.users.create') }}" class="btn btn-outline-primary btn-sm d-flex align-items-center gap-2">
                        <i data-lucide="user-plus" class="icon-sm"></i> {{ __('Nouvel utilisateur') }}
                    </a>
                    @endcan
                    @if(Route::has('admin.blog.articles.create'))
                    <a href="{{ route('admin.blog.articles.create') }}" class="btn btn-outline-primary btn-sm d-flex align-items-center gap-2">
                        <i data-lucide="file-plus" class="icon-sm"></i> {{ __('Nouvel article') }}
                    </a>
                    @endif
                    @if(Route::has('admin.pages.create'))
                    <a href="{{ route('admin.pages.create') }}" class="btn btn-outline-primary btn-sm d-flex align-items-center gap-2">
                        <i data-lucide="layout" class="icon-sm"></i> {{ __('Nouvelle page') }}
                    </a>
                    @endif
                    @can('view_settings')
                    <a href="{{ route('admin.settings.index') }}" class="btn btn-outline-secondary btn-sm d-flex align-items-center gap-2">
                        <i data-lucide="settings" class="icon-sm"></i> {{ __('Paramètres') }}
                    </a>
                    @endcan
                    @can('view_health')
                    <a href="{{ route('admin.health') }}" class="btn btn-outline-secondary btn-sm d-flex align-items-center gap-2">
                        <i data-lucide="activity" class="icon-sm"></i> {{ __('Santé système') }}
                    </a>
                    @endcan
                    @can('view_backups')
                    @if(Route::has('admin.backups.index'))
                    <a href="{{ route('admin.backups.index') }}" class="btn btn-outline-secondary btn-sm d-flex align-items-center gap-2">
                        <i data-lucide="hard-drive" class="icon-sm"></i> {{ __('Sauvegardes') }}
                    </a>
                    @endif
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>

{{-- System info --}}
<div class="row">
    <div class="col-12" id="dashboard-system-info">
        <div class="card">
            <div class="card-header py-3 px-4 border-bottom d-flex align-items-center gap-2">
                <i data-lucide="server" class="text-secondary icon-md"></i>
                <h6 class="card-title mb-0">{{ __('Informations système') }}</h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <tbody>
                            <tr><td class="py-3 px-4 fw-medium">Laravel</td><td class="py-3 px-4">v{{ app()->version() }}</td></tr>
                            <tr><td class="py-3 px-4 fw-medium">PHP</td><td class="py-3 px-4">v{{ phpversion() }}</td></tr>
                            <tr><td class="py-3 px-4 fw-medium">{{ __('Environnement') }}</td><td class="py-3 px-4"><span class="badge {{ app()->environment('production') ? 'bg-danger' : 'bg-success' }}">{{ app()->environment() }}</span></td></tr>
                            <tr><td class="py-3 px-4 fw-medium">{{ __('Modules actifs') }}</td><td class="py-3 px-4">{{ count(\Nwidart\Modules\Facades\Module::allEnabled()) }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('plugin-scripts')
<script src="{{ asset('build/nobleui/plugins/apexcharts/apexcharts.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var chartData = @json($usersByMonth ?? []);
    if (!chartData.length) return;

    var options = {
        series: [{ name: @json(__('Inscriptions')), data: chartData.map(function(i) { return i.count; }) }],
        chart: { height: 300, type: 'area', toolbar: { show: false }, fontFamily: 'Roboto, sans-serif' },
        colors: ['var(--bs-primary, #6571ff)'],
        dataLabels: { enabled: false },
        stroke: { curve: 'smooth', width: 2 },
        fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.4, opacityTo: 0, stops: [0, 90, 100] } },
        xaxis: { categories: chartData.map(function(i) { return i.label; }), labels: { style: { colors: '#6c757d', fontSize: '11px' } } },
        yaxis: { labels: { style: { colors: '#6c757d', fontSize: '11px' } } },
        grid: { borderColor: 'var(--bs-border-color, #e9ecef)', strokeDashArray: 4 },
        tooltip: { theme: document.documentElement.getAttribute('data-bs-theme') === 'dark' ? 'dark' : 'light' }
    };
    new ApexCharts(document.querySelector('#usersRegistrationChart'), options).render();

    // Sparkline mini-chart "Total utilisateurs" (style Tabler officiel)
    var sparklineEl = document.getElementById('kalystrat-sparkline-users');
    if (sparklineEl) {
        var sparklineData = chartData.length ? chartData.map(function(i) { return i.count; }) : [0,0,0,0,0,0,0];
        new ApexCharts(sparklineEl, {
            chart: { type: 'line', fontFamily: 'inherit', height: 40, sparkline: { enabled: true }, animations: { enabled: false } },
            tooltip: { enabled: false },
            stroke: { width: 2, lineCap: 'round' },
            series: [{ color: 'var(--tblr-primary)', data: sparklineData }],
        }).render();
    }

    // Gauge donut "Modules actifs" (style Tabler officiel)
    var gaugeEl = document.getElementById('kalystrat-gauge-modules');
    if (gaugeEl) {
        new ApexCharts(gaugeEl, {
            chart: { type: 'radialBar', height: 130, sparkline: { enabled: true } },
            plotOptions: {
                radialBar: {
                    hollow: { size: '60%' },
                    dataLabels: {
                        name: { show: false },
                        value: { show: true, fontSize: '1.5rem', fontWeight: 600, formatter: function(v) { return Math.round(v) + '%'; } }
                    }
                }
            },
            series: [{{ $modulesPercent ?? 0 }}],
            colors: ['var(--tblr-primary)'],
            stroke: { lineCap: 'round' },
        }).render();
    }
});
</script>
@endpush
