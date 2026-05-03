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
        // P22-S20e Sitemap Kalystrat : pages publiques actives + 6 filiales dynamiques.
        $sitemap = Sitemap::create()
            ->add(Url::create('/')->setPriority(1.0)->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY))
            ->add(Url::create('/a-propos')->setPriority(0.9)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
            ->add(Url::create('/services')->setPriority(0.9)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
            ->add(Url::create('/realisations')->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
            ->add(Url::create('/carrieres')->setPriority(0.9)->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY))
            ->add(Url::create('/contact')->setPriority(0.7)->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY))
            ->add(Url::create('/faq')->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));

        foreach (array_keys(config('kalystrat.filiales', [])) as $slug) {
            $sitemap->add(Url::create('/filiales/'.$slug)->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
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
