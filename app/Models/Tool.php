<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Tool extends Model
{
    public function image(): MorphOne
    {
        // mediaable_* columns are used in media table
        return $this->morphOne(Media::class, 'mediaable');
    }
    protected $fillable = [
        'name',
        'status',
    ];
}
