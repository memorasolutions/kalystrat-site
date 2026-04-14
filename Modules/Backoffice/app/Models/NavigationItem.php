<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Backoffice\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Backoffice\Database\Factories\NavigationItemFactory;
use Nwidart\Modules\Facades\Module;

class NavigationItem extends Model
{
    use HasFactory;

    protected $table = 'navigation_items';

    protected $fillable = [
        'section',
        'label',
        'icon',
        'route',
        'url',
        'permission',
        'module',
        'position',
        'is_active',
        'target',
        'badge_class',
        'area',
        'parent_id',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'position' => 'integer',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('position');
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeSidebar(Builder $query): Builder
    {
        return $query->where('area', 'sidebar');
    }

    public function scopeBottomBar(Builder $query): Builder
    {
        return $query->where('area', 'bottom_bar');
    }

    public function scopeTopLevel(Builder $query): Builder
    {
        return $query->whereNull('parent_id');
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('position');
    }

    public function translatedLabel(): string
    {
        return __($this->label);
    }

    public function isVisible(): bool
    {
        if (! $this->is_active) {
            return false;
        }

        if ($this->module && ! Module::isEnabled($this->module)) {
            return false;
        }

        if ($this->permission && auth()->check() && ! auth()->user()->can($this->permission)) {
            return false;
        }

        return true;
    }

    protected static function newFactory(): NavigationItemFactory
    {
        return NavigationItemFactory::new();
    }
}
