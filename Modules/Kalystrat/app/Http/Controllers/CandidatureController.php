<?php

namespace Modules\Kalystrat\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Modules\Kalystrat\Mail\CandidatureMessage;

class CandidatureController extends \App\Http\Controllers\Controller
{
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
        ]);

        Mail::to('rh@kalystrat.ca')->send(new CandidatureMessage($validated));

        return redirect()->back()->with('success', 'Candidature reçue, merci. On vous revient sous 5 jours ouvrables.');
    }
}
