<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin')
@section('title', __('Champs personnalisés'))

@section('page-actions')
    <x-backoffice::help-modal id="helpCustomFieldsModal" :title="__('Champs personnalisés')" icon="list-plus" :buttonLabel="__('Aide')">
                @include('customfields::admin._help')
            </x-backoffice::help-modal>
@endsection

@section('content')
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('Fermer') }}"></button>
    </div>
@endif

@forelse($definitions as $modelType => $group)
    <div class="card grid-margin">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="card-title mb-0">{{ \Modules\CustomFields\Models\CustomFieldDefinition::MODEL_TYPES[$modelType] ?? ucfirst($modelType) }}</h6>
            <span class="badge bg-primary">{{ $group->count() }}</span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>{{ __('Nom') }}</th>
                        <th>{{ __('Clé') }}</th>
                        <th>{{ __('Type') }}</th>
                        <th class="text-center">{{ __('Requis') }}</th>
                        <th class="text-center">{{ __('Actif') }}</th>
                        <th class="text-end">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($group as $definition)
                        <tr>
                            <td>{{ $definition->name }}</td>
                            <td><code>{{ $definition->key }}</code></td>
                            <td><span class="badge bg-info" style="font-size:10px;">{{ ucfirst($definition->type) }}</span></td>
                            <td class="text-center">
                                <span class="badge bg-{{ $definition->is_required ? 'success' : 'secondary' }}">{{ $definition->is_required ? __('Oui') : __('Non') }}</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-{{ $definition->is_active ? 'success' : 'secondary' }}">{{ $definition->is_active ? __('Oui') : __('Non') }}</span>
                            </td>
                            <td class="text-end">
                                <div class="d-flex gap-1 justify-content-end">
                                    <a href="{{ route('admin.custom-fields.edit', $definition) }}" class="btn btn-sm btn-outline-warning p-1" title="{{ __('Modifier') }}">
                                        <i data-lucide="edit" style="width:14px;height:14px;"></i>
                                    </a>
                                    <form action="{{ route('admin.custom-fields.destroy', $definition) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-outline-danger p-1" onclick="if(confirm('{{ __("Supprimer ce champ ?") }}')) this.form.submit()" title="{{ __('Supprimer') }}">
                                            <i data-lucide="trash-2" style="width:14px;height:14px;"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@empty
    <div class="card">
        <div class="card-body text-center py-5 text-muted">
            <i data-lucide="layers" style="width:48px;height:48px;" class="mb-3 d-block mx-auto"></i>
            <h5>{{ __('Aucun champ personnalisé') }}</h5>
            <p>{{ __('Ajoutez des champs pour enrichir vos articles et pages.') }}</p>
            <a href="{{ route('admin.custom-fields.create') }}" class="btn btn-primary mt-2">
                <i data-lucide="plus" style="width:16px;height:16px;"></i> {{ __('Créer un champ') }}
            </a>
        </div>
    </div>
@endforelse
@endsection
