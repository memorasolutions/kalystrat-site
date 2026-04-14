<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@component('mail::message')
# {{ __('Vérification de votre adresse email') }}

{{ __('Veuillez cliquer sur le bouton ci-dessous pour vérifier votre adresse email.') }}

@component('mail::button', ['url' => $url])
{{ __('Vérifier mon adresse email') }}
@endcomponent

{{ __('Si vous n\'avez pas créé de compte, aucune action n\'est requise.') }}

{{ __('Cordialement') }},<br>
{{ config('app.name') }}
@endcomponent
