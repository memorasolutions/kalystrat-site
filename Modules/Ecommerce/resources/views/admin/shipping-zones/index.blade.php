<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin', ['title' => __('Zones de livraison'), 'subtitle' => __('Boutique')])

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="card-title mb-0">{{ __('Liste des zones') }}</h6>
                    <a href="{{ route('admin.ecommerce.shipping-zones.create') }}" class="btn btn-primary btn-icon-text">
                        <i class="btn-icon-prepend" data-lucide="plus"></i>
                        {{ __('Ajouter') }}
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>{{ __('Nom') }}</th>
                                <th>{{ __('Régions') }}</th>
                                <th>{{ __('Méthodes') }}</th>
                                <th>{{ __('Statut') }}</th>
                                <th class="text-end">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($zones as $zone)
                            <tr>
                                <td>{{ $zone->name }}</td>
                                <td>
                                    @foreach($zone->regions ?? [] as $region)
                                        <span class="badge bg-secondary">{{ $region }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <span class="badge bg-info text-dark">{{ $zone->methods_count }}</span>
                                </td>
                                <td>
                                    @if($zone->is_active)
                                        <span class="badge bg-success">{{ __('Active') }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ __('Inactive') }}</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('admin.ecommerce.shipping-zones.edit', $zone) }}" class="btn btn-sm btn-outline-primary btn-icon" title="{{ __('Modifier') }}" aria-label="{{ __('Modifier') }}">
                                            <i data-lucide="edit"></i>
                                        </a>
                                        <form action="{{ route('admin.ecommerce.shipping-zones.destroy', $zone) }}" method="POST" class="d-inline-block" onsubmit="return confirm('{{ __('Supprimer cette zone ?') }}');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger btn-icon" title="{{ __('Supprimer') }}" aria-label="{{ __('Supprimer') }}">
                                                <i data-lucide="trash-2"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">{{ __('Aucune zone de livraison.') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $zones->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
