<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\ErrorMonitoring\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Modules\ErrorMonitoring\Models\ErrorLog;

class ErrorLogAdminController extends Controller
{
    public function index(Request $request): View
    {
        $query = ErrorLog::query();

        if ($request->filled('severity')) {
            $query->where('severity', $request->input('severity'));
        }

        if ($request->filled('status_code')) {
            $query->where('status_code', $request->input('status_code'));
        }

        $errors = $query->orderByDesc('last_occurred_at')->paginate(25);

        $stats = [
            'total' => ErrorLog::count(),
            'unresolved' => ErrorLog::unresolved()->count(),
            'critical_7d' => ErrorLog::critical()->recent(7)->count(),
        ];

        // Chart data: errors per day (30 days)
        $endDate = now();
        $startDate = now()->subDays(29);
        $dailyRaw = ErrorLog::selectRaw('DATE(last_occurred_at) as date, COUNT(*) as count')
            ->whereBetween('last_occurred_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('count', 'date');

        $errorsPerDay = ['labels' => [], 'data' => []];
        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $errorsPerDay['labels'][] = now()->subDays($i)->format('d M');
            $errorsPerDay['data'][] = (int) ($dailyRaw[$date] ?? 0);
        }

        // Chart data: by severity
        $severityRaw = ErrorLog::selectRaw('severity, COUNT(*) as count')
            ->groupBy('severity')
            ->pluck('count', 'severity');

        $errorsBySeverity = [
            'labels' => [__('Critique'), __('Warning'), __('Info')],
            'data' => [
                (int) ($severityRaw['critical'] ?? 0),
                (int) ($severityRaw['warning'] ?? 0),
                (int) ($severityRaw['info'] ?? 0),
            ],
        ];

        // Chart data: top 5 URLs
        $topUrlsRaw = ErrorLog::selectRaw('url, SUM(occurrence_count) as total')
            ->groupBy('url')
            ->orderByDesc('total')
            ->limit(5)
            ->pluck('total', 'url');

        $topUrls = [
            'labels' => $topUrlsRaw->keys()->map(fn ($u) => Str::limit($u, 30))->values()->all(),
            'data' => $topUrlsRaw->values()->map(fn ($v) => (int) $v)->all(),
        ];

        return view('errormonitoring::admin.index', compact('errors', 'stats', 'errorsPerDay', 'errorsBySeverity', 'topUrls'));
    }

    public function resolve(ErrorLog $errorLog): RedirectResponse
    {
        $errorLog->resolve();

        return back()->with('success', __('Erreur marquée comme résolue.'));
    }

    public function destroy(ErrorLog $errorLog): RedirectResponse
    {
        $errorLog->delete();

        return back()->with('success', __('Erreur supprimée.'));
    }
}
