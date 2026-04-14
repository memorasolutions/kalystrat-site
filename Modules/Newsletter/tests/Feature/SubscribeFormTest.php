<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, LazilyRefreshDatabase::class);

it('renders subscribe form with newsletter route', function () {
    $view = $this->blade('<x-newsletter::subscribe-form />');
    $view->assertSee('newsletter-subscribe');
    $view->assertSee('name="email"', false);
});

it('renders custom title when provided', function () {
    $view = $this->blade('<x-newsletter::subscribe-form title="Abonnez-vous" />');
    $view->assertSee('Abonnez-vous');
});

it('renders custom button text', function () {
    $view = $this->blade('<x-newsletter::subscribe-form buttonText="Go" />');
    $view->assertSee('Go');
});

it('shows success message from session', function () {
    session()->flash('newsletter_success', 'Merci pour votre inscription');
    $view = $this->blade('<x-newsletter::subscribe-form />');
    $view->assertSee('Merci pour votre inscription');
});
