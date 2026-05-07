<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin')

@section('breadcrumbs')
@endsection

@section('title', __('Annonces'))

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0 d-flex align-items-center gap-2"><i data-lucide="megaphone" class="icon-md text-primary"></i>{{ __('Annonces et changelog') }}</h4>
        <div class="d-flex align-items-center gap-2">
            <x-backoffice::help-modal id="helpAnnouncementsModal" :title="__('Annonces et bannières backoffice')" icon="megaphone" :buttonLabel="__('Aide')">
                @include('core::admin.announcements._help')
            </x-backoffice::help-modal>
            <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary">
                <i data-lucide="plus" class="icon-sm me-1"></i> {{ __('Ajouter') }}
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('Fermer') }}"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.announcements.index') }}" class="row g-3 mb-4">
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text"><i data-lucide="search" class="icon-sm"></i></span>
                        <input type="text" name="search" class="form-control" placeholder="{{ __('Rechercher...') }}"
                               value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <select name="type" class="form-select">
                        <option value="">{{ __('Tous les types') }}</option>
                        <option value="feature" {{ request('type') == 'feature' ? 'selected' : '' }}>{{ __('Nouveauté') }}</option>
                        <option value="improvement" {{ request('type') == 'improvement' ? 'selected' : '' }}>{{ __('Amélioration') }}</option>
                        <option value="fix" {{ request('type') == 'fix' ? 'selected' : '' }}>{{ __('Correctif') }}</option>
                        <option value="announcement" {{ request('type') == 'announcement' ? 'selected' : '' }}>{{ __('Annonce') }}</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-outline-primary w-100">{{ __('Filtrer') }}</button>
                </div>
            </form>

            @if($announcements->isEmpty())
                <div class="text-center py-5">
                    <i data-lucide="megaphone" style="width:48px;height:48px" class="text-muted mb-3 d-block mx-auto"></i>
                    <h5 class="text-muted">{{ __('Aucune annonce.') }}</h5>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>{{ __('Titre') }}</th>
                                <th>{{ __('Type') }}</th>
                                <th>{{ __('Version') }}</th>
                                <th>{{ __('Statut') }}</th>
                                <th>{{ __('Date') }}</th>
                                <th class="text-end">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($announcements as $announcement)
                                <tr>
                                    <td>{{ $announcement->title }}</td>
                                    <td><span class="badge {{ $announcement->typeBadgeClass() }}">{{ $announcement->typeLabel() }}</span></td>
                                    <td>{{ $announcement->version ?: '-' }}</td>
                                    <td>
                                        <span class="badge {{ $announcement->is_published ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $announcement->is_published ? __('Publié') : __('Brouillon') }}
                                        </span>
                                    </td>
                                    <td>{{ $announcement->created_at->format('d/m/Y') }}</td>
                                    <td class="text-end">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.announcements.edit', $announcement) }}" class="btn btn-outline-primary">
                                                <i data-lucide="pencil" class="icon-xs"></i>
                                            </a>
                                            <form action="{{ route('admin.announcements.destroy', $announcement) }}"
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('{{ __("Supprimer cette annonce ?") }}')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                                    <i data-lucide="trash-2" class="icon-xs"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">{{ $announcements->links() }}</div>
            @endif
        </div>
    </div>
@endsection
