<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Modules\Frontend\Mail\ContactMessage;

class ContactController extends \App\Http\Controllers\Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:120',
            'email' => 'required|email|max:180',
            'telephone' => 'nullable|string|max:30',
            'filiale' => 'nullable|in:fondations,structure,toiture,finition,immobilier,placement',
            'message' => 'required|string|min:10|max:3000',
        ]);

        Mail::to('info@kalystrat.ca')->send(new ContactMessage($validated));

        return redirect()->back()->with('success', 'Message reçu, on vous revient sous 48h.');
    }
}
