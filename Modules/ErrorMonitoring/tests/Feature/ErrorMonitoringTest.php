<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Modules\ErrorMonitoring\Models\ErrorLog;
use Modules\ErrorMonitoring\Services\ErrorMonitoringService;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $this->admin = User::factory()->create();
    $this->admin->assignRole('super_admin');
});

test('ErrorLog factory crée un enregistrement', function () {
    $log = ErrorLog::factory()->create();

    expect($log->exists)->toBeTrue()
        ->and($log->fingerprint)->toHaveLength(64);
});

test('scope unresolved filtre correctement', function () {
    ErrorLog::factory()->create(['resolved_at' => now()]);
    ErrorLog::factory()->create(['resolved_at' => null]);

    expect(ErrorLog::unresolved()->count())->toBe(1);
});

test('scope critical filtre correctement', function () {
    ErrorLog::factory()->create(['severity' => 'info']);
    ErrorLog::factory()->critical()->create();

    expect(ErrorLog::critical()->count())->toBe(1);
});

test('resolve() met resolved_at', function () {
    $log = ErrorLog::factory()->create();
    $log->resolve();

    expect($log->fresh()->resolved_at)->not->toBeNull();
});

test('generateFingerprint est déterministe', function () {
    $service = app(ErrorMonitoringService::class);
    $exception = new RuntimeException('Test error');
    $request = Request::create('/test-path', 'GET');

    $fp1 = $service->generateFingerprint($exception, $request);
    $fp2 = $service->generateFingerprint($exception, $request);

    expect($fp1)->toBe($fp2)
        ->and($fp1)->toMatch('/^[a-f0-9]{64}$/');
});

test('shouldCapture retourne false si module désactivé', function () {
    config(['errormonitoring.enabled' => false]);
    $service = app(ErrorMonitoringService::class);

    $exception = new NotFoundHttpException;
    $request = Request::create('/test', 'GET');

    expect($service->shouldCapture($exception, $request))->toBeFalse();
});

test('admin index accessible par super_admin', function () {
    $this->actingAs($this->admin)
        ->get(route('admin.error-monitoring.index'))
        ->assertOk();
});

test('admin resolve marque l\'erreur résolue', function () {
    $log = ErrorLog::factory()->create();

    $this->actingAs($this->admin)
        ->post(route('admin.error-monitoring.resolve', $log))
        ->assertRedirect();

    expect($log->fresh()->resolved_at)->not->toBeNull();
});

test('capture() crée un ErrorLog avec fingerprint et contexte', function () {
    $service = app(ErrorMonitoringService::class);
    $exception = new HttpException(500, 'Server Error');
    $request = Request::create('/test-capture', 'POST', ['email' => 'test@test.com']);

    $errorLog = $service->capture($exception, $request);

    expect($errorLog)->toBeInstanceOf(ErrorLog::class)
        ->and($errorLog->status_code)->toBe(500)
        ->and($errorLog->severity)->toBe('critical')
        ->and($errorLog->method)->toBe('POST')
        ->and($errorLog->fingerprint)->toMatch('/^[a-f0-9]{64}$/');
});

test('shouldCapture retourne false pour HEAD requests sur 404', function () {
    config(['errormonitoring.enabled' => true]);
    $service = app(ErrorMonitoringService::class);

    $exception = new NotFoundHttpException;
    $request = Request::create('/test', 'HEAD');

    expect($service->shouldCapture($exception, $request))->toBeFalse();
});

test('shouldCapture retourne false pour chemins exclus (wp-admin)', function () {
    config(['errormonitoring.enabled' => true]);
    $service = app(ErrorMonitoringService::class);

    $exception = new NotFoundHttpException;
    $request = Request::create('/wp-admin', 'GET');

    expect($service->shouldCapture($exception, $request))->toBeFalse();
});

test('shouldCapture retourne false pour assets (.css, .js)', function () {
    config(['errormonitoring.enabled' => true]);
    $service = app(ErrorMonitoringService::class);

    $exception = new NotFoundHttpException;
    $request = Request::create('/css/app.css', 'GET');

    expect($service->shouldCapture($exception, $request))->toBeFalse();
});

test('shouldCapture retourne false pour bots (Googlebot)', function () {
    config(['errormonitoring.enabled' => true]);
    $service = app(ErrorMonitoringService::class);

    $exception = new NotFoundHttpException;
    $request = Request::create('/page', 'GET');
    $request->headers->set('User-Agent', 'Googlebot/2.1 (+http://www.google.com/bot.html)');

    expect($service->shouldCapture($exception, $request))->toBeFalse();
});

test('shouldCapture throttle les duplicats (cache fingerprint)', function () {
    config(['errormonitoring.enabled' => true]);
    $service = app(ErrorMonitoringService::class);

    $exception = new HttpException(500, 'Duplicate');
    $request = Request::create('/duplicate', 'GET');

    // Premier appel : capture
    $service->capture($exception, $request);
    // Deuxième appel : throttled
    expect($service->shouldCapture($exception, $request))->toBeFalse();
});

test('scrubContext() retire password et _token', function () {
    $service = app(ErrorMonitoringService::class);

    $request = Request::create('/test', 'POST', [
        'email' => 'test@example.com',
        'password' => 'secret123',
        '_token' => 'csrf-token',
        'name' => 'John',
    ]);

    $scrubbed = $service->scrubContext($request);

    expect($scrubbed)->toHaveKey('email')
        ->and($scrubbed)->toHaveKey('name')
        ->and($scrubbed)->not->toHaveKey('password')
        ->and($scrubbed)->not->toHaveKey('_token');
});

test('notifyWebhooks envoie vers Slack si configuré', function () {
    config([
        'errormonitoring.enabled' => true,
        'errormonitoring.notify_channels' => ['slack'],
        'errormonitoring.slack_webhook_url' => 'https://hooks.slack.com/test',
    ]);

    Http::fake([
        'hooks.slack.com/*' => Http::response('ok', 200),
    ]);

    $service = app(ErrorMonitoringService::class);
    $exception = new HttpException(500, 'Slack test');
    $request = Request::create('/slack-test', 'GET');

    $service->capture($exception, $request);

    Http::assertSent(function ($req) {
        return str_contains($req->url(), 'hooks.slack.com') && str_contains($req->body(), 'Slack test');
    });
});

test('notifyWebhooks ne fait rien si aucun webhook configuré', function () {
    config([
        'errormonitoring.enabled' => true,
        'errormonitoring.notify_channels' => ['slack', 'discord'],
        'errormonitoring.slack_webhook_url' => null,
        'errormonitoring.discord_webhook_url' => null,
    ]);

    Http::fake();

    $service = app(ErrorMonitoringService::class);
    $exception = new HttpException(500, 'No webhook');
    $request = Request::create('/no-webhook', 'GET');

    $service->capture($exception, $request);

    Http::assertNothingSent();
});

test('resolveStatusCode retourne 500 pour exceptions génériques', function () {
    $service = app(ErrorMonitoringService::class);

    expect($service->resolveStatusCode(new RuntimeException('oops')))->toBe(500);
    expect($service->resolveStatusCode(
        new NotFoundHttpException
    ))->toBe(404);
});
