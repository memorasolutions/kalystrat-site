<?php

declare(strict_types=1);

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

namespace Modules\Booking\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Booking\Models\Appointment;

/** @mixin Appointment */
class AppointmentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'start_at' => $this->start_at->toIso8601String(),
            'end_at' => $this->end_at->toIso8601String(),
            'status' => $this->status,
            'notes' => $this->notes,
            'payment_status' => $this->payment_status,
            'amount_paid' => $this->amount_paid ? (float) $this->amount_paid : null,
            'created_at' => $this->created_at->toIso8601String(),
            'service' => $this->when($this->relationLoaded('service'), fn () => [
                'id' => $this->service->id,
                'name' => $this->service->name,
                'duration' => $this->service->duration,
                'price' => (float) $this->service->price,
            ]),
            'customer' => $this->when($this->relationLoaded('customer'), fn () => [
                'id' => $this->customer->id,
                'full_name' => $this->customer->full_name,
                'email' => $this->customer->email,
                'phone' => $this->customer->phone,
            ]),
        ];
    }
}
