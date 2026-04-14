<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('backoffice::themes.backend.layouts.admin', ['title' => __('Exceptions de dates'), 'subtitle' => __('Réservations')])

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>{{ __('Exceptions de dates') }}</h4>
    <a href="{{ route('admin.booking.date-overrides.create') }}" class="btn btn-primary">
        <i data-lucide="plus" class="icon-sm me-1"></i> {{ __('Nouvelle exception') }}
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('Date') }}</th>
                        <th>{{ __('Type') }}</th>
                        <th>{{ __('Journée') }}</th>
                        <th>{{ __('Plage horaire') }}</th>
                        <th>{{ __('Raison') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($overrides as $override)
                    <tr>
                        <td>{{ $override->date->format('d/m/Y') }}</td>
                        <td>
                            <span class="badge bg-{{ $override->override_type === 'blocked' ? 'danger' : 'success' }}">
                                {{ $override->override_type === 'blocked' ? __('Bloqué') : __('Disponible') }}
                            </span>
                        </td>
                        <td>{{ $override->all_day ? __('Oui') : __('Non') }}</td>
                        <td>{{ !$override->all_day ? $override->start_time . ' – ' . $override->end_time : '—' }}</td>
                        <td>{{ Str::limit($override->reason, 40) }}</td>
                        <td>
                            <a href="{{ route('admin.booking.date-overrides.edit', $override) }}" class="btn btn-sm btn-outline-primary" aria-label="{{ __('Modifier') }}">
                                <i data-lucide="edit-2" class="icon-sm"></i>
                            </a>
                            <form action="{{ route('admin.booking.date-overrides.destroy', $override) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('{{ __('Supprimer ?') }}')" aria-label="{{ __('Supprimer') }}">
                                    <i data-lucide="trash-2" class="icon-sm"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center text-muted">{{ __('Aucune exception.') }}</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $overrides->links() }}
    </div>
</div>
@endsection
