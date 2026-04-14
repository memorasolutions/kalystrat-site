<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('backoffice::themes.backend.layouts.admin', ['title' => __('Modifier la catégorie'), 'subtitle' => __('Blog')])

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

<div class="card">
    <div class="card-header py-3 px-4 border-bottom">
        <h5 class="fw-bold mb-0">{{ __('Modifier') }} : {{ $category->name }}</h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('admin.blog.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label fw-semibold">{{ __('Nom') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                           id="name" name="name" value="{{ old('name', $category->name) }}" required maxlength="100">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="color" class="form-label fw-semibold">{{ __('Couleur') }}</label>
                    <div class="d-flex align-items-center gap-2">
                        <input type="color" class="form-control form-control-color @error('color') is-invalid @enderror"
                               id="color" name="color" value="{{ old('color', $category->color) }}"
                               style="width:50px;height:38px">
                        <span class="text-muted" id="color-hex">{{ old('color', $category->color) }}</span>
                    </div>
                    @error('color')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label fw-semibold">{{ __('Description') }}</label>
                <textarea class="form-control @error('description') is-invalid @enderror"
                          id="description" name="description" rows="3">{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">{{ __('Slug') }}</label>
                    <input type="text" class="form-control bg-light text-muted" value="{{ $category->slug }}" readonly aria-label="{{ __('Slug') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">&nbsp;</label>
                    <div class="form-check mt-2">
                        <input type="checkbox" class="form-check-input" id="is_active"
                               name="is_active" value="1" {{ old('is_active', $category->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">{{ __('Catégorie active') }}</label>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-primary">{{ __('Mettre à jour') }}</button>
                <a href="{{ route('admin.blog.categories.index') }}" class="btn btn-outline-secondary">{{ __('Annuler') }}</a>
            </div>
        </form>
    </div>
</div>

@push('plugin-scripts')
<script>
document.getElementById('color').addEventListener('input', function() {
    document.getElementById('color-hex').textContent = this.value;
});
</script>
@endpush

@endsection
