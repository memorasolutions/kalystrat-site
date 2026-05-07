<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin')
@section('title', __('Modifier') . ' ' . $tenant->name)
@section('content')
<div class="page-content">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title mb-4">{{ __('Modifier le tenant') }} : {{ $tenant->name }}</h6>
            <form action="{{ route('admin.tenants.update', $tenant) }}" method="POST">
                @csrf @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label fw-medium">{{ __('Nom') }} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $tenant->name) }}" required maxlength="255" autocomplete="organization">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="slug" class="form-label fw-medium">{{ __('Identifiant (slug)') }} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $tenant->slug) }}" required maxlength="255">
                        <div class="form-text">{{ __('Identifiant unique dans l\'URL (lettres, chiffres, tirets).') }}</div>
                        @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="domain" class="form-label fw-medium">{{ __('Domaine personnalisé') }}</label>
                        <input type="text" class="form-control @error('domain') is-invalid @enderror" id="domain" name="domain" value="{{ old('domain', $tenant->domain) }}" maxlength="255">
                        <div class="form-text">{{ __('Optionnel. Exemple : app.monentreprise.com') }}</div>
                        @error('domain') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="owner_id" class="form-label fw-medium">{{ __('Propriétaire') }}</label>
                        <select class="form-select @error('owner_id') is-invalid @enderror" id="owner_id" name="owner_id">
                            <option value="">{{ __('Aucun propriétaire') }}</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('owner_id', $tenant->owner_id) == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} ({{ $user->email }})
                                </option>
                            @endforeach
                        </select>
                        @error('owner_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-12">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $tenant->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">{{ __('Actif') }}</label>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end gap-2 mt-3">
                    <a href="{{ route('admin.tenants.index') }}" class="btn btn-outline-secondary">{{ __('Annuler') }}</a>
                    <button type="submit" class="btn btn-primary">
                        <i data-lucide="save"></i> {{ __('Enregistrer') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
