<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\ShortUrl\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Core\Traits\HasActiveScope;
use Modules\ShortUrl\Database\Factories\ShortUrlDomainFactory;

class ShortUrlDomain extends Model
{
    use HasActiveScope, HasFactory;

    protected $table = 'short_url_domains';

    protected $fillable = [
        'domain',
        'is_default',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_default' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function shortUrls(): HasMany
    {
        return $this->hasMany(ShortUrl::class, 'domain_id');
    }

    protected static function newFactory(): ShortUrlDomainFactory
    {
        return ShortUrlDomainFactory::new();
    }
}
