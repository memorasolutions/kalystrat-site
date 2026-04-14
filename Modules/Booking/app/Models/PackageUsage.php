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
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Booking\Database\Factories\PackageUsageFactory;

class PackageUsage extends Model
{
    use HasFactory;

    protected $table = 'booking_package_usages';

    protected $fillable = ['purchase_id', 'appointment_id', 'used_at'];

    protected $casts = ['used_at' => 'datetime'];

    public function purchase(): BelongsTo
    {
        return $this->belongsTo(PackagePurchase::class);
    }

    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }

    protected static function newFactory(): PackageUsageFactory
    {
        return PackageUsageFactory::new();
    }
}
