<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Backoffice\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Backoffice\Models\NavigationItem;

class NavigationSeeder extends Seeder
{
    public function run(): void
    {
        if (NavigationItem::count() > 0) {
            return;
        }

        $sections = config('navigation.sections', []);
        $sectionPos = 0;

        foreach ($sections as $section) {
            $itemPos = 0;

            foreach ($section['items'] ?? [] as $item) {
                if (isset($item['children'])) {
                    $parent = NavigationItem::create([
                        'label' => $item['label'],
                        'icon' => $item['icon'] ?? null,
                        'module' => $item['module'] ?? null,
                        'section' => $section['label'],
                        'position' => $itemPos++,
                        'area' => 'sidebar',
                    ]);

                    $childPos = 0;
                    foreach ($item['children'] as $child) {
                        NavigationItem::create([
                            'label' => $child['label'],
                            'icon' => $child['icon'] ?? null,
                            'route' => $child['route'] ?? null,
                            'permission' => $child['permission'] ?? null,
                            'section' => $section['label'],
                            'parent_id' => $parent->id,
                            'position' => $childPos++,
                            'area' => 'sidebar',
                        ]);
                    }
                } else {
                    NavigationItem::create([
                        'label' => $item['label'],
                        'icon' => $item['icon'] ?? null,
                        'route' => $item['route'] ?? null,
                        'permission' => $item['permission'] ?? null,
                        'module' => $item['module'] ?? null,
                        'section' => $section['label'],
                        'position' => $itemPos++,
                        'area' => 'sidebar',
                    ]);
                }
            }

            $sectionPos++;
        }

        $bottomPos = 0;
        foreach (config('navigation.bottom_bar', []) as $item) {
            NavigationItem::create([
                'label' => $item['label'],
                'icon' => $item['icon'] ?? null,
                'route' => $item['route'] ?? null,
                'permission' => $item['permission'] ?? null,
                'area' => 'bottom_bar',
                'position' => $bottomPos++,
            ]);
        }
    }
}
