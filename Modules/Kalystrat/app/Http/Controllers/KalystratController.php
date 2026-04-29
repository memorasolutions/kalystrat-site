<?php

namespace Modules\Kalystrat\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

class KalystratController extends Controller
{
    public function aPropos()
    {
        return view('frontend::about-construz');
    }

    public function faq()
    {
        $faqs = config('kalystrat.faqs', []);

        return view('frontend::faq-v2', compact('faqs'));
    }

    public function filiale(string $slug)
    {
        $filiales = config('kalystrat.filiales', []);
        $filialeData = Arr::get($filiales, $slug);

        if (! $filialeData) {
            abort(404);
        }

        return view('frontend::filiale', [
            'filiale' => $filialeData,
            'title' => $filialeData['nom_complet'] ?? ucfirst($slug),
        ]);
    }
}
