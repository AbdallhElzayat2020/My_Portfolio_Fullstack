<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Brand extends Model
{
    protected $fillable = [
        'brand_name',
        'file_name',
        'alt_text',
        'status',
    ];

    public function image(): MorphOne
    {
        return $this->morphOne(Media::class, 'mediaable');
    }
}
