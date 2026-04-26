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
        return view('frontend::home-construz');
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

    public function aboutV2(): Renderable
    {
        return view('frontend::about-v2', [
            'title' => 'Kalystrat - À propos',
        ]);
    }

    public function servicesV2(): Renderable
    {
        static $filiales = null;
        $filiales ??= require module_path('Frontend', 'config/filiales.php');

        return view('frontend::services-v2', [
            'title'    => 'Kalystrat - Nos filiales',
            'filiales' => $filiales,
        ]);
    }

    public function portfolioV2(): Renderable
    {
        static $filiales = null;
        $filiales ??= require module_path('Frontend', 'config/filiales.php');

        return view('frontend::portfolio-v2', [
            'title'    => 'Kalystrat - Portfolio',
            'filiales' => $filiales,
        ]);
    }

    public function contactV2(): Renderable
    {
        return view('frontend::contact-v2', [
            'title' => 'Kalystrat - Nous joindre',
        ]);
    }

    public function filialeV2(string $slug): Renderable
    {
        static $filiales = null;
        $filiales ??= require module_path('Frontend', 'config/filiales.php');

        if (!isset($filiales[$slug])) {
            abort(404);
        }

        $filiale = $filiales[$slug];

        return view('frontend::filiale-v2', [
            'title'   => $filiale['nom_complet'] . ' - Kalystrat',
            'filiale' => $filiale,
        ]);
    }

    public function faqV2(): Renderable
    {
        static $faqs = null;
        $faqs ??= require module_path('Frontend', 'config/faqs.php');

        return view('frontend::faq-v2', [
            'title' => 'Kalystrat - FAQ',
            'faqs'  => $faqs,
        ]);
    }

    public function sitemap()
    {
        static $filiales = null;
        $filiales ??= require module_path('Frontend', 'config/filiales.php');

        $now = now()->toIso8601String();
        $pages = [
            ['url' => route('frontend.home'),      'lastmod' => $now, 'changefreq' => 'weekly',  'priority' => '1.0'],
            ['url' => route('frontend.about'),     'lastmod' => $now, 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['url' => route('frontend.services'),  'lastmod' => $now, 'changefreq' => 'monthly', 'priority' => '0.9'],
            ['url' => route('frontend.portfolio'), 'lastmod' => $now, 'changefreq' => 'monthly', 'priority' => '0.7'],
            ['url' => route('frontend.contact'),   'lastmod' => $now, 'changefreq' => 'yearly',  'priority' => '0.6'],
        ];

        foreach (array_keys($filiales) as $slug) {
            $pages[] = [
                'url'        => route('frontend.filiale', $slug),
                'lastmod'    => $now,
                'changefreq' => 'monthly',
                'priority'   => '0.7',
            ];
        }

        return response()->view('frontend::sitemap', ['pages' => $pages])
            ->header('Content-Type', 'application/xml');
    }

    public function about(): Renderable
    {
        return view('frontend::about-v2', [
            'title' => 'Kalystrat - À propos',
        ]);
    }

    public function services(): Renderable
    {
        static $filiales = null;
        $filiales ??= require module_path('Frontend', 'config/filiales.php');

        return view('frontend::services-v2', [
            'title'    => 'Kalystrat - Nos filiales',
            'filiales' => $filiales,
        ]);
    }

    public function portfolio(): Renderable
    {
        static $filiales = null;
        $filiales ??= require module_path('Frontend', 'config/filiales.php');

        return view('frontend::portfolio-v2', [
            'title'    => 'Kalystrat - Portfolio',
            'filiales' => $filiales,
        ]);
    }

    public function contact(): Renderable
    {
        return view('frontend::contact-v2', [
            'title' => 'Kalystrat - Nous joindre',
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

        return view('frontend::filiale-v2', [
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
