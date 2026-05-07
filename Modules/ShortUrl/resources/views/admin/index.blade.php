<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin', ['title' => __('Liens courts'), 'subtitle' => __('Gestion des URLs raccourcies')])

@section('breadcrumbs')
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0 fw-bold d-flex align-items-center gap-2"><i data-lucide="link" class="icon-md text-primary"></i>{{ __('Liens courts') }}</h4>
    <div class="d-flex align-items-center gap-2">
        <x-backoffice::help-modal id="helpShortUrlModal" :title="__('Liens courts – comment ça marche ?')" icon="link" :buttonLabel="__('Aide')">
            @include('shorturl::admin._help')
        </x-backoffice::help-modal>
        <a href="{{ route('admin.short-urls.create') }}" class="btn btn-primary">
            <i data-lucide="plus" style="width:16px;height:16px;" class="me-1"></i>
            {{ __('Créer un lien') }}
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        @if($shortUrls->isEmpty())
            <div class="text-center py-5">
                <i data-lucide="link" style="width:48px;height:48px;color:#adb5bd;" class="mb-3"></i>
                <p class="text-muted mb-3">{{ __('Aucun lien court pour le moment.') }}</p>
                <a href="{{ route('admin.short-urls.create') }}" class="btn btn-primary btn-sm">{{ __('Créer votre premier lien') }}</a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>{{ __('Lien court') }}</th>
                            <th>{{ __('URL originale') }}</th>
                            <th>{{ __('Titre') }}</th>
                            <th class="text-center">{{ __('Clics') }}</th>
                            <th class="text-center">{{ __('Statut') }}</th>
                            <th>{{ __('Créé le') }}</th>
                            <th class="text-end">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($shortUrls as $shortUrl)
                        <tr>
                            <td>
                                <code class="text-primary">/s/{{ $shortUrl->slug }}</code>
                                <button type="button" class="btn btn-link btn-sm p-0 ms-1" title="{{ __('Copier le lien') }}"
                                        aria-label="Copier le lien court"
                                        onclick="navigator.clipboard.writeText('{{ url('/s/' . $shortUrl->slug) }}');this.innerHTML='<i data-lucide=&quot;check&quot; style=&quot;width:14px;height:14px;&quot;></i>';setTimeout(()=>{this.innerHTML='<i data-lucide=&quot;copy&quot; style=&quot;width:14px;height:14px;&quot;></i>';lucide.createIcons()},1500);lucide.createIcons();">
                                    <i data-lucide="copy" style="width:14px;height:14px;"></i>
                                </button>
                            </td>
                            <td>
                                <a href="{{ $shortUrl->original_url }}" target="_blank" rel="noopener" class="text-decoration-none" title="{{ $shortUrl->original_url }}">
                                    {{ Str::limit($shortUrl->original_url, 50) }}
                                </a>
                            </td>
                            <td>{{ $shortUrl->title ?? '-' }}</td>
                            <td class="text-center fw-semibold">{{ number_format($shortUrl->clicks_count) }}</td>
                            <td class="text-center">
                                @if($shortUrl->is_active)
                                    <span class="badge bg-success">{{ __('Actif') }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ __('Inactif') }}</span>
                                @endif
                                @if($shortUrl->isExpired())
                                    <span class="badge bg-warning text-dark">{{ __('Expiré') }}</span>
                                @endif
                            </td>
                            <td>{{ $shortUrl->created_at->format('d/m/Y') }}</td>
                            <td class="text-end">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false" aria-label="Actions">
                                        <i data-lucide="more-horizontal" style="width:14px;height:14px;"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.short-urls.show', $shortUrl) }}">
                                                <i data-lucide="bar-chart-2" style="width:14px;height:14px;" class="me-2"></i>{{ __('Statistiques') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.short-urls.edit', $shortUrl) }}">
                                                <i data-lucide="edit" style="width:14px;height:14px;" class="me-2"></i>{{ __('Modifier') }}
                                            </a>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('admin.short-urls.toggle', $shortUrl) }}">
                                                @csrf
                                                <button type="submit" class="dropdown-item">
                                                    <i data-lucide="{{ $shortUrl->is_active ? 'eye-off' : 'eye' }}" style="width:14px;height:14px;" class="me-2"></i>
                                                    {{ $shortUrl->is_active ? __('Désactiver') : __('Activer') }}
                                                </button>
                                            </form>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form method="POST" action="{{ route('admin.short-urls.destroy', $shortUrl) }}"
                                                  onsubmit="return confirm('{{ __('Supprimer ce lien court ?') }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger">
                                                    <i data-lucide="trash-2" style="width:14px;height:14px;" class="me-2"></i>{{ __('Supprimer') }}
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($shortUrls->hasPages())
                <div class="card-footer py-3 px-4">
                    {{ $shortUrls->links() }}
                </div>
            @endif
        @endif
    </div>
</div>
@endsection
