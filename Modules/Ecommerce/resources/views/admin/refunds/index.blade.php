<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin', ['title' => __('Remboursements'), 'subtitle' => __('Boutique')])

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">{{ __('Demandes de remboursement') }}</h6>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Commande') }}</th>
                                <th>{{ __('Client') }}</th>
                                <th>{{ __('Montant') }}</th>
                                <th>{{ __('Raison') }}</th>
                                <th>{{ __('Statut') }}</th>
                                <th>{{ __('Date') }}</th>
                                <th class="text-end">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($refunds as $refund)
                            <tr>
                                <td>{{ $refund->id }}</td>
                                <td>
                                    <a href="{{ route('admin.ecommerce.orders.show', $refund->order_id) }}">
                                        {{ $refund->order->order_number ?? '-' }}
                                    </a>
                                </td>
                                <td>{{ $refund->user->name ?? '-' }}</td>
                                <td>{{ number_format($refund->amount, 2) }} $</td>
                                <td class="text-truncate" style="max-width:200px;">{{ $refund->reason ?? '-' }}</td>
                                <td>
                                    @switch($refund->status)
                                        @case('pending')
                                            <span class="badge bg-warning text-dark">{{ __('En attente') }}</span>
                                            @break
                                        @case('approved')
                                            <span class="badge bg-success">{{ __('Approuvé') }}</span>
                                            @break
                                        @case('rejected')
                                            <span class="badge bg-danger">{{ __('Refusé') }}</span>
                                            @break
                                        @default
                                            <span class="badge bg-secondary">{{ $refund->status }}</span>
                                    @endswitch
                                </td>
                                <td>{{ $refund->created_at->format('Y-m-d H:i') }}</td>
                                <td class="text-end">
                                    @if($refund->status === 'pending')
                                    <div class="d-flex justify-content-end gap-2">
                                        <form action="{{ route('admin.ecommerce.refunds.approve', $refund) }}" method="POST" onsubmit="return confirm('{{ __('Approuver ce remboursement ?') }}');">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-outline-success btn-icon" title="{{ __('Approuver') }}" aria-label="{{ __('Approuver') }}">
                                                <i data-lucide="check"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.ecommerce.refunds.reject', $refund) }}" method="POST" onsubmit="return confirm('{{ __('Refuser ce remboursement ?') }}');">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-outline-danger btn-icon" title="{{ __('Refuser') }}" aria-label="{{ __('Refuser') }}">
                                                <i data-lucide="x"></i>
                                            </button>
                                        </form>
                                    </div>
                                    @else
                                        <span class="text-muted small">{{ $refund->processed_at?->format('Y-m-d') }}</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">{{ __('Aucune demande de remboursement.') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $refunds->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
