<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Modules\Frontend\Mail\CandidatureMessage;

class CandidatureController extends \App\Http\Controllers\Controller
{
    public function show()
    {
        return view('frontend::pages.carrieres', [
            'title' => 'Carrières | Kalystrat – Emplois construction CCQ Québec',
            'metaDescription' => 'Kalystrat Placement recrute en continu pour les six filiales du groupe au Québec : main-d\'œuvre CCQ qualifiée, formation continue, salaires compétitifs.',
            'ogTitle' => 'Carrières Kalystrat',
            'ogImage' => asset('assets/img/kalystrat/og/carrieres.jpg'),
            'canonical' => route('carrieres'),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:120',
            'courriel' => 'required|email|max:180',
            'telephone' => 'required|string|max:30',
            'metier' => 'required|string|max:80',
            'experience' => 'required|string|max:60',
            'disponibilite' => 'required|string|max:60',
            'message' => 'required|string|min:10|max:3000',
            'cf-turnstile-response' => 'nullable|string',
        ]);

        Mail::to('rh@kalystrat.ca')->send(new CandidatureMessage($validated));

        return redirect()->route('carrieres')->with('success', 'Candidature reçue, merci. On vous revient sous 5 jours ouvrables.');
    }
}
