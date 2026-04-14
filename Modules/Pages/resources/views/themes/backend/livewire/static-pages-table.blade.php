<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
<div>
    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="alert alert-success d-flex align-items-center gap-2 mb-4">
            <i data-lucide="check-circle" class="icon-sm"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- Filtres et recherche --}}
    <div class="d-flex flex-wrap align-items-center gap-3 mb-4">
        <div class="input-group flex-grow-1" style="min-width:200px;">
            <span class="input-group-text"><i data-lucide="search" class="icon-sm"></i></span>
            <input type="text" wire:model.live.debounce.300ms="search"
                   class="form-control"
                   placeholder="{{ __('Rechercher une page...') }}">
        </div>
        <select wire:model.live="filterStatus" class="form-select" style="width:auto;max-width:180px;">
            <option value="">{{ __('Tous les statuts') }}</option>
            <option value="published">{{ __('Publiés') }}</option>
            <option value="draft">{{ __('Brouillons') }}</option>
        </select>
        @if($filterStatus || $search)
            <button wire:click="resetFilters" class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-2">
                <i data-lucide="x" class="icon-sm"></i> {{ __('Réinitialiser') }}
            </button>
        @endif
    </div>

    {{-- Table --}}
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="py-3 px-4 fw-semibold text-body cursor-pointer select-none" wire:click="sort('title')">
                        <span class="d-flex align-items-center gap-2">
                            {{ __('Titre') }}
                            @if($sortBy === 'title')
                                @if($sortDirection === 'asc')
                                    <i data-lucide="arrow-up" class="icon-sm text-primary"></i>
                                @else
                                    <i data-lucide="arrow-down" class="icon-sm text-primary"></i>
                                @endif
                            @else
                                <i data-lucide="arrows-up-down" class="icon-sm text-muted"></i>
                            @endif
                        </span>
                    </th>
                    <th class="py-3 px-4 fw-semibold text-body">{{ __('Slug') }}</th>
                    <th class="py-3 px-4 fw-semibold text-body">{{ __('Statut') }}</th>
                    <th class="py-3 px-4 fw-semibold text-body cursor-pointer select-none" wire:click="sort('created_at')">
                        <span class="d-flex align-items-center gap-2">
                            {{ __('Date') }}
                            @if($sortBy === 'created_at')
                                @if($sortDirection === 'asc')
                                    <i data-lucide="arrow-up" class="icon-sm text-primary"></i>
                                @else
                                    <i data-lucide="arrow-down" class="icon-sm text-primary"></i>
                                @endif
                            @else
                                <i data-lucide="arrows-up-down" class="icon-sm text-muted"></i>
                            @endif
                        </span>
                    </th>
                    <th class="py-3 px-4 fw-semibold text-body text-center">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pages as $page)
                    <tr>
                        <td class="py-3 px-4 fw-semibold text-body">{{ $page->title }}</td>
                        <td class="py-3 px-4">
                            <code>{{ $page->slug }}</code>
                        </td>
                        <td class="py-3 px-4">
                            @if($page->status === 'published')
                                <span class="badge bg-success">{{ __('Publié') }}</span>
                            @else
                                <span class="badge bg-warning text-dark">{{ __('Brouillon') }}</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-muted">{{ $page->created_at->format('d/m/Y') }}</td>
                        <td class="py-3 px-4">
                            <div class="d-flex align-items-center justify-content-center gap-2">
                                <a href="{{ route('pages.show', $page->slug) }}" target="_blank"
                                   class="btn btn-sm btn-outline-secondary"
                                   title="{{ __('Voir public') }}">
                                    <i data-lucide="eye" class="icon-sm"></i>
                                </a>
                                <a href="{{ route('admin.pages.edit', $page->slug) }}"
                                   class="btn btn-sm btn-outline-secondary"
                                   title="{{ __('Modifier') }}">
                                    <i data-lucide="pencil" class="icon-sm"></i>
                                </a>
                                <button wire:click="deletePage({{ $page->id }})"
                                        wire:confirm="{{ __('Confirmer la suppression ?') }}"
                                        class="btn btn-sm btn-outline-danger"
                                        title="{{ __('Supprimer') }}">
                                    <i data-lucide="trash-2" class="icon-sm"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-5 text-center text-muted">{{ __('Aucune page trouvée') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($pages->hasPages())
        <div class="mt-4">{{ $pages->links() }}</div>
    @endif
</div>
