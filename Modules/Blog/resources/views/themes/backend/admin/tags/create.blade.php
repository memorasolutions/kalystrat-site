<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('backoffice::themes.backend.layouts.admin', ['title' => __('Nouveau tag'), 'subtitle' => __('Blog')])

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
        <h5 class="fw-bold mb-0">{{ __('Nouveau tag') }}</h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('admin.blog.tags.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">{{ __('Nom') }} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name') }}" required maxlength="100">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label fw-semibold">{{ __('Description') }}</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="color" class="form-label fw-semibold">{{ __('Couleur') }}</label>
                        <div class="d-flex align-items-center gap-2">
                            <input type="color" class="form-control form-control-color" id="color" name="color"
                                   value="{{ old('color', '#6366f1') }}" style="width:50px;height:38px">
                            <span class="text-muted" id="color-hex">{{ old('color', '#6366f1') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                <a href="{{ route('admin.blog.tags.index') }}" class="btn btn-outline-secondary">{{ __('Annuler') }}</a>
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
