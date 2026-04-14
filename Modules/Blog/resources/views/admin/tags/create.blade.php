<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('backoffice::layouts.admin', ['title' => __('Nouveau tag'), 'subtitle' => __('Blog')])
@section('content')
<div class="card"><div class="card-body">
    <form action="{{ route('admin.blog.tags.store') }}" method="POST">@csrf
        <div class="row g-3">
            <div class="col-md-8">
                <label class="form-label fw-medium" for="name">{{ __('Nom') }} <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label fw-medium" for="color">{{ __('Couleur') }}</label>
                <input type="color" name="color" id="color" class="form-control form-control-color @error('color') is-invalid @enderror" value="{{ old('color', '#6366f1') }}">
                @error('color') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-12">
                <label class="form-label fw-medium" for="description">{{ __('Description') }}</label>
                <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
        <div class="d-flex justify-content-end gap-2 mt-3">
            <a href="{{ route('admin.blog.tags.index') }}" class="btn btn-outline-secondary">{{ __('Annuler') }}</a>
            <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
        </div>
    </form>
</div></div>
@endsection
