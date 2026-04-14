<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Api\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Blog\Models\Article;
use Modules\Faq\Models\Faq;
use Modules\Pages\Models\StaticPage;

/**
 * @group Search
 *
 * Unified search across articles, pages and FAQs.
 */
class SearchApiController extends BaseApiController
{
    /**
     * Search across multiple content types.
     */
    public function search(Request $request): JsonResponse
    {
        $request->validate([
            'q' => 'required|string|min:2',
        ]);

        $q = $request->input('q');

        $results = [
            'articles' => [],
            'pages' => [],
            'faqs' => [],
        ];

        if (class_exists(Article::class)) {
            $results['articles'] = Article::search($q)
                ->where('status', 'published')
                ->take(5)
                ->get()
                ->map(fn ($a) => [
                    'id' => $a->id,
                    'title' => $a->title,
                    'slug' => $a->slug,
                ])
                ->toArray();
        }

        if (class_exists(StaticPage::class)) {
            $results['pages'] = StaticPage::search($q)
                ->where('status', 'published')
                ->take(5)
                ->get()
                ->map(fn ($p) => [
                    'id' => $p->id,
                    'title' => $p->title,
                    'slug' => $p->slug,
                ])
                ->toArray();
        }

        if (class_exists(Faq::class)) {
            $results['faqs'] = Faq::where('is_published', true)
                ->where('question', 'LIKE', "%{$q}%")
                ->take(5)
                ->get()
                ->map(fn ($f) => [
                    'id' => $f->id,
                    'title' => $f->question,
                    'slug' => $f->slug ?? null,
                ])
                ->toArray();
        }

        return $this->respondSuccess($results);
    }
}
