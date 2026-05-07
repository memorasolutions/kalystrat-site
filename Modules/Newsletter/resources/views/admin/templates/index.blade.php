<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin', ['title' => __('Templates marketing'), 'subtitle' => __('Newsletter')])

@section('page-actions')
    <x-backoffice::help-modal id="helpNewsletterTemplatesModal" :title="__('Templates newsletter')" icon="file-text" :buttonLabel="__('Aide')">
            @include('newsletter::admin.templates._help')
        </x-backoffice::help-modal>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
                <h6 class="mb-0">{{ __('Templates marketing') }}</h6>
                <a href="{{ route('admin.newsletter.templates.create') }}" class="btn btn-sm btn-primary d-flex align-items-center gap-1">
                    <i data-lucide="plus"></i> {{ __('Nouveau template') }}
                </a>
            </div>
            <div class="card-body">
                @if($templates->isEmpty())
                    <div class="text-center py-5">
                        <i data-lucide="mail" style="width:48px;height:48px" class="text-muted mb-3"></i>
                        <p class="text-muted">{{ __('Aucun template marketing pour l\'instant.') }}</p>
                        <a href="{{ route('admin.newsletter.templates.create') }}" class="btn btn-sm btn-outline-primary">{{ __('Créer un template') }}</a>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>{{ __('Nom') }}</th>
                                    <th>{{ __('Sujet') }}</th>
                                    <th>{{ __('Catégorie') }}</th>
                                    <th>{{ __('Statut') }}</th>
                                    <th class="text-end">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($templates as $template)
                                <tr>
                                    <td class="fw-medium">{{ $template->name }}</td>
                                    <td>{{ Str::limit($template->subject, 40) }}</td>
                                    <td>
                                        @if($template->category)
                                            <span class="badge bg-light text-dark">{{ $template->category }}</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($template->is_active)
                                            <span class="badge bg-success">{{ __('Actif') }}</span>
                                        @else
                                            <span class="badge bg-secondary">{{ __('Inactif') }}</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-1">
                                            <a href="{{ route('admin.newsletter.templates.preview', $template) }}" class="btn btn-sm btn-outline-info" target="_blank" title="{{ __('Aperçu') }}" aria-label="{{ __('Aperçu') }}">
                                                <i data-lucide="eye"></i>
                                            </a>
                                            <a href="{{ route('admin.newsletter.templates.edit', $template) }}" class="btn btn-sm btn-outline-primary" title="{{ __('Modifier') }}" aria-label="{{ __('Modifier') }}">
                                                <i data-lucide="pencil"></i>
                                            </a>
                                            <form method="POST" action="{{ route('admin.newsletter.templates.destroy', $template) }}" onsubmit="return confirm('{{ __("Supprimer ce template ?") }}')">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="{{ __('Supprimer') }}" aria-label="{{ __('Supprimer') }}">
                                                    <i data-lucide="trash-2"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">{{ $templates->links() }}</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
