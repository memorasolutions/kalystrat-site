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
    public function up(): void
    {
        Schema::table('ai_conversations', function (Blueprint $table) {
            $table->string('visitor_token', 72)->nullable()->after('session_id');
            $table->index('visitor_token');
        });
    }

    public function down(): void
    {
        Schema::table('ai_conversations', function (Blueprint $table) {
            $table->dropIndex(['visitor_token']);
            $table->dropColumn('visitor_token');
        });
    }
};
