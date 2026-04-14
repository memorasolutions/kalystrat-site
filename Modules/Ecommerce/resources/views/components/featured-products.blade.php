{{-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca --}}
@props(['limit' => 4, 'columns' => 4])

@php
    if (!class_exists(\Modules\Ecommerce\Models\Product::class)) {
        return;
    }

    $products = \Modules\Ecommerce\Models\Product::active()->featured()->latest()->limit($limit)->get();

    if ($products->isEmpty()) {
        return;
    }
@endphp

<section {{ $attributes->merge(['class' => 'featured-products']) }} aria-label="{{ __('Produits vedettes') }}">
    <div class="row row-cols-1 row-cols-md-{{ $columns }} g-4">
        @foreach ($products as $product)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title fw-semibold">{{ $product->name }}</h6>
                        <div class="mb-2">
                            @if ($product->compare_price && $product->compare_price > $product->price)
                                <del class="text-body-secondary small d-block">${{ number_format((float) $product->compare_price, 2) }}</del>
                            @endif
                            <span class="text-primary fw-bold">${{ number_format((float) $product->price, 2) }}</span>
                        </div>
                        @if ($product->short_description)
                            <p class="text-body-secondary small mb-0">{{ Str::limit($product->short_description, 80) }}</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
