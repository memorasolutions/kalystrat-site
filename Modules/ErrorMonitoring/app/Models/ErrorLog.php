<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\ErrorMonitoring\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\ErrorMonitoring\Database\Factories\ErrorLogFactory;

class ErrorLog extends Model
{
    use HasFactory;

    protected $table = 'error_logs';

    protected $fillable = [
        'fingerprint', 'exception_class', 'message', 'status_code',
        'url', 'method', 'ip_hash', 'user_agent', 'user_id',
        'severity', 'occurrence_count', 'last_occurred_at',
        'resolved_at', 'context', 'stack_trace',
    ];

    protected $casts = [
        'context' => 'array',
        'last_occurred_at' => 'datetime',
        'resolved_at' => 'datetime',
        'status_code' => 'integer',
        'occurrence_count' => 'integer',
    ];

    public function scopeUnresolved(Builder $query): Builder
    {
        return $query->whereNull('resolved_at');
    }

    public function scopeCritical(Builder $query): Builder
    {
        return $query->where('severity', 'critical');
    }

    public function scopeRecent(Builder $query, int $days = 7): Builder
    {
        return $query->where('last_occurred_at', '>=', now()->subDays($days));
    }

    public function resolve(): void
    {
        $this->update(['resolved_at' => now()]);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function newFactory(): ErrorLogFactory
    {
        return ErrorLogFactory::new();
    }
}
