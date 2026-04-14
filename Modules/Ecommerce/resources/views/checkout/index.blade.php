{{-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca --}}
@extends('auth::layouts.app')

@section('title', __('Paiement'))

@section('content')
<div class="container py-4">
    <h1 class="h3 fw-semibold mb-4">{{ __('Paiement') }}</h1>

    <div class="row">
        {{-- Resume panier --}}
        <div class="col-lg-5 order-lg-2 mb-4">
            <div class="card shadow-sm">
                <div class="card-header py-3">
                    <h5 class="fw-bold mb-0">{{ __('Resume du panier') }}</h5>
                </div>
                <div class="card-body p-0">
                    @foreach($cart->items as $item)
                        <div class="d-flex justify-content-between p-3 border-bottom">
                            <div>
                                <div class="fw-semibold">{{ $item->variant->product->name ?? __('Produit') }}</div>
                                <small class="text-body-secondary">x{{ $item->quantity }}</small>
                            </div>
                            <div class="fw-bold">${{ number_format((float) $item->variant->price * $item->quantity, 2) }}</div>
                        </div>
                    @endforeach
                    <div class="p-3 bg-body-tertiary">
                        <div class="d-flex justify-content-between fw-bold fs-5">
                            <span>{{ __('Sous-total') }}</span>
                            <span>${{ number_format((float) $cart->items->sum(fn($i) => $i->variant->price * $i->quantity), 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Formulaire + Stripe embedded --}}
        <div class="col-lg-7 order-lg-1">
            <div class="card shadow-sm">
                <div class="card-header py-3">
                    <h5 class="fw-bold mb-0">{{ __('Informations de livraison') }}</h5>
                </div>
                <div class="card-body" id="checkout-form-container">
                    <form id="checkout-form">
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Courriel') }} <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="full_name" class="form-label">{{ __('Nom complet') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="full_name" name="full_name" value="{{ auth()->user()->name }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">{{ __('Telephone') }}</label>
                                <input type="tel" class="form-control" id="phone" name="phone">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">{{ __('Adresse') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="city" class="form-label">{{ __('Ville') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="province" class="form-label">{{ __('Province') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="province" name="province" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="postal_code" class="form-label">{{ __('Code postal') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="postal_code" name="postal_code" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="country" class="form-label">{{ __('Pays') }} <span class="text-danger">*</span></label>
                            <select class="form-select" id="country" name="country" required>
                                <option value="CA" selected>{{ __('Canada') }}</option>
                                <option value="US">{{ __('Etats-Unis') }}</option>
                                <option value="FR">{{ __('France') }}</option>
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg" id="submit-btn">
                                <span id="btn-text">{{ __('Payer maintenant') }}</span>
                                <span id="btn-spinner" class="spinner-border spinner-border-sm d-none" role="status"></span>
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Stripe Embedded Checkout monte ici --}}
                <div id="checkout-container" class="d-none" style="min-height: 500px;"></div>
            </div>
        </div>
    </div>
</div>

@if(config('cashier.key'))
<script src="https://js.stripe.com/v3/"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const stripe = Stripe('{{ config('cashier.key') }}');
    const form = document.getElementById('checkout-form');

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        const btn = document.getElementById('submit-btn');
        btn.disabled = true;
        document.getElementById('btn-text').classList.add('d-none');
        document.getElementById('btn-spinner').classList.remove('d-none');

        try {
            const res = await fetch('/api/checkout/embedded', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + (document.querySelector('meta[name="api-token"]')?.content || '')
                },
                body: JSON.stringify({
                    shipping_address_id: 1,
                    shipping_method: 'standard',
                    return_url: '{{ route("checkout.return") }}'
                })
            });

            const data = await res.json();

            if (data.data?.client_secret) {
                document.getElementById('checkout-form-container').classList.add('d-none');
                const container = document.getElementById('checkout-container');
                container.classList.remove('d-none');

                const checkout = await stripe.initEmbeddedCheckout({ clientSecret: data.data.client_secret });
                checkout.mount('#checkout-container');
            } else {
                alert(data.message || '{{ __("Erreur lors de la creation de la session de paiement.") }}');
                btn.disabled = false;
                document.getElementById('btn-text').classList.remove('d-none');
                document.getElementById('btn-spinner').classList.add('d-none');
            }
        } catch (err) {
            console.error(err);
            alert('{{ __("Une erreur est survenue. Veuillez reessayer.") }}');
            btn.disabled = false;
            document.getElementById('btn-text').classList.remove('d-none');
            document.getElementById('btn-spinner').classList.add('d-none');
        }
    });
});
</script>
@endif
@endsection
