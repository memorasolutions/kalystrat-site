<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin', ['title' => __('Forfaits'), 'subtitle' => __('Réservations')])

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>{{ __('Forfaits') }}</h4>
    <a href="{{ route('admin.booking.packages.create') }}" class="btn btn-primary">
        <i data-lucide="plus" class="icon-sm me-1"></i> {{ __('Nouveau forfait') }}
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('Nom') }}</th>
                        <th>{{ __('Séances') }}</th>
                        <th>{{ __('Prix') }}</th>
                        <th>{{ __('Prix régulier') }}</th>
                        <th>{{ __('Validité') }}</th>
                        <th>{{ __('Statut') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($packages as $package)
                    <tr>
                        <td>{{ $package->name }}</td>
                        <td>{{ $package->session_count }}</td>
                        <td>{{ number_format($package->price, 2) }} $</td>
                        <td>{{ $package->regular_price ? number_format($package->regular_price, 2) . ' $' : '—' }}</td>
                        <td>{{ $package->validity_days }} jours</td>
                        <td>
                            <span class="badge bg-{{ $package->is_active ? 'success' : 'secondary' }}">
                                {{ $package->is_active ? __('Actif') : __('Inactif') }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.booking.packages.edit', $package) }}" class="btn btn-sm btn-outline-primary" aria-label="{{ __('Modifier') }}">
                                <i data-lucide="edit-2" class="icon-sm"></i>
                            </a>
                            <form action="{{ route('admin.booking.packages.destroy', $package) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('{{ __('Supprimer ce forfait ?') }}')" aria-label="{{ __('Supprimer') }}">
                                    <i data-lucide="trash-2" class="icon-sm"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center text-muted">{{ __('Aucun forfait configuré.') }}</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
