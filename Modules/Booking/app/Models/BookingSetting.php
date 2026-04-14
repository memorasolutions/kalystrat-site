<?php

declare(strict_types=1);

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

namespace Modules\Booking\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Booking\Database\Factories\BookingSettingFactory;

class BookingSetting extends Model
{
    use HasFactory;

    protected $table = 'booking_settings';

    protected $fillable = ['key', 'value'];

    public static function get(string $key, mixed $default = null): mixed
    {
        $setting = static::where('key', $key)->first();

        return $setting ? $setting->value : $default;
    }

    public static function set(string $key, mixed $value): void
    {
        static::updateOrCreate(
            ['key' => $key],
            ['value' => is_array($value) ? json_encode($value) : $value]
        );
    }

    protected static function newFactory(): BookingSettingFactory
    {
        return BookingSettingFactory::new();
    }
}
