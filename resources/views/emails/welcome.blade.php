<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@component('mail::message')
# {{ __('Bienvenue sur :app', ['app' => config('app.name')]) }}

{{ __('Bonjour') }} {{ $user->name }},

{{ __('Bienvenue sur **:app** ! Votre compte a été créé avec succès.', ['app' => config('app.name')]) }}

{{ __('Vous pouvez dès maintenant accéder à votre tableau de bord :') }}

@component('mail::button', ['url' => url('/admin')])
{{ __('Accéder au tableau de bord') }}
@endcomponent

{{ __('Si vous avez des questions, n\'hésitez pas à nous contacter.') }}

{{ __('Cordialement') }},<br>
{{ __('L\'équipe :app', ['app' => config('app.name')]) }}
@endcomponent
