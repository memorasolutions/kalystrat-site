<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\AI\Listeners;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\AI\Services\AiService;
use Modules\Blog\Events\ArticleSaved;
use Modules\Settings\Models\Setting;

class GenerateArticleSeoListener
{
    public function __construct(
        private readonly AiService $aiService,
    ) {}

    public function handle(ArticleSaved $event): void
    {
        if (! (bool) Setting::get('ai.auto_seo_enabled', false)) {
            return;
        }

        try {
            $result = $this->aiService->generateSeoMeta($event->title, $event->content ?? '');

            DB::table('articles')
                ->where('id', $event->articleId)
                ->update(['meta_description' => $result['description'] ?? '']);
        } catch (\Throwable $e) {
            Log::warning("AI SEO generation failed for article #{$event->articleId}: {$e->getMessage()}");
        }
    }
}
