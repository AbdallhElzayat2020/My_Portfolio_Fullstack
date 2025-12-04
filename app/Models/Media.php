<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;
use App\Models\Tool;
use App\Models\About;
use App\Models\Service;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\Brand;
use App\Models\Blog;

class Media extends Model
{
    public function mediaable(): MorphTo
    {
        return $this->morphTo();
    }
    protected $fillable = [
        'mediaable_id',
        'mediaable_type',
        'file_name',
    ];

    protected $appends = ['url'];

    public function getUrlAttribute(): string
    {
        // Resolve URL based on the owning model type
        switch ($this->mediaable_type) {
            case Tool::class:
                return Storage::disk('tools')->url($this->file_name);
            case About::class:
                return Storage::disk('about')->url($this->file_name);
            case Service::class:
                return Storage::disk('services_images')->url($this->file_name);
            case Project::class:
                return Storage::disk('projects_images')->url($this->file_name);
            case Testimonial::class:
                return Storage::disk('brands_logos')->url($this->file_name);
            case Brand::class:
                return Storage::disk('brands_logos')->url($this->file_name);
            case Blog::class:
                return Storage::disk('blogs_images')->url($this->file_name);
            default:
                return Storage::disk('public')->url($this->file_name);
        }
    }
}
