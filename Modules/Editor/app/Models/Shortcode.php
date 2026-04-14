<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Editor\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\HasActiveScope;
use Modules\Editor\Database\Factories\ShortcodeFactory;

class Shortcode extends Model
{
    use HasActiveScope, HasFactory;

    protected $table = 'shortcodes';

    protected $fillable = [
        'tag',
        'name',
        'description',
        'html_template',
        'parameters',
        'has_content',
        'is_active',
    ];

    protected $casts = [
        'parameters' => 'array',
        'has_content' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected static function newFactory(): ShortcodeFactory
    {
        return ShortcodeFactory::new();
    }
}
