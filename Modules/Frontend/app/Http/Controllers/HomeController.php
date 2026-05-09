<?php

declare(strict_types=1);

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Page d'accueil Kalystrat — holding overview.
     * Architecture SEO/AEO/GEO 2026 hub-and-spoke.
     */
    public function index(): View
    {
        return view('frontend::home');
    }
}
