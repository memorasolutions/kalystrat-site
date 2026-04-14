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
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\ShortUrl\Database\Factories\ShortUrlClickFactory;

class ShortUrlClick extends Model
{
    use HasFactory;

    protected $table = 'short_url_clicks';

    public $timestamps = false;

    protected $fillable = [
        'short_url_id',
        'ip_address',
        'referrer',
        'user_agent',
        'device_type',
        'browser',
        'os',
        'country_code',
        'city',
        'clicked_at',
    ];

    protected function casts(): array
    {
        return [
            'clicked_at' => 'datetime',
        ];
    }

    public function shortUrl(): BelongsTo
    {
        return $this->belongsTo(ShortUrl::class, 'short_url_id');
    }

    protected static function newFactory(): ShortUrlClickFactory
    {
        return ShortUrlClickFactory::new();
    }
}
