<?php

declare(strict_types=1);

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

use Modules\Blog\Services\DiffService;
use Tests\TestCase;

uses(TestCase::class);

beforeEach(function () {
    $this->service = new DiffService;
});

test('diff returns unchanged for identical strings', function () {
    $diff = $this->service->diff('hello world', 'hello world');

    expect($diff)->toBe([
        ['type' => 'unchanged', 'text' => 'hello'],
        ['type' => 'unchanged', 'text' => 'world'],
    ]);
});

test('diff detects added words', function () {
    $diff = $this->service->diff('This is a text.', 'This is a new sample text.');

    expect($diff)->toBe([
        ['type' => 'unchanged', 'text' => 'This'],
        ['type' => 'unchanged', 'text' => 'is'],
        ['type' => 'unchanged', 'text' => 'a'],
        ['type' => 'added', 'text' => 'new'],
        ['type' => 'added', 'text' => 'sample'],
        ['type' => 'unchanged', 'text' => 'text.'],
    ]);
});

test('diff detects removed words', function () {
    $diff = $this->service->diff('This is a new sample text.', 'This is a text.');

    expect($diff)->toBe([
        ['type' => 'unchanged', 'text' => 'This'],
        ['type' => 'unchanged', 'text' => 'is'],
        ['type' => 'unchanged', 'text' => 'a'],
        ['type' => 'removed', 'text' => 'new'],
        ['type' => 'removed', 'text' => 'sample'],
        ['type' => 'unchanged', 'text' => 'text.'],
    ]);
});

test('diff strips HTML tags before comparing', function () {
    $diff = $this->service->diff('This is <b>bold</b> text.', 'This is <i>italic</i> text.');

    expect($diff)->toBe([
        ['type' => 'unchanged', 'text' => 'This'],
        ['type' => 'unchanged', 'text' => 'is'],
        ['type' => 'removed', 'text' => 'bold'],
        ['type' => 'added', 'text' => 'italic'],
        ['type' => 'unchanged', 'text' => 'text.'],
    ]);
});

test('diff handles empty strings', function () {
    $diff = $this->service->diff('', 'Some new text.');
    expect($diff)->each->toHaveKey('type', 'added');
    expect($diff)->toHaveCount(3);

    $diff = $this->service->diff('Some old text.', '');
    expect($diff)->each->toHaveKey('type', 'removed');
    expect($diff)->toHaveCount(3);

    $diff = $this->service->diff('', '');
    expect($diff)->toBe([]);
});

test('diffHtml returns proper HTML with ins tags for added words', function () {
    $html = $this->service->diffHtml('This is a text.', 'This is a new text.');

    expect($html)->toContain('<ins class="diff-added">new</ins>');
    expect($html)->toContain('This');
    expect($html)->not->toContain('<del');
});

test('diffHtml returns proper HTML with del tags for removed words', function () {
    $html = $this->service->diffHtml('This is a old text.', 'This is a text.');

    expect($html)->toContain('<del class="diff-removed">old</del>');
    expect($html)->not->toContain('<ins');
});

test('diffHtml handles both empty strings', function () {
    $html = $this->service->diffHtml('', '');

    expect($html)->toBe('');
});
