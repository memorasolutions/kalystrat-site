{{-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca --}}
@extends(config('privacy.layout') ?: 'privacy::layouts.legal')
@section('title', __('Exercer vos droits'))
@section('banner-title', __('Exercer vos droits'))
@section('banner-crumb', __('Exercer vos droits'))
@section('legal-content')
<div class="prose max-w-none mx-auto">
    <h2 class="ks-legal-title">{{ __('Exercer vos droits') }}</h2>

    @if (session('success'))
        <div class="mb-6 rounded-md bg-green-50 border-l-4 border-green-400 p-4" role="alert">
            <p class="text-green-800 font-medium">{{ session('success') }}</p>
        </div>
    @endif

    <h2>{{ __('Vos droits') }}</h2>
    <div class="mb-8 rounded-md bg-blue-50 border-l-4 border-blue-400 p-4">
        <p class="text-blue-800 font-medium mb-1">
            {{ __('Conformement aux lois applicables (RGPD, Loi 25, LPRPDE), vous disposez de droits sur vos donnees personnelles :') }}
        </p>
        <ul class="ml-5 list-disc text-blue-700 text-sm mb-2">
            @foreach($request_types as $type => $label)
                <li>{{ $label }}</li>
            @endforeach
        </ul>
        <p class="text-blue-700 text-sm mb-2">
            {{ __('Nous nous engageons a repondre a votre demande dans un delai de :days jours maximum.', ['days' => $response_delay_days]) }}
        </p>
        <p class="text-blue-700 text-sm">
            {{ __('Pour toute question, contactez notre DPO :') }}
            <strong>{{ $company['dpo_name'] }}</strong> —
            <a href="mailto:{{ $company['dpo_email'] }}" class="underline text-blue-700">{{ $company['dpo_email'] }}</a>
        </p>
    </div>

    <h2>{{ __('Formulaire de demande') }}</h2>
    <form method="POST" action="{{ route('legal.rights.store') }}" enctype="multipart/form-data" novalidate class="space-y-6" id="rights-request-form" data-confirm-required="true">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">
                {{ __('Nom complet') }} <span class="text-red-500">*</span>
            </label>
            <input type="text" name="name" id="name" required aria-required="true"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('name') border-red-500 @enderror"
                value="{{ old('name') }}" autocomplete="name">
            @error('name')
                <p class="mt-1 text-red-600 text-sm" role="alert">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">
                {{ __('Adresse courriel') }} <span class="text-red-500">*</span>
            </label>
            <input type="email" name="email" id="email" required aria-required="true"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                value="{{ old('email') }}" autocomplete="email">
            @error('email')
                <p class="mt-1 text-red-600 text-sm" role="alert">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="request_type" class="block text-sm font-medium text-gray-700">
                {{ __('Type de demande') }} <span class="text-red-500">*</span>
            </label>
            <select name="request_type" id="request_type" required aria-required="true"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('request_type') border-red-500 @enderror">
                <option value="" disabled selected>{{ __('Selectionnez un type') }}</option>
                @foreach($request_types as $type => $label)
                    <option value="{{ $type }}" @selected(old('request_type') === $type)>{{ $label }}</option>
                @endforeach
            </select>
            @error('request_type')
                <p class="mt-1 text-red-600 text-sm" role="alert">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">
                {{ __('Description de la demande') }} <span class="text-red-500">*</span>
            </label>
            <textarea name="description" id="description" required aria-required="true" rows="5"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
            @error('description')
                <p class="mt-1 text-red-600 text-sm" role="alert">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="file" class="block text-sm font-medium text-gray-700">
                {{ __('Document justificatif (optionnel)') }}
            </label>
            <input type="file" name="file" id="file" aria-describedby="file-help"
                class="mt-1 block w-full text-gray-700 @error('file') border-red-500 @enderror">
            <p id="file-help" class="text-xs text-gray-500 mt-1">
                {{ __('Formats acceptes : PDF, JPG, PNG. Taille maximale : 10 Mo.') }}
            </p>
            @error('file')
                <p class="mt-1 text-red-600 text-sm" role="alert">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit"
                style="background-color: #075985; color: #FFFFFF; min-height: 44px; padding: 0.75rem 1.5rem; border: none; border-radius: 0.375rem; font-weight: 600; cursor: pointer;"
                class="inline-flex items-center px-6 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                {{ __('Envoyer la demande') }}
            </button>
        </div>
    </form>

    {{-- Modale de confirmation 2-step (WCAG 3.3.6 Error Prevention All - AAA) --}}
    <div id="rr-confirm-overlay" role="dialog" aria-modal="true" aria-labelledby="rr-confirm-title" aria-describedby="rr-confirm-desc"
        style="display:none; position:fixed; inset:0; background:rgba(10,22,40,0.7); z-index:10001; align-items:center; justify-content:center; padding:1rem;">
        <div style="background:#FFFFFF; max-width:560px; width:100%; border-radius:0.5rem; padding:2rem; box-shadow:0 10px 30px rgba(0,0,0,0.3);">
            <h2 id="rr-confirm-title" style="font-size:1.5rem; font-weight:700; color:#0A1628; margin-bottom:1rem;">
                {{ __('Confirmer l\'envoi de votre demande') }}
            </h2>
            <p id="rr-confirm-desc" style="color:#1F2937; margin-bottom:1.25rem;">
                {{ __('Veuillez vérifier les informations ci-dessous avant l\'envoi définitif. Une fois soumise, votre demande sera traitée par notre Délégué à la protection des données.') }}
            </p>
            <dl id="rr-confirm-summary" style="background:#F8F8F6; padding:1rem; border-radius:0.375rem; margin-bottom:1.5rem; font-size:0.95rem;"></dl>
            <div style="display:flex; gap:0.75rem; flex-wrap:wrap;">
                <button type="button" id="rr-confirm-cancel"
                    style="flex:1; min-width:120px; min-height:44px; padding:0.75rem 1rem; background:#E5E7EB; color:#0A1628; border:none; border-radius:0.375rem; font-weight:600; cursor:pointer;">
                    {{ __('Modifier') }}
                </button>
                <button type="button" id="rr-confirm-submit"
                    style="flex:1; min-width:120px; min-height:44px; padding:0.75rem 1rem; background:#075985; color:#FFFFFF; border:none; border-radius:0.375rem; font-weight:600; cursor:pointer;">
                    {{ __('Confirmer et envoyer') }}
                </button>
            </div>
        </div>
    </div>

    <script>
    (function() {
        'use strict';
        var form = document.getElementById('rights-request-form');
        var overlay = document.getElementById('rr-confirm-overlay');
        var summary = document.getElementById('rr-confirm-summary');
        var btnCancel = document.getElementById('rr-confirm-cancel');
        var btnSubmit = document.getElementById('rr-confirm-submit');
        var lastFocused = null;
        var confirmed = false;

        if (!form || !overlay) return;

        var labels = {
            name: @json(__('Nom complet')),
            email: @json(__('Adresse courriel')),
            request_type: @json(__('Type de demande')),
            description: @json(__('Description de la demande')),
            file: @json(__('Document justificatif'))
        };

        function buildSummary() {
            summary.innerHTML = '';
            var fd = new FormData(form);
            var keys = ['name', 'email', 'request_type', 'description'];
            for (var i = 0; i < keys.length; i++) {
                var key = keys[i];
                var val = fd.get(key);
                if (!val) continue;
                if (key === 'request_type') {
                    var sel = form.querySelector('select[name="request_type"]');
                    if (sel && sel.selectedIndex >= 0) val = sel.options[sel.selectedIndex].text;
                }
                var dt = document.createElement('dt');
                dt.style.cssText = 'font-weight:600; color:#0A1628; margin-top:0.5rem;';
                dt.textContent = labels[key] + ' :';
                var dd = document.createElement('dd');
                dd.style.cssText = 'margin:0 0 0.25rem 0; color:#1F2937; white-space:pre-wrap; word-break:break-word;';
                dd.textContent = val;
                summary.appendChild(dt);
                summary.appendChild(dd);
            }
            var fileInput = form.querySelector('input[type="file"]');
            if (fileInput && fileInput.files && fileInput.files.length > 0) {
                var dt = document.createElement('dt');
                dt.style.cssText = 'font-weight:600; color:#0A1628; margin-top:0.5rem;';
                dt.textContent = labels.file + ' :';
                var dd = document.createElement('dd');
                dd.style.cssText = 'margin:0; color:#1F2937;';
                dd.textContent = fileInput.files[0].name;
                summary.appendChild(dt);
                summary.appendChild(dd);
            }
        }

        function openModal() {
            buildSummary();
            lastFocused = document.activeElement;
            overlay.style.display = 'flex';
            btnSubmit.focus();
            document.addEventListener('keydown', trapKey);
        }

        function closeModal() {
            overlay.style.display = 'none';
            document.removeEventListener('keydown', trapKey);
            if (lastFocused && typeof lastFocused.focus === 'function') lastFocused.focus();
        }

        function trapKey(e) {
            if (e.key === 'Escape') { e.preventDefault(); closeModal(); return; }
            if (e.key !== 'Tab') return;
            var focusables = [btnCancel, btnSubmit];
            var i = focusables.indexOf(document.activeElement);
            if (e.shiftKey) {
                if (i <= 0) { focusables[focusables.length - 1].focus(); e.preventDefault(); }
            } else {
                if (i === focusables.length - 1) { focusables[0].focus(); e.preventDefault(); }
            }
        }

        form.addEventListener('submit', function(e) {
            if (confirmed) return; // laisser passer après confirmation
            // Laisser la validation HTML5 native s'exécuter d'abord
            if (!form.checkValidity()) return;
            e.preventDefault();
            openModal();
        });

        btnCancel.addEventListener('click', closeModal);
        btnSubmit.addEventListener('click', function() {
            confirmed = true;
            closeModal();
            form.submit();
        });
        overlay.addEventListener('click', function(e) {
            if (e.target === overlay) closeModal();
        });
    })();
    </script>
</div>
@endsection
