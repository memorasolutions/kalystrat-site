<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin', ['title' => __('Nouvelle page'), 'subtitle' => __('Pages statiques')])

@section('content')

@if($errors->any())
    <div class="alert alert-danger mb-4">
        <ul class="mb-0">
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.pages.store') }}" method="POST">
    @csrf
    <div class="row g-3">
        {{-- Colonne principale --}}
        <div class="col-xl-8">
            <div class="card mb-3">
                <div class="card-header py-3 px-4 border-bottom">
                    <h5 class="fw-bold mb-0">{{ __('Contenu') }}</h5>
                </div>
                <div class="p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="title">
                            {{ __('Titre') }} <span class="text-danger ms-1">*</span>
                        </label>
                        <input type="text" id="title" name="title"
                               class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title') }}" required aria-required="true" autocomplete="off">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <x-editor::tiptap name="content" :value="old('content', '')" :label="__('Contenu')" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="excerpt">{{ __('Extrait') }}</label>
                        <textarea id="excerpt" name="excerpt" rows="3" maxlength="500"
                                  class="form-control"
                                  style="resize:none;">{{ old('excerpt') }}</textarea>
                        <div class="form-text text-muted">{{ __('Résumé court affiché dans les listes (max 500 caractères)') }}</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Colonne latérale --}}
        <div class="col-xl-4">
            {{-- Publication --}}
            <div class="card mb-3">
                <div class="card-header py-3 px-4 border-bottom">
                    <h5 class="fw-semibold mb-0">{{ __('Publication') }}</h5>
                </div>
                <div class="p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{ __('Statut') }}</label>
                        <select name="status" class="form-control" aria-label="{{ __('Statut de la page') }}">
                            <option value="draft" {{ old('status', 'draft') === 'draft' ? 'selected' : '' }}>{{ __('Brouillon') }}</option>
                            <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>{{ __('Publié') }}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{ __('Template') }}</label>
                        <select name="template" class="form-control" aria-label="{{ __('Template de la page') }}">
                            @foreach(\Modules\Pages\Models\StaticPage::TEMPLATES as $key => $label)
                                <option value="{{ $key }}" {{ old('template', 'default') === $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        <div class="form-text text-muted">{{ __('Mise en page utilisée pour l\'affichage public') }}</div>
                    </div>
                    <div class="d-flex gap-2 pt-2">
                        <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                        <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-secondary text-center">{{ __('Annuler') }}</a>
                    </div>
                </div>
            </div>

            {{-- Attributs de page --}}
            <div class="card mb-3">
                <div class="card-header py-3 px-4 border-bottom">
                    <h5 class="fw-semibold mb-0 d-flex align-items-center gap-2"><i data-lucide="git-branch" style="width:16px;height:16px;"></i> {{ __('Attributs de page') }}</h5>
                </div>
                <div class="p-4">
                    <div class="mb-3">
                        <label class="form-label fw-medium">{{ __('Page parente') }}</label>
                        <select name="parent_id" class="form-control" aria-label="{{ __('Page parente') }}">
                            <option value="">{{ __('(Aucune — page racine)') }}</option>
                            @foreach($parentPages as $p)
                                <option value="{{ $p->id }}" {{ old('parent_id') == $p->id ? 'selected' : '' }}>{{ $p->title }}</option>
                            @endforeach
                        </select>
                        <div class="form-text text-muted">{{ __('Les sous-pages héritent de la hiérarchie URL.') }}</div>
                    </div>
                    <div class="mb-0">
                        <label class="form-label fw-medium">{{ __('Ordre d\'affichage') }}</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}" min="0" step="1">
                    </div>
                </div>
            </div>

            {{-- Protection par mot de passe --}}
            <div class="card mb-3">
                <div class="card-header py-3 px-4 border-bottom">
                    <h5 class="fw-semibold mb-0">{{ __('Protection') }}</h5>
                </div>
                <div class="p-4">
                    <div class="mb-0">
                        <label for="content_password" class="form-label fw-medium d-flex align-items-center gap-2">
                            <i data-lucide="lock" style="width:16px;height:16px;"></i> {{ __('Mot de passe') }}
                        </label>
                        <input type="text" class="form-control" id="content_password" name="content_password" value="{{ old('content_password', '') }}" placeholder="{{ __('Laisser vide pour accès libre') }}">
                    </div>
                </div>
            </div>

            {{-- SEO --}}
            <div class="card mb-3">
                <div class="card-header py-3 px-4 border-bottom">
                    <h5 class="fw-semibold mb-0">SEO</h5>
                </div>
                <div class="p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="meta_title">{{ __('Meta titre') }}</label>
                        <input type="text" id="meta_title" name="meta_title"
                               class="form-control"
                               value="{{ old('meta_title') }}" maxlength="255">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{ __('Meta description') }}</label>
                        <textarea name="meta_description" rows="3" maxlength="500"
                                  class="form-control"
                                  style="resize:none;">{{ old('meta_description') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
