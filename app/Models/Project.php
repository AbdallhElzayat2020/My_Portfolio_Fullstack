<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    class Project extends Model {
        protected $fillable = [
        'short_title',
        'full_title',
        'short_desc',
        'full_desc',
        'slug',
        'category_id',
        'status',
        'link',
        ];

        public function category(): BelongsTo
        {
        return $this->belongsTo(Category::class);
        }
    }
