<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Project extends Model
{
    protected $fillable = [
        'short_title',
        'full_title',
        'short_desc',
        'full_desc',
        'slug',
        'category_id',
        'status',
        'link',
        'in_home',
        'is_featured',
    ];

    public function image(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediaable');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
