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
    public function zonesIndex(): View { return view('frontend::pages.zones-index'); }
    public function zonesShow(string $ville): View { return view('frontend::pages.zone-ville', compact('ville')); }
    public function projets(): View { return view('frontend::pages.projets'); }
    public function contact(): View { return view('frontend::pages.contact'); }
    public function contactSubmit(Request $request): \Illuminate\Http\RedirectResponse
    {
        // T169 — Honeypot anti-bot : champ "website" caché DOIT rester vide
        if (filled($request->input('website'))) {
            // Silently accept (bot detection — pas de feedback pour ne pas révéler le piège)
            return redirect()->route('contact')->with('status', 'Merci, votre demande a été envoyée.');
        }
        // Rate limit per IP : 3 soumissions / 10 min
        $key = 'contact-submit:' . $request->ip();
        if (\Illuminate\Support\Facades\RateLimiter::tooManyAttempts($key, 3)) {
            return back()->withInput()->withErrors([
                'message' => 'Trop de tentatives. Veuillez réessayer dans quelques minutes.',
            ]);
        }
        \Illuminate\Support\Facades\RateLimiter::hit($key, 600);
        // Validation server-side
        $request->validate([
            'nom' => 'required|string|max:120',
            'email' => 'required|email|max:200',
            'entreprise' => 'nullable|string|max:200',
            'message' => 'nullable|string|max:5000',
            'telephone' => 'nullable|string|max:30',
            'rappel' => 'nullable|in:1',
        ]);
        // V2 : envoi Mail::to(...)->send(new ContactMessage(...))
        return redirect()->route('contact')->with('status', 'Merci, votre demande a été envoyée. Nous vous répondrons sous 72 heures ouvrables.');
    }
    public function faq(): View { return view('frontend::pages.faq'); }
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
            'extrait' => 'Marché locatif SCHL 2025, PHAQ, APH Select, fiscalité (TPS bonifiée, TVQ), formats 4-plex à 50+ et risques : le guide promoteur 2026.',
            'date' => '2026-05-16',
            'categorie' => 'Marché immobilier',
            'image' => '/intime/images/blog/blog-multilog.webp',
            'alt' => 'Immeuble résidentiel multilogements moderne',
        ],
        'code-construction-quebec-2026-changements' => [
            'titre' => 'Code de construction Québec 2026 : ce que les propriétaires doivent savoir',
            'extrait' => 'Partie 11 (Chapitre I) vs Chapitre I.1, valeurs RSI/R en zone 7A, pare-air, ventilation, Novoclimat 2.0 et rénovations majeures : guide propriétaires 2026.',
            'date' => '2026-05-16',
            'categorie' => 'Réglementation',
            'image' => '/intime/images/blog/blog-code-construction.webp',
            'alt' => 'Plan architectural et règlement de construction',
        ],
        'comment-choisir-entrepreneur-construction-qc-2026' => [
            'titre' => 'Comment choisir un entrepreneur en construction au Québec en 2026 ?',
            'extrait' => 'Licence RBQ et sous-catégories, garantie GCR obligatoire pour le neuf, contrat OPC, solidité financière et recours en cas de litige : guide propriétaires 2026.',
            'date' => '2026-05-16',
            'categorie' => 'Conseils pratiques',
            'image' => '/intime/images/blog/blog-choisir-entrepreneur.webp',
            'alt' => 'Deux ouvriers en équipement de sécurité validant un accord',
        ],
    ];
}
