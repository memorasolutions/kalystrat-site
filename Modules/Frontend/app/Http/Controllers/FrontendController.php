<?php

namespace Modules\Frontend\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function home(): Renderable
    {
        return view('frontend::home', [
            'title' => 'Kalystrat - Construction stratégique à Québec',
        ]);
    }

    public function homeV2(): Renderable
    {
        static $filiales = null;
        $filiales ??= require module_path('Frontend', 'config/filiales.php');

        return view('frontend::home-v2', [
            'title'    => 'Kalystrat - Holding québécois construction',
            'filiales' => $filiales,
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

    /**
     * Page filiale dynamique (D1 MVP additif).
     * Désactivable en commentant la route dans routes/web.php.
     */
    public function filiale(string $slug): Renderable
    {
        static $filiales = null;
        $filiales ??= require module_path('Frontend', 'config/filiales.php');

        if (!isset($filiales[$slug])) {
            abort(404);
        }

        $filiale = $filiales[$slug];

        return view('frontend::filiale', [
            'title'   => $filiale['nom_complet'] . ' - Kalystrat',
            'filiale' => $filiale,
        ]);
    }

    public function contactSubmit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|in:Soumission,Information,Partenariat,Autre',
            'message' => 'required|string|max:5000',
        ]);

        try {
            $body = "Nom: {$validated['name']}\n"
                . "Courriel: {$validated['email']}\n"
                . "Téléphone: " . ($validated['phone'] ?? 'Non fourni') . "\n"
                . "Sujet: {$validated['subject']}\n\n"
                . "Message:\n{$validated['message']}";

            Mail::raw($body, function ($mail) use ($validated) {
                $mail->to('info@kalystrat.ca')
                    ->replyTo($validated['email'], $validated['name'])
                    ->subject("[Kalystrat] {$validated['subject']} - {$validated['name']}");
            });

            return redirect()->back()->with('success', 'Votre message a été envoyé avec succès. Nous vous répondrons dans les plus brefs délais.');
        } catch (\Exception $e) {
            Log::error('Contact form error: ' . $e->getMessage());

            return redirect()->back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de l\'envoi de votre message. Veuillez réessayer plus tard.');
        }
    }
}
