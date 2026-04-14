<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@component('mail::message')
# {{ __('Réinitialisation du mot de passe') }}

{{ __('Vous recevez cet email car nous avons reçu une demande de réinitialisation de mot de passe pour votre compte.') }}

@component('mail::button', ['url' => $url])
{{ __('Réinitialiser le mot de passe') }}
@endcomponent

{{ __('Ce lien de réinitialisation expirera dans :count minutes.', ['count' => $count]) }}

{{ __('Si vous n\'avez pas demandé de réinitialisation de mot de passe, aucune action n\'est requise.') }}

{{ __('Cordialement') }},<br>
{{ config('app.name') }}
@endcomponent
