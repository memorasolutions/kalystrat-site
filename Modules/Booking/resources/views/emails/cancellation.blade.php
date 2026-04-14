<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@component('mail::message')
# {{ __('Annulation de rendez-vous') }}

{{ __('Bonjour') }} {{ $customer_name }},

{{ __('Votre rendez-vous pour **:service** prévu le **:date** à **:time** a été annulé.', ['service' => $service_name, 'date' => $date, 'time' => $time]) }}

@if($cancel_reason)
**{{ __('Raison') }} :** {{ $cancel_reason }}
@endif

@component('mail::button', ['url' => $rebooking_url, 'color' => 'primary'])
{{ __('Prendre un nouveau rendez-vous') }}
@endcomponent

{{ __('Nous espérons vous revoir prochainement.') }}

{{ __('Cordialement,') }}<br>
{{ __('L\'équipe') }} {{ $brand_name }}
@endcomponent
