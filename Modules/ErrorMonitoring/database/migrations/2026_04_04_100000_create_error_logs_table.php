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
        Schema::create('error_logs', function (Blueprint $table) {
            $table->id();
            $table->string('fingerprint', 64)->unique();
            $table->string('exception_class', 255);
            $table->text('message');
            $table->smallInteger('status_code')->default(500);
            $table->string('url', 2048);
            $table->string('method', 10);
            $table->string('ip_hash', 64)->nullable();
            $table->string('user_agent', 500)->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('severity', 10)->default('warning');
            $table->unsignedInteger('occurrence_count')->default(1);
            $table->timestamp('last_occurred_at');
            $table->timestamp('resolved_at')->nullable();
            $table->json('context')->nullable();
            $table->longText('stack_trace')->nullable();
            $table->timestamps();

            $table->index('status_code');
            $table->index('severity');
            $table->index('last_occurred_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('error_logs');
    }
};
