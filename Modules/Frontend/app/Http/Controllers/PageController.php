<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends \App\Http\Controllers\Controller
{
    public function aPropos()
    {
        return view('frontend::pages.apropos', [
            'title' => 'À propos | Kalystrat – Groupe québécois construction intégrée',
            'metaDescription' => 'Kalystrat regroupe six filiales en construction au Québec sous la direction d\'Ali Salomon : fondations, structure, toiture, finition intérieure, immobilier, placement.',
            'ogTitle' => 'À propos de Kalystrat',
            'ogImage' => asset('assets/img/kalystrat/og/apropos.jpg'),
            'canonical' => route('apropos'),
        ]);
    }

    public function conseil()
    {
        return view('frontend::pages.conseil', [
            'title' => 'Conseil consultatif | Kalystrat – Gouvernance et expertise',
            'metaDescription' => 'Conseil consultatif Kalystrat : Ali Salomon (Président), Jacques Jobidon (droit construction), Perry Wong (immobilier). Trois sièges à pourvoir au conseil du holding québécois.',
            'ogTitle' => 'Conseil consultatif Kalystrat',
            'ogImage' => asset('assets/img/kalystrat/og/conseil.jpg'),
            'canonical' => route('conseil'),
        ]);
    }

    public function partenaires()
    {
        return view('frontend::pages.partenaires', [
            'title' => 'Partenaires | Kalystrat – Architectes, designers, courtiers',
            'metaDescription' => 'Réseau de partenaires Kalystrat : architectes, designers d\'intérieur, courtiers OACIQ et promoteurs. Programme de fidélité avec référencement croisé, tarifs préférentiels et visibilité chantier.',
            'ogTitle' => 'Partenaires Kalystrat — Réseau de référencement',
            'ogImage' => asset('assets/img/kalystrat/og/partenaires.jpg'),
            'canonical' => route('partenaires'),
        ]);
    }

    public function ville(string $slug)
    {
        $villes = config('kalystrat.villes', []);
        abort_unless(isset($villes[$slug]), 404);

        $ville = $villes[$slug];

        return view('frontend::pages.ville', [
            'title' => $ville['meta_title'],
            'metaDescription' => $ville['meta_description'],
            'ogTitle' => $ville['h1'],
            'ogImage' => asset("assets/img/kalystrat/og/ville-{$slug}.jpg"),
            'canonical' => route('ville', ['slug' => $slug]),
            'slug' => $slug,
            'ville' => $ville,
        ]);
    }

    public function services()
    {
        return view('frontend::pages.services', [
            'title' => 'Nos services | Kalystrat – 6 expertises construction Québec',
            'metaDescription' => 'Six filiales Kalystrat couvrent chaque étape d\'un projet construction au Québec : fondations, structure, toiture, finition intérieure, immobilier, placement de main-d\'œuvre CCQ.',
            'ogTitle' => 'Services Kalystrat – 6 expertises construction',
            'ogImage' => asset('assets/img/kalystrat/og/services.jpg'),
            'canonical' => route('services'),
        ]);
    }

    public function realisations()
    {
        return view('frontend::pages.realisations', [
            'title' => 'Réalisations | Kalystrat – Projets construction Québec',
            'metaDescription' => 'Réalisations Kalystrat : chantiers résidentiels, commerciaux et institutionnels au Québec. Projets livrés clés en main par les six filiales du groupe, du sol à la toiture.',
            'ogTitle' => 'Réalisations Kalystrat',
            'ogImage' => asset('assets/img/kalystrat/og/realisations.jpg'),
            'canonical' => route('realisations'),
        ]);
    }

    public function faq()
    {
        return view('frontend::pages.faq', [
            'title' => 'FAQ | Kalystrat – Questions fréquentes construction Québec',
            'metaDescription' => 'Questions fréquentes sur Kalystrat : groupe, filiales, services, soumission, délais, garantie GCR, certifications RBQ. Réponses claires pour propriétaires, entrepreneurs et investisseurs.',
            'ogTitle' => 'FAQ Kalystrat',
            'ogImage' => asset('assets/img/kalystrat/og/faq.jpg'),
            'canonical' => route('faq'),
            'faqs' => config('kalystrat.faqs', []),
        ]);
    }

    public function filiale(string $slug)
    {
        $filiales = config('kalystrat.filiales', []);
        abort_unless(isset($filiales[$slug]), 404);

        $filiale = $filiales[$slug];

        return view('frontend::pages.filiale', [
            'title' => $filiale['meta_title'] ?? (($filiale['nom'] ?? $filiale['nom_court']) . ' – Kalystrat'),
            'metaDescription' => $filiale['meta_description'] ?? "Kalystrat {$filiale['nom_court']} : expertise construction Québec, intégrée au groupe Kalystrat.",
            'ogTitle' => $filiale['nom'] ?? $filiale['nom_court'],
            'ogImage' => asset("assets/img/kalystrat/og/filiale-{$slug}.jpg"),
            'canonical' => route('filiale', ['slug' => $slug]),
            'slug' => $slug,
            'filiale' => $filiale,
            'filiales' => $filiales,
        ]);
    }
}
