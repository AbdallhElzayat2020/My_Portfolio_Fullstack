<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Service extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
    ];

    public function image(): MorphOne
    {
        // mediaable_* columns are used in media table
        return $this->morphOne(Media::class, 'mediaable');
    }
}
