<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Backoffice\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DashboardUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public string $widget,
        public array $data,
        public ?int $teamId = null,
    ) {}

    public function broadcastOn(): PrivateChannel
    {
        return $this->teamId
            ? new PrivateChannel('dashboard.'.$this->teamId)
            : new PrivateChannel('dashboard');
    }

    /** @return array<string, mixed> */
    public function broadcastWith(): array
    {
        return [
            'widget' => $this->widget,
            'data' => $this->data,
            'updated_at' => now()->toIso8601String(),
        ];
    }

    public function broadcastAs(): string
    {
        return 'dashboard.updated';
    }
}
