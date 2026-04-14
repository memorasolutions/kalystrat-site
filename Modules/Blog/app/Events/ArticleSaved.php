<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Blog\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ArticleSaved
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public int $articleId,
        public string $title,
        public ?string $content = null,
    ) {}
}
