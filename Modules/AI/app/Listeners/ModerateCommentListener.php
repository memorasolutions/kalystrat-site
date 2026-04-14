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
use Modules\Blog\Events\CommentCreated;
use Modules\Settings\Models\Setting;

class ModerateCommentListener
{
    public function __construct(
        private readonly AiService $aiService,
    ) {}

    public function handle(CommentCreated $event): void
    {
        if (! (bool) Setting::get('ai.auto_moderation_enabled', false)) {
            return;
        }

        try {
            $result = $this->aiService->moderateContent($event->content);
            $threshold = (float) Setting::get('ai.moderation_threshold', '0.7');

            if ($result['confidence'] < $threshold) {
                return;
            }

            if (in_array($result['verdict'], ['approve', 'spam'], true)) {
                DB::table('comments')
                    ->where('id', $event->commentId)
                    ->update(['status' => $result['verdict']]);
            }
        } catch (\Throwable $e) {
            Log::warning("AI moderation failed for comment #{$event->commentId}: {$e->getMessage()}");
        }
    }
}
