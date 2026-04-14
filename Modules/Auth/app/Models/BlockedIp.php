<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Auth\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Database\Factories\BlockedIpFactory;

class BlockedIp extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'reason',
        'blocked_until',
        'auto_blocked',
    ];

    protected function casts(): array
    {
        return [
            'blocked_until' => 'datetime',
            'auto_blocked' => 'boolean',
        ];
    }

    public function isActive(): bool
    {
        if ($this->blocked_until === null) {
            return true;
        }

        return $this->blocked_until->isFuture();
    }

    public static function isBlocked(string $ip): bool
    {
        return self::where('ip_address', $ip)
            ->where(function ($query) {
                $query->whereNull('blocked_until')
                    ->orWhere('blocked_until', '>', now());
            })
            ->exists();
    }

    protected static function newFactory(): BlockedIpFactory
    {
        return BlockedIpFactory::new();
    }
}
