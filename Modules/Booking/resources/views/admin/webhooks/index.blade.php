<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('backoffice::themes.backend.layouts.admin', ['title' => __('Webhooks'), 'subtitle' => __('Réservations')])

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.booking.appointments.index') }}">{{ __('Réservations') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Webhooks') }}</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ __('Webhooks de réservation') }}</h5>
            <a href="{{ route('admin.booking.webhooks.create') }}" class="btn btn-primary btn-sm">
                <i data-lucide="plus-circle" class="me-1"></i> {{ __('Ajouter') }}
            </a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>{{ __('URL') }}</th>
                            <th>{{ __('Événements') }}</th>
                            <th>{{ __('Actif') }}</th>
                            <th>{{ __('Dernier statut') }}</th>
                            <th class="text-end">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($webhooks as $webhook)
                            <tr>
                                <td><span title="{{ $webhook->url }}">{{ Str::limit($webhook->url, 40) }}</span></td>
                                <td>
                                    @foreach($webhook->events as $event)
                                        <span class="badge bg-secondary">{{ $event }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @if($webhook->is_active)
                                        <span class="badge bg-success">{{ __('Actif') }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ __('Inactif') }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($webhook->last_status)
                                        <span class="badge {{ $webhook->last_status >= 200 && $webhook->last_status < 300 ? 'bg-success' : 'bg-danger' }}">{{ $webhook->last_status }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.booking.webhooks.edit', $webhook) }}" class="btn btn-outline-primary" title="{{ __('Modifier') }}" aria-label="{{ __('Modifier') }}">
                                            <i data-lucide="edit-2"></i>
                                        </a>
                                        <form action="{{ route('admin.booking.webhooks.destroy', $webhook) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('Supprimer ce webhook ?') }}')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" title="{{ __('Supprimer') }}" aria-label="{{ __('Supprimer') }}">
                                                <i data-lucide="trash-2"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">{{ __('Aucun webhook configuré') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
