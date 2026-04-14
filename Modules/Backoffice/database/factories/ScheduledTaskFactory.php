<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Backoffice\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Backoffice\Models\ScheduledTask;

class ScheduledTaskFactory extends Factory
{
    protected $model = ScheduledTask::class;

    public function definition(): array
    {
        return [
            'command' => 'inspire',
            'cron_expression' => '* * * * *',
            'description' => fake()->sentence(),
            'is_system' => false,
            'is_active' => true,
        ];
    }
}
