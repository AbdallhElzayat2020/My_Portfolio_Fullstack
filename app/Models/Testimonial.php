<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Testimonial extends Model
{
    protected $fillable = [
        'client_name',
        'client_description',
        'status',
        'job',
    ];

    public function image(): MorphOne
    {
        return $this->morphOne(Media::class, 'mediaable');
    }
}
