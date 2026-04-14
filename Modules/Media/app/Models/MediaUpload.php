<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Media\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Database\Factories\MediaUploadFactory;
use Modules\Media\Traits\HasMediaAttachments;
use Spatie\MediaLibrary\HasMedia;

class MediaUpload extends Model implements HasMedia
{
    use HasFactory, HasMediaAttachments;

    protected $fillable = ['name'];

    protected static function newFactory(): MediaUploadFactory
    {
        return MediaUploadFactory::new();
    }
}
