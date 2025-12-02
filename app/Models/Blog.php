<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    class Blog extends Model {
        protected $fillable = [
        'full_name',
        'short_name',
        'short_desc',
        'full_name',
        'slug',
        'category_id',
        'status',
        ];

        public function category(): BelongsTo
        {
        return $this->belongsTo(Category::class);
        }
    }
