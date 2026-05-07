<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin')
@section('title', __('Gestion des menus'))
@section('content')
<div class="page-content">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="fw-bold mb-0 d-flex align-items-center gap-2"><i data-lucide="menu" class="icon-md text-primary"></i>{{ __('Menus') }}</h4>
        <div class="d-flex align-items-center gap-2">
            <x-backoffice::help-modal id="helpMenuModal" :title="__('Gestion des menus de navigation')" icon="menu" :buttonLabel="__('Aide')">
                @include('menu::admin._help')
            </x-backoffice::help-modal>
            <a href="{{ route('admin.menus.create') }}" class="btn btn-primary">
                <i data-lucide="plus"></i> {{ __('Créer un menu') }}
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @if($menus->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>{{ __('Nom') }}</th>
                            <th>{{ __('Emplacement') }}</th>
                            <th>{{ __('Éléments') }}</th>
                            <th>{{ __('Statut') }}</th>
                            <th class="text-end">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menus as $menu)
                        <tr>
                            <td class="fw-medium">{{ $menu->name }}</td>
                            <td>{{ $locations[$menu->location] ?? $menu->location ?? '—' }}</td>
                            <td>{{ $menu->all_items_count }}</td>
                            <td>
                                @if($menu->is_active)
                                <span class="badge bg-success">{{ __('Actif') }}</span>
                                @else
                                <span class="badge bg-secondary">{{ __('Inactif') }}</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.menus.edit', $menu) }}" class="btn btn-sm btn-outline-primary" title="{{ __('Modifier') }}" aria-label="{{ __('Modifier') }}">
                                    <i data-lucide="edit"></i>
                                </a>
                                <form action="{{ route('admin.menus.destroy', $menu) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('Supprimer ce menu ?') }}');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="{{ __('Supprimer') }}" aria-label="{{ __('Supprimer') }}">
                                        <i data-lucide="trash-2"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-center py-5">
                <i data-lucide="list" class="icon-xl text-muted mb-3"></i>
                <h5 class="text-muted">{{ __('Aucun menu') }}</h5>
                <p class="text-muted mb-4">{{ __('Créez votre premier menu pour gérer la navigation du site.') }}</p>
                <a href="{{ route('admin.menus.create') }}" class="btn btn-primary">
                    <i data-lucide="plus"></i> {{ __('Créer un menu') }}
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
