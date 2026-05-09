<?php

declare(strict_types=1);

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class PageController extends Controller
{
    public function apropos(): View { return view('frontend::pages.apropos'); }
    public function services(): View { return view('frontend::pages.services'); }
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
}
