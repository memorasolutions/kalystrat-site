<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Backoffice\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Backoffice\Models\NavigationItem;

class NavigationItemFactory extends Factory
{
    protected $model = NavigationItem::class;

    public function definition(): array
    {
        return [
            'section' => $this->faker->randomElement(['Accueil', 'Contenu', 'Commerce', 'Configuration']),
            'label' => $this->faker->words(2, true),
            'icon' => $this->faker->randomElement(['home', 'file-text', 'settings', 'users', 'shopping-cart']),
            'route' => null,
            'url' => null,
            'permission' => null,
            'module' => null,
            'position' => $this->faker->numberBetween(0, 20),
            'is_active' => true,
            'target' => null,
            'badge_class' => null,
            'area' => 'sidebar',
            'parent_id' => null,
        ];
    }
}
