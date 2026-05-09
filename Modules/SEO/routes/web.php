<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Blog\Models\Article;
use Modules\Pages\Models\StaticPage;
use Modules\SEO\Services\SeoService;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

Route::middleware('web')->group(function () {
    // Kalystrat AEO/GEO 2026 : fichiers SEO servis via storage/app/seo (Herd nginx renvoie 404 sur /public).
    // Fallback dynamique via SeoService si fichier statique absent (portabilité).
    Route::get('/robots.txt', function () {
        $path = storage_path('app/seo/robots.txt');
        $content = file_exists($path)
            ? file_get_contents($path)
            : app(SeoService::class)->generateRobotsTxt();

        return response($content, 200, ['Content-Type' => 'text/plain; charset=UTF-8']);
    })->name('robots');

    Route::get('/llms.txt', function () {
        $path = storage_path('app/seo/llms.txt');
        abort_unless(file_exists($path), 404);

        return response(file_get_contents($path), 200, ['Content-Type' => 'text/plain; charset=UTF-8']);
    })->name('llms');

    Route::get('/llms-full.txt', function () {
        $path = storage_path('app/seo/llms-full.txt');
        abort_unless(file_exists($path), 404);

        return response(file_get_contents($path), 200, ['Content-Type' => 'text/plain; charset=UTF-8']);
    })->name('llms-full');

    Route::get('/sitemap.xml', function () {
        // S31 Sitemap Kalystrat — architecture SEO/AEO/GEO 2026 complète.
        $sitemap = Sitemap::create()
            ->add(Url::create('/')->setPriority(1.0)->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY))
            ->add(Url::create('/a-propos')->setPriority(0.9)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
            ->add(Url::create('/expertise')->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
            ->add(Url::create('/equipe')->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
            ->add(Url::create('/equipe/ali-salomon')->setPriority(0.7)->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY))
            ->add(Url::create('/equipe/jacques-jobidon')->setPriority(0.6)->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY))
            ->add(Url::create('/equipe/perry-wong')->setPriority(0.6)->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY))
            ->add(Url::create('/partenaires')->setPriority(0.6)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
            ->add(Url::create('/services')->setPriority(0.9)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
            ->add(Url::create('/projets')->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
            ->add(Url::create('/carrieres')->setPriority(0.9)->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY))
            ->add(Url::create('/contact')->setPriority(0.7)->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY))
            ->add(Url::create('/faq')->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
            ->add(Url::create('/glossaire')->setPriority(0.6)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
            ->add(Url::create('/blog')->setPriority(0.7)->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY))
            ->add(Url::create('/credits')->setPriority(0.3)->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY))
            ->add(Url::create('/politique-confidentialite')->setPriority(0.5)->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY))
            ->add(Url::create('/conditions-utilisation')->setPriority(0.5)->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY))
            ->add(Url::create('/politique-cookies')->setPriority(0.3)->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY));

        // 6 filiales (depuis FilialeController::FILIALES, source unique de vérité)
        $sitemap->add(Url::create('/filiales')->setPriority(0.9)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
        foreach (array_keys(\Modules\Frontend\Http\Controllers\FilialeController::FILIALES) as $slug) {
            $sitemap->add(Url::create('/filiales/'.$slug)->setPriority(0.85)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
        }

        // 9 zones desservies
        $sitemap->add(Url::create('/zones-desservies')->setPriority(0.7)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
        foreach (['quebec', 'levis', 'sainte-foy', 'beauport', 'sillery', 'trois-rivieres', 'saguenay', 'montreal', 'laval'] as $slug) {
            $sitemap->add(Url::create('/zones-desservies/'.$slug)->setPriority(0.7)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
        }

        // 5 secteurs verticaux
        $sitemap->add(Url::create('/secteurs')->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
        foreach (['residentiel', 'commercial', 'institutionnel', 'industriel', 'municipal'] as $slug) {
            $sitemap->add(Url::create('/secteurs/'.$slug)->setPriority(0.75)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
        }

        if (class_exists(Article::class)) {
            Article::published()->each(function (Article $article) use ($sitemap) {
                $sitemap->add(
                    Url::create(route('blog.show', $article->slug))
                        ->setLastModificationDate($article->updated_at)
                        ->setPriority(0.7)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                );
            });
        }

        if (class_exists(StaticPage::class)) {
            StaticPage::published()->each(function (StaticPage $page) use ($sitemap) {
                $sitemap->add(
                    Url::create(route('pages.show', $page->slug))
                        ->setLastModificationDate($page->updated_at)
                        ->setPriority(0.8)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                );
            });
        }

        return $sitemap->toResponse(request());
    })->name('sitemap');
});
