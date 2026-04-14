<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Privacy\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Modules\Privacy\Models\RightsRequest;

class RightsRequestAdminController extends Controller
{
    public function index(Request $request): View
    {
        $rightsRequests = RightsRequest::query()
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->input('status')))
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $overdue_count = RightsRequest::overdue()->count();

        return view('privacy::admin.rights-requests.index', compact('rightsRequests', 'overdue_count'));
    }

    public function show(RightsRequest $rightsRequest): View
    {
        return view('privacy::admin.rights-requests.show', compact('rightsRequest'));
    }

    public function updateStatus(Request $request, RightsRequest $rightsRequest): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|in:processing,completed,rejected',
            'admin_notes' => 'nullable|string|max:5000',
        ]);

        if ($validated['status'] === 'completed') {
            $validated['responded_at'] = now();
        }

        $rightsRequest->update($validated);

        return redirect()->back()->with('success', __('Statut de la demande mis à jour.'));
    }
}
