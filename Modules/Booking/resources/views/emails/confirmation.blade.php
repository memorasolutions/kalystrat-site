<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@component('mail::message')
# {{ __('Confirmation de rendez-vous') }}

{{ __('Bonjour') }} {{ $customer_name }},

{{ __('Votre rendez-vous pour **:service** a bien été enregistré.', ['service' => $service_name]) }}

**{{ __('Détails') }} :**
- {{ __('Date') }} : {{ $date }}
- {{ __('Horaire') }} : {{ $time }}

@component('mail::button', ['url' => $manage_url, 'color' => 'success'])
{{ __('Gérer mon rendez-vous') }}
@endcomponent

{{ __('Vous pouvez modifier ou annuler votre rendez-vous en cliquant sur le bouton ci-dessus.') }}

{{ __('Merci de votre confiance,') }}<br>
{{ __('L\'équipe') }} {{ $brand_name }}
@endcomponent
