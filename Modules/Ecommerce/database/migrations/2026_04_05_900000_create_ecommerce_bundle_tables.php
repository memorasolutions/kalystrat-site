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
        Schema::create('ecommerce_bundles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->enum('pricing_type', ['fixed', 'percentage', 'sum'])->default('fixed');
            $table->decimal('fixed_price', 10, 2)->nullable();
            $table->unsignedTinyInteger('discount_percentage')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('ecommerce_bundle_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bundle_id')->constrained('ecommerce_bundles')->cascadeOnDelete();
            $table->foreignId('variant_id')->constrained('ecommerce_product_variants')->cascadeOnDelete();
            $table->unsignedInteger('quantity')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ecommerce_bundle_items');
        Schema::dropIfExists('ecommerce_bundles');
    }
};
