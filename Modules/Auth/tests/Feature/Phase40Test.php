<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    Role::firstOrCreate(['name' => 'super_admin']);
    Role::firstOrCreate(['name' => 'admin']);
    Role::firstOrCreate(['name' => 'user']);
});

it('unauthenticated user redirected from dashboard', function () {
    $this->get('/dashboard')->assertRedirect('/login');
});

it('authenticated user can access dashboard', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->get('/dashboard')
        ->assertStatus(200)
        ->assertSee('Tableau de bord');
});

it('dashboard shows user name', function () {
    $user = User::factory()->create(['name' => 'Jean Dupont']);
    $this->actingAs($user)->get('/dashboard')
        ->assertSee('Jean Dupont');
});

it('authenticated user can access profile page', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->get('/user/profile')
        ->assertStatus(200)
        ->assertSee('Mon profil');
});

it('user can update profile', function () {
    $user = User::factory()->create(['name' => 'Old Name']);
    $this->actingAs($user)
        ->put('/user/profile', ['name' => 'New Name', 'email' => $user->email])
        ->assertRedirect();

    expect($user->fresh()->name)->toBe('New Name');
});

it('user cannot update profile with invalid email', function () {
    $user = User::factory()->create();
    $this->actingAs($user)
        ->put('/user/profile', ['name' => 'Test', 'email' => 'not-valid'])
        ->assertSessionHasErrors('email');
});

it('user can update password with correct current password', function () {
    $user = User::factory()->create(['password' => bcrypt('currentpass')]);
    $this->actingAs($user)
        ->put('/user/password', [
            'current_password' => 'currentpass',
            'password' => 'newpassword123',
            'password_confirmation' => 'newpassword123',
        ])
        ->assertRedirect();

    expect(Hash::check('newpassword123', $user->fresh()->password))->toBeTrue();
});

it('user cannot update password with wrong current password', function () {
    $user = User::factory()->create(['password' => bcrypt('realpass')]);
    $this->actingAs($user)
        ->put('/user/password', [
            'current_password' => 'wrongpass',
            'password' => 'newpassword123',
            'password_confirmation' => 'newpassword123',
        ])
        ->assertSessionHasErrors('current_password');
});
