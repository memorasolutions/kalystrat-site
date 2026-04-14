<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\ErrorMonitoring\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\ErrorMonitoring\Models\ErrorLog;

class ErrorLogFactory extends Factory
{
    protected $model = ErrorLog::class;

    public function definition(): array
    {
        return [
            'fingerprint' => fake()->sha256(),
            'exception_class' => fake()->randomElement([
                'Symfony\Component\HttpKernel\Exception\NotFoundHttpException',
                'Symfony\Component\HttpKernel\Exception\HttpException',
                'RuntimeException',
                'InvalidArgumentException',
            ]),
            'message' => fake()->sentence(),
            'status_code' => fake()->randomElement([404, 403, 429, 500]),
            'url' => fake()->url(),
            'method' => fake()->randomElement(['GET', 'POST', 'PUT', 'DELETE']),
            'ip_hash' => hash('sha256', fake()->ipv4()),
            'user_agent' => fake()->userAgent(),
            'severity' => fake()->randomElement(['critical', 'warning', 'info']),
            'occurrence_count' => fake()->numberBetween(1, 100),
            'last_occurred_at' => fake()->dateTimeBetween('-7 days'),
            'resolved_at' => null,
        ];
    }

    public function resolved(): static
    {
        return $this->state(fn () => ['resolved_at' => now()]);
    }

    public function critical(): static
    {
        return $this->state(fn () => ['severity' => 'critical', 'status_code' => 500]);
    }
}
