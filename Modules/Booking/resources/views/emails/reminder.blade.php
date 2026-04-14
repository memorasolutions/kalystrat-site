<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@component('mail::message')
# {{ __('Rappel de rendez-vous') }}

{{ __('Bonjour') }} {{ $customer_name }},

{{ __('Nous vous rappelons votre rendez-vous pour **:service** dans **:hours**.', ['service' => $service_name, 'hours' => $hours_before]) }}

**{{ __('Détails') }} :**
- {{ __('Date') }} : {{ $date }}
- {{ __('Horaire') }} : {{ $time }}

@component('mail::button', ['url' => $manage_url, 'color' => 'primary'])
{{ __('Voir mon rendez-vous') }}
@endcomponent

{{ __('À très bientôt,') }}<br>
{{ __('L\'équipe') }} {{ $brand_name }}
@endcomponent
