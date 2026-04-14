<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Modules\Booking\Livewire\BookingWizard;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('renders booking wizard', function () {
    Livewire::test(BookingWizard::class)
        ->assertStatus(200)
        ->assertSet('step', 1);
});

it('booking wizard starts at step 1', function () {
    Livewire::test(BookingWizard::class)
        ->assertSet('step', 1)
        ->assertSet('selectedServiceId', null)
        ->assertSet('selectedDate', null)
        ->assertSet('selectedTime', null);
});

it('booking wizard can go back', function () {
    Livewire::test(BookingWizard::class)
        ->set('step', 3)
        ->call('goBack')
        ->assertSet('step', 2)
        ->call('goBack')
        ->assertSet('step', 1)
        ->call('goBack')
        ->assertSet('step', 1);
});

it('booking wizard can select time', function () {
    Livewire::test(BookingWizard::class)
        ->call('selectTime', '14:00')
        ->assertSet('selectedTime', '14:00');
});

it('booking wizard validates required fields on submit', function () {
    Livewire::test(BookingWizard::class)
        ->set('firstName', '')
        ->set('lastName', '')
        ->set('email', '')
        ->call('submitBooking')
        ->assertHasErrors(['selectedTime', 'firstName', 'lastName', 'email']);
});
