<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private array $tables = [
        'magic_login_tokens',
        'booking_waitlist',
        'booking_packages',
        'booking_gift_cards',
        'booking_admin_calendars',
        'ecommerce_coupons',
        'user_consents',
        'team_invitations',
    ];

    public function up(): void
    {
        foreach ($this->tables as $table) {
            if (Schema::hasTable($table) && Schema::hasColumn($table, 'expires_at')) {
                try {
                    Schema::table($table, fn (Blueprint $t) => $t->index('expires_at'));
                } catch (Throwable) {
                    // Index may already exist
                }
            }
        }
    }

    public function down(): void
    {
        foreach ($this->tables as $table) {
            if (Schema::hasTable($table) && Schema::hasColumn($table, 'expires_at')) {
                try {
                    Schema::table($table, fn (Blueprint $t) => $t->dropIndex([$table.'_expires_at_index']));
                } catch (Throwable) {
                    // Index may not exist
                }
            }
        }
    }
};
