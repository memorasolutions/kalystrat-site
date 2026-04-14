<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Modules\Auth\Livewire\ForgotPassword;
use Modules\Auth\Livewire\Login;
use Modules\Auth\Livewire\OnboardingWizard;
use Modules\Auth\Livewire\Register;
use Modules\Auth\Livewire\ResetPassword;
use Modules\Auth\Livewire\TwoFactorChallenge;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $this->seed(RolesAndPermissionsSeeder::class);
});

// ── Login ───────────────────────────────────────────────────────────────

it('renders login component', function () {
    Livewire::test(Login::class)
        ->assertStatus(200);
});

it('login validates required fields', function () {
    Livewire::test(Login::class)
        ->set('email', '')
        ->set('password', '')
        ->call('authenticate')
        ->assertHasErrors(['email', 'password']);
});

it('login validates email format', function () {
    Livewire::test(Login::class)
        ->set('email', 'not-an-email')
        ->set('password', 'password123')
        ->call('authenticate')
        ->assertHasErrors(['email']);
});

// ── Register ────────────────────────────────────────────────────────────

it('renders register component', function () {
    Livewire::test(Register::class)
        ->assertStatus(200);
});

it('register validates required fields', function () {
    Livewire::test(Register::class)
        ->set('name', '')
        ->set('email', '')
        ->set('password', '')
        ->call('register')
        ->assertHasErrors(['name', 'email', 'password']);
});

it('register validates unique email', function () {
    User::factory()->create(['email' => 'taken@example.com']);

    Livewire::test(Register::class)
        ->set('name', 'Test')
        ->set('email', 'taken@example.com')
        ->set('password', 'Password1!')
        ->set('password_confirmation', 'Password1!')
        ->call('register')
        ->assertHasErrors(['email']);
});

it('register validates password confirmation', function () {
    Livewire::test(Register::class)
        ->set('name', 'Test')
        ->set('email', 'new@example.com')
        ->set('password', 'Password1!')
        ->set('password_confirmation', 'different')
        ->call('register')
        ->assertHasErrors(['password']);
});

// ── ForgotPassword ──────────────────────────────────────────────────────

it('renders forgot password component', function () {
    Livewire::test(ForgotPassword::class)
        ->assertStatus(200);
});

it('forgot password validates email', function () {
    Livewire::test(ForgotPassword::class)
        ->set('email', '')
        ->call('sendResetLink')
        ->assertHasErrors(['email']);
});

it('forgot password validates email format', function () {
    Livewire::test(ForgotPassword::class)
        ->set('email', 'not-valid')
        ->call('sendResetLink')
        ->assertHasErrors(['email']);
});

// ── ResetPassword ───────────────────────────────────────────────────────

it('renders reset password component', function () {
    Livewire::test(ResetPassword::class, ['token' => 'fake-token'])
        ->assertStatus(200);
});

it('reset password validates required fields', function () {
    Livewire::test(ResetPassword::class, ['token' => 'fake-token'])
        ->set('email', '')
        ->set('password', '')
        ->call('resetPassword')
        ->assertHasErrors(['email', 'password']);
});

it('reset password validates password confirmation', function () {
    Livewire::test(ResetPassword::class, ['token' => 'fake-token'])
        ->set('email', 'test@example.com')
        ->set('password', 'NewPassword1!')
        ->set('password_confirmation', 'different')
        ->call('resetPassword')
        ->assertHasErrors(['password']);
});

// ── TwoFactorChallenge ──────────────────────────────────────────────────

it('renders two factor challenge component', function () {
    Livewire::test(TwoFactorChallenge::class)
        ->assertStatus(200);
});

it('two factor challenge can toggle recovery mode', function () {
    Livewire::test(TwoFactorChallenge::class)
        ->assertSet('usingRecoveryCode', false)
        ->call('toggleRecoveryMode')
        ->assertSet('usingRecoveryCode', true)
        ->call('toggleRecoveryMode')
        ->assertSet('usingRecoveryCode', false);
});

it('two factor challenge resets fields on toggle', function () {
    Livewire::test(TwoFactorChallenge::class)
        ->set('code', '123456')
        ->call('toggleRecoveryMode')
        ->assertSet('code', '')
        ->assertSet('recoveryCode', '');
});

// ── OnboardingWizard ────────────────────────────────────────────────────

it('renders onboarding wizard', function () {
    $user = User::factory()->create(['onboarding_step' => 0]);

    Livewire::actingAs($user)
        ->test(OnboardingWizard::class)
        ->assertStatus(200)
        ->assertSet('step', 0);
});

it('onboarding wizard can complete step', function () {
    $user = User::factory()->create(['onboarding_step' => 0]);

    Livewire::actingAs($user)
        ->test(OnboardingWizard::class)
        ->call('completeStep', 1)
        ->assertSet('step', 1);

    expect($user->fresh()->onboarding_step)->toBe(1);
});

it('onboarding wizard can save profile', function () {
    $user = User::factory()->create(['onboarding_step' => 1, 'bio' => '']);

    Livewire::actingAs($user)
        ->test(OnboardingWizard::class)
        ->set('bio', 'My new bio')
        ->call('saveProfile')
        ->assertSet('step', 2);

    expect($user->fresh()->bio)->toBe('My new bio');
});

it('onboarding wizard can skip to step', function () {
    $user = User::factory()->create(['onboarding_step' => 0]);

    Livewire::actingAs($user)
        ->test(OnboardingWizard::class)
        ->call('skipToStep', 3)
        ->assertSet('step', 3);

    expect($user->fresh()->onboarding_step)->toBe(3);
});

it('onboarding wizard can complete', function () {
    $user = User::factory()->create(['onboarding_step' => 4]);

    Livewire::actingAs($user)
        ->test(OnboardingWizard::class)
        ->call('complete')
        ->assertSet('dismissed', true);

    expect($user->fresh()->onboarding_completed_at)->not->toBeNull();
    expect($user->fresh()->onboarding_step)->toBe(5);
});
