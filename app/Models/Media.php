<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
    protected $fillable = [
        'mediaable_id',
        'mediaable_type',
        'file_name',
    ];

    protected $appends = ['url'];

    public function getUrlAttribute(): string
    {
        // Resolve URL based on the owning model type
        switch ($this->mediaable_type) {
            case Tool::class:
                return Storage::disk('tools')->url($this->file_name);
            default:
                return Storage::disk('public')->url($this->file_name);
        }
    }
}
