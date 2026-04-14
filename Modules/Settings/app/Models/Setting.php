<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Settings\Models;

use Database\Factories\SettingFactory;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Laravel\Scout\Searchable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\ResponseCache\Facades\ResponseCache;

class Setting extends Model
{
    use HasFactory, LogsActivity, Searchable;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->useLogName('settings')
            ->setDescriptionForEvent(fn (string $eventName): string => "Paramètre {$eventName}");
    }

    protected static function booted(): void
    {
        static::saved(fn () => ResponseCache::clear());
        static::deleted(fn () => ResponseCache::clear());
    }

    protected static function newFactory(): SettingFactory
    {
        return SettingFactory::new();
    }

    protected $fillable = ['group', 'key', 'value', 'type', 'description', 'is_public'];

    protected $casts = [
        'is_public' => 'boolean',
    ];

    /**
     * @return array<string, mixed>
     */
    public function toSearchableArray(): array
    {
        return [
            'key' => $this->key,
            'value' => is_string($this->value) ? $this->value : null,
            'description' => $this->description,
            'group' => $this->group,
        ];
    }

    public function shouldBeSearchable(): bool
    {
        return ! in_array($this->group, ['security', 'secrets']);
    }

    public function getTypedValueAttribute(): mixed
    {
        $value = $this->isSecret() ? $this->decryptedValue() : $this->value;

        return match ($this->type) {
            'boolean' => filter_var($value, FILTER_VALIDATE_BOOLEAN),
            'integer' => (int) $value,
            'json' => json_decode($value ?? '{}', true),
            default => $value,
        };
    }

    public function isSecret(): bool
    {
        return $this->group === 'secrets';
    }

    private function decryptedValue(): ?string
    {
        if ($this->value === null) {
            return null;
        }

        try {
            return decrypt($this->value);
        } catch (DecryptException) {
            return $this->value;
        }
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return Cache::remember("setting.{$key}", config('cache-ttl.settings', 3600), function () use ($key, $default) {
            $setting = static::where('key', $key)->first();

            return $setting !== null ? $setting->typed_value : $default;
        });
    }

    public static function set(string $key, mixed $value, string $type = 'string', string $group = 'general'): self
    {
        $rawValue = is_array($value) ? json_encode($value) : (string) $value;

        $setting = static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $group === 'secrets' ? encrypt($rawValue) : $rawValue,
                'type' => $type,
                'group' => $group,
            ]
        );

        Cache::forget("setting.{$key}");

        return $setting;
    }
}
