<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class About extends Model
{
    protected $fillable = [
        'name',
        'description',
        'email',
        'phone',
        'facebook_link',
        'upwork_link',
        'linkedin_link',
        'whatsapp_link',
        'github_link',
    ];

    protected function casts(): array
    {
        return [
            'description' => 'array',
        ];
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Media::class, 'imageable');
    }
}
