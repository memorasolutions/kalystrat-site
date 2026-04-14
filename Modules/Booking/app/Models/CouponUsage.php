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
use Modules\Booking\Database\Factories\CouponUsageFactory;

class CouponUsage extends Model
{
    use HasFactory;

    protected $table = 'booking_coupon_usages';

    public $timestamps = false;

    protected $fillable = ['coupon_id', 'customer_id', 'appointment_id', 'discount_amount'];

    protected $casts = ['discount_amount' => 'decimal:2'];

    public function coupon(): BelongsTo
    {
        return $this->belongsTo(Coupon::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(BookingCustomer::class);
    }

    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }

    protected static function newFactory(): CouponUsageFactory
    {
        return CouponUsageFactory::new();
    }
}
