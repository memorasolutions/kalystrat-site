<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Roadmap\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Roadmap\Database\Factories\ChangelogFactory;

class Changelog extends Model
{
    use HasFactory;

    protected $table = 'roadmap_changelogs';

    protected $fillable = [
        'idea_id',
        'user_id',
        'field',
        'old_value',
        'new_value',
        'note',
    ];

    public function idea(): BelongsTo
    {
        return $this->belongsTo(Idea::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function newFactory(): ChangelogFactory
    {
        return ChangelogFactory::new();
    }
}
