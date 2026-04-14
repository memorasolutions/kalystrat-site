<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('backoffice::themes.backend.layouts.admin')

@section('title', __('Nouvelle zone de livraison'))

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">{{ __('Nouvelle zone') }}</h6>

                <form action="{{ route('admin.ecommerce.shipping-zones.store') }}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="name" class="form-label">Nom de la zone</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="{{ __('Ex: Canada Est') }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4 d-flex align-items-end">
                            <div class="form-check form-switch mb-2">
                                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Zone active</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">{{ __('Régions (provinces)') }}</label>
                        <div class="row g-3">
                            @php
                                $provinces = [
                                    'AB' => __('Alberta'), 'BC' => __('Colombie-Britannique'), 'MB' => __('Manitoba'),
                                    'NB' => __('Nouveau-Brunswick'), 'NL' => __('Terre-Neuve-et-Labrador'), 'NS' => __('Nouvelle-Écosse'),
                                    'NT' => __('Territoires du Nord-Ouest'), 'NU' => __('Nunavut'), 'ON' => __('Ontario'),
                                    'PE' => __('Île-du-Prince-Édouard'), 'QC' => __('Québec'), 'SK' => __('Saskatchewan'), 'YT' => __('Yukon'),
                                ];
                            @endphp
                            @foreach($provinces as $code => $name)
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="region_{{ $code }}" name="regions[]" value="{{ $code }}" {{ in_array($code, old('regions', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="region_{{ $code }}">{{ $name }} ({{ $code }})</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @error('regions')<div class="text-danger mt-1 small">{{ $message }}</div>@enderror
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="card-title mb-0">{{ __('Méthodes de livraison') }}</h6>
                        <button type="button" class="btn btn-sm btn-secondary" id="add-method-btn">
                            <i data-lucide="plus" class="icon-sm me-1"></i> Ajouter une méthode
                        </button>
                    </div>

                    <div id="methods-container"></div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary me-2">{{ __('Enregistrer') }}</button>
                        <a href="{{ route('admin.ecommerce.shipping-zones.index') }}" class="btn btn-secondary">{{ __('Annuler') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('custom-scripts')
@include('ecommerce::admin.shipping-zones._methods-js')
@endpush
@endsection
