<?php

namespace Modules\Frontend\Http\Controllers;

class HomeController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        return view('frontend::home', [
            'title' => 'Kalystrat – Groupe québécois de construction à intégration verticale',
            'metaDescription' => 'Kalystrat regroupe six filiales spécialisées en construction au Québec : fondations, structure, toiture, finition intérieure, immobilier et placement de main-d\'œuvre.',
            'ogTitle' => 'Kalystrat – Groupe construction Québec',
            'ogImage' => asset('assets/img/kalystrat/og-image.jpg'),
            'canonical' => rtrim(request()->getSchemeAndHttpHost(), '/') . '/',
        ]);
    }
}
