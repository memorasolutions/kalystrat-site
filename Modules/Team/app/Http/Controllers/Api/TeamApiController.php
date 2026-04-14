<?php

declare(strict_types=1);

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

namespace Modules\Team\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Api\Http\Controllers\BaseApiController;
use Modules\Team\Http\Resources\TeamResource;
use Modules\Team\Models\Team;
use Modules\Team\Models\TeamInvitation;

class TeamApiController extends BaseApiController
{
    public function index(Request $request): JsonResponse
    {
        $teams = $request->user()
            ->teams()
            ->withCount('members')
            ->paginate(15);

        return $this->respondSuccess($teams);
    }

    public function show(Request $request, Team $team): JsonResponse
    {
        if (! $team->hasMember($request->user())) {
            return $this->respondForbidden();
        }

        $team->load('owner')->loadCount('members');

        return $this->respondSuccess(new TeamResource($team));
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
        ]);

        $team = Team::create([
            ...$validated,
            'owner_id' => $request->user()->id,
        ]);

        $team->members()->attach($request->user()->id, ['role' => 'owner']);

        return $this->respondCreated(new TeamResource($team));
    }

    public function invite(Request $request, Team $team): JsonResponse
    {
        if (! $team->isOwner($request->user())) {
            return $this->respondForbidden();
        }

        $validated = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'role' => ['nullable', 'string', 'in:admin,member'],
        ]);

        if ($team->invitations()->where('email', $validated['email'])->whereNull('accepted_at')->exists()) {
            return $this->respondError(__('Une invitation est déjà en attente pour cet email.'), 422);
        }

        TeamInvitation::create([
            'team_id' => $team->id,
            'email' => $validated['email'],
            'role' => $validated['role'] ?? 'member',
            'invited_by' => $request->user()->id,
            'expires_at' => now()->addDays(7),
        ]);

        return $this->respondCreated(null, __('Invitation envoyée.'));
    }
}
