{{-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca --}}
@extends(config('privacy.layout') ?: 'privacy::layouts.legal')
@section('title', __('Conditions d\'utilisation'))
@section('legal-content')
@php
    $company = $config['company'];
    $doc = $config['documents']['terms'];
@endphp

<div class="prose max-w-none mx-auto">
    <h1>{{ __('Conditions d\'utilisation') }}</h1>
    <p class="text-sm text-gray-500">
        <strong>{{ __('Version') }} :</strong> {{ $doc['version'] }}<br>
        <strong>{{ __('Date d\'entree en vigueur') }} :</strong> {{ \Carbon\Carbon::parse($doc['updated_at'])->translatedFormat('d F Y') }}
    </p>

    <nav class="my-8">
        <h2>{{ __('Table des matieres') }}</h2>
        <ol class="list-decimal list-inside space-y-1">
            <li><a href="#acceptation">{{ __('Acceptation des conditions') }}</a></li>
            <li><a href="#service">{{ __('Description du service') }}</a></li>
            <li><a href="#compte">{{ __('Creation et responsabilite du compte') }}</a></li>
            <li><a href="#usage">{{ __('Utilisation acceptable') }}</a></li>
            <li><a href="#propriete">{{ __('Propriete intellectuelle') }}</a></li>
            <li><a href="#contenu">{{ __('Contenu genere par l\'utilisateur') }}</a></li>
            <li><a href="#paiement">{{ __('Paiement et facturation') }}</a></li>
            <li><a href="#disponibilite">{{ __('Disponibilite du service') }}</a></li>
            <li><a href="#responsabilite">{{ __('Limitation de responsabilite') }}</a></li>
            <li><a href="#resiliation">{{ __('Resiliation') }}</a></li>
            <li><a href="#litige">{{ __('Mediation et juridiction') }}</a></li>
            <li><a href="#modification">{{ __('Modification des conditions') }}</a></li>
            <li><a href="#force-majeure">{{ __('Force majeure') }}</a></li>
            <li><a href="#mineurs">{{ __('Mineurs') }}</a></li>
            <li><a href="#dispositions">{{ __('Dispositions finales') }}</a></li>
            <li><a href="#contact">{{ __('Coordonnees') }}</a></li>
        </ol>
    </nav>

    <h2 id="acceptation">{{ __('1. Acceptation des conditions') }}</h2>
    <p>{{ __('En accedant au service :company ou en l\'utilisant, vous acceptez d\'etre lie par les presentes conditions d\'utilisation. Si vous n\'acceptez pas ces conditions, veuillez ne pas utiliser notre plateforme.', ['company' => $company['name']]) }}</p>

    <h2 id="service">{{ __('2. Description du service') }}</h2>
    <p>{{ __(':company est une plateforme logicielle en tant que service (SaaS) qui fournit des outils de gestion en ligne. Les fonctionnalites disponibles dependent du plan d\'abonnement choisi.', ['company' => $company['name']]) }}</p>

    <h2 id="compte">{{ __('3. Creation et responsabilite du compte') }}</h2>
    <p>{{ __('Vous devez creer un compte pour acceder au service. Vous etes responsable de :') }}</p>
    <ul class="list-disc ml-6">
        <li>{{ __('La confidentialite de vos identifiants de connexion') }}</li>
        <li>{{ __('Toute activite effectuee via votre compte') }}</li>
        <li>{{ __('L\'exactitude des informations fournies lors de l\'inscription') }}</li>
    </ul>

    <h2 id="usage">{{ __('4. Utilisation acceptable') }}</h2>
    <p>{{ __('Il est strictement interdit d\'utiliser le service pour :') }}</p>
    <ul class="list-disc ml-6">
        <li>{{ __('Contrevenir aux lois applicables, incluant la Loi 25 et le RGPD') }}</li>
        <li>{{ __('Diffuser, transmettre ou stocker du contenu illegal, abusif ou offensant') }}</li>
        <li>{{ __('Tenter d\'acceder a des systemes ou donnees sans autorisation') }}</li>
        <li>{{ __('Nuire a la sécurité, a l\'integrite ou a la disponibilite du service') }}</li>
        <li>{{ __('Envoyer du spam ou tout contenu commercial non sollicite') }}</li>
        <li>{{ __('Utiliser le service pour du minage de cryptomonnaies ou toute activite consommant des ressources de maniere abusive') }}</li>
    </ul>

    <h2 id="propriete">{{ __('5. Propriete intellectuelle') }}</h2>
    <p>{{ __('L\'ensemble du contenu, des marques, logos et elements visuels du service sont la propriete exclusive de :company ou de ses concedants de licence. Aucune disposition des presentes ne vous confere un droit de propriete intellectuelle sur ces elements.', ['company' => $company['name']]) }}</p>

    <h2 id="contenu">{{ __('6. Contenu genere par l\'utilisateur') }}</h2>
    <p>{{ __('En publiant du contenu sur la plateforme, vous accordez a :company une licence mondiale, non exclusive et gratuite pour utiliser, reproduire et afficher ce contenu dans le cadre de l\'exploitation du service.', ['company' => $company['name']]) }}</p>
    <p>{{ __('Nous nous reservons le droit de moderer ou retirer tout contenu contraire aux presentes conditions ou aux lois en vigueur.') }}</p>

    <h2 id="paiement">{{ __('7. Paiement et facturation') }}</h2>
    <ul class="list-disc ml-6">
        <li>{{ __('Le service fonctionne par abonnement mensuel ou annuel') }}</li>
        <li>{{ __('Les frais sont factures a l\'avance selon le plan choisi') }}</li>
        <li>{{ __('Sauf indication contraire ou obligation legale, aucun remboursement ne sera effectue apres paiement') }}</li>
        <li>{{ __('Nous nous reservons le droit de modifier les tarifs avec un preavis de 30 jours') }}</li>
    </ul>

    <h2 id="disponibilite">{{ __('8. Disponibilite du service') }}</h2>
    <p>{{ __('Nous nous efforcons d\'assurer une disponibilite continue du service. Cependant, des interruptions peuvent survenir pour maintenance ou pour des causes independantes de notre volonte. Les engagements de disponibilite specifiques, le cas echeant, sont decrits dans une convention de niveau de service (SLA) separee.') }}</p>

    <h2 id="responsabilite">{{ __('9. Limitation de responsabilite') }}</h2>
    <p>{{ __('Dans les limites permises par la loi applicable, :company decline toute responsabilite pour les dommages directs ou indirects resultant de l\'utilisation ou de l\'impossibilite d\'utiliser le service, incluant mais sans s\'y limiter : la perte de donnees, le manque a gagner ou l\'interruption d\'activite.', ['company' => $company['name']]) }}</p>

    <h2 id="resiliation">{{ __('10. Resiliation') }}</h2>
    <p>{{ __('Vous pouvez resilier votre compte a tout moment depuis les parametres de votre profil. Nous pouvons suspendre ou resilier votre acces en cas de manquement aux presentes conditions, sans prejudice de tout autre recours. Les donnees seront conservees conformement a notre politique de confidentialite.') }}</p>

    <h2 id="litige">{{ __('11. Mediation et juridiction') }}</h2>
    <p>{{ __("Avant tout recours judiciaire, les parties s'engagent a tenter une mediation obligatoire via un mediateur agree, tel que l'Institut de mediation et d'arbitrage du Quebec ou un organisme equivalent dans l'Union europeenne. Ce processus de mediation est limite a une duree de trente (30) jours. En cas d'echec, les tribunaux competents seront saisis. Les presentes conditions sont regies par les lois de la province de Quebec et les lois federales du Canada. Pour les residents de l'Union europeenne, les tribunaux de leur Etat membre de residence sont egalement competents conformement au Reglement Bruxelles I bis.") }}</p>

    <h2 id="modification">{{ __('12. Modification des conditions') }}</h2>
    <p>{{ __('Nous pouvons modifier ces conditions a tout moment. Vous serez notifie de tout changement substantiel par courriel ou via le service. La poursuite de l\'utilisation du service apres notification vaut acceptation des nouvelles conditions.') }}</p>

    <h2 id="force-majeure">{{ __('13. Force majeure') }}</h2>
    <p>{{ __(':company ou l\'utilisateur ne pourra etre tenu responsable de l\'inexecution de ses obligations en cas de force majeure, incluant notamment les guerres, catastrophes naturelles, pandemies, pannes majeures d\'infrastructure ou actes gouvernementaux imprevisibles. Les obligations contractuelles sont suspendues pour la duree de l\'evenement. Si la situation de force majeure persiste au-dela de soixante (60) jours, le contrat pourra etre resilie par l\'une ou l\'autre des parties sans aucune penalite.', ['company' => $company['name']]) }}</p>

    <h2 id="mineurs">{{ __('14. Mineurs') }}</h2>
    <p>{{ __('L\'utilisation du service est strictement interdite aux mineurs de moins de seize (16) ans residant dans l\'Union europeenne et aux mineurs de moins de treize (13) ans residant au Canada. Si :company constate qu\'un mineur utilise le service sans autorisation, le compte sera supprime et les donnees effacees sans delai. Pour les mineurs ages de 13 a 16 ans, un consentement parental verifiable est requis conformement au RGPD et a la Loi 25 du Quebec.', ['company' => $company['name']]) }}</p>

    <h2 id="dispositions">{{ __('15. Dispositions finales') }}</h2>
    <p>{{ __('Si une disposition des presentes est jugee invalide par un tribunal, les autres clauses demeurent pleinement en vigueur.') }}</p>
    <p>{{ __('Les presentes conditions constituent l\'integralite de l\'accord entre vous et :company concernant l\'utilisation du service.', ['company' => $company['name']]) }}</p>
    <p>{{ __('Le fait pour :company de ne pas exercer un droit ou une disposition mentionnee dans ces CGU ne constitue en aucun cas une renonciation a ce droit pour l\'avenir.', ['company' => $company['name']]) }}</p>
    <p>{{ __('L\'utilisateur ne peut ceder ses droits a un tiers. Toutefois, :company se reserve le droit de ceder ses droits et obligations en cas de fusion ou d\'acquisition, sous reserve d\'un preavis de trente (30) jours.', ['company' => $company['name']]) }}</p>

    <h2 id="contact">{{ __('16. Coordonnees') }}</h2>
    <p>{{ __('Pour toute question concernant ces conditions :') }}</p>
    <ul class="list-none ml-0">
        <li><strong>{{ $company['name'] }}</strong></li>
        <li>{{ $company['address'] }}</li>
        <li>{{ __('Courriel') }} : <a href="mailto:{{ $company['email'] }}">{{ $company['email'] }}</a></li>
        <li>{{ __('Telephone') }} : {{ $company['phone'] }}</li>
    </ul>

    <p class="text-xs mt-8 border-t pt-4 text-gray-500">
        {{ __('Version') }} {{ $doc['version'] }} -
        {{ __('Date d\'entree en vigueur') }} : {{ \Carbon\Carbon::parse($doc['updated_at'])->translatedFormat('d F Y') }}
    </p>
</div>
@endsection
