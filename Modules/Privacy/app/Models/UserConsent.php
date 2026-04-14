<?php

declare(strict_types=1);

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

namespace Modules\Privacy\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Modules\Privacy\Database\Factories\UserConsentFactory;

class UserConsent extends Model
{
    use HasFactory;

    protected $table = 'user_consents';

    protected $fillable = [
        'user_id',
        'consent_token',
        'ip_hash',
        'user_agent',
        'choices',
        'action',
        'type',
        'jurisdiction',
        'policy_version',
        'region_detected',
        'gpc_enabled',
        'expires_at',
    ];

    protected $casts = [
        'choices' => 'array',
        'gpc_enabled' => 'boolean',
        'expires_at' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('expires_at', '>', now());
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model', User::class));
    }

    public function scopeForUser($query, int $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeByJurisdiction($query, $jurisdiction)
    {
        return $query->where('jurisdiction', $jurisdiction);
    }

    public static function generateToken(): string
    {
        return Str::random(64);
    }

    public function isExpired(): bool
    {
        return $this->expires_at->isPast();
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->consent_token)) {
                $model->consent_token = self::generateToken();
            }
        });
    }

    protected static function newFactory(): UserConsentFactory
    {
        return UserConsentFactory::new();
    }
}
