<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Media extends Model
{
    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
    protected $fillable = [
        'mediaable_id',
        'mediaable_type',
        'type',
    ];
}
