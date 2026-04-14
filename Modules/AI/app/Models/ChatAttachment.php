<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\AI\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Modules\AI\Database\Factories\ChatAttachmentFactory;

class ChatAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'message_id',
        'filename',
        'original_filename',
        'mime_type',
        'size',
        'disk',
        'path',
        'user_id',
    ];

    protected $casts = [
        'size' => 'integer',
    ];

    public function message(): BelongsTo
    {
        return $this->belongsTo(AiMessage::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUrlAttribute(): string
    {
        return Storage::disk($this->disk)->url($this->path);
    }

    protected static function newFactory(): ChatAttachmentFactory
    {
        return ChatAttachmentFactory::new();
    }
}
