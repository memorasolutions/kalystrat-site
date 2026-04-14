<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Backoffice\Livewire;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Livewire\Component;
use Modules\Settings\Facades\Settings;
use Modules\Settings\Models\Setting;

class SettingsManager extends Component
{
    public array $values = [];

    public function mount(): void
    {
        foreach (Setting::all() as $setting) {
            $this->values[$setting->id] = $setting->value;
        }
    }

    public function updateSetting(int $id): void
    {
        $setting = Setting::findOrFail($id);
        $setting->update(['value' => $this->values[$id] ?? '']);
        Cache::forget("setting.{$setting->key}");
        $this->dispatch('toast', type: 'success', message: __('Paramètre « :key » mis à jour.', ['key' => $setting->key]));
    }

    // Principe ADHD: un seul bouton "Sauver" par onglet au lieu d'un par champ
    public function saveGroup(string $groupName): void
    {
        $settings = Setting::where('group', $groupName)
            ->where('type', '!=', 'boolean')
            ->get();

        foreach ($settings as $setting) {
            if (isset($this->values[$setting->id]) && $setting->value !== $this->values[$setting->id]) {
                $setting->update(['value' => $this->values[$setting->id]]);
                Cache::forget("setting.{$setting->key}");
            }
        }

        if ($groupName === 'branding') {
            Artisan::call('view:clear');
        }

        $this->dispatch('toast', type: 'success', message: __('Paramètres sauvegardés.'));
    }

    public function saveTheme(string $theme): void
    {
        $themesDir = module_path('Backoffice', 'resources/views/themes');
        $available = array_map('basename', array_filter(glob($themesDir.'/*'), 'is_dir'));

        if (! in_array($theme, $available)) {
            $this->dispatch('toast', type: 'error', message: 'Thème invalide.');

            return;
        }

        Setting::updateOrCreate(
            ['key' => 'backoffice.theme'],
            [
                'group' => 'branding',
                'value' => $theme,
                'type' => 'string',
                'description' => 'Thème du panneau administration',
                'is_public' => false,
            ]
        );

        if (class_exists(Settings::class)) {
            Settings::clearCache();
        }
        Cache::forget('branding_settings');
        Cache::forget('setting.backoffice.theme');
        Artisan::call('view:clear');

        $this->js('window.location.href = "'.request()->url().'?tab=apparence"');
    }

    public function toggleBoolean(int $id): void
    {
        $setting = Setting::findOrFail($id);
        $newValue = ! filter_var($setting->value, FILTER_VALIDATE_BOOLEAN);
        $setting->update(['value' => $newValue ? 'true' : 'false']);
        $this->values[$id] = $newValue ? 'true' : 'false';
        Cache::forget("setting.{$setting->key}");
        $this->dispatch('toast', type: 'success', message: "Paramètre « {$setting->key} » basculé.");
    }

    public function render(): View
    {
        $order = ['general', 'homepage', 'mail', 'seo', 'sms', 'branding', 'security', 'push', 'blog', 'retention', 'legal', 'ai'];
        $all = Setting::orderBy('key')->get()->groupBy('group');
        $groups = collect($order)->filter(fn ($g) => $all->has($g))->mapWithKeys(fn ($g) => [$g => $all[$g]]);

        return view('backoffice::livewire.settings-manager', compact('groups'));
    }
}
