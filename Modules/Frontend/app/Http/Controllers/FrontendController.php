<?php

namespace Modules\Frontend\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class FrontendController extends Controller
{
    public function home(): Renderable
    {
        return view('frontend::home', [
            'title' => 'Kalystrat - Construction stratégique à Québec',
        ]);
    }

    public function about(): Renderable
    {
        return view('frontend::about', [
            'title' => 'À propos - Kalystrat',
        ]);
    }

    public function services(): Renderable
    {
        return view('frontend::services', [
            'title' => 'Services - Kalystrat',
        ]);
    }

    public function portfolio(): Renderable
    {
        return view('frontend::portfolio', [
            'title' => 'Portfolio - Kalystrat',
        ]);
    }

    public function contact(): Renderable
    {
        return view('frontend::contact', [
            'title' => 'Contact - Kalystrat',
        ]);
    }
}
