<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('backoffice::themes.backend.layouts.admin', ['title' => __('Coupons'), 'subtitle' => __('Réservations')])

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>{{ __('Coupons') }}</h4>
    <a href="{{ route('admin.booking.coupons.create') }}" class="btn btn-primary">
        <i data-lucide="plus" class="icon-sm me-1"></i> {{ __('Nouveau coupon') }}
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('Code') }}</th>
                        <th>{{ __('Type') }}</th>
                        <th>{{ __('Valeur') }}</th>
                        <th>{{ __('Utilisations') }}</th>
                        <th>{{ __('Statut') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($coupons as $coupon)
                    <tr>
                        <td><code>{{ $coupon->code }}</code></td>
                        <td>
                            @if($coupon->type === 'percent')
                            <span class="badge bg-info">{{ __('Pourcentage') }}</span>
                            @else
                            <span class="badge bg-warning">{{ __('Montant fixe') }}</span>
                            @endif
                        </td>
                        <td>
                            @if($coupon->type === 'percent')
                                {{ $coupon->value }}%
                            @else
                                {{ number_format($coupon->value, 2) }} $
                            @endif
                        </td>
                        <td>{{ $coupon->times_used }}/{{ $coupon->max_uses ?? '&infin;' }}</td>
                        <td>
                            <span class="badge bg-{{ $coupon->is_active ? 'success' : 'secondary' }}">
                                {{ $coupon->is_active ? __('Actif') : __('Inactif') }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.booking.coupons.edit', $coupon) }}" class="btn btn-sm btn-outline-primary" aria-label="{{ __('Modifier') }}">
                                <i data-lucide="edit-2" class="icon-sm"></i>
                            </a>
                            <form action="{{ route('admin.booking.coupons.destroy', $coupon) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('{{ __('Supprimer ce coupon ?') }}')" aria-label="{{ __('Supprimer') }}">
                                    <i data-lucide="trash-2" class="icon-sm"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center text-muted">{{ __('Aucun coupon configuré.') }}</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
