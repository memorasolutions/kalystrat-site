<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use Illuminate\Support\Facades\Broadcast;
use Modules\AI\Models\AiConversation;
use Modules\Team\Models\Team;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('dashboard', function ($user) {
    return $user->can('view_dashboard');
});

Broadcast::channel('dashboard.{teamId}', function ($user, $teamId) {
    if (class_exists(Team::class)) {
        return $user->teams()->where('teams.id', $teamId)->exists();
    }

    return $user->can('view_dashboard');
});

Broadcast::channel('team.{teamId}', function ($user, $teamId) {
    if (class_exists(Team::class)) {
        return $user->teams()->where('teams.id', $teamId)->exists();
    }

    return false;
});

Broadcast::channel('ai.agents', function ($user) {
    return $user->can('manage_ai') ? ['id' => $user->id, 'name' => $user->name] : false;
});

Broadcast::channel('ai.conversation.{conversationId}', function ($user, $conversationId) {
    /** @var AiConversation|null $conversation */
    $conversation = AiConversation::query()->find($conversationId);

    return $conversation && ((int) $conversation->user_id === (int) $user->id || (int) $conversation->agent_id === (int) $user->id);
});
