<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Backoffice\Services;

use App\Models\User;
use Carbon\CarbonPeriod;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Modules\Blog\Models\Article;
use Modules\Blog\Models\Category;
use Modules\Blog\Models\Comment;
use Modules\Newsletter\Models\Subscriber;
use Modules\Webhooks\Models\WebhookCall;
use Spatie\Activitylog\Models\Activity;

class AnalyticsService
{
    private const CACHE_TTL = 300; // 5 minutes

    public function getOverview(int $days = 30): array
    {
        return Cache::remember("analytics:overview:{$days}", self::CACHE_TTL, function () use ($days) {
            $since = now()->subDays($days);
            $totalWebhookCalls = WebhookCall::count();

            return [
                'total_users' => User::count(),
                'active_users' => User::where('is_active', true)->count(),
                'new_users' => User::where('created_at', '>=', $since)->count(),
                'total_articles' => Article::count(),
                'published_articles' => Article::where('status', 'published')->count(),
                'total_comments' => Comment::count(),
                'pending_comments' => Comment::where('status', 'pending')->count(),
                'total_subscribers' => Subscriber::count(),
                'total_webhook_calls' => $totalWebhookCalls,
                'webhook_success_rate' => $totalWebhookCalls > 0
                    ? round((WebhookCall::where('status', 'success')->count() / $totalWebhookCalls) * 100, 1)
                    : 0,
                'total_activities' => Activity::count(),
            ];
        });
    }

    public function getWebhookStats(int $days = 30): array
    {
        return Cache::remember("analytics:webhooks:{$days}", self::CACHE_TTL, function () use ($days) {
            $since = now()->subDays($days);
            $total = WebhookCall::where('created_at', '>=', $since)->count();
            $successful = WebhookCall::where('status', 'success')->where('created_at', '>=', $since)->count();
            $failed = WebhookCall::where('status', 'failed')->where('created_at', '>=', $since)->count();
            $pending = WebhookCall::where('status', 'pending')->where('created_at', '>=', $since)->count();

            $byEvent = WebhookCall::where('created_at', '>=', $since)
                ->selectRaw('event, count(*) as cnt')
                ->groupBy('event')
                ->pluck('cnt', 'event')
                ->toArray();

            return [
                'total' => $total,
                'successful' => $successful,
                'failed' => $failed,
                'pending' => $pending,
                'success_rate' => $total > 0 ? round(($successful / $total) * 100, 1) : 0,
                'by_event' => $byEvent,
            ];
        });
    }

    public function getContentStats(int $days = 30): array
    {
        return Cache::remember("analytics:content:{$days}", self::CACHE_TTL, function () use ($days) {
            $since = now()->subDays($days);

            $byCategory = Category::where('is_active', true)
                ->withCount(['articles' => fn ($q) => $q->where('articles.created_at', '>=', $since)])
                ->get()
                ->pluck('articles_count', 'name')
                ->toArray();

            return [
                'articles_created' => Article::where('created_at', '>=', $since)->count(),
                'articles_published' => Article::where('status', 'published')->where('created_at', '>=', $since)->count(),
                'comments_created' => Comment::where('created_at', '>=', $since)->count(),
                'comments_approved' => Comment::where('status', 'approved')->where('created_at', '>=', $since)->count(),
                'by_category' => $byCategory,
            ];
        });
    }

    public function getActivityTimeline(int $days = 30): array
    {
        return Cache::remember("analytics:activity:{$days}", self::CACHE_TTL, function () use ($days) {
            $start = now()->subDays($days)->startOfDay();
            $end = now()->endOfDay();

            $counts = Activity::where('created_at', '>=', $start)
                ->selectRaw('DATE(created_at) as date, count(*) as cnt')
                ->groupBy('date')
                ->pluck('cnt', 'date')
                ->toArray();

            $timeline = [];
            foreach (CarbonPeriod::create($start, $end) as $date) {
                $key = $date->format('Y-m-d');
                /** @var Carbon $localized */
                $localized = $date->locale('fr');
                $timeline[] = [
                    'date' => $localized->isoFormat('D MMM'),
                    'count' => $counts[$key] ?? 0,
                ];
            }

            return $timeline;
        });
    }

    public function getUserGrowth(int $months = 12): array
    {
        return Cache::remember("analytics:usergrowth:{$months}", self::CACHE_TTL, function () use ($months) {
            $start = now()->subMonths($months - 1)->startOfMonth();

            $counts = User::where('created_at', '>=', $start)
                ->pluck('created_at')
                ->groupBy(fn ($d) => $d->format('Y-n'))
                ->map->count();

            return collect(range($months - 1, 0))->map(function ($i) use ($counts) {
                $date = now()->subMonths($i);
                /** @var Carbon $localized */
                $localized = $date->locale('fr');

                return [
                    'label' => $localized->isoFormat('MMM'),
                    'count' => $counts->get($date->format('Y-n'), 0),
                ];
            })->values()->all();
        });
    }

    public static function clearCache(): void
    {
        foreach (['overview', 'webhooks', 'content', 'activity', 'usergrowth'] as $key) {
            foreach ([7, 30, 90, 12] as $param) {
                Cache::forget("analytics:{$key}:{$param}");
            }
        }
    }
}
