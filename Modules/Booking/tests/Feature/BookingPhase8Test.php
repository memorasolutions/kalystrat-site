<?php

declare(strict_types=1);
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Booking\Models\Appointment;
use Modules\Booking\Models\BookingCustomer;
use Modules\Booking\Models\BookingService;
use Modules\Booking\Services\TherapistAssignmentService;
use Tests\TestCase;

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */
uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $this->admin = User::factory()->create();
    $this->admin->givePermissionTo('manage_booking');

    $this->therapist1 = User::factory()->create(['name' => 'Thérapeute A']);
    $this->therapist1->givePermissionTo('manage_booking');

    $this->therapist2 = User::factory()->create(['name' => 'Thérapeute B']);
    $this->therapist2->givePermissionTo('manage_booking');

    $this->customer = BookingCustomer::factory()->create();
    $this->service = BookingService::factory()->create();
});

it('TherapistAssignmentService returns users with manage_booking permission', function () {
    $service = app(TherapistAssignmentService::class);
    $therapists = $service->getTherapists();

    // admin + therapist1 + therapist2 all have manage_booking
    expect($therapists)->toHaveCount(3);
});

it('TherapistAssignmentService assigns a therapist to appointment', function () {
    $appointment = Appointment::factory()->create([
        'customer_id' => $this->customer->id,
        'service_id' => $this->service->id,
    ]);

    $service = app(TherapistAssignmentService::class);
    $service->assign($appointment, $this->therapist1->id);

    $appointment->refresh();
    expect($appointment->assigned_admin_id)->toBe($this->therapist1->id);
});

it('TherapistAssignmentService unassigns a therapist', function () {
    $appointment = Appointment::factory()->create([
        'customer_id' => $this->customer->id,
        'service_id' => $this->service->id,
        'assigned_admin_id' => $this->therapist1->id,
    ]);

    $service = app(TherapistAssignmentService::class);
    $service->unassign($appointment);

    $appointment->refresh();
    expect($appointment->assigned_admin_id)->toBeNull();
});

it('auto-assign picks therapist with fewest appointments on same day', function () {
    $date = now()->addDays(5);

    // Give therapist1 2 appointments on the day
    Appointment::factory()->count(2)->create([
        'customer_id' => $this->customer->id,
        'service_id' => $this->service->id,
        'assigned_admin_id' => $this->therapist1->id,
        'start_at' => $date->copy()->setTime(10, 0),
        'end_at' => $date->copy()->setTime(11, 0),
        'status' => 'confirmed',
    ]);

    // therapist2 has 0 appointments on that day
    $newAppointment = Appointment::factory()->create([
        'customer_id' => $this->customer->id,
        'service_id' => $this->service->id,
        'start_at' => $date->copy()->setTime(14, 0),
        'end_at' => $date->copy()->setTime(15, 0),
    ]);

    $service = app(TherapistAssignmentService::class);
    $assignedId = $service->autoAssign($newAppointment);

    // Should pick someone with 0 appointments (admin or therapist2, not therapist1 who has 2)
    expect($assignedId)->not->toBe($this->therapist1->id);
});

it('admin can assign therapist via route', function () {
    $appointment = Appointment::factory()->create([
        'customer_id' => $this->customer->id,
        'service_id' => $this->service->id,
    ]);

    $response = $this->actingAs($this->admin)->put(
        route('admin.booking.appointments.assign', $appointment),
        ['assigned_admin_id' => $this->therapist1->id]
    );

    $response->assertRedirect();
    $appointment->refresh();
    expect($appointment->assigned_admin_id)->toBe($this->therapist1->id);
});

it('appointments index can filter by therapist', function () {
    Appointment::factory()->create([
        'customer_id' => $this->customer->id,
        'service_id' => $this->service->id,
        'assigned_admin_id' => $this->therapist1->id,
    ]);

    Appointment::factory()->create([
        'customer_id' => $this->customer->id,
        'service_id' => $this->service->id,
        'assigned_admin_id' => $this->therapist2->id,
    ]);

    $response = $this->actingAs($this->admin)->get(
        route('admin.booking.appointments.index', ['therapist' => $this->therapist1->id])
    );

    $response->assertOk();
    $response->assertViewHas('appointments', function ($paginator) {
        return $paginator->total() === 1;
    });
});

it('appointments index returns therapists list for filter dropdown', function () {
    $response = $this->actingAs($this->admin)->get(route('admin.booking.appointments.index'));

    $response->assertOk();
    $response->assertViewHas('therapists');
});
