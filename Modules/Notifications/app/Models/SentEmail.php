<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Notifications\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Notifications\Database\Factories\SentEmailFactory;

class SentEmail extends Model
{
    use HasFactory;

    protected $fillable = [
        'to',
        'subject',
        'mailable_class',
        'status',
        'sent_at',
    ];

    protected function casts(): array
    {
        return [
            'sent_at' => 'datetime',
        ];
    }

    protected static function newFactory(): SentEmailFactory
    {
        return SentEmailFactory::new();
    }
}
