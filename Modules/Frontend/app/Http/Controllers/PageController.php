<?php

declare(strict_types=1);

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Modules\Frontend\Http\Controllers\FilialeController;

class PageController extends Controller
{
    public function apropos(): View
    {
        return view('frontend::pages.apropos', [
            'filiales' => FilialeController::FILIALES,
        ]);
    }
    public function services(): View { return view('frontend::pages.services', ['filiales' => FilialeController::FILIALES]); }
    public function zonesIndex(): View { return view('frontend::pages.zones-index'); }
    public function zonesShow(string $ville): View { return view('frontend::pages.zone-ville', compact('ville')); }
    public function secteursIndex(): View { return view('frontend::pages.secteurs-index'); }
    public function secteursShow(string $slug): View { return view('frontend::pages.secteur', compact('slug')); }
    public function projets(): View { return view('frontend::pages.projets'); }
    public function expertise(): View { return view('frontend::pages.expertise'); }
    public function equipe(): View { return view('frontend::pages.equipe'); }
    public function equipeShow(string $slug): View { return view('frontend::pages.membre', compact('slug')); }
    public function carrieres(): View { return view('frontend::pages.carrieres'); }
    public function partenaires(): View { return view('frontend::pages.partenaires'); }
    public function contact(): View { return view('frontend::pages.contact'); }
    public function contactSubmit(Request $request): \Illuminate\Http\RedirectResponse
    {
        // V2 : envoi email + validation. Pour V1, juste redirect avec flash.
        return redirect()->route('contact')->with('status', 'Merci, votre demande a été envoyée.');
    }
    public function faq(): View { return view('frontend::pages.faq'); }
    public function glossaire(): View { return view('frontend::pages.glossaire'); }
    public function blogIndex(): View { return view('frontend::pages.blog-index'); }

    public function blogShow(string $slug): View
    {
        $articles = self::ARTICLES;
        abort_unless(isset($articles[$slug]), 404);
        return view('frontend::pages.blog-show', [
            'slug' => $slug,
            'article' => $articles[$slug],
        ]);
    }

    public const ARTICLES = [
        'pourquoi-construire-multi-logements-quebec-2026' => [
            'titre' => 'Pourquoi construire des multilogements au Québec en 2026 ?',
            'extrait' => 'Crise du logement, programmes incitatifs SCHL, choix du format (4-plex à 50+) et avantage de l’intégration verticale Kalystrat.',
            'date' => '2026-05-09',
            'categorie' => 'Marché immobilier',
        ],
        'code-construction-quebec-2026-changements' => [
            'titre' => 'Code de construction Québec 2026 : ce que les propriétaires doivent savoir',
            'extrait' => 'Nouvelles exigences R-49/R-24, étanchéité 1,5 ach, blower door obligatoire, pare-air continu et impact sur les rénovations majeures.',
            'date' => '2026-05-09',
            'categorie' => 'Réglementation',
        ],
        'comment-choisir-entrepreneur-construction-qc-2026' => [
            'titre' => 'Comment choisir un entrepreneur en construction au Québec en 2026 ?',
            'extrait' => 'Vérification RBQ, contrat et cautionnement, solidité financière et avantages d’un partenaire intégré : 4 piliers pour décider en toute confiance.',
            'date' => '2026-05-09',
            'categorie' => 'Conseils pratiques',
        ],
    ];
}
