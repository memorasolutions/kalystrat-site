<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Modules\Webhooks\Enums\WebhookEvent;
use Modules\Webhooks\Jobs\DispatchWebhookJob;
use Modules\Webhooks\Models\WebhookCall;
use Modules\Webhooks\Models\WebhookEndpoint;
use Modules\Webhooks\Services\WebhookService;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('webhook service is registered as singleton', function () {
    $service1 = app(WebhookService::class);
    $service2 = app(WebhookService::class);

    expect($service1)->toBeInstanceOf(WebhookService::class);
    expect($service1)->toBe($service2);
});

test('dispatch sends only to active endpoints', function () {
    Queue::fake();

    WebhookEndpoint::factory()->create(['is_active' => true, 'events' => null]);
    WebhookEndpoint::factory()->create(['is_active' => false, 'events' => null]);

    $count = app(WebhookService::class)->dispatch(WebhookEvent::ArticleCreated, ['id' => 1]);

    expect($count)->toBe(1);
    Queue::assertPushed(DispatchWebhookJob::class, 1);
});

test('dispatch filters by event type when endpoint specifies events', function () {
    Queue::fake();

    WebhookEndpoint::factory()->create([
        'is_active' => true,
        'events' => [WebhookEvent::ArticleCreated->value],
    ]);
    WebhookEndpoint::factory()->create([
        'is_active' => true,
        'events' => [WebhookEvent::OrderCreated->value],
    ]);

    $count = app(WebhookService::class)->dispatch(WebhookEvent::ArticleCreated, ['id' => 1]);

    expect($count)->toBe(1);
});

test('dispatch sends to catch-all endpoints with events null', function () {
    Queue::fake();

    WebhookEndpoint::factory()->create(['is_active' => true, 'events' => null]);
    WebhookEndpoint::factory()->create([
        'is_active' => true,
        'events' => [WebhookEvent::ArticleCreated->value],
    ]);

    $count = app(WebhookService::class)->dispatch(WebhookEvent::ArticleCreated, ['id' => 1]);

    expect($count)->toBe(2);
    Queue::assertPushed(DispatchWebhookJob::class, 2);
});

test('dispatch returns count of dispatched webhooks', function () {
    Queue::fake();

    WebhookEndpoint::factory()->count(3)->create(['is_active' => true, 'events' => null]);

    $count = app(WebhookService::class)->dispatch(WebhookEvent::ArticleCreated, ['id' => 1]);

    expect($count)->toBe(3);
});

test('dispatch does nothing when no matching endpoints', function () {
    Queue::fake();

    WebhookEndpoint::factory()->create(['is_active' => false]);
    WebhookEndpoint::factory()->create([
        'is_active' => true,
        'events' => [WebhookEvent::OrderCreated->value],
    ]);

    $count = app(WebhookService::class)->dispatch(WebhookEvent::ArticleCreated, ['id' => 1]);

    expect($count)->toBe(0);
    Queue::assertNotPushed(DispatchWebhookJob::class);
});

test('generateSignature returns consistent HMAC for same input', function () {
    $service = app(WebhookService::class);
    $payload = ['test' => true];
    $secret = 'my-secret';

    $sig1 = $service->generateSignature($payload, $secret);
    $sig2 = $service->generateSignature($payload, $secret);

    expect($sig1)->toBeString()->not->toBeEmpty();
    expect($sig1)->toBe($sig2);
});

test('generateSignature returns different values for different secrets', function () {
    $service = app(WebhookService::class);
    $payload = ['test' => true];

    $sig1 = $service->generateSignature($payload, 'secret-one');
    $sig2 = $service->generateSignature($payload, 'secret-two');

    expect($sig1)->not->toBe($sig2);
});

test('testEndpoint creates a webhook call', function () {
    Queue::fake();

    $endpoint = WebhookEndpoint::factory()->create(['is_active' => true]);
    $call = app(WebhookService::class)->testEndpoint($endpoint);

    expect($call)->toBeInstanceOf(WebhookCall::class);
    expect($call->webhook_endpoint_id)->toBe($endpoint->id);
});

test('retry dispatches job to queue', function () {
    Queue::fake();

    $endpoint = WebhookEndpoint::factory()->create();
    $call = WebhookCall::factory()->create([
        'webhook_endpoint_id' => $endpoint->id,
        'status' => 'failed',
    ]);

    app(WebhookService::class)->retry($call);

    Queue::assertPushed(DispatchWebhookJob::class);
});

test('webhook endpoint factory creates valid model', function () {
    $endpoint = WebhookEndpoint::factory()->create();

    expect($endpoint->url)->not->toBeEmpty();
    expect($endpoint->secret)->not->toBeEmpty();
    expect($endpoint)->toBeInstanceOf(WebhookEndpoint::class);
});

test('webhook call belongs to endpoint', function () {
    $endpoint = WebhookEndpoint::factory()->create();
    $call = WebhookCall::factory()->create(['webhook_endpoint_id' => $endpoint->id]);

    expect($call->webhookEndpoint->id)->toBe($endpoint->id);
});

test('dispatch creates a WebhookCall record for each endpoint', function () {
    Queue::fake();

    $endpoint = WebhookEndpoint::factory()->create(['is_active' => true, 'events' => null]);

    app(WebhookService::class)->dispatch(WebhookEvent::ArticleCreated, ['id' => 42]);

    $this->assertDatabaseHas('webhook_calls', [
        'webhook_endpoint_id' => $endpoint->id,
        'event' => WebhookEvent::ArticleCreated->value,
        'status' => WebhookCall::STATUS_PENDING,
    ]);
});

test('retry resets status to pending before dispatching', function () {
    Queue::fake();

    $endpoint = WebhookEndpoint::factory()->create();
    $call = WebhookCall::factory()->create([
        'webhook_endpoint_id' => $endpoint->id,
        'status' => WebhookCall::STATUS_FAILED,
    ]);

    app(WebhookService::class)->retry($call);

    $call->refresh();
    expect($call->status)->toBe(WebhookCall::STATUS_PENDING);
    Queue::assertPushed(DispatchWebhookJob::class);
});

test('generateSignature produces a 64-char hex HMAC-SHA256 string', function () {
    $service = app(WebhookService::class);
    $sig = $service->generateSignature(['foo' => 'bar'], 'secret');

    expect($sig)->toBeString()->toHaveLength(64);
    expect(ctype_xdigit($sig))->toBeTrue();
});

test('WebhookCall pending scope returns only pending records', function () {
    $endpoint = WebhookEndpoint::factory()->create();
    WebhookCall::factory()->create(['webhook_endpoint_id' => $endpoint->id, 'status' => WebhookCall::STATUS_PENDING]);
    WebhookCall::factory()->create(['webhook_endpoint_id' => $endpoint->id, 'status' => WebhookCall::STATUS_FAILED]);
    WebhookCall::factory()->create(['webhook_endpoint_id' => $endpoint->id, 'status' => WebhookCall::STATUS_SUCCESS]);

    expect(WebhookCall::pending()->count())->toBe(1);
    expect(WebhookCall::failed()->count())->toBe(1);
    expect(WebhookCall::successful()->count())->toBe(1);
});
