<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Tool extends Model
{
    public function image(): MorphOne
    {
        return $this->morphOne(Media::class, 'imageable');
    }
    protected $fillable = [
        'name',
        'status',
    ];
}
