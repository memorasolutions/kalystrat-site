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
        Schema::create('navigation_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('parent_id')->nullable()->constrained('navigation_items')->nullOnDelete();
            $table->string('section', 50)->nullable();
            $table->string('label', 100);
            $table->string('icon', 50)->nullable();
            $table->string('route', 150)->nullable();
            $table->string('url', 255)->nullable();
            $table->string('permission', 100)->nullable();
            $table->string('module', 50)->nullable();
            $table->integer('position')->default(0);
            $table->boolean('is_active')->default(true);
            $table->string('target', 20)->nullable();
            $table->string('badge_class', 50)->nullable();
            $table->string('area', 20)->default('sidebar');
            $table->timestamps();

            $table->index('parent_id');
            $table->index(['area', 'position']);
            $table->index('section');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('navigation_items');
    }
};
