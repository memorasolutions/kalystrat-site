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
        $indexes = [
            'menus' => ['is_active'],
            'tenants' => ['is_active'],
            'knowledge_urls' => ['is_active', 'robots_allowed'],
            'workflow_enrollments' => ['status'],
            'email_workflows' => ['status'],
        ];

        foreach ($indexes as $table => $columns) {
            if (! Schema::hasTable($table)) {
                continue;
            }

            try {
                Schema::table($table, function (Blueprint $blueprint) use ($columns) {
                    $blueprint->index($columns);
                });
            } catch (Throwable) {
                // Index already exists — skip
            }
        }
    }

    public function down(): void
    {
        $indexes = [
            'menus' => ['is_active'],
            'tenants' => ['is_active'],
            'knowledge_urls' => ['is_active', 'robots_allowed'],
            'workflow_enrollments' => ['status'],
            'email_workflows' => ['status'],
        ];

        foreach ($indexes as $table => $columns) {
            if (! Schema::hasTable($table)) {
                continue;
            }

            try {
                Schema::table($table, function (Blueprint $blueprint) use ($columns) {
                    $blueprint->dropIndex($columns);
                });
            } catch (Throwable) {
                // Index doesn't exist — skip
            }
        }
    }
};
