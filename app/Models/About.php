<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class About extends Model {
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
    }
