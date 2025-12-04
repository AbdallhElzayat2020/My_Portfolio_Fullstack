<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Blog extends Model
{
    protected $fillable = [
        'full_name',
        'short_name',
        'short_desc',
        'full_desc',
        'slug',
        'category_id',
        'status',
    ];

    public function image(): MorphOne
    {
        return $this->morphOne(Media::class, 'mediaable');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
