<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin')

@section('title', __('Modifier tableau'))

@section('content')
    @include('backoffice::themes.backend.components.breadcrumb', [
        'title' => __('Modifier tableau'),
        'items' => [
            ['label' => 'Roadmap'],
            ['label' => __('Tableaux'), 'url' => route('admin.roadmap.boards.index')],
            ['label' => __('Modifier')],
        ],
    ])

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ __('Modifier tableau') }}</h5>
                </div>
                <form method="POST" action="{{ route('admin.roadmap.boards.update', $board) }}">
                    @csrf @method('PUT')
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label for="name" class="form-label fw-medium">{{ __('Nom') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $board->name) }}" required>
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="color" class="form-label fw-medium">{{ __('Couleur') }}</label>
                                <input type="color" class="form-control form-control-color @error('color') is-invalid @enderror" id="color" name="color" value="{{ old('color', $board->color ?? '#6c757d') }}">
                                @error('color') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12">
                                <label for="description" class="form-label fw-medium">{{ __('Description') }}</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $board->description) }}</textarea>
                                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_public" name="is_public" value="1" {{ old('is_public', $board->is_public) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_public">{{ __('Public') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">
                            <i data-lucide="save" class="me-1"></i> {{ __('Enregistrer') }}
                        </button>
                        <a href="{{ route('admin.roadmap.boards.index') }}" class="btn btn-secondary">{{ __('Annuler') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
