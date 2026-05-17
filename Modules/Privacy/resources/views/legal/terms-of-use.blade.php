{{-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca --}}
@extends(config('privacy.layout') ?: 'privacy::layouts.legal')
@section('title', 'Conditions d\'utilisation')
@section('banner-title', 'Conditions d\'utilisation')
@section('banner-crumb', 'Conditions d\'utilisation')
@section('legal-content')
@php
    $company = $config['company'];
    $doc = $config['documents']['terms'];
@endphp

<div class="prose max-w-none mx-auto">
    <h2 class="ks-legal-title">Conditions d'utilisation</h2>
    <p class="text-sm text-gray-500">
        <strong>Version :</strong> {{ $doc['version'] }}<br>
        <strong>Date d'entrée en vigueur :</strong> {{ \Carbon\Carbon::parse($doc['updated_at'])->translatedFormat('d F Y') }}
    </p>

    <nav class="my-8">
        <h2 class="cgu-toc-title">Sommaire</h2>
        <ol class="list-decimal list-inside space-y-1">
            <li><a href="#section-1">Préambule et acceptation</a></li>
            <li><a href="#section-2">Langue (Charte de la langue française art. 78.1)</a></li>
            <li><a href="#section-3">Identité de l'entreprise et licences</a></li>
            <li><a href="#section-4">Utilisation permise du Site</a></li>
            <li><a href="#section-5">Propriété intellectuelle</a></li>
            <li><a href="#section-6">Demandes de soumission et services</a></li>
            <li><a href="#section-7">Liens externes</a></li>
            <li><a href="#section-8">Contenus utilisateurs (formulaires)</a></li>
            <li><a href="#section-9">Politique de confidentialité et témoins (renvoi Loi 25)</a></li>
            <li><a href="#section-10">Limitation de responsabilité</a></li>
            <li><a href="#section-11">Indemnisation</a></li>
            <li><a href="#section-12">Force majeure</a></li>
            <li><a href="#section-13">Modifications du Site et des Conditions d'utilisation</a></li>
            <li><a href="#section-14">Droit applicable et juridiction</a></li>
            <li><a href="#section-15">Coordonnées et dispositions générales</a></li>
        </ol>
    </nav>

    <h2 id="section-1">1. Préambule et acceptation</h2>
    <p>Les présentes conditions d'utilisation régissent l'accès et l'usage du site Web <a href="https://kalystrat.ca">kalystrat.ca</a> (ci-après le « Site ») mis à disposition par Gestion Kalystrat Inc., société inscrite au registre des entreprises du Québec sous le numéro d'entreprise 1181998650, dont le siège social est situé à Québec (G1G 3C9). Le terme « Utilisateur » désigne toute personne physique ou morale accédant au Site. Le terme « Filiales » désigne les six entités suivantes : Kalystrat Fondations, Kalystrat Structure, Kalystrat Toiture-Enveloppe, Kalystrat Finition Intérieure, Kalystrat Immobilier et Kalystrat Placement Construction. L'Utilisateur reconnaît avoir pris connaissance des présentes conditions et les accepte sans réserve par le seul fait de poursuivre l'utilisation du Site. Ces conditions régissent exclusivement la relation entre l'Utilisateur et le Site ; elles ne s'appliquent aucunement aux contrats de construction, lesquels sont formalisés par des devis signés séparément après inspection des lieux.</p>

    <h2 id="section-2">2. Langue (Charte de la langue française art. 78.1)</h2>
    <p>Les présentes conditions sont rédigées en langue française, conformément à l'article 78.1 de la Charte de la langue française (Loi 96). Toute version traduite en une autre langue est fournie à titre de commodité et n'a aucune valeur juridique. En cas de divergence, seule la version française prévaut. L'Utilisateur reconnaît avoir reçu le service en français, tel qu'exigé par la Charte de la langue française.</p>

    <h2 id="section-3">3. Identité de l'entreprise et licences</h2>
    <p>Gestion Kalystrat Inc. est une société enregistrée au registre des entreprises du Québec sous le numéro d'entreprise 1181998650, dont le siège social est situé à Québec (G1G 3C9). Les activités de construction sont exercées sous la convention « Kalystrat + Spécialité », selon la nature des travaux. Les six filiales opérationnelles sont : Kalystrat Fondations, Kalystrat Structure, Kalystrat Toiture-Enveloppe, Kalystrat Finition Intérieure, Kalystrat Immobilier et Kalystrat Placement Construction. <!-- TODO Memora: remplacer par numéro RBQ réel Kalystrat avant publication --><strong>RBQ :</strong> [À CONFIRMER]. Selon la nature des travaux réalisés, les garanties légales applicables, notamment la garantie de construction résidentielle (GCR), sont offertes conformément aux dispositions de la Loi sur le bâtiment.</p>

    <h2 id="section-4">4. Utilisation permise du Site</h2>
    <p>L'Utilisateur est autorisé à consulter et utiliser le Site à des fins personnelles ou professionnelles légitimes, dans le respect des lois et règlements applicables. Sont strictement interdits : l'extraction automatisée de données (« scraping »), l'utilisation de robots non autorisés, l'envoi de courriels indésirables, l'introduction de logiciels malveillants, le démarchage non sollicité, ainsi que toute tentative d'ingénierie inverse. L'Utilisateur s'engage à respecter les dispositions de la Loi canadienne anti-pourriel (LCAP). En cas de manquement à ces obligations, Gestion Kalystrat Inc. se réserve le droit de suspendre immédiatement et sans préavis l'accès au Site.</p>

    <h2 id="section-5">5. Propriété intellectuelle</h2>
    <p>Tous les éléments du Site — incluant sans s'y limiter les textes, photographies de chantiers, vidéos de témoignages, plans architecturaux, rendus tridimensionnels et le logo Kalystrat (marque verbale et figurative) — sont protégés par les lois applicables en matière de propriété intellectuelle. Gestion Kalystrat Inc. accorde à l'Utilisateur une licence limitée, non exclusive, révocable et non transférable, à des fins strictement personnelles et non commerciales. Toute reproduction, représentation, adaptation ou utilisation commerciale, totale ou partielle, sans autorisation écrite préalable, est strictement interdite. Les auteurs (photographes, architectes, etc.) conservent leurs droits moraux. L'utilisation d'images de projets ou de clients exige une autorisation écrite préalable.</p>

    <h2 id="section-6">6. Demandes de soumission et services</h2>
    <p>Les informations présentées sur le Site — notamment les tarifs indicatifs, les délais estimés ou les descriptions de services — ont un caractère strictement informatif et non contractuel. Elles constituent une invitation à offrir au sens des articles 1387 et 1388 du Code civil du Québec, et non une offre ferme. Aucun engagement ne naît de ces informations. Tout engagement contractuel exige la remise et la signature d'un devis officiel, établi après une inspection visuelle des lieux par un représentant qualifié de Kalystrat. Les demandes de soumission peuvent être formulées via le formulaire en ligne ou lors d'une consultation avec un chargé de projet Kalystrat.</p>

    <h2 id="section-7">7. Liens externes</h2>
    <p>Le Site peut contenir des liens vers des sites tiers, notamment ceux de la Régie du bâtiment du Québec (RBQ), de la Garantie de construction résidentielle (GCR), de l'Association provinciale des constructeurs d'habitations du Québec (APCHQ), de fournisseurs ou de comptes officiels sur les réseaux sociaux. Ces liens sont fournis à titre de commodité. Gestion Kalystrat Inc. décline toute responsabilité quant au contenu, à la sécurité, aux pratiques de confidentialité ou à la disponibilité de ces sites externes.</p>

    <h2 id="section-8">8. Contenus utilisateurs (formulaires)</h2>
    <p>Les formulaires accessibles sur le Site (contact, candidature à un emploi, demande de soumission, etc.) permettent à l'Utilisateur de transmettre des renseignements personnels. Le traitement de ces données est régi par la <a href="/politique-confidentialite">politique de confidentialité</a>. L'Utilisateur garantit l'exactitude, la complétude et la licéité des renseignements fournis. Ces données sont conservées conformément au principe de minimisation prévu à l'article 9 de la Loi 25 sur la protection des renseignements personnels.</p>

    <h2 id="section-9">9. Politique de confidentialité et témoins (renvoi Loi 25)</h2>
    <p>L'utilisation du Site est également soumise à la <a href="/politique-confidentialite">politique de confidentialité</a> et à la <a href="/politique-cookies">politique sur les témoins</a>. Conformément aux articles 27 à 34 de la Loi 25, l'Utilisateur dispose des droits suivants : accès, rectification, retrait du consentement, portabilité et désindexation de ses renseignements personnels. Le responsable de la protection des renseignements personnels (RPP), désigné conformément à l'article 3.1 de la Loi 25, peut être joint aux coordonnées indiquées à la section 15.</p>

    <h2 id="section-10">10. Limitation de responsabilité</h2>
    <p>Conformément à l'article 1474 du Code civil du Québec, la responsabilité de Gestion Kalystrat Inc. est limitée dans la mesure permise par la loi. Cette limitation n'exclut toutefois ni la faute lourde ni la faute intentionnelle, ni les préjudices corporels ou moraux. Le Site est fourni « tel quel et selon la disponibilité », sans aucune garantie expresse ou implicite, sauf les garanties légales non excluables prévues par la Loi sur la protection du consommateur. Gestion Kalystrat Inc. décline toute responsabilité pour les dommages indirects, notamment la perte de profit, la perte d'opportunité commerciale ou l'atteinte à la réputation. Aucune garantie n'est offerte quant à la disponibilité continue du Site (par exemple : 24 heures sur 24, 7 jours sur 7).</p>

    <h2 id="section-11">11. Indemnisation</h2>
    <p>L'Utilisateur s'engage à indemniser, défendre et tenir indemnes Gestion Kalystrat Inc. et ses Filiales de toute réclamation, perte, dommage ou frais raisonnables (y compris les honoraires juridiques) découlant de son usage contraire aux présentes conditions d'utilisation ou aux lois applicables.</p>

    <h2 id="section-12">12. Force majeure</h2>
    <p>Conformément à l'article 1470 du Code civil du Québec, aucune partie ne sera tenue responsable de l'inexécution de ses obligations en cas de force majeure, définie comme un événement imprévisible, irrésistible et étranger à sa volonté. Sont notamment considérés comme tels : une pandémie, des intempéries graves, une pénurie prolongée de matériaux, une grève syndicale, un conflit armé ou un acte gouvernemental. Les obligations sont suspendues pendant la durée de l'événement. Si celui-ci excède soixante (60) jours consécutifs, chaque partie peut résilier le présent accord sans pénalité.</p>

    <h2 id="section-13">13. Modifications du Site et des Conditions d'utilisation</h2>
    <p>Gestion Kalystrat Inc. se réserve le droit de modifier unilatéralement, à tout moment et sans préavis, le Site ainsi que les présentes conditions d'utilisation. Les modifications prennent effet dès leur publication en ligne. L'usage continu du Site vaut acceptation des nouvelles conditions. En cas de modification substantielle, un avis sera affiché sur la page d'accueil du Site pendant une période raisonnable.</p>

    <h2 id="section-14">14. Droit applicable et juridiction</h2>
    <p>Les présentes conditions sont régies par les lois du Québec et du Canada. La Convention des Nations Unies sur les contrats de vente internationale de marchandises (Convention de Vienne) est expressément exclue. Tout litige relatif à l'interprétation, à la validité ou à l'exécution des présentes relèvera exclusivement de la compétence des tribunaux du district judiciaire de Québec. Les parties conviennent de recourir, en premier lieu, à une médiation auprès de l'Institut de médiation et d'arbitrage du Québec (IMAQ), avant toute procédure judiciaire.</p>

    <h2 id="section-15">15. Coordonnées et dispositions générales</h2>
    <p>Pour toute question relative aux présentes conditions, à la confidentialité ou à l'exercice des droits prévus par la Loi 25, veuillez contacter Gestion Kalystrat Inc. à l'adresse suivante : {{ $company['address'] }}, par courriel à <a href="mailto:{{ $company['email'] }}">{{ $company['email'] }}</a> ou par téléphone au {{ $company['phone'] }}. Si une disposition des présentes est déclarée nulle ou inapplicable, les autres dispositions demeureront pleinement en vigueur. Les présentes constituent l'intégralité de l'entente entre les parties. Aucune renonciation à un droit ne vaudra sauf si elle est exprimée par écrit. En cas de fusion, d'acquisition ou de cession d'actifs, les présentes conditions pourront être transférées à l'entité successeur, sous réserve d'un préavis de trente (30) jours à l'Utilisateur.</p>

    <p class="text-xs mt-8 border-t pt-4 text-gray-500">
        Version {{ $doc['version'] }} — Date d'entrée en vigueur : {{ \Carbon\Carbon::parse($doc['updated_at'])->translatedFormat('d F Y') }}
    </p>
</div>
@endsection
