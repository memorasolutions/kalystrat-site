<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Modules\Testimonials\Models\Testimonial;
use Tests\TestCase;

uses(TestCase::class, LazilyRefreshDatabase::class);

it('returns 200 on testimonials public page', function () {
    $this->get(route('testimonials.show'))
        ->assertOk();
});

it('displays approved testimonials', function () {
    $approved = Testimonial::factory()->create(['is_approved' => true, 'author_name' => 'Jean Dupont']);

    $this->get(route('testimonials.show'))
        ->assertOk()
        ->assertSee('Jean Dupont');
});

it('does not display unapproved testimonials', function () {
    Testimonial::factory()->create(['is_approved' => false, 'author_name' => 'Hidden Author']);

    $this->get(route('testimonials.show'))
        ->assertOk()
        ->assertDontSee('Hidden Author');
});

it('shows empty message when no testimonials exist', function () {
    $this->get(route('testimonials.show'))
        ->assertOk()
        ->assertSee(__('Aucun temoignage pour le moment.'));
});

it('renders testimonials-carousel component in grid layout', function () {
    Testimonial::factory()->count(3)->create(['is_approved' => true]);

    $view = $this->blade('<x-testimonials::testimonials-carousel layout="grid" :limit="3" />');

    $view->assertSee('row-cols-md-3');
    $view->assertSee('testimonials-section');
});

it('renders testimonials-carousel component in carousel layout', function () {
    Testimonial::factory()->count(3)->create(['is_approved' => true]);

    $view = $this->blade('<x-testimonials::testimonials-carousel layout="carousel" :limit="3" />');

    $view->assertSee('carousel slide');
    $view->assertSee('carousel-control-prev');
});

it('renders empty when no approved testimonials for component', function () {
    Testimonial::factory()->create(['is_approved' => false]);

    $view = $this->blade('<x-testimonials::testimonials-carousel />');

    $view->assertDontSee('testimonials-section');
});
