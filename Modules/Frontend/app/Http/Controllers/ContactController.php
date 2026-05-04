<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Modules\Frontend\Mail\ContactMessage;

class ContactController extends \App\Http\Controllers\Controller
{
    public function show()
    {
        return view('frontend::pages.contact', [
            'title' => 'Contact | Kalystrat – Demande de soumission Québec',
            'metaDescription' => 'Communiquez avec Kalystrat pour une soumission, une question ou un partenariat. Six filiales construction au Québec, réponse sous 48 h ouvrables. Téléphone : 418-476-0987, courriel : info@kalystrat.ca.',
            'ogTitle' => 'Contactez Kalystrat',
            'ogImage' => asset('assets/img/kalystrat/og/contact.jpg'),
            'canonical' => route('contact'),
            'filiales' => config('kalystrat.filiales', []),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:120',
            'email' => 'required|email|max:180',
            'telephone' => 'nullable|string|max:30',
            'ville' => 'nullable|string|max:80',
            'filiale' => 'nullable|in:fondations,structure,toiture,finition,immobilier,placement,general',
            'budget' => 'nullable|string|max:60',
            'echeance' => 'nullable|string|max:60',
            'message' => 'required|string|min:10|max:3000',
            'cf-turnstile-response' => 'nullable|string',
        ]);

        Mail::to('info@kalystrat.ca')->send(new ContactMessage($validated));

        return redirect()->route('contact')->with('success', 'Message reçu, on vous revient sous 48 h ouvrables.');
    }
}
