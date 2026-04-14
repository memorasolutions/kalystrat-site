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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Modules\Api\Http\Controllers\BaseApiController;
use Spatie\QueryBuilder\QueryBuilder;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('base api controller exists', function () {
    expect(class_exists(BaseApiController::class))->toBeTrue();
});

test('base api controller success response format', function () {
    $controller = new BaseApiController;
    $method = new ReflectionMethod($controller, 'respondSuccess');

    $response = $method->invoke($controller, ['key' => 'value'], 'OK', 200);

    expect($response->getStatusCode())->toBe(200);

    $data = json_decode($response->getContent(), true);
    expect($data['success'])->toBeTrue();
    expect($data['message'])->toBe('OK');
    expect($data['data'])->toBe(['key' => 'value']);
});

test('base api controller error response format', function () {
    $controller = new BaseApiController;
    $method = new ReflectionMethod($controller, 'respondError');

    $response = $method->invoke($controller, 'Bad request', 400, ['field' => 'required']);

    expect($response->getStatusCode())->toBe(400);

    $data = json_decode($response->getContent(), true);
    expect($data['success'])->toBeFalse();
    expect($data['message'])->toBe('Bad request');
    expect($data['errors'])->toBe(['field' => 'required']);
});

test('base api controller created response', function () {
    $controller = new BaseApiController;
    $method = new ReflectionMethod($controller, 'respondCreated');

    $response = $method->invoke($controller, ['id' => 1]);

    expect($response->getStatusCode())->toBe(201);
});

test('query builder package is available', function () {
    expect(class_exists(QueryBuilder::class))->toBeTrue();
});

test('api login returns sanctum token for valid credentials', function () {
    $this->seed(RolesAndPermissionsSeeder::class);
    $user = User::factory()->create([
        'email' => 'api_test@example.com',
        'password' => Hash::make('password123'),
    ]);
    $user->assignRole('user');

    $response = $this->postJson('/api/v1/login', [
        'email' => 'api_test@example.com',
        'password' => 'password123',
    ]);

    $response->assertOk()
        ->assertJsonPath('success', true)
        ->assertJsonStructure(['data' => ['token', 'user']]);
});

test('api user endpoint requires sanctum authentication', function () {
    // Without token the endpoint should return 401
    $response = $this->getJson('/api/v1/user');

    $response->assertUnauthorized();
});

test('api user endpoint returns user data with valid sanctum token', function () {
    $this->seed(RolesAndPermissionsSeeder::class);
    $user = User::factory()->create();
    $user->assignRole('user');
    $token = $user->createToken('test-token')->plainTextToken;

    $response = $this->withToken($token)->getJson('/api/v1/user');

    $response->assertOk()
        ->assertJsonPath('success', true);
});

test('api login rate limiting middleware is configured on login route', function () {
    // Verify the throttle:login middleware is applied by inspecting the route
    $route = Route::getRoutes()->getByName(null);
    $loginRoute = collect(Route::getRoutes())
        ->first(fn ($r) => $r->uri() === 'api/v1/login' && in_array('POST', $r->methods()));

    expect($loginRoute)->not->toBeNull();

    $middlewares = $loginRoute->gatherMiddleware();
    $hasThrottle = collect($middlewares)->contains(
        fn ($m) => str_contains($m, 'throttle')
    );
    expect($hasThrottle)->toBeTrue();
});
