<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin', ['title' => __('Demandes de droits'), 'subtitle' => __('Vie privée')])

@section('content')

<div class="card">
    <div class="card-header py-3 px-4 border-bottom d-flex align-items-center justify-content-between">
        <h5 class="fw-bold mb-0">
            <i data-lucide="shield" class="icon-sm me-1"></i> {{ __('Demandes de droits') }}
            @if ($overdue_count > 0)
                <span class="badge bg-danger ms-2">{{ $overdue_count }} {{ __('en retard') }}</span>
            @endif
        </h5>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-2">
            <i data-lucide="arrow-left" class="icon-sm"></i> {{ __('Retour') }}
        </a>
    </div>
    <div class="p-4">
        <form method="GET" action="{{ route('admin.privacy.rights-requests.index') }}" class="mb-4">
            <div class="row g-2 align-items-end">
                <div class="col-auto">
                    <label for="status" class="form-label small fw-semibold">{{ __('Statut') }}</label>
                    <select name="status" id="status" class="form-select form-select-sm">
                        <option value="">{{ __('Tous') }}</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>{{ __('En attente') }}</option>
                        <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>{{ __('En cours') }}</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>{{ __('Terminé') }}</option>
                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>{{ __('Rejeté') }}</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-sm btn-primary">{{ __('Filtrer') }}</button>
                    @if (request('status'))
                        <a href="{{ route('admin.privacy.rights-requests.index') }}" class="btn btn-sm btn-outline-secondary">{{ __('Réinitialiser') }}</a>
                    @endif
                </div>
            </div>
        </form>

        @if ($rightsRequests->isEmpty())
            <div class="text-center text-muted py-5">
                <i data-lucide="inbox" style="width:48px;height:48px" class="mb-3 d-block mx-auto"></i>
                <p>{{ __('Aucune demande de droit trouvée.') }}</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>{{ __('Référence') }}</th>
                            <th>{{ __('Type') }}</th>
                            <th>{{ __('Nom') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Statut') }}</th>
                            <th>{{ __('Échéance') }}</th>
                            <th>{{ __('Soumise') }}</th>
                            <th class="text-end">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rightsRequests as $rr)
                            <tr>
                                <td><code>{{ $rr->reference }}</code></td>
                                <td><span class="badge bg-secondary">{{ __($rr->request_type) }}</span></td>
                                <td>{{ $rr->name }}</td>
                                <td>{{ $rr->email }}</td>
                                <td>
                                    @switch($rr->status)
                                        @case('pending') <span class="badge bg-warning">{{ __('En attente') }}</span> @break
                                        @case('processing') <span class="badge bg-info">{{ __('En cours') }}</span> @break
                                        @case('completed') <span class="badge bg-success">{{ __('Terminé') }}</span> @break
                                        @case('rejected') <span class="badge bg-danger">{{ __('Rejeté') }}</span> @break
                                    @endswitch
                                </td>
                                <td>
                                    @if ($rr->deadline_at)
                                        <span class="{{ $rr->deadline_at->lt(now()) ? 'text-danger fw-bold' : '' }}" title="{{ $rr->deadline_at->format('d/m/Y H:i') }}">
                                            {{ $rr->deadline_at->format('d/m/Y') }}
                                        </span>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td title="{{ $rr->created_at->format('d/m/Y H:i') }}">{{ $rr->created_at->diffForHumans() }}</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.privacy.rights-requests.show', $rr) }}" class="btn btn-sm btn-outline-primary">
                                        <i data-lucide="eye" class="icon-sm"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $rightsRequests->withQueryString()->links() }}
            </div>
        @endif
    </div>
</div>

@endsection
